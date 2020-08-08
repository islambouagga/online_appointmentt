@extends('layouts.matser')

@section('content')
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>Create Patient page</h1>
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
            <img src="{{asset('svg/banner_img.png')}}" width="500" height="400">
        </div>
    </div>
    <form role="form" method="post" action="{{route('patient.store')}} ">
        @csrf
        <div class="row  h-100 justify-content-center align-items-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Patient information</h3>

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
                                                <input type="text" id="inputName" name="Pfname"
                                                       class="form-control @error('Pfname') is-invalid @enderror">
                                                @error('Pfname')
                                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <input  type="hidden"  name="usertable_type" value="Patient" >
                                    <input  type="hidden"  name="usertable_id" >
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telephone</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name="Ptel"
                                                       class="form-control @error('Ptel') is-invalid @enderror"
                                                       data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                                       data-mask>
                                                @error('Ptel')
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
                                            <label for="inputStatus">Gander</label>
                                            <select class="form-control select2 @error('Psexe') is-invalid @enderror"
                                                    name="Psexe">
                                                <option selected disabled>Select one</option>
                                                <option value="Male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('Psexe')
                                            <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="approved" value="approved">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Birthday</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="date" name="Pbirthday" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
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


                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Create new Patient " class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
