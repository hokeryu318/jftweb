@extends('admin.setting')

@section('setting')

<div class="col-9 pl-5" style="margin-top: 100px;">
    <div class="row">
        {{--<div class="col-2">--}}
            {{--<img src="{{ asset('img/img1.png') }}" />--}}
        {{--</div>--}}
        <div class="col-2">
            @if (!empty($profile->logo_image))
                <img src="{{ asset('receipt/'.$profile->logo_image) }}" style="width: 120px; height: 120px;" />
            @else
                <img src="{{ asset('img/img1.png') }}" />
            @endif
        </div>
        <div class="col-4 pl-0 text-left" style="margin-top: 43px;">
            <button class="btn bg-info radius-1 pt-2 pb-2 pr-4 pl-4 mt-4 fs-25" onclick="onFile()">CHANGE LOGO</button>
        </div>
    </div>

    <div style="height: 470px;overflow-y: scroll;">
        <div class=" mt-3">
            <h6 class="font-weight-bold text-info fs-25">Shop Name</h6>
            <input style="border:1px solid grey;border-radius:5px;font-size: 25px;width: 895px;" class="white pl-2 pt-1 pb-1" value="{{ $profile->shop_name }}" id="input_shop_name"/>
        </div>
        <div class=" mt-2">
            <h6 class="font-weight-bold text-info fs-25">ABN</h6>
            <input style="border:1px solid grey;border-radius:5px;font-size: 25px;width: 895px;" class="white pl-2 pt-1 pb-1" value="{{ $profile->abn }}" id="input_abn"/>
        </div>
        <div class="mt-2">
            <h6 class="font-weight-bold text-info fs-25">Address</h6>
            <input style="border:1px solid grey;border-radius:5px;font-size: 25px;width: 895px;" class="white pl-2 pt-1 pb-1" value="{{ $profile->address }}" id="input_address"/>
        </div>
        <div class="mt-2">
            <h6 class="font-weight-bold text-info fs-25">Phone</h6>
            <input style="border:1px solid grey;border-radius:5px;font-size: 25px;width: 895px;" class="white pl-2 pt-1 pb-1" value="{{ $profile->phone }}" id="input_phone"/>
        </div>
        <div class="mt-2">
            <h6 class="font-weight-bold text-info fs-25">PrinterIp</h6>
            <input style="border:1px solid grey;border-radius:5px;font-size: 25px;width: 895px;" class="white pl-2 pt-1 pb-1" value="{{ $profile->printer_ip }}" id="input_printer_ip"/>
        </div>
        <div class="mt-2">
            <h6 class="font-weight-bold text-info fs-25">Email Address</h6>
            <input style="border:1px solid grey;border-radius:5px;font-size: 25px;width: 895px;" class="white pl-2 pt-1 pb-1" value="{{ $profile->email_address }}" id="input_email_address"/>
        </div>

    </div>

    <div style="margin-bottom:70px"></div>

    {{--<div class="col-11 mt-5 pr-2 text-right">--}}
        {{--<button class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel ></h5></button>--}}
        {{--<button class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2" onclick="onSave()"><h5 class="white-text mb-0">Apply ></h5></button>--}}
    {{--</div>--}}

    <div class="col-lg-12 mt-5 pt-2 pr-4 text-right">
        <a href="{{ route('admin.setting.receipt') }}" class="btn bg-white black-text pt-2 pb-2 pr-3 pl-3">
            <h5 class="black-text mb-0 fs-25">
                <b>Cancel</b>
                <img src="{{ asset('img/Group728black.png') }}" style="height:18px; margin: -5px 0 0 20px;">
            </h5>
        </a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-3 pl-3" style="margin-right: -8px;">
            <h5 class="white-text mb-0 fs-25" onclick="onSave()">
                <b>Apply</b>
                <img src="{{ asset('img/Group728white.png') }}" style="height:18px; margin: -5px 0 0 20px;">
            </h5>
        </a>
    </div>
</div>
<form method="POST" action="{{ route('admin.setting.receipt.save') }}" id="post">
    @csrf
    <input type="hidden" name="shop_name" id="shop_name">
    <input type="hidden" name="abn" id="abn">
    <input type="hidden" name="address" id="address">
    <input type="hidden" name="phone" id="phone">
    <input type="hidden" name="printer_ip" id="printer_ip">
    <input type="hidden" name="email_address" id="email_address">
</form>
<form action="{{ route('admin.setting.changelogo') }}" method="POST" id="image_form" enctype='multipart/form-data'>
    <input id="image-file" type="file" style="position:fixed; top:-100px" name="image-file" accept="image/x-png, image/gif, image/jpeg">
    <input id="image-name" name="image-name" type="hidden">
    @csrf
</form>
<script>
    function onSave()
    {
        $('#shop_name').val($('#input_shop_name').val());
        $('#abn').val($('#input_abn').val());
        $('#address').val($('#input_address').val());
        $('#phone').val($('#input_phone').val());
        $('#printer_ip').val($('#input_printer_ip').val());
        $('#email_address').val($('#input_email_address').val());
        $('#post').submit();
    }
// change logo
    function onFile(){
        $('#image-file').trigger('click');
    }
    $('#image-file').change(function(){
        // var image_name = prompt('Please enter logo name');
        // if(image_name != null && image_name != ''){
        //     $('#image-name').val(image_name);
        // }
        $('#image_form').submit();
    });
</script>
@endsection
