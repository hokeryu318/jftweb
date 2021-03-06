@extends('layout.admin_layout')

@section('title', 'Transactions')

@section('content')

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#search_trans_date" ).datepicker();
        });
    </script>

    <div class="pttbook"></div>
    <div class="widthh pt-4 blackgrey">
        <div class="row">
            <div class="col-4">
                <h4 class="text-white h4-responsive font-weight-bold ml-3 fs-30">TRANSACTION HISTORY</h4>
            </div>
            <div class="col-4">
                <input type="text" id="all_amount" style="background:white;border:none;text-align:center;font-size: 20px;height: 35px" value="Today's Total Amount: ${{ $daily_all_amount }}" readonly/>
            </div>
            <div class="col-3" style="text-align: right;top: 5px;">
                <a class="src_trans fs-25" onclick="now_sendmail()">
                    Finish the day now
                </a>
            </div>
            <div class="col">
                <a onclick="window.history.back()">
                    <span class="">
                        <img src="{{ asset('img/Group826.png') }}" width="25" height="25" class="float-right" />
                    </span>
                </a>
            </div>
        </div>
        <div class="row mb-5 mt-5">
            <div class="col-4">
                <a href="{{ route('admin.transaction', ['search_date' => $search_display_date, 'd_s' => 'down']) }}">
                    <img src="{{ asset('img/Path501.png') }}" class="ml-3 mb-3" height="30" />
                </a>
                <label class="text-white ml-3 mr-3 font-weight-light pt-2 fs-30" id="search_day">
                    {{ strtoupper($search_display_date) }}
                </label>
                <a href="{{ route('admin.transaction', ['search_date' => $search_display_date, 'd_s' => 'up']) }}">
                    <img src="{{ asset('img/Path502.png') }}" class="mb-3" height="30" />
                </a>
            </div>
            <div class="col-4" style="text-align: right;">
                <input type="text" id="search_trans_date" style="height: 35px"/>
            </div>
            <div class="col-1"></div>
            <div class="col-3" style="margin-top: 14px;">
                <a class="src_trans fs-25" onclick="search_transaction()">
                    Search Transaction
                    <img src="{{ asset('img/Group728black.png') }}" style="height:18px; margin-left: 5px;">
                </a>
            </div>
        </div>
        <div class="row" id="data_view">
            <div class="col-12">
                <table style="width: 96%;color: white;margin: 20px 0 0 15px;border-bottom: 1px solid white;">
                    <thead>
                    <tr>
                        <td class="border-0" scope="col" width="15%" align="left">
                            <a href="{{route("admin.transaction", ["sortType" => $sort, 'search_date' => $search_display_date])}}" class="text-white">
                                <b>TIME</b>
                                @if($sort == "asc")
                                    <img src="{{ asset('img/Path444.png') }}" style="height:18px;margin-top:-5px;" />
                                @else
                                    <img src="{{ asset('img/Path445.png') }}" style="height:18px;margin-top:-5px;" />
                                @endif
                            </a>
                        </td>
                        <td class="border-0" scope="col" width="30%" align="left"><b>TABLE</b></td>
                        <td class="border-0" scope="col" width="15%" align="left"><b>AMOUNT</b></td>
                        <td class="border-0" scope="col" width="25%" align="left"><b>CUSTOMER</b></td>
                        <td class="border-0" scope="col" width="15%" align="left"></td>
                    </tr>
                    </thead>
                </table>
                <div style="height: 55vh;overflow-y: auto;">
                    <table class="table text-white txtdemibold" style="width: 96%; margin-left:15px;">
                        <tbody class="thh">
                        @if($order_obj)
                            @foreach($order_obj as $order)
                                <tr>
                                    <td width="15%" style="padding-left: 0;">{{ $order->display_time }}</td>
                                    <td width="30%" style="padding-left: 4px;">{{ $order->table_display_name }}</td>
                                    <td width="15%" style="padding-left: 4px;">{{ number_format($order->amount, 2) }}</td>
                                    <td width="25%" style="padding-left: 6px;">{{ $order->customer_name }}</td>
                                    <td width="15%" style="text-align:center;padding-left: 9px;">
                                        <div style="color:white" onclick="reprint('{{$order->order_id}}')" class="outline-0 editbtn">REPRINT</div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

<style>
    #search_trans_date {
        background: white;
        font-size: 25px;
        width: 300px;
        height: 45px;
        padding-left: 10px;
        padding-right: 10px;
        text-align: center;
        margin-top: 7px;
    }
    
    .src_trans {
        background: white;
        font-size: 16px;
        padding: 10px 20px 10px 20px;
        border-radius: 5px;
        font-weight: 500;
    }
</style>

<script>

    function search_transaction() {
        var src_date = $('#search_trans_date').val();
        var src_date_arr = src_date.split('/');
        var src_dates = src_date_arr[2] + '-' + src_date_arr[0] + '-' + src_date_arr[1];
//        alert(src_dates);
        $.ajax({
            type:"GET",
            url:"{{ route('admin.src_trans') }}",
            data:{src_date: src_dates},
            success: function(result){
                //console.log(result);                
                document.getElementById("data_view").innerHTML = result;
                document.getElementById("all_amount").value = "Today's Total Amount: $" + daily_all_amount.value;
            }
        });
    }

    function now_sendmail() {
        $.ajax({
            type:"GET",
            url:"{{ route('admin.now_sendmail') }}",
            data:{},
            success: function(result){
                //alert("asd");
            }
        });
    }

    function reprint(order_id) {
        $.ajax({
            type:"GET",
            url:"{{ route('admin.transaction.reprint') }}",
            data:{order_id: order_id},
            success: function(result){
                console.dir(result);
            }
        });
    }

</script>
