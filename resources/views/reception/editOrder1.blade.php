
<div class="edit_order_modal">
    <h5>
        <span style="font-weight: 500;color: white;font-size: 30px;">EDIT ORDER</span>
    </h5>
    <div style="background: white;height: 390px;">
        <div style="background: white;margin-bottom: 15px;width: 95%;margin-left: 3%;">
            <div style="padding-right: 15px;">
                <table style="width: 100%;border-bottom: solid 2px black;">
                    <tr style="height: 40px;vertical-align: bottom;">
                        <td class="head" width="50%"><span style="font-size: 25px;font-weight: 700;">Item</span></td>
                        <td class="head" width="20%" align="center"><span style="font-size: 25px;font-weight: 700;">Qty</span></td>
                        <td class="head" width="15%" align="center"><span style="font-size: 25px;font-weight: 700;">Each</span></td>
                        <td class="head" width="15%" align="center"><span style="font-size: 25px;font-weight: 700;">Total</span></td>
                    </tr>
                </table>
            </div>
            <div style="height: 275px;overflow-x: hidden; overflow-y: auto;padding-right: 15px;">
                <table style="width: 100%;">

                    @foreach($order_dishes as $order_dish)
                        <tr>
                            <td width="50%">
                                <span style="font-size: 25px;">
                                    {{ $order_dish->dish_name }}
                                    @foreach($order_dish->options as $option)
                                        @if($option->option_name)
                                            [{{ $option->option_name }}: {{ $option->item_name }}]
                                        @endif
                                    @endforeach
                                </span>
                            </td>
                            <td width="20%" align="center">
                                <div style="display: inline-block;">
                                    <img src="{{asset('img/qty_down1.png')}}" style="width: 30px;" onclick="plusQty1('minus', '{{$order_dish->id}}')" />
                                </div>
                                <div class="edit_order1_qty">
                                    <span id="qty_{{$order_dish->id}}" style="text-align: center;padding-top: 10px;font-size: 25px;">
                                        {{ $order_dish->count }}
                                    </span>
                                </div>
                                <div style="display: inline-block;">
                                    <img src="{{asset('img/qty_up1.png')}}" style="width: 30px;" onclick="plusQty1('plus', '{{$order_dish->id}}')" />
                                </div>
                            </td>
                            <td width="15%" align="center">
                                <span style="font-size: 25px;" id="each_{{$order_dish->id}}">
                                    @if($order_dish->each_price)
                                        ${{ number_format($order_dish->each_price, 2) }}
                                    @else
                                        $0.00
                                    @endif
                                </span>
                            </td>
                            <td width="15%" align="center">
                                <span style="font-size: 25px;" id="sub_total_{{$order_dish->id}}">
                                    @if($order_dish->sub_total)
                                        ${{ number_format($order_dish->sub_total, 2) }}
                                    @else
                                        $0.00
                                    @endif
                                </span>
                            </td>
                        </tr>
                        <tr><td height="10px"></td></tr>
                    @endforeach

                </table>
            </div>
        </div>
        <div>
            <span class="edit_order_add_item" onclick="onAddItem()">
                <e style="margin-right:20px;font-size: 25px;">ADD ITEM</e>
                <img src="{{ asset('img/Group728white.png') }}" style="height: 16px; margin-top: -3px;">
            </span>&nbsp;&nbsp;&nbsp;
            <span class="edit_order_add_item" onclick="onAddMisc()">
                <e style="margin-right:20px;font-size: 25px;">ADD MISC</e>
                <img src="{{ asset('img/Group728white.png') }}" style="height: 16px; margin-top: -3px;">
            </span>
        </div>
    </div>

    <div style="margin: 23px -35px 0 0;float: right;">
        <span class="edit_order_cancel">
            <e style="margin-right:20px;font-size: 25px;" onclick="$('#myModal').modal('hide');">CANCEL</e>
            <img src="{{ asset('img/Group728black.png') }}" style="height: 16px; margin-top: -3px; padding-right: 0px;">
        </span>
        <span class="edit_order_apply">
            <e style="margin-right:20px;font-size: 25px;" onclick="onApply()">APPLY</e>
            <img src="{{ asset('img/Group728white.png') }}" style="height: 16px; margin-top: -3px; padding-right: 0px;">
        </span>
    </div>

</div>

<div id="thirdModal" class="modal"></div>

<script>

    function plusQty1(arg, id){        
        var qty_number_obj = $("#qty_" + id);
        var qty_number = qty_number_obj.text();        
        if(arg == 'plus'){
            qty_number ++;
        }else{
            if(qty_number > 0){
                qty_number --;
            }
        }
        qty_number_obj.html(qty_number);

        // var each_obj = $("#each_" + id);
        var each = document.getElementById("each_" + id).innerText;
        each = get_num(each);
        var sub_total = each * qty_number;
        document.getElementById("sub_total_" + id).textContent = make_value_string(sub_total.toFixed(2));

    }

    function  onApply() {

        var order_dish = <?php echo(json_encode($order_dishes)) ?>;
        // console.log(order_dish);

        var order_dish_id = '';
        var qty = '';
        var sub_total = '';
        var order_qty_info = [];

        var i = 0;
        for(i = 0;i < order_dish.length;i++) {
            qty = document.getElementById("qty_" + order_dish[i].id).innerText;
            sub_total = document.getElementById("sub_total_" + order_dish[i].id).innerText;
            order_qty_info[i] = order_dish[i].id + "-" + qty + "-" + sub_total;
        }

        $.ajax({
            type:"POST",
            url:"{{ route('reception.order_info_edit') }}",
            data:{
                order_qty_info: order_qty_info, _token:"{{ csrf_token() }}"
            },
            success: function(result){
                console.log(result);
                $('#myModal').modal('hide');
            }
        });
    }

    function onAddItem() {

        var order_id = <?php echo(json_encode($order_id)) ?>;
        $.ajax({
            type:"GET",
            url:"{{ route('reception.amend') }}",
            data:{order_id: order_id, order_dish_id: 0},
            success: function(result){
                // console.log(result);
                $('#thirdModal').html(result);
            }
        });
        $('#thirdModal').modal("toggle");
    }

    function onAddMisc() {
        var order_id = <?php echo(json_encode($order_id)) ?>;
        $.ajax({
            type:"GET",
            url:"{{ route('reception.misc') }}",
            data:{order_id: order_id, order_dish_id: 0},
            success: function(result){
                $('#thirdModal').html(result);
            }
        });
        $('#thirdModal').modal("toggle");
    }

    function onCancel() {

        $('#thirdModal').html('');
        $('#thirdModal').modal("hide");
    }

    function get_num(text)
    {
        var value = parseFloat(text.replace(',', '').substring(1)).toFixed(2);
        return value;

    }

    function make_value_string(text)
    {
        var str = '$' + text;
        return str;
    }

</script>