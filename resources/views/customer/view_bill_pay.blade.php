<div class="pay_modal-content">
    <div>
        <div style="vertical-align: top;width: 250px;">
            <span>Table number:<br>
                <b>
                    {{ $table_name }}
                </b>
            </span>
        </div>
    </div>
    <div style="margin: -50px 0 25px 245px;">
        <span>Starting time:<br><b>{{date('H:i, d F Y', strtotime($starting_time))}}</b></span>
    </div>
    <div>
        {{--<span class="close" style="margin: -85px -13px 0 0;" onclick="$('#myModal').modal('hide');">&times;</span>--}}
        <img src="{{asset('img/close.png')}}" style="width:40px;height: 40px;margin: -80px -9px 0 2px;" class="close" onclick="$('#myModal').modal('toggle')" />
    </div>
    <div style="margin-bottom: 20px;">
        <div style="padding-right: 15px;">
            <table style="width: 100%;border-bottom: solid 2px black;">
                <tr style="height: 30px;">
                    <td class="head" width="55%">Item</td>
                    <td class="head" width="15%" align="center">Qty</td>
                    <td class="head" width="15%" align="center">Each</td>
                    <td class="head" width="15%" align="center">Sub Total</td>
                </tr>
            </table>
        </div>
        <div style="height: 300px;overflow: scroll;padding-right: 15px;">
            <table style="width: 100%;">
                @foreach($order_dishes as $order_dish)
                <tr>
                    <td width="55%">
                        {{ $order_dish->dish_name }}
                        @foreach($order_dish->options as $option)
                            @if($option->option_name)
                            [{{ $option->option_name }}: {{ $option->item_name }}]
                            @endif
                        @endforeach
                    </td>
                    <td width="15%" align="center">{{ $order_dish->count }}</td>
                    <td width="15%" align="center">
                        @if($order_dish->each_price)
                            ${{ number_format($order_dish->each_price, 2) }}
                        @endif
                    </td>
                    <td width="15%" align="center">
                        @if($order_dish->sub_total)
                            ${{ number_format($order_dish->sub_total, 2) }}
                        @endif
                    </td>
                </tr>
                <tr><td height="10px"></td></tr>
                @endforeach
            </table>
        </div>
    </div>
    <div style="margin-left: 500px;">
        <table>
            <tr>
                <td align="left"><b>Total:</b></td>
                <td align="left">
                    <b>${{ number_format($total, 2) }}</b>
                </td>
            </tr>
            <tr>
                <td align="left">Without GST:</td>
                <td align="left">
                    ${{ number_format($without_gst_price, 2) }}
                </td>
            </tr>
            <tr>
                <td align="left">GST:</td>
                <td align="left">
                    ${{ number_format($gst_price, 2) }}
                </td>
            </tr>
        </table>
    </div>
    <div style="margin-top:20px; margin-bottom: 75px;">
        <span onclick="$('#myModal').modal('hide');" class="pay_return">Return to the menu</span>
        <span onclick="window.location='{{ route("customer.finish_pay", ["order_id" => $order_id, "table_name" => $table_name]) }}'" class="pay_finish">Finish and Pay</span>
    </div>
</div>



