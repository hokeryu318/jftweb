<?php $__env->startSection('title', 'Bookings'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding-top:8%;" class="pttbook"></div>
<div class="widthh pt-4 blackgrey">
    <div class="row">
        <div class="col-6">
            <h4 class="text-white h2-responsive font-weight-bold">Bookings</h4>
        </div>
        <div class="col-6">
            <a>
                <span class="">
                    <img src="<?php echo e(asset('img/Group826.png')); ?>" height="18" class="float-right" width="20" />
                </span>
            </a>
        </div>
    </div>
	<br>
    <div class="row mb-3 mt-3">
        <div class="col-12">
            <img src="<?php echo e(asset('img/Path501.png')); ?>" class="mb-2" height="25" /><label class="text-white ml-3 mr-3 font-weight-light fs-4 pt-2">31 MAY 2018</label>
            <img src="<?php echo e(asset('img/Path502.png')); ?>" class="mb-2" height="25" />
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <table class="table text-white txtdemibold" style="width:65%;">
                <thead>
                    <tr>
                        <th class="border-0" scope="col">
                            Time
                            <img src="<?php echo e(asset('img/Path444.png')); ?>" height="20">
                        </th>
                        <th class="border-0 text-center" scope="col">TABLE</th>
                        <th class="border-0 text-right" scope="col">NUMBER</th>
                        <th class="border-0 text-center" scope="col">CUSTOMER</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-12 chh" style="height: 333px;overflow-y: auto;">
            <table class="table text-white txtdemibold">
                    <tbody class="thh">
                        <tr>
                            <td class="border-0">09:35 PM</td>
                            <td class="border-0">H-1 + H-2</td>
                            <td class="border-0">12</td>
                            <td class="border-0">Ms Jenifer Lopez</td>
                            <td class="border-0" style="text-align:center"><a style="color:white" href="<?php echo e(route('admin.booking.edit')); ?>" class="outline-0 editbtn">EDIT</a></td>
                        </tr>
                        <?php for($i = 0; $i < 10; $i++): ?>
                        <tr>
                            <td>09:30 PM</td>
                            <td>A-1</td>
                            <td>1</td>
                            <td>Mr Johny English</td>
                            <td style="text-align:center"><a style="color:white;" href="<?php echo e(route('admin.booking.edit')); ?>" class="outline-0 editbtn">EDIT</a></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
				<br>
            </div>
			<div class="mt-4 mb-4 col-12">
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>