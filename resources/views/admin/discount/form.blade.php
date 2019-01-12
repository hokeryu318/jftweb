@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<style>
    .option-padding {
        padding-top : 0.6rem;
        padding-bottom : 0.6rem;
    }
</style>
<div class="container-fluid pb-3 pt-3 blackgrey">
    <div style="padding-top:8%;"></div>
    <div class="widthh pt-3 pb-3 mb-3 white">
        <div class="row">
            <div class="col-12">
                <a>
                    <span class="">
                        <img src="{{ asset('img/Group1100.png') }}" height="20" class="float-right" width="20" />
                    </span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Choose Dish</label>
                    </div>

                    <select class="border-blue select-width-blue mr-1 option-padding option-select" style="width:100%" name="dish_id">
                        @foreach ($dishes as $ds)
                            <option value="{{ $ds->id }}">{{ $ds->name_en }}</option>
                        @endforeach
                    </select>
                    <label class="text-blue float-right text-right">RRP: $ 12.55</label>
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Discounted Price:</label>
                    </div>
                    <input type="number" class="outline-0 border-bottom-blue" name="discount" step=0.01/>
                    <label class="text-blue float-right  text-right">(Included GST: $ 0.90)</label>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <div>
                    <label class="text-blue txtdemibold mr-3">Start</label>
                    <div class="form-check d-inline">
                        <input type="radio" class="form-check-input rdobtn" id="materialUnchecked" name="start">
                        <label class="form-check-label text-blue txtdemibold" for="materialUnchecked">Now</label>
                    </div>
                </div>
                <div>
                    <label class="text-blue txtdemibold invisible mr-3">Start</label>
                    <div class="form-check d-inline">
                        <input type="radio" class="form-check-input" id="materialChecked" name="start" checked>
                        <label class="form-check-label text-blue txtdemibold" for="materialChecked">30 MAY 2018 12:00PM</label>
                    </div>
                    <button class="addOptionbtn pl-4 pr-4 float-right">Change</button>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <label class="text-blue txtdemibold mr-3 ">End</label>
                    <div class="form-check d-inline">
                        <input type="radio" class="form-check-input" id="materialUnchecked2" name="end">
                        <label class="form-check-label text-blue txtdemibold" for="materialUnchecked2">Indefinite</label>
                    </div>
                </div>
                <div>
                    <label class="text-blue txtdemibold invisible mr-3">End</label>
                    <div class="form-check d-inline">
                        <input type="radio" class="form-check-input" id="materialChecked3" name="end" checked>
                        <label class="form-check-label text-blue txtdemibold" for="materialChecked3">30 MAY 2018 12:00PM</label>
                    </div>
                    <button class="addOptionbtn pl-4 pr-4 float-right">Change</button>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-7">
                <label class="text-blue txtdemibold">Time Slots</label>
                <div class="border-bottom-blue3 mt-3 mb-3"></div>
                <div class="border-bottom-blue">
                    <div class="row">
                        <div class="col-8"><label class="txtdemibold mt-2">Breakfast</label></div>
                        <div class="col-4">
                            <div class="float-right mt-2">
                                <label class="bs-switch">
                                    <input type="checkbox" name="timeslot_breakfast">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-bottom-blue">
                    <div class="row">
                        <div class="col-8"><label class="txtdemibold mt-2">Lunch</label></div>
                        <div class="col-4">
                            <div class="float-right mt-2">
                                <label class="bs-switch ">
                                    <input type="checkbox" name="timeslot_lunch">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-bottom-blue">
                    <div class="row">
                        <div class="col-8"><label class="txtdemibold mt-2">Tea</label></div>
                        <div class="col-4">
                            <div class="float-right mt-2">
                                <label class="bs-switch ">
                                    <input type="checkbox" name="timeslot_tea">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-blue">
                    <div class="row">
                        <div class="col-8"><label class="txtdemibold mt-2">Dinner</label></div>
                        <div class="col-4">
                            <div class="float-right mt-2">
                                <label class="bs-switch ">
                                    <input type="checkbox" name="timeslot_dinner">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-7">
                <button class="grey-button">
                    END NOW
                    <img src="{{ asset('img/Group728.png') }}" height="20" class="mb-1" />
                </button>
            </div>
            <div class="col-5">
                <button class="grey-button ml-5">
                    CANCEL
                    <img src="{{ asset('img/Group728.png') }}" height="20" class="mb-1" />
                </button>
                <button class="green-button">
                    Apply
                    <img src="{{ asset('img/Group728white.png') }}" height="20" class="mb-1" />
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $('.holiday').datepicker({
        dateFormat : "dd M yy",
        changeYear : true,
        changeMonth : true
    });

</script>
@endsection
