@extends('admin.setting')

@section('setting')
<div class="col-9 pl-5" style="margin-top: 45px;">
    <form method="POST" action="{{ route('admin.setting.screentime.save') }}" id="saveForm">
    <div class="mt-5">
        <h5 class="black-text font-weight-bold fs-30">Screen Time</h5>
    </div>
    <div class="mt-3">
        <h6 class="font-weight-bold text-info fs-25">Current Screen Time(s)</h6>
        <input style="border:1px solid grey;border-radius:5px;width: 200px;height:50px;font-size: 25px;" class="white pl-2" type="text" name="current_time" id="current_time"
        @if(!empty($screentime)) value="{{ $screentime->screen_time }}" @endif disabled/>
    </div>
    <div class="mt-3">
        <h6 class="font-weight-bold text-info fs-25">New Screen time(s)</h6>
        <input style="border:1px solid grey;border-radius:5px;width: 200px;height:50px;font-size: 25px;" class="white pl-2" type="text" name="new_time" id="new_time"/>
    </div>
    @csrf
    </form>
    <div style="margin-bottom:420px"></div>
    <div class="col-lg-12 mt-5 pt-2 pr-4 text-right">
        <a href="{{ route('admin.setting.screentime') }}" class="btn bg-white black-text pt-2 pb-2 pr-3 pl-3">
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
<div class="modal fade" id="java-alert1" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="margin-top: -50px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('img/Group1101.png') }}"  style="width:25px;height:25px;" class="float-right" />
                </button>
            </div>
            <div class="modal-body pr-4">
                <p id="alert-string1" class="text-center fs-20"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect waves-light fs-20" data-dismiss="modal">
                    Close
                    <img src="{{ asset('img/Group728.png') }}" height="18" class="mb-1" />
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function onApply()
    {
        if($('#new_time').val() == "") {
            $("#alert-string1")[0].innerText = "Please input new time!";
            $("#java-alert1").modal('toggle');
        }
        else{
            $('#saveForm').submit();
        }
        
    }
</script>
@endsection
