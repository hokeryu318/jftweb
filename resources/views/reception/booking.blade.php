@extends('layout.admin_layout')
@section('title', 'Reception')
@section('content')
<div style="padding-top:4%;"></div>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="text-center exit_fullscreen display-none" id="exit-fullscreen">
            <span class="white-text font-weight-bold exit_fullscreen_letter">EXIT FULL SCREEN</span>
            <img src="{{ asset('img/exit-fullscreen.png') }}"/>
        </div>
    </div>
    <div class="row">
        <div class="col-1 pr-0 pl-0 text-center" id="display-method">
            <div class="text-center display_all_content" id="display-all">
                <img src="{{ asset('img/arrow.png') }}" class="display_all_btn"/>
                <p class="white-text font-weight-bold display_all">DISPLAY ALL TABLE</p>
            </div>
            <div class="text-center display_scale">
                <img src="{{ asset('img/plus_full.png') }}" class="plus_btn" onclick="tableZoomIn()"/>
                <p class="font-weight-bold pt5 scale_value" id="scale-value">100%</p>
                <img src="{{ asset('img/minus.png') }}" class="minus_btn" onclick="tableZoomOut();"/>
            </div>
        </div>
        <div class="col-7 room-content">
            <div class="room-div">
                @foreach($tables as $key => $table)
                    <div class="table-common" id="selected-{{$key}}" onclick="selectObject('{{$table["id"]}}', '{{$table["type"]}}')" style="margin: {{$table['y']*20}}px 10px 10px {{$table['x']*20}}px;">
                        @if($table["type"] == 1){{--A--}}
                            <div class="white table-a-style text-center">
                                <h5 class="font-weight-bold grey-text">{{$table_type[$table["type"]]."-".$table["index"]}}</h5>
                            </div>
                        @elseif($table["type"] == 2){{--B--}}
                            <div class="chair-b-style chair-top-style"></div>
                            <div class="white table-b-style text-center">
                                <h5 class="font-weight-bold grey-text">{{$table_type[$table["type"]]."-".$table["index"]}}</h5>
                            </div>
                            <div class="chair-b-style chair-bottom-style"></div>
                        @elseif($table["type"] == 3){{--C--}}
                            <div class="chair-c-style chair-top-style"></div>
                            <div class="chair-top-style"></div>
                            <div class="white table-c-style text-center">
                                <h5 class="font-weight-bold grey-text">{{$table_type[$table["type"]]."-".$table["index"]}}</h5>
                            </div>
                            <div class="chair-c-style chair-bottom-style"></div>
                            <div class="chair-bottom-style"></div>
                        @elseif($table["type"] == 4){{--Line--}}
                            <div class="text-center line-style"
                                 @if($table['index'] == "1"){{--right--}}
                                 style="padding-right: 200px;"
                                 @else
                                 style="padding-bottom: 200px;"
                                    @endif>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="table_detail col-4">
        <div class="row tab-header">
            <a href="{{route('reception.seated')}}" class="black-text col-4">
                <span class="font-weight-bold">SEATED</span>
                <img src="{{ asset('img/seated.png') }}"/>
                <span class="font-weight-bold">28</span>
            </a>
            <a href="{{route('reception.waiting')}}" class="black-text col-4">
                <span class="font-weight-bold">WAITING</span>
                <img src="{{ asset('img/waiting.png') }}"/>
                <span class="font-weight-bold">28</span>
            </a>
            <a class="black-text col-4">
                <span class="font-weight-bold">BOOKING</span>
                <img src="{{ asset('img/bookings.png') }}"/>
                <span class="font-weight-bold">28</span>
                <div class="tab_activate"></div>
            </a>
        </div>
        <div class="row" style="height:470px;overflow-x:hidden; overflow-y:auto;width: 325px;">
            <div class="border w-100 pt-2 pr-1 bg-lightgrey table_seated_list">
                <div class="row w-100 p-0 m-0">
                    <div class="col-lg-3 pr-0 col-xl-3"><div class="row p-0 m-0">
                            <p class="red-text red-text font-weight-bold ml-0">0 min</p>
                        </div>
                        <div class="row table_name">
                            <p class="res-table pl-1 p-0 m-0 pt-3 text-center font-weight-bold">
                                <img src="{{asset('img/plus_red.png')}}" class="corner">A-1 </p>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-0 col-xl-6">
                        <div class="row p-0 m-0">
                            <img class="alarm" src="{{asset('img/calling.png')}}">
                            <img class="alarm" src="{{asset('img/alarm.png')}}">
                            <img class="alarm" src="{{asset('img/msg.png')}}">
                            <img class="alarm" src="{{asset('img/note.png')}}">
                        </div>
                        <div class="row pl-4 pt-2">
                            <p class=" pfont mb-0 black-text">Delta <br> Ingrambloomburry<br> 6:30 PM</p>
                        </div>
                    </div>
                    <div class="offset-1 col-2 pr-0 text-right"><div class="row pl-2">
                            <img src="{{asset('img/head1.png')}}" width="20" height="20"><p class="font-weight-bold middle-ver">1</p>
                        </div>
                        <div class="row mt-4 pl-1">
                            <img src="{{asset('img/chat1.png')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border w-100 pt-2 pr-1 bg-dark-grey table_seated_list">
                <div class="row w-100 p-0 m-0">
                    <div class="col-lg-3 pr-0 col-xl-3"><div class="row p-0 m-0">
                            <p class="red-text red-text font-weight-bold ml-0">0 min</p>
                        </div>
                        <div class="row table_name">
                            <p class="res-table pl-1 p-0 m-0 pt-3 text-center font-weight-bold">
                                <img src="{{asset('img/plus_red.png')}}" class="corner">A-1 </p>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-0 col-xl-6">
                        <div class="row p-0 m-0">
                            <img class="alarm" src="{{asset('img/calling.png')}}">
                            <img class="alarm" src="{{asset('img/alarm.png')}}">
                            <img class="alarm" src="{{asset('img/msg.png')}}">
                            <img class="alarm" src="{{asset('img/note.png')}}">
                        </div>
                        <div class="row pl-4 pt-2">
                            <p class=" pfont mb-0 black-text">Delta <br> Ingrambloomburry<br> 6:30 PM</p>
                        </div>
                    </div>
                    <div class="offset-1 col-2 pr-0 text-right"><div class="row pl-2">
                            <img src="{{asset('img/head1.png')}}" width="20" height="20"><p class="font-weight-bold middle-ver">1</p>
                        </div>
                        <div class="row mt-4 pl-1">
                            <img src="{{asset('img/chat1.png')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border w-100 pt-2 pr-1 bg-lightgrey table_seated_list">
                <div class="row w-100 p-0 m-0">
                    <div class="col-lg-3 pr-0 col-xl-3"><div class="row p-0 m-0">
                            <p class="red-text red-text font-weight-bold ml-0">0 min</p>
                        </div>
                        <div class="row table_name">
                            <p class="res-table pl-1 p-0 m-0 pt-3 text-center font-weight-bold">
                                <img src="{{asset('img/plus_red.png')}}" class="corner">A-1 </p>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-0 col-xl-6">
                        <div class="row p-0 m-0">
                            <img class="alarm" src="{{asset('img/calling.png')}}">
                            <img class="alarm" src="{{asset('img/alarm.png')}}">
                            <img class="alarm" src="{{asset('img/msg.png')}}">
                            <img class="alarm" src="{{asset('img/note.png')}}">
                        </div>
                        <div class="row pl-4 pt-2">
                            <p class=" pfont mb-0 black-text">Delta <br> Ingrambloomburry<br> 6:30 PM</p>
                        </div>
                    </div>
                    <div class="offset-1 col-2 pr-0 text-right"><div class="row pl-2">
                            <img src="{{asset('img/head1.png')}}" width="20" height="20"><p class="font-weight-bold middle-ver">1</p>
                        </div>
                        <div class="row mt-4 pl-1">
                            <img src="{{asset('img/chat1.png')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border w-100 pt-2 pr-1 bg-dark-grey table_seated_list">
                <div class="row w-100 p-0 m-0">
                    <div class="col-lg-3 pr-0 col-xl-3"><div class="row p-0 m-0">
                            <p class="red-text red-text font-weight-bold ml-0">0 min</p>
                        </div>
                        <div class="row table_name">
                            <p class="res-table pl-1 p-0 m-0 pt-3 text-center font-weight-bold">
                                <img src="{{asset('img/plus_red.png')}}" class="corner">A-1 </p>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-0 col-xl-6">
                        <div class="row p-0 m-0">
                            <img class="alarm" src="{{asset('img/calling.png')}}">
                            <img class="alarm" src="{{asset('img/alarm.png')}}">
                            <img class="alarm" src="{{asset('img/msg.png')}}">
                            <img class="alarm" src="{{asset('img/note.png')}}">
                        </div>
                        <div class="row pl-4 pt-2">
                            <p class=" pfont mb-0 black-text">Delta <br> Ingrambloomburry<br> 6:30 PM</p>
                        </div>
                    </div>
                    <div class="offset-1 col-2 pr-0 text-right"><div class="row pl-2">
                            <img src="{{asset('img/head1.png')}}" width="20" height="20"><p class="font-weight-bold middle-ver">1</p>
                        </div>
                        <div class="row mt-4 pl-1">
                            <img src="{{asset('img/chat1.png')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border w-100 pt-2 pr-1 bg-lightgrey table_seated_list">
                <div class="row w-100 p-0 m-0">
                    <div class="col-lg-3 pr-0 col-xl-3"><div class="row p-0 m-0">
                            <p class="red-text red-text font-weight-bold ml-0">0 min</p>
                        </div>
                        <div class="row table_name">
                            <p class="res-table pl-1 p-0 m-0 pt-3 text-center font-weight-bold">
                                <img src="{{asset('img/plus_red.png')}}" class="corner">A-1 </p>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-0 col-xl-6">
                        <div class="row p-0 m-0">
                            <img class="alarm" src="{{asset('img/calling.png')}}">
                            <img class="alarm" src="{{asset('img/alarm.png')}}">
                            <img class="alarm" src="{{asset('img/msg.png')}}">
                            <img class="alarm" src="{{asset('img/note.png')}}">
                        </div>
                        <div class="row pl-4 pt-2">
                            <p class=" pfont mb-0 black-text">Delta <br> Ingrambloomburry<br> 6:30 PM</p>
                        </div>
                    </div>
                    <div class="offset-1 col-2 pr-0 text-right"><div class="row pl-2">
                            <img src="{{asset('img/head1.png')}}" width="20" height="20"><p class="font-weight-bold middle-ver">1</p>
                        </div>
                        <div class="row mt-4 pl-1">
                            <img src="{{asset('img/chat1.png')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border w-100 pt-2 pr-1 bg-dark-grey table_seated_list">
                <div class="row w-100 p-0 m-0">
                    <div class="col-lg-3 pr-0 col-xl-3"><div class="row p-0 m-0">
                            <p class="red-text red-text font-weight-bold ml-0">0 min</p>
                        </div>
                        <div class="row table_name">
                            <p class="res-table pl-1 p-0 m-0 pt-3 text-center font-weight-bold">
                                <img src="{{asset('img/plus_red.png')}}" class="corner">A-1 </p>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-0 col-xl-6">
                        <div class="row p-0 m-0">
                            <img class="alarm" src="{{asset('img/calling.png')}}">
                            <img class="alarm" src="{{asset('img/alarm.png')}}">
                            <img class="alarm" src="{{asset('img/msg.png')}}">
                            <img class="alarm" src="{{asset('img/note.png')}}">
                        </div>
                        <div class="row pl-4 pt-2">
                            <p class=" pfont mb-0 black-text">Delta <br> Ingrambloomburry<br> 6:30 PM</p>
                        </div>
                    </div>
                    <div class="offset-1 col-2 pr-0 text-right"><div class="row pl-2">
                            <img src="{{asset('img/head1.png')}}" width="20" height="20"><p class="font-weight-bold middle-ver">1</p>
                        </div>
                        <div class="row mt-4 pl-1">
                            <img src="{{asset('img/chat1.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="{{route('reception.addCustomer')}}" class="new_customer_btn white-text text-center pt-3 pb-5">New Customer <span class="ml-4">&gt;</span> </a>
        </div>
    </div>
</div>
<script>
        $("#display-all").click(function(){
            $("#display-method").hide("slow");
            $("#display-name-container").hide("slow");
            var room_content = $(".room-content");
            $("#saved-width").val(room_content.width());
            room_content.width('100%');
            $("#exit-fullscreen").show('slow');
        });

        $("#exit-fullscreen").click(function() {
            $("#display-method").show("slow");
            $("#display-name-container").show("slow");
            $(".room-content").width($("#saved-width").val());
            $("#exit-fullscreen").hide('slow');
        });

        function tableZoomIn(){
            $(".minus_btn").attr("src", "{{ asset('img/minus.png') }}");
            var scale_value_obj = $("#scale-value");
            var scale_value_all = scale_value_obj.text();
            var scale_value = scale_value_all.slice(0, -1);

            if(scale_value != 100){
                $(".plus_btn").attr("src", "{{ asset('img/plus.png') }}");
                scale_value = parseInt(scale_value) + 10;
                if(scale_value == 100){
                    $(".plus_btn").attr("src", "{{ asset('img/plus_full.png') }}");
                }
                $(".room-div").animate({ 'zoom': scale_value*0.01 }, 400);
            }else{
                $(".plus_btn").attr("src", "{{ asset('img/plus_full.png') }}");
            }
            scale_value_obj.text(scale_value+"%");
        }

        function tableZoomOut(){
            $(".plus_btn").attr("src", "{{ asset('img/plus.png') }}");
            var scale_value_obj = $("#scale-value");
            var scale_value_all = scale_value_obj.text();
            var scale_value = scale_value_all.slice(0, -1);

            if(scale_value > 10){
                scale_value = scale_value - 10;
                if(scale_value == 10){
                    $(".minus_btn").attr("src", "{{ asset('img/minus_full.png') }}")
                }
                $(".room-div").animate({ 'zoom': scale_value*0.01 }, 400);
            }else{
                $(".minus_btn").attr("src", "{{ asset('img/minus_full.png') }}")
            }
            scale_value_obj.text(scale_value+"%");

        }
    </script>
@endsection