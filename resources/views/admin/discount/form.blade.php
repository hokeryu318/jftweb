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
                    <button class="addOptionbtn pl-4 pr-4 float-right" onclick="onDateModal()">Change</button>
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
        <div class="row">
            <div class="col-4">
                <h3 class="font-weight-bold text-info">Select Date</h3>
                <div id="datetimepicker12" class="w-100">
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
<div class="modal fade" id="datetimemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pr-4">
                <div class="row">
                    <div class="col-4">
                        <h3 class="font-weight-bold text-info">Today</h3>
                        <div id="datetimepicker12" class="w-100">
                    </div>
                </div>
                            <div class="col-4 text-center">
                <h3 class="font-weight-bold mb-3 text-left text-info" style="border-bottom:2px solid #1ec2c9;padding-bottom:11px">NOW</h3>
                <label class="light-text text-center ll">10:00 PM</label>
                <br>
                <label class="black-text w-100 text-center ll pt-1 pb-1" style="border-bottom:2px solid black;border-top:2px solid black">10:15 PM</label>
                <br>
                <label class="light-text text-center ll">10:30 PM </label>
                <br>
                <label class="light-text text-center ll">10:45 PM</label>
                <br>
                <label class="light-text text-center ll">11:00 PM</label>
                <br>
                <label class="light-text text-center ll">11:15 PM</label><br>
                <label class="light-text text-center ll">11:30 PM</label><br>
                <label class="light-text text-center ll">11:45 PM</label><br>
                <label class="light-text text-center ll">12:00 AM</label><br>
                <label class="light-text text-center ll">12:30 AM</label><br>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">CANCEL &gt;</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="addCategory()">APPLY &gt;</button>
            </div>
        </div>
    </div>
</div>
<script>
function onDateModal(){
    $('#datetimemodal').modal('show');
}
$('.close').click(function(){
    $('#datetimemodal').modal('hide');
});
</script>
@endsection
