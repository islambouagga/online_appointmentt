@extends('layouts.theme')

@section('content')


    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Appointment's List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Day and time</th>
                            <th>Doctor</th>
                            <th>Statu</th>
                            <th>delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($appointments as $appointment )

                                <tr>
                                    <td>{{$appointment->start}} </td>
                                    @foreach($appointment->doctor()->get() as $doc)
                                        @foreach($doc->users as $user)
                                    <td>{{$doc->Dfname}} {{$user->name}}</td>
                                        @endforeach
                                    @endforeach
                                    <td>          <span class="badge @if($appointment->statu == "approved") badge-success

                                                          @elseif($appointment->statu == "request") badge-warning
                                        @elseif($appointment->statu == "cancel") badge-danger

                                            @elseif($appointment->statu == "changed") badge-info @endif ">{{$appointment->statu}}</span></td>
                                    <td>
                                        <form role="form" method="post"
                                              action="{{route('appointment.destroy',$appointment->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn"><i class="fas fa-trash red"
                                                                                 style="color: red"></i></button>
                                        </form>
                                    </td>
                                </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>

            <!-- /.card -->

@endsection
