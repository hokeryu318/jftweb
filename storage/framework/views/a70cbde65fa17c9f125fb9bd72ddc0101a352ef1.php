<?php $__env->startSection('title', 'DISH'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .option-padding {
            padding-top : 0.6rem;
            padding-bottom : 0.6rem;
        }
    </style>
    <div class="container-fluid pb-3 blackgrey">
        <form method="POST" action="<?php echo e(route('admin.dish.store')); ?>" enctype='multipart/form-data'>
            <input type="hidden" value="<?php echo e($obj->id); ?>" name="id">
            <input type="hidden" name="category_id" id="checked_ids" value="<?php echo e(isset($dish_cats_ids) ? $dish_cats_ids : ""); ?>">
            <div style="padding-top:8%;">
            </div>
            <div class="widthh pt-3 pb-3 mb-3 white">
                <div class="row">
                    <div class="col-11">
                    </div>
                    <div class="col-1">
                        <a href="
                        <?php if(isset($obj->id)): ?>
                            <?php echo e(route('admin.dish.preview',["id"=>$obj->id])); ?>

                        <?php else: ?>
                            <?php echo e(route('admin.dish')); ?>

                        <?php endif; ?>">
                            <span class="">
                                <img src="<?php echo e(asset('img/Group1100.png')); ?>" height="20" class="float-right" width="20" />
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
                                <input type="text" class="outline-0 border-blue h4rem" name="name_en" value="<?php echo e($obj->name_en); ?>" />
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="text-blue txtdemibold">Name of dish (Mandarine)</label>
                                </div>
                                <input type="text" class="outline-0 border-blue h4rem" name="name_cn" value="<?php echo e($obj->name_cn); ?>" />
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="text-blue txtdemibold">Name of dish (Japanese)</label>
                                </div>
                                <input type="text" class="outline-0 border-blue h4rem" name="name_jp" value="<?php echo e($obj->name_jp); ?>" />
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="text-blue txtdemibold">Description</label>
                                </div>
                                <input type="text" class="outline-0 border-blue h4rem" name="desc_en" value="<?php echo e($obj->desc_en); ?>" />
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="text-blue txtdemibold">Description (Mandarine)</label>
                                </div>
                                <input type="text" class="outline-0 border-blue h4rem" name="desc_cn" value="<?php echo e($obj->desc_cn); ?>" />
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="text-blue txtdemibold">Description (Japanese)</label>
                                </div>
                                <input type="text" class="outline-0 border-blue h4rem"  name="desc_jp" value="<?php echo e($obj->desc_jp); ?>" />
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="text-blue txtdemibold">Price</label>
                                </div>
                                <input type="number" class="outline-0 border-blue" name="price" step="0.01" value="<?php echo e($obj->price); ?>" />
                                <p class="text-right text-blue" >(Included GST: $ 1.13)</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="addphoto">
                                <button class="create_addPhotobtn btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" type="button" id="btn_add_image" onclick="setPhoto()"
                                        <?php if($obj->image != null): ?>
                                        style="display:none"
                                        <?php endif; ?>
                                        >Add Photo</button>
                                <img id="main_img" width="100%" height="100%"
                                     <?php if($obj->image != null): ?>
                                     src="<?php echo e(asset('dishes/'.$obj->image)); ?>"
                                        <?php endif; ?>
                                        >
                                <input type="file" id="image_file" name="image" style="display:none">
                            </div>
                            <button class="create_changePhotobtn" type="button" id="btn_change_image" onclick="setPhoto()"
                                    <?php if($obj->image == null): ?>
                                    style="display:none"
                                    <?php endif; ?>
                                    >Change Photo</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7" id="content">
                            <label class="text-blue txtdemibold">Option</label>
                            <?php $__currentLoopData = $obj->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mt-2 option-element">
                                    <select class="border-blue select-width-blue mr-1 option-padding option-select" name="opts[]">
                                        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($o->id); ?>"
                                                    <?php if($opt->id == $o->id): ?>
                                                    selected
                                                    <?php endif; ?>
                                                    ><?php echo e($o->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <button class="btndeletebehind mt-2" type="button" onclick="onDeleteOption(this)">Delete</button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <button class="addOptionbtn btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" type="button" onclick="onAddOption()">Add Option </button>
                    <div class="mt-2 option-element display-none" id="clone">
                        <select class="border-blue select-width-blue mr-1 option-padding option-select" name="option">
                            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($o->id); ?>"><?php echo e($o->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button class="btndeletebehind mt-2" type="button" onclick="onDeleteOption(this)">Delete</button>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="text-blue txtdemibold">Category</label>
                                    </div>
                                    <div class="col-6">
                                        <label class="text-blue txtdemibold">Sub-Category</label>
                                    </div>
                                </div>
                                <?php $__currentLoopData = $main_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="border-bottom-blue category_contents main_category_<?php echo e($cat->id); ?>"
                                         <?php if(isset($dish_cats)): ?>
                                            <?php if(!in_array($cat->id, $dish_cats)): ?>
                                                style="display: none;"
                                            <?php endif; ?>
                                        <?php else: ?>
                                            style="display: none;"
                                        <?php endif; ?>>
                                        <div class="row">
                                            <div class="col-6" id="category_<?php echo e($cat->id); ?>">
                                                <label class="txtdemibold mt-2"><?php echo e($cat->name_en); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(count($main_cats[$key]->subs) > 0): ?>
                                        <?php $__currentLoopData = $main_cats[$key]->subs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="border-bottom-blue category_contents category_<?php echo e($cat->id); ?>"
                                                 <?php if(isset($dish_cats)): ?>
                                                    <?php if(!in_array($subcat->id, $dish_cats)): ?>
                                                        style="display: none;"
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                 style="display: none;"
                                                <?php endif; ?>
                                                    >
                                                <div class="row">
                                                    <div class="col-6" id="category_<?php echo e($cat->id); ?>">
                                                        <label class="txtdemibold mt-2"><?php echo e($cat->name_en); ?></label>
                                                    </div>
                                                    <div class="col-6" id="category_<?php echo e($subcat->id); ?>">
                                                        <label class="txtdemibold mt-2"><?php echo e($subcat->name_en); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <a class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light" id="edit-category-btn"  data-target="#addModal">
                                <h6 class="mb-0">Edit Category</h6>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div>
                                    <label class="text-blue txtdemibold">Group</label>
                                </div>
                                <select type="text" class="outline-0 border-blue w-100 option-padding" id="group" name="group_id">
                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($g->id); ?>"
                                                <?php if($g->id == $obj->group_id): ?>
                                                selected
                                                <?php endif; ?>
                                                > <?php echo e($g->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="text-blue txtdemibold">Badge</label>
                                </div>
                                <select type="text" class="outline-0 border-blue w-100 option-padding" name="badge_id">
                                    <option value="0">--Select Badge--</option>
                                    <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($b->id); ?>"
                                                <?php if($b->id == $obj->badge_id): ?>
                                                selected
                                                <?php endif; ?>
                                                > <?php echo e($b->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                       <?php if($obj->eatin_breakfast == 1): ?>
                                                       checked
                                                        <?php endif; ?>
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
                                                       <?php if($obj->eatin_lunch == 1): ?>
                                                       checked
                                                        <?php endif; ?>
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
                                                       <?php if($obj->eatin_tea == 1): ?>
                                                       checked
                                                        <?php endif; ?>
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
                                                       <?php if($obj->eatin_dinner == 1): ?>
                                                       checked
                                                        <?php endif; ?>
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
                                                       <?php if($obj->takeaway_breakfast == 1): ?>
                                                       checked
                                                        <?php endif; ?>
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
                                                       <?php if($obj->takeaway_lunch == 1): ?>
                                                       checked
                                                        <?php endif; ?>
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
                                                       <?php if($obj->takeaway_tea == 1): ?>
                                                       checked
                                                        <?php endif; ?>
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
                                                       <?php if($obj->takeaway_dinner == 1): ?>
                                                       checked
                                                        <?php endif; ?>
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
                            <?php if(isset($obj->id)): ?>
                                <a onclick="deleteConfirmModal();" class="grey-button" style="color:black;padding:10px 25px 10px 25px;">
                                    DELETE
                                    <img src="<?php echo e(asset('img/Group728.png')); ?>" height="20" class="mb-1" />
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-5 mt-4">
                            <a <?php if(isset($obj->id)): ?>
                                href="<?php echo e(route('admin.dish.preview', ['id' => $obj->id])); ?>"
                               <?php else: ?>
                                href="<?php echo e(route('admin.dish')); ?>"
                               <?php endif; ?>
                               class="grey-button ml-5" style="color:black;padding: 8px;">
                                CANCEL
                                <img src="<?php echo e(asset('img/Group728.png')); ?>" height="20" class="mb-1" />
                            </a>
                            <button class="green-button" style="padding:5px 25px 8px 25px;margin-top:-7px;">
                                Apply
                                <img src="<?php echo e(asset('img/Group728white.png')); ?>" height="20" class="mb-1" />
                            </button>
                        </div>
                    </div>
            <?php echo csrf_field(); ?>
        </form>
    </div>
    <div class="modal fade" id="editCategoryModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="height: 600px;overflow-x:auto;">
                <div class="modal-header">
                    <button type="button" class="close" onclick="cancelCategory()" aria-label="Close">
                        <img style="width:10px;height:10px;" src="<?php echo e(asset("img/Group1100.png")); ?>">
                    </button>
                </div>
                <div class="modal-body pr-4">
                    <?php $__currentLoopData = $main_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label class="checkbox-container" id="checkbox-label">
                                <input type="checkbox" id="select_all<?php echo e($cat->id); ?>" class="common_checked for_checked<?php echo e($cat->id); ?>" onclick="selectParent(<?php echo e($cat->id); ?>)"/>
                                <span class="checkmark"></span>
                                <?php echo e($cat->name_en); ?>

                            </label>
                            <?php if(count($main_cats[$key]->subs) > 0): ?>
                                <img class="header<?php echo e($cat->id); ?>" style="width:20px;height:20px;margin-top: -7px;" src="<?php echo e(asset("img/Path531.png")); ?>" onclick="showChild(<?php echo e($cat->id); ?>)">
                            <?php endif; ?>
                            <?php $__currentLoopData = $main_cats[$key]->subs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="content<?php echo e($cat->id); ?>" style="padding:5px;margin-left: 20px;">
                                    <label class="checkbox-container">
                                        <input class="checkbox<?php echo e($cat->id); ?> common_checked for_checked<?php echo e($sub_cat->id); ?>" type="checkbox"  onclick="childCheck(<?php echo e($cat->id); ?>, <?php echo e($sub_cat->id); ?>, this)" name="check[]" style="margin-left:50px;">
                                        <?php echo e($sub_cat->name_en); ?>

                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect waves-light" onclick="cancelCategory()">CANCEL &gt;</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="saveCategory()">OK &gt;</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img style="width:10px;height:10px;" src="<?php echo e(asset("img/Group1100.png")); ?>">
                    </button>
                </div>
                <p style="text-align: center;padding: 20px;font-size: 25px;border-bottom:1px solid #e9ecef">Do you want to delete it?</p>
                <div style="text-align: center;margin-bottom:15px;">
                    <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">CANCEL &gt;</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" style="padding: 15px;width: 25%;" onclick="deleteDish()">OK &gt;</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var checkedIds = $("#checked_ids").val();
        var checkedIds_tmp = checkedIds;
        $(document).ready(function(){
            console.log($('#mcategory').val());
            <?php if($obj->id == null): ?>
                $('#mcategory').trigger('change');
            <?php endif; ?>
        });
        $('#mcategory').change(function(){
            var main = $(this).val();
            $.ajax({
                type:"POST",
                url:"<?php echo e(route('admin.category.subs')); ?>",
                data:{
                    parent:main,
                    _token:"<?php echo e(csrf_token()); ?>"
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
            $(div).css("display", "block");
            $('#content').append(div);
        }
        function onDeleteOption(obj)
        {
            var parent = $(obj).closest('.option-element');
            $(parent).remove();
        }
        $("#edit-category-btn").click(function(){
            var checked_ids_arr = '';
            if(checkedIds != ''){
                checked_ids_arr = checkedIds.split(',');
            }
            for(var i = 0; i < checked_ids_arr.length; i ++){
                $(".for_checked"+ checked_ids_arr[i])[0].checked = true;
            }
            $("#editCategoryModal").modal("toggle");
        });

        function saveCategory() {
            checkedIds = checkedIds_tmp;
            $("#checked_ids").val(checkedIds);
            $("#editCategoryModal").modal("hide");
        }
        function cancelCategory() {
            checkedIds_tmp = checkedIds;
            var checked_ids_arr = '';
            if(checkedIds != ''){
                checked_ids_arr = checkedIds.split(',');
            }
            $(".category_contents").css('display', 'none');
            var common_checked = $(".common_checked");
            for(var i = 0; i < common_checked.length; i ++){
                common_checked[i].checked = false;
            }
            for(var i = 0; i < checked_ids_arr.length; i ++){
                $(".main_category_"+checked_ids_arr[i]).css('display', 'block');
                $("#category_"+checked_ids_arr[i]).parent().parent().css('display', 'block');
            }
            $("#editCategoryModal").modal("hide");
        }
        function selectParent(index)
        {
            var checkObj = $(".checkbox"+index);
            var checkedCount = 0;
            for(var i = 0; i < checkObj.length; i ++){
                if(checkObj[i].checked == true){
                    checkedCount ++;
                }
            }
            if(checkedCount > 0){
                $("#select_all"+index)[0].checked = true;
            }
            if($("#select_all"+index)[0].checked == true){
                $(".main_category_"+index).css('display', 'block');
                if(checkedIds_tmp != ''){
                    var count = 0;
                    var common_checked_count = 0;
                    var common_checked_obj = $(".common_checked");
                    for(var i = 0; i < common_checked_obj.length; i ++){
                        if(common_checked_obj[i].checked == true){
                            common_checked_count ++;
                        }
                    }
                    if(common_checked_count > 2){
                        var tmp_ids = checkedIds_tmp.split(',');
                    }else{
                        var tmp_ids = checkedIds_tmp;
                    }
                    for(var i = 0; i < tmp_ids.length; i ++){
                        if(tmp_ids[i] == index){
                            count ++;
                        }
                    }
                    if(count == 0){
                        checkedIds_tmp += ',' + index;
                    }
                }else{
                    checkedIds_tmp = index;
                }
            }else{
                $(".main_category_"+index).css('display', 'none');
                var ids_tmp = '';
                if(checkedIds_tmp != ''){
                    ids_tmp = checkedIds_tmp.split(',');
                }

                checkedIds_tmp = '';
                for(var i = 0; i < ids_tmp.length; i ++){
                    if(ids_tmp[i] != index){
                        if(checkedIds_tmp == ''){
                            checkedIds_tmp = ids_tmp[i];
                        }else{
                            checkedIds_tmp += ','+ids_tmp[i];
                        }
                    }
                }
            }
        }
        function childCheck(category_index, sub_index, obj)
        {
            if(obj.checked == true){
                if($("#select_all"+category_index)[0].checked == false){
                    $("#select_all"+category_index)[0].checked = true;
                    if(checkedIds_tmp == ''){
                        checkedIds_tmp = category_index;
                    }else{
                        checkedIds_tmp += ','+ category_index;
                    }
                }
                if(checkedIds_tmp == ''){
                    checkedIds_tmp = sub_index;
                }else{
                    checkedIds_tmp += ','+ sub_index;
                }
                $(".main_category_"+category_index).css('display', 'block');
                $("#category_"+sub_index).parent().parent().css('display', 'block');
            }else{
                $("#category_"+sub_index).parent().parent().css('display', 'none');
                var ids_tmp = '';
                if(checkedIds_tmp != ''){
                    ids_tmp = checkedIds_tmp.split(',');
                }
                checkedIds_tmp = '';
                for(var i = 0; i < ids_tmp.length; i ++){
                    if(ids_tmp[i] != sub_index){
                        if(checkedIds_tmp == ''){
                            checkedIds_tmp = ids_tmp[i];
                        }else{
                            checkedIds_tmp += ','+ids_tmp[i];
                        }
                    }
                }
            }
        }
        function showChild(index)
        {
            var header_obj = $(".header"+index);
            var content_obj = $(".content"+index);
            content_obj.slideToggle(500, function () {
                header_obj.text(function () {
                    return content_obj.is(":visible") ? header_obj.attr("src", "<?php echo e(asset('img/Path531.png')); ?>") : header_obj.attr("src", "<?php echo e(asset('img/Path506.png')); ?>");
                });
            });
        }

        function deleteConfirmModal()
        {
            $("#deleteModal").modal("toggle");
        }

        function deleteDish()
        {
            location.href ="<?php echo e(route('admin.dish.delete', ['id' => $obj->id])); ?>";
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>