@foreach ($dishes as $ds)
    @if($ds->sold_out == 0)
        <div class="card" onclick="orderNow({{$ds->id}})">
            <div class="card-header">
                <img class="cardImg" src="{{asset('img/'.$ds->image)}}" alt="chicken">
                <div class="headerSpan">
                    <div class="specialBadge">
                        @if($ds->badge_id > 0)
                            <img src="{{asset('img/'.$ds->badge->filepath)}}" alt="" srcset="" style="position: absolute;">
                        @endif
                    </div>
                    <div class="fab">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <p class="text_limit_character dish_description">{{$ds->name_en}}</p>
                <footer>
                    <div class="discountedPrice">$ {{$ds->price}}</div>
                    <div class="price striked">
                        @if(isset($dish->discount))
                            {{$ds->discount->discount}}
                        @endif
                    </div>
                </footer>
            </div>
        </div>
    @else
        <div class="card outStock">
            <div class="card-header">
                <img class="cardImg" src="{{asset('img/'.$ds->image)}}" alt="chicken">
                <div class="headerSpan">
                    <div class="specialBadge">
                        @if($ds->badge_id > 0)
                            <img src="{{asset('img/'.$ds->badge->filepath)}}" width="20px" alt="" srcset="">
                        @endif
                    </div>
                    <div class="fab">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <p class="text_limit_character dish_description">{{$ds->name_en}}</p>
                <footer>
                    <div class="discountedPrice"> $ {{$ds->price}}</div>
                    <div class="price striked">
                        @if(isset($dish->discount))
                            {{$ds->discount->discount}}
                        @endif
                    </div>
                </footer>
            </div>
        </div>
    @endif
@endforeach