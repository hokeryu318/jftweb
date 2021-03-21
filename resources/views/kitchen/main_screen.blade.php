<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    <meta name="viewport" content="width=device-width, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kitchen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('kitchen_css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<input type="hidden" id="group_id" value="{{ $group_id }}">

<div class="main">
    <div id="app">
        <input type="hidden" id="audio" value="{{ $_GET['audio'] ?? 0 }}">
        <audio id="audio-player" style="opacity: 0;">
            <source src="{{ asset('mp3/kitchensound.mp3') }}" type="audio/mpeg">
        </audio>
        <div class="container-fluid" style="position: sticky; top: 0;">
            <div class="row header">
                <div class="col-sm-2" style="padding: 24px 0 0 30px;">
                    <div style="font-size: 18px;font-weight: 700;">Group:</div>
                    <div style="font-size: 22px"><b>{{ $kitchen_group->name }}</b></div>
                </div>
                <div class="col-sm-4" style="padding: 24px 0 0 60px;">
                    <div style="font-size: 18px;font-weight: 700;">Total QTY on this group:</div>
                    <div style="font-size: 28px">
                        <b>
                            <span id="total_count"></span>
                            {{--FE0202:red, FDA01A:yellow, 2BB238:green--}}
                            <span class="circle">
                                <p class="top red" id="red_count"></p>
                                <p class="top yellow" id="yellow_count"></p>
                                <p class="top green" id="green_count"></p>
                            </span>
                        </b>
                    </div>
                </div>

                <div class="col-sm-2" style="padding: 9px 0 0 20px;">
                    <kitchencalling-component :attend_status="{{ $attend_status }}"></kitchencalling-component>
                </div>

                <div class="col-sm-2" style="padding: 12px 0 0 15px;">
                    <div style="margin-left: 18px;"><img src="{{ asset('img/change_group.png') }}" class="change_group" onclick="change_group()"></div>
                    <div style="font-size: 17px;font-weight: 700;">Change group</div>
                </div>

                <div class="col-sm-2" style="padding: 18px 0 0 18px;">
                    <div style="margin-left: 38px;margin-bottom: 6px;"><img src="{{ asset('img/reprint_docket.png') }}" class="reprint" onclick="docket()"></div>
                    <div style="font-size: 17px;font-weight: 700;">Reprint Docket</div>
                </div>
            </div>
        </div>
        <div class="mycontainer">
            <div style="padding-right: 15px;">
                <table>
                    <tr style="height: 50px;">
                        <td class="head" width="7%" align="center">Time</td>
                        <td class="head" width="13%">Table No</td>
                        <td class="head" width="8%">ITEM</td>
                        <td class="head" width="56%"></td>
                        <td class="head" width="7%">QTY</td>
                        <td class="head" width="9%" onclick="window.location.replace(window.parent.location.href);">
                            <span>Ready</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="height: 560px;overflow: scroll;padding-right: 15px;">
                <kitchendish-component :group="{{ $group_id }}"></kitchendish-component>
            </div>
        </div>
        <kitchen-dish-ready-component :group_id="{{ $group_id }}"></kitchen-dish-ready-component>        
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script type="application/javascript">

    var group_id = <?php echo(json_encode($group_id))?>;

    //calling
    $(document).ready(function() {
        var audio = document.getElementById("audio-player");
        var check = $('#audio').val();
        if (check == 1) audio.play();
        
        $(".main").on("click", ".calling_bell", function () {
            var call_bell_img = document.getElementById('calling_bell');
            var table_id = 0;
            $.ajax({
                type:"POST",
                url:"{{ route('kitchen.attend') }}",
                data:{ table_id: table_id, _token:"{{ csrf_token() }}" },
                success: function(result){
                    call_bell_img.src = '{{ asset('img/calling_bell_modal.png') }}';
                    $('#CallingModal').html(result);
                }
            });
            $("#CallingModal").modal("toggle");
        });
    });

    //attend
    function attend(table_id)
    {
        $.ajax({
            type:"POST",
            url:"{{ route('kitchen.attend') }}",
            data:{ table_id: table_id, _token:"{{ csrf_token() }}" },
            success: function(result){
                // console.log(result);
                $('#CallingModal').html(result);
            }
        });
    }

    //change group
    function change_group()
    {
        var group_id = $("#group_id").val();
        $.ajax({
            type:"GET",
            url:"{{ route('kitchen.change_group') }}",
            data:{ group_id:group_id },
            success: function(result){
                $('#ChangeGroupModal').html(result);
            }
        });
        $("#ChangeGroupModal").modal("toggle");
    }

    function return_previous_screen()
    {
        var checked_group = '';
        $("input:radio").each(function(){
            var name = $(this).attr("name");
            if($("input:radio[name="+name+"]:checked").length > 0) {
                checked_group = $("input:radio[name="+name+"]:checked").val();
            }
        });
        group_id = checked_group;
        $.ajax({
            type:"GET",
            url:"../kitchen/main_screen?group_id=" + group_id,
            // data:{ group_id: checked_group },
            success: function(result){

                $('#ChangeGroupModal').modal('hide');
                window.location.replace("../kitchen/main_screen?group_id=" + group_id);
            }
        });
    }

    //reprint docket
    function docket()
    {
        var group_id = $("#group_id").val();
        
        $.ajax({
            type:"GET",
            url:"{{ route('kitchen.docket') }}",
            data:{ group_id:group_id },
            success: function(result){
                if(result == '') {
                    //alert("There is no data for reprint!");
                    $.ajax({
                        type:"GET",
                        url:"{{ route('kitchen.java_alert') }}",
                        data:{ },
                        success: function(result1){
                            $('#java-alert').html(result1);
                            $("#java-alert").modal('toggle');
                        }
                    });
                } else{
                    $('#ReprintDocketModal').html(result);
                    $("#ReprintDocketModal").modal("toggle");
                }
                
            }
        });
        
    }

    // modal for dish click
    $(document).ready(function() {
        $(".main").on("click", ".dish_list", function () {
            var dish_id = $(this).attr("data-id");
            var group_id = <?php echo(json_encode($group_id))?>;
            $.ajax({
                type:"GET",
                url:"{{ route('kitchen.extract_cooking_name') }}",
                data:{ dish_id: dish_id, group_id: group_id },
                success: function(result){
                    $('#ExtractCookingName').html(result);
                }
            });
            $("#ExtractCookingName").modal("toggle");
        });
    });

    // modal for table click
    $(document).ready(function() {
        $(".main").on("click", ".table_list", function () {
            var order_id = $(this).attr("data-id");
            var group_id = <?php echo(json_encode($group_id))?>;
            $.ajax({
                type:"GET",
                url:"{{ route('kitchen.extract_table_number') }}",
                data:{ order_id: order_id, group_id: group_id },
                success: function(result){
                    console.dir(result);
                    $('#ExtractCookingName').html(result);
                }
            });
            $("#ExtractCookingName").modal("toggle");
        });
    });

    // ready check on dish and table modal
    function ready(ready_id, filter_flag, id, group_id)
    {
        $.ajax({
            type:'POST',
            url:'{{ route('kitchen.ready') }}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            data: { selected_id : ready_id, filter_flag: filter_flag, id: id, group_id: group_id },
            success: function(data){
                $('#ExtractCookingName').html(data);
            }
        });
    }

    //timer part
    var myVar = setInterval(myTimer, 1000);
    function myTimer() {

        var group_order_dishes = <?php echo(json_encode($group_order_dishes))?>;
        // console.log(group_order_dishes);
        // console.log(group_id);
        var current_time =  new Date();
        var order_time = '';
        var elapsed_time = '';
        var red_count = 0;
        var yellow_count = 0;
        var green_count = 0;
        
        for(var i=0;i<group_order_dishes.length;i++){

            //order_time = new Date(group_order_dishes[i].created_at);
            var dateParts = group_order_dishes[i].created_at.substr(0,10).split('-');
            var timePart = group_order_dishes[i].created_at.substr(11);
            order_time = dateParts[1] + '/' + dateParts[2] + '/' + dateParts[0] + ' ' + timePart;
            order_time = new Date(order_time);

            elapsed_time = (current_time.getTime() - order_time.getTime())/1000;
            elapsed_time /= 60;
            elapsed_time = Math.round(elapsed_time);
            
            var divObj = document.getElementById("time_" + i + "_" + group_id);
            if (divObj !== null) {
                if(elapsed_time >= 0 && elapsed_time < 10) {
                    document.getElementById("time_" + i + "_" + group_id).innerHTML =
                        "<span class=\"circle_middle\">\n" +
                        "    <p class=\"data green\">" + elapsed_time + "</p>\n" +
                        "</span>";
                    green_count++;
                } else if(elapsed_time >= 10 && elapsed_time < 20) {
                    document.getElementById("time_" + i + "_" + group_id).innerHTML =
                        "<span class=\"circle_middle\">\n" +
                        "    <p class=\"data yellow\">" + elapsed_time + "</p>\n" +
                        "</span>";
                    yellow_count++;
                } else if(elapsed_time >= 20 && elapsed_time <= 999) {
                    document.getElementById("time_" + i + "_" + group_id).innerHTML =
                        "<span class=\"circle_big\">\n" +
                        "    <p class=\"data red\">" + elapsed_time + "</p>\n" +
                        "</span>";
                    red_count++;
                } else {
                    document.getElementById("time_" + i + "_" + group_id).innerHTML = 
                        "<span class=\"circle_big\">\n" +
                        "    <p class=\"data red\">...</p>\n" +
                        "</span>";
                }
            }
        }

        document.getElementById("red_count").innerText = red_count;
        document.getElementById("yellow_count").innerText = yellow_count;
        document.getElementById("green_count").innerText = green_count;
        document.getElementById("total_count").innerText = red_count + yellow_count + green_count + ' / ';

    }

</script>

{{--calling_modal--}}
<div class="modal fade" id="CallingModal" role="dialog"></div>
{{--change group--}}
<div class="modal fade" id="ChangeGroupModal" role="dialog"></div>
{{--dish_select--}}
<div class="modal fade" id="ExtractCookingName" role="dialog"></div>
{{--reprint docket--}}
<div class="modal fade" id="ReprintDocketModal" role="dialog"></div>
{{--kitchen alert--}}
<div class="modal fade" id="java-alert" role="dialog"></div>
</body>
</html>

