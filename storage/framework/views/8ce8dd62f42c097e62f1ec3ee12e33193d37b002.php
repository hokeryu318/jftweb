<?php $__env->startSection('title', 'DISH'); ?>

<?php $__env->startSection('content'); ?>
<div class="blackgrey pb-5">
<div style="padding-top:8.5%;">
</div>
    <div class="widthh bg-lightgrey pl-5 pb pt-2">
        <div class="row">
            <div class="col-6 preview-title">
                <label class="">Preview</label>
            </div>
            <div class="col-6">
                <a href="<?php echo e(route('admin.dish')); ?>">
                    <span class="">
                        <img src="<?php echo e(asset('img/Group826.png')); ?>" height="20" class="float-right" width="20" />
                    </span>
                </a>
            </div>
        </div>
        <div class="row" style="width: 100%;">
            <div class="col-10 bg-white mb-5 dish-detail-content">
                <div class="row">
                    <div class="col-11 dish-title">
                        <h4 class="font-weight-bold mb-0"><?php echo e($obj->name_en); ?></h4>
                        <h5 class=" mb-0"><?php echo e($obj->desc_en); ?></h5>
                        <h4 class="text-movee font-weight-bold mb-0">$<?php echo e(number_format($obj->price, 2)); ?></h4>
                    </div>
                    <div class="col-1">
                        <a href="<?php echo e(route('admin.dish')); ?>" class="fa fa-s text-white float-right close_times mt-3">
                            <span class="fa fa-times text-white pt-1"></span>
                        </a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <div style="position:relative">
                        <img src="<?php echo e(asset('dishes/'.$obj->image)); ?>" class="img-fluid w-100" style="height:42vh" />
                        <?php if($obj->badge): ?>
                        <img src="<?php echo e(asset('badges/'.$obj->badge->filepath)); ?>" style="position:absolute;top:10px;left:10px;">
                        <?php endif; ?>
                        </div>
                        <p class="text-center text-movee font-weight-bold dish-adv">This dish will be prepared<br /> straight away.</p>
                    </div>
                    <div class="col-6">
                        <p class="text-white d-block bg-movee pl-1 pt-1 pb-1 font-weight-bold fs-3">Please Choose:</p>
                        <div style="height:40vh; overflow:auto">
                            <?php $__currentLoopData = $obj->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($op->photo_visible != "1"): ?>
                            <h5 class="font-weight-bold d-block border-bottom mt"><?php echo e($op->name); ?></h5>
                            <div class="ml-4 pl-3">
                                <?php $__currentLoopData = $op->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check mb-3">
                                        <input type="radio" class="fform-check-input rdobtn" id="materialUnchecked<?php echo e($it->id); ?>" name="option[<?php echo e($op->id); ?>]">
                                        <label class="form-check-label  txtdemibold font-weight-bold" for="materialUnchecked<?php echo e($it->id); ?>">
                                            <?php echo e($it->name); ?>

                                            <?php if($it->price > 0): ?>
                                                <span style="color:#9A9828">(+<?php echo e(number_format($it->price, 2)); ?>)</span>
                                            <?php elseif($it->price < 0): ?>
                                                <span style="color:#C74E95">(<?php echo e(number_format($it->price, 2)); ?>)</span>
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <i class="fa fa-minus-circle fa-4x text-movee ml-5 mr-3 mt"></i> <label class="fs-5 font-weight-normal">00</label><i class="fa fa-plus-circle fa-4x text-movee ml-3"></i>
                        <button class="border-0 bg-movee text-center text-white pt-2 pb-2 mt w-100 fs-3 borderadious mb-3">ORDER NOW </button>
                        </div>
                </div>

            </div>
            <div class="col-2">
                <form action="<?php echo e(route('admin.dish.previewpost')); ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo e($obj->id); ?>">
                <div style="position:absolute;bottom:6%;">
                    <div>
                        <p class="txtdemibold">Sold out</p>
                        <label class="bs-switch ml-100">
                            <input type="checkbox" name="sold_out"
                            <?php if($obj->sold_out == 1): ?>
                                checked
                            <?php endif; ?>
                            >
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <div>
                        <p class="txtdemibold">Active</p>
                        <label class="bs-switch ml-100">
                            <input type="checkbox" name="active"
                            <?php if($obj->active == 1): ?>
                                checked
                            <?php endif; ?>
                            >
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <button class="editbttnn align-bottom">
                        EDIT
                        <img src="<?php echo e(asset('img/Group728.png')); ?>" height="20" class="mb-1" />
                    </button>
                </div>
                <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>