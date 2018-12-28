@extends('layout.admin_layout')

@section('title', 'Settings')

@section('content')
<div style="padding-top:4%;"></div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-1 pr-0 pl-0 text-center">
                <div class="text-center pl-4 pt-2"style="background:#868585;">
                    <img src="{{ asset('img/arrow.png') }}" class="mr-4"/>
                    <p class="vericaltext text-center pt-3 mr-3 pb-3" style="height:225px">DISPLAY ALL TABLE</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('img/plus.png') }}" />
                    <p class="font-weight-bold pt-2">100%</p>
                    <img src="{{ asset('img/minus.png') }}" />
                </div>
            </div>
            <div class="col-8">
                <div style="background-image:{{ asset('img/bg1.png') }};">
                    <div class="row">
                        <div class="col-6 text-center">
                            <div class="row">
                                <div class="col-3">
                                    <div class="white" style="border:2px solid grey;height:100px;">
                                    <h5 class="font-weight-bold grey-text">A-1</h5>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="white" style="border:2px solid grey;height:100px;">
                                    <h5 class="font-weight-bold grey-text">A-2</h5>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="white" style="border:2px solid grey;height:100px;">
                                    <h5 class="font-weight-bold grey-text">A-3</h5>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="white" style="border:2px solid grey;height:100px;">
                                    <h5 class="font-weight-bold grey-text">A-4</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="row">
                            <div class="col-3">
                                <div class="white" style="border:2px solid grey;height:100px;">
                                    <h5 class="font-weight-bold grey-text">A-5</h5>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="white" style="border:2px solid grey;height:100px;">
                                    <h5 class="font-weight-bold grey-text">A-6</h5>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="white" style="border:2px solid grey;height:100px;">
                                    <h5 class="font-weight-bold grey-text">A-7</h5>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="white" style="border:2px solid grey;height:100px;">
                                    <h5 class="font-weight-bold grey-text">A-8</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-2 text-center">
                        <div style="background-image:{{ asset('img/bg2.png') }};background-position:center;height:150px;background-repeat:no-repeat;background-size:100%">
                            <h5 class="font-weight-bold pt-5 grey-text fs-4">B-1</h5>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <div style="background-image:{{ asset('img/bg2.png') }};background-position:center;height:150px;background-repeat:no-repeat;background-size:100%">
                            <h5 class="font-weight-bold pt-5 grey-text fs-4">B-2</h5>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <div style="background-image:{{ asset('img/bg2.png') }};background-position:center;height:150px;background-repeat:no-repeat;background-size:100%">
                            <h5 class="font-weight-bold pt-5 fs-4 grey-text fs-4">B-3</h5>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <div style="background-image:{{ asset('img/bg2.png') }};background-position:center;height:150px;background-repeat:no-repeat;background-size:100%">
                            <h5 class="font-weight-bold pt-5 fs-4 grey-text">B-4</h5>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <div style="background-image:{{ asset('img/bg2.png') }};background-position:center;height:150px;background-repeat:no-repeat;background-size:100%">
                            <h5 class="font-weight-bold pt-5 fs-4 grey-text ">B-5</h5>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <div style="background-image:{{ asset('img/bg2.png') }};background-position:center;height:150px;background-repeat:no-repeat;background-size:100%">
                            <h5 class="font-weight-bold pt-5 grey-text fs-4">B-6</h5>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <img src="{{ asset('img/bg3.png') }}" class="img-fluid col-12 hight1" style="height:300px;" />
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="p-2" style="background:#d8d8d8;">
                <h3 class="text-info font-weight-bold h3-responsive">Display Name</h3>
                    <h4 class="black-text mb-xl-4 font-weight-bold h4-responsive" style="border-bottom:3px solid #039bfa !important;">B-2</h4>
<div class="text-center">
<img src="{{ asset('img/arrowbottom.png') }}" />
<input type="" class="d-inline black-text font-weight-bold text-center w-25 mr-3 ml-3" placeholder="2" />
<img src="{{ asset('img/arrowtop.png') }}" />

</div>
<div class="text-center mt-xl-4">
<h4 class="text-info font-weight-bold text-left h4-responsive">X-Coordinate</h4>

<img src="{{ asset('img/arrowleft.png') }}" />
<input type="" class="d-inline black-text font-weight-bold text-center w-25 mr-3 ml-3" placeholder="2" />
<img src="{{ asset('img/arrowright.png') }}" />

</div>
<div class="text-center mt-xl-4">
<h4 class="text-info font-weight-bold text-left h4-responsive">Y-Coordinate</h4>

<img src="{{ asset('img/arrowbottom.png') }}" />
<input type="" class="d-inline black-text font-weight-bold text-center w-25 mr-3 ml-3" placeholder="2" />
<img src="{{ asset('img/arrowtop.png') }}" />

</div>
<div class="row mt-xl-3">
<div class="col-6 pl-xl-5">
<button class="btn grey pr-2 pl-2"><h5 class="mb-0 font-weight-bold h5-responsive">CANCEL <br>></h5></button>

</div>
<div class="col-6 pl-xl-2">
<button class="btn bg-info pr-2 pl-2"><h5 class="mb-0 font-weight-bold h5-responsive">&nbsp;&nbsp;APPLY&nbsp;&nbsp; <br>></h5></button>

</div>

</div>
<div class="row pr-3 pl-3 mt-2 mb-2">

<button class="btn bg-grey pr-2 pl-2 w-100"><h5 class="mb-0 font-weight-bold h5-responsive">DELETE THIS TABLE ></h5></button>

</div>
</div>
<div class="row pl-1 pr-1 mt-3">

<button class="btn black pr-2 pl-2 w-100"><h5 class="mb-0 font-weight-bold">ADD NEW TABLE ></h5></button>
<button class="btn bg-info pr-2 pl-2 w-100"><h5 class="mb-0 font-weight-bold">ADD LINE ></h5></button>
<button class="btn bg-info pr-2 pl-2 w-100"><h5 class="mb-0 font-weight-bold">CHANGE ROOM SIZE ></h5</button>

</div>
</div>
</div></div>
@endsection
