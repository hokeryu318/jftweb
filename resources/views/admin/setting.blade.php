@extends('layout.admin_layout')

@section('title', 'Settings')

@section('content')
<div class="pp">
    <div style="padding-top:5%;" class="pt">
    </div>
    <div class="pr-3 pl-3 pbb hh bg-light position-relative">
        <a href="#" class="bg-transparent" style="position:absolute;top:15px ;right:10px">
            <h2><span class="">
                <img src="{{ asset('img/Group1100.png') }}" height="18" class="float-right" width="20" />
            </span></h2>
        </a>
        <div class="pt-4">
            <div class="row">
                <div class="col-3 pl-0">
                    <h5 class="black-text font-weight-bold pl-5 mb-2">Settings</h5>
                    <ul class="col-lg-12 pl-0 w-100 pt-4" style="list-style-type:none">
                        <li class="menu1 fontbig"><a style="color:white" class="anchor-white" href="{{ route('admin.setting.kitchen') }}">Kitchen Group</a></li>
                        <li class="menu1 fontbig"><a style="color:white" href="{{ route('admin.setting.timeslots') }}">Time Slots</a></li>
                        <li class="menu1 fontbig"><a style="color:white" href="{{ route('admin.setting.htimeslots') }}">Holiday Time Slots</a></li>
                        <li class="menu1 fontbig"><a style="color:white" href="{{ route('admin.setting.customer') }}">New Customer</a></li>
                    </ul>
                    <ul class="col-lg-12 pl-0 w-100 mt-5" style="list-style-type:none">
                        <li class="menu1 fontbig"><a style="color:white" href="{{ route('admin.setting.gst') }}">gst</a></li>
                        <li class="menu1 fontbig"><a style="color:white" href="{{ route('admin.setting.payment') }}">Payment Method</a></li>
                        <li class="menu1 fontbig"><a style="color:white" href="{{ route('admin.setting.receipt') }}">Receipt</a></li>
                    </ul>
                    <ul class="col-lg-12 pl-0 w-100 mt-5" style="list-style-type:none">
                        <li class="menu1 fontbig"><a style="color:white" href="{{ route('admin.setting.badge') }}">Badge</a></li>
                        <li class="menu1 fontbig"><a style="color:white" href="{{ route('admin.setting.language') }}">Multilingual</a></li>
                        <li class="menu1 fontbig"><a style="color:white" href="{{ route('admin.setting.password') }}">Password</a></li>
                    </ul>
                </div>
                @yield('setting')
            </div>
        </div>
    </div>
</div>
@endsection
