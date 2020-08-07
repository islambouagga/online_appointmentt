<div class="container">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            </div>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search.. name"
                                wire:model="search"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>

                            <select class="form-control select2"
                                    wire:model="location"
                                    style="width: 100%;">
                                <option selected  value="" >Select a Location </option>
                                @foreach( $local as $locals)
                                    <option >{{$locals}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clipboard-list"></i></span>
                            </div>

                            <select class="form-control select2"
                                    wire:model="special"
                                    style="width: 100%;">
                                <option selected value="">Select a Specialty</option>
                                @foreach( $specialties2 as $specia)
                                    <option value="{{$specia->id}}" >{{$specia->namespec}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div wire:loading class="col-md-6">
                    <div class="list-item">Searching...</div>
                </div>
                @if(!empty($search) or !empty($location) or !empty($special))
                    <div class="col-md-6" style="overflow-y: scroll ; height: 300px">
{{--                        @if(!empty($establishments))--}}

{{--                            <div class="list-group" >--}}
{{--                                @foreach($establishments as $establishment)--}}
{{--                                    <button type="button" class="list-group-item list-group-item-action">--}}
{{--                                        <i class="fas fa-hospital"></i>--}}
{{--                                        {{$establishment['Ename']}}</button>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

{{--                        @endif--}}

                        @if(!empty($doctors))

                            <div class="list-group" >
                                @foreach($doctors as $doctor)
                                    @foreach($doctor->users as $user)

                                        <a type="button" href="{{url('appointment?id='.$doctor->id)}}"
                                           class="btn list-group-item list-group-item-action">
                                            <i class="fas fa-user-md "></i>
                                            {{$user->name}} {{$doctor['Dfname']}}</a>
                                    @endforeach
                                @endforeach
                            </div>

                        @endif

{{--                        @if(!empty($specialties))--}}

{{--                            <div class="list-group">--}}
{{--                                @foreach($specialties as $specialty)--}}
{{--                                    <button type="button"--}}
{{--                                            class="list-group-item list-group-item-action">{{$specialty['namespec']}}</button>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

{{--                        @endif--}}
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>


