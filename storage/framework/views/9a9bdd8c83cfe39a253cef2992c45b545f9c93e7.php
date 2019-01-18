<?php $__env->startSection('setting'); ?>

<div class="col-9 pl-0 pt-5 mt-5">
    <div class="row">
        <div class="col-2">
            <img src="<?php echo e(asset('img/img1.png')); ?>" />
        </div>
        <div class="col-4 pl-0 text-left">
            <button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 mt-4">CHANGE LOGO</button>
        </div>
    </div>
    <div class=" mt-3">
        <h6 class="font-weight-bold text-info">Shop Name</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="<?php echo e($profile->shop_name); ?>" id="input_shop_name"/>
    </div>
    <div class=" mt-2">
        <h6 class="font-weight-bold text-info">ABN</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="<?php echo e($profile->abn); ?>" id="input_abn"/>
    </div>
    <div class="mt-2">
        <h6 class="font-weight-bold text-info">Address</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="<?php echo e($profile->address); ?>" id="input_address"/>
    </div>
    <div class="mt-2">
        <h6 class="font-weight-bold text-info">Phone</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2 w-100 pt-1 pb-1" value="<?php echo e($profile->phone); ?>" id="input_phone"/>
    </div>
    <div style="margin-bottom:50px" class="margin">
    </div>
    <div class="col-11 mt-5 pr-2 text-right">
        <button class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel ></h5></button>
        <button class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2" onclick="onSave()"><h5 class="white-text mb-0">Apply ></h5></button>
    </div>
</div>
<form method="POST" action="<?php echo e(route('admin.setting.receipt.save')); ?>" id="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="shop_name" id="shop_name">
    <input type="hidden" name="abn" id="abn">
    <input type="hidden" name="address" id="address">
    <input type="hidden" name="phone" id="phone">
</form>
<script>
    function onSave()
    {
        $('#shop_name').val($('#input_shop_name').val());
        $('#abn').val($('#input_abn').val());
        $('#address').val($('#input_address').val());
        $('#phone').val($('#input_phone').val());
        $('#post').submit();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.setting', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>