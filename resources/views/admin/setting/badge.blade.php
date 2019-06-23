@extends('admin.setting')

@section('setting')
<div class="col-9 pl-5" style="margin-top: 100px;">
    <h5 class="black-text font-weight-bold fs-30">Badges</h5>
    <div class="row mt-4">
        <div class="col-6">
            <h6 class="text-info font-weight-bold pl-5 fs-25">Name</h6>
        </div>
        <div class="col-3">
            <h6 class="text-info font-weight-bold fs-25">Image</h6>
        </div>
        <div class="col-3">
            <h6 class="text-info font-weight-bold fs-25">Active</h6>
        </div>
    </div>
    <form action="{{ route('admin.setting.activebadge') }}" method="POST" id="active_form" class="bd_form">
    @foreach($badges as $badge)
    <div class="card pt-3 pb-2" style="margin-bottom:10px">
        <div class="row">
            <div class="col-6">
                <h6 class="font-weight-bold pl-5 fs-25">{{ $badge->name }}</h6>
            </div>
            <div class="col-1 text-right">
                <img class="" src="{{ asset('badges/'.$badge->filepath) }}" width="30px" />
            </div>
            <div class="col-2"></div>
            <div class="col-1 text-right" style="margin-left: 20px;">
                <label class="switch-style">
                    <input type="checkbox" name="actives[]" value="{{ $badge->id }}"
                    @if($badge->active == 1)
                    checked
                    @endif
                    >
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    @endforeach
    @csrf
    </form>
    <form action="{{ route('admin.setting.addbadge') }}" method="POST" id="image_form" enctype='multipart/form-data'>
        <input id="image-file" type="file" style="position:fixed; top:-100px" name="image-file" accept="image/x-png, image/gif, image/jpeg">
        <input id="image-name" name="image-name" type="hidden">
        @csrf
    </form>
    <div class="text-right">
        <button class="btn bg-info text-right radius-1 pt-2 pb-2 pr-4 pl-4" style="margin-right:16px;width: 194px;" onclick="onFile()">
            <h6 class="mb-0 pt-1 pb-1 pr-5 pl-5 font-weight-bold fs-25" >ADD</h6>
        </button>
    </div>
    {{--<div class="col-lg-11 mt-5 pr-2 text-right mb-2">--}}
        {{--<a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>--}}
        {{--<a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0" onclick="onapply()">Apply</h5></a>--}}
    {{--</div>--}}
    <div style="margin-bottom:27px"></div>
    <div class="col-lg-12 mt-3 pt-2 pr-4 text-right">
        <a href="{{ route('admin.setting.badge') }}" class="btn bg-white black-text pt-2 pb-2 pr-3 pl-3">
            <h5 class="black-text mb-0 fs-25">
                <b>Cancel</b>
                <img src="{{ asset('img/Group728black.png') }}" style="height:18px; margin: -5px 0 0 20px;">
            </h5>
        </a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-3 pl-3" style="margin-right: -8px;">
            <h5 class="white-text mb-0 fs-25" onclick="onApply()">
                <b>Apply</b>
                <img src="{{ asset('img/Group728white.png') }}" style="height:18px; margin: -5px 0 0 20px;">
            </h5>
        </a>
    </div>
</div>
<script>
    function onFile(){
        $('#image-file').trigger('click');
    }
    $('#image-file').change(function(){
        var image_name = prompt('Please enter badge name');
        if(image_name != null && image_name != ''){
            $('#image-name').val(image_name);
        }
        $('#image_form').submit();
    });
    function onApply()
    {
        $('#active_form').submit();
    }
</script>
@endsection
