@extends('layout.admin_layout')
@section('title', 'Reception')
@section('content')
    <style>
        thead tr{
            border-top:2px solid #1ec2c9;
        }
        .datetimepicker-inline{
            width:100% !important;
        }
        .datetimepicker td, .datetimepicker th{
            border-radius:50px;
        }
        .datetimepicker table tr td.active, .datetimepicker table tr td.active:hover, .datetimepicker table tr td.active.disabled, .datetimepicker table tr td.active.disabled:hover,.datetimepicker table tr td.active:hover, .datetimepicker table tr td.active:hover:hover, .datetimepicker table tr td.active.disabled:hover, .datetimepicker table tr td.active.disabled:hover:hover, .datetimepicker table tr td.active:active, .datetimepicker table tr td.active:hover:active, .datetimepicker table tr td.active.disabled:active, .datetimepicker table tr td.active.disabled:hover:active, .datetimepicker table tr td.active.active, .datetimepicker table tr td.active:hover.active, .datetimepicker table tr td.active.disabled.active, .datetimepicker table tr td.active.disabled:hover.active, .datetimepicker table tr td.active.disabled, .datetimepicker table tr td.active:hover.disabled, .datetimepicker table tr td.active.disabled.disabled, .datetimepicker table tr td.active.disabled:hover.disabled, .datetimepicker table tr td.active[disabled], .datetimepicker table tr td.active:hover[disabled], .datetimepicker table tr td.active.disabled[disabled], .datetimepicker table tr td.active.disabled:hover[disabled]{background-image:none !important;background-color:transparent;color:black;font-weight:bold;border-radius:50px !important;border:2px solid #1ec2c9}
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        table,.datetimepicker > div,.datetimepicker-days{
            width:100% !important;
        }
        .prev{
            background: url("{{asset('images/blue-arrow-prev.png')}}") no-repeat;
        }
        .next{
            background: url("{{asset('images/blue-arrow-next.png')}}") no-repeat;
        }
        #delay-minutes-picker .clone-scroller .option{
            /*visibility: visible;*/
        }
    </style>
    <form method="POST" action="{{ route('reception.store') }}">
    @csrf
        <div class="p-4 mt-5">
        <div class="container-fluid pb-3 position-relative">
            <div class="bg-grey pt-2 pl-2">
                <ul class="nav uldesign">
                    <li class="top-menu-btn font-weight-bold top-menu-active pr-2">
                        <div class="text-center time_menu">
                            <a class="black-text" id="now-tab" onclick="changeTab('home');">
                                <div class="text-center time_menu">Now<br>90 min</div>
                            </a>
                        </div>
                    </li>
                    <li class="top-menu-btn font-weight-bold">
                        <div class="text-center-btn group_menu">
                            <a class="black-text" id="group-tab" onclick="changeTab('group');">
                                <img src="{{asset('img/head1.png')}}" class="mr-2" />Group
                            </a>
                        </div>
                    </li>
                    <li class="top-menu-btn font-weight-bold">
                        <div class="text-center-btn table_menu">
                            <a id="table-tab" class="black-text" onclick="changeTab('table');">
                                <img src="{{asset('img/table_sample.png')}}" class="mr-2" />Table
                            </a>
                        </div>
                    </li>
                    <li class="top-menu-btn font-weight-bold">
                        <div class="text-center-btn table_menu">
                            <a id="name-tab" class="black-text" onclick="changeTab('name');">
                                <div class="text-center time_menu">Ms Jenifer Lo</div>
                            </a>
                        </div>
                    </li>
                    <li class="top-menu-btn font-weight-bold">
                        <div class="text-center-btn table_menu">
                            <a id="notes-tab" class="black-text" onclick="changeTab('notes');">
                                <img src="{{asset('img/note.png')}}" class="mr-2" />Notes
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="container">
                <div class="tab-content">
                    <div id="home" class="container tab-detail"><br>
                        <div class="row">
                            <div class="col-4">
                                <h3 class="date_content_title">TODAY</h3>
                                <div id="datetimepicker12" class="w-100">
                                </div>
                            </div>
                            <div class="col-4 ">
                                <h3 class="time_content_title">NOW</h3>
                                <div id="now-time-picker"></div>
                                <div class="output display-none">0</div>
                            </div>
                            <div class="col-4">
                                <h3 class="time_content_title">30 min</h3>
                                <select>
                                    <option>Takeaway</option>
                                    <option>30 min</option>
                                    <option>60 min</option>
                                    <option>90 min</option>
                                    <option>120 min</option>
                                    <option>Unlimited</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-detail display-none"><br>
                        <div class="offset-2 col-lg-8 col-xl-8 pl-0 ">
                            <input value="0" id="guest-number" class="font-20 font-weight-bold form-control d-inline mr-4 border-guest-input text-center" style="width:36%;" name="guest_number"/>
                            <span class="h3 text-info" style="padding-top:10px;">GUEST</span><br>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text mr-lg-0 mr-xl-3" onclick="onNumber(7)">7</button>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text mr-lg-0 mr-xl-3" onclick="onNumber(8)">8</button>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text" onclick="onNumber(9)">9</button>
                            <br>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text mt-lg-2 mt-xl-4 mr-lg-0 mr-xl-3" onclick="onNumber(4)">4</button>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text mr-lg-0 mr-xl-3" onclick="onNumber(5)">5</button>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text" onclick="onNumber(6)">6</button>
                            <br>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text mt-lg-2 mt-xl-4 mr-lg-0 mr-xl-3" onclick="onNumber(1)">1</button>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text mr-lg-0 mr-xl-3" onclick="onNumber(2)">2</button>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text" onclick="onNumber(3)">3</button>
                            <br>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text mt-lg-2 mr-lg-0 mr-xl-3 mt-xl-4" onclick="onNumber('c')">C</button>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text mr-lg-0 mr-xl-3" onclick="onNumber(0)">0</button>
                            <button type="button" class="number-btn blackgrey border-0 pr-4 pl-4 fs-5 white-text" onclick="onNumber('back')"><-</button>
                        </div>
                    </div>
                    <div id="menu2" class="row container display-none tab-detail"><br>
                        <div class="row">
                            <div class="text-center exit_full_screen display-none" id="exit-fullscreen">
                                <span class="white-text font-weight-bold exit_fullscreen_letter">EXIT FULL SCREEN</span>
                                <img src="{{ asset('img/exit-fullscreen.png') }}"/>
                            </div>
                        </div>
                        <div class="row table-tab-content">
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
                            <div class="col-10 room-content-table">
                                <div class="room-div">
                                    @foreach($tables as $key => $table)
                                        <div class="table-common" id="selected-{{$key}}" onclick="selectObject('{{$table["id"]}}')" style="margin: {{$table['y']*20}}px 10px 10px {{$table['x']*20}}px;">
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
                    </div>
                    <div id="menu3" class="container display-none tab-detail"><br>
                        <div class=" mt-2">
                            <h6 class="font-weight-bold">CUSTOMER NAME</h6>
                            <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="" name="customer_name" id="customer-name"/>
                        </div>
                        <div class=" mt-2">
                            <h6 class="font-weight-bold">CONTACT NUMBER</h6>
                            <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="" name="contact_number" id="contact-number"/>
                        </div>
                        <div class=" mt-2">
                            <h6 class="font-weight-bold">EMAIL ADDRESS</h6>
                            <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="" name="email_address" id="email-address"/>
                        </div>
                    </div>
                    <div id="menu4" class="container display-none tab-detail"><br>
                        <div class=" mt-2">
                            <h6 class="font-weight-bold">CUSTOMER NOTES</h6>
                            <textarea style="border:1px solid grey;border-radius:5px;height: 145px;" class="white pl-2 w-100 pt-1 pb-1" name="customer_notes" id="customer-notes"></textarea>
                        </div>
                    </div>
                    <div class="row text-right mm" >
                        <div class="offset-2 col-10">
                            <button id="seat-btn" class="btn black" disabled><h4 class="mb-0 font-weight-bold">SEAT &gt;</h4></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <input type="hidden" name="time" id="selected-time" value="{{date('Y-m-d H:i:s')}}">
        <input type="hidden" name="duration" id="selected-duration">
        <input type="hidden" name="table_id" id="selected-table">
    </form>
    <input id="saved-width" type="hidden">
    <script type="text/javascript" src="{{ asset('js/jquery.ios.picker.js') }}"></script>
    <script>
        var data_arr = [
            '12:00<span style="margin-left: 100px;">AM</span>','01:00<span style="margin-left: 100px;">AM</span>','02:00<span style="margin-left: 100px;">AM</span>',
            '03:00<span style="margin-left: 100px;">AM</span>','04:00<span style="margin-left: 100px;">AM</span>','05:00<span style="margin-left: 100px;">AM</span>',
            '06:00<span style="margin-left: 100px;">AM</span>','07:00<span style="margin-left: 100px;">AM</span>','08:00<span style="margin-left: 100px;">AM</span>',
            '09:00<span style="margin-left: 100px;">AM</span>','10:00<span style="margin-left: 100px;">AM</span>','11:00<span style="margin-left: 100px;">PM</span>',
            '12:00<span style="margin-left: 100px;">PM</span>','01:00<span style="margin-left: 100px;">PM</span>','02:00<span style="margin-left: 100px;">PM</span>',
            '03:00<span style="margin-left: 100px;">PM</span>','04:00<span style="margin-left: 100px;">PM</span>','05:00<span style="margin-left: 100px;">PM</span>',
            '06:00<span style="margin-left: 100px;">PM</span>','07:00<span style="margin-left: 100px;">PM</span>','08:00<span style="margin-left: 100px;">PM</span>',
            '09:00<span style="margin-left: 100px;">PM</span>','10:00<span style="margin-left: 100px;">PM</span>','11:00<span style="margin-left: 100px;">PM</span>'
        ];

        var date_minutes = ["Takeaway", "30 min", "60 min", "90 min", "120 min", "Unlimited"];
        $('#now-time-picker').picker({
            data: data_arr,
            lineHeight: 45,
            selected: '3'
        },
        function(s){
            $(".output").html(s);
        });

        function changeTab(arg){
            $(".top-menu-btn").removeClass('top-menu-active');
            $(".tab-detail").css('display', 'none');
            if(arg == 'home'){
                $("#seat-btn").prop('disabled', true);
            }else{
                $("#seat-btn").prop('disabled', false);
            }
            switch (arg){
                case 'home':
                    $("#home").css('display', 'block');
                    $("#now-tab").parent().parent().addClass('top-menu-active');
                    break;
                case 'group':
                    $("#menu1").css('display', 'block');
                    $("#group-tab").parent().parent().addClass('top-menu-active');
                    break;
                case 'table':
                    $("#menu2").css('display', 'block');
                    $("#table-tab").parent().parent().addClass('top-menu-active');
                    break;
                case 'name':
                    $("#menu3").css('display', 'block');
                    $("#name-tab").parent().parent().addClass('top-menu-active');
                    break;
                case 'notes':
                    $("#menu4").css('display', 'block');
                    $("#notes-tab").parent().parent().addClass('top-menu-active');
                    break;
            }
        }

        function onNumber(number){
            var guest_number_obj = $("#guest-number");
            var origin_number = guest_number_obj.val();
            if(parseInt(origin_number) > 0){
                if(number != "c" && number != "back"){
                    origin_number = origin_number.toString() + number.toString();
                }
                if(number == "c"){
                    origin_number = 0;
                }
                if(number == "back"){
                    origin_number = origin_number.slice(0, -1);
                    if(origin_number == ""){
                        origin_number = 0;
                    }
                }
            }else{
                if(number == "back" || number == "c"){
                    origin_number = 0;
                }else{
                    origin_number = number;
                }
            }
            guest_number_obj.val(origin_number)
        }

        $("#display-all").click(function(){
            $("#display-method").hide("slow");
            $("#display-name-container").hide("slow");
            var room_content = $(".room-content-table");
            room_content.removeClass('col-10');
            room_content.addClass('col-12');
            $("#exit-fullscreen").show('slow');
        });

        $("#exit-fullscreen").click(function() {
            $("#display-method").show("slow");
            $("#display-name-container").show("slow");
            var room_content = $(".room-content-table");
            room_content.removeClass('col-12');
            room_content.addClass('col-10');
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

        function selectObject(selected_id){
            $("#selected-table").val(selected_id);
        }
    </script>
@endsection
