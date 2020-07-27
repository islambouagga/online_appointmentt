@extends('layouts.matser')

@section('content')
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>Create Establishment page</h1>
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
            <img src="{{asset('svg/Medical care.svg')}}" width="500" height="400">
        </div>
    </div>
    <form role="form" method="post" action="{{route('establishment.store')}} ">
        @csrf
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Establishment information</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                <input type="text" id="inputName" name="Ename" class="form-control @error('Ename') is-invalid @enderror">
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
                                    <input type="text"  name="Etel" class="form-control @error('Etel') is-invalid @enderror"
                                           data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
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
                                    <input type="email" id="inputName" name="Eemail" class="form-control @error('Eemail') is-invalid @enderror   ">
                                    @error('Eemail')
                                    <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Establishment Type</label>
                                <select class="form-control select2 @error('Etype') is-invalid @enderror" name="Etype">
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                    <input type="text" class="form-control" name="contactname" placeholder="Enter ...">
                                    <label style="margin: 7px">Family Name</label>
                                    <input type="text" class="form-control" name="contactfname" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Telephone</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text"  name="contactntel" class="form-control"
                                           data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                <input type="text" id="inputEstimatedBudget" name="Eadresse" class="form-control @error('Eadresse') is-invalid @enderror">
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
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create new Establishment" class="btn btn-success float-right">
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
