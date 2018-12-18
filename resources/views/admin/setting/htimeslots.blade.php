@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold pl-5">Holiday Time Slots</h5>
    <br>
    <div class="card pb-3 pt-4 ml-5 col-lg-10 pr-0">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Hoilday</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="row mt-2 mb-4">
            <div class="col-4"></div>
            <div class="col-3 text-info text-center">Start</div>
            <div class="col-3 text-info text-center">Ends</div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 light-text">Morning</p>
            </div>
            <div class="col-3 text-right light-text pr-5">0:00AM</div>
            <div class="col-3 text-right light-text pr-5">0:00AM</div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4"><p class="mb-0 pl-3">Lunch</p></div>
            <div class="col-3 text-right pr-5">12:00PM</div>
            <div class="col-3 text-right pr-5">2:00PM</div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4"><p class="mb-0 pl-3 light-text">Tea</p></div>
            <div class="col-3 text-right light-text pr-5">2:00PM</div>
            <div class="col-3 light-text text-right pr-5">5:30PM</div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4"><p class="mb-0 pl-3 light-text">Dinner</p></div>
            <div class="col-3 light-text text-right pr-5">5:30PM</div>
            <div class="col-3 light-text text-right pr-5">10:00PM</div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4"><p class="mb-0 pl-3 light-text">Late Night</p></div>
            <div class="col-3 text-right light-text pr-5">10:00PM</div>
            <div class="col-3 light-text text-right pr-5">2:00AM</div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="row mt-4 ml-4 pl-2 pr-4">
        <h6 class="text-info font-weight-bold pl-3">Activate Holiday Time Slots On</h6>
        <div class="col-lg-11 " style="max-height:124px; overflow-y:scroll;overflow-x:hidden">
            <div class="row">
                <div class="col-8 pr-0">
                    <div class="card pt-3 pb-2 pl-3">
                        <h5 class="font-weight-bold bigfont"> 25 MAY 2018</h5>
                    </div>
                </div>
                <div class="col-3">
                    <button class="btn bg-info radius pt-3 pb-3 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-8 pr-0">
                    <div class="card pt-3 pb-2 pl-3">
                        <h5 class="font-weight-bold"> 12 APR 2018</h5>
                    </div>
                </div>
                <div class="col-3">
                    <button class="btn bg-info radius pt-3 pb-3 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-8 pr-0">
                    <div class="card pt-3 pb-2 pl-3">
                        <h5 class="font-weight-bold"> 12 APR 2018</h5>
                    </div>
                </div>
                <div class="col-3">
                    <button class="btn bg-info radius pt-3 pb-3 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
                </div>
            </div>
        </div>
    </div>
	<div class="col-lg-11 mt-5 pr-2 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0">Apply</h5></a>
    </div>
</div>
@endsection
