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
                        <li class="menu1 fontbig" onclick="onmenu(this)" data-url="{{ route('admin.setting.kitchen') }}"><a style="color:white" class="anchor-white" href="#">Kitchen Groups</a></li>
                        <li class="menu1 fontbig" onclick="onmenu(this)" data-url="{{ route('admin.setting.timeslots') }}"><a style="color:white" href="#">Time Slots</a></li>
                        <li class="menu1 fontbig" onclick="onmenu(this)" data-url="{{ route('admin.setting.htimeslots') }}"><a style="color:white" href="#">Holiday Time Slots</a></li>
                        <li class="menu1 fontbig" onclick="onmenu(this)" data-url="{{ route('admin.setting.customer') }}"><a style="color:white" href="#">New Customer</a></li>
                    </ul>
                    <ul class="col-lg-12 pl-0 w-100 mt-5" style="list-style-type:none">
                        <li class="menu1 fontbig" onclick="onmenu(this)" data-url="{{ route('admin.setting.gst') }}"><a style="color:white" href="#">GST</a></li>
                        <li class="menu1 fontbig" onclick="onmenu(this)" data-url="{{ route('admin.setting.payment') }}"><a style="color:white" href="#">Payment Methods</a></li>
                        <li class="menu1 fontbig" onclick="onmenu(this)" data-url="{{ route('admin.setting.receipt') }}"><a style="color:white" href="#">Receipt</a></li>
                    </ul>
                    <ul class="col-lg-12 pl-0 w-100 mt-5" style="list-style-type:none">
                        <li class="menu1 fontbig" onclick="onmenu(this)" data-url="{{ route('admin.setting.badge') }}"><a style="color:white" href="#">Badges</a></li>
                        <li class="menu1 fontbig" onclick="onmenu(this)" data-url="{{ route('admin.setting.language') }}"><a style="color:white" href="#">Multilingual</a></li>
                        <li class="menu1 fontbig" onclick="onmenu(this)" data-url="{{ route('admin.setting.password') }}"><a style="color:white" href="#">Passwords</a></li>
                    </ul>
                </div>
                @yield('setting')
            </div>
        </div>
    </div>
</div>
<script>
    $('.menu1').each(function(i, obj){
        var route = $(obj).data('url');
        var currentUrl = window.location.origin + window.location.pathname;
        if(route == window.location.href){
            $(obj).addClass('black');
        }
    });
    function onmenu(obj){
        window.location = $(obj).data('url');
    }
</script>
@endsection
