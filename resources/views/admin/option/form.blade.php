@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div class="container-fluid pb-5 blackgrey">
    <div style="padding-top:8%;"></div>

    <div class="popupp" id="popupp"></div>

    <div class="popupchangePhoto white" id="popupchangePhoto">
        <div class="row">
            <div class="col-12">
                <a>
                    <span class="">
                        <img src="{{ asset('img/Group1100.png') }}" height="20" id="btncloselang" class="float-right mr-3 mt-2" width="20" />
                    </span>
                </a>
            </div>
        </div>
        <img id="popupimg" class="popupimg" />
        <input type="file" style="display:none" id="option_image_modal">
        <button class="addOptionbtn mcenter">Change Photo</button>
    </div>

    <div class="widthh pb-2 pt-3 white">
        <div class="row">
            <div class="col-12">
                <a><span class="">
                       <img src="{{ asset('img/Group1100.png') }}" height="18" class="float-right" width="19"/></span></a>
            </div>
        </div>
        <form method="POST" action="{{ route('admin.option.store') }}" enctype='multipart/form-data' id="post_form">
        <input type="hidden" name="id" value="{{ $obj->id }}">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                   <div>
                       <label class="text-blue txtdemibold">Name</label>
                   </div>
                    <input type="text" class="outline-0 border-bottom-blue" name="name" value="{{ $obj->name }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Display Name</label>
                    </div>
                    <input type="text" class="outline-0 border-bottom-blue" name="display_name_en" value="{{ $obj->display_name_en }}" />
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Display Name (Mandarine)</label>
                    </div>
                    <input type="text" class="outline-0 border-bottom-blue" name="display_name_cn" value="{{ $obj->display_name_cn }}" />
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Display Name (Japanese)</label>
                    </div>
                    <input type="text" class="outline-0 border-bottom-blue" name="display_name_jp" value="{{ $obj->display_name_jp }}" />
                </div>
            </div>
        </div>
        <div class="border-bottom-blue3 mt-3 mb-3"></div>

        <div class="row">
            <div class="col-5">
                <div class="row">
                    <div class="col-6">
                        <label class="text-blue txtdemibold mr-2">Multiple Select</label>
                    </div>
                    <div class="col-6">
                        <span>
                            <label class="bs-switch">
                                <input type="checkbox" name="multi_select" id="multi_select"
                                @if($obj->multi_select == 1)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <label class="text-blue txtdemibold m5">Number of Selection</label>
                <img src="{{ asset('img/Path506.png') }}" class="" height="50" width="60" onclick="decNumber()" />
                <input type="number" class="numInput outline-0" name="number_selection" id="number_selection" value="{{ $obj->number_selection }}">
                <img src="{{ asset('img/Path531.png') }}" class="" height="50" width="60" onclick="incNumber()">
            </div>

        </div>
        <div class="border-bottom-blue3 mt-3 mb-3"></div>

        <div class="row">
            <div class="col-5">
                <div class="row">
                    <div class="col-6">
                        <label class="text-blue txtdemibold mr-2">Show Photo</label>
                    </div>
                    <div class="col-6">
                        <span>
                            <label class="bs-switch ">
                                <input type="checkbox" name="photo_visible" id="show_photo"
                                @if($obj->photo_visible == 1)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
            </div>

        <div class="border-bottom-blue3 mt-3 mb-3"></div>

        <div class="row">
            <div class="col-6">
                <label class="text-blue txtdemibold">
                    Option
                </label>
            </div>
            <div class="col-2">
                <label class="text-blue ma35 txtdemibold">
                    Price
                </label>
            </div>
            <div class="col-1">
                <label class="text-blue ma35 txtdemibold">
                    Photo
                </label>
            </div>
            <div class="col-1">
                <label class="text-blue ma35 txtdemibold">
                    Stock
                </label>
            </div>
        </div>

        <div id="content">
        @foreach ($obj->items as $item)
            <div class="row">
                <div class="col-6">
                    <input type="text" class="outline-0 border-bottom-blue mt-2 option-name"
                        name="prev-data[{{ $item->id }}][name]" value="{{ $item->name }}" />
                </div>
                <div class="col-2">
                    <input type="number" class="outline-0 border-bottom-blue mt-2 option-price"
                        name="prev-data[{{ $item->id }}][price]" value="{{ $item->price }}" />
                </div>
                <div class="col-1">
                    <button class="btnaddphoto3  mt-2 pt-1 add-photo-button" onclick="onAddImage(this)" type="button" style="display:none">
                        Add Photo
                    </button>
                    <img class="option-image" width=55 height=55 src="{{ asset('options/'.$item->image) }}">
                </div>
                <div class="col-1">
                    <label class="bs-switch mt-3">
                        <input type="checkbox" class="stock-check-obj"
                        @if($item->stock == 1)
                            checked
                        @endif
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="col-1">
                    <button class="btnaddphoto3  mt-2 pt-1" type="button" onclick="onDelete(this)" data-id={{ $item->id }}>
                        Remove Option
                    </button>
                </div>
                <input type="file" class="file-image" name="prev-data[{{ $item->id }}][file]" style="display:none">
                <input type="hidden" class="stock-check-value"  name="prev-data[{{ $item->id }}][stock]">
                <input type="hidden" class="old-id" name="prev[]" value="{{ $item->id }}">
            </div>
        @endforeach
        </div>

        <div class="row clone" style="display:none">
            <div class="col-6">
                <input type="text" class="outline-0 border-bottom-blue mt-2" name="option-name[]" />
            </div>
            <div class="col-2">
                <input type="number" class="outline-0 border-bottom-blue mt-2" name="option-price[]" />
            </div>
            <div class="col-1">
                <button class="btnaddphoto3  mt-2 pt-1 add-photo-button" onclick="onAddImage(this)" type="button">
                    Add Photo
                </button>
                <img class="option-image" width=55 height=55 style="display:none">
            </div>
            <div class="col-1">
                <label class="bs-switch mt-3">
                    <input type="checkbox" class="stock-check-obj">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="col-1">
                <button class="btnaddphoto3  mt-2 pt-1" type="button" onclick="onDelete(this)" data-id=0>
                    Remove Option
                </button>
            </div>
            <input type="file" class="file-image" name="option-image[]" style="display:none">
            <input type="hidden" class="stock-check-value"  name="option-stock[]">
        </div>

        <button class="btnaddphoto3  mt-2 pt-1" type="button" onclick="onAddOption()">
            Add Option
        </button>
        <div class="row mt-5 mb-3">
            <div class="col-6">
                <button class="grey-button" type="button">DELETE
                    <img src="{{ asset('img/Group728.png') }}" height="20" class="mb-1"/>
                </button>
            </div>
            <div class="col-6">
                <button class="grey-button ml-5" type="button">CANCEL
                    <img src="{{ asset('img/Group728.png') }}" height="20" class="mb-1" />
                </button>
                <button class="green-button" type="button" onclick="onApply()">Apply
                    <img src="{{ asset('img/Group728white.png') }}" height="20" class="mb-1" />
                </button>
            </div>
        </div>
        @csrf
        </form>
    </div>
</div>
<script>
    function onApply(){
        if($('#show_photo').is(':checked')){
            var invalidCt = 0;
            $('.file-image').each(function(i, obj){
                var parent = $(obj).closest('.row');
                var image_tag = $('.option-image', parent);
                if(($(obj).val() == "" && $(image_tag).attr('src') == "") && $(parent).is(':visible')) invalidCt++;
            });
            console.log(invalidCt);
            if(invalidCt > 1){
                alert('Please upload photos');
                return;
            }
        }
        $('.stock-check-obj').each(function(i, obj){
            var parent = $(obj).closest('.row');
            var value = $('.stock-check-value', parent);
            if($(obj).is(':checked')){
                value.val(1);
            } else {
                value.val(0);
            }
        });
        $('#post_form').submit();
    }
    var current_image_obj;
    var current_file_obj;
    //event on each file input
    $(document).on('change', '.file-image', function(ev){
        var f = ev.target.files[0];
        var fr = new FileReader();

        var parent = $(this).closest('.row');
        var img = $('.option-image', parent);
        var button = $('.add-photo-button', parent);

        fr.onload = function(ev2) {
            $(img).attr('src', ev2.target.result);
            $(img).show();
            $(button).hide();
        };

        fr.readAsDataURL(f);
    });
    //click add image button image in row
    $(document).on('click', '.option-image', function(){
        $('#popupimg').attr('src', $(this).attr('src'));
        $('#popupchangePhoto').show();
        $("#popupchangePhoto").animate({ "opacity": '1' }, "slow");
        $('#popupp').show();
        $("#popupp").animate({ "opacity": '1' }, "slow");

        current_file_obj = $('file-image', $(this).closest('row'));
        current_image_obj = $(this);
    });
    //close image modal
    $('#btncloselang').click(function(){
        $("#popupchangePhoto").animate({ "opacity": '0' }, "slow", function () {
            $("#popupchangePhoto").hide();
        });
        $("#popupp").animate({ "opacity": '0' }, "slow", function () {
            $("#popupp").hide();
        });
        current_file_obj.val($('#option_image_modal').val());
        current_image_obj.attr('src', $('#popupimg').attr('src'));
    });
    //on add image button
    function onAddImage(obj)
    {
        var parent = $(obj).closest('.row');
        $('.file-image', parent).trigger('click');
    }
    //add image button on modal
    $('.addOptionbtn').click(function(){
        $('#option_image_modal').trigger('click');
    });
    //event on modal file input
    $('#option_image_modal').change(function(ev){
        var f = ev.target.files[0];
        var fr = new FileReader();
        var img = $('#popupimg');
        fr.onload = function(ev2) {
            $(img).attr('src', ev2.target.result);
            $(img).show();
        };

        fr.readAsDataURL(f);
    });

    function onAddOption()
    {
        var div = $('.clone').clone();
        $(div).show();
        $(div).removeClass('clone');
        $('#content').append(div);
    }

    function onDelete(obj)
    {
        var parent = $(obj).closest('.row');
        var id = $(obj).data('id');
        if(id == 0){
            parent.remove();
        }
        else {
            parent.hide();
            $('.old-id', parent).attr('name', 'deleted[]');
        }
    }

    function incNumber()
    {
        var cur_val = Number($('#number_selection').val());
        $('#number_selection').val(cur_val + 1);
    }

    function decNumber()
    {
        var cur_val = Number($('#number_selection').val());
        if(cur_val > 1)
            $('#number_selection').val(cur_val - 1);
    }
</script>
@endsection
