{{--extract_cooking_name--}}
<input type="hidden" id="filter_flag" value="{{ $filter_flag }}">
<div class="ex_co_modal_content">
    <div class="container-fluid" style="position: sticky; top: 0;">
        <div class="ex_co_modal_header">
            <div class="col-sm-10" style="padding: 24px 0 0 30px;">
                @if($filter_flag == 1)
                    <div style="font-size: 28px">
                        <b>
                            All orders for
                            @if(count($order_dishes) > 0)
                                {{ $order_dishes[0]->dish_name_en }}({{ count($order_dishes) }})
                            @endif
                        </b>
                    </div>
                @elseif($filter_flag == 2)
                    <div style="font-size: 28px">
                        <b>
                            All orders for
                            @if(count($order_dishes) > 0)
                                {{ $order_dishes[0]->display_table }}({{ count($order_dishes) }})
                            @endif
                        </b>
                    </div>
                @endif
            </div>
            <div class="col-sm-2" style="padding: 18px 0 0 0px;">
                <p class="ex_co_right_close" data-dismiss="modal" onclick="extract_modal_close()"><img src="{{ asset('img/close.png') }}" style="width: 45px;height: 45px;"></p>
            </div>
        </div>
    </div>
    <div class="ex_co_container">
        <div style="padding-right: 15px;">
            <table>
                <tr style="height: 50px;">
                    <td class="head" width="8%">Time</td>
                    <td class="head" width="10%">Table No</td>
                    <td class="head" width="10%">ITEM</td>
                    <td class="head" width="56%"></td>
                    <td class="head" width="8%">QTY</td>
                    <td class="head" width="8%">Ready</td>
                </tr>
            </table>
        </div>
        <div style="height: 510px;overflow: scroll;padding-right: 15px;">
            <table>
            <input type="hidden" id="order_dishes" value="{{ $order_dishes }}">
            @if(count($order_dishes) > 0)
                @foreach($order_dishes as $key => $order_dish)
                    <tr class="modal_dish_list">
                        <td width="8%">
                            <div id="time1_{{$key}}">
                                {{--<span class="circle_big">--}}
                                    {{--<p class="data red">24</p>--}}
                                {{--</span>--}}
                            </div>
                        </td>
                        <td width="10%"><b>{{ $order_dish->display_table }}</b><br>({{ $order_dish->table_count }})</td>
                        <td width="10%"><img src="{{ asset('dishes/'.$order_dish->dish_image) }}" class="general"></td>
                        <td  width="56%">
                            <b>{{ $order_dish->dish_name_en }}</b>
                            <br>
                            @foreach($order_dish->options as $option)
                                {{ $option->option_name }}: <b>{{ $option->item_name }}</b>&nbsp;
                            @endforeach
                        </td>
                        <td width="8%"><span class="multiple">&times;</span>&nbsp;<span class="qty">{{ $order_dish->count }}</span></td>
                        <td width="8%">
                            <label class="checkbox_container">
                                @if($order_dish->ready_flag == 1)
                                    <input type="checkbox" checked="checked" name="ready_state">
                                @else
                                    <input type="checkbox" id="{{ $order_dish->id }}" name="ready_state">
                                @endif
                                @if($filter_flag == 1)
                                    <span class="checkboxmark" onclick="ready('{{ $order_dish->id }}', '{{ $filter_flag }}', '{{ $dish_id }}')"></span>
                                @else
                                    <span class="checkboxmark" onclick="ready('{{ $order_dish->id }}', '{{ $filter_flag }}', '{{ $table_id }}')"></span>
                                @endif
                            </label>
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

    //timer part
    var myVar1 = setInterval(myTimer1, 1000);
    function myTimer1() {

        var order_dishes =  $('#order_dishes').val();
        order_dishes = JSON.parse(order_dishes);
        console.log(order_dishes);
        var current_time =  new Date();
        var order_time = '';
        var elapsed_time = '';
        for(var i=0;i<order_dishes.length;i++){

            order_time = new Date(order_dishes[i].created_at);
            elapsed_time = (current_time.getTime() - order_time.getTime())/1000;
            elapsed_time /= 60;
            elapsed_time = Math.round(elapsed_time);

            if(elapsed_time >= 0 && elapsed_time <= 10) {
                document.getElementById("time1_" + i).innerHTML =
                    "<span class=\"circle_middle\">\n" +
                    "    <p class=\"data green\">" + elapsed_time + "</p>\n" +
                    "</span>";
            } else if(elapsed_time > 10 && elapsed_time <= 20) {
                document.getElementById("time1_" + i).innerHTML =
                    "<span class=\"circle_middle\">\n" +
                    "    <p class=\"data yellow\">" + elapsed_time + "</p>\n" +
                    "</span>";
            } else if(elapsed_time > 20 && elapsed_time <= 999) {
                document.getElementById("time1_" + i).innerHTML =
                    "<span class=\"circle_big\">\n" +
                    "    <p class=\"data red\">" + elapsed_time + "</p>\n" +
                    "</span>";
            } else {
                document.getElementById("time1_" + i).innerHTML =
                    "<span class=\"circle_big\">\n" +
                    "    <p class=\"data red\">...</p>\n" +
                    "</span>";
            }

        }
    }
</script>