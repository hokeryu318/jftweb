@extends('admin.setting')

@section('setting')
<style>
    .p-edit-oneline{
        padding-top: 8px;
    }
</style>
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold pl-5">Time Slots</h5>
    <h6 class="text-info mb-5 pl-5 font-weight-bold">Regular Time Slots</h6>
    <form action="{{ route('admin.setting.timeslots.post') }}" method="POST" id="post_form">
    <div class="card ml-1 col-lg-10 pr-0">
        <div class="row mt-2 mb-4">
            <div class="col-4"></div>
            <div class="col-3 text-info text-center">Start</div>
            <div class="col-3 text-info text-center">Ends</div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline">Morning</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-morning-start" value="{{ $slots[0]->morning_starts }}">
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-morning-end" value="{{ $slots[0]->morning_ends }}">
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" name="regular-morning-on" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline">Lunch</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-lunch-start" value="{{ $slots[0]->lunch_starts }}">
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-lunch-end" value="{{ $slots[0]->lunch_ends }}">
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" name="regular-lunch-on" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4"><p class="mb-0 pl-3 p-edit-oneline">Tea</p></div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-tea-start" value="{{ $slots[0]->tea_starts }}">
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-tea-end" value="{{ $slots[0]->tea_ends }}">
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" name="regular-tea-on" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline">Dinner</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-dinner-start" value="{{ $slots[0]->dinner_starts }}">
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-dinner-end" value="{{ $slots[0]->dinner_ends }}">
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" name="regular-dinner-on" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline">Late Night</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-latenight-start" value="{{ $slots[0]->latenight_starts }}">
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-latenight-end" value="{{ $slots[0]->latenight_ends }}">
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" name="regular-latenight-on" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
    </div>

    <h6 class="text-info pl-5 font-weight-bold mt-5">Particular Time Slots</h6>

    @php
        $name_array = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $mark_array = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    @endphp
    @foreach($name_array as $i => $key)
    <div class="card ml-1 mt-3 pt-3 pb-2 col-lg-10 pr-0 particular">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal">{{ $mark_array[$i] }}</h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox" class="accordion-check" name="{{ $key }}-on"
                        @if($slots[$i + 1]->day_on == "1")
                            checked
                        @endif
                    >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="accordion-div" style="display:
            @if($slots[$i + 1]->day_on == "1")
                block
            @else
                none
            @endif
            ">
            <div class="row">
                <div class="col-6 pl-4">
                    <h6 class="font-weight-normal light-text">Non-Businees Day</h6>
                </div>
                <div class="col-5 pr-0 text-right">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-business-on"
                        @if($slots[$i + 1]->non_business == "1")
                            checked
                        @endif
                        >
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
                    <p class="mb-0 pl-3 p-edit-oneline">Morning</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="{{ $key }}-morning-start" value="{{ $slots[$i + 1]->morning_starts }}">
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="{{ $key }}-morning-end" value="{{ $slots[$i + 1]->morning_ends }}">
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-morning-on"
                            @if($slots[$i + 1]->morning_on == "1")
                                checked
                            @endif
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline">Lunch</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="{{ $key }}-lunch-start" value="{{ $slots[$i + 1]->lunch_starts }}">
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="{{ $key }}-lunch-end" value="{{ $slots[$i + 1]->lunch_ends }}">
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-lunch-on"
                        @if($slots[$i + 1]->lunch_on == "1")
                            checked
                        @endif
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4"><p class="mb-0 pl-3 p-edit-oneline">Tea</p></div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="{{ $key }}-tea-start" value="{{ $slots[$i + 1]->tea_starts }}">
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="{{ $key }}-tea-end" value="{{ $slots[$i + 1]->tea_ends }}">
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-tea-on"
                        @if($slots[$i + 1]->tea_on == "1")
                            checked
                        @endif
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline">Dinner</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="{{ $key }}-dinner-start" value="{{ $slots[$i + 1]->dinner_starts }}">
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="{{ $key }}-dinner-end" value="{{ $slots[$i + 1]->dinner_ends }}">
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-dinner-on"
                        @if($slots[$i + 1]->dinner_on == "1")
                            checked
                        @endif
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline">Late Night</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="{{ $key }}-latenight-start" value="{{ $slots[$i + 1]->latenight_starts }}">
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="{{ $key }}-latenight-end" value="{{ $slots[$i + 1]->latenight_ends }}">
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-latenight-on"
                        @if($slots[$i + 1]->latenight_on == "1")
                            checked
                        @endif
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
        </div>
    </div>
    @endforeach
    @csrf
    </form>
    <div class="col-lg-11 pr-2 mt-3 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0" onclick="onapply()">Apply</h5></a>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/timepicki.js') }}"></script>
<script>
    $(document).ready(function(){
        //$(".time-element").timepicki({start_time: ["06", "00", "AM"]});
        $(".time-element").each(function(i, obj){
            var init_time = $(obj).val();
            $(obj).timepicki({start_time: [init_time.substring(0, 2), init_time.substring(3, 5), init_time.substring(6, 8)]})
        });

        $('.accordion-check').change(function(){
            var obj = $(this);
            var parent = $(this).closest('.particular');
            var accordion = $('.accordion-div', parent);
            accordion.slideToggle(500, function(){
                return obj.is(':checked') ? "Collapse" : "Expand";
            });
        });

        $('.timepicker_wrap').css('width', '265px');
    });
    function onapply(){
        $('#post_form').submit();
    }
</script>
@endsection
