{{--extract_cooking_name--}}
<div class="reprint_modal_content">
    <div class="container-fluid" style="position: sticky; top: 0;">
        <div class="ex_co_modal_header">
            <div class="col-sm-10" style="padding: 24px 0 0 30px;">

            </div>
            <div class="col-sm-2" style="padding: 18px 0 0 0px;">
                <p class="ex_co_right_close" data-dismiss="modal" onclick="extract_modal_close()"><img src="{{ asset('img/close.png') }}" style="width: 45px;height: 45px;"></p>
            </div>
        </div>
    </div>
    <div class="reprint_container">
        <div style="padding-right: 15px;">
            <table>
                <tr style="height: 50px;">
                    <td class="head" width="10.5%">Time</td>
                    <td class="head" width="9%">Table No</td>
                    <td class="head" width="9%">ITEM</td>
                    <td class="head" width="45%"></td>
                    <td class="head" width="9%">QTY</td>
                    <td class="head" width="11%">DOCKET</td>
                </tr>
            </table>
        </div>
        <div style="height: 480px;overflow: scroll;padding-right: 15px;">
            <table>            
            @if(count($order_dishes) > 0)
                <input type="hidden" id="order_dishes" value="{{ $order_dishes }}">
                @foreach($order_dishes as $key => $order_dish)
                    <tr class="modal_dish_list">
                        <td width="12%">
                            <div>
                                <span>
                                    {{ $order_dish->time }}
                                </span>
                            </div>
                        </td>
                        <td width="10%"><b>{{ $order_dish->display_table }}</b><br>({{ $order_dish->table_count }})</td>
                        <td width="10%"><img src="{{ asset('dishes/'.$order_dish->dish_image) }}" class="general"></td>
                        <td  width="52%">
                            <b>{{ $order_dish->dish_name_en }}</b>
                            <br>
                            @foreach($order_dish->options as $option)
                                {{ $option->option_name }}: <b>{{ $option->item_name }}</b>&nbsp;
                            @endforeach
                        </td>
                        <td width="8%"><span class="multiple">&times;</span>&nbsp;<span class="qty">{{ $order_dish->count }}</span></td>
                        <td width="8%">
                            <div class="reprint">
                                {{--<a style="color: white;" href="{{ route('reception.accounting', ['order_id' => $booking_order->order_id]) }}">--}}
                                    {{--<span class="fs-25">PROCESS BILL</span>--}}
                                    {{--<img src="{{ asset('img/Group728white.png') }}" style="height:20px; margin: -8px 0 0 20px;">--}}
                                {{--</a>--}}
                                <a style="color: white;">
                                    <span class="fs-25">REPRINT</span>
                                    <img src="{{ asset('img/Group728white.png') }}" style="height:18px; margin: -6px 0 0 0;" onclick="reprint('{{ $order_dish }}')">
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </table>
        </div>
    </div>
</div>

<script>

    var parentURL = window.parent.location.href;

    //modal_close
    function extract_modal_close()
    {
        $("#ExtractCookingName").modal("hide");
        window.location.replace(parentURL);
    }

    function reprint($order_dish)
    {
        var order = $order_dish;
        
        $.ajax({
            type:"POST",
            url:"{{ route('kitchen.reprint') }}",
            data:{ order_dish: order, _token: "{{ csrf_token() }}" },
            success: function(result){
                console.log(result.data);
                //window.open(result);
            }
        });           

    }

</script>