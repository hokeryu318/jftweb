@extends('admin.setting')

@section('setting')
<style>
    .p-edit-oneline{
        padding-top: 8px;
    }
</style>
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold pl-5">Holiday Time Slots</h5>
    <br>
    <form action="{{ route('admin.setting.htimeslots.post') }}" method="POST" id="post_form">
        <div class="card ml-1 col-lg-10 pr-0 pt-4 particular">
            <div class="row">
                <div class="col-6 pl-4">
                    <h5 class="font-weight-normal">Hoilday</h5>
                </div>
                <div class="col-5 pr-0 text-right">
                    <label class="switch">
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
                    <div class="col-3 text-info text-center">Start</div>
                    <div class="col-3 text-info text-center">Ends</div>
                    <div class="col-2"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="mb-0 pl-3 p-edit-oneline">Morning</p>
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" name="holiday-morning-start" value="{{ $slot->morning_starts }}">
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" name="holiday-morning-end" value="{{ $slot->morning_ends }}">
                    </div>
                    <div class="col-2 pl-0">
                        <label class="switch">
                            <input type="checkbox" name="holiday-morning-on"
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
                        <p class="mb-0 pl-3 p-edit-oneline">Lunch</p>
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" name="holiday-lunch-start" value="{{ $slot->lunch_starts }}">
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" name="holiday-lunch-end" value="{{ $slot->lunch_ends }}">
                    </div>
                    <div class="col-2 pl-0">
                        <label class="switch">
                            <input type="checkbox" name="holiday-lunch-on"
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
                    <div class="col-4"><p class="mb-0 pl-3 p-edit-oneline">Tea</p></div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" name="holiday-tea-start" value="{{ $slot->tea_starts }}">
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" name="holiday-tea-end" value="{{ $slot->tea_ends }}">
                    </div>
                    <div class="col-2 pl-0">
                        <label class="switch">
                            <input type="checkbox" name="holiday-tea-on"
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
                        <p class="mb-0 pl-3 p-edit-oneline">Dinner</p>
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" name="holiday-dinner-start" value="{{ $slot->dinner_starts }}">
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" name="holiday-dinner-end" value="{{ $slot->dinner_ends }}">
                    </div>
                    <div class="col-2 pl-0">
                        <label class="switch">
                            <input type="checkbox" name="holiday-dinner-on"
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
                        <p class="mb-0 pl-3 p-edit-oneline">Late Night</p>
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" name="holiday-latenight-start" value="{{ $slot->latenight_starts }}">
                    </div>
                    <div class="col-3 text-right pr-5">
                        <input type="text" class="time-element" name="holiday-latenight-end" value="{{ $slot->latenight_ends }}">
                    </div>
                    <div class="col-2 pl-0">
                        <label class="switch">
                            <input type="checkbox" name="holiday-latenight-on"
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
        <div class="row mt-4 ml-1 pr-4">
            <h6 class="text-info font-weight-bold pl-3">Activate Holiday Time Slots On</h6>
            <div class="col-lg-11 " style="max-height:150px; overflow-y:scroll;overflow-x:hidden">
                <div id="content">
                @foreach ($holidays as $holiday)
                    <div class="row mt-1 element">
                        <div class="col-9 pr-0" style="padding-left:0px; padding-top:4px">
                            <input class="card pt-2 pb-2 pl-3 font-weight-bold holiday" style="width:100%" name="org" value="{{ $holiday->holiday_date }}">
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn bg-info radius pb-3 pr-4 pl-4" style="margin:0px" data-id="{{ $holiday->id }}" onclick="deleteDay(this)">
                                <h6 class="mb-0 font-weight-bold">Delete</h6>
                            </button>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="row mt-1">
                    <div class="col-9 pr-0" style="padding-left:0px; padding-top:4px">
                        <input class="card pt-2 pb-2 pl-3 font-weight-bold holiday addholiday" style="width:100%">
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn bg-info radius pb-3 pr-4 pl-4" style="margin-top:0px; margin-left:0px" onclick="addDay()">
                            <h6 class="mb-0 font-weight-bold">Add</h6>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @csrf
    </form>
    <div class="row mt-1 element" id="clone" style="display:none">
        <div class="col-9 pr-0" style="padding-left:0px; padding-top:4px">
            <input class="card pt-2 pb-2 pl-3 font-weight-bold holiday" style="width:100%" name="new[]">
        </div>
        <div class="col-3">
            <button type="button" class="btn bg-info radius pb-3 pr-4 pl-4" style="margin:0px" onclick="deleteDay(this)" data-id="0">
                <h6 class="mb-0 font-weight-bold">Delete</h6>
            </button>
        </div>
    </div>
	<div class="col-lg-11 mt-5 pr-2 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0" onclick="onapply()">Apply</h5></a>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/timepicki.js') }}"></script>
<script src="{{ asset('js/bootstrap-timepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
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
    });
    function onapply(){
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
