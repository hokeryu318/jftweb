@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0 pt-5 mt-5">
    <div class="row">
        <div class="col-2">
            <img src="{{ asset('img/img1.png') }}" />
        </div>
        <div class="col-4 pl-0 text-left">
            <button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 mt-4">CHANGE LOGO</button>
        </div>
    </div>
    <div class=" mt-3">
        <h6 class="font-weight-bold text-info">Shop Name</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" placeholder="NISHIKIAN"/>
    </div>
    <div class=" mt-2">
        <h6 class="font-weight-bold text-info">ABN</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" placeholder="43 245 413 073"/>
    </div>
    <div class="mt-2">
        <h6 class="font-weight-bold text-info">Address</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" placeholder="425 Springvale Rd, Forest Hill VIC 3131"/>
    </div>
    <div class="mt-2">
        <h6 class="font-weight-bold text-info">Phone</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" placeholder="(03) 9877 4999"/>
    </div>
    <div style="margin-bottom:50px" class="margin">
    </div>
    <div class="col-11 mt-5 pr-2 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel ></h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0">Apply ></h5></a>
    </div>
</div>
@endsection
