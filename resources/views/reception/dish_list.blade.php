@if(!empty($dishes))
@foreach ($dishes as $ds)
    @if($ds->sold_out == 0)
        <ul id="myUL">
            <li>
                @if(count($ds->options) > 0)
                    <span class="caret common_dish fs-25" id="op_{{ $ds->id }}" onclick="selectDishes({{ $ds->id }})">{{ $ds->name_en }}</span>
                @else
                    <span class="common_dish fs-25" id="op_{{ $ds->id }}" onclick="selectDishes({{ $ds->id }})">&nbsp;&nbsp;&nbsp;-{{ $ds->name_en }}</span>
                @endif
                <ul class="nested">
                    @foreach ($ds->options as $option)
                        <li>
                            <span class="caret fs-25">{{ $option->name }}:
                                @if($option->photo_visible == 0 || $option->number_selection == 1)
                                    (You can select only 1 item.)
                                @else
                                    (You can select only {{ $option->number_selection }} items.)
                                @endif
                            </span>
                            <ul class="nested">
                                @foreach ($option->item as $item)
                                    <li>
                                        @if($option->photo_visible == 0)
                                            <input type="checkbox" class="checked_items_{{ $ds->id }}{{ $option->id }}" value="{{$item->id}}"
                                                   onclick="selectItem(1, '{{ $ds->id }}', '{{ $option->id }}', '{{$item->id}}')"
                                                   style="width:20px;height:20px;" />
                                        @else
                                            <input type="checkbox" class="checked_items_{{ $ds->id }}{{ $option->id }}" value="{{$item->id}}"
                                                   onclick="selectItem('{{ $option->number_selection }}', '{{ $ds->id }}', '{{ $option->id }}', '{{$item->id}}')"
                                                   style="width:20px;height:20px;" />
                                        @endif
                                        <span class="fs-25">{{ $item->name }}</span>
                                            @if($item->price) <span class="fs-25">(${{ number_format($item->price, 2) }})</span> @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    @endif
@endforeach
@endif
<style>

    ul, #myUL {
        list-style-type: none;
    }

    #myUL {
        margin: 0;
        padding: 0;
    }

    .caret {
        cursor: pointer;
        -webkit-user-select: none; /* Safari 3.1+ */
        -moz-user-select: none; /* Firefox 2+ */
        -ms-user-select: none; /* IE 10+ */
        user-select: none;
    }

    .caret::before {
        content: "\25B6";
        color: black;
        display: inline-block;
        margin-right: 6px;
    }

    .caret-down::before {
        -ms-transform: rotate(90deg); /* IE 9 */
        -webkit-transform: rotate(90deg); /* Safari */'
        transform: rotate(90deg);
    }

    .nested {
        display: none;
    }

    .active {
        display: block;
    }

    .selected_category_color{
         color: #039BFA;
     }
</style>

<script>

    var toggler = document.getElementsByClassName("caret");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
    }

</script>