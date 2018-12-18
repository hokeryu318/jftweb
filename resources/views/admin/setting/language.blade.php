@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold pl-5">Multilingual</h5>
    <div class="card pt-4 ml-5 mt-4 col-lg-10 pr-0 pb-3">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Japanese</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="card pt-4 ml-5 mt-4 col-lg-10 pr-0 pb-3">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Korean</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="card pt-4 ml-5 mt-4 col-lg-10 pr-0 pb-3">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Mandarin</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div style="margin-bottom:170px" class="margin"></div>
    <div class="col-11 mt-5 pr-2 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0">Apply</h5></a>
    </div>
</div>
@endsection
