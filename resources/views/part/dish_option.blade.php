<div class="modal-content-wide" style="position: relative;">
    <input type="hidden" id="dish-id" value="{{$dish_id}}">
    <input type="hidden" id="items-id" value="{{$items_id}}">
    <input type="hidden" id="display_name"
           value="@if(session('language') == 1) {{$option->display_name_cn}} @elseif(session('language') == 2) {{$option->display_name_jp}}
                  @else {{$option->display_name_en}} @endif">
    <input type="hidden" id="number_selection" value="{{$option->number_selection}}">

    {{--<span class="close" onclick="$('#thirdModal').modal('hide');Global_format();">&times;</span>--}}
    <img src="{{asset('img/close.png')}}" style="width:40px;height: 40px;margin-right: 12px;" class="close" onclick="base_page()" />
    <div class="modalHeader" style="padding-left: 12px;">
        <h3>
            @if(session('language') == 1)
                {{$dish->name_cn}}
            @elseif(session('language') == 2)
                {{$dish->name_jp}}
            @else
                {{$dish->name_en}}
            @endif
        </h3>
        <p>
            @if(session('language') == 1)
                {{$dish->desc_cn}}
            @elseif(session('language') == 2)
                {{$dish->desc_jp}}
            @else
                {{$dish->desc_en}}
            @endif
        </p>
        <div class="modalPriceOffer" style="display:inline-flex;">
            <p>Base</p>

            @if($dish->discount != '')
                <span class="discountedPrice">${{ number_format($dish->price, 2) }}&nbsp;</span>
            @else
                <span class="price">${{ number_format($dish->price, 2) }}&nbsp;</span>
            @endif
            <span>
            @if($slt_items)
                @for($i=0;$i<count($slt_items);$i++)
                    @for($j=0;$j<count($slt_items[$i]['items_id_arr']);$j++)
                        @if($slt_items[$i][$j]['price'] < 0)
                            <span class="price">-</span>
                        @else
                            <span class="price">+</span>
                        @endif
                        <span>
                            {{--@if(session('language') == 1)--}}
                                {{--{{ $slt_items[$i]['display_name_cn'] }}--}}
                            {{--@elseif(session('language') == 2)--}}
                                {{--{{ $slt_items[$i]['display_name_jp'] }}--}}
                            {{--@else--}}
                                {{--{{ $slt_items[$i]['display_name_en'] }}--}}
                            {{--@endif--}}
                            {{ $slt_items[$i][$j]['name'] }}
                        </span>
                        {{--<span class="price">@if($slt_items[$i][$j]['price'] != 0){{ '$'.number_format($slt_items[$i][$j]['price'], 2) }}@endif</span>--}}
                        <span class="price">
                            @if($slt_items[$i][$j]['price'] != 0)
                                @if($slt_items[$i][$j]['price'] < 0)
                                    {{ '$'.number_format((-1)*$slt_items[$i][$j]['price'], 2) }}
                                @else
                                    {{ '$'.number_format($slt_items[$i][$j]['price'], 2) }}
                                @endif
                            @endif
                        </span>
                    @endfor
                @endfor
            @endif
            <span id="option_price"></span>
            </span>

        </div>
    </div>
    <div class="contentHeader" style="margin: 13px 2px 0 12px;">
        PLEASE SELECT {{$option->number_selection}} x
        <b>
            @if(session('language') == 1)
                {{$option->display_name_cn}}
            @elseif(session('language') == 2)
                {{$option->display_name_jp}}
            @else
                {{$option->display_name_en}}
            @endif
        </b>
    </div>
    <div class="modalContent-option-wide">
        @foreach($items as $item)
            <div class="gridContent">
                <img src="{{asset('options/'.$item->image)}}" style="width:70px;height:70px;">
            </div>
            <div class="gridContent-check" onclick="selectItem()">
                <label class="container">{{$item->name}}
                    <span class="price">
                        @if($item->price >= 0)
                            @if($item->price > 0)
                                (+${{ number_format($item->price, 2) }})
                            @endif
                        @else
                            (-${{ number_format((-1)*$item->price, 2) }})
                        @endif
                    </span>
                    {{--<input type="checkbox" class="checked_items" value="{{$item->price}}" name="{{$item->id}}" id="check_{{$item->id}}">--}}
                    <input type="checkbox" class="checked_items" value="{{$item->name}}:{{number_format($item->price, 2)}}" name="{{$item->id}}" id="check_{{$item->id}}">
                    <span class="checkmark"></span>
                </label>
            </div>
        @endforeach
    </div>
    <div class="btn-content">
        <button class="btnBottom-1" onclick="base_page()">&#9664; CANCEL</button>
        @if(isset($option_id_arr[$count]))
            <button class="btnBottom-3" onclick="next_page('{{$option_ids}}','{{$count}}')" >
                SELECT
                @if(session('language') == 1)
                    {{ $options[$count]->display_name_cn }}
                @elseif(session('language') == 2)
                    {{ $options[$count]->display_name_jp }}
                @else
                    {{ $options[$count]->display_name_en }}
                @endif
                &#9654;
            </button>
        @else
            <button class="btnBottom-3" onclick="reviewOrder('{{$option_ids}}','{{$count}}')" >REVIEW ORDER &#9654;</button>
        @endif
            <button class="btnBottom-2" onclick="option_previous_page('{{$option_ids}}','{{$count}}')">&#9664; BACK</button>
    </div>
</div>

{{--customer alert1--}}
<div class="modal fade" id="java-alert1" role="dialog"></div>
<div id="java-alert2" class="modal">
    <div class="alert_modal_content">
        <div class="container-fluid" style="position: sticky; top: 0;">
            <div class="ex_co_modal_header">
                <div class="col-sm-10" style="padding: 24px 0 0 30px;">

                </div>
                <div class="col-sm-2" style="padding: 18px 0 0 0px;">
                    <p class="ex_co_right_close" data-dismiss="modal" onclick="alert_modal_close()">
                        <img src="{{ asset('img/Group1101.png') }}" style="width: 20px;height: 20px;">
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="position: sticky; top: 0;">
            <div class="ex_co_modal_header">
                <div class="col-sm-12" style="text-align: center;">
                    <p style="font-size: 18px;">Please select number of option correctly!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function alert_modal_close()
    {

        $('#java-alert2').html('');
        $('#java-alert2').modal('hide');
        $('#thirdModal').modal('show');

    }
</script>