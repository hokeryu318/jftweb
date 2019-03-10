@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<style>
    .category-div{
        height:48vh;
        overflow-y:auto;
        overflow-x:hidden;
        width:95%;
        margin:0 auto;
    }
    .align-center {
        text-align: center;
    }
</style>
<div class="">
    <div style="padding-top:8%;" class="pttbook"></div>

    <div class="widthh pb-1 hh black2 position-relative">
        <a href="{{route('admin.home')}}" class="bg-transparent" style="position:absolute;top:15px ;right:10px"><h2><span class="">
            <img src="{{ asset('img/Group826.png') }}" height="20" class="float-right" width="20" />
        </span></h2></a>
        <div class="pt-5">
            <div class="row">
                <div class="col-7">
                    <div class="row">
                        <div style="border-right:1px solid grey" class="col-6 pl-0 pr-3">
                            <h5 class="white-text font-weight-bold pl-2" style="width:90%; margin:0 auto">CATEGORY</h5>
                            <h6 class="hspace-category" style="margin:0px"></h6>
                            <div class="category-div" id="category-scroll">
                            @foreach($categories as $cat)
                                @include('part.category_item')
                            @endforeach
                            </div>
                            <div class="col-lg-12 pl-0 pr-0 mt-4 pt-2 align-center">
                                <button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" data-toggle="modal" data-target="#addModal">
                                    <h6 class="mb-0 font-weight-bold">ADD</h6>
                                </button>
                                <button class="btn black radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" id="deleteMainCategory">
                                    <h6 class="mb-0 font-weight-bold">Delete</h6>
                                </button>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pr-4">
                                        <h5 class="text-info font-weight-normal">English</h5>
		                                <input class="form-control pl-3" type="text" name="name_en" id="name_en">
		                                <h5 class="text-info font-weight-normal">Mandarine</h5>
		                                <input class="form-control pl-3" type="text" name="name_cn" id="name_cn">
                                        <h5 class="text-info font-weight-normal">Japanese</h5>
                                        <input class="form-control pl-3" type="text" name="name_jp" id="name_jp">
                                        <input type="hidden" id="parent_id" name="parent_id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">CANCEL &gt;</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="addCategory()">APPLY &gt;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6" style="border-right:1px solid grey">
                            <h5 class="white-text font-weight-bold pl-2" style="width:90%; margin:0 auto">SUB CATEGORY</h5>
                            <h6 class="white-text d-inline pl-2">USE SUB CATEGORY</h6>
                            <label class="switch-style" style="margin-top:8px">
                                <input type="checkbox" id="chk_hassubs">
                                <span class="slider checkbox-round"></span>
                            </label>
                            <br>
                            <div class="category-div pr-5" id="subcategory-scroll">

                            </div>
                            <div class="col-lg-12 pl-0 pr-0 mt-4 pt-2 align-center">
                                <button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" onclick="onSubAdd()">
                                    <h6 class="mb-0 font-weight-bold">ADD</h6>
                                </button>
                                <button class="btn black radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" id="deleteSubCategory">
                                    <h6 class="mb-0 font-weight-bold">Delete</h6>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 pl-2 pr-5" style="width:85%">
                    <h5 class="white-text font-weight-bold pl-2" style="width:90%; margin:0 auto">DISH</h5>
                    <h6 class="hspace-category" style="margin:0px"></h6>
                    <div class="category-div hi pt-div" id="scroll-dish">

                    </div>
                    <div class="col-lg-12 pl-0 pr-0 mt-4 pt-2 align-center">
                        <button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" onclick="onAddDish()">
                            <h6 class="mb-0 font-weight-bold">ADD</h6>
                        </button>
                        <button class="btn black radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" id="deleteDishModal">
                            <h6 class="mb-0 font-weight-bold">Delete</h6>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 mb-3">
                    <div class="d-inline-block text-white font-bold border-blue">
                        <table>
                            <tr>
                                <td class="d-inline-block border-rightBlue p-3 w-60px">
                                    <a class="font-weight-bold text-white" href="{{ route('admin.dish') }}" >DISH</a>
                                </td>
                                <td class="bg-blue2 p-3 d-inline-block border-rightBlue w-60px">
                                    <a class="font-weight-bold text-white" href="{{ route('admin.category') }}">CATEGORY</a>
                                </td>
                                <td class="p-3 d-inline-block border- w-60px border-rightBlue">
                                    <a class="font-weight-bold text-white" href="{{ route('admin.option') }}">OPTION</a>
                                </td>
                                <td class="p-3 d-inline-block border-rightBlue  w-60px">
                                    <a class="font-weight-bold text-white" href="{{ route('admin.discount') }}">DISCOUNT</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
    </div>

</div>
<div class="modal fade" id="dish_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:90% !important;">
        <div class="modal-content" style="height: 500px;overflow:auto;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <input type="hidden" id="tmp_dish_ids">
            <input type="hidden" id="tmp_dish_count">
            <div class="modal-body pr-4">
                <div class="row w-100">
                    <div class="col-12">
                        @foreach($dishes as $dish)
                            <div class="border-bottom-blue">
                                <div class="row">
                                    <div class="col-8"><label class="txtdemibold mt-2">{{$dish->name_en}}</label></div>
                                    <div class="col-4">
                                        <div class="float-right mt-2">
                                            <label class="bs-switch ">
                                                <input type="checkbox" onclick="setDishId(this, '{{$dish->id}}');" class="common_check" id="dish_id_{{$dish->id}}">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal"><h5 class="mb-0 font-weight-bold">CANCEL &gt;</h5></button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="saveCheckedDishes();"><h5 class="mb-0 font-weight-bold">ADD &gt;</h5></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirm_parent_category" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pr-4">
                <p id="confirm_letter" class="text-center"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">Close &gt;</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirm_category_modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pr-4">
                <p id="confirm_remove" class="text-center"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">Cancel &gt;</button>
                <button type="button" class="btn btn-light waves-effect waves-light" id="confirmbtn">OK &gt;</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.hspace-category').height($('.switch-style').outerHeight(true));
    });
    var currentMain = '';
    var currentSub = '';
    var clickedSub = 0;

    function onMain(obj){
        activeCatButton('.cat-button', false);
        var id = $(obj).data('id');
        currentMain = id;
        if($(obj).hasClass('white')){
            activeCatButton(obj, true);
        }
        var hassubs = $(obj).data('hassubs');
        clickedSub = 0;
        //$('#chk_hassubs').prop('checked', hassubs == 1 ? true : false);
        $.ajax({
            type:"POST",
            url:"{{ route('admin.category.subs_list') }}",
            data:{
                category: id,
                _token:"{{ csrf_token() }}"
            },
            success: function(result){
                $('#subcategory-scroll').html(result.subcategory_list);
                $('#scroll-dish').html(result.dishes);
                if(result.subs_count > 0){
                    $('#chk_hassubs').prop('checked', true);
                }
            }
        });
    }
    function onSub(obj){
        clickedSub = 1;
        activeCatButton('.subcat', false);
        var id = $(obj).data('id');
        currentSub = id;
        if($(obj).hasClass('white')){
            activeCatButton(obj, true);
        }
        $.ajax({
            type:"POST",
            url:"{{ route('admin.category.dish_list') }}",
            data:{
                category: id,
                _token:"{{ csrf_token() }}"
            },
            success: function(result){
                $('#scroll-dish').html(result);
            }
        });
    }

    function addCategory()
    {
        var parent_id = $('#parent_id').val();
        $.ajax({
            type:"POST",
            url:"{{ route('admin.category.add') }}",
            data:{
                name_en : $('#name_en').val(),
                name_cn : $('#name_cn').val(),
                name_jp : $('#name_jp').val(),
                parent_id : parent_id,
                _token : "{{ csrf_token() }}"
            },
            success: function(result){
                if(parent_id != ''){
                    $('#subcategory-scroll').append(result);
                } else {
                    $('#category-scroll').append(result);
                }
                $('#name_en').val('');
                $('#name_cn').val('');
                $('#name_jp').val('');
                $('#addModal').modal('hide');
            }
        });
    }
    function onSubAdd(){
        if($('#chk_hassubs').is(':checked') && currentMain != ''){
            $('#parent_id').val(currentMain);
            $('#addModal').modal('toggle');
        }
        if(!$('#chk_hassubs').is(':checked')){
            $("#confirm_letter")[0].innerText = "Please set the SubCategory check button to active.";
            $("#confirm_parent_category").modal('toggle');
        }
        if(currentMain == ""){
            $("#confirm_letter")[0].innerText = "Please select the Category.";
            $("#confirm_parent_category").modal('toggle');
        }
    }
    $("#deleteMainCategory").click(function() {
        if(currentMain != '') {
            $("#confirm_remove")[0].innerText = "Do you want to delete the category?";
            $("#confirmbtn").attr("onclick", "onDeleteMain()");
            $("#confirm_category_modal").modal('toggle');
        }else{
            $("#confirm_letter")[0].innerText = "Please select the Category.";
            $("#confirm_parent_category").modal('toggle');
        }
    });
    $("#deleteSubCategory").click(function() {
        if(currentSub != '') {
            $("#confirm_remove")[0].innerText = currentSub + "Do you want to delete the sub category?";
            $("#confirmbtn").attr("onclick", "onDeleteSub()");
            $("#confirm_category_modal").modal('toggle');
        }else{
            $("#confirm_letter")[0].innerText = "Please select the sub category.";
            $("#confirm_parent_category").modal('toggle');
        }
    });
    $("#deleteDishModal").click(function() {
        if(current_dish != '') {
            $("#confirm_remove")[0].innerText = "Do you want to delete the dish?";
            $("#confirmbtn").attr("onclick", "onDeleteDish()");
            $("#confirm_category_modal").modal('toggle');
        }else{
            $("#confirm_letter")[0].innerText = "Please select the dish.";
            $("#confirm_parent_category").modal('toggle');
        }
    });


    function onDeleteMain(){
        if(currentMain != ''){
            $.ajax({
                type:"GET",
                url:"{{ url('admin/category/delete') }}" + "/" + currentMain,
                success: function(){
                    $("[data-id='" + currentMain + "']").remove();
                    $("[data-parent='" + currentMain + "']").remove();
                    $('#scroll-dish').html('');
                    $("#confirm_category_modal").modal('hide');
                }
            });
        }
    }

    function onDeleteSub(){
        if(currentSub != ''){
            $.ajax({
                type:"GET",
                url:"{{ url('admin/category/delete') }}" + "/" + currentSub,
                success: function(){
                    $("[data-id='" + currentSub + "']").remove();
                    $('#scroll-dish').html('');
                    $("#confirm_category_modal").modal('hide');
                }
            });
        }
    }

    function activeCatButton(obj, selected){
        if(selected){
            $(obj).removeClass('white');
            $(obj).addClass('grey');
            $('.cat-caption', obj).removeClass('black-text');
        } else {
            $(obj).addClass('white');
            $(obj).removeClass('grey');
            $('.cat-caption', obj).addClass('black-text');
        }
    }

    var current_dish = '';
    function onDish(obj){
        current_dish = $(obj).data('dish');
        activeCatButton('.category-dish', false);
        if($(obj).hasClass('white')){
            activeCatButton(obj, true);
        }
    }
    function onAddDish()
    {
        if(currentMain == ""){
            $("#confirm_letter")[0].innerText = "Please select the category.";
            $("#confirm_parent_category").modal('toggle');
        }else{
            if($('#chk_hassubs').is(':checked') == true && clickedSub == 0){
                $("#confirm_letter")[0].innerText = "Please select the category.";
                $("#confirm_parent_category").modal('toggle');
                return;
            }
            var dish_ids = $("#dish_ids").val();
            var dish_count = $("#dish_count").val();
            var tmp_dish_ids = $("#tmp_dish_ids").val(dish_ids);
            var tmp_dish_count = $("#tmp_dish_count").val(dish_count);
            $(".common_check").each(function(e){
                $(".common_check")[e].checked = false;
            });
            if(dish_ids != '' && dish_count > 0){
                var dish_id_arr = dish_ids.split(',');
                for(var i = 0; i < dish_id_arr.length; i ++){
                    $("#dish_id_"+dish_id_arr[i])[0].checked = true;
                }
            }
            if(dish_count == 1){
                $("#dish_id_"+dish_ids)[0].checked = true;
            }
            $('#dish_add_modal').modal('toggle');
        }
    }


    function setDishId(obj, dish_id)
    {
        var tmp_dish_ids = $("#tmp_dish_ids").val();
        var tmp_dish_count = $("#tmp_dish_count").val();
        if(obj.checked == true){
            if(tmp_dish_ids != ''){
                tmp_dish_ids += ',' + dish_id;
            }else{
                tmp_dish_ids = dish_id;
            }
            $("#tmp_dish_ids").val(tmp_dish_ids);
            tmp_dish_count ++;
            $("#tmp_dish_count").val(tmp_dish_count);
        }else{
            var save_dish_ids = '';
            if(tmp_dish_count > 1){
                var dish_id_arr = tmp_dish_ids.split(',');
                for(var i = 0; i < dish_id_arr.length; i ++){
                    if(dish_id != dish_id_arr[i]){
                        if(save_dish_ids == ''){
                            save_dish_ids = dish_id_arr[i];
                        }else{
                            save_dish_ids += ',' + dish_id_arr[i];
                        }
                    }
                }
                $("#tmp_dish_ids").val(save_dish_ids);
            }else  if(tmp_dish_count == 1){
                $("#tmp_dish_ids").val('');
            }
            tmp_dish_count --;
            $("#tmp_dish_count").val(tmp_dish_count);
        }
        //$('#dish_add_modal').modal('hide');
    }

    function saveCheckedDishes()
    {
        var tmp_dish_ids = $("#tmp_dish_ids").val();
        var tmp_dish_count = $("#tmp_dish_count").val();
        $("#dish_ids").val(tmp_dish_ids);
        $("#dish_count").val(tmp_dish_count);
        $.ajax({
            type:"GET",
            url:"{{ url('admin/category/dish_add') }}",
            data: {'dish_ids': tmp_dish_ids, 'subcategory_id':currentSub},
            success: function(result){
                if(result){
                    $.ajax({
                        type:"POST",
                        url:"{{ route('admin.category.dish_list') }}",
                        data:{
                            category: currentSub,
                            _token:"{{ csrf_token() }}"
                        },
                        success: function(result){
                            $('#scroll-dish').html(result);
                        }
                    });
                    $('#dish_add_modal').modal('hide');
                }
            }
        });

    }

    function onDeleteDish()
    {
        if(current_dish != ''){
            $.ajax({
                type:"GET",
                url:"{{ url('admin/category/dish_delete') }}" + "/" + current_dish,
                success: function(result){
                    if(result){
                        $("[data-dish='" + current_dish + "']").remove();
                        $("#confirm_category_modal").modal('hide');
                    }
                }
            });
        }
    }

</script>
@endsection
