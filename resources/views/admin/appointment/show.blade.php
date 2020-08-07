@extends('layouts.matser')

@section('content')
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>Edit Appointment Page</h1>
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
            <img src="{{asset('svg/booking_33fn.svg')}}" width="500" height="400">
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
                            <form role="form" method="post" action="{{route('appointment.update',$appointment->id)}} ">
                                {{method_field('PATCH')}}
                                {{csrf_field()}}
                                <div class="row  h-100 justify-content-center align-items-center">
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEstimatedBudget">Date </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                </div>
                                                <input type="date"  id="start" name="start"
                                                       class="form-control " value="{{$time}}">
                                            </div>
                                        </div>
                                            </div>
                                    <input type="hidden"  id="doctor_id" name="doctor_id"
                                           value="{{Auth::user()->usertable_id}}">


                                    <input type="hidden" name="statu" value="changed">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <select class="form-control select2" name="time2" id="time2" style="width: 100%;">

                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#" class="btn btn-secondary">Cancel</a>
                                            <input type="submit" value="Edit appointment" class="btn btn-success float-right">
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

    <script>
        var doctor_id = $('#doctor_id').val();
        $(document).ready(function () {


            var weekday = new Array(7);
            weekday[0] = "Sunday";
            weekday[1] = "Monday";
            weekday[2] = "Tuesday";
            weekday[3] = "Wednesday";
            weekday[4] = "Thursday";
            weekday[5] = "Friday";
            weekday[6] = "Saturday";
            $('input[name="start"]').on('change', function () {
                var day = $(this).val();
                var  d = new Date(day)
                console.log(weekday[d.getDay()])
                console.log(doctor_id)

                if (weekday[d.getDay()]) {
                    // console.log('admin/inscription/getsessions/'+id_formation)
                    $.ajax({
                        url: 'getdays/'+doctor_id+'/' + weekday[d.getDay()],
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                        console.log(data)
                            $('select[name="time2"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="time2"]')
                                    .append(
                                        '<option >' + value + '</option>');
                            });
                        }
                    });

                } else {
                    $('select[name="time2"]').empty();
                }
            });
        });

    </script>
@endsection
