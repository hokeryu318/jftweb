@extends('layout.admin_layout')

@section('title', 'Settings')

@section('content')
    <div style="padding-top:4%;"></div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="text-center exit_fullscreen display-none" id="exit-fullscreen">
                <span class="white-text font-weight-bold exit_fullscreen_letter">EXIT FULL SCREEN</span>
                <img src="{{ asset('img/exit-fullscreen.png') }}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-1 pr-0 pl-0 text-center" id="display-method">
                <div class="text-center display_all_content" id="display-all">
                    <img src="{{ asset('img/arrow.png') }}" class="display_all_btn"/>
                    <p class="white-text font-weight-bold display_all">DISPLAY ALL TABLE</p>
                </div>
                <div class="text-center display_scale">
                    <img src="{{ asset('img/plus_full.png') }}" class="plus_btn" onclick="tableZoomIn()"/>
                    <p class="font-weight-bold pt5 scale_value" id="scale-value">100%</p>
                    <img src="{{ asset('img/minus.png') }}" class="minus_btn" onclick="tableZoomOut();"/>
                </div>
            </div>
            <div class="col-8 room-content">
                <div class="room-div">
                    @foreach($tables as $key => $table)
                        <div class="table-common" id="selected-{{$key}}" onclick="selectObject('{{$table["id"]}}', '{{$table["type"]}}')" style="margin: {{$table['y']*20}}px 10px 10px {{$table['x']*20}}px;">
                            @if($table["type"] == 1){{--A--}}
                                <div class="white table-a-style text-center">
                                    <h5 class="font-weight-bold grey-text">{{$table_type[$table["type"]]."-".$table["index"]}}</h5>
                                </div>
                            @elseif($table["type"] == 2){{--B--}}
                                <div class="chair-b-style chair-top-style"></div>
                                <div class="white table-b-style text-center">
                                    <h5 class="font-weight-bold grey-text">{{$table_type[$table["type"]]."-".$table["index"]}}</h5>
                                </div>
                                <div class="chair-b-style chair-bottom-style"></div>
                            @elseif($table["type"] == 3){{--C--}}
                                <div class="chair-c-style chair-top-style"></div>
                                <div class="chair-top-style"></div>
                                <div class="white table-c-style text-center">
                                    <h5 class="font-weight-bold grey-text">{{$table_type[$table["type"]]."-".$table["index"]}}</h5>
                                </div>
                                <div class="chair-c-style chair-bottom-style"></div>
                                <div class="chair-bottom-style"></div>
                            @elseif($table["type"] == 4){{--Line--}}
                                <div class="text-center line-style"
                                     @if($table['index'] == "1"){{--right--}}
                                     style="padding-right: 200px;"
                                     @else
                                     style="padding-bottom: 200px;"
                                        @endif
                                        >
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-3 display_name" id="display-name-container">
            <div class="p-2 display-content">
                <h3 class="text-info font-weight-bold h3-responsive">Display Name</h3>
                <h4 class="black-text mb-xl-4 font-weight-bold h4-responsive selected-name" id="selected-name"></h4>
                <div class="display-value-coordinate">
                    <div class="text-center" id="selected-value-content">
                        <img src="{{ asset('img/arrowbottom.png') }}" onclick="changeCoordinate('value', 'down')" />
                        <input type="" id="selected-value" class="d-inline black-text font-weight-bold text-center w-25 mr-3 ml-3" placeholder="1" value="0" />
                        <img src="{{ asset('img/arrowtop.png') }}" onclick="changeCoordinate('value', 'up')"  />
                    </div>
                    <div class="text-center mt-xl-4">
                        <h4 class="text-info font-weight-bold text-left h4-responsive">X-Coordinate</h4>
                        <img src="{{ asset('img/arrowleft.png') }}" onclick="changeCoordinate('coordinate-x', 'down')"/>
                        <input type="" id="selected-x" class="d-inline black-text font-weight-bold text-center w-25 mr-3 ml-3" placeholder="1" value="0" />
                        <img src="{{ asset('img/arrowright.png') }}" onclick="changeCoordinate('coordinate-x', 'up')" />
                    </div>
                    <div class="text-center mt-xl-4">
                        <h4 class="text-info font-weight-bold text-left h4-responsive">Y-Coordinate</h4>
                        <img src="{{ asset('img/arrowbottom.png') }}" onclick="changeCoordinate('coordinate-y', 'down')" />
                        <input type="" id="selected-y" class="d-inline black-text font-weight-bold text-center w-25 mr-3 ml-3" placeholder="1" value="0"  />
                        <img src="{{ asset('img/arrowtop.png') }}" onclick="changeCoordinate('coordinate-y', 'up')"/>
                    </div>
                </div>
                <div class="row mt-xl-3">
                    <div class="col-6 pl-xl-5">
                        <button class="btn grey pr-2 pl-2" onclick="location.reload();"><h5 class="mb-0 font-weight-bold h5-responsive">CANCEL <br> &gt;</h5></button>
                    </div>
                    <div class="col-6 pl-xl-2">
                        <button class="btn bg-info pr-2 pl-2"><h5 class="mb-0 font-weight-bold h5-responsive" onclick="saveChangedTables()">&nbsp;&nbsp;APPLY&nbsp;&nbsp;  <br> &gt;</h5></button>
                    </div>
                </div>
                <div class="row pr-3 pl-3 mt-2 mb-2">
                    <button class="btn bg-grey pr-2 pl-2 w-100"><h5 class="mb-0 font-weight-bold h5-responsive" id="delete-selected-obj">DELETE THIS TABLE &gt;</h5></button>
                </div>
            </div>
            <div class="row operate_btn">
                <button class="btn black pr-2 pl-2 w-100" id="add-new-table"><h5 class="mb-0 font-weight-bold">ADD NEW TABLE &gt;</h5></button>
                <button class="btn bg-info pr-2 pl-2 w-100" id="add-new-line"><h5 class="mb-0 font-weight-bold">ADD LINE &gt;</h5></button>
                <button class="btn bg-info pr-2 pl-2 w-100" id="change-room-size"><h5 class="mb-0 font-weight-bold">CHANGE ROOM SIZE &gt;</h5></button>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.table.store') }}" id="save-form" enctype='multipart/form-data'>
        <input type="hidden" name="saved_arr" id="saved-arr">
        <input type="hidden" name="id" id="selected-id" value="0">
        @csrf
    </form>
    <input type="hidden" id="saved-width">
    {{--Modal Add new table--}}
    <div class="modal fade" id="add-new-table-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img style="width:10px;height:10px;" src="{{asset("img/Group1100.png")}}">
                    </button>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <div class="form-check d-inline">
                            <input type="radio" class="form-check-input rdobtn" id="table-a-checked" name="table" checked onclick="showTable(1)">
                            <label class="form-check-label text-blue txtdemibold" for="table-a-checked">A</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check d-inline">
                            <input type="radio" class="form-check-input rdobtn" id="table-b-checked" name="table" onclick="showTable(2)">
                            <label class="form-check-label text-blue txtdemibold" for="table-b-checked">B</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check d-inline">
                            <input type="radio" class="form-check-input rdobtn" id="table-c-checked" name="table" onclick="showTable(3)">
                            <label class="form-check-label text-blue txtdemibold" for="table-c-checked">C</label>
                        </div>
                    </div>
                </div>
                <div class="modal-table-content">
                    <a class="table-sample" id="table-sample-a"><img src="{{asset('img/table_a.png')}}"></a>
                    <a class="table-sample display-none" id="table-sample-b"><img src="{{asset('img/table_b.png')}}"></a>
                    <a class="table-sample display-none" id="table-sample-c"><img src="{{asset('img/table_c.png')}}"></a>
                </div>
                <div style="text-align: center;margin-bottom:15px;">
                    <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">CANCEL &gt;</button>
                    <button type="button" id="add-table-btn" class="btn btn-primary waves-effect waves-light" style="padding: 15px;width: 25%;" onclick="addTable(1)">OK &gt;</button>
                </div>
            </div>
        </div>
    </div>
    {{--Modal Add new LIne--}}
    <div class="modal fade" id="add-new-line-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img style="width:10px;height:10px;" src="{{asset("img/Group1100.png")}}">
                    </button>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <div class="form-check d-inline">
                            <input type="radio" class="form-check-input rdobtn" id="line-r-checked" name="line" checked onclick="showLine(1)">
                            <label class="form-check-label text-blue txtdemibold" for="line-r-checked">Line Right</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check d-inline">
                            <input type="radio" class="form-check-input rdobtn" id="line-b-checked" name="line" onclick="showLine(2)">
                            <label class="form-check-label text-blue txtdemibold" for="line-b-checked">Line Bottom</label>
                        </div>
                    </div>
                </div>
                <div class="modal-line-content">
                    <a class="line-sample" id="line-sample-r"><img src="{{asset('img/line_right.png')}}"></a>
                    <a class="line-sample display-none" id="line-sample-b"><img src="{{asset('img/line_bottom.png')}}"></a>
                </div>
                <div style="text-align: center;margin-bottom:15px;">
                    <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">CANCEL &gt;</button>
                    <button type="button" id="add-line-btn" class="btn btn-primary waves-effect waves-light" style="padding: 15px;width: 25%;" onclick="addLine(1)">OK &gt;</button>
                </div>
            </div>
        </div>
    </div>

    {{--Change room size modal--}}
    <div class="modal fade" id="change-room-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img style="width:10px;height:10px;" src="{{asset("img/Group1100.png")}}">
                    </button>
                </div>
                <div class="text-center room-size" id="room-width-content">
                    <span class="text-info font-weight-bold h3-responsive">Room Width</span>
                    <input id="room-width" class="d-inline black-text font-weight-bold text-center w-25 mr-3 ml-3" placeholder="1" value="0" />
                    <span class="text-info font-weight-bold h3-responsive">PX</span>
                </div>
                <div class="text-center room-size" id="room-height-content">
                    <span class="text-info font-weight-bold h3-responsive">Room Height</span>
                    <input id="room-height" class="d-inline black-text font-weight-bold text-center w-25 mr-3 ml-3" placeholder="1" value="0" />
                    <span class="text-info font-weight-bold h3-responsive">PX</span>
                </div>
                <div style="text-align: center;margin-bottom:15px;">
                    <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">CANCEL &gt;</button>
                    <button type="button" id="save-room-btn" class="btn btn-primary waves-effect waves-light" style="padding: 15px;width: 25%;" >OK &gt;</button>
                </div>
            </div>
        </div>
    </div>
    {{--clone A table--}}
    <div class="table-common display-none" id="clone-1">
        <div class="white table-a-style text-center">
            <h5 class="font-weight-bold blue-text">A-0</h5>
        </div>
    </div>
    {{--clone B table--}}
    <div class="table-common display-none" id="clone-2">
        <div class="chair-b-style chair-top-style"></div>
        <div class="white table-b-style text-center">
            <h5 class="font-weight-bold blue-text">B-0</h5>
        </div>
        <div class="chair-b-style chair-bottom-style"></div>
    </div>
    {{--clone C table--}}
    <div class="table-common display-none" id="clone-3">
        <div class="chair-c-style chair-top-style"></div>
        <div class="chair-top-style"></div>
        <div class="white table-c-style text-center">
            <h5 class="font-weight-bold blue-text">C-0</h5>
        </div>
        <div class="chair-c-style chair-bottom-style"></div>
        <div class="chair-bottom-style"></div>
    </div>
    {{--clone line right--}}
    <div class="table-common display-none" id="clone-line-1">
        <div class="text-center clone-line-style" style="padding-right: 200px;">
        </div>
    </div>
    {{--clone line bottom--}}
    <div class="table-common display-none" id="clone-line-2">
        <div class="text-center clone-line-style" style="padding-bottom: 200px;">
        </div>
    </div>
    <script>
        var tables_arr = <?php echo json_encode($tables); ?>;
        var new_id = <?php echo $new_id; ?>;
        var table_type_arr = ["A", "B", "C", "Line"];
        var selected_arr = "";
        var tmp_selected_arr = "";
        var selected_type = "";
        var selected_index = "";
        $("document").ready(function () {
            $("#add-new-table").click(function() {
                $("#add-new-table-modal").modal('toggle');
            });

            $("#add-new-line").click(function() {
                $("#add-new-line-modal").modal('toggle');
            });
        });

        function showTable(type)
        {
            $(".table-sample").css("display", "none");
            $("#add-table-btn").attr("onclick", "addTable('"+type+"')");
            switch(type){
                case 1:
                    $("#table-sample-a").css("display", "block");
                    break;
                case 2:
                    $("#table-sample-b").css("display", "block");
                    break;
                case 3:
                    $("#table-sample-c").css("display", "block");
                    break;
            }
        }

        function addTable(type)
        {
            var cloneTable = $("#clone-"+type).clone();
            $(cloneTable).css("display", "block");
            var id = new_id;
            new_id ++;
            tables_arr[id] = {'id':id, 'x':0, 'y':0, 'type':type, 'index':0};
            $(cloneTable).attr("onclick", "selectObject('"+id+"', 'table')");
            $(cloneTable).attr("id", "selected-"+id);
            $(".room-div").append(cloneTable);
            selectObject(id, type);
            $("#add-new-table-modal").modal('toggle');
        }

        function showLine(type)
        {
            $(".line-sample").css("display", "none");
            $("#add-line-btn").attr("onclick", "addLine('"+type+"')");
            switch(type){
                case 1://Right
                    $("#line-sample-r").css("display", "block");
                    break;
                case 2://Bottom
                    $("#line-sample-b").css("display", "block");
                    break;
            }
        }

        function addLine(type)
        {
            var cloneLine = $("#clone-line-"+type).clone();
            $(cloneLine).css("display", "block");
            var id = new_id;
            new_id ++;
            tables_arr[id] = {'id':id, 'x':0, 'y':0, 'type':4, 'index':type};
            $(cloneLine).attr("onclick", "selectObject('"+id+"', 'line')");
            $(cloneLine).attr("id", "selected-"+id);
            $(".room-div").append(cloneLine);
            selectObject(id, type);
            $("#add-new-line-modal").modal('toggle');
        }

        function selectObject(index, type)
        {
            selected_arr = new Object(tables_arr[index]);
            var selected_name = "";
            var selected_value_obj = $("#selected-value-content");
            tmp_selected_arr = selected_arr;
            selected_type = type;
            selected_value_obj.css("display", "block");
            selected_index = index;
            $(".table-common").css("z-index",0);
            $(".table-common h5").removeClass("blue-text");
            $(".table-common h5").addClass("grey-text");
            $("#selected-"+selected_index).css("z-index", 1);
            $("#selected-"+selected_index+" h5").removeClass("grey-text");
            $("#selected-"+selected_index+" h5").addClass("blue-text");
            if(type != 4){//"line"
                selected_name = table_type_arr[selected_arr.type-1]+"-"+selected_arr.index;
                $("#selected-value").val(selected_arr.index);
                $("#delete-selected-obj")[0].innerHTML = "DELETE THIS TABLE &gt;";
            }else{
                selected_name = "Line";
                selected_value_obj.css("display", "none");
                $("#delete-selected-obj")[0].innerHTML = "DELETE THIS LINE &gt;";
            }
            $("#selected-name")[0].innerText = selected_name;
            $("#selected-x").val(selected_arr.x);
            $("#selected-y").val(selected_arr.y);
        }

        function changeCoordinate(type, aroma)
        {
            if(tmp_selected_arr == ""){
                alert("Please select the table or line!");
                return;
            }
            if(selected_type != 4){//"line"
                var selected_value = tmp_selected_arr.index;
                var selected_table_type = table_type_arr[tmp_selected_arr.type-1];
            }
            var coordinate_x = tmp_selected_arr.x;
            var coordinate_y = tmp_selected_arr.y;
            var selectedObj = $("#selected-"+selected_index);
            var room_obj = $(".room-content");

            switch (type){
                case "value":
                    if(aroma == "up"){
                        selected_value ++;
                    }else{
                        if(selected_value > 0){
                            selected_value --;
                        }
                    }
                    tmp_selected_arr.index = selected_value;
                    $("#selected-name")[0].innerText = selected_table_type + "-" + selected_value;
                    $("#selected-"+selected_index+" h5")[0].innerText = selected_table_type + "-" + selected_value;
                    $("#selected-value").val(selected_value);
                    break;
                case "coordinate-x":
                    var room_pos_left = room_obj.width() + room_obj[0].scrollLeft;
                        if(aroma == "up"){
                            if($(".room-div").width() > room_pos_left) {
                                coordinate_x++;
                            }

                        }else{
                            if(coordinate_x > 0){
                                coordinate_x --;
                            }
                        }
                        var margin_left = coordinate_x * 20;
                        selectedObj.css("margin-left", margin_left+"px");
                        tmp_selected_arr.x = coordinate_x;
                        $("#selected-x").val(coordinate_x);
                        var selected_pos_left = selectedObj[0].offsetLeft + selectedObj.width();
                        if(aroma == "down" && coordinate_y > 0){
                            if(room_obj[0].scrollLeft > selectedObj[0].offsetLeft){
                                room_obj[0].scrollLeft = room_obj[0].scrollLeft - 20;
                            }
                        }else{
                            if(room_pos_left < selected_pos_left){
                                room_obj[0].scrollLeft = room_obj[0].scrollLeft + 20;
                            }
                        }
                    break;
                case "coordinate-y":
                    var room_pos_top = room_obj.height() + room_obj[0].scrollTop;

                        if(aroma == "up"){
                            if(coordinate_y > 0){
                                coordinate_y --;
                            }
                        }else{
                            if($(".room-div").height() > room_pos_top) {
                                coordinate_y++;
                            }
                        }
                        var margin_top = coordinate_y * 20;
                        selectedObj.css("margin-top", margin_top+"px");
                        tmp_selected_arr.y = coordinate_y;
                        $("#selected-y").val(coordinate_y);

                        var selected_pos_top = selectedObj[0].offsetTop + selectedObj.height();
                        if(aroma == "up" && coordinate_y > 0){
                            if(room_obj[0].scrollTop > selectedObj[0].offsetTop){
                                room_obj[0].scrollTop = room_obj[0].scrollTop - 20;
                            }
                        }else{
                            if(room_pos_top < selected_pos_top){
                                room_obj[0].scrollTop = room_obj[0].scrollTop + 20;
                            }
                        }
                    break;
            }
        }

        function saveChangedTables()
        {
            var form = $("#save-form");
            var saved_arr = JSON.stringify(tables_arr);
            $("#saved-arr").val(saved_arr);
            form.submit();
        }

        $("#selected-value").keyup(function() {
            if(selected_index == ""){
                alert("Please select the table or line!");
                return;
            }
            var selected_value = $("#selected-value").val();
            if(selected_type != 4){//"line"
                var selected_table_type = table_type_arr[tmp_selected_arr.type - 1];
            }
            tmp_selected_arr.index = selected_value;
            $("#selected-name")[0].innerText = selected_table_type+"-"+selected_value;
            $("#selected-"+selected_index+" h5")[0].innerText = selected_table_type+"-"+selected_value;
        });

        $("#selected-x").keyup(function(){
            if(selected_index == ""){
                alert("Please select the table or line!");
                return;
            }
            var coordinate_x = $("#selected-x").val();
            var selectedObj = $("#selected-"+selected_index);
            var room_obj = $(".room-content");
            var margin_left = coordinate_x * 20;
            var room_div_obj = $(".room-div");
            var move_value = margin_left + selectedObj.width();
            if(move_value > room_div_obj.width()){
                margin_left = room_div_obj.width()- selectedObj.width();
                selectedObj.css("margin-left", margin_left+"px");
                room_obj[0].scrollLeft = room_div_obj.width() - room_obj.width();
            }else{
                selectedObj.css("margin-left", margin_left+"px");
                room_obj[0].scrollLeft = selectedObj.width() + margin_left - room_obj.width();
            }
            tmp_selected_arr.x = coordinate_x;
        });

        $("#selected-y").keyup(function(){
            if(selected_index == ""){
                alert("Please select the table or line!");
                return;
            }
            var coordinate_y = $("#selected-y").val();
            var selectedObj = $("#selected-"+selected_index);
            var margin_top = coordinate_y * 20;
            var room_obj = $(".room-content");
            var room_div_obj = $(".room-div");
            var move_value = margin_top + selectedObj.height();
            if(move_value > room_div_obj.height()){
                margin_top = room_div_obj.height()- selectedObj.height();
                selectedObj.css("margin-top", margin_top+"px");
                room_obj[0].scrollTop = room_div_obj.height() - room_obj.height();
            }else{
                selectedObj.css("margin-top", margin_top+"px");
                room_obj[0].scrollTop = selectedObj.height() + margin_top - room_obj.height();
            }
            tmp_selected_arr.y = coordinate_y;
        });

        $("#delete-selected-obj").click(function(){
            if(selected_index == ""){
                alert("Please select the table or line!");
                return;
            }
            var saved_arr = JSON.stringify(tables_arr);
            $("#saved-arr").val(saved_arr);
            $("#selected-id").val(selected_index);
            $("#save-form").submit();
        });

        $("#change-room-size").click(function() {
            var room_obj = $(".room-div");
            $("#room-width").val(room_obj.width());
            $("#room-height").val(room_obj.height());
            $("#change-room-modal").modal("toggle");
        });

        $("#save-room-btn").click(function(){
            var room_obj = $(".room-div");
            room_obj.width($("#room-width").val());
            room_obj.height($("#room-height").val());
            $("#change-room-modal").modal("toggle");
        });

        $("#display-all").click(function(){
            $("#display-method").hide("slow");
            $("#display-name-container").hide("slow");
            var room_content = $(".room-content");
            $("#saved-width").val(room_content.width());
            room_content.width('100%');
            $("#exit-fullscreen").show('slow');
        });

        $("#exit-fullscreen").click(function() {
            $("#display-method").show("slow");
            $("#display-name-container").show("slow");
            $(".room-content").width($("#saved-width").val());
            $("#exit-fullscreen").hide('slow');
        });

        function tableZoomIn(){
            $(".minus_btn").attr("src", "{{ asset('img/minus.png') }}");
            var scale_value_obj = $("#scale-value");
            var scale_value_all = scale_value_obj.text();
            var scale_value = scale_value_all.slice(0, -1);

            if(scale_value != 100){
                $(".plus_btn").attr("src", "{{ asset('img/plus.png') }}");
                scale_value = parseInt(scale_value) + 10;
                if(scale_value == 100){
                    $(".plus_btn").attr("src", "{{ asset('img/plus_full.png') }}");
                }
                $(".room-div").animate({ 'zoom': scale_value*0.01 }, 400);
            }else{
                $(".plus_btn").attr("src", "{{ asset('img/plus_full.png') }}");
            }
            scale_value_obj.text(scale_value+"%");
        }

        function tableZoomOut(){
            $(".plus_btn").attr("src", "{{ asset('img/plus.png') }}");
            var scale_value_obj = $("#scale-value");
            var scale_value_all = scale_value_obj.text();
            var scale_value = scale_value_all.slice(0, -1);

            if(scale_value > 10){
                scale_value = scale_value - 10;
                if(scale_value == 10){
                    $(".minus_btn").attr("src", "{{ asset('img/minus_full.png') }}")
                }
                $(".room-div").animate({ 'zoom': scale_value*0.01 }, 400);
            }else{
                $(".minus_btn").attr("src", "{{ asset('img/minus_full.png') }}")
            }
            scale_value_obj.text(scale_value+"%");

        }
    </script>
@endsection