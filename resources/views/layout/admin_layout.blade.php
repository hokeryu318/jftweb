<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
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
</head>

<body>
    <div class=" col-4 pb-5 position-absolute hh pt-3" id="menu" style="z-index:1000;
                                                                        height:101vh;
                                                                        top:0;
                                                                        margin-left:-1200px;
                                                                        background:#242424;">
        <a href="#" class="bg-transparent black-text float-right" id="closemenu">
            <img src="{{ asset('img/Group826.png') }}" class="w-75" />
        </a>
        <div class="text-center">
            <img src="{{ asset('img/logo.png') }}" />
        </div>
        <div class="text-left pr-2 pl-3 mt-4">
            <a href="{{ route('admin.transaction') }}" class="text-left">
                <img src="{{ asset('img/tran.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Transaction</h4>
            </a>
            <br><br><br>
            <a href="{{ route('admin.booking') }}" class="text-left">
                <img src="{{ asset('img/book.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Booking</h4>
            </a>
            <br><br><br><br>
            <a href="#" class="text-left">
                <img src="{{ asset('img/menu.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Edit Menu  &nbsp;&nbsp; <img src="{{ asset('img/lock.png') }}" class="float-right pt-2" /></h4>
            </a>
            <br><br>
            <a href="#" class="text-left mt-4">
                <img src="{{ asset('img/sales.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Sales Data &nbsp;&nbsp;<img src="{{ asset('img/lock.png') }}" class="float-right pt-1" /></h4>
            </a>
            <br><br>
            <a href="#" class="text-left mt-4">
                <img src="{{ asset('img/setting.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Setting &nbsp;&nbsp;<img src="{{ asset('img/lock.png') }}" class="float-right pt-2" /></h4>
            </a>
            <br><br>
            <a href="#" class="text-left mt-4">
                <img src="{{ asset('img/table.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Table Edit &nbsp;&nbsp;<img src="{{ asset('img/lock.png') }}" class="float-right pt-2" /></h4>
            </a>
        </div>
    </div>
    <header class="bg-black fixed-top container-fluid">
        <div class="row pt-0 pb-0">
            <div class="col-1">
                <a href="#" class="white-text" id="btnmenu">
                    <h1 class="mb-0"><span class="fa fa-navicon"></span></h1>
                </a>
            </div>
            <div class="col-7">
                <div class="row pl-0">
                    <ul class="nav navbar pt-0 pb-0 mt-0 mb-0" style="box-shadow:none;">
                        <li class="menu bg-green"><img src="{{ asset('img/dollar.png') }}" /></li>
                        <li class="menu bg-pinq"><img src="{{ asset('img/notify.png') }}" /> 13</li>
                        <li class="menu bg-yellow"><img src="{{ asset('img/chat.png') }}" /> 13</li>
                        <li class="menu bg-info"><img src="{{ asset('img/writechat.png') }}" /> 13</li>
                    </ul>
                </div>
            </div>
            <div class="col-4 pl-0 text-right">
                <h6 class="mb-0 white-text font-weight-bold mt-3">10:12 PM &nbsp;&nbsp; 22 MAY 2018</h6>
            </div>
        </div>
    </header>

    @yield('content');
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-timepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log('aaa');
            $('#datetimepicker12').datetimepicker({
                inline: true,
                sideBySide: true,
                language: 'fr',
                weekStart: 1,
                todayBtn: 1,
                minView: 2,
                forceParse: 0,
            });
        });
    </script>
</body>
</html>
