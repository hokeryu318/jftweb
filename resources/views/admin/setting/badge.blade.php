@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold pl-5">Badge</h5>
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
    <div class="card pt-4 pb-2 mb-5">
        <div class="row">
            <div class="col-6">
                <h6 class="font-weight-bold pl-5">Special</h6>
            </div>
            <div class="col-3 text-center">
                <img class="" src="img/spec.png" />
            </div>
            <div class="col-3 text-center">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="text-right">
        <button class="btn bg-info text-right radius pt-2 pb-2 pr-4 pl-4"><h6 class="mb-0 pr-3 pl-3 font-weight-bold">ADD</h6></button>
    </div>
    <div style="margin-top:230px">&nbsp;</div>
    <div class="col-lg-11 mt-5 pr-2 text-right mb-2">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0">Apply</h5></a>
    </div>
</div>
@endsection
