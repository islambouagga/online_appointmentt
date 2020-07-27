@extends('layouts.matser')

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Establishment</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i>Name</strong>

                    <p class="text-muted">
                        {{$establishment->Ename}}.
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Telephone</strong>

                    <p class="text-muted">{{$establishment->Etel}}.</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>

                    <p class="text-muted">{{$establishment->Eemail}}.</p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Type</strong>

                    <p class="text-muted">{{$establishment->Etype}}.</p>
                    <hr>
                    <strong><i class="far fa-file-alt mr-1"></i> Address</strong>

                    <p class="text-muted">{{$establishment->Eadresse}}.</p>
                </div>
                <!-- /.card-body -->
            </div>
            @if($establishment->contactname !=null && $establishment->contactntel !=null && $establishment->contactemail !=null)
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Establishment Contact Information</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if($establishment->contactname !=null)

                        <strong><i class="fas fa-book mr-1"></i>Name</strong>

                        <p class="text-muted">
                            {{$establishment->contactname}} {{$establishment->contactfname}}.
                        </p>

                        <hr>
                    @endif
                    @if($establishment->contactntel !=null)
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Telephone</strong>

                        <p class="text-muted">{{$establishment->contactntel}}.</p>

                        <hr>
                    @endif
                    @if($establishment->contactemail !=null)
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>

                        <p class="text-muted">
                            {{$establishment->contactemail}}.
                        </p>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
        @endif
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active"  style="background-color: #dc3545" href="#activity" data-toggle="tab">Edit</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form role="form" method="post" action="{{route('establishment.update',$establishment->id)}} ">
                                {{method_field('PATCH')}}
                                {{csrf_field()}}
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
                                                        <input type="text" id="inputName" value="{{$establishment->Ename}}" name="Ename" class="form-control @error('Ename') is-invalid @enderror">
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
                                                        <input type="text" value="{{$establishment->Etel}}" name="Etel" class="form-control @error('Etel') is-invalid @enderror"
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
                                                        <input type="email" value="{{$establishment->Eemail}}" id="inputName" name="Eemail" class="form-control @error('Eemail') is-invalid @enderror   ">
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
                                                        <option selected value="{{$establishment->Etype}}" >{{$establishment->Etype}}</option>
                                                        @if($establishment->Etype != "Doctor office")
                                                        <option value="Doctor office">Doctor office</option>
                                                        @endif
                                                        @if($establishment->Etype != "Clinic")
                                                        <option value="Clinic">Clinic</option>
                                                        @endif
                                                            @if($establishment->Etype != "Hospital")
                                                        <option value="Hospital">Hospital</option>
                                                        @endif
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
                                                        <input type="text" value="{{$establishment->contactname}}" class="form-control"  name="contactname" placeholder="Enter ...">
                                                        <label style="margin: 7px">Family Name</label>
                                                        <input type="text" value="{{$establishment->contactfname}}" class="form-control" name="contactfname" placeholder="Enter ...">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Telephone</label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" value="{{$establishment->contactntel}}"  name="contactntel" class="form-control"
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
                                                        <input type="email" value="{{$establishment->contactemail}}" id="inputName" name="contactemail" class="form-control">
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
                                                        <input type="text" value="{{$establishment->Eadresse}}" id="inputEstimatedBudget" name="Eadresse" class="form-control @error('Eadresse') is-invalid @enderror">
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
                                        <input type="submit" value="Edit Establishment" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
@endsection
