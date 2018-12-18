@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0 pt-5">
    <div class="mt-5">
        <h6 class="font-weight-bold text-info">Menu</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2" type="password" placeholder="****"/>
    </div>
    <div class=" mt-2">
        <h6 class="font-weight-bold text-info">Kitchen</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2" type="password" placeholder="****"/>
    </div>
    <div class="mt-2">
        <h6 class="font-weight-bold text-info">Reception</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2" type="password" placeholder="****"/>
    </div>
    <div class="mt-2">
        <h6 class="font-weight-bold text-info">Admin</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2" type="password" placeholder="****"/>
    </div>
    <div style="margin-bottom:155px">
    </div>

    <div class="col-11 mt-5 pr-2 text-right margin" >
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel ></h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0">Apply ></h5></a>
    </div>
</div>
@endsection
