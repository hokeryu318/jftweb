<?php $__env->startSection('setting'); ?>

<div class="col-9 pl-0">
    <h5 class="black-text pl-5"><span class=" font-weight-bold ">Payment Methods</span> (Up to 5 methods)</h5>
    <div  id="sortable_div">
    <form action="<?php echo e(route('admin.setting.payment.post')); ?>" method="POST" id="post_form">
    <ul id="sortable" style="padding:0px">
        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li style="list-style-type:none" class="element">
            <div class="row pt-2 ml-4 pl-2">
                <div class="col-9">
                    <div class="card pt-2 mt-3 pl-2">
                        <h5 class="font-weight-bold"><span class="fa fa-navicon name">&nbsp;&nbsp;<?php echo e($p->name); ?></span></h5>
                        <input type="hidden" class="post" name="orgitem" value="<?php echo e($p->id); ?>">
                        <input type="hidden" class="sort" name="sort[]" value="<?php echo e($p->id); ?>_<?php echo e($p->sort); ?>">
                    </div>
                </div>
                <div class="col-3 pt-2 mt-1">
                    <button type="button" class="btn black radius pt-2 pb-2 pr-4 pl-4 deleteBtn" data-id="<?php echo e($p->id); ?>">
                        <h6 class="mb-0 font-weight-bold">Delete</h6>
                    </button>
                </div>
            </div>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php echo csrf_field(); ?>
    </form>
    </div>
    <div class="row mt-4 ml-5 pl-2">
        <div class="col-9">
        </div>
        <div class="col-3">
            <button type="button" class="btn bg-info radius pt-2 pb-2 pr-4 pl-4" onclick="onadd()"><h5 class="mb-0 pr-1 pl-1 font-weight-bold">ADD</h5></button>
        </div>
    </div>
    <div class="col-lg-12 mt-5 pr-4 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0" onclick="onapply()">Apply</h5></a>
    </div>
    <li style="list-style-type:none; display:none" id="clone" class="element">
        <div class="row pt-2 ml-4 pl-2">
            <div class="col-9">
                <div class="card pt-2 mt-3 pl-2">
                    <h5 class="font-weight-bold"><span class="fa fa-navicon name">&nbsp;&nbsp;</span></h5>
                    <input type="hidden" class="post" name="new[]" value="new">
                    <input type="hidden" class="sort" name="sort[]" value="">
                </div>
            </div>
            <div class="col-3 pt-2 mt-1">
                <button class="btn black radius pt-2 pb-2 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
            </div>
        </div>
    </li>
</div>
<script type="text/javascript" src="<?php echo e(asset('js/jquery-ui.js')); ?>"></script>
<script>
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();

    function onadd(){
        if($('.element:visible').length >= 5){
            return;
        }
        var payment_name = prompt('Please enter payment type');
        if(payment_name == null || payment_name == "") return;
        var div = $('#clone').clone();
        div.show();
        $('.name', div).html("&nbsp;&nbsp;" + payment_name);
        $('.post', div).val(payment_name);
        $('#sortable').append(div);
    }

    $('.deleteBtn').on('mousedown', function(){
        var id = $(this).data('id');
        if(id > 0){
            var parent = $(this).closest('.element');
            parent.hide();
            var name_edit = $('.post', parent);
            name_edit.attr('name', 'removed[]');
            name_edit.attr('value', id);
        }
        else
            $(this).closest('.element').remove();
    });

    function onapply(){
        var index = 1;
        $('.element').each(function(i, obj){
            var visible = $(obj).is(':visible');
            if(visible){
                var id = $('.post', obj).val();
                console.log(id);
                $('.sort', obj).val(id + "_" + index);
                index++;
            } else {
                $('.sort', obj).attr('name', '');
            }
        });
        $('#post_form').submit();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.setting', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>