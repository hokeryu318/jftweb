<?php $__env->startSection('title', 'DISH'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding-top:8%;">
</div>
<div class="widthh blackgrey pt-4">
    <div class="row">
        <div class="col-6">
            <label class="text-white fontbig font-weight-bold">DISH</label>
        </div>
        <div class="col-6">
            <a>
                <a href="<?php echo e(route('admin.home')); ?>">
                    <img src="<?php echo e(asset('img/Group826.png')); ?>" height="20" class="float-right" width="20" />
                </a>
            </a>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12 chh2" style="height: 65vh;overflow-y: auto;">
            <table class="table text-white txtdemibold">
                <thead>
                    <tr>
                        <th class="border-0 fs-3" scope="col">
                            <a href="<?php echo e(route("admin.dish.sort", ["sortType" => $sort])); ?>" class="text-white">
                                ITEM
                                <?php if($sort == "asc"): ?>
                                    <img src="<?php echo e(asset('img/Path444.png')); ?>" height="20" />
                                <?php else: ?>
                                    <img src="<?php echo e(asset('img/Path445.png')); ?>" height="20" />
                                <?php endif; ?>
                            </a>
                        </th>
                        <th class="border-0 fs-3" scope="col">GROUP</th>
                        <th class="border-0 fs-3" scope="col">PRICE</th>
                        <th class="border-0 fs-3" scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0">Sold out</td>
                        <td class="border-0">Active</td>
                        <td class="border-0"></td>
                    </tr>
                    <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr onclick="onrow(this)" data-url="<?php echo e(route('admin.dish.preview', ['id' => $d->id])); ?>">
                        <td class=""><?php echo e($d->name_en); ?></td>
                        <td class=""><?php echo e($d->group->name); ?></td>
                        <td class="">$ <?php echo e(number_format($d->price, 2)); ?></td>

                        <td class="">
                            <?php if($d->sold_out == 1): ?>
                            <img src="<?php echo e(asset('img/Group904.png')); ?>" height="20" />
                            <?php endif; ?>
                        </td>
                        <td class="">
                            <?php if($d->active == 1): ?>
                            <img src="<?php echo e(asset('img/Group904.png')); ?>" height="20" />
                            <?php endif; ?>
                        </td>
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
                        <td class="bg-blue2 d-inline-block border-rightBlue p-3 w-60px">
                            <a class="font-weight-bold text-white" href="<?php echo e(route('admin.dish')); ?>" >DISH</a>
                        </td>
                        <td class="p-3 d-inline-block border-rightBlue w-60px">
                            <a class="font-weight-bold text-white" href="<?php echo e(route('admin.category')); ?>">CATEGORY</a>
                        </td>
                        <td class="p-3 d-inline-block border- w-60px border-rightBlue">
                            <a class="font-weight-bold text-white" href="<?php echo e(route('admin.option')); ?>">OPTION</a>
                        </td>
                        <td class="p-3 d-inline-block border-rightBlue  w-60px">
                            <a class="font-weight-bold text-white" href="#">DISCOUNT</a>
                        </td>
                    </tr>
                </table>
            </div>
            <a href="<?php echo e(route('admin.dish.add')); ?>" class="text-white  btnCreateNewDiscount">
                CREATE NEW DISH
                <img src="<?php echo e(asset('img/Group728white.png')); ?>" height="20" />
            </a>
        </div>
    </div>
</div>
<script>
    function onrow(obj)
    {
        var url = $(obj).data('url');
        window.location = url;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>