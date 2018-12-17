@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div class="container-fluid blackgrey">
<div style="padding-top:7%;">
</div>
    <div class="container bg-lightgrey pl-5">
        <label class="txtdemibold">Preview</label>
        <div class="row">
            <div class="col-10 bg-white mb-5">
                <div class="row">
                    <div class="col-11">
                        <h1 class="font-weight-bold ">Salmon & Avocado Roll Sushi with Ikura 6pc</h1>
                        <h3 class="font-weight-normal">Our most popular Roll Sushi with fresh salmon and ikura.</h3>
                        <h3 class="text-movee font-weight-bold">$12.50</h3>
                    </div>
                    <div class="col-1">
                        <a class="fa fa-s text-white float-right close_times mt-3">
                            <span class="fa fa-times text-white pt-1"></span>
                        </a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <img src="img/speialimg.png" class="img-fluid w-100" />
                        <p class="text-center text-movee font-weight-bold ">This dish will be prepared<br /> straight away.</p>
                    </div>
                    <div class="col-6">
                        <p class="text-white d-block bg-movee pl-1 pt-1 pb-1 font-weight-bold fs-4">Please Choose:</p>
                        <h3 class="font-weight-bold d-block border-bottom">Sauce</h3>
                        <div class="ml-4">
                            <div class="form-check mb-3">
                                <input type="radio" class="fform-check-input rdobtn" id="materialUnchecked1" name="materialExampleRadios">
                                <label class="form-check-label  txtdemibold font-weight-bold" for="materialUnchecked1">Soy Sauce</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" class="fform-check-input rdobtn" id="materialUnchecked2" name="materialExampleRadios">
                                <label class="form-check-label  txtdemibold font-weight-bold" for="materialUnchecked2">Tamari</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" class="fform-check-input rdobtn" id="materialUnchecked3" name="materialExampleRadios">
                                <label class="form-check-label  txtdemibold font-weight-bold" for="materialUnchecked3">Gomadare</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" class="fform-check-input rdobtn" id="materialUnchecked4" name="materialExampleRadios">
                                <label class="form-check-label  txtdemibold font-weight-bold" for="materialUnchecked4">Spicy Teriyaki</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" class="fform-check-input rdobtn" id="materialUnchecked5" name="materialExampleRadios">
                                <label class="form-check-label txtdemibold font-weight-bold" for="materialUnchecked5">Ponzu</label>
                            </div>
                        </div>
                        <h3 class="font-weight-bold d-block border-bottom">Wasabi</h3>
                        <div class="ml-4">
                            <div class="form-check mb-3">
                                <input type="radio" class="fform-check-input rdobtn" id="materialUnchecked8" name="materialExampleRadios">
                                <label class="form-check-label  txtdemibold font-weight-bold" for="materialUnchecked8">Yes</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" class="fform-check-input rdobtn" id="materialUnchecked9" name="materialExampleRadios">
                                <label class="form-check-label  txtdemibold font-weight-bold" for="materialUnchecked9">No</label>
                            </div>
                        </div>
                        <i class="fa fa-minus-circle fa-5x text-movee ml-5 mr-3"></i> <label class="fs-5 font-weight-normal">00</label><i class="fa fa-plus-circle fa-5x text-movee ml-3"></i>
                        <button class="border-0 bg-movee text-center text-white pt-2 pb-2 w-100 fs-4 borderadious mb-3">ORDER NOW </button>
                        </div>
                </div>

            </div>
            <div class="col-2">
                <a>
                    <span class="">
                        <img src="img/Group 1100.png" height="18" class="float-right" width="19" />
                    </span>
                </a>
                <div style="position:absolute;bottom:6%;">
                    <div>
                        <p class="txtdemibold">Sold out</p>
                        <label class="bs-switch ml-100">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <div>
                        <p class="txtdemibold">Active</p>
                        <label class="bs-switch ml-100">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <button class="editbttnn align-bottom" onClick="onEdit()">
                        EDIT &nbsp;&nbsp;&nbsp;
                        <img src="{{ URL::asset('img/Group728.png') }}" height="20" class="mb-1" />
                    </button>
                </div>

            </div>
        </div>

    </div>
</div>
<script>
    function onEdit(){
        window.location = "{{ route('admin.dish.edit') }}";
    }
</script>
@endsection
