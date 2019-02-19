@if($count != 1)
    <div class="modal-content">
        <div class="modalHeader">
            <input type="hidden" id="dish-id" value="{{$dish->id}}">
            <span class="close" onclick="$('#myModal').modal('hide');">&times;</span>
            <h3>{{$dish->name_en}}</h3>
            <p>{{$dish->desc_en}}</p>
            <div class="modalPriceOffer" style="display:inline-flex;">
                <div class="discountedPrice" style="padding-right:10px;">${{$dish->price}}</div>
                <div class="price striked">
                    @if(isset($dish->discount))
                        ${{$ds->discount->discount}}
                    @endif
                </div>
            </div>
        </div>
        <div class="modalContent">
            <div class="leftContent">
                <div class="specialBadge">
                    @if($dish->badge_id > 0)
                        <img src="{{asset('img/'.$dish->badge->filepath)}}" alt="" srcset="" style="position: absolute;">
                    @endif
                </div>
                <img src="{{asset('img/'.$dish->image)}}" alt="chicken">
            </div>
            <div class="rightContent">
                <div class="contentHeader">
                    Please choose:
                </div>
                <div class="scrollable menu">
                    @foreach($options as $option)
                        <div class="menuClasses">
                            @if($option->photo_visible == 0)
                                <div class="menuClassesHeader">{{$option->display_name_en}}</div>
                                @if(isset($option->items))
                                    @foreach($option->items as $item)
                                        <label class="container">{{$item->name}}
                                            <input type="radio" class="checked_items" value="{{$item->id}}" checked="checked" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="modalContent noMargin">
            <div>
                <p class="prepareStatus">This dish will be prepared straight away.</p>
            </div>
            <div class="padding10">
                <div class="btnGroup">
                    <button id="minus" onclick="plusQty('minus')">
                        <i class="far fa-minus"></i>
                    </button>
            <span id="numOfItems">
                00
            </span>
                    <button id="plus" onclick="plusQty('plus')">
                        <i class="far fa-plus"></i>
                    </button>
                </div>
                @if($count == 0)
                    <button class="cta" onclick="nextModal('thx');">Order now</button>
                @else
                    <button class="cta" onclick="nextModal('main');">SELECT MAIN DISH</button>
                @endif
            </div>
        </div>
    </div>
@else
    <div class="modal-content-wide">
        <div class="modalHeader">
            <input type="hidden" id="dish-id" value="{{$dish->id}}">
            <input type="hidden" id="items-id" value="{{$items}}">
            <span class="close" onclick="$('#myModal').modal('hide');">&times;</span>
            <h3>{{$dish->name_en}}</h3>
            <p>{{$dish->desc_en}}</p>
            <div class="modalPriceOffer" style="display:inline-flex;">
                <div class="price" style="padding-right:10px;">${{$dish->price}}</div>
            </div>
        </div>
        <div class="modalContent">
            <div class="leftContent">
                <div class="specialBadge">
                    @if($dish->badge_id > 0)
                        <img src="{{asset('img/'.$dish->badge->filepath)}}" alt="" srcset="" style="position: absolute;">
                    @endif
                </div>
                <img src="{{asset('img/'.$dish->image)}}" alt="chicken">
            </div>
            <div class="rightContent">
                <div class="scrollable menu">
                    <div class="menuClassesHeader">Please Select</div>
                    <?php $index = 0?>
                    @foreach($options as $option)
                        <?php $index ++?>
                        @if($option->photo_visible == 1)
                            @if(isset($option->items))
                                <h3>{{$option->number_selection}} x {{$option->display_name_en}} @if($index < $option_count) and @endif</h3><br>
                            @endif
                        @endif
                    @endforeach
                    <h3>on the following pages.</h3>
                </div>
            </div>
        </div>
        <div class="modalContent">
            <div>
                <p class="prepareStatus">The dish will be prepared straight away</p>
            </div>
            <div class="padding10">
                <button class="cta" onclick="thirdModal('{{$option_id_arr}}', '0')">Select Main Dish</button>
            </div>
        </div>
    </div>
@endif
