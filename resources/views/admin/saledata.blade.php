@extends('layout.admin_layout')

@section('title', 'Settings')

@section('content')
<div class="pbb1 blackgrey" style="height: 1024px;">

    <div style="height:85px;"></div>

    <div class="widthhh white pt-0 pb-0 " style="margin-right: auto;height: 930px;">
        <a onclick="window.history.back()" class="bg-transparent" >
            <span class="" style="position:relative;top:55px ;right:10px">
                <img src="{{ asset('img/Group1100.png') }}" width="25" height="25" class="float-right" style="margin-top:12px;" />
            </span>
        </a>
        <br><br>
        <div class="row">
            <div class="col-12" style="margin:-40px 0 0 0">
                <div class="d-inline-block text-blue txtdemibold ml-5 mb-0 text-right" >
                    <a href="{{ route('admin.saledata', ['search_day' => 'previous', 'date_seller' => $date_seller]) }}">
                        <label class="ml-5 pl-5 fs-30">&lt;&nbsp;&nbsp;&nbsp;Previous</label>
                    </a>
                    <a href="{{ route('admin.saledata', ['search_day' => 'today', 'date_seller' => $date_seller]) }}">
                        <label class="ml-5 fs-30">Today</label>
                    </a>
                    <a href="{{ route('admin.saledata', ['search_day' => 'next', 'date_seller' => $date_seller]) }}">
                        <label class="ml-5 mr-2 fs-30">Next&nbsp;&nbsp;&nbsp;&gt;</label>
                    </a>
                </div>
                <form action="{{ route('admin.saledata') }}">
                <select class="border-blue w-200px heigh2rem float-right fs-20" id="date_seller" name="date_seller" onchange="submit()">
                    {{--<option value="0">Select Type</option>--}}
                    <option value="1" @if($date_seller == 1) selected @endif>Daily</option>
                    <option value="2" @if($date_seller == 2) selected @endif>Weekly</option>
                    <option value="3" @if($date_seller == 3) selected @endif>Monthly</option>
                </select>
                </form>
            </div>
        </div>
        <div class="row" style="padding-left: 10px;padding-right: 10px;">
            <div class="col-8">
                <label class="text-darkgrey1 mt-0 fs-25">Daily Review</label>
                {{--<table class="table table-striped border-black table2">--}}
                <table class="saletable">
                    <thead>
                        <tr class="text-center">
                            <th align="center">DATE</th>
                            <th>SALES</th>
                            <th>GROUP</th>
                            <th>GUESTS</th>
                            <th>ORDERS</th>
                            <th>CALLS</th>
                            <th>FEED-BACKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0;$i<7;$i++)
                        <tr class="cl_1">
                            <td width="20%">{{ $daily_review[$i]['date'] }}</td>
                            <td width="20%" align="right">{{ $daily_review[$i]['sales'] }}</td>
                            <td width="10%" align="right">{{ $daily_review[$i]['group'] }}</td>
                            <td width="10%" align="right">{{ $daily_review[$i]['guest'] }}</td>
                            <td width="10%" align="right">{{ $daily_review[$i]['orders'] }}</td>
                            <td width="10%" align="right">{{ $daily_review[$i]['calls'] }}</td>
                            <td width="20%" align="right">{{ $daily_review[$i]['feedback'] }}</td>
                        </tr>
                        @endfor
                    </tbody>
                </table>

                <div style="height: 62px;"></div>
                <label class="text-darkgrey1 mt-0 fs-25">Monthly Sales</label>
                <table class="saletable">
                    <tbody>
                        @for($i=0;$i<10;$i++)
                        <tr class="cl_2">
                            <td width="16.5%">{{ $monthly_sales[$i*3]['date'] }}</td>
                            <td width="16.5%" align="right">{{ $monthly_sales[$i*3]['sales'] }}</td>
                            <td width="16.5%">{{ $monthly_sales[$i*3+1]['date'] }}</td>
                            <td width="16.5%" align="right">{{ $monthly_sales[$i*3+1]['sales'] }}</td>
                            <td width="16.5%">{{ $monthly_sales[$i*3+2]['date'] }}</td>
                            <td width="16.5%" align="right">{{ $monthly_sales[$i*3+2]['sales'] }}</td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="col-3">
                <label class="text-darkgrey1 mt-0 fs-25">Best Sellers</label>
                <table class="bestsellerTable">
                    <tbody>
                        @for($i=0;$i<10;$i++)
                            @if($i < count($best_sellers))
                            <tr>
                                <td><span class="fs-23">{{ $i+1 }}</span></td>
                                <td><span class="fs-23">{{ $best_sellers[$i]['customer_name'] }}</span></td>
                                <td align="right"><span class="fs-23">{{ $best_sellers[$i]['sale'] }}</span></td>
                            </tr>
                            @else
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            @endif
                        @endfor
                    </tbody>
                </table>

                <label class="text-darkgrey1 mt-1 fs-25">Worst Sellers</label>
                <table class="bestsellerTable">
                    <tbody>
                    @for($i=0;$i<10;$i++)
                        @if($i < count($worst_sellers))
                            <tr>
                                <td><span class="fs-23">{{ $i+1 }}</span></td>
                                <td><span class="fs-23">{{ $worst_sellers[$i]['customer_name'] }}</span></td>
                                <td align="right"><span class="fs-23">{{ $worst_sellers[$i]['sale'] }}</span></td>
                            </tr>
                        @else
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        @endif
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function onRow(){
        window.location = "{{ route('admin.review') }}";
    }

</script>
<style>
    .saletable {
        border-collapse: collapse;
        margin-bottom: 20px;
        width: 100%;
    }
    table.saletable td, table.saletable th {
        border: 2px solid black;
        /*padding-left: 5px;*/
    }
    table.saletable td {
        padding-left: 10px;
        padding-right: 10px;
    }
    .cl_1:nth-child(2n){
        background-color: white;
    }
    .cl_1:nth-child(2n+1){
        background-color: lightgrey;
    }
    .cl_2:nth-child(2n){
        background-color: lightgrey;
    }
    .cl_2:nth-child(2n+1){
        background-color: white;
    }
</style>
@endsection
