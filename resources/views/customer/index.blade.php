<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
    <link rel="stylesheet" href="{{asset('customer_css/style.css')}}">
    <link rel="stylesheet" href="{{asset('customer_css/all.css')}}">
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
</head>
<body>
<nav>
    <div class="brand">
        <img src="{{asset('img/logo.png')}}" alt="Logo" class="logo">
    </div>
    <div class="category_container">
        @foreach($category_all as $key => $category)
            @if(isset($category['has_subs']) && $category['has_subs'] == 1)
                <div class="header category_parent common_category" id="category_{{$category['id']}}" onclick="onDishes({{$category['id']}})"><span>{{$category['name_en']}}</span></div>
                <div class="display-none">
                    <ul class="category_child">
                        @foreach($category['children'] as $child)
                            <li id="category_{{$child['id']}}" class="common_category" onclick="onDishes({{ $child['id'] }})">- {{$child['name_en']}}</li>
                        @endforeach
                    </ul>
                </div>
            @else
                @if($category['parent_id'] == "")
                    <div class="category_parent common_category" id="category_{{$category['id']}}" onclick="onDishes({{$category['id'] }})">{{$category['name_en']}}</div>
                @endif
            @endif
        @endforeach
    </div>
</nav>
<main>
    <header>
        <div class="tInfo btn">
            <div class="tNumber">
                <h3>Table Number</h3>
                <h2>{{$table_name}}</h2>
            </div><br>
            <div class="tTime">
                <h3>Start time</h3>
                <h2>{{date('H:i:s d F Y', strtotime($order->time))}}</h2>
            </div>
        </div>
        <div>
            <img src="{{asset('img/call_staff.png')}}" alt="staff" srcset="" width="90px">
            <h2>Call Staff</h2>
        </div>
        <div>
            <img src="{{asset('img/language.png')}}" alt="language" srcset="" width="90px">
            <h2>语言</h2>
        </div>
        <div>
            <img src="{{asset('img/feedback.png')}}" alt="feedback" srcset="" width="90px">
            <h2>Feedback</h2>
        </div>
        <div class="primaryBtn btn" id="myBtn">
            <img src="{{asset('img/money.png')}}" alt="" srcset="" width="50px">
            <h1>View Bill & Pay</h1>
        </div>
        <div class="greyBtn btn">
            <h2>Last order in</h2>
            <h1>15 mins</h1>
        </div>
    </header>
    <section id="dish-content">
        @foreach ($dishes as $ds)
            @if($ds->sold_out == 0)
                <div class="card" onclick="orderNow({{$ds->id}})">
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
                            <div class="discountedPrice">{{$ds->price}}</div>
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
    </section>
</main>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".category_parent").first().addClass('selected_category_color');
    });
    $(".header").click(function () {
        $header = $(this);
        $content = $header.next();
        $content.slideToggle(500);
    });
    function onDishes(category_id){
        var selected_obj = $("#category_"+category_id);
        $(".common_category").removeClass("selected_category_color");
        selected_obj.toggleClass('selected_category_color');
        $.ajax({
            type:"POST",
            url:"{{ route('customer.dish_list') }}",
            data:{
                category: category_id, _token:"{{ csrf_token() }}"
            },
            success: function(result){
                $('#dish-content').html(result);
             }
        });
    }
    function orderNow(dish_id){
        $.ajax({
            type:"POST",
            url:"{{ route('customer.dish_info') }}",
            data:{
                dish_id: dish_id, type: 'first', _token:"{{ csrf_token() }}"
            },
            success: function(result){
                $('#myModal').html(result);
            }
        });
        $(".modal-content").css('width', '65%');
        $("#myModal").modal("toggle");
    }
    function plusQty(arg){
        var qty_number_obj = $("#numOfItems");
        var qty_number = qty_number_obj.html();
        if(arg == 'plus'){
            qty_number ++;
        }else{
            if(qty_number > 0){
                qty_number --;
            }
        }
        if(qty_number < 10){
            if(qty_number == 0){
                qty_number = '00';
            }else{
                qty_number = '0' + qty_number;
            }
        }
        qty_number_obj.html(qty_number);
    }
    function nextModal(arg){
        var dish_id = $("#dish-id").val();
        switch (arg){
            case 'thx':
                $("#myModal").html($("#thx").html());
                break;
            case 'main':
                var checked_items_obj = $(".checked_items");
                var checked_option_ids = '';
                for(var i = 0; i < checked_items_obj.length; i ++){
                    if(checked_items_obj[i].checked == true){
                        if(checked_option_ids == ''){
                            checked_option_ids = checked_items_obj[i].value;
                        }else{
                            checked_option_ids += ',' + checked_items_obj[i].value;
                        }
                    }
                }
                $.ajax({
                    type:"POST",
                    url:"<?php echo e(route('customer.dish_info')); ?>",
                    data:{
                        dish_id: dish_id, type: 'main', items: checked_option_ids, _token:"<?php echo e(csrf_token()); ?>"
                    },
                    success: function(result){
                        $(".modal-content").css('width', '90%');
                        $('#myModal').html(result);
                    }
                });
                break;
        }
    }
    function thirdModal(option_id_arr, index){
        var dish_id = $("#dish-id").val();
        var items_id = $("#items-id").val();
        $.ajax({
            type:"POST",
            url:"<?php echo e(route('customer.dish_option')); ?>",
            data:{
                option_id_arr: option_id_arr, dish_id: dish_id, items_id: items_id,  index: index, _token:"<?php echo e(csrf_token()); ?>"
            },
            success: function(result){
                $('#thirdModal').html(result);

            }
        });
        $("#myModal").modal("hide");
        $('#thirdModal').modal('show');
    }

    function selectItem(item_price){
        alert(item_price);
        var item_price_obj = $("#item_price");
        var item_price_str = item_price_obj.html();
        var original_price = item_price_str.split('$')[1];
        var sum_price = parseFloat(original_price) + parseFloat(item_price);
        item_price_obj.html('$'+sum_price);
    }

    function reviewOrder()
    {
        alert('here');
    }
</script>
<div id="myModal" class="modal"></div>
<div id='thx' class="display-none">
    <div class="modal-content text-center thx-modal-content">
        <div class="close-btn">
            <span class="close" onclick="$('#myModal').modal('toggle')">&times;</span>
        </div>
        <div class="greeting-letter">
            <h3>Thank you!</h3>
        </div>
        <div class="order-complete">
            <h3>Your order has been placed.</h3>
        </div>
        <div class="padding10">
            <button class="complete-btn" onclick="$('#myModal').modal('toggle');$('#myModal').html('')">OK</button>
        </div>
    </div>
</div>
<div id="thirdModal" class="modal"></div>
</body>
</html>