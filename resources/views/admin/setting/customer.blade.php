@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold pl-5">New Customer</h5>
    <h6 class="font-weight-bold text-info pl-5 pt-3 mt-2">Default duration</h6>
    <div class="card ml-5 col-lg-5 col-8 pt-4 mr-auto pb-4 ml-auto">
        <div class="col-lg-12 pr-4 pl-4 text-center">
            <Label class=" pt-2 pb-2 mb-3 w-100 text-info text-left" style="border-bottom:2px solid #039bfa">30 min</label>
            <br>
            <label class="light-text">Takeaway</label>
            <br>
            <label class="black-text w-100 pt-1 pb-1" style="border-bottom:2px solid black;border-top:2px solid black">30 min</label>
            <br>
            <label class="light-text">60 min</label>
            <br>
            <label class="light-text">90 min</label>
            <br>
            <label class="light-text">120 min</label>
            <br>
            <label class="light-text">Unlimited</label>
        </div>
    </div>
    <div style="margin-bottom:150px" class="margin"></div>
    <div class="col-11 mt-5 pr-2 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0">Apply</h5></a>
    </div>
</div>
@endsection
