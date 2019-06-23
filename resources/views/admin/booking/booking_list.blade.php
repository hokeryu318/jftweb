@extends('layout.admin_layout')

@section('title', 'Bookings')

@section('content')
<div style="padding-top:8%;" class="pttbook"></div>
<div class="widthh pt-4 blackgrey">
    <div class="row">
        <div class="col-6">
            <h4 class="text-white h4-responsive font-weight-bold ml-3 fs-30">Bookings</h4>
        </div>
        <div class="col-6">
            <a onclick="window.history.back()">
                <span class="">
                    <img src="{{ asset('img/Group826.png') }}" width="25" height="25" class="float-right" />
                </span>
            </a>
        </div>
    </div>
    <div class="row mb-5 mt-5">
        <div class="col-12">
            <a href="{{ route('admin.booking', ['search_date' => $search_display_date, 'd_s' => 'down']) }}">
                <img src="{{ asset('img/Path501.png') }}" class="ml-3 mb-3" height="30" />
            </a>
            <label class="text-white ml-3 mr-3 font-weight-light pt-2 fs-30" id="search_day">
                {{ $search_display_date }}
            </label>
            <a href="{{ route('admin.booking', ['search_date' => $search_display_date, 'd_s' => 'up']) }}">
                <img src="{{ asset('img/Path502.png') }}" class="mb-3" height="30" />
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table style="width: 96%;color: white;margin: 20px 0 0 15px;border-bottom: 1px solid white;">
                <thead>
                    <tr>
                        <th class="border-0" scope="col" width="15%">
                            <a href="{{route("admin.booking", ["sortType" => $sort, 'search_date' => $search_display_date])}}" class="text-white">
                                <b>TIME</b>
                                @if($sort == "asc")
                                    <img src="{{ asset('img/Path444.png') }}" style="height:18px;margin-top:-5px;" />
                                @else
                                    <img src="{{ asset('img/Path445.png') }}" style="height:18px;margin-top:-5px;" />
                                @endif
                            </a>
                        </th>
                        <th class="border-0" scope="col" width="30%"><b>TABLE</b></th>
                        <th class="border-0" scope="col" width="15%"><b>NUMBER</b></th>
                        <th class="border-0" scope="col" width="25%"><b>CUSTOMER</b></th>
                        <th class="border-0" scope="col" width="15%"></th>
                    </tr>
                </thead>
            </table>
            <div style="height: 55vh;overflow-y: auto;">
                <table class="table text-white txtdemibold" style="width: 96%;margin-left:15px;">
                    <tbody class="thh">
                        @foreach($order_obj as $order)
                        <tr>
                            <td width="15%" style="padding-left: 0;">{{ $order->display_time }}</td>
                            <td width="30%" style="padding-left: 4px;">{{ $order->table_display_name }}</td>
                            <td width="15%" style="padding-left: 4px;">{{ $order->contact_number }}</td>
                            <td width="25%" style="padding-left: 6px;">{{ $order->customer_name }}</td>
                            <td width="15%" style="text-align:center;padding-left: 9px;">
                                {{--<a style="color:white" href="{{ route('admin.booking.edit') }}" class="outline-0 editbtn">EDIT</a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

