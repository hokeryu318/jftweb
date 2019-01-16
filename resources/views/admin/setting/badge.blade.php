@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold pl-5">Badges</h5>
    <div class="row mt-4">
        <div class="col-6">
            <h6 class="text-info font-weight-bold pl-5">Name</h6>
        </div>
        <div class="col-3">
            <h6 class="text-info font-weight-bold pl-5">Image</h6>
        </div>
        <div class="col-3">
            <h6 class="text-info font-weight-bold pl-5">Active</h6>
        </div>
    </div>
    <form action="{{ route('admin.setting.activebadge') }}" method="POST" id="active_form">
    @foreach($badges as $badge)
    <div class="card pt-4 pb-2" style="margin-bottom:10px">
        <div class="row">
            <div class="col-6">
                <h6 class="font-weight-bold pl-5">{{ $badge->name }}</h6>
            </div>
            <div class="col-3 text-center">
                <img class="" src="{{ asset('badges/'.$badge->filepath) }}" width="30px" />
            </div>
            <div class="col-3 text-center">
                <label class="switch-style">
                    <input type="checkbox" name="actives[]" value="{{ $badge->id }}"
                    @if($badge->active == 1)
                    checked
                    @endif
                    >
                    <span class="slider round"></span>
                </label>
            </div>
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
        <button class="btn bg-info text-right radius pt-2 pb-2 pr-4 pl-4" onclick="onFile()"><h6 class="mb-0 pr-3 pl-3 font-weight-bold">ADD</h6></button>
    </div>
    <div class="col-lg-11 mt-5 pr-2 text-right mb-2">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0" onclick="onapply()">Apply</h5></a>
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
    function onapply()
    {
        $('#active_form').submit();
    }
</script>
@endsection
