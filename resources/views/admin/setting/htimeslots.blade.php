@extends('admin.setting')

@section('setting')
<style>
    .p-edit-oneline{
        padding-top: 8px;
    }
</style>
<div class="col-9 pl-5" style="margin-top: 100px;">
    <h5 class="black-text font-weight-bold fs-30">Holiday Time Slots</h5>
    <br>
    <form class="holiday_form" action="{{ route('admin.setting.htimeslots.post') }}" method="POST" id="post_form" style="height: 480px;">
        <div class="card ml-1 col-lg-11 pr-0 pt-4 particular">
            <div class="row">
                <div class="col-6 pl-4">
                    <h5 class="font-weight-normal fs-25">Hoilday</h5>
                </div>
                <div class="col-5 pr-0 text-right" style="margin-left: -18px;">
                    <label class="switch-style">
                        <input type="checkbox" class="accordion-check" name="holiday-on"
                            @if($slot->day_on == "1")
                                checked
                            @endif
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="accordion-div" style="display:
                @if($slot->day_on == "1")
                    block
                @else
                    none
                @endif
                ">
                <div class="row mt-2 mb-4">
                    <div class="col-4"></div>
                    <div class="col-3 text-info fs-25">Start</div>
                    <div class="col-3 text-info fs-25">Ends</div>
                    <div class="col-2"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        {{--<p class="mb-0 pl-3 p-edit-oneline">Morning</p>--}}
                        <p class="mb-0 pl-3 p-edit-oneline
                            @if($slot->morning_on == "0")
                                light-text
                            @endif
                        fs-25">Morning</p>
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" style="font-size: 25px;" name="holiday-morning-start" value="{{ $slot->morning_starts }}">
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" style="font-size: 25px;" name="holiday-morning-end" value="{{ $slot->morning_ends }}">
                    </div>
                    <div class="col-2 pl-0">
                        <label class="switch-style">
                            <input type="checkbox" class="time-check" name="holiday-morning-on"
                            @if($slot->morning_on == "1")
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
                        <p class="mb-0 pl-3 p-edit-oneline
                            @if($slot->lunch_on == "0")
                                light-text
                            @endif
                        fs-25">Lunch</p>
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" style="font-size: 25px;" name="holiday-lunch-start" value="{{ $slot->lunch_starts }}">
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" style="font-size: 25px;" name="holiday-lunch-end" value="{{ $slot->lunch_ends }}">
                    </div>
                    <div class="col-2 pl-0">
                        <label class="switch-style">
                            <input type="checkbox" class="time-check" name="holiday-lunch-on"
                            @if($slot->lunch_on == "1")
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
                        <p class="mb-0 pl-3 p-edit-oneline
                            @if($slot->tea_on == "0")
                                light-text
                            @endif
                        fs-25">Tea</p>
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" style="font-size: 25px;" name="holiday-tea-start" value="{{ $slot->tea_starts }}">
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" style="font-size: 25px;" name="holiday-tea-end" value="{{ $slot->tea_ends }}">
                    </div>
                    <div class="col-2 pl-0">
                        <label class="switch-style">
                            <input type="checkbox" class="time-check" name="holiday-tea-on"
                            @if($slot->tea_on == "1")
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
                        <p class="mb-0 pl-3 p-edit-oneline
                            @if($slot->dinner_on == "0")
                                light-text
                            @endif
                        fs-25">Dinner</p>
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" style="font-size: 25px;" name="holiday-dinner-start" value="{{ $slot->dinner_starts }}">
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" style="font-size: 25px;" name="holiday-dinner-end" value="{{ $slot->dinner_ends }}">
                    </div>
                    <div class="col-2 pl-0">
                        <label class="switch-style">
                            <input type="checkbox" class="time-check" name="holiday-dinner-on"
                            @if($slot->dinner_on == "1")
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
                        <p class="mb-0 pl-3 p-edit-oneline
                            @if($slot->latenight_on == "0")
                                light-text
                            @endif
                        fs-25">Late Night</p>
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" style="font-size: 25px;" name="holiday-latenight-start" value="{{ $slot->latenight_starts }}">
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" style="font-size: 25px;" name="holiday-latenight-end" value="{{ $slot->latenight_ends }}">
                    </div>
                    <div class="col-2 pl-0">
                        <label class="switch-style">
                            <input type="checkbox" class="time-check" name="holiday-latenight-on"
                            @if($slot->latenight_on == "1")
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
        <div class="row mt-4 pr-4">
            <h6 class="text-info font-weight-bold ml-3 fs-25">Activate Holiday Time Slots On</h6>
            <div class="col-lg-11" style="margin-left: 2px;">
                <div id="content">
                @foreach ($holidays as $holiday)
                    <div class="row mt-2 element">
                        <div class="col-10">
                            <input class="card pt-2 pb-2 pl-4 pr-4 font-weight-bold holiday" style="width:100%;margin-top:8.5px;font-size: 25px;" name="org" value="{{ $holiday->holiday_date }}">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn bg-info radius-1 pt-2 pb-2 pr-4 pl-4" style="margin-top:8.5px" data-id="{{ $holiday->id }}" onclick="deleteDay(this)">
                                <h6 class="mb-0 font-weight-bold fs-25">Delete</h6>
                            </button>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="mb-2"></div>
            </div>
        </div>
        @csrf
    </form>

    <div class="row mt-2">
        <div class="col-9 pt-3">
            <input class="card pt-2 pb-2 pl-4 pr-4 font-weight-bold holiday addholiday" style="width:98.5%;font-size: 25px;">
        </div>
        <div class="col-2 pt-3">
            <button type="button" class="btn bg-info radius-1 pt-2 pb-2 pr-4 pl-4" style="margin-left: -6px;width: 135px;" onclick="addDay()">
                <h6 class="mb-0 font-weight-bold fs-25">Add</h6>
            </button>
        </div>
    </div>

    <div class="row mt-2 element" id="clone" style="display:none">
        <div class="col-10">
            <input class="card pt-2 pb-2 pl-4 pr-4 font-weight-bold holiday fs-25" style="width:100%;margin-top:8.5px;" name="new[]">
        </div>
        <div class="col-2">
            <button type="button" class="btn bg-info radius-1 pt-2 pb-2 pr-4 pl-4" style="margin-left:6px;" onclick="deleteDay(this)" data-id="0">
                <h6 class="mb-0 font-weight-bold fs-25">Delete</h6>
            </button>
        </div>
    </div>
	{{--<div class="col-lg-11 mt-5 pr-2 text-right" style="margin-bottom:20px;">--}}
        {{--<a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel &gt;</h5></a>--}}
        {{--<a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2" style="background:#1EC2C9!important;width:100px;"><h5 class="white-text mb-0" onclick="onapply()">Apply &gt;</h5></a>--}}
    {{--</div>--}}

    <div class="col-lg-12 pt-2 pr-4 text-right" style="margin-top: 40px;">
        <a href="{{ route('admin.setting.htimeslots') }}" class="btn bg-white black-text pt-2 pb-2 pr-3 pl-3">
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
<script src="{{ asset('js/bootstrap-timepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
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

        $('.holiday').datepicker({
            dateFormat : "dd M yy",
            changeYear : true,
            changeMonth : true
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
    function addDay(){
        var date = $('.addholiday').val();
        if(date == "") return;
        var div = $('#clone').clone();
        $(div).show();
        $('.holiday', div).val(date);
        $('#content').append(div);
        $('.addholiday').val('');
    }
    function deleteDay(obj){
        var id = $(obj).data('id');
        if(id > 0){
            var parent = $(obj).closest('.element');
            parent.hide();
            var name_edit = $('.holiday', parent);
            name_edit.attr('name', 'removed[]');
            name_edit.attr('value', id);
        }
        else
            $(obj).closest('.element').remove();
    }
</script>
@endsection
