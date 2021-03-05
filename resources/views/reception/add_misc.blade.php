<input type="hidden" id="order_id" value="{{ $order_id }}" />
<div class="add_misc_modal">
    <div class="row" style="margin: 0 0 10px 30px;">
        <div class="col-2 category">NAME</div>
        <div class="space"></div>
        <div class="col-9 dish"><input type="text" id="misc_name" name="misc_name"></div>
    </div>
    <div class="row" style="margin: 0 0 10px 30px;">
        <div class="col-2 category">PRICE</div>
        <div class="space"></div>
        <div class="col-9 dish"><input type="number" id="misc_price" name="misc_price"></div>
    </div>
    <div class="row">
        <div class="col-7 qty">
            <div class="row" style="height: 50px;">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="row">
                        <span style="color: white;margin: 10px 0 0 51px;font-size: 25px;">QTY</span>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row" style="height: 50px;">
                <div class="col-5" style="text-align: right;">
                    <img src="{{asset('img/qty_down.png')}}" style="width: 60px;margin: 17px 10px 0 0px;" onclick="plusQty('minus')" />
                </div>
                <div class="col-2">
                    <div class="row qty_text">
                        <span id="qty" style="width: 70px;height: 60px;font-weight: 500;text-align: center;padding-top: 10px;">@if($order_dish_id != 0) {{ $count }} @else 0 @endif</span>
                    </div>
                </div>
                <div class="col-5">
                    <img src="{{asset('img/qty_up.png')}}" style="width: 60px;margin: 17px 0px 0 -15px;" onclick="plusQty('plus')" />
                </div>
            </div>
        </div>
        <div class="col-4" style="margin-left: -6px;">
            <div class="amend_btn" style="background: #1EC2C9;color: white;margin: 12px 0 0 43px; padding-left: 42px;" onclick="onApply()">
                @if($order_dish_id != 0)
                    <aa class="fs-25" style="margin-right: -6px;">CHANGE</aa>
                @else
                    <aa class="fs-25" style="margin-right: 20px;">APPLY</aa>
                @endif
                <img src="{{ asset('img/Group728white.png') }}" style="height:18px;margin: -8px 0 0 43px;">
            </div>
            <div class="amend_btn" style="background: white;color: black;margin: 12px 0 0 43px;padding-left: 15px;" onclick="$('#thirdModal').modal('hide');">
                <aa class="fs-25" style="margin-left: 25px;">CANCEL</aa>
                <img src="{{ asset('img/Group728black.png') }}" style="height:18px;margin: -8px 0 0 43px;">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="java-alert1" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="margin-top: -750px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('img/Group1101.png') }}"  style="width:25px;height:25px;" class="float-right" />
                </button>
            </div>
            <div class="modal-body pr-4">
                <p id="alert-string1" class="text-center fs-20"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect waves-light fs-20" onclick="$('#java-alert1').modal('hide');">
                    Close
                    <img src="{{ asset('img/Group728.png') }}" height="18" class="mb-1" />
                </button>
            </div>
        </div>
    </div>
</div>
<script>

    var select_list = [];
    var order_dish_id = <?php echo(json_encode($order_dish_id))?>;
    var count = <?php echo(json_encode($count))?>;

    $(".header").click(function () {
        $header = $(this);
        $content = $header.next();
        $content.slideToggle(500);
    });

    function plusQty(arg){
        var qty_number_obj = $("#qty");
        var qty_number = qty_number_obj.text();

        if(arg == 'plus') {
            qty_number ++;
        } else {
            if(order_dish_id == 0) {
                if(qty_number > 0) {
                    qty_number --;
                }
            } else {
                if(parseInt(count) + parseInt(qty_number) < 1) {
                    $("#alert-string1")[0].innerText = 'The count for this item is ' + count + '.\n Please select qty by small than count!';
                    $("#java-alert1").modal('toggle');
                } else {

                    qty_number --;
                }
            }
        }
        // if(qty_number < 10) {
        //     if(qty_number == 1) {
        //         qty_number = '01';
        //     } else {
        //         qty_number = '0' + qty_number;
        //     }
        // }
        qty_number_obj.html(qty_number);

    }

    var toggler = document.getElementsByClassName("caret");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
    }

    //Apply
    function onApply(){
        var order_id =  <?php echo(json_encode($order_id)) ?>;

        if(order_dish_id == 0) {// add item
            //select get dish and option list for add
            var misc_name  = $('#misc_name').val();
            var misc_price = $('#misc_price').val();
            
            if(misc_name == ''){
                $("#alert-string1")[0].innerText = "Please input misc dish name!";
                $("#java-alert1").modal('toggle');
                return;
            } else if(misc_price == ''){
                $("#alert-string1")[0].innerText = "Please input misc dish price!";
                $("#java-alert1").modal('toggle');
                return;
            } else {
                var qty_number_obj = $("#qty");
                var qty = qty_number_obj.text();
                
                if(qty == 0) {
                    $("#alert-string1")[0].innerText = "Please set qty!";
                    $("#java-alert1").modal('toggle');
                } else {
                    $('#thirdModal').html('');
                    $('#thirdModal').modal('hide');
                    
                    $.ajax({
                        type:"POST",
                        url:"{{ route('reception.add_misc') }}",
                        data:{
                            order_id: order_id, misc_name: misc_name, misc_price: misc_price, qty: qty, _token:"{{ csrf_token() }}"
                        },
                        success: function(result){
                            location.href = window.location.href;
                        }
                    });
                }
            }
        } else {// change count of item
            var count = <?php echo(json_encode($count))?>;
            var qty_number_obj = $("#qty");
            var qty = qty_number_obj.text();
            var change_count = parseInt(qty) - count;

            $('#thirdModal').html('');
            $('#thirdModal').modal('hide');

            $.ajax({
                type:"POST",
                url:"{{ route('reception.change_count') }}",
                data:{
                    order_dish_id: order_dish_id, change_count: change_count, _token:"{{ csrf_token() }}"
                },
                success: function(result){
                    // console.dir(result);
                    location.href = window.location.href;
                }
            });
        }

    }

</script>

<style>
    .add_misc_modal {
        width: 880px;
        background: #666666;
        padding-top: 30px;
        padding-bottom: 30px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .category {
        padding-top: 10px;
        margin-left: 7px;
        text-align: right;
        color: white;
    }

    .space {
        width:27px;
    }

    .dish {
        background: white;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .qty {
        width: 250px;
        /*background: red;*/
        margin-left: 45px;
    }

    .qty_text {
        width: 80px;
        height: 75px;
        background: white;
        font-size: 30px;
        margin: 5px 0 0 -23px;
        padding: 7px 0 0 5px;
    }

    .selected_category_color{
        color: #039BFA;
    }

    ul {
        margin-bottom: 0;

    }


    /**********************************************/
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

    input[type=text]:focus,input[type=number]:focus {
        border-bottom: unset !important;
        box-shadow: unset !important;
    }

</style>


