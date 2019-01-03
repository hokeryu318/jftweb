@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold pl-5">GST</h5>
    <div class="card ml-5 col-lg-5 pt-4 mr-auto pb-4 ml-auto mt-5">
        <div class="col-lg-12 pr-0 pl-0 text-center">
            <input class="blueborder pt-2 pb-2 mb-3" value="{{ $profile->gst }} %" readonly id="result"
                style="padding-left:10px;padding-right:10px;text-align:right" />
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="7">
                    <h4 class="mb-0">7</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="8">
                    <h4 class="mb-0">8</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="9">
                    <h4 class="mb-0">9</h4>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="4">
                    <h4 class="mb-0">4</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="5">
                    <h4 class="mb-0">5</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="6">
                    <h4 class="mb-0">6</h4>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="1">
                    <h4 class="mb-0">1</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="2">
                    <h4 class="mb-0">2</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="3">
                    <h4 class="mb-0">3</h4>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="C">
                    <h4 class="mb-0">C</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="0">
                    <h4 class="mb-0">0</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="grey text-center white-text radius pt-3 pb-3" data="B">
                    <h4 class="mb-0"><span class="fa fa-arrow-left"></span></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-11 mt-5 pr-2 text-right">
        <button class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></button>
        <button class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2" onclick="onSave()"><h5 class="white-text mb-0">Apply</h5></button>
    </div>
</div>
<form method="POST" action="{{ route('admin.setting.gst.save') }}" id="saveForm">
    @csrf
    <input type="hidden" name="gst" id="form_result">
</form>
<script>
    var gst = 0;
    $(".grey").click(function(){
        var v = $(this).attr('data');
        if(v != 'C' && v != 'B'){
            if(gst / 10 > 1){
                return;
            }
            gst = gst * 10 + Number(v);
        } else if (v == 'B') {
            if(gst > 10) {
                gst = (gst - gst % 10) / 10;
            } else {
                gst = 0;
            }
        } else if (v == 'C') {
            gst = 0;
        }
        $('#result').val(gst + " %");
    });
    function onSave(){
        $('#form_result').val(gst);
        $('#saveForm').submit();
    }
</script>
@endsection
