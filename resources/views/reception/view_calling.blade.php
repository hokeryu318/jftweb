<div class="rd_pay_modal">
    <div style="padding: 30px 0 0 30px;">
        <h5><span class="ml-3 fs-30" style="font-weight: 700;">CUSTOMERS WAITING FOR ASSISTANCE</span></h5>
    </div>
    <div><span class="close" style="margin: -65px 15px 0 0;" onclick="calling_modal_close()">
            <h2>
                <img src="{{ asset('img/Group1101.png') }}" width="25" height="25" class="float-right mt-3 mr-3" />
            </h2>
        </span></div>
    <div class="table_detail_rd col-8" style="margin: 90px 425px 0 0">
        <div class="row1" style="overflow-x:hidden;overflow-y:auto;height: 700px;">
            @foreach($order_obj as $kk => $order)
                @foreach($order->table_order_names as $key => $ordertables)
{{--                    @if($order->attend_time == Null)--}}
                        <div class="border w-100 pt-2 pr-1 table_seated_list" style="margin-bottom: 10px;">
                        <div class="row w-100 p-0 m-0" style="height: 125px;">
                            <div class="col-lg-2 pr-0 col-xl-2">
                                <div class="row" style="margin-left: -12px;">
                                    <p class="red-text font-weight-bold ml-3 fs-23" id="time_call_{{$kk}}"></p>
                                </div>
                                <div class="row table_name">
                                    <table>
                                        <tr>
                                            @if(count($order->table_display_names) > 1)
                                                <img src="{{asset('img/plus_red.png')}}" class="corner">
                                            @endif
                                            <td style="width: 100px;height: 80px;background: #000;color:white;text-align: center;-ms-word-break: break-all;word-break: break-all;">
                                                <b class="fs-25">
                                                    @if(strlen($ordertables) > 9)
                                                        {{ substr($ordertables, 0, 9)."..." }}
                                                    @else
                                                        {{ $ordertables }}
                                                    @endif
                                                </b>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3 pr-0 col-xl-3" style="margin-left: -30px;">
                                <div class="row p-0 m-0 ml-3">

                                    @if($order->pay_flag == '1')
                                        <img class="alarm" style="margin-left:-7px;width:30px;height:27px;" src="{{ asset('img/calling.png') }}">
                                    @else
                                        <e class="alarm" style="margin-left:-7px;width: 30px;height: 27px;"></e>
                                    @endif
                                        <img class="alarm" style="width:27px;height:29px;" src="{{ asset('img/alarm.png') }}">
                                    @if($order->review != Null)
                                        <img class="alarm" style="width:30px;height:28px;" src="{{ asset('img/msg.png') }}">
                                    @else
                                        <e class="alarm" style="width: 30px;height:28px;"></e>
                                    @endif
                                    @if($order->note != Null)
                                        <img class="alarm" style="width:35px;height:25px;" src="{{ asset('img/note.png') }}">
                                    @else
                                        <e class="alarm" style="width: 35px;height: 25px;"></e>
                                    @endif
                                </div>
                                <div class="row pl-2 pt-3">
                                    <p class="pfont mb-0 black-text fs-23" style="word-break: break-all; line-height: 20px;">{{ $order->customer_name }}<br><br>{{ $order->display_time }}</p>
                                </div>
                            </div>
                            <div class="col-2 pr-0 text-right" style="margin-left: 25px;">
                                <div class="row pl-2">
                                    <img src="{{asset('img/head1.png')}}" width="30px" height="30px">
                                    <p class="font-weight-bold middle-ver fs-23">{{ $order->guest }}</p>
                                </div>
                                <div class="row mt-4 pl-3">
                                    <img src="{{asset('img/chat1.png')}}" style="width:45px;height:45px;margin: -13px 0 0 -7px;">
                                </div>
                            </div>
                            <div class="col-lg-2 pr-0 col-xl-2">
                                @if($order->attend_time == null)
                                    <div class="call_status">
                                        <img style="width: 63px;height: 80px;margin: -8px 0 0 0;display: inline-block;" src="{{ asset('img/alarm1.png') }}">
                                        <p class="fs-25" style="width:50px;display: inline-block;" id="calling_time_{{$kk}}"></p>
                                    </div>
                                @else
                                    <div class="call_status">
                                        <img style="width: 63px;height: 80px;margin: -8px 0 0 0;display: inline-block;" src="{{ asset('img/alarm2.png') }}">
                                        <p class="fs-25" style="width:50px;display: inline-block;">{{ $order->attended_time }}sec</p>
                                    </div>
                                @endif

                            </div>
                            <div class="col-lg-2 pr-0 col-xl-2">
                                @if($order->attend_time == null)
                                    <div class="attending fs-25" onclick="attend({{ $order->calling_table_id }})"><b>ATTENDING</b><br>
                                        <img src="{{ asset('img/Group728white.png') }}" style="height:18px; margin-left: 9px;">
                                    </div>
                                @else
                                    <div class="attended fs-25"><b>ATTENDED</b></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{--@endif--}}
                @endforeach
            @endforeach
        </div>
    </div>
</div>

<script>

    var parentURL = window.parent.location.href;

    //modal_close
    function calling_modal_close()
    {
        $("#myModal").modal("hide");
        clearInterval(myVar);
        // window.location.replace(parentURL);
    }

    //timer part
    var myVar = setInterval(myTimer, 1000);
    function myTimer() {

        var order_side = <?php echo json_encode($order_obj) ?>;
        // console.log(order_side);
        var current_time =  new Date();
        var duration = '';
        var elapsed_time = '';
        var order_time = '';
        for(var i=0;i<order_side.length;i++){

            duration = order_side[i].duration;
            order_time = new Date(order_side[i].time);
            if(duration == 0) {
                document.getElementById("time_call_" + i).innerHTML = 'Takeaway';
            } else if(duration == 1) {
                order_time.setMinutes( order_time.getMinutes() + 30 );
                elapsed_time = (order_time.getTime() - current_time.getTime())/1000;
                elapsed_time /= 60;
                elapsed_time = Math.round(elapsed_time);
                if(elapsed_time > 0) {
                    document.getElementById("time_call_" + i).innerHTML = elapsed_time + 'min';
                }
                else {
                    document.getElementById("time_call_" + i).innerHTML = '0min';
                }
            } else if(duration == '2') {
                order_time.setMinutes( order_time.getMinutes() + 60 );
                elapsed_time = (order_time.getTime() - current_time.getTime())/1000;
                elapsed_time /= 60;
                elapsed_time = Math.round(elapsed_time);
                if(elapsed_time > 0) {
                    document.getElementById("time_call_" + i).innerHTML = elapsed_time + 'min';
                }
                else {
                    document.getElementById("time_call_" + i).innerHTML = '0min';
                }
            } else if(duration == 3) {
                order_time.setMinutes( order_time.getMinutes() + 90 );
                elapsed_time = (order_time.getTime() - current_time.getTime())/1000;
                elapsed_time /= 60;
                elapsed_time = Math.round(elapsed_time);
                if(elapsed_time > 0) {
                    document.getElementById("time_call_" + i).innerHTML = elapsed_time + 'min';
                }
                else {
                    document.getElementById("time_call_" + i).innerHTML = '0min';
                }
            } else if(duration == 4) {
                order_time.setMinutes( order_time.getMinutes() + 120 );
                elapsed_time = (order_time.getTime() - current_time.getTime())/1000;
                elapsed_time /= 60;
                elapsed_time = Math.round(elapsed_time);
                if(elapsed_time > 0) {
                    document.getElementById("time_call_" + i).innerHTML = elapsed_time + 'min';
                }
                else {
                    document.getElementById("time_call_" + i).innerHTML = '0min';
                }
            } else if(duration == 5) {
                document.getElementById("time_call_" + i).innerHTML = 'Unlimited';
            }

            if(order_side[i].attend_time == null) {
                calling_time = new Date(order_side[i].calling_time);
                diff = (current_time.getTime() - calling_time.getTime())/1000;
                diff = Math.round(diff);
                document.getElementById("calling_time_" + i).innerHTML = diff + 'sec';
            }

        }
    }

    var myVar1 = setInterval(myTimer_call_1, 1000);
    function myTimer_call_1() {

        var order_side = <?php echo json_encode($order_obj) ?>;
        // console.log(order_side);
        // var calling_time = '';
        // var attend_time = '';
        // var diff = '';
        // for(var i=0;i<order_side.length;i++){
        //     calling_time = new Date(order_side[i].calling_time);
        //     if(order_side[i].attend_time) {
        //         attend_time = new Date(order_side[i].attend_time);
        //         diff = (attend_time.getTime() - calling_time.getTime())/1000;
        //         diff /= 60;
        //         diff = Math.round(diff);console.log(diff);
        //         document.getElementById("attend_time_" + i).innerHTML = diff + 'min';
        //     } else {
        //         document.getElementById("attend_time_" + i).innerHTML = '2 min';
        //     }
        // }
    }

</script>
