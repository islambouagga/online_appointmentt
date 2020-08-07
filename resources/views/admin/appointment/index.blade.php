<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="icon" href="{{asset('favicon.png')}}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-daygrid/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-timegrid/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-bootstrap/main.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.0.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.0.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.0.0/main.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.0.0/main.min.css"/>


    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px; /* The height is 400 pixels */
            width: 100%; /* The width is the width of the web page */
        }
    </style>

    {{--    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">--}}
    {{--    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">--}}
    <style>
        .intro {
            margin-top: 3rem;
        }
    </style>

    <script type="text/javascript" charset="utf8"
            src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
    @livewireStyles
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

        <div class="container" style="padding-left: 25%">
            <a href="{{route('home')}}" class="brand-link">
                <img src="{{asset('dist/img/logo.png')}}" alt="Medico Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">Medico</span>
            </a>


            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('appointment?id='.Auth::user()->usertable_id)}}" class="nav-link">Dashbord</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('patient.index')}}" class="nav-link">Patient's List</a>
                    </li>


                </ul>
                <div style="position: absolute;right: 81px;">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }} <i class="fas fa-sign-out-alt" ></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <!-- SEARCH FORM -->
            </div>

        </div>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid h-100">
                <div class="intro h-100">

                    <section class="content">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="sticky-top mb-3">
                                        @can('isAuthor')
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Draggable Events</h4>
                                                </div>
                                                <div class="card-body">
                                                    <!-- the events -->
                                                    <div id="external-events">
                                                        <div class="external-event bg-success">Bussy</div>
                                                        <input type="hidden"  id="statu" name="statu"
                                                               value="approved">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        <!-- /.card -->


                                                    {{--                                        <button id="add-new-event" type="button" class="btn btn-primary">Add</button>--}}
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal">Add Holiday</button>
                                            <button type="button" class="btn btn-secondary"data-toggle="modal"
                                                    data-target="#exampleModal1">Add Appointment</button>
                                        @endcan
                                            @can('isUser')
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Draggable Events</h4>
                                                </div>
                                                <div class="card-body">
                                                    <!-- the events -->
                                                    <div id="external-events">

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            @endcan
                                        <input type="hidden"  id="doctor_id" name="doctor_id"
                                               value="{{$doctor_id}}">
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-9">
                                    <div class="card card-primary">
                                        <div class="card-body p-0">
                                            <!-- THE CALENDAR -->
                                            <div id="calendar"></div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>

                    <div class="row  h-100 justify-content-center align-items-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Doctor's List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>title</th>
                                            <th>start</th>
                                            <th>statu</th>
                                            <th>patient</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($appointments as $appointment )

                                                <tr>
                                                    <td>{{$appointment->title}}</td>
                                                    <td>{{$appointment->start}}</td>
                                                    <td>
                                                        <span class="badge @if($appointment->statu == "approved") badge-success

                                                          @elseif($appointment->statu == "request") badge-warning
                                        @elseif($appointment->statu == "cancel") badge-danger

                                            @elseif($appointment->statu == "changed") badge-info @endif ">{{$appointment->statu}}</span>
                                                        </td>
                                                    @foreach($appointment->patient()->get() as $a)

                                                        <td>{{$a->Pfname}}</td>
                                                    @endforeach
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
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>    <form>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="inputEstimatedBudget">Date </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="date"  id="start" name="start"
                                       class="form-control ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <select class="form-control select2" name="time2" id="time2" style="width: 100%;">

                            </select>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <input type="hidden"  id="patient_id" name="patient_id"
                                   value="{{Auth::user()->usertable_id}}">
                        @endif


                        <input type="hidden"  id="test" name="test"
                               value="app">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="add-new-event" type="button"  class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Holidays</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>    <form>
                <div class="modal-body">

                        <div class="form-group">
                            <label for="inputEstimatedBudget">Date and Time start</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="datetime-local"  id="start2" name="start"
                                       class="form-control ">
                            </div>
                        </div>
                    <input type="hidden"  id="test" name="test"
                           value="holi">
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Date and Time end</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="datetime-local"  id="end2" name="end"
                                       class="form-control ">
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="add-new-event" type="button"  class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-daygrid/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-timegrid/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-interaction/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-bootstrap/main.min.js')}}"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": true,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>


<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = {lat: -25.344, lng: 131.036};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>

<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhTHfjz0i7Zt5d1ptwnuOIRdur-ilAvr4&callback=initMap">
</script>

<script>
    $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function () {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                })

            })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function (eventEl) {
                console.log(eventEl);
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
            }
        });
        events = 0;
        var doctor_id = $('#doctor_id').val();
        var statu = $('#statu').val();
        var statu2 = $('#statu2').val();
        var test =  $('#test').val();
        console.log(doctor_id)
        $.ajax({
            url: 'getappointments/'+ doctor_id,
            type: 'GET',
            async: false,
            dataType: 'json',
            success: function (data) {
                events = data
                console.log('in ajax')
                console.log(events)

            }
        });
        console.log('out ajax ')
        console.log(events)


        var calendar = new Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            'themeSystem': 'bootstrap',
            events,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function (info) {
                console.log(info.date)
                let dateee = new Date(info.date)
                console.log(dateee.getFullYear() + "-" + (dateee.getMonth() + 1) + "-" + dateee.getDate() + " " + dateee.getHours() + ":" + dateee.getMinutes() + ":" + dateee.getSeconds())
                // console.log(moment(info.date.))

                $.ajax({
                    url: "/postappointment",
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    data: {
                        title: info.draggedEl.textContent,
                        backgroundColor: '#00ff00',
                        borderColor: '#00ff00',
                        start: dateee.getFullYear() + "-" + (dateee.getMonth() + 1) + "-" + dateee.getDate() + " " + dateee.getHours() + ":" + dateee.getMinutes() + ":" + dateee.getSeconds(),
                        end: dateee.getFullYear() + "-" + (dateee.getMonth() + 1) + "-" + dateee.getDate() + " " + dateee.getHours() + ":" + dateee.getMinutes() + ":" + dateee.getSeconds(),
                        doctor_id : doctor_id,
                        allDay : true,
                        statu:statu
                    },
                    cache: false,
                    success: function (dataResult) {
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            window.location = "/appointment?id="+doctor_id;
                        } else if (dataResult.statusCode == 201) {
                            alert("Error occured !");
                        }

                    }
                });
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }
        });

        calendar.render();
        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
            e.preventDefault()
            //Save color
            currColor = $(this).css('color')
            //Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })

        console.log("test")
        console.log(test)
        console.log("ssss")
        console.log(statu2)
            if (test==='app'){
                $('#add-new-event').click(function (e) {
                    console.log('2222')
                    var start = $('#start').val();
                    var end = $('#time2').val();
                    var plus =  start+" "+end
                    var daystart = new Date(plus)
                    var dayend = moment(new Date(plus)).add(30, 'm').toDate()
                    var jArray =@json($arrdays);
                    var weekday = new Array(7);
                    weekday[0] = "Sunday";
                    weekday[1] = "Monday";
                    weekday[2] = "Tuesday";
                    weekday[3] = "Wednesday";
                    weekday[4] = "Thursday";
                    weekday[5] = "Friday";
                    weekday[6] = "Saturday";
                    console.log('statu')
                    console.log(statu)
                    console.log('start')
                    console.log(start)
                    console.log('time2')
                    console.log(end)
                    console.log('plus')
                    console.log(plus)
                    console.log("daystart")
                    console.log(daystart)
                    console.log(weekday[daystart.getDay()])
                    console.log("daysend")
                    console.log(moment(new Date(plus)).add(30, 'm').toDate())
                    console.log(jArray)
                    if(jArray.includes(weekday[daystart.getDay()])){
                        $.ajax({
                            url: "/postappointment",
                            type: "POST",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                            data: {
                                title: "Appointment",
                                backgroundColor: '#8f8622',
                                borderColor: '#8f8622',
                                start: daystart.getFullYear() + "-" + (daystart.getMonth() + 1) + "-" + daystart.getDate() + " " + daystart.getHours() + ":" + daystart.getMinutes() + ":" + daystart.getSeconds(),
                                end: dayend.getFullYear() + "-" + (dayend.getMonth() + 1) + "-" + dayend.getDate() + " " + dayend.getHours() + ":" + dayend.getMinutes() + ":" + dayend.getSeconds() ,
                                allDay : false,
                                doctor_id : doctor_id,
                                statu:statu
                            },
                            cache: false,
                            success: function (dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/appointment?id="+doctor_id;
                                } else if (dataResult.statusCode == 201) {
                                    alert("Error occured !");
                                }

                            }
                        });
                    }else {
                        alert('--------')
                    }

                })

            }else {
                $('#add-new-event').click(function (e) {
                    console.log('kdkj')
                    var start = $('#start2').val();
                    var end = $('#end2').val();
                    console.log(start)
                    console.log(end)
                    $.ajax({
                        url: "/postappointment",
                        type: "POST",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                        data: {
                            title: "Holidays",
                            backgroundColor: '#228f3b',
                            borderColor: '#228f3b',
                            start: start,
                            end: end,
                            allDay : true,
                            doctor_id : doctor_id,
                            statu:statu
                        },
                        cache: false,
                        success: function (dataResult) {
                            console.log(dataResult);
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                window.location = "/appointment?id="+doctor_id;
                            } else if (dataResult.statusCode == 201) {
                                alert("Error occured !");
                            }

                        }
                    });
                })
            }




    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
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

            if (weekday[d.getDay()]) {
                // console.log('admin/inscription/getsessions/'+id_formation)
                $.ajax({
                    url: '/appointment/getdays/'+doctor_id+'/' + weekday[d.getDay()],
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {

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
@livewireScripts
@livewireCalendarScripts
</body>
</html>




