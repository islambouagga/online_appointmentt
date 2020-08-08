<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <link rel="icon" href="{{asset('favicon.png')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Medico</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-daygrid/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-timegrid/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-bootstrap/main.min.css')}}">
    <script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-daygrid/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-timegrid/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-bootstrap/main.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    @livewireStyles
</head>

<body>
<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-white">
                    <a class="navbar-brand" href="{{route('welcome')}}"> <img src="{{asset('img/logo.png')}}"
                                                                              alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-center"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('welcome')}}">Home</a>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('about')}}">about</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('myappointment')}}">My Appointment</a>
                                </li>
                            @endguest

                        </ul>
                    </div>
                    @guest
                        <a class="btn_2 d-none d-lg-block" href="{{ route('login') }}">Log In / Sing Up <i
                                class="fas fa-sign-in-alt"></i></a>
                    @else

                        <a class="btn_2 d-none d-lg-block" href="{{ route('logout') }}"

                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">

                            {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i> </a>
                    @endguest
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </nav>

                @guest
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                @livewire('search-bar')
                            </div>
                        </div>
                    </div>
                @endguest
                @can('isUser' )
{{--                    <div class="panel panel-default">--}}
{{--                        <div class="panel-body">--}}
{{--                            <div class="form-group">--}}
{{--                                @livewire('search-bar')--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                @endcan
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<section class="content">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-body">
                                <!-- the events -->
                                <div id="external-events">
                                    <div class="card-body box-profile">

                                        @foreach($doctor->users as $user)
                                            <h3 class="profile-username text-center">{{$doctor->Dfname}} {{$user->name}}</h3>

                                            <p class="text-muted text-center">{{$doctor->specialty->namespec}}</p>

                                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                            <p class="text-muted">
                                                {{$doctor->Ddiploma}}
                                            </p>

                                            <hr>

                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                            <p class="text-muted">     {{$doctor->Padresse}}</p>

                                            <hr>

                                            <strong><i class="fas fa-calendar-day mr-1"></i> Work Days </strong>

                                            <p class="text-muted">
                                                @foreach($doctor->days()->get() as $day )
                                                    <span class="tag tag-danger">{{$day->day}}. </span>
                                                @endforeach
                                            </p>
                                            <hr>

                                            <strong><i class="fas fa-star-half-alt mr-1"></i> Rate</strong>

                                            <p class="text-muted">

                                                <span class="tag tag-danger">{{$doctor->rate}} / 5 . </span>


                                            </p>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary progress-bar-striped"
                                                     role="progressbar"
                                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                     style="width:{{$doctor->rate * 20}}%">

                                                </div>
                                            </div>
                                            <hr>

                                            <strong><i class="fas fa-hand-holding-usd mr-1"></i> Appointment Price
                                            </strong>

                                            <p class="text-muted">

                                                <span class="tag tag-danger">{{$doctor->Price}} <i
                                                        class="fas fa-dollar-sign mr-1"></i>. </span>

                                            </p>

                                            <hr>

                                            <strong><i class="far fa-clock mr-1"></i> Work Times</strong>

                                            <p class="text-muted"><i class="fas fa-coffee mr-1"></i> Morning Work
                                                Times {{$doctor->MWTStart}} - {{$doctor->MWTEnd}}.</p>
                                            <p class="text-muted"><i class="fas fa-cloud-moon mr-1"></i> Evening Work
                                                Times {{$doctor->EWTStart}} - {{$doctor->EWTEnd}}.</p>
                                        @endforeach

                                        {{--                                    <button type="button"  class="btn btn-primary" @if(\Illuminate\Support\Facades\Auth::check())  data-toggle="modal"--}}
                                        {{--                                       data-target="#exampleModal" @else href="{{route('login')}}"  @endif><b style="color: white">Make an appointment</b></button>--}}


                                        <button type="button" class="btn btn-primary"
                                                @if(\Illuminate\Support\Facades\Auth::check())  data-toggle="modal"
                                                data-target="#exampleModal" @else href="{{route('login')}}" @endif>Make
                                            an appointment
                                        </button>
                                        <hr>
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                        <form role="form" method="post" action="{{route('rateDoc',$doctor->id)}}">

                                            {{method_field('PATCH')}}
                                            {{csrf_field()}}
                                            <div class="form-group">

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-map-marker-alt"></i></span>
                                                    </div>
                                                    <input type="number" min="0" max="5" id="ratee" name="ratee"
                                                           class="form-control ">
                                                </div>
                                            </div>


                                            <input type="submit" value="Rate" class="btn btn-success">

                                        </form>
                                                @endif

                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
                <!-- /.col --><input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
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
    </div>
    <input type="hidden" id="doctor_id" name="doctor_id"
           value="{{$doctor_id}}">

</section>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="inputEstimatedBudget">Date </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <input type="date" id="start" name="start"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <select class="form-control select2" name="time2" id="time2" style="width: 100%;">

                        </select>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <input type="hidden" id="patient_id" name="patient_id"
                               value="{{Auth::user()->usertable_id}}">
                    @endif
                    <input type="hidden" id="statu" name="statu"
                           value="request">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="add-new-event" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- footer part start-->
<footer class="footer-area">
    <div class="footer section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-2 col-md-4 col-sm-6 single-footer-widget">
                    <a href="#" class="footer_logo"> <img src="img/logo.png" alt="#"> </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>
                    <div class="social_logo">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"> <i class="ti-twitter"></i> </a>
                        <a href="#"><i class="ti-instagram"></i></a>
                        <a href="#"><i class="ti-skype"></i></a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Department</a></li>
                        <li><a href="#"> Online payment</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Department</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                    <h4>Explore</h4>
                    <ul>
                        <li><a href="#">In the community</a></li>
                        <li><a href="#">IU health foundation</a></li>
                        <li><a href="#">Family support </a></li>
                        <li><a href="#">Business solution</a></li>
                        <li><a href="#">Community clinic</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 col-md-6 single-footer-widget">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Lights were season</a></li>
                        <li><a href="#"> Their is let wherein</a></li>
                        <li><a href="#">which given over</a></li>
                        <li><a href="#">Without given She</a></li>
                        <li><a href="#">Isn two signs think</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-6 single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>Seed good winged wherein which night multiply
                        midst does not fruitful</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank"
                              action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                   required="" type="email">
                            <button class="click-btn btn btn-default text-uppercase"><i class="ti-angle-right"></i>
                            </button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                       type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright_part">
        <div class="container">
            <div class="row align-items-center">
                <p class="footer-text m-0 col-lg-8 col-md-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a
                        href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"> <i class="ti-twitter"></i> </a>
                    <a href="#"><i class="ti-instagram"></i></a>
                    <a href="#"><i class="ti-skype"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- footer part end-->

<!-- jquery plugins here-->

<script src="{{asset('js/jquery-1.12.1.min.js')}}"></script>
<!-- popper js -->
<script src="{{asset('js/popper.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- owl carousel js -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<!-- contact js -->
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/contact.js')}}"></script>
<!-- custom js -->
<script src="{{{asset('js/custom.js')}}}"></script>

<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-daygrid/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-timegrid/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-interaction/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-bootstrap/main.min.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

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
<!-- Page specific script -->
<script>
    $(function () {


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
        var patient_id = $('#patient_id').val();
        var statu = $('#statu').val();
        console.log(doctor_id)
        $.ajax({
            url: 'getappointments/' + doctor_id,
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
                        doctor_id: doctor_id,

                    },
                    cache: false,
                    success: function (dataResult) {
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            window.location = "/appointment?id=" + doctor_id;
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

        $('#add-new-event').click(function (e) {
            console.log('kdkj')
            var start = $('#start').val();
            var end = $('#time2').val();
            var plus = start + " " + end
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
            if (jArray.includes(weekday[daystart.getDay()])) {
                $.ajax({
                    url: "/postappointment",
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    data: {
                        title: "Appointment",
                        backgroundColor: '#8f8622',
                        borderColor: '#8f8622',
                        start: daystart.getFullYear() + "-" + (daystart.getMonth() + 1) + "-" + daystart.getDate() + " " + daystart.getHours() + ":" + daystart.getMinutes() + ":" + daystart.getSeconds(),
                        end: dayend.getFullYear() + "-" + (dayend.getMonth() + 1) + "-" + dayend.getDate() + " " + dayend.getHours() + ":" + dayend.getMinutes() + ":" + dayend.getSeconds(),
                        allDay: false,
                        doctor_id: doctor_id,
                        patient_id: patient_id,
                        statu: statu
                    },
                    cache: false,
                    success: function (dataResult) {
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            window.location = "/myappointment";
                        } else if (dataResult.statusCode == 201) {
                            alert("Error occured !");
                        }

                    }
                });
            } else {
                alert('--------')
            }

        })

        $('#ratee').click(function (e) {
            console.log('rate func')


            // $.ajax({
            //     url: "/postappointment",
            //     type: "POST",
            //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
            //     data: {
            //         title: "Appointment",
            //         backgroundColor: '#8f8622',
            //         borderColor: '#8f8622',
            //         start: daystart.getFullYear() + "-" + (daystart.getMonth() + 1) + "-" + daystart.getDate() + " " + daystart.getHours() + ":" + daystart.getMinutes() + ":" + daystart.getSeconds(),
            //         end: dayend.getFullYear() + "-" + (dayend.getMonth() + 1) + "-" + dayend.getDate() + " " + dayend.getHours() + ":" + dayend.getMinutes() + ":" + dayend.getSeconds() ,
            //         allDay : false,
            //         doctor_id : doctor_id,
            //         patient_id : patient_id,
            //         statu:statu
            //     },
            //     cache: false,
            //     success: function (dataResult) {
            //         console.log(dataResult);
            //         var dataResult = JSON.parse(dataResult);
            //         if (dataResult.statusCode == 200) {
            //             window.location = "/myappointment";
            //         } else if (dataResult.statusCode == 201) {
            //             alert("Error occured !");
            //         }
            //
            //     }
            // });


        })
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
            var d = new Date(day)
            console.log(weekday[d.getDay()])

            if (weekday[d.getDay()]) {
                // console.log('admin/inscription/getsessions/'+id_formation)
                $.ajax({
                    url: '/appointment/getdays/' + doctor_id + '/' + weekday[d.getDay()],
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
<script>
    $(document).ready(function () {


    });
</script>
@livewireScripts
</body>

</html>
