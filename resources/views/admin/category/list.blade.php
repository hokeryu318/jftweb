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
        <a href="#" class="bg-transparent" style="position:absolute;top:15px ;right:10px"><h2><span class="">
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
                                <button class="btn black radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" onclick="onDeleteMain()">
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
                            <label class="switch" style="margin-top:8px">
                                <input type="checkbox" id="chk_hassubs">
                                <span class="slider round"></span>
                            </label>
                            <br>
                            <div class="category-div" class="pr-5" id="subcategory-scroll">

                            </div>
                            <div class="col-lg-12 pl-0 pr-0 mt-4 pt-2 align-center">
                                <button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" onclick="onSubAdd()">
                                    <h6 class="mb-0 font-weight-bold">ADD</h6>
                                </button>
                                <button class="btn black radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" onclick="onDeleteSub()">
                                    <h6 class="mb-0 font-weight-bold">Delete</h6>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 pl-2 pr-5" style="width:85%">
                    <h5 class="white-text font-weight-bold pl-2" style="width:90%; margin:0 auto">DISH</h5>
                    <h6 class="hspace-category" style="margin:0px"></h6>
                    <div class="category-div" id="scroll-dish" class="hi pt-div">

                    </div>
                    <div class="col-lg-12 pl-0 pr-0 mt-4 pt-2 align-center">
                        <button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" onclick="onAddDish()">
                            <h6 class="mb-0 font-weight-bold">ADD</h6>
                        </button>
                        <button class="btn black radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" onclick="onDeleteDish()">
                            <h6 class="mb-0 font-weight-bold">Delete</h6>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 mb-3">
                    <div class="d-inline-block text-white font-bold border-blue">
                        <a class="text-white d-inline-block border-rightBlue p-3 w-60px" href="{{ route('admin.dish') }}" >DISH</a>
                        <a class="bg-blue2 text-white p-3 d-inline-block border-rightBlue w-60px" href="{{ route('admin.category') }}">CATEGORY</a>
                        <a class="text-white p-3 d-inline-block border- w-60px border-rightBlue" href="{{ route('admin.option') }}">OPTION</a>
                        <a class="text-white p-3 d-inline-block border-rightBlue  w-60px" href="#">DISCOUNT</a>
                    </div>
                    <a href="{{ route('admin.dish.add') }}" class="text-white  btnCreateNewDiscount">
                        CREATE NEW DISH
                        <img src="{{ asset('img/Group728white.png') }}" height="20" />
                    </a>
                </div>
            </div>
    </div>

</div>
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:90% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pr-4">
                <div class="row w-100">
	                <div class="col-5">
	                    <div style="border:2px solid lightgrey;height:427px !important;overflow-y:scroll" class="p-2">
	                        <a href="#" class="black-text font-weight-bold" id="beer"><span class="fa fa-chevron-right grey-text"></span> Beer / Sake</a>
	                        <ul style="list-style-type:square" id="beeritem" class="font-weight-bold">
	                            <li>item</li>
	                            <li>item</li>
	                        </ul>
	                        <a href="#" class="black-text d-block mt-1 font-weight-bold" id="wine"><span class="fa fa-chevron-right grey-text"></span> Wine / Soft Drinks</a>
	                        <ul style="list-style-type:square" id="wineitem" class="font-weight-bold">
                                <li>item</li>
                                <li>item</li>
	                        </ul>
	                        <a href="#" class="black-text font-weight-bold d-block mt-1" id="SPECIALS"><span class="fa fa-chevron-right grey-text"></span> SPECIALS!!</a>
                            <ul style="list-style-type:square" id="SPECIALSitem" class="font-weight-bold">
                                <li>item</li>
                                <li>item</li>
                            </ul>
                            <a href="#" class="black-text font-weight-bold d-block mt-1" id="Summer"><span class="fa fa-chevron-right grey-text"></span> Summer Specials</a>
                            <ul style="list-style-type:square" id="Summeritem"  class="font-weight-bold">
                                <li>item</li>
                                <li>item</li>
                            </ul>
                            <a href="#" class="black-text font-weight-bold d-block mt-1" id="Nibbles"><span class="fa fa-chevron-right grey-text"></span> Nibbles / Salad</a>
                            <ul style="list-style-type:square" id="Nibblesitem" class="font-weight-bold">
                                <li>item</li>
                                <li>item</li>
                            </ul>
                            <a href="#" class="black-text font-weight-bold d-block mt-1" id="Dish"><span class="fa fa-chevron-right grey-text"></span> Main Dish</a>
                            <ul style="list-style-type:square" id="Dishitem"  class="font-weight-bold">
                                <li>Grilled</li>
                                <li>Deep-fried</li>
                                <li>Seafood</li>
                                <li>Tempuramp</li>
                            </ul>
                            <a href="#" class="black-text font-weight-bold d-block mt-1" id="hot"><span class="fa fa-chevron-right grey-text"></span> Hot Pot</a>
                            <ul style="list-style-type:square" class="font-weight-bold" id="hotitem">
                                <li>item</li>
                                <li>item</li>
                            </ul>
                            <a href="#" class="black-text font-weight-bold pl-3 d-block mt-1">Rice Dish</a>
                            <a href="#" class="black-text font-weight-bold pl-3 d-block mt-1">Dessert</a>
	                    </div>
	                </div>
	                <div class="col-7">
	                    <div style="border:2px solid lightgrey;height:427px !important;overflow-y:scroll" class="p-2">
                            <a href="#" class="black-text font-weight-bold" id="chicken"><span class="fa fa-chevron-right grey-text"></span> Chicken Kastsu (Schnitzel) +</a>
                            <ul style="list-style-type:none" id="chickenitem" class="font-weight-bold">
                                <li>  Jabanese BBQ Sauce +</li>
                                <li>  Daikon Oroshi</li>
                                <li><a href="#" id="sauce"><span class="fa fa-chevron-right grey-text"></span> Sauce</a>
                                    <ul style="list-style-type:square" id="sauceitem" class="font-weight-bold">
                                        <li>BBQ</li>
                                        <li>Tamari Sauce</li>
                                        <li>Gomadare</li>
                                        <li>Ponzu</li>
                                        <li>Kanzuri (-$0.20)</li>
                                    </ul>
                                </li>
                                <li><a href="#"  id="top"><span class="fa fa-chevron-right grey-text"></span> Topping	</a>
                                    <ul style="list-style-type:square" id="topitem" class="font-weight-bold">
                                        <li>Daikon Oroshi</li>
                                        <li>Omiji Oroshi</li>
                                        <li>Gomadare</li>
                                        <li>Non</li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="#" class="black-text d-block mt-1 font-weight-bold" id="tuna"><span class="fa fa-chevron-right grey-text"></span> Tuna & Avocado Roll Sushi</a>
                            <ul style="list-style-type:none" id="tunaitem" class="font-weight-bold">
                                <li>item1</li>
                                <li>item2</li>
                            </ul>
                            <a href="#" class="black-text font-weight-bold pl-3 d-block mt-1" id="wine">Uramaki 10pc</a>
                            <a href="#" class="black-text font-weight-bold pl-3 d-block mt-1">Salmon & Avodcado Roll Sushi<br>    with Ikura 6pc</a>
                        </div>
	                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal"><h5 class="mb-0 font-weight-bold">CANCEL &gt;</h4></button>
                <button type="button" class="btn btn-primary waves-effect waves-light"><h5 class="mb-0 font-weight-bold">ADD &gt;</h4></button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.hspace-category').height($('.switch').outerHeight(true));
    });
    var currentMain = '';
    var currentSub = '';

    function onMain(obj){
        activeCatButton('.cat-button', false);
        var id = $(obj).data('id');
        currentMain = id;
        if($(obj).hasClass('white')){
            activeCatButton(obj, true);
        }
        var hassubs = $(obj).data('hassubs');
        $('#chk_hassubs').prop('checked', hassubs == 1 ? true : false);
        $.ajax({
            type:"POST",
            url:"{{ route('admin.category.subs_list') }}",
            data:{
                parent: id,
                _token:"{{ csrf_token() }}"
            },
            success: function(result){
                $('#subcategory-scroll').html(result);
            }
        });
    }
    function onSub(obj){
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
    }

    function onDeleteMain(){
        if(currentMain != ''){
            $.ajax({
                type:"GET",
                url:"{{ url('admin/category/delete') }}" + "/" + currentMain,
                success: function(){
                    $("[data-id='" + currentMain + "']").remove();
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
        $('#exampleModalCenter2').modal('toggle');
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
                    }
                }
            });
        }
    }

</script>
@endsection
