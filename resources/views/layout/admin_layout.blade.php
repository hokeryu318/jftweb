<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
	    <link href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ URL::asset('css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>

<style>

.bg-black{
background-color:black !important;
}
.bg-light{
background:#d8d8d8 !important;
}
.bg-info{
background:#039bfa !important;

}
.light-text{

color:lightgrey;
}
.blueborder{
border:3px solid #039bfa;
}
li.blueborder{
color:white;
font-weight:bold;
padding-top:2.5%;
height:48px;
width:99px;
text-align:center
}
.bg-green{
background:#0ca285 !important;
}
.bg-pinq{
background:#ff0093 !important;
}
.bg-yellow{
background:#e88d12 !important;
}
.uldesign li{
font-weight:bold;
padding-top:1%;
padding-bottom:0.5%;
background:#b8b8b8;
padding-left:1%;
line-height:18px;
width:120px;
text-align:center

}
li.menu{
color:white;
font-weight:bold;
padding-top:2.5%;
padding-left:1%;

height:48px;
width:95px;
text-align:left
}
li.menu1{
color:white;
font-weight:normal;
padding-left:5%;
background:grey;
height:48px;
border-bottom:1px solid white;
width:100%;
text-align:left;
}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: white;
  opacity: 1; /* Firefox */
}

.black{

background:#2d2d2d !important;
}
thead tr{
border-top:2px solid #1ec2c9;
}

.datetimepicker-inline{
width:100% !important;
}
.switch{
font-weight: bold;
display:table-cell;

font-size: 20px;

color: #1ec2c9;
}
.black2{

background:#4e4e4e !important;
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

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.radius{

border-radius:10px;
}
button h6{
font-size:110%;
}

table,.datetimepicker > div,.datetimepicker-days{
width:100% !important;

}
</style>

<body>
<div class=" col-5 pb-5 position-absolute hh pt-5" id="menu" style="z-index:1000;margin-left:-1200px;background:#242424;">
    <a href="#" class="bg-transparent black-text float-right" id="closemenu"><h1><span class="fa fa-close white-text"></span></h1></a>
    <div class="text-center">
        <img src="{{ URL::asset('img/logo.png') }}" class="w-75" />
    </div>
    <div class="text-left pr-2 pl-3 mt-4">
        <a href="{{ route('admin.transaction') }}" class="text-left"><img src="{{ URL::asset('img/tran.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Transaction</h4></a>
        <br><br><br>
        <a href="{{ route('admin.booking') }}" class="text-left"><img src="{{ URL::asset('img/book.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Booking</h4></a>
        <br><br><br><br>
        <a href="{{ route('admin.dish') }}" class="text-left"><img src="{{ URL::asset('img/menu.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Edit Menu  &nbsp;&nbsp; <img src="{{ URL::asset('img/lock.png') }}" class="float-right pt-2" /></h4></a>
        <br><br>
        <a href="#" class="text-left mt-4"><img src="{{ URL::asset('img/sales.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Sales Data &nbsp;&nbsp;<img src="{{ URL::asset('img/lock.png') }}" class="float-right pt-1" /></h4></a>
        <br><br>
        <a href="#" class="text-left mt-4"><img src="{{ URL::asset('img/setting.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Setting &nbsp;&nbsp;<img src="{{ URL::asset('img/lock.png') }}" class="float-right pt-2" /></h4></a>
        <br><br>
        <a href="#" class="text-left mt-4"><img src="{{ URL::asset('img/table.png') }}" />&nbsp;&nbsp;<h4 class="white-text d-inline">Table Edit &nbsp;&nbsp;<img src="{{ URL::asset('img/lock.png') }}" class="float-right pt-2" /></h4></a>
    </div>
</div>
<header class="bg-black fixed-top container-fluid">
    <div class="row pt-0 pb-0">
        <div class="col-1">
            <a href="#" class="white-text" id="btnmenu"><h1 class="mb-0"><span class="fa fa-navicon"></span></h1></a>
        </div>
        <div class="col-7">
            <div class="row pl-0">
                <ul class="nav navbar pt-0 pb-0 mt-0 mb-0" style="box-shadow:none;">
                    <li class="menu bg-green"><img src="{{ URL::asset('img/dollar.png') }}" /></li>
                    <li class="menu bg-pinq"><img src="{{ URL::asset('img/notify.png') }}" /> 13</li>
                    <li class="menu bg-yellow"><img src="{{ URL::asset('img/chat.png') }}" /> 13</li>
                    <li class="menu bg-info"><img src="{{ URL::asset('img/writechat.png') }}" /> 13</li>
                </ul>
            </div>
        </div>
        <div class="col-4 pl-0 text-right">
            <h6 class="mb-0 white-text font-weight-bold mt-3">10:12 PM &nbsp;&nbsp; 22 MAY 2018</h6>
        </div>
    </div>
</header>
<div>
@yield('content');
</div>

 <script type="text/javascript" src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('js/mdb.min.js') }}"></script>
	<script src="{{ URL::asset('js/bootstrap-timepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script type="text/javascript">
        $(function () {
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
