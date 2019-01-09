@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<style>
    .option-padding {
        padding-top : 0.6rem;
        padding-bottom : 0.6rem;
    }
</style>
<div class="container-fluid pb-3 blackgrey">
    <form method="POST" action="{{ route('admin.dish.store') }}" enctype='multipart/form-data'>
    <input type="hidden" value="{{ $obj->id }}" name="id">
    <div style="padding-top:8%;">
    </div>
    <div class="widthh white pt-3 pb-1 position-relative">
        <div class="row">
            <div class="col-11">
            </div>
            <div class="col-1">
                <a>
                    <span class="">
                        <img src="{{ asset('img/Group1100.png') }}" height="20" class="float-right" width="20" />
                    </span>
                </a>
            </div>
        </div>
    <div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Name of dish</label>
                </div>
                <input type="text" class="outline-0 border-blue h4rem" name="name_en" value="{{ $obj->name_en }}" />
            </div>
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Name of dish (Mandarine)</label>
                </div>
                <input type="text" class="outline-0 border-blue h4rem" name="name_cn" value="{{ $obj->name_cn }}" />
            </div>
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Name of dish (Japanese)</label>
                </div>
                <input type="text" class="outline-0 border-blue h4rem" name="name_jp" value="{{ $obj->name_jp }}" />
            </div>
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Description</label>
                </div>
                <input type="text" class="outline-0 border-blue h4rem" name="desc_en" value="{{ $obj->desc_en }}" />
            </div>
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Description (Mandarine)</label>
                </div>
                <input type="text" class="outline-0 border-blue h4rem" name="desc_cn" value="{{ $obj->desc_cn }}" />
            </div>
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Description (Japanese)</label>
                </div>
                <input type="text" class="outline-0 border-blue h4rem"  name="desc_jp" value="{{ $obj->desc_jp }}" />
            </div>
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Price</label>
                </div>
                <input type="number" class="outline-0 border-blue" name="price" step="0.01" value="{{ $obj->price }}" />
                <p class="text-right text-blue" >(Included GST: $ 1.13)</p>
            </div>
        </div>
        <div class="col-6">
            <div class="addphoto">
                <button class="create_addPhotobtn" type="button" id="btn_add_image" onclick="setPhoto()"
                @if($obj->image != null)
                    style="display:none"
                @endif
                >Add Photo</button>
                <img id="main_img" width="100%" height="100%"
                @if($obj->image != null)
                    src="{{ asset('dishes/'.$obj->image) }}"
                @endif
                >
                <input type="file" id="image_file" name="image" style="display:none">
            </div>
            <button class="create_changePhotobtn" type="button" id="btn_change_image" onclick="setPhoto()"
                @if($obj->image == null)
                    style="display:none"
                @endif
            >Change Photo</button>
        </div>
    </div>
    <div class="row">
        <div class="col-7" id="content">
            <label class="text-blue txtdemibold">Option</label>
            @foreach ($obj->options as $opt)
                <div class="mt-2 option-element">
                    <select class="border-blue select-width-blue mr-1 option-padding option-select" name="opts[]">
                        @foreach ($options as $o)
                            <option value="{{ $o->id }}"
                            @if($opt->id == $o->id)
                                selected
                            @endif
                            >{{ $o->name }}</option>
                        @endforeach
                    </select>
                    <button class="btndeletebehind mt-2" type="button" onclick="onDeleteOption(this)">Delete</button>
                </div>
            @endforeach
        </div>
    </div>
    <button class="addOptionbtn mt-3 mb-4" type="button" onclick="onAddOption()">Add Option </button>
    <div class="mt-2 option-element" style="display:none" id="clone">
        <select class="border-blue select-width-blue mr-1 option-padding option-select" name="option">
            @foreach ($options as $o)
                <option value="{{ $o->id }}">{{ $o->name }}</option>
            @endforeach
        </select>
        <button class="btndeletebehind mt-2" type="button" onclick="onDeleteOption(this)">Delete</button>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Category</label>
                </div>
                <select type="text" class="outline-0 border-blue w-100 option-padding" name="category_id" id="mcategory">
                    <option value="0">--Select Category--</option>
                    @foreach ($main_cats as $cat)
                        <option value="{{ $cat->id }}"
                        @if($cat->id == $obj->category_id)
                            selected
                        @endif
                        >{{ $cat->name_en }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Sub-Category</label>
                </div>
                <select type="text" class="outline-0 border-blue w-100 option-padding" name="sub_category_id" id="scategory">
                    <option value="0">--Select Sub-Category--</option>
                    @if($obj->id != null)
                    @foreach ($sub_cats as $subcat)
                        <option value="{{ $subcat->id }}"
                        @if($subcat->id == $obj->sub_category_id)
                            selected
                        @endif
                        >{{ $subcat->name_en }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Group</label>
                </div>
                <select type="text" class="outline-0 border-blue w-100 option-padding" id="group" name="group_id">
                    @foreach ($groups as $g)
                        <option value="{{ $g->id }}"
                        @if($g->id == $obj->group_id)
                            selected
                        @endif
                        > {{ $g->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div>
                    <label class="text-blue txtdemibold">Badge</label>
                </div>
                <select type="text" class="outline-0 border-blue w-100 option-padding" name="badge_id">
                    <option value="0">--Select Badge--</option>
                    @foreach ($badges as $b)
                        <option value="{{ $b->id }}"
                        @if($b->id == $obj->badge_id)
                            selected
                        @endif
                        > {{ $b->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-6">
            <label class="text-blue txtdemibold ">Eat-in</label>
            <div class="border-bottom-blue">
                <div class="row">
                    <div class="col-8"><label class="txtdemibold mt-2">Breakfast</label></div>
                    <div class="col-4">
                        <div class="float-right mt-2">
                            <label class="bs-switch ">
                                <input type="checkbox" name="eatin_breakfast"
                                @if($obj->eatin_breakfast == 1)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom-blue">
                <div class="row">
                    <div class="col-8"><label class="txtdemibold mt-2">Lunch</label></div>
                    <div class="col-4">
                        <div class="float-right mt-2">
                            <label class="bs-switch ">
                                <input type="checkbox" name="eatin_lunch"
                                @if($obj->eatin_lunch == 1)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="border-bottom-blue">
                <div class="row">
                    <div class="col-8"><label class="txtdemibold mt-2">Tea</label></div>
                    <div class="col-4">
                        <div class="float-right mt-2">
                            <label class="bs-switch ">
                                <input type="checkbox" name="eatin_tea"
                                @if($obj->eatin_tea == 1)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-bottom-blue">
                <div class="row">
                    <div class="col-8"><label class="txtdemibold mt-2">Dinner</label></div>
                    <div class="col-4">
                        <div class="float-right mt-2">
                            <label class="bs-switch ">
                                <input type="checkbox" name="eatin_dinner"
                                @if($obj->eatin_dinner == 1)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <label class="text-blue txtdemibold">Takeaway</label>
            <div class="border-bottom-blue">
                <div class="row">
                    <div class="col-8"><label class="txtdemibold mt-2">Breakfast</label></div>
                    <div class="col-4">
                        <div class="float-right mt-2">
                            <label class="bs-switch ">
                                <input type="checkbox" name="takeaway_breakfast"
                                @if($obj->takeaway_breakfast == 1)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom-blue">
                <div class="row">
                    <div class="col-8"><label class="txtdemibold mt-2">Lunch</label></div>
                    <div class="col-4">
                        <div class="float-right mt-2">
                            <label class="bs-switch ">
                                <input type="checkbox" name="takeaway_lunch"
                                @if($obj->takeaway_lunch == 1)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom-blue">
                <div class="row">
                    <div class="col-8"><label class="txtdemibold mt-2">Tea</label></div>
                    <div class="col-4">
                        <div class="float-right mt-2">
                            <label class="bs-switch ">
                                <input type="checkbox" name="takeaway_tea"
                                @if($obj->takeaway_tea == 1)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-bottom-blue">
                <div class="row">
                    <div class="col-8"><label class="txtdemibold mt-2">Dinner</label></div>
                    <div class="col-4">
                        <div class="float-right mt-2">
                            <label class="bs-switch ">
                                <input type="checkbox" name="takeaway_dinner"
                                @if($obj->takeaway_dinner == 1)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-7 mt-4">
            <button class="grey-button">
                DELETE
                <img src="{{ asset('img/Group728.png') }}" height="20" class="mb-1" />
            </button>
        </div>
        <div class="col-5 mt-4">
            <button class="grey-button ml-5">
                CANCEL
                <img src="{{ asset('img/Group728.png') }}" height="20" class="mb-1" />
            </button>
            <button class="green-button">
                Apply
                <img src="{{ asset('img/Group728white.png') }}" height="20" class="mb-1" />
            </button>
        </div>
    </div>
    @csrf
    </form>
</div>
<script>
    $(document).ready(function(){
        console.log($('#mcategory').val());
        @if($obj->id == null)
            $('#mcategory').trigger('change');
        @endif
    });
    $('#mcategory').change(function(){
        var main = $(this).val();
        $.ajax({
            type:"POST",
            url:"{{ route('admin.category.subs') }}",
            data:{
                parent:main,
                _token:"{{ csrf_token() }}"
            },
            success: function(result){
                $('#scategory').html(result);
            }
        });
    });
    function setPhoto()
    {
        $('#image_file').trigger('click');
    }
    $('#image_file').change(function(ev){
        var f = ev.target.files[0];
        var fr = new FileReader();
        var img = $('#main_img');
        fr.onload = function(ev2) {
            $(img).attr('src', ev2.target.result);
            $(img).show();
            $('#btn_add_image').hide();
            $('#btn_change_image').show();
        };

        fr.readAsDataURL(f);
    });
    function onAddOption()
    {
        var div = $('#clone').clone();
        $('.option-select', div).attr('name', 'opts[]');
        $(div).show();
        $('#content').append(div);
    }
    function onDeleteOption(obj)
    {
        var parent = $(obj).closest('.option-element');
        $(parent).remove();
    }
</script>
@endsection
