<?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <button class="btn white pt-2 radius pb-2 mb-3 pl-2 pr-2 w-95 waves-effect waves-light category-dish" type="button"
        data-dish="<?php echo e($ds->id); ?>"
        onclick="onDish(this)">
        <h6 class="font-weight-bold black-text mb-0 text-left" style="white-space:nowrap;overflow:hidden">
            <span class="fa fa-navicon"></span> <?php echo e($ds->name_en); ?>

        </h6>
    </button>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
