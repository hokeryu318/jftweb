@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold pl-5">Time Slots</h5>
    <h6 class="text-info mb-5 pl-5 font-weight-bold">Regular Time Slots</h6>
    <div class="card ml-1 col-lg-10 pr-0">
        <div class="row mt-2 mb-4">
            <div class="col-4"></div>
            <div class="col-3 text-info text-center">Start</div>
            <div class="col-3 text-info text-center">Ends</div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3">Morning</p>
            </div>
            <div class="col-3 text-right pr-5">0:00AM</div>
            <div class="col-3 text-right pr-5">0:00AM</div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3">Lunch</p>
            </div>
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
            <div class="col-4"><p class="mb-0 pl-3">Tea</p></div>
            <div class="col-3 text-right pr-5">2:00PM</div>
            <div class="col-3 text-right pr-5">5:30PM</div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4"><p class="mb-0 pl-3">Dinner</p></div>
            <div class="col-3 text-right pr-5">5:30PM</div>
            <div class="col-3 text-right pr-5">10:00PM</div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3">Late Night</p>
            </div>
            <div class="col-3 text-right pr-5">10:00PM</div>
            <div class="col-3 text-right pr-5">2:00AM</div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
    </div>

    <h6 class="text-info pl-5 font-weight-bold mt-5">Irrgular Time Slots</h6>
    <div class="card ml-1 pt-3 pb-2 col-lg-10 pr-0">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Monday</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>

    <div class="card ml-1 mt-3 pt-3 pb-2 col-lg-10 pr-0">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Tuesday</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>

    <div class="card ml-1 mt-3 pt-3 pb-2 col-lg-10 pr-0">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Wednesday</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>

    <div class="card ml-1 mt-3 pt-3 pb-2 col-lg-10 pr-0">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Thursday</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>

    <div class="card ml-1 mt-3 pt-3 pb-2 col-lg-10 pr-0">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Friday</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>


    <div class="card pt-4 ml-1 mt-3 col-lg-10 pr-0">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Saturday</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-6 pl-4">
                <h6 class="font-weight-normal light-text">Non-Businees Day</h6>
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
            <div class="col-4">
                <p class="mb-0 pl-3">Lunch</p>
            </div>
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
            <div class="col-4">
                <p class="mb-0 pl-3 light-text">Tea</p>
            </div>
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
            <div class="col-4">
                <p class="mb-0 pl-3 light-text">Dinner</p>
            </div>
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
            <div class="col-4">
                <p class="mb-0 pl-3 light-text">Late Night</p>
            </div>
            <div class="col-3 text-right light-text pr-5">10:00PM</div>
            <div class="col-3 light-text text-right pr-5">2:00AM</div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
    </div>

    <div class="card pt-4 ml-1 mt-3 col-lg-10 pr-0">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">Saturday</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-6 pl-4">
                <h6 class="font-weight-normal light-text">Non-Businees Day</h6>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>

    <div class="col-lg-11 pr-2 mt-3 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0">Apply</h5></a>
    </div>
</div>
@endsection
