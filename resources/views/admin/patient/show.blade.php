@extends('layouts.matser')

@section('content')
    @can("isAdmin")
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>Edit Patient page</h1>
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
                                                @foreach($patient->users as $user)
                                                <input type="text" id="inputName" name="name" value="{{$user->name}}"
                                                       class="form-control @error('name') is-invalid @enderror">
                                                @endforeach
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
                                                <input type="text" id="inputName" name="Pfname" value="{{$patient->Pfname}}"
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
                                                <input type="text" name="Ptel" value="{{$patient->Ptel}}"
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
                                            <label for="inputStatus">Gneder</label>
                                            <select class="form-control select2 @error('Psexe') is-invalid @enderror"
                                                    name="Psexe">
                                                <option @if($patient->Ptel == "Male") selected @endif value="Male">Male</option>
                                                <option @if($patient->Ptel == "female") selected @endif  value="female">Female</option>
                                            </select>
                                            @error('Psexe')
                                            <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Birthday</label>

                                                <input type="date" name="Pbirthday" value="{{$patient->Pbirthday}}" class="form-control datetimepicker-input" data-target="#reservationdate"/>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                </div>
                                                @foreach($patient->users as $user)
                                                <input type="email" id="inputName" name="email" value="{{$user->email}}"
                                                       class="form-control @error('email') is-invalid @enderror   ">
                                                @endforeach
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
                        <input type="submit" value="Create new Doctor" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endcan
    @can('isAuthor')
        <div class="row  h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <h1>Patient page</h1>
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
        <div class="row  h-100 justify-content-center align-items-center">
            <div class="col-md-3">

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Patient</h3>
                    </div>
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i>Name</strong>

                        <p class="text-muted">
                            @foreach($patient->users as $user)
                                {{$user->name}}
                                {{$patient->Pfname}}.

                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Telephone</strong>

                        <p class="text-muted">{{$patient->Psexe}}.</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>

                        <p class="text-muted">{{$user->email}}.</p>

                        <hr>

                        @endforeach
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Patient's List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>title</th>
                                    <th>start</th>
                                    <th>statu</th>

                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patient->appointments()->get() as $appointment )

                                    <tr>
                                        <td>{{$appointment->title}}</td>
                                        <td>{{$appointment->start}}</td>
                                        <td>
                                                        <span class="badge @if($appointment->statu == "approved") badge-success

                                                          @elseif($appointment->statu == "request") badge-warning
                                        @elseif($appointment->statu == "cancel") badge-danger

                                            @elseif($appointment->statu == "changed") badge-info @endif ">{{$appointment->statu}}</span>
                                        </td>
                                        <td class="row">
                                            <form role="form" method="post"
                                                  action="{{route('appointment.update',$appointment->id)}}">
                                                @method('PATCH')
                                                @csrf
                                                <input type="hidden" name="statu" value="approved">
                                                <button type="submit" class="btn"><i class="fas fa-check red"
                                                                                     style="color: green"></i></button>
                                            </form>
                                            |
                                            <a class="btn" href="{{route('appointment.show',$appointment->id)}}"><i
                                                    class="fas fa-edit"
                                                ></i></a>
                                            |

                                            <form role="form" method="post"
                                                  action="{{route('appointment.update',$appointment->id)}}">
                                                @method('PATCH')
                                                @csrf
                                                <input type="hidden" name="statu" value="cancel">
                                                <button type="submit" class="btn"><i class="fas fa-times red"
                                                                                     style="color: red"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    @endcan
@endsection
