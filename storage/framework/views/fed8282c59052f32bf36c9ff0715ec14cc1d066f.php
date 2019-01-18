<?php $__env->startSection('title', 'DISH'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding-top:8%;">
</div>
<div class="widthh blackgrey  pt-4">
    <div class="row">
        <div class="col-6">
            <label class="text-white fontbig font-weight-bold">OPTIONS</label>
        </div>
        <div class="col-6">
            <a>
                <span class="">
                    <img src="<?php echo e(asset('img/Group826.png')); ?>" height="20" class="float-right" width="20" />
                </span>
            </a>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12 chh2" style="height: 65vh;overflow-y: auto;">
            <table class="table text-white txtdemibold">
                <thead>
                    <tr>
                        <th class="border-0 fs-3 fontbig" scope="col">NAME
                            <img src="<?php echo e(asset('img/Path444.png')); ?>" height="20"/>
                        </th>
                        <th class="border-0 fs-3 fontbig" scope="col">DISPLAY NAME
                            <img src="<?php echo e(asset('img/Path444.png')); ?>" height="20" />
                        </th>
                        <th class="border-0 fs-3 fontbig" scope="col">RELATED DISHES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr onclick="onrow(<?php echo e($option->id); ?>)">
                        <td><?php echo e($option->name); ?></td>
                        <td><?php echo e($option->display_name_en); ?></td>
                        <td></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-12 mb-3">
            <div class="d-inline-block text-white font-bold border-blue ">
                <table>
                    <tr>
                        <td class="d-inline-block border-rightBlue p-3 w-60px">
                            <a class="font-weight-bold text-white" href="<?php echo e(route('admin.dish')); ?>" >DISH</a>
                        </td>
                        <td class="p-3 d-inline-block border-rightBlue w-60px">
                            <a class="font-weight-bold text-white" href="<?php echo e(route('admin.category')); ?>">CATEGORY</a>
                        </td>
                        <td class="bg-blue2 p-3 d-inline-block border- w-60px border-rightBlue">
                            <a class="font-weight-bold text-white" href="<?php echo e(route('admin.option')); ?>">OPTION</a>
                        </td>
                        <td class="p-3 d-inline-block border-rightBlue  w-60px">
                            <a class="font-weight-bold text-white" href="#">DISCOUNT</a>
                        </td>
                    </tr>
                </table>
            </div>
            <a href="<?php echo e(route('admin.option.add')); ?>" class="text-white  btnCreateNewDiscount">
                CREATE NEW OPTION
                <img src="<?php echo e(asset('img/Group728white.png')); ?>" height="20" />
            </a>
        </div>
    </div>
    <!-- Default switch -->
    <!--<label class="bs-switch">
        <input type="checkbox">
        <span class="slider round"></span>
    </label>-->
</div>
<script>
    function onrow(id){
        window.location = "<?php echo e(url('admin/option/edit')); ?>" + "/" + id;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>