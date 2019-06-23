@extends('admin.setting')

@section('setting')
<style>
    .p-edit-oneline{
        /*padding-top: 8px;*/
    }
</style>
<div class="col-9 pl-5" style="margin-top: 100px;">
    <h5 class="black-text font-weight-bold fs-30">Time Slots</h5>

    <form class="holiday_form" action="{{ route('admin.setting.timeslots.post') }}" method="POST" id="post_form" style="height: 575px;">

    <h6 class="text-info font-weight-bold mt-3 fs-25">Regular Time Slots</h6>

    <div class="card ml-1 col-lg-11 pr-0">
        <div class="row mt-2 mb-4">
            <div class="col-4"></div>
            <div class="col-3 text-info fs-25">Start</div>
            <div class="col-3 text-info fs-25">Ends</div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline
                    @if($slots[0]->morning_on == "0")
                        light-text
                    @endif
                 fs-25">Morning</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" style="font-size: 25px;" name="regular-morning-start" value="{{ $slots[0]->morning_starts }}"
                @if($slots[0]->morning_on == "0")
                    disabled
                @endif
                >
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" style="font-size: 25px;" name="regular-morning-end" value="{{ $slots[0]->morning_ends }}"
                @if($slots[0]->morning_on == "0")
                    disabled
                @endif
                >
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" class="time-check" name="regular-morning-on"
                    @if($slots[0]->morning_on == "1")
                        checked
                    @endif
                    >
                    <span class="slider round check-round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline
                    @if($slots[0]->lunch_on == "0")
                        light-text
                    @endif
                fs-25">Lunch</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" style="font-size: 25px;" name="regular-lunch-start" value="{{ $slots[0]->lunch_starts }}"
                @if($slots[0]->lunch_on == "0")
                    disabled
                @endif
                >
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" style="font-size: 25px;" name="regular-lunch-end" value="{{ $slots[0]->lunch_ends }}"
                @if($slots[0]->lunch_on == "0")
                    disabled
                @endif
                >
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" class="time-check" name="regular-lunch-on"
                    @if($slots[0]->lunch_on == "1")
                        checked
                    @endif
                    >
                    <span class="slider round check-round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline
                    @if($slots[0]->tea_on == "0")
                        light-text
                    @endif
                fs-25">Tea</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" style="font-size: 25px;" name="regular-tea-start" value="{{ $slots[0]->tea_starts }}"
                @if($slots[0]->tea_on == "0")
                    disabled
                @endif
                >
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" style="font-size: 25px;" name="regular-tea-end" value="{{ $slots[0]->tea_ends }}"
                @if($slots[0]->tea_on == "0")
                    disabled
                @endif
                >
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" class="time-check" name="regular-tea-on"
                    @if($slots[0]->tea_on == "1")
                        checked
                    @endif
                    >
                    <span class="slider round check-round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline
                    @if($slots[0]->dinner_on == "0")
                        light-text
                    @endif
                fs-25">Dinner</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" style="font-size: 25px;" name="regular-dinner-start" value="{{ $slots[0]->dinner_starts }}"
                @if($slots[0]->dinner_on == "0")
                    disabled
                @endif
                >
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" style="font-size: 25px;" name="regular-dinner-end" value="{{ $slots[0]->dinner_ends }}"
                @if($slots[0]->dinner_on == "0")
                    disabled
                @endif
                >
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" class="time-check" name="regular-dinner-on"
                    @if($slots[0]->dinner_on == "1")
                        checked
                    @endif
                    >
                    <span class="slider round check-round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline
                    @if($slots[0]->latenight_on == "0")
                        light-text
                    @endif
                fs-25">Late Night</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" style="font-size: 25px;" name="regular-latenight-start" value="{{ $slots[0]->latenight_starts }}"
                @if($slots[0]->latenight_on == "0")
                    disabled
                @endif
                >
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" style="font-size: 25px;" name="regular-latenight-end" value="{{ $slots[0]->latenight_ends }}"
                @if($slots[0]->latenight_on == "0")
                    disabled
                @endif
                >
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" class="time-check" name="regular-latenight-on"
                    @if($slots[0]->latenight_on == "1")
                        checked
                    @endif
                    >
                    <span class="slider round check-round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
    </div>

    <h6 class="text-info font-weight-bold mt-3 fs-25">Particular Time Slots</h6>

    @php
        $name_array = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $mark_array = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    @endphp
    @foreach($name_array as $i => $key)
    <div class="card ml-1 mt-3 pt-3 pb-2 col-lg-11 pr-0 particular">
        <div class="row">
            <div class="col-7 pl-4">
                <h5 class="font-weight-normal fs-25">{{ $mark_array[$i] }}</h5>
            </div>
            <div class="col-3 pr-0 text-right" style="margin-left: 16px;">
                <label class="switch" style="margin-right: 10px;">
                    <input type="checkbox" class="accordion-check" name="{{ $key }}-on"
                        @if($slots[$i + 1]->day_on == "1")
                            checked
                        @endif
                    style="width:0px; height: 0px;">
                    <span class="slider round top-round"></span>
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
            @if($key == 'saturday' || $key == 'sunday')
            <div class="row">
                <div class="col-7">
                    <h6 class="font-weight-normal light-text pl-2 fs-25">Non-Businees Day</h6>
                </div>
                <div class="col-4 pr-0 text-right" style="margin-left: 16px;">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-business-on"
                        @if($slots[$i + 1]->non_business == "1")
                            checked
                        @endif
                        style="width:0px; height: 0px;">
                        <span class="slider round check-round"></span>
                    </label>
                </div>
            </div>
            @endif
            <div class="row mt-2 mb-4">
                <div class="col-4"></div>
                <div class="col-3 text-info fs-25">Start</div>
                <div class="col-3 text-info fs-25">Ends</div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline
                    @if($slots[$i + 1]->morning_on == "0")
                        light-text
                    @endif
                    fs-25">Morning</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" style="font-size: 25px;" name="{{ $key }}-morning-start" value="{{ $slots[$i + 1]->morning_starts }}"
                    @if($slots[$i + 1]->morning_on == "0")
                        disabled
                    @endif
                    >
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" style="font-size: 25px;" name="{{ $key }}-morning-end" value="{{ $slots[$i + 1]->morning_ends }}"
                    @if($slots[$i + 1]->morning_on == "0")
                        disabled
                    @endif
                    >
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-morning-on" class="time-check"
                            @if($slots[$i + 1]->morning_on == "1")
                                checked
                            @endif
                        >
                        <span class="slider round check-round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline
                    @if($slots[$i + 1]->lunch_on == "0")
                        light-text
                    @endif
                    fs-25">Lunch</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" style="font-size: 25px;" name="{{ $key }}-lunch-start" value="{{ $slots[$i + 1]->lunch_starts }}"
                    @if($slots[$i + 1]->lunch_on == "0")
                        disabled
                    @endif
                    >
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" style="font-size: 25px;" name="{{ $key }}-lunch-end" value="{{ $slots[$i + 1]->lunch_ends }}"
                    @if($slots[$i + 1]->lunch_on == "0")
                        disabled
                    @endif
                    >
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-lunch-on" class="time-check"
                        @if($slots[$i + 1]->lunch_on == "1")
                            checked
                        @endif
                        >
                        <span class="slider round check-round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline
                    @if($slots[$i + 1]->tea_on == "0")
                        light-text
                    @endif
                    fs-25">Tea</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" style="font-size: 25px;" name="{{ $key }}-tea-start" value="{{ $slots[$i + 1]->tea_starts }}"
                    @if($slots[$i + 1]->tea_on == "0")
                        disabled
                    @endif
                    >
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" style="font-size: 25px;" name="{{ $key }}-tea-end" value="{{ $slots[$i + 1]->tea_ends }}"
                    @if($slots[$i + 1]->tea_on == "0")
                        disabled
                    @endif
                    >
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-tea-on" class="time-check"
                        @if($slots[$i + 1]->tea_on == "1")
                            checked
                        @endif
                        >
                        <span class="slider round check-round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline
                    @if($slots[$i + 1]->dinner_on == "0")
                        light-text
                    @endif
                    fs-25">Dinner</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" style="font-size: 25px;" name="{{ $key }}-dinner-start" value="{{ $slots[$i + 1]->dinner_starts }}"
                    @if($slots[$i + 1]->dinner_on == "0")
                        disabled
                    @endif
                    >
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" style="font-size: 25px;" name="{{ $key }}-dinner-end" value="{{ $slots[$i + 1]->dinner_ends }}"
                    @if($slots[$i + 1]->dinner_on == "0")
                        disabled
                    @endif
                    >
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-dinner-on" class="time-check"
                        @if($slots[$i + 1]->dinner_on == "1")
                            checked
                        @endif
                        >
                        <span class="slider round check-round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline
                    @if($slots[$i + 1]->latenight_on == "0")
                        light-text
                    @endif
                    fs-25">Late Night</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" style="font-size: 25px;" name="{{ $key }}-latenight-start" value="{{ $slots[$i + 1]->latenight_starts }}"
                    @if($slots[$i + 1]->latenight_on == "0")
                        disabled
                    @endif
                    >
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" style="font-size: 25px;" name="{{ $key }}-latenight-end" value="{{ $slots[$i + 1]->latenight_ends }}"
                    @if($slots[$i + 1]->latenight_on == "0")
                        disabled
                    @endif
                    >
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="{{ $key }}-latenight-on" class="time-check"
                        @if($slots[$i + 1]->latenight_on == "1")
                            checked
                        @endif
                        >
                        <span class="slider round check-round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
        </div>
    </div>
    @endforeach
    @csrf
    </form>
    <div class="col-lg-12 mt-5 pt-2 pr-4 text-right">
        <a href="{{ route('admin.setting.timeslots') }}" class="btn bg-white black-text pt-2 pb-2 pr-3 pl-3">
            <h5 class="black-text mb-0 fs-25">
                <b>Cancel</b>
                <img src="{{ asset('img/Group728black.png') }}" style="height:18px; margin: -5px 0 0 20px;">
            </h5>
        </a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-3 pl-3" style="margin-right: -8px;">
            <h5 class="white-text mb-0 fs-25" onclick="onApply()">
                <b>Apply</b>
                <img src="{{ asset('img/Group728white.png') }}" style="height:18px; margin: -5px 0 0 20px;">
            </h5>
        </a>
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

        $('.time-check').change(function(){
            var parent = $(this).closest('.row');
            if($(this).is(":checked")){
                $('.p-edit-oneline', parent).removeClass('light-text');
                $('.time-element', parent).prop('disabled', false);
            } else {
                $('.p-edit-oneline', parent).addClass('light-text');
                $('.time-element', parent).prop('disabled', true);
            }
        })
    });
    function onApply(){
        $('#post_form').submit();
    }
</script>
@endsection
