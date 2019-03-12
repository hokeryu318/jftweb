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
                @foreach($table_obj as $key => $table)
                    @if(count($table->order) > 0)
                        <div class="table-common" onclick="window.location='{{ route("reception.addCustomer", [ "table_id" => $table->id, 'order_id' => $table->order[0]->id ]) }}'" style="margin: {{$table['y']*20}}px 10px 10px {{$table['x']*20}}px;">
                            @if($table->type == 1){{--A--}}
                                <div class="white table-a-style text-center">
                                    @if(in_array($table->id, $order_tables) && (count($table->order[0]->ordertables) > 1))
                                        <img class="table_a_red_plus" src="{{asset('img/plus_red.png')}}">
                                    @endif
                                    <a class="font-weight-bold grey-text">{{$table_type[$table->type]."-".$table->index}}
                                        <br>{{$table->order[0]->guest}}
                                    </a>
                                </div>
                            @elseif($table->type == 2){{--B--}}
                                <div class="chair-b-style chair-top-b-style"></div>
                                <div class="white table-b-style text-center">
                                    @if(in_array($table->id, $order_tables) && (count($table->order[0]->ordertables) > 1))
                                        <img class="table_bc_red_plus" src="{{asset('img/plus_red.png')}}">
                                    @endif
                                    <a class="font-weight-bold grey-text">{{$table_type[$table->type]."-".$table->index}}
                                        <br>{{$table->order[0]->guest}}
                                    </a>
                                </div>
                                <div class="chair-b-style chair-bottom-b-style"></div>
                            @elseif($table->type == 3){{--C--}}
                                <div class="chair-c-style chair-top-c-style"></div>
                                <div class="chair-top-c-style"></div>
                                <div class="white table-c-style text-center">
                                    @if(in_array($table->id, $order_tables) && (count($table->order[0]->ordertables) > 1))
                                        <img class="table_bc_red_plus" src="{{asset('img/plus_red.png')}}">
                                    @endif
                                    <a class="font-weight-bold grey-text">{{$table_type[$table->type]."-".$table->index}}
                                        <br>{{$table->order[0]->guest}}
                                    </a>
                                </div>
                                <div class="chair-c-style chair-bottom-c-style"></div>
                                <div class="chair-bottom-c-style"></div>
                            @endif
                        </div>
                    @else
                        <div class="table-common" id="selected-{{$key}}" onclick="window.location='{{ route("reception.addCustomer", [ "table_id" => $table->id, 'order_id' => 0 ]) }}'" style="margin: {{$table['y']*20}}px 10px 10px {{$table['x']*20}}px;">
                            @if($table->type == 1){{--A--}}
                                <div class="white table-a-style-disable text-center">
                                    @if(in_array($table->id, $order_tables) && (count($table->order[0]->ordertables) > 1))
                                        <img class="table_a_red_plus" src="{{asset('img/plus_red.png')}}">
                                    @endif
                                    <a class="font-weight-bold grey-text">{{$table_type[$table->type]."-".$table->index}}</a>
                                </div>
                            @elseif($table->type == 2){{--B--}}
                                <div class="chair-b-style chair-top-b-style-disable"></div>
                                <div class="white table-b-style-disable text-center">
                                    @if(in_array($table->id, $order_tables) && (count($table->order[0]->ordertables) > 1))
                                        <img class="table_bc_red_plus" src="{{asset('img/plus_red.png')}}">
                                    @endif
                                    <a class="font-weight-bold grey-text">{{$table_type[$table->type]."-".$table->index}}</a>
                                </div>
                                <div class="chair-b-style chair-bottom-b-style-disable"></div>
                            @elseif($table->type == 3){{--C--}}
                                <div class="chair-c-style chair-top-c-style-disable"></div>
                                <div class="chair-top-c-style-disable"></div>
                                <div class="white table-c-style-disable text-center">
                                    @if(in_array($table->id, $order_tables) && (count($table->order[0]->ordertables) > 1))
                                        <img class="table_bc_red_plus" src="{{asset('img/plus_red.png')}}">
                                    @endif
                                    <a class="font-weight-bold grey-text">{{$table_type[$table->type]."-".$table->index}}</a>
                                </div>
                                <div class="chair-c-style chair-bottom-c-style-disable"></div>
                                <div class="chair-bottom-c-style-disable"></div>
                            @endif
                        </div>
                    @endif
                    @if($table->type == 4){{--Line--}}
                        <div class="table-common" style="margin: {{$table['y']*20}}px 10px 10px {{$table['x']*20}}px;">
                            <div class="text-center line-style"
                                 @if($table->index == "1"){{--right--}}
                                 style="padding-right: 200px;"
                                 @else
                                 style="padding-bottom: 200px;"
                                    @endif>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="table_detail col-4">
        <div class="row tab-header">
            <a class="col-4 black-text">
                <span class="font-weight-bold">SEATED</span>
                <img src="{{ asset('img/seated.png') }}"/>
                <span class="font-weight-bold" style="font-size: 25px;padding-left: 5px;">{{ count($order_tables) }}</span>
                <div class="tab_activate"></div>
            </a>
            <a href="{{route('reception.waiting')}}" class="col-4 black-text">
                <span class="font-weight-bold">WAITING</span>
                <img src="{{ asset('img/waiting.png') }}"/>
                <span class="font-weight-bold" style="font-size: 25px;">28</span>
            </a>
            <a href="{{route('reception.booking')}}" class="col-4 black-text">
                <span class="font-weight-bold">BOOKING</span>
                <img src="{{ asset('img/bookings.png') }}"/>
                <span class="font-weight-bold" style="font-size: 25px;">28</span>
            </a>
        </div>
        <div class="row" style="height:470px;overflow-x:hidden; overflow-y:auto;width: 325px;">

            @foreach($order_obj as $order)
                @foreach($order->table_display_ids as $key => $ordertables)
{{--                    <div @if(fmod($key,2) == 0) class="border w-100 pt-2 pr-1 bg-lightgrey table_seated_list" @else class="border w-100 pt-2 pr-1 bg-dark-grey table_seated_list" @endif>--}}
                    <div class="border w-100 pt-2 pr-1 bg-lightgrey table_seated_list">
                        <div class="row w-100 p-0 m-0">
                            <div class="col-lg-3 pr-0 col-xl-3">
                                <div class="row p-0 m-0">
                                    <p class="red-text font-weight-bold ml-0">0 min</p>
                                </div>
                                <div class="row table_name">
                                    <p class="res-table pl-1 p-0 m-0 pt-3 text-center font-weight-bold">
                                        @if(count($order->table_display_ids) > 1)
                                            <img src="{{asset('img/plus_red.png')}}" class="corner">
                                        @endif
                                        {{ $ordertables }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-0 col-xl-6">
                                <div class="row p-0 m-0">
                                    <img class="alarm" src="{{ asset('img/calling.png') }}">
                                    <img class="alarm" src="{{ asset('img/alarm.png') }}">
                                    <img class="alarm" src="{{ asset('img/msg.png') }}">
                                    <img class="alarm" src="{{ asset('img/note.png') }}">
                                </div>
                                <div class="row pl-4 pt-2">
                                    <p class=" pfont mb-0 black-text">{{ $order->customer_name }}<br>{{ $order->display_time }}</p>
                                </div>
                            </div>
                            <div class="offset-1 col-2 pr-0 text-right">
                                <div class="row pl-2">
                                    <img src="{{asset('img/head1.png')}}" width="20" height="20"><p class="font-weight-bold middle-ver">{{ $order->guest }}</p>
                                </div>
                                <div class="row mt-4 pl-1">
                                    <img src="{{asset('img/chat1.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach

            {{--<div class="border w-100 pt-2 pr-1 bg-lightgrey table_seated_list">--}}
                {{--<div class="row w-100 p-0 m-0">--}}
                    {{--<div class="col-lg-3 pr-0 col-xl-3"><div class="row p-0 m-0">--}}
                            {{--<p class="red-text font-weight-bold ml-0">0 min</p>--}}
                        {{--</div>--}}
                        {{--<div class="row table_name">--}}
                            {{--<p class="res-table pl-1 p-0 m-0 pt-3 text-center font-weight-bold">--}}
                                {{--<img src="{{asset('img/plus_red.png')}}" class="corner">A-1 </p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6 pr-0 col-xl-6">--}}
                        {{--<div class="row p-0 m-0">--}}
                            {{--<img class="alarm" src="{{asset('img/calling.png')}}">--}}
                            {{--<img class="alarm" src="{{asset('img/alarm.png')}}">--}}
                            {{--<img class="alarm" src="{{asset('img/msg.png')}}">--}}
                            {{--<img class="alarm" src="{{asset('img/note.png')}}">--}}
                        {{--</div>--}}
                        {{--<div class="row pl-4 pt-2">--}}
                            {{--<p class=" pfont mb-0 black-text">Delta <br> Ingrambloomburry<br> 6:30 PM</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="offset-1 col-2 pr-0 text-right"><div class="row pl-2">--}}
                            {{--<img src="{{asset('img/head1.png')}}" width="20" height="20"><p class="font-weight-bold middle-ver">1</p>--}}
                        {{--</div>--}}
                        {{--<div class="row mt-4 pl-1">--}}
                            {{--<img src="{{asset('img/chat1.png')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="border w-100 pt-2 pr-1 bg-dark-grey table_seated_list">--}}
                {{--<div class="row w-100 p-0 m-0">--}}
                    {{--<div class="col-lg-3 pr-0 col-xl-3"><div class="row p-0 m-0">--}}
                            {{--<p class="red-text red-text font-weight-bold ml-0">0 min</p>--}}
                        {{--</div>--}}
                        {{--<div class="row table_name">--}}
                            {{--<p class="res-table pl-1 p-0 m-0 pt-3 text-center font-weight-bold">--}}
                                {{--<img src="{{asset('img/plus_red.png')}}" class="corner">A-1 </p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6 pr-0 col-xl-6">--}}
                        {{--<div class="row p-0 m-0">--}}
                            {{--<img class="alarm" src="{{asset('img/calling.png')}}">--}}
                            {{--<img class="alarm" src="{{asset('img/alarm.png')}}">--}}
                            {{--<img class="alarm" src="{{asset('img/msg.png')}}">--}}
                            {{--<img class="alarm" src="{{asset('img/note.png')}}">--}}
                        {{--</div>--}}
                        {{--<div class="row pl-4 pt-2">--}}
                            {{--<p class=" pfont mb-0 black-text">Delta <br> Ingrambloomburry<br> 6:30 PM</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="offset-1 col-2 pr-0 text-right"><div class="row pl-2">--}}
                            {{--<img src="{{asset('img/head1.png')}}" width="20" height="20"><p class="font-weight-bold middle-ver">1</p>--}}
                        {{--</div>--}}
                        {{--<div class="row mt-4 pl-1">--}}
                            {{--<img src="{{asset('img/chat1.png')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <div class="row">
            <a href="{{ route("reception.addCustomer", [ "table_id" => 0, 'order_id' => 0 ]) }}" class="new_customer_btn white-text text-center pt-3 pb-5">New Customer <span class="ml-4">&gt;</span> </a>
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