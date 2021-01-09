@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<input type="hidden" name="check_discount_list" id="check_discount_list" value="{{ $check_discount_list }}">
<div style="padding-top:8%;">
</div>
<div class="widthh blackgrey pt-4 discount-content" style="height: 885px;">
    <div class="row">
        <div class="col-6">
            <label class="text-white font-weight-bold fs-30">DISCOUNT</label>
        </div>
        <div class="col-6">
            <a onclick="window.history.back()">
                <span class="">
                    <img src="{{ asset('img/Group826.png') }}" width="25" height="25" class="float-right" />
                </span>
            </a>
            {{--<input type="text" name="discount-search" id="discount-search" onkeyup="discount_search()" value="{{$key}}" placeholder="Search" style="margin-right: 20px;width: 200px;color: #fff;float: right;">--}}
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <table style="width: 99%;color: white;margin-top: 20px;border-bottom: 1px solid white;">
                <thead>
                    <tr>
                        <th class="border-0 fs-3 pd" scope="col" width="12%">
                            <a href="{{route("admin.discount.sort", ["sortField" => "start", 'start_sort' => $start_sort, "end_sort" => $end_sort, 'key' => $key])}}" class="text-white fs-25">
                                <b>START</b>
                                <img
                                        @if($start_sort == "asc")
                                        src="{{ asset('img/Path445.png') }}"
                                        @else
                                        src="{{ asset('img/Path444.png') }}"
                                        @endif
                                        height="20" style="margin: -1px 0 0 5px;" />
                            </a>
                        </th>
                        <th class="border-0 fs-3 pd" scope="col" width="12%">
                            <a href="{{route("admin.discount.sort", ["sortField" => "end", "end_sort" => $end_sort, 'start_sort' => $start_sort, 'key' => $key])}}" class="text-white fs-25">
                                <b>END</b>
                                <img
                                        @if($end_sort == "asc")
                                        src="{{ asset('img/Path445.png') }}"
                                        @else
                                        src="{{ asset('img/Path444.png') }}"
                                        @endif
                                        height="20" style="margin: -1px 0 0 5px;" />
                            </a>
                        </th>
                        <th class="border-0 text-left pd" scope="col" width="25%"><b class="fs-25">DISH</b></th>
                        <th class="border-0 text-left pd" scope="col" width="10%"><b class="fs-25">RRP</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th class="border-0 text-left pd" scope="col" width="12%"><b class="fs-25">DISCOUNT</b></th>
                        <th class="border-0 text-left pd" scope="col" colspan="4"><b class="fs-25">TIME SLOTS</b></th>
                    </tr>
                    <tr>
                        <td class="border-0 pd"></td>
                        <td class="border-0 pd"></td>
                        <td class="border-0 pd"></td>
                        <td class="border-0 pd"></td>
                        <td class="border-0 pd fs-23">PRICE</td>
                        <td class="border-0 pd fs-23" width="8%">Morning</td>
                        <td class="border-0 pd fs-23" width="7%">Lunch</td>
                        <td class="border-0 pd fs-23" width="7%">Tea</td>
                        <td class="border-0 pd fs-23" width="7%">Dinner</td>
                    </tr>
                </thead>
            </table>
            <div style="height: 56.5vh;overflow-y: auto;">
            <table class="table text-white txtdemibold" style="width: 99%;">
                <tbody>
                @foreach($discounts as $discount)
                    @if($discount->dish)
                    <tr onclick="onrow(this)" @if($discount->end_type == 1) class="text-discount bg-lightgrey" @endif  data-url="{{route("admin.discount.edit", ["id" => $discount->id])}}">
                        <td width="12%" style="padding-left: 0;"><span class="fs-25">{{($discount->start != "") ? date("d F Y", strtotime($discount->start)) : ""}}</span></td>
                        <td width="12%" style="padding-left: 3px;"><span class="fs-25">{{($discount->end != "") ? date("d F Y", strtotime($discount->end)) : ""}}</span></td>
                        <td width="25%" style="padding-left: 7px;"><span class="fs-25">{{$discount->dish->name_en}}</span></td>
                        <td width="10%" style="padding-left: 8px;"><span class="fs-25">{{"$ ".number_format($discount->dish->price, 2)}}</span></td>
                        <td width="12%" style="padding-left: 8px;"><span class="fs-25">{{"$ ".number_format($discount->discount, 2)}}</span></td>
                        <td width="8%" style="padding-left: 10px;">@if($discount->timeslot_breakfast == 1) <img src="{{asset('img/Group904.png')}}" height="20" /> @endif</td>
                        <td width="7%" style="padding-left: 10px;">@if($discount->timeslot_lunch == 1) <img src="{{asset('img/Group904.png')}}" height="20" /> @endif</td>
                        <td width="7%" style="padding-left: 10px;">@if($discount->timeslot_tea == 1) <img src="{{asset('img/Group904.png')}}" height="20" /> @endif</td>
                        <td width="7%" style="padding-left: 10px;">@if($discount->timeslot_dinner == 1) <img src="{{asset('img/Group904.png')}}" height="20" /> @endif</td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{--<div class="row mt-4 mb-4" style="margin-left: 0;">--}}
        {{--<div class="col-12 mb-3">--}}
            {{--<div class="d-inline-block text-white font-bold border-blue ">--}}
                {{--<table>--}}
                    {{--<tr>--}}
                        {{--<td class="d-inline-block border-rightBlue p-3 w-60px" style="font-size: 15px;">--}}
                            {{--<a class="font-weight-bold text-white" href="{{ route('admin.dish') }}" >DISH</a>--}}
                        {{--</td>--}}
                        {{--<td class="p-3 d-inline-block border-rightBlue w-60px" style="font-size: 15px;">--}}
                            {{--<a class="font-weight-bold text-white" href="{{ route('admin.category') }}">CATEGORY</a>--}}
                        {{--</td>--}}
                        {{--<td class="p-3 d-inline-block border- w-60px border-rightBlue" style="font-size: 15px;">--}}
                            {{--<a class="font-weight-bold text-white" href="{{ route('admin.option') }}">OPTION</a>--}}
                        {{--</td>--}}
                        {{--<td class="bg-blue2 p-3 d-inline-block border-rightBlue w-60px" style="font-size: 15px;">--}}
                            {{--<a class="font-weight-bold text-white" href="#">DISCOUNT</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}

            {{--</div>--}}
            {{--<a class="text-white  btnCreateNewDiscount" style="margin-left: 165px;" onclick="create_new_discount()">CREATE NEW DISCOUNT--}}
                {{--<img src="{{asset('img/Group728white.png')}}"  height="15" /> </a>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row mt-4 mb-4" style="margin-left: 0;">
        <div class="col-12 mb-3">
            <div class="d-inline-block text-white font-bold border-blue ">
                <table>
                    <tr>
                        <td class="d-inline-block border-rightBlue p-3 w-60px" style="font-size: 15px;">
                            <a class="font-weight-bold text-white fs-25" href="{{ route('admin.dish') }}" >DISH</a>
                        </td>
                        <td class="p-3 d-inline-block border-rightBlue w-60px" style="font-size: 15px;">
                            <a class="font-weight-bold text-white fs-25" href="{{ route('admin.category') }}">CATEGORY</a>
                        </td>
                        <td class="p-3 d-inline-block border- w-60px border-rightBlue" style="font-size: 15px;">
                            <a class="font-weight-bold text-white fs-25" href="{{ route('admin.option') }}">OPTION</a>
                        </td>
                        <td class="bg-blue2 p-3 d-inline-block border-rightBlue  w-60px" style="font-size: 15px;">
                            <a class="font-weight-bold text-white fs-25" href="{{ route('admin.discount') }}">DISCOUNT</a>
                        </td>
                    </tr>
                </table>
            </div>
            @if($check_discount_list == 0)
            <a href="{{ route('admin.discount.add') }}" class="text-white btnCreateNewDiscount fs-25" style="margin-left: 180px;margin-top: 5px;">
                CREATE NEW DISCOUNT
                <img src="{{ asset('img/Group728white.png') }}" style="height:18px; margin: -5px 0 0 20px;" />
            </a>
            @endif
        </div>
    </div>


    <!-- Default switch -->
    <!--<label class="bs-switch">
        <input type="checkbox">
        <span class="slider round"></span>
    </label>-->
</div>
</div>
<script>
    function onrow(obj)
    {
        var edit_url = $(obj).data('url');
        window.location = edit_url;
    }

    function create_new_discount() {

        var chk_discount = $('#check_discount_list').val();
        if(chk_discount != 1) {
            document.location.href = "{{ route('admin.discount.add') }}";
        } else {
            //alert('There is no dishes for discount.');
            $("#alert-string")[0].innerText = "There is no dishes for discount.";
            $("#java-alert").modal('toggle');

        }
    }

    function discount_search()
    {
        location.href = '/admin/discount/sort?sortField=' + "{{ $_GET['sortField'] ?? '' }}" + 
            '&start_sort=' + "{{ $_GET['start_sort'] ?? 'desc' }}" + 
            '&end_sort=' + "{{ $_GET['end_sort'] ?? 'desc' }}" + '&key=' + $('#discount-search').val();
    }
</script>
@endsection
