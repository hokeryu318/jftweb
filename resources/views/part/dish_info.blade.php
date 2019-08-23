@if($count != 1){{-- simple option (Photo_visible==0) --}}
    <div class="modal-content">
        <div class="modalHeader" style="margin-left:12px;">
            <input type="hidden" id="dish-id" value="{{$dish->id}}">
            {{--<span class="close" onclick="$('#myModal').modal('hide');">&times;</span>--}}
            <img src="{{asset('img/close.png')}}" style="width:40px;height: 40px;margin-right: 8px;" class="close" onclick="$('#myModal').modal('toggle')" />
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
                @if($dish->discount != '')
                    <div class="discountedPrice">
                        ${{ number_format($dish->discount, 2) }}
                    </div>
                @endif
                <div @if($dish->discount != '') class="price striked" @else class="price unstriked" @endif>${{ number_format($dish->price, 2) }}</div>
            </div>
        </div>
        <div class="modalContent">
            <div class="leftContent">
                <div class="specialBadge">
                    @if($dish->badge_id > 0)
                        <img src="{{asset('badges/'.$dish->badge->filepath)}}" alt="" srcset="" style="position: absolute;" height="45px">
                    @endif
                </div>
                <img @if($dish->image) src="{{asset('dishes/'.$dish->image)}}" @endif width="300px" height="340px">
            </div>
            <div class="rightContent">
                <div class="contentHeader" style="width: 99.5%; border-radius: 0px;">
                    Please choose:
                </div>
                <div class="scrollable menu">
                    @foreach($options as $option)
                        <div class="menuClasses">
                            @if($option->photo_visible == 0)
                                <div class="menuClassesHeader">
                                    @if(session('language') == 1)
                                        {{$option->display_name_cn}}
                                    @elseif(session('language') == 2)
                                        {{$option->display_name_jp}}
                                    @else
                                        {{$option->display_name_en}}
                                    @endif
                                </div>
                                @if(isset($option->items))
                                    @for($i=0;$i<count($option->items);$i++)
                                        <label class="container" style="margin-left: 15px;">
                                            {{$option->items[$i]->name}}
                                            @if($option->items[$i]->price > 0)
                                                <span style="color:#9A9828">(+{{ number_format($option->items[$i]->price, 2) }})</span>
                                            @elseif($option->items[$i]->price < 0)
                                                <span style="color:#C74E95">({{ number_format($option->items[$i]->price, 2) }})</span>
                                            @endif
                                            <input type="radio" class="checked_items" value="{{$option->items[$i]->id}}" name="radio_{{$option->id}}"
                                                   id="radio_{{$option->id}}" @if($i == 0) checked @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                    @endfor
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="modalContent" style="margin-bottom: 10px;">
            <div>
                <p class="prepareStatus">This dish will be prepared straight away.</p>
            </div>
            <div class="padding10">
                <div class="btnGroup">
                    <button id="minus" onclick="plusQty('minus')">
                        <i class="far fa-minus"></i>
                    </button>
                    <span id="numOfItems">
                        01
                    </span>
                    <button id="plus" onclick="plusQty('plus')">
                        <i class="far fa-plus"></i>
                    </button>
                </div>
                @if($count == 0)
                    <button class="cta" onclick="nextModal('thx');">Order now</button>
                @else
                    <button class="cta" onclick="nextModal('main');">SELECT ...</button>
                @endif
            </div>
        </div>
    </div>
@else{{-- multi option (Photo_visible==1) --}}
    <div class="modal-content-wide">
        <div class="modalHeader"  style="margin-left:12px;">
            <input type="hidden" id="dish-id" value="{{$dish->id}}">
            <input type="hidden" id="items-id" value="{{$items}}">
            {{--<span class="close" onclick="$('#myModal').modal('hide');Global_format();">&times;</span>--}}
            <img src="{{asset('img/close.png')}}" style="width:40px;height: 40px;margin-right: 12px;" class="close" onclick="$('#myModal').modal('toggle')" />
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
                    <div class="discountedPrice">
                        ${{ number_format($dish->discount, 2) }}
                    </div>
                @endif
                <div @if($dish->discount != '') class="price striked" @else class="price unstriked" @endif>${{ number_format($dish->price, 2) }}</div>
            </div>
        </div>
        <div class="modalContent-wide">
            <div class="leftContent">
                <div class="specialBadge">
                    @if($dish->badge_id > 0)
                        <img src="{{asset('badges/'.$dish->badge->filepath)}}" alt="" srcset="" style="position: absolute;" height="45px">
                    @endif
                </div>
                <img @if($dish->image) src="{{asset('dishes/'.$dish->image)}}" @endif width="300px" height="410px">
            </div>
            <div class="rightContent">
                <div class="menuClassesHeader" style="font-size: 1.2em;">Please Select</div>
                <div class="scrollable menu" style="height:350px;">
                    {{--<div class="menuClassesHeader" style="font-size: 1.2em;">Please Select</div>--}}
                    <?php $index = 0?>
                    @foreach($options as $option)
                        <?php $index ++?>
                        @if($option->photo_visible == 1)
                            @if(isset($option->items))
                                <h3>
                                    {{$option->number_selection}} x
                                    @if(session('language') == 1)
                                        {{$option->display_name_cn}}
                                    @elseif(session('language') == 2)
                                        {{$option->display_name_jp}}
                                    @else
                                        {{$option->display_name_en}}
                                    @endif
                                    @if($index < $option_count) and @endif
                                </h3>
                                <br>
                            @endif
                        @endif
                    @endforeach
                    <h3>on the following pages.</h3>
                </div>
            </div>
        </div>
        <div class="modalContent-wide">
            <div>
                <p class="prepareStatus" style="padding: 0 60px 0 60px;">This dish will be prepared straight away</p>
            </div>
            <div class="padding10">
                <button class="cta-wide" style="width: 90%;" onclick="next_page('{{$option_id_arr}}', '0')">
                    Select
                    @if(session('language') == 1)
                        {{$options[0]->display_name_cn}}
                    @elseif(session('language') == 2)
                        {{$options[0]->display_name_jp}}
                    @else
                        {{$options[0]->display_name_en}}
                    @endif
                    &#9654;
                </button>
            </div>
        </div>
    </div>
@endif

