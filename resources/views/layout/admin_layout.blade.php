<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/timepicki.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
</head>

<body>
    <div class=" col-4 pb-5 hh pt-3 menu_style" id="menu-content" style="z-index:1000;height:765px;position:fixed;overflow: auto;top:0;margin-left:-1200px;background:#242424f0;">
        <a href="#" class="bg-transparent black-text float-right" id="menu-close-btn">
            <img src="{{ asset('img/Group826.png') }}" class="w-75" />
        </a>
        <div class="text-center">
            <img src="{{ asset('img/logo.png') }}" />
        </div>
        <div class="text-left pr-2 pl-3 mt-4 menu_bar_style">
            <a href="{{ route('admin.transaction') }}" class="text-left">
                <img src="{{ asset('img/tran.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Transactions</h4>
            </a>
            <br><br><br>
            <a href="{{ route('admin.booking') }}" class="text-left">
                <img src="{{ asset('img/book.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Bookings</h4>
            </a>
            <br><br><br><br>
            <a href="{{ route('admin.dish') }}" class="text-left">
                <img src="{{ asset('img/menu.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Edit Menu  &nbsp;&nbsp; <img src="{{ asset('img/lock.png') }}" class="float-right pt-2" /></h4>
            </a>
            <br><br>
            <a href="{{ route('admin.saledata') }}" class="text-left mt-4">
                <img src="{{ asset('img/sales.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Sales Data &nbsp;&nbsp;<img src="{{ asset('img/lock.png') }}" class="float-right pt-1" /></h4>
            </a>
            <br><br>
            <a href="{{ route('admin.setting.receipt') }}" class="text-left mt-4">
                <img src="{{ asset('img/setting.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Setting &nbsp;&nbsp;<img src="{{ asset('img/lock.png') }}" class="float-right pt-2" /></h4>
            </a>
            <br><br>
            <a href="{{ route('admin.table') }}" class="text-left mt-4">
                <img src="{{ asset('img/table.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Table Edit &nbsp;&nbsp;<img src="{{ asset('img/lock.png') }}" class="float-right pt-2" /></h4>
            </a>
        </div>
    </div>
    <header class="bg-black fixed-top container-fluid">
        <div class="row pt-0 pb-0">
            <div class="col-1">
                <a href="#" class="white-text" id="menu-open-btn">
                    <h1 class="mb-0"><span class="fa fa-navicon"></span></h1>
                </a>
            </div>
            <div class="col-7">
                <div class="row pl-0">
                    <ul class="nav navbar pt-0 pb-0 mt-0 mb-0" style="box-shadow:none;">
                        <li class="menu bg-green"><img src="{{ asset('img/dollar.png') }}" />2</li>
                        <li class="menu bg-pinq"><img src="{{ asset('img/notify.png') }}" /> 13</li>
                        <li class="menu bg-yellow"><img src="{{ asset('img/chat.png') }}" /> 13</li>
                        <li class="menu bg-info"><img src="{{ asset('img/writechat.png') }}" /> 13</li>
                    </ul>
                </div>
            </div>
            <div class="col-2 pl-0 text-right">
                <h6 class="mb-0 white-text font-weight-bold mt-3"><p id="time"></p></h6>
            </div>
            <div class="col-2 pl-0 text-left">
                <h6 class="mb-0 white-text font-weight-bold mt-3">{{ date('d M Y') }}</h6>
            </div>
        </div>
    </header>

    @yield('content')
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-timepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script type="text/javascript">
        function touchHandler(event) {
            var touch = event.changedTouches[0];

            var simulatedEvent = document.createEvent("MouseEvent");
                simulatedEvent.initMouseEvent({
                touchstart: "mousedown",
                touchmove: "mousemove",
                touchend: "mouseup"
            }[event.type], true, true, window, 1,
                touch.screenX, touch.screenY,
                touch.clientX, touch.clientY, false,
                false, false, false, 0, null);

            touch.target.dispatchEvent(simulatedEvent);
            event.preventDefault();
        }

        function init() {
            var sortable_div = document.getElementById('sortable_div');
            if(sortable_div){
                document.getElementById('sortable_div').addEventListener("touchstart", touchHandler, true);
                document.getElementById('sortable_div').addEventListener("touchmove", touchHandler, true);
                document.getElementById('sortable_div').addEventListener("touchend", touchHandler, true);
                document.getElementById('sortable_div').addEventListener("touchcancel", touchHandler, true);
            }
        }
        $(document).ready(function() {
            $('#datetimepicker12').datetimepicker({
                inline: true,
                sideBySide: true,
                language: 'fr',
                weekStart: 1,
                todayBtn: 1,
                minView: 2,
                forceParse: 0,
            });
            $('#datetimepicker13').datetimepicker({
                inline: true,
                sideBySide: true,
                language: 'fr',
                weekStart: 1,
                todayBtn: 1,
                minView: 2,
                forceParse: 0,
            });
            init();
            //var height = Math.max($(window).height() * 1.02, $(document.body).height());
            //$('#menu').height(height);
        });
        var rr = 0;
        $("#menu-open-btn").click(function(){
           if(rr == 0){
               $("#menu-content").animate({"margin-left": '+=1200'});
               rr = 1;
           }
        });
        $("#menu-close-btn").click(function(){
           if(rr == 1){
               $("#menu-content").animate({"margin-left": '-=1200'});
               rr = 0;
           }
        });
        $(document).mouseup(function(e)
        {
            var container = $("#menu-content");
            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0)
            {
                if(rr == 1){
                    $("#menu-content").animate({"margin-left": '-=1200'});
                    rr = 0;
                }
            }
        });
    </script>
    {{--display current time--}}
    <script>
        var myVar = setInterval(myTimer, 1000);

        function myTimer() {
            var d = new Date();
            document.getElementById("time").innerHTML = d.toLocaleTimeString();
        }
    </script>
</body>
</html>
