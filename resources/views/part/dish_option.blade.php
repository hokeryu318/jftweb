<div class="modal-content-wide" style="position: relative;">
    <input type="hidden" id="dish-id" value="{{$dish_id}}">
    <input type="hidden" id="items-id" value="{{$items_id}}">
    <input type="hidden" id="display_name"
           value="@if(session('language') == 1) {{$option->display_name_cn}} @elseif(session('language') == 2) {{$option->display_name_jp}}
                  @else {{$option->display_name_en}} @endif">
    <input type="hidden" id="number_selection" value="{{$option->number_selection}}">

    {{--<span class="close" onclick="$('#thirdModal').modal('hide');Global_format();">&times;</span>--}}
    <img src="{{asset('img/close.png')}}" style="width:40px;height: 40px;margin-right: 12px;" class="close" onclick="$('#thirdModal').modal('toggle')" />
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
                <span class="discountedPrice">${{ number_format($dish->price, 2) }}</span>
            @else
                <span class="price">${{ number_format($dish->price, 2) }}</span>
            @endif

            @if($slt_items)
                @for($i=0;$i<count($slt_items);$i++)
                    @for($j=0;$j<count($slt_items[$i]['items_id_arr']);$j++)
                        <span class='price'>+</span>
                        <span>
                            @if(session('language') == 1)
                                {{ $slt_items[$i]['display_name_cn'] }}
                            @elseif(session('language') == 2)
                                {{ $slt_items[$i]['display_name_jp'] }}
                            @else
                                {{ $slt_items[$i]['display_name_en'] }}
                            @endif
                        </span>
                        <span class="price">@if($slt_items[$i][$j]['price'] != 0){{ '$'.number_format($slt_items[$i][$j]['price'], 2) }}@endif</span>
                    @endfor
                @endfor
            @endif

            <span id="option_price"></span>
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
                <img src="{{asset('options/'.$item->image)}}" style="width:70px;height:70px;" alt="chicken">
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
                    {{--<input type="radio" name="radio">--}}
                    <input type="checkbox" class="checked_items" value="{{$item->price}}" name="{{$item->id}}" id="check_{{$item->id}}">
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