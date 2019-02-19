<div class="modal-content-wide" style="position: relative;">
    <input type="hidden" id="dish-id" value="{{$dish_id}}">
    <input type="hidden" id="items-id" value="{{$items_id}}">
    <span class="close" onclick="$('#thirdModal').modal('hide');">&times;</span>
    <div class="modalHeader">
        <h3>{{$dish->name_en}}</h3>
        <p>{{$dish->desc_en}}</p>
        <div class="modalPriceOffer" style="display:inline-flex;">
            <p>
                Base
                <span class="price">${{$dish->price}}</span>
                <span class="price"> + </span>
                {{$option->display_name_en}}
                <span class="price" id="item_price">$2.50</span>
            </p>
        </div>
    </div>
    <div class="contentHeader">
        PLEASE SELECT 1 x <b>{{$dish->name_en}}</b>
    </div>
    <div class="modalContent-wide">
        @foreach($items as $item)
            <div class="gridContent">
                <img src="{{asset('img/'.$item->image)}}" alt="chicken">
            </div>
            <div class="gridContent-check" onclick="selectItem({{$item->price}})">
                <label class="container">{{$item->name}}<span class="price"> (+${{$item->price}})</span>
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                </label>
            </div>
        @endforeach
    </div>
    <div class="btn-content">
        <button class="btnBottom-1">&#9664; RESELECT BASE</button>
        @if(isset($option_id_arr[$count]))
            <button class="btnBottom-3" onclick="thirdModal('{{$option_ids}}', '{{$count}}')" >SELECT SIDE DISHES &#9654;</button>
        @else
                <button class="btnBottom-3" onclick="reviewOrder()" >REVIEW ORDER &#9654;</button>
        @endif

        <button class="btnBottom-2">&#9664; BACK</button>
    </div>
</div>