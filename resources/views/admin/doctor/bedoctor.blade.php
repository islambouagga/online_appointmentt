@extends('layouts.theme')

@section('content')

    <section class="content">
{{--        <div class="container">--}}
            <div class="container-fluid">

    <form role="form" method="post" action="{{route('doctor.store')}} ">
        @csrf
        <div class="row  h-100 justify-content-center align-items-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">

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
                                            <select class="form-control select2"  name="specialty" data-placeholder="Select a specialty" style="width: 100%;">
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
                                                <option selected >Sunday</option>
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
                </div>
                <div id='2'>
                    <div class="row">
                        <div class="col-md-6">
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
<input type="hidden" name="approved" value="request">
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">

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
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="/" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Submit" class="btn_2 d-none d-lg-block float-right">
                    </div>
                </div>
            </div>
        </div>
    </form>
            </div>
{{--        </div>--}}
    </section>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
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
                    ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
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

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function(){
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
@endsection
