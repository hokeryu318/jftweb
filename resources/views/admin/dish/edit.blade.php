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
    <div style="padding-top:8%;"></div>
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
                    <input type="text" class="outline-0 border-blue h4rem" name="Name_of_dish" />
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Name of dish (Mandarine)</label>
                    </div>
                    <input type="text" class="outline-0 border-blue h4rem" name="Name_of_dish_Mandarine" />
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Name of dish (Japanese)</label>
                    </div>
                    <input type="text" class="outline-0 border-blue h4rem" name="Name_of_dish_Japanese" />
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Description</label>
                    </div>
                    <input type="text" class="outline-0 border-blue h4rem" name="Description" />
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Description (Mandarine)</label>
                    </div>
                    <input type="text" class="outline-0 border-blue h4rem" name="Description_Mandarine" />
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Description (Japanese)</label>
                    </div>
                    <input type="text" class="outline-0 border-blue h4rem"  name="Description_Japanese" />
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Price</label>
                    </div>
                    <input type="text" class="outline-0 border-blue" name="Price" />
                    <p class="text-right text-blue" >(Included GST: $ 1.13)</p>
                </div>
            </div>
            <div class="col-6">
                <div class="addphoto">
                    <button class="create_addPhotobtn">Add Photo</button>
                </div>
                <button class="create_changePhotobtn">Change Photo</button>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <label class="text-blue txtdemibold">Option</label>
                <div>
                    <select class="border-blue select-width-blue mr-1 option-padding"></select>
                    <button class="btndeletebehind mt-2">Delete</button>
                </div>
                <div class="mt-2">
                    <select class="border-blue select-width-blue mr-1 option-padding"></select>
                    <button class="btndeletebehind ">Delete</button>
                </div>
                <button class="addOptionbtn mt-3 mb-4">Add Option </button>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Category</label>
                    </div>
                    <select type="text" class="outline-0 border-blue w-100 option-padding" name="category" id="mcategory">
                        @foreach ($main_cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name_en }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Sub-Category</label>
                    </div>
                    <select type="text" class="outline-0 border-blue w-100 option-padding" name="sub_category" id="scategory">

                    </select>
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Group</label>
                    </div>
                    <select type="text" class="outline-0 border-blue w-100 option-padding" id="group" name="group">
                        @foreach ($groups as $g)
                            <option value="{{ $g->id }}"> {{ $g->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Badge</label>
                    </div>
                    <select type="text" class="outline-0 border-blue w-100 option-padding" name="badge">
                        @foreach ($badges as $b)
                            <option value="{{ $b->id }}"> {{ $b->name }} </option>
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
                                    <input type="checkbox">
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
                                    <input type="checkbox">
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
                                    <input type="checkbox">
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
                                    <input type="checkbox">
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
                                    <input type="checkbox">
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
                                    <input type="checkbox">
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
                                    <input type="checkbox">
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
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
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
</div>
{{-- <input type="file" id="f">
<img id="i"> --}}
<script>
    /*$('#f').change(function(ev){
        var f = ev.target.files[0];
        var fr = new FileReader();

        fr.onload = function(ev2) {
            console.dir(ev2);
            $('#i').attr('src', ev2.target.result);
        };

        fr.readAsDataURL(f);
    });*/
    $(document).ready(function(){
        console.log($('#mcategory').val());
        $('#mcategory').trigger('change');
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
</script>
@endsection
