<?php $__currentLoopData = $subs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option class="option-subcat" data-parent=<?php echo e($sub->parent->id); ?> value="<?php echo e($sub->id); ?>"><?php echo e($sub->name_en); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
