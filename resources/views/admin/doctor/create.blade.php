@extends('layouts.matser')

@section('content')
    <script>
        $(document).ready(function(){
            $("#2").hide();
            $("#S2").hide();
            $("#hide").click(function(){
                $("#1").hide();
                $("#2").show();
            });
            $("#hide1").click(function(){
                $("#S1").hide();
                $("#S2").show();
            });
            $("#show").click(function(){
                $("#1").show();
                $("#2").hide();
            });
            $("#show1").click(function(){
                $("#S1").show();
                $("#S2").hide();
            });
        });
    </script>
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>Create Doctor page</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqu
                a. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa qui o
                fficia deserunt* mollit anim id est laborum.
            </p>



        </div>
        <div class="col-md-6">
            <img src="{{asset('svg/medicine_b1ol.svg')}}" width="500" height="400">
        </div>
    </div>
    <form role="form" method="post" action="{{route('admin.doctor.store')}} ">
        @csrf
        <div class="row  h-100 justify-content-center align-items-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Doctor information</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-user-md"></i></span>
                                                </div>
                                                <input type="text" id="inputName" name="name"
                                                       class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputName">Family Name</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-user-md"></i></span>
                                                </div>
                                                <input type="text" id="inputName" name="Dfname"
                                                       class="form-control @error('Dfname') is-invalid @enderror">
                                                @error('Dfname')
                                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <input  type="hidden"  name="usertable_type" value="Doctor" >
                                    <input  type="hidden"  name="usertable_id" >
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telephone</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name="Dtel"
                                                   class="form-control @error('Dtel') is-invalid @enderror"
                                                   data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                                   data-mask>
                                            @error('Dtel')
                                            <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                            @enderror
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Expertize</label>
                                            <textarea class="form-control" name="Dexpertize" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Diploma</label>
                                            <textarea class="form-control" name="Ddiploma" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="email" id="inputName" name="email"
                                                   class="form-control @error('email') is-invalid @enderror   ">
                                            @error('email')
                                            <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-secret"></i></span>
                                            </div>
                                            <input type="password" id="inputName" name="password"
                                                   class="form-control @error('password') is-invalid @enderror   ">
                                            @error('password')
                                            <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputStatus">Specialty in our platform</label>
                                        <div class="form-group clearfix">
                                            <div class="form-check d-inline">
                                                <input id="hide1" class="form-check-input" value="non" type="radio" name="radioS1">
                                                <label class="form-check-label"> <strong>Non</strong></label>
                                            </div>
                                            <div class="form-check d-inline">
                                                <input id="show1" class="form-check-input" value="yes" type="radio" name="radioS1" checked>
                                                <label class="form-check-label"><strong>Yes</strong></label>
                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                    <div id='S1' class="col-md-6">
                                        <div class="form-group">
                                            <label>Specialty</label>
                                            <select class="select2"  name="specialty" data-placeholder="Select a specialty" style="width: 100%;">
                                                @foreach( $specialties as $specialty)
                                                <option value="{{$specialty->id}}"> {{$specialty->namespec}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div id='S2' class="col-md-6">
                                        <div class="form-group">
                                            <label>Specialty</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-user-tag"></i></span>
                                                </div>
                                                <input type="text" id="inputName" name="namespec"
                                                       class="form-control @error('namespec') is-invalid @enderror">
                                                @error('namespec')
                                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inputName">Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-dollar-sign"></i></span>
                                                </div>
                                                <input type="number"  name="price"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Days</label>
                                            <select class="select2" multiple="multiple" name="days[]"  style="width: 100%;">
                                                <option selected>Sunday</option>
                                                <option selected>Monday</option>
                                                <option selected>Tuesday</option>
                                                <option selected>Wednesday</option>
                                                <option selected>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputName">Morning Work Times</label>
                                        <div class="input-group">

                                            <input type="time"  name="MWTStart"
                                                   class="form-control" value="08:00">
                                            <input type="time"  name="MWTEnd"
                                                   class="form-control" value="12:00">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputName">Evening Work Times</label>
                                        <div class="input-group">
                                            <input type="time"  name="EWTStart"
                                                   class="form-control" value="14:00">
                                            <input type="time"  name="EWTEnd"
                                                   class="form-control" value="17:00">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputStatus">Establishment in our platform</label>
                                        <div class="form-group clearfix">
                                            <div class="form-check d-inline">
                                                <input id="hide" class="form-check-input" value="non" type="radio" name="radio1">
                                                <label class="form-check-label"> <strong>Non</strong></label>
                                            </div>
                                            <div class="form-check d-inline">
                                                <input id="show" class="form-check-input" value="yes" type="radio" name="radio1" checked>
                                                <label class="form-check-label"><strong>Yes</strong></label>
                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                    <div id='1' class="col-md-6">
                                        <div class="form-group">
                                            <label>Establishment</label>
                                            <select class="form-control select2" name="establishment" style="width: 100%;">
                                                <option selected disabled>Select one</option>
                                                @foreach($establishments as $establishment)
                                                <option value="{{$establishment->id}}"> {{$establishment->Ename}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                </div>
                <div id='2'>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Establishment information</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Establishment Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hospital"></i></span>
                                        </div>
                                        <input type="text" id="inputName" name="Ename"
                                               class="form-control @error('Ename') is-invalid @enderror">
                                        @error('Ename')
                                        <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Establishment Telephone</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="Etel"
                                               class="form-control @error('Etel') is-invalid @enderror"
                                               data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                               data-mask>
                                        @error('Etel')
                                        <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Establishment Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email" id="inputName" name="Eemail"
                                               class="form-control @error('Eemail') is-invalid @enderror   ">
                                        @error('Eemail')
                                        <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Establishment Type</label>
                                    <select class="form-control select2 @error('Etype') is-invalid @enderror"
                                            name="Etype">
                                        <option selected disabled>Select one</option>
                                        <option value="Doctor office">Doctor office</option>
                                        <option value="Clinic">Clinic</option>
                                        <option value="Hospital">Hospital</option>
                                    </select>
                                    @error('Etype')
                                    <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #385399">
                                <h3 class="card-title">Establishment Contact Information</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <label style="margin: 7px">Name</label>
                                        <input type="text" class="form-control" name="contactname"
                                               placeholder="Enter ...">
                                        <label style="margin: 7px">Family Name</label>
                                        <input type="text" class="form-control" name="contactfname"
                                               placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Telephone</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="contactntel" class="form-control"
                                               data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                               data-mask>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email" id="inputName" name="contactemail" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Establishment Location</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Establishment Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" id="inputEstimatedBudget" name="Eadresse"
                                               class="form-control @error('Eadresse') is-invalid @enderror">
                                        @error('Eadresse')
                                        <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <h3>Establishment Address</h3>
                                <div id="map"></div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Create new Doctor" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
