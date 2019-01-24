@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div style="padding-top:8%;">
</div>
<div class="widthh blackgrey pt-4 discount-content">
    <div class="row">
        <div class="col-6">
            <label class="text-white fontbig font-weight-bold">DISCOUNT</label>
        </div>
        <div class="col-6">
            <a>
                <span class="">
                    <a href="{{route('admin.home')}}">
                        <img src="{{ asset('img/Group826.png') }}" height="20" class="float-right" width="20" />
                    </a>
                </span>
            </a>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12 chh2" style="height: 65vh;overflow-y: auto;">
            <table class="table text-white txtdemibold">
                <thead>
                    <tr>
                        <th class="border-0 fs-3" scope="col">
                            START
                            <a href="{{route("admin.discount.sort", ["sortField" => "start", 'start_sort' => $start_sort, "end_sort" => $end_sort])}}" class="text-white">
                                <img
                                        @if($start_sort == "asc")
                                        src="{{ asset('img/Path445.png') }}"
                                        @else
                                        src="{{ asset('img/Path444.png') }}"
                                        @endif
                                        height="20"/>
                            </a>
                        </th>
                        <th class="border-0 fs-3" scope="col">END
                            <a href="{{route("admin.discount.sort", ["sortField" => "end", "end_sort" => $end_sort, 'start_sort' => $start_sort])}}" class="text-white">
                                <img
                                        @if($end_sort == "asc")
                                        src="{{ asset('img/Path445.png') }}"
                                        @else
                                        src="{{ asset('img/Path444.png') }}"
                                        @endif
                                        height="20"/>
                            </a>
                        </th>
                        <th class="border-0 fs-3 text-left" scope="col">DISH</th>
                        <th class="border-0 fs-3 text-center" scope="col">RRP</th>
                        <th class="border-0 fs-3 text-left" scope="col">DISCOUNT</th>
                        <th class="border-0 fs-3 text-left" scope="col">TIME SLOTS</th>
                    </tr>
                    <tr>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0">PRICE</td>
                        <td class="border-0">Morning</td>
                        <td class="border-0">Lunch</td>
                        <td class="border-0">Tea</td>
                        <td class="border-0">Dinner</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($discounts as $discount)
                    <tr onclick="onrow(this)" @if($discount->end_type == 1) class="text-discount bg-lightgrey" @endif  data-url="{{route("admin.discount.edit", ["id" => $discount->id])}}">
                        <td>{{($discount->start != "") ? date("d F Y", strtotime($discount->start)) : ""}}</td>
                        <td>{{($discount->end != "") ? date("d F Y", strtotime($discount->end)) : ""}}</td>
                        <td>{{$discount->dish->name_en}}</td>
                        <td>{{"$ ".number_format($discount->dish->price, 2)}}</td>
                        <td>{{"$ ".number_format($discount->discount, 2)}}</td>
                        <td>@if($discount->timeslot_breakfast == 1) <img src="{{asset('img/Group904.png')}}" height="20" /> @endif</td>
                        <td>@if($discount->timeslot_lunch == 1) <img src="{{asset('img/Group904.png')}}" height="20" /> @endif</td>
                        <td>@if($discount->timeslot_tea == 1) <img src="{{asset('img/Group904.png')}}" height="20" /> @endif</td>
                        <td>@if($discount->timeslot_dinner == 1) <img src="{{asset('img/Group904.png')}}" height="20" /> @endif</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-12 mb-4">
            <div class="d-inline-block text-white font-bold border-blue ">
                <table>
                    <tr>
                        <td class="d-inline-block border-rightBlue p-3 w-60px">
                            <a class="font-weight-bold text-white" href="{{ route('admin.dish') }}" >DISH</a>
                        </td>
                        <td class="p-3 d-inline-block border-rightBlue w-60px">
                            <a class="font-weight-bold text-white" href="{{ route('admin.category') }}">CATEGORY</a>
                        </td>
                        <td class="p-3 d-inline-block border- w-60px border-rightBlue">
                            <a class="font-weight-bold text-white" href="{{ route('admin.option') }}">OPTION</a>
                        </td>
                        <td class="bg-blue2 p-3 d-inline-block border-rightBlue  w-60px">
                            <a class="font-weight-bold text-white" href="#">DISCOUNT</a>
                        </td>
                    </tr>
                </table>

            </div>
            <a href="{{route('admin.discount.add')}}" class="text-white  btnCreateNewDiscount">CREATE NEW DISCOUNT
                <img src="{{asset('img/Group728white.png')}}"  height="20" /> </a>
        </div>
    </div>


    <!-- Default switch -->
    <!--<label class="bs-switch">
        <input type="checkbox">
        <span class="slider round"></span>
    </label>-->
</div>
<script>
    function onrow(obj)
    {
        var edit_url = $(obj).data('url');
        window.location = edit_url;
    }
</script>
@endsection
