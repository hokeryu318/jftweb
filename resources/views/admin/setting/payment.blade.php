@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text pl-5"><span class=" font-weight-bold ">Payment Methods</span> (Up to 5 methods)</h5>
    <div class="row mt-5 pt-2 ml-4 pl-2">
        <div class="col-9">
            <div class="card pt-2 mt-3 pl-2">
                <h5 class="font-weight-bold"><span class="fa fa-navicon"></span> &nbsp;&nbsp; DEBIT</h5>
            </div>
        </div>
        <div class="col-3 pt-2 mt-1">
            <button class="btn black radius pt-2 pb-2 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
        </div>
    </div>
    <div class="row mt-4 ml-4 pl-2">
        <div class="col-9">
            <div class="card pt-2 pl-2">
                <h5 class="font-weight-bold"><span class="fa fa-navicon"></span> &nbsp;&nbsp;VISA / MASTHER</h5>
            </div>
        </div>
        <div class="col-3">
            <button class="btn black radius pt-2 pb-2 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
        </div>
    </div>
    <div class="row mt-4 ml-4 pl-2">
        <div class="col-9">
            <div class="card pt-2 pl-2">
                <h5 class="font-weight-bold"><span class="fa fa-navicon"></span> &nbsp;&nbsp;AMEX</h5>
            </div>
        </div>
        <div class="col-3">
            <button class="btn black radius pt-2 pb-2 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
        </div>
    </div>
    <div class="row mt-4 ml-4 pl-2">
        <div class="col-9">
            <div class="card pt-2 pl-2">
                <h5 class="font-weight-bold"><span class="fa fa-navicon"></span> &nbsp;&nbsp;UNION PAY</h5>
            </div>
        </div>
        <div class="col-3">
            <button class="btn black radius pt-2 pb-2 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
        </div>
    </div>
    <div class="row mt-4 ml-4 pl-2">
        <div class="col-9">
            <div class="card pt-2 pl-2">
                <h5 class="font-weight-bold"><span class="fa fa-navicon"></span> &nbsp;&nbsp;OTHERS</h5>
            </div>
        </div>
        <div class="col-3">
            <button class="btn black radius pt-2 pb-2 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
        </div>
    </div>
    <div class="row mt-4 ml-5 pl-2">
        <div class="col-9">
        </div>
        <div class="col-3">
            <button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4"><h5 class="mb-0 pr-1 pl-1 font-weight-bold">ADD</h5></button>
        </div>
    </div>
    <div class="col-lg-12 mt-5 pr-4 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0">Apply</h5></a>
    </div>
</div>
@endsection
