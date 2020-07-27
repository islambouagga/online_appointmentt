@extends('layouts.matser')

@section('content')
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>Establishment's List Page</h1>
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
            <img src="{{asset('svg/ability_img.png')}}" width="500" height="400">
        </div>
    </div>
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Establishment's List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Telephone</th>
                            <th>Address</th>
                            <th>Type</th>
                            <th>Email</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($establishments as $establishment )
                            <tr>
                                <td>{{$establishment->Ename}}</td>
                                <td>{{$establishment->Etel}}</td>
                                <td>{{$establishment->Eadresse}}</td>
                                <td>{{$establishment->Etype}}</td>
                                <td>{{$establishment->Eemail}}</td>
                                <td class="row">
                                    <a class="btn" href="{{route('establishment.show',$establishment->id)}}"><i
                                            class="fas fa-edit"
                                            style="color: #00f169"></i></a>
                                    |

                                    <form role="form" method="post"
                                          action="{{route('establishment.destroy',$establishment->id)}}">
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection
