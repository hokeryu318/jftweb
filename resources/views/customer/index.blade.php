<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('customer_css/style.css')}}">
    <link rel="stylesheet" href="{{asset('customer_css/all.css')}}">
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
</head>
<style>
    #screensaver { position: absolute; width: 100%; height:100%; left:0px; top: 0px; display: none; z-index:9999; }
    /*#screensaver img { -webkit-animation: fadein 2s;animation: fadein 2s;}
    @keyframes fadein {
        from { opacity: 0.9; }
        to   { opacity: 1; }
    }
    @-webkit-keyframes fadein {
        from { opacity: 0.9; }
        to   { opacity: 0; }
    }*/

    /*.slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
    }

    .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    }

    .active {
    background-color: #717171;
    }

    .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
    }

    @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
    }*/

</style>

<body>
<div id="app">
    <input type="hidden" id="img_name" value="{{ $img_name }}">
    <nav>
        <input type="hidden" id="order_id" value="{{ $order->id }}" />
        <div class="brand">
            <p>
                <pay-finish-component order_id="{{ $order->id }}"></pay-finish-component>
            </p>

            <img src="{{asset('receipt/'.$profile->logo_image)}}" alt="Logo" class="logo" height="110px">
        </div>
        <div class="category_container">
            @foreach($category_all as $key => $category)
                @if(isset($category['has_subs']) && $category['has_subs'] == 1)
                    <div class="header category_parent common_category" id="category_{{$category['id']}}" onclick="onDishes({{$category['id']}})">
                        <span>
                            @if(session('language') == 1)
                                {{$category['name_cn']}}
                            @elseif(session('language') == 2)
                                {{$category['name_jp']}}
                            @else
                                {{$category['name_en']}}
                            @endif
                        </span>
                    </div>
                    <div class="display-none" id="cat-{{ $category['id'] }}">
                        <ul class="category_child">
                            @foreach($category['children'] as $child)
                                <li id="category_{{$child['id']}}" class="common_category" onclick="onDishes1({{ $child['id'] }})">
                                    @if(session('language') == 1)
                                        - {{$child['name_cn']}}
                                    @elseif(session('language') == 2)
                                        - {{$child['name_jp']}}
                                    @else
                                        - {{$child['name_en']}}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    @if($category['parent_id'] == "")
                        <div class="category_parent common_category" id="category_{{$category['id']}}" onclick="onDishes({{$category['id'] }})">
                            <span>
                                @if(session('language') == 0)
                                    {{$category['name_en']}}
                                @elseif(session('language') == 1)
                                    {{$category['name_cn']}}
                                @else
                                    {{$category['name_jp']}}
                                @endif
                            </span>
                        </div>
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
            </div>
            <h6>&nbsp;</h6>
            <div class="tTime">
                <h3>Start time</h3>
                <h2>{{date('H:i d F Y', strtotime($order->time))}}</h2>
            </div>
        </div>
        {{--@if($order_table->calling_time)--}}
            {{--<div style="width:230px; background: #C9B92E" onclick="call_staff()" id="calling_staff">--}}
                {{--<img src="{{asset('img/calling_staff.png')}}" alt="staff" srcset="" width="60px">--}}
                {{--<h3 style="color: white;">CALLING</h3>--}}
            {{--</div>--}}
        {{--@else--}}
            {{--<div style="width:230px;" onclick="call_staff()" id="calling_staff">--}}
                {{--<img src="{{asset('img/call_staff.png')}}" alt="staff" srcset="" width="60px" style="margin-top: 10px;">--}}
                {{--<h3>CALL STAFF</h3>--}}
            {{--</div>--}}
        {{--@endif--}}

        <customer-calling-component order_id="{{ $order->id }}" calling_time="{{ $order_table->calling_time }}"></customer-calling-component>

        <div style="width:170px;"  onclick="lang_select()">
            <img src="{{asset('img/language.png')}}" alt="language" srcset="" width="70px">
            <h3>语言</h3>
        </div>
        <div onclick="feedBack()">
            <img src="{{asset('img/feedback.png')}}" alt="feedback" srcset="" width="70px">
            <h3>FEEDBACK</h3>
        </div>
        <div class="primaryBtn btn" id="myBtn" onclick="view_bill_pay()">
            <img src="{{asset('img/money.png')}}" alt="" srcset="" width="40px">
            <h2>View Bill & Pay</h2>
        </div>
        <div class="greyBtn btn">
            <h3>Last<br>order in</h3>
            <h3><font size="5px"><span id="time"></span></font> mins</h3>
        </div>
    </header>

    <section id="dish-content">
    @foreach ($dishes as $ds)
        @if($ds->sold_out == 0)
            <div class="card" onclick="orderNow({{$ds->id}})">
                <div class="card-header">
                    <img class="cardImg" @if($ds->image) src="{{asset('dishes/'.$ds->image)}}" @endif>
                    <div class="headerSpan">
                        <div class="specialBadge">
                            @if($ds->badge_id > 0)
                                <img src="{{asset('badges/'.$ds->badge->filepath)}}" alt="" srcset="" height="38px">
                            @endif
                        </div>
                        <div class="fab">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <p class="text_limit_character dish_description">
                        @if(session('language') == 1)
                            {{$ds->name_cn}}
                        @elseif(session('language') == 2)
                            {{$ds->name_jp}}
                        @else
                            {{$ds->name_en}}
                        @endif
                    </p>
                    <footer>
                        @if($ds->discount != '')
                        <div class="discountedPrice">
                            ${{ number_format($ds->discount, 2) }}
                        </div>
                        @endif
                        <div @if($ds->discount != '') class="price striked" @else class="price unstriked" @endif>${{ number_format($ds->price, 2) }}</div>
                    </footer>
                </div>
            </div>
        @else
            <div class="card outStock">
                <div class="card-header">
                    <img class="cardImg" @if($ds->image) src="{{asset('dishes/'.$ds->image)}}" @endif>
                    <div class="headerSpan">
                        <div class="specialBadge">
                            @if($ds->badge_id > 0)
                                <img src="{{asset('badges/'.$ds->badge->filepath)}}" alt="" srcset="" height="38px">
                            @endif
                        </div>
                        <div class="fab">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <p class="text_limit_character dish_description">
                        @if(session('language') == 1)
                            {{$ds->name_cn}}
                        @elseif(session('language') == 2)
                            {{$ds->name_jp}}
                        @else
                            {{$ds->name_en}}
                        @endif
                    </p>
                    <footer>
                        @if($ds->discount != '')
                            <div class="discountedPrice">
                                ${{ number_format($ds->discount, 2) }}
                            </div>
                        @endif
                        <div @if($ds->discount != '') class="price striked" @else class="price unstriked" @endif>${{ number_format($ds->price, 2) }}</div>
                    </footer>
                </div>
            </div>
        @endif
    @endforeach
</section>
</main>
</div>
<div id="screensaver"></div>
<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>

    // Glabal variables for order state registering( photo_visible == 1 )
     var selected_items_id = [];
     var order_option_count = 0;
     var chk_prev_flag = 0;

     //////////////////////////////////////////********************************************************************************************************************************

    $(document).ready(function(){
        $(".category_parent").first().addClass('selected_category_color');

        /*var mousetimeout;
        var screensaver_active = false;
        var idletime = 5;

        function show_screensaver(){
            $('#screensaver').fadeIn();
            var img_path = img_name.value;
            img_path = img_path.substr(1,img_path.length-2);
            var div_img = img_path.split(",");
            var i = 0, cnt = div_img.length;
            setInterval(function(){
                document.getElementById("screensaver").innerHTML='<img src={!! asset("screen/'+div_img[i].substr(1,div_img[i].length-2)+'") !!} width="100%">';
                if( cnt > i + 1 ) i++;
                else i = 0;
            },3000);
        }

        function stop_screensaver(){
            $('#screensaver').fadeOut();
            screensaver_active = false;
        }

        $(document).mousemove(function(){
            clearTimeout(mousetimeout);
            
            if (screensaver_active) {
                stop_screensaver();
            }

            mousetimeout = setTimeout(function(){
                show_screensaver();
            }, 1000 * idletime); // 5 secs			
        });*/
        
        (function(poll, timeout){

            var _idle = false,
                _lastActive = 0,
                _activeNow = function() {
                    _lastActive = new Date();

                    if (_idle) {
                        $('#screensaver').hide();
                        _idle = false;
                    }
                },
                _poll = function() {

                    var elapsed = (new Date()) - _lastActive;
                    var img_path = img_name.value;
                    img_path = img_path.substr(1,img_path.length-2);
                    var div_img = img_path.split(",");
                    var i = 0, cnt = div_img.length;

                    if ((elapsed > timeout) && !_idle) {
                        $('#screensaver').fadeIn(5000);
                        _idle = true;

                        setInterval(function(){ 
                            path = 
                            document.getElementById("screensaver").innerHTML='<img src={!! asset("screen/'+div_img[i].substr(1,div_img[i].length-2)+'") !!} width="100%">';
                            if( cnt > i + 1 ) i++;
                            else i = 0;
                        }, 8000);

                    }
                }

            $(window).bind('click', _activeNow);            

            /*$(window).click(function(){
                _activeNow();			
            });*/

            window.setInterval(_poll, poll);

            _activeNow();
        })(1000*110, 8000);
    });

    $(".header").click(function () {
        $header = $(this);
        $content = $header.next();
        $content.slideToggle(500);
    });

    function Global_format() {

        selected_items_id = [];
        order_option_count = 0;
        chk_prev_flag = 0;
    }

    function onDishes(category_id){

        var catContents = document.getElementsByClassName('display-none');
        for (var i = 0; i < catContents.length; i++) {
            catContents[i].style.display = 'none';
        }

//        var catContentIdToShow = 'cat' + category_id;
//        document.getElementById(catContentIdToShow).style.display = 'block';

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
    function onDishes1(category_id){

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

        $('#myModal').html('');
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
        // $(".modal-content").css('width', '65%');
        $("#myModal").modal("toggle");
    }

    function plusQty(arg){
        var qty_number_obj = $("#numOfItems");
        var qty_number = qty_number_obj.html();
        if(arg == 'plus'){
            qty_number ++;
        }else{
            if(qty_number > 1){
                qty_number --;
            }
        }
        if(qty_number < 10){
            if(qty_number == 1){
                qty_number = '01';
            }else{
                qty_number = '0' + qty_number;
            }
        }
        qty_number_obj.html(qty_number);
    }

    function nextModal(arg){
        var dish_id = $("#dish-id").val();
        var order_id = $("#order_id").val();
        switch (arg){
            case 'thx':
                var chked_list_str = '';
                $("input:radio").each(function(){
                    var name = $(this).attr("name");
                    if($("input:radio[name="+name+"]:checked").length > 0) {
                        if(chked_list_str != '')
                            chked_list_str += "," + $("input:radio[name="+name+"]:checked").val();
                        else
                            chked_list_str = $("input:radio[name="+name+"]:checked").val();
                    }
                });

                var chked_list = chked_list_str.split(",");
                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }
                chked_list = chked_list.filter(distinct);
                // console.log(chked_list);
                var count = $("#numOfItems").text();
                // console.log(count);
                $.ajax({
                    type:"POST",
                    url:"{{ route('customer.order_dish') }}",
                    data:{
                        order_id: order_id, dish_id: dish_id, count: count, items_id: chked_list, _token: "{{ csrf_token() }}"
                    },
                    success: function(result){
                        var thx = $("#myModal").html($("#thx").html());
                    }
                });
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
    function next_page(option_id_arr, index){

        var dish_id = $("#dish-id").val();
        var items_id = $("#items-id").val();
     // console.log(items_id);
        selected_items_id.push(items_id);

        if(chk_prev_flag == 1)
            index++;

        $.ajax({
            type:"POST",
            url:"<?php echo e(route('customer.dish_option')); ?>",
            data:{
                option_id_arr: option_id_arr, dish_id: dish_id, items_id: selected_items_id[index], index: index, selecteds: selected_items_id, chk_prev_flag: chk_prev_flag, _token:"<?php echo e(csrf_token()); ?>"
            },
            success: function(result){
                $('#thirdModal').html(result);
                chk_prev_flag = 0;
                $("#items-id").val('');
            }
        });
        $("#myModal").modal("hide");
        $('#thirdModal').modal('show');
    }

    function option_previous_page(option_id_arr, index){
        var dish_id = $("#dish-id").val();
        $("#items-id").val('');
        var items_id = '';

        selected_items_id.pop();
        // console.log(selected_items_id);

        chk_prev_flag = 1;// back flag(from dish_option page)

        if(index == 1) {// back from first dish_option page to dish_info page
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
            // $(".modal-content").css('width', '65%');
            Global_format();
            index = 0;
            $("#myModal").modal("show");
            $('#thirdModal').modal('hide');
        }
        else {// back from dish_option page to dish_option page
            $.ajax({
                type:"POST",
                url:"<?php echo e(route('customer.dish_option_previous')); ?>",
                data:{
                    option_id_arr: option_id_arr, dish_id: dish_id, items_id: selected_items_id[index], index: index-2, selecteds: selected_items_id, _token:"<?php echo e(csrf_token()); ?>"
                },
                success: function(result){
                    $('#thirdModal').html(result);
                    chk_prev_flag = 0;
                }
            });
            $("#myModal").modal("hide");
            $('#thirdModal').modal('show');
        }
    }

    function review_previous_page(option_id_arr, index){
        var dish_id = $("#dish-id").val();
        $("#items-id").val('');
        var items_id = '';

        selected_items_id.pop();
        // console.log(selected_items_id);

        $.ajax({
            type:"POST",
            url:"<?php echo e(route('customer.dish_option_previous')); ?>",
            data:{
                option_id_arr: option_id_arr, dish_id: dish_id, items_id: selected_items_id[index], index: index-1, selecteds: selected_items_id, _token:"<?php echo e(csrf_token()); ?>"
            },
            success: function(result){
                $('#thirdModal').html(result);
                chk_prev_flag = 0;
            }
        });
        $("#myModal").modal("hide");
        $('#thirdModal').modal('show');
    }

    function base_page() {
        Global_format();
        $('#thirdModal').modal('hide');
    }

    function selectItem(){

        var display_name = $("#display_name").val();
        var option_price_obj = $("#option_price");
        var number_selection = $("#number_selection").val();
        var items_id_obj = $("#items-id");

        var option_price = [];
        var items_id = [];

        $("input:checkbox").each(function(){
            var name = $(this).attr("name");
            var it_chk_val = '';
            if($("input:checkbox[name="+name+"]:checked").length > 0) {
                if($("input:checkbox[name="+name+"]:checked").val()) {
                    it_chk_val = parseFloat($("input:checkbox[name="+name+"]:checked").val());
                    option_price.push([name, it_chk_val.toFixed(2)]);
                }
                else {
                    option_price.push([name, '']);
                }
                items_id.push([name]);
            }
        });

        var itm_price = '';
        var display_item_price = '';
        var option_price_str = '';
        if(option_price.length <= number_selection) {
            for(var i=0;i<option_price.length;i++) {
                itm_price = option_price[i][1];
                if(itm_price != '')
                    display_item_price = "<span class='price'>" + "$" + itm_price + "</span>";
                else
                    display_item_price = "";
                option_price_str += "<span class='price'>+</span>" + display_name + display_item_price;
            }
        }
        else {
            alert('You can select ' + number_selection + ' only for this option.');
            //all check info format
            $("input:checkbox").each(function(){
                var id = $(this).attr("id");
                document.getElementById(id).checked = false;
                option_price = [];
                items_id = [];
            });
        }

        option_price_obj.html(option_price_str);
        items_id_obj.val(items_id);
        // console.log(items_id);
    }

    function reviewOrder(option_id_arr, index){
        var dish_id = $("#dish-id").val();
        var items_id = $("#items-id").val();
        // console.log(items_id);
        selected_items_id.push(items_id);
        // console.log(selected_items_id);
        $.ajax({
            type:"POST",
            url:"<?php echo e(route('customer.dish_option_confirm')); ?>",
            data:{
                option_id_arr: option_id_arr, dish_id: dish_id, items_id: selected_items_id[index], index: index, selecteds: selected_items_id, _token:"<?php echo e(csrf_token()); ?>"
            },
            success: function(result){
                $('#thirdModal').html(result);
                $("#items-id").val('');
            }
        });
        $("#myModal").modal("hide");
        $('#thirdModal').modal('show');
    }

    function orderNow_Photo() {
        var dish_id = $("#dish-id").val();
        var order_id = $("#order_id").val();
        var count = $("#numOfItems").text();
        $('#thirdModal').html('');
        // console.log(count);
        $.ajax({
            type:"POST",
            url:"{{ route('customer.orderNow_Photo') }}",
            data:{
                order_id: order_id, dish_id: dish_id, count: count, selected_items_id: selected_items_id, _token: "{{ csrf_token() }}"
            },
            success: function(result){
                console.log(result);
                Global_format();

                var thx = $("#myModal").html($("#thx").html());
                $('#thirdModal').modal('hide');
                $("#myModal").modal("show");
            }
        });

    }

    //lang_select
    function lang_select() {
        $('#myModal').html('');
        $.ajax({
            type:"GET",
            url:"{{ route('customer.lang_select') }}",
            data:{},
            success: function(result){
                $('#myModal').html(result);
            }
        });
        $("#myModal").modal("toggle");
    }

    //feedback
    function feedBack() {
        var order_id = $("#order_id").val();
        $('#myModal').html('');
        $.ajax({
            type:"GET",
            url:"{{ route('customer.feedback') }}",
            data:{order_id: order_id},
            success: function(result){
                $('#myModal').html(result);
            }
        });
        $("#myModal").modal("toggle");
    }

    function add_review() {
        var order_id = $("#order_id").val();
        var review_type = $("#review_type").val();
        review_type = (review_type == '')? 1 : review_type;
        var review = $("#review").val();
        $.ajax({
            type:"POST",
            url:"{{ route('customer.add_review') }}",
            data:{
                order_id: order_id, review_type: review_type, review: review, _token:"{{ csrf_token() }}"
            },
            success: function(result){
                // console.log(result);
            }
        });
        $('#myModal').modal('hide');
    }

    //call staff
    $('#calling_staff').click(function(){

        var table_id = <?php echo $table_id; ?>;
        $.ajax({
            type:"POST",
            url:"{{ route('customer.calling') }}",
            data:{
                table_id: table_id, _token:"{{ csrf_token() }}"
            },
            success: function(result){
                {{--console.log(result);--}}
                if(result != '') {
                    document.getElementById("calling_staff").style.background="#C9B92E";
                    document.getElementById("calling_staff").innerHTML="<img src=\"{{asset('img/calling_staff.png')}}\" width=\"60px\">\n" +
                        "                    <h3 style=\"color: white;\">CALLING</h3>";
                } else {
                    document.getElementById("calling_staff").style.background="";
                    document.getElementById("calling_staff").innerHTML="<img src=\"{{asset('img/call_staff.png')}}\" width=\"60px\" style=\"margin-top: 10px;\">\n" +
                        "                    <h3>CALL STAFF</h3>";
                }
            }
        });
    });

    {{--function call_staff() {--}}
        {{--$.ajax({--}}
            {{--type:"POST",--}}
            {{--url:"{{ route('customer.calling') }}",--}}
            {{--data:{--}}
                {{--table_id: table_id, _token:"{{ csrf_token() }}"--}}
            {{--},--}}
            {{--success: function(result){--}}
                {{--console.log(result);--}}
                {{--if(result != '') {--}}
                    {{--document.getElementById("calling_staff").style.background="#C9B92E";--}}
                    {{--document.getElementById("calling_staff").innerHTML="<img src=\"{{asset('img/calling_staff.png')}}\" width=\"60px\">\n" +--}}
                        {{--"                    <h3 style=\"color: white;\">CALLING</h3>";--}}
                {{--} else {--}}
                    {{--document.getElementById("calling_staff").style.background="";--}}
                    {{--document.getElementById("calling_staff").innerHTML="<img src=\"{{asset('img/call_staff.png')}}\" width=\"60px\" style=\"margin-top: 10px;\">\n" +--}}
                        {{--"                    <h3>CALL STAFF</h3>";--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}

    //view bill pay
    function view_bill_pay() {
        $('#myModal').html('');
        var order_id = $("#order_id").val();
        $.ajax({
            type:"GET",
            url:"{{ route('customer.view_bill_pay') }}",
            data:{order_id: order_id},
            success: function(result){
                $('#myModal').html(result);
            }
        });
        $("#myModal").modal("toggle");
    }

    function finish_pay(table_name, starting_time, total, without_gst_price, gst_price) {

        var order_id = $("#order_id").val();
        // alert(table_name);
        $.ajax({
            type:"POST",
            url:"{{ route('customer.finish_pay') }}",
            data:{
                order_id: order_id, table_name: table_name, starting_time: starting_time, total: total, without_gst_price: without_gst_price, gst_price: gst_price, _token:"{{ csrf_token() }}"
            },
            success: function(result){
                // console.log(result);
                $('#thirdModal').html(result);
            }
        });
        $('#myModal').modal("hide");
        $('#thirdModal').modal("show");
        // $("#thirdModal").toggle();
        // setTimeout(function(){
        //     $("#thirdModal").hide();
        //     window.location.replace('../../');
        // }, 5000);
    }

    var myVar = setInterval(myTimer, 1000);

    function myTimer() {

        var last_order_time = new Date(<?php echo json_encode($last_order_time) ?>);
        var current_time =  new Date();
        var diff = (current_time.getTime() - last_order_time.getTime())/1000;
        diff /= 60;
        diff = Math.round(diff);
        if((diff > 0) && (diff > 90))
            document.getElementById("time").innerHTML = diff;
        else
            document.getElementById("time").innerHTML = 0;
    }

</script>
<div id="myModal" class="modal"></div>
<div id='thx' class="display-none">
    <div class="modal-content text-center thx-modal-content">
        <div class="close-btn">
            {{--<span class="close" onclick="$('#myModal').modal('toggle')">&times;</span>--}}
            <img src="{{asset('img/close.png')}}" style="width:40px;height: 40px;" class="close" onclick="$('#myModal').modal('toggle')" />
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
{{--<div id="feedbackModal" class>
    l"></div>--}}
    
</body>
</html>
