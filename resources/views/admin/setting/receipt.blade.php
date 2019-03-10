@extends('admin.setting')

@section('setting')

<div class="col-9 pl-0 pt-5 mt-5">
    <div class="row">
        {{--<div class="col-2">--}}
            {{--<img src="{{ asset('img/img1.png') }}" />--}}
        {{--</div>--}}
        <div class="col-2">
            @if (!empty($profile->logo_image))
                <img src="{{ asset('receipt/'.$profile->logo_image) }}" style="width: 62px; height: 62px;" />
            @else
                <img src="{{ asset('img/img1.png') }}" />
            @endif
        </div>
        <div class="col-4 pl-0 text-left">
            <button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 mt-4" onclick="onFile()">CHANGE LOGO</button>
        </div>
    </div>
    <div class=" mt-3">
        <h6 class="font-weight-bold text-info">Shop Name</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="{{ $profile->shop_name }}" id="input_shop_name"/>
    </div>
    <div class=" mt-2">
        <h6 class="font-weight-bold text-info">ABN</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="{{ $profile->abn }}" id="input_abn"/>
    </div>
    <div class="mt-2">
        <h6 class="font-weight-bold text-info">Address</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="{{ $profile->address }}" id="input_address"/>
    </div>
    <div class="mt-2">
        <h6 class="font-weight-bold text-info">Phone</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="{{ $profile->phone }}" id="input_phone"/>
    </div>
    <div style="margin-bottom:50px" class="margin">
    </div>
    <div class="col-11 mt-5 pr-2 text-right">
        <button class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel ></h5></button>
        <button class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2" onclick="onSave()"><h5 class="white-text mb-0">Apply ></h5></button>
    </div>
</div>
<form method="POST" action="{{ route('admin.setting.receipt.save') }}" id="post">
    @csrf
    <input type="hidden" name="shop_name" id="shop_name">
    <input type="hidden" name="abn" id="abn">
    <input type="hidden" name="address" id="address">
    <input type="hidden" name="phone" id="phone">
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
