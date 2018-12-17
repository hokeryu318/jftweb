@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div class="container-fluid mb-3 pb-3">
<div style="padding-top:9%;" class="pp"></div>

    <div class="widthh white pt-3 pb-1">
	<div class="hhh1" style="overflow-y:auto;height:630px">
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
                <select class="border-blue select-width-blue mr-1 h11rem"></select>
                <button class="btndeletebehind mt-2">Delete</button>
           </div>
                <div class="mt-2">
                    <select class="border-blue select-width-blue mr-1 h11rem"></select>
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
                    <select type="text" class="outline-0 border-blue w-100 h11rem" name="Category"></select>
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Sub-Category</label>
                    </div>
                    <select type="text" class="outline-0 border-blue w-100 h11rem" name="Sub_Category"></select>
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Group</label>
                    </div>
                    <select type="text" class="outline-0 border-blue w-100 h11rem" name="Group"></select>
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-blue txtdemibold">Badge</label>
                    </div>
                    <select type="text" class="outline-0 border-blue w-100 h11rem" name="Badge"></select>
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
                        DELETE &nbsp;&nbsp;
                        <img src="img/Group 728.png" height="20" class="mb-1" />
                    </button>
                </div>
                <div class="col-5 mt-4">
                    <button class="grey-button ml-5">
                        CANCEL &nbsp;&nbsp;
                        <img src="img/Group 728.png" height="20" class="mb-1" />
                    </button>
                    <button class="green-button">
                        Apply &nbsp;&nbsp;
                        <img src="img/Group 728white.png" height="20" class="mb-1" />
                    </button>
                </div>
            </div>
            <!-- Default switch -->
            <!--<label class="bs-switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>-->
        </div>
</div>
@endsection
