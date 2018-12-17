@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
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
padding-top:2.5%;
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
.black2{

background:#4e4e4e !important;
}
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 25px;
}

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
</style>

<body>
<div class=" col-5 pb-5 position-absolute hh pt-5" id="menu" style="z-index:1000;margin-left:-1200px;background:#242424;">
<a href="#" class="bg-transparent black-text float-right" id="closemenu"><h1><span class="fa fa-close white-text"></span></h1></a>
<div class="text-center">
<img src="img/logo.png" class="w-75" />

</div>
<div class="text-left pr-2 pl-3 mt-4">
<a href="#" class="text-left"><img src="img/tran.png" />&nbsp;&nbsp;<h4 class="white-text d-inline">Transaction</h4></a>
<br>
<br><br>
<a href="#" class="text-left"><img src="img/book.png" />&nbsp;&nbsp;<h4 class="white-text d-inline">Booking</h4></a>
<br>
<br>
<br>
<br>
<a href="#" class="text-left"><img src="img/menu.png" />&nbsp;&nbsp;<h4 class="white-text d-inline">Edit Menu  &nbsp;&nbsp; <img src="img/lock.png" class="float-right pt-2" /></h4></a>
<br><br>
<a href="#" class="text-left mt-4"><img src="img/sales.png" />&nbsp;&nbsp;<h4 class="white-text d-inline">Sales Data &nbsp;&nbsp;<img src="img/lock.png" class="float-right pt-1" /></h4></a>
<br><br>
<a href="#" class="text-left mt-4"><img src="img/setting.png" />&nbsp;&nbsp;<h4 class="white-text d-inline">Setting &nbsp;&nbsp;<img src="img/lock.png" class="float-right pt-2" /></h4></a>
<br><br>
<a href="#" class="text-left mt-4"><img src="img/table.png" />&nbsp;&nbsp;<h4 class="white-text d-inline">Table Edit &nbsp;&nbsp;<img src="img/lock.png" class="float-right pt-2" /></h4></a>

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
<li class="menu bg-green"><img src="img/dollar.png" /></li>
<li class="menu bg-pinq"><img src="img/notify.png" /> 13</li>
<li class="menu bg-yellow"><img src="img/chat.png" /> 13</li>
<li class="menu bg-info"><img src="img/writechat.png" /> 13</li>

</ul>
</div>
</div>
<div class="col-4 pl-0 text-right">
<h6 class="mb-0 white-text font-weight-bold mt-3">10:12 PM &nbsp;&nbsp; 22 MAY 2018</h6>

</div>
</div>

</header>

<div class="p-4">
<div style="padding-top:7%;"></div>
<div class="container-fluid pb-3 hh bg-light position-relative">
<a href="#" class="bg-transparent" style="position:absolute;top:15px ;right:10px"><h2><span class="">
                   <img src="img/Group 1100.png" height="18" class="float-right" width="20" />
</span></h2></a>
<div class="pt-5">
<div class="row">
<div class="col-3 pl-0">
<h5 class="black-text font-weight-bold pl-5 mb-5">Settings</h5>

<ul class="col-lg-12 pl-0 w-100 pt-4" style="list-style-type:none">
<li class="menu1">Kitchen Group</li>
<li class="menu1 black">Time Slots</li>
<li class="menu1">Holiday Time Slots</li>
<li class="menu1">New Customer</li>

</ul>
<ul class="col-lg-12 pl-0 w-100 mt-5" style="list-style-type:none">
<li class="menu1">GST</li>
<li class="menu1">Payment Method </li>
<li class="menu1">Receipt</li>

</ul>
<ul class="col-lg-12 pl-0 w-100 mt-5" style="list-style-type:none">
<li class="menu1">Badge</li>
<li class="menu1">Multilingual</li>
<li class="menu1">Password</li>

</ul>
</div>

<div class="col-9 pl-0">
<h5 class="black-text font-weight-bold pl-5">Time Slots</h5>
<h6 class="text-info mb-5 pl-5 font-weight-bold">Regular Time Slots</h6>
<div class="card ml-1 col-lg-10 pr-0">
<div class="row mt-2 mb-4">
<div class="col-4">

</div>
<div class="col-3 text-info text-center">
Start</div>
<div class="col-3 text-info text-center">
Ends
</div>
<div class="col-2">

</div>
</div>
<div class="row">
<div class="col-4">
<p class="mb-0 pl-3">Morning</p>
</div>
<div class="col-3 text-right pr-5">
0:00AM
</div>
<div class="col-3 text-right pr-5">
0:00AM

</div>
<div class="col-2 pl-0">
<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
</div>
</div>
<div class="col-lg-12">
<hr class="">
</div><div class="row">
<div class="col-4">
<p class="mb-0 pl-3">Lunch</p>
</div>
<div class="col-3 text-right pr-5">
12:00PM
</div>
<div class="col-3 text-right pr-5">
2:00PM

</div>
<div class="col-2 pl-0">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>
</div>
<div class="col-lg-12">
<hr class="">
</div><div class="row">
<div class="col-4">
<p class="mb-0 pl-3">Tea</p>
</div>
<div class="col-3 text-right pr-5">
2:00PM
</div>
<div class="col-3 text-right pr-5">
5:30PM

</div>
<div class="col-2 pl-0">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>
</div>
<div class="col-lg-12">
<hr class="">
</div><div class="row">
<div class="col-4">
<p class="mb-0 pl-3">Dinner</p>
</div>
<div class="col-3 text-right pr-5">
5:30PM
</div>
<div class="col-3 text-right pr-5">
10:00PM

</div>
<div class="col-2 pl-0">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>
</div>
<div class="col-lg-12">
<hr class="">
</div>
<div class="row">
<div class="col-4">
<p class="mb-0 pl-3">Late Night</p>
</div>
<div class="col-3 text-right pr-5">
10:00PM
</div>
<div class="col-3 text-right pr-5">
2:00AM

</div>
<div class="col-2 pl-0">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>
</div>
<div class="col-lg-12">
<hr class="">
</div>
</div>
<h6 class="text-info pl-5 font-weight-bold mt-5">Irrgular Time Slots</h6>
<div class="card ml-1 pt-3 pb-2 col-lg-10 pr-0">
<div class="row">
<div class="col-6 pl-4">
<h5 class="font-weight-normal">Monday</h5>
</div>
<div class="col-5 pr-0 text-right">
<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
</div>

</div>
</div>

<div class="card ml-1 mt-3 pt-3 pb-2 col-lg-10 pr-0">
<div class="row">
<div class="col-6 pl-4">
<h5 class="font-weight-normal">Tuesday</h5>
</div>
<div class="col-5 pr-0 text-right">
<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
</div>

</div>
</div>
<div class="card ml-1 mt-3 pt-3 pb-2 col-lg-10 pr-0">
<div class="row">
<div class="col-6 pl-4">
<h5 class="font-weight-normal">Wednesday</h5>
</div>
<div class="col-5 pr-0 text-right">
<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
</div>

</div>
</div>
<div class="card ml-1 mt-3 pt-3 pb-2 col-lg-10 pr-0">
<div class="row">
<div class="col-6 pl-4">
<h5 class="font-weight-normal">Thursday</h5>
</div>
<div class="col-5 pr-0 text-right">
<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
</div>

</div>
</div>
<div class="card ml-1 mt-3 pt-3 pb-2 col-lg-10 pr-0">
<div class="row ">
<div class="col-6 pl-4">
<h5 class="font-weight-normal">Friday</h5>
</div>
<div class="col-5 pr-0 text-right">
<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
</div>

</div>
</div>
<div class="card pt-4 ml-1 mt-3 col-lg-10 pr-0">
<div class="row">
<div class="col-6 pl-4">
<h5 class="font-weight-normal">Saturday</h5>
</div>
<div class="col-5 pr-0 text-right">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>

</div>
<div class="row">
<div class="col-6 pl-4">
<h6 class="font-weight-normal light-text">Non-Businees Day</h6>
</div>
<div class="col-5 pr-0 text-right">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>

</div>

<div class="row mt-2 mb-4">
<div class="col-4">

</div>
<div class="col-3 text-info text-center">
Start</div>
<div class="col-3 text-info text-center">
Ends
</div>
<div class="col-2">

</div>
</div>
<div class="row">
<div class="col-4">
<p class="mb-0 pl-3 light-text">Morning</p>
</div>
<div class="col-3 text-right light-text pr-5">
0:00AM
</div>
<div class="col-3 text-right light-text pr-5">
0:00AM

</div>
<div class="col-2 pl-0">
<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
</div>
</div>
<div class="col-lg-12">
<hr class="">
</div><div class="row">
<div class="col-4">
<p class="mb-0 pl-3">Lunch</p>
</div>
<div class="col-3 text-right pr-5">
12:00PM
</div>
<div class="col-3 text-right pr-5">
2:00PM

</div>
<div class="col-2 pl-0">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>
</div>
<div class="col-lg-12">
<hr class="">
</div><div class="row">
<div class="col-4">
<p class="mb-0 pl-3 light-text">Tea</p>
</div>
<div class="col-3 text-right light-text pr-5">
2:00PM
</div>
<div class="col-3 light-text text-right pr-5">
5:30PM

</div>
<div class="col-2 pl-0">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>
</div>
<div class="col-lg-12">
<hr class="">
</div><div class="row">
<div class="col-4">
<p class="mb-0 pl-3 light-text">Dinner</p>
</div>
<div class="col-3 light-text text-right pr-5">
5:30PM
</div>
<div class="col-3 light-text text-right pr-5">
10:00PM

</div>
<div class="col-2 pl-0">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>
</div>
<div class="col-lg-12">
<hr class="">
</div>
<div class="row">
<div class="col-4">
<p class="mb-0 pl-3 light-text">Late Night</p>
</div>
<div class="col-3 text-right light-text pr-5">
10:00PM
</div>
<div class="col-3 light-text text-right pr-5">
2:00AM

</div>
<div class="col-2 pl-0">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>
</div>
<div class="col-lg-12">
<hr class="">
</div>
</div>
<div class="card pt-4 ml-1 mt-3 col-lg-10 pr-0">
<div class="row">
<div class="col-6 pl-4">
<h5 class="font-weight-normal">Saturday</h5>
</div>
<div class="col-5 pr-0 text-right">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>

</div>
<div class="row">
<div class="col-6 pl-4">
<h6 class="font-weight-normal light-text">Non-Businees Day</h6>
</div>
<div class="col-5 pr-0 text-right">
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>

</div>
</div>
<div class="col-lg-11 pr-2 mt-3 text-right">
<a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
<a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0">Apply</h5></a>

</div>
</div>

</div>

</div>

</div>
</div>
@endsection
