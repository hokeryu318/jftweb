<?php $__env->startSection('setting'); ?>
<style>
    .p-edit-oneline{
        padding-top: 8px;
    }
</style>
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold">Time Slots</h5>
    <h6 class="text-info font-weight-bold">Regular Time Slots</h6>
    <form action="<?php echo e(route('admin.setting.timeslots.post')); ?>" method="POST" id="post_form">
    <div class="card ml-1 col-lg-10 pr-0">
        <div class="row mt-2 mb-4">
            <div class="col-4"></div>
            <div class="col-3 text-info text-center">Start</div>
            <div class="col-3 text-info text-center">Ends</div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline
                    <?php if($slots[0]->morning_on == "0"): ?>
                        light-text
                    <?php endif; ?>
                ">Morning</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-morning-start" value="<?php echo e($slots[0]->morning_starts); ?>"
                <?php if($slots[0]->morning_on == "0"): ?>
                    disabled
                <?php endif; ?>
                >
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-morning-end" value="<?php echo e($slots[0]->morning_ends); ?>"
                <?php if($slots[0]->morning_on == "0"): ?>
                    disabled
                <?php endif; ?>
                >
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" class="time-check" name="regular-morning-on"
                    <?php if($slots[0]->morning_on == "1"): ?>
                        checked
                    <?php endif; ?>
                    >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline
                    <?php if($slots[0]->lunch_on == "0"): ?>
                        light-text
                    <?php endif; ?>
                ">Lunch</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-lunch-start" value="<?php echo e($slots[0]->lunch_starts); ?>"
                <?php if($slots[0]->lunch_on == "0"): ?>
                    disabled
                <?php endif; ?>
                >
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-lunch-end" value="<?php echo e($slots[0]->lunch_ends); ?>"
                <?php if($slots[0]->lunch_on == "0"): ?>
                    disabled
                <?php endif; ?>
                >
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" name="regular-lunch-on"
                    <?php if($slots[0]->lunch_on == "1"): ?>
                        checked
                    <?php endif; ?>
                    >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline
                    <?php if($slots[0]->tea_on == "0"): ?>
                        light-text
                    <?php endif; ?>
                ">Tea</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-tea-start" value="<?php echo e($slots[0]->tea_starts); ?>"
                <?php if($slots[0]->tea_on == "0"): ?>
                    disabled
                <?php endif; ?>
                >
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-tea-end" value="<?php echo e($slots[0]->tea_ends); ?>"
                <?php if($slots[0]->tea_on == "0"): ?>
                    disabled
                <?php endif; ?>
                >
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" name="regular-tea-on"
                    <?php if($slots[0]->tea_on == "1"): ?>
                        checked
                    <?php endif; ?>
                    >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline
                    <?php if($slots[0]->dinner_on == "0"): ?>
                        light-text
                    <?php endif; ?>
                ">Dinner</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-dinner-start" value="<?php echo e($slots[0]->dinner_starts); ?>"
                <?php if($slots[0]->dinner_on == "0"): ?>
                    disabled
                <?php endif; ?>
                >
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-dinner-end" value="<?php echo e($slots[0]->dinner_ends); ?>"
                <?php if($slots[0]->dinner_on == "0"): ?>
                    disabled
                <?php endif; ?>
                >
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" name="regular-dinner-on"
                    <?php if($slots[0]->dinner_on == "1"): ?>
                        checked
                    <?php endif; ?>
                    >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
        <div class="row">
            <div class="col-4">
                <p class="mb-0 pl-3 p-edit-oneline
                    <?php if($slots[0]->latenight_on == "0"): ?>
                        light-text
                    <?php endif; ?>
                ">Late Night</p>
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-latenight-start" value="<?php echo e($slots[0]->latenight_starts); ?>"
                <?php if($slots[0]->latenight_on == "0"): ?>
                    disabled
                <?php endif; ?>
                >
            </div>
            <div class="col-3 text-right pr-5">
                <input type="text" class="time-element" name="regular-latenight-end" value="<?php echo e($slots[0]->latenight_ends); ?>"
                <?php if($slots[0]->latenight_on == "0"): ?>
                    disabled
                <?php endif; ?>
                >
            </div>
            <div class="col-2 pl-0">
                <label class="switch">
                    <input type="checkbox" name="regular-latenight-on"
                    <?php if($slots[0]->latenight_on == "1"): ?>
                        checked
                    <?php endif; ?>
                    >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12"><hr class=""></div>
    </div>

    <h6 class="text-info font-weight-bold mt-5">Particular Time Slots</h6>

    <?php
        $name_array = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $mark_array = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    ?>
    <?php $__currentLoopData = $name_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card ml-1 mt-3 pt-3 pb-2 col-lg-10 pr-0 particular">
        <div class="row">
            <div class="col-6 pl-4">
                <h5 class="font-weight-normal"><?php echo e($mark_array[$i]); ?></h5>
            </div>
            <div class="col-5 pr-0 text-right">
                <label class="switch">
                    <input type="checkbox" class="accordion-check" name="<?php echo e($key); ?>-on"
                        <?php if($slots[$i + 1]->day_on == "1"): ?>
                            checked
                        <?php endif; ?>
                    >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="accordion-div" style="display:
            <?php if($slots[$i + 1]->day_on == "1"): ?>
                block
            <?php else: ?>
                none
            <?php endif; ?>
            ">
            <?php if($key == 'saturday' || $key == 'sunday'): ?>
            <div class="row">
                <div class="col-6 pl-4">
                    <h6 class="font-weight-normal light-text">Non-Businees Day</h6>
                </div>
                <div class="col-5 pr-0 text-right">
                    <label class="switch">
                        <input type="checkbox" name="<?php echo e($key); ?>-business-on"
                        <?php if($slots[$i + 1]->non_business == "1"): ?>
                            checked
                        <?php endif; ?>
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <?php endif; ?>
            <div class="row mt-2 mb-4">
                <div class="col-4"></div>
                <div class="col-3 text-info text-center">Start</div>
                <div class="col-3 text-info text-center">Ends</div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline
                    <?php if($slots[$i + 1]->morning_on == "0"): ?>
                        light-text
                    <?php endif; ?>
                    ">Morning</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="<?php echo e($key); ?>-morning-start" value="<?php echo e($slots[$i + 1]->morning_starts); ?>"
                    <?php if($slots[$i + 1]->morning_on == "0"): ?>
                        disabled
                    <?php endif; ?>
                    >
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="<?php echo e($key); ?>-morning-end" value="<?php echo e($slots[$i + 1]->morning_ends); ?>"
                    <?php if($slots[$i + 1]->morning_on == "0"): ?>
                        disabled
                    <?php endif; ?>
                    >
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="<?php echo e($key); ?>-morning-on" class="time-check"
                            <?php if($slots[$i + 1]->morning_on == "1"): ?>
                                checked
                            <?php endif; ?>
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline
                    <?php if($slots[$i + 1]->lunch_on == "0"): ?>
                        light-text
                    <?php endif; ?>
                    ">Lunch</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="<?php echo e($key); ?>-lunch-start" value="<?php echo e($slots[$i + 1]->lunch_starts); ?>"
                    <?php if($slots[$i + 1]->lunch_on == "0"): ?>
                        disabled
                    <?php endif; ?>
                    >
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="<?php echo e($key); ?>-lunch-end" value="<?php echo e($slots[$i + 1]->lunch_ends); ?>"
                    <?php if($slots[$i + 1]->lunch_on == "0"): ?>
                        disabled
                    <?php endif; ?>
                    >
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="<?php echo e($key); ?>-lunch-on" class="time-check"
                        <?php if($slots[$i + 1]->lunch_on == "1"): ?>
                            checked
                        <?php endif; ?>
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4"><p class="mb-0 pl-3 p-edit-oneline
                <?php if($slots[$i + 1]->tea_on == "0"): ?>
                    light-text
                <?php endif; ?>
                ">Tea</p></div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="<?php echo e($key); ?>-tea-start" value="<?php echo e($slots[$i + 1]->tea_starts); ?>"
                    <?php if($slots[$i + 1]->tea_on == "0"): ?>
                        disabled
                    <?php endif; ?>
                    >
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="<?php echo e($key); ?>-tea-end" value="<?php echo e($slots[$i + 1]->tea_ends); ?>"
                    <?php if($slots[$i + 1]->tea_on == "0"): ?>
                        disabled
                    <?php endif; ?>
                    >
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="<?php echo e($key); ?>-tea-on" class="time-check"
                        <?php if($slots[$i + 1]->tea_on == "1"): ?>
                            checked
                        <?php endif; ?>
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline
                    <?php if($slots[$i + 1]->dinner_on == "0"): ?>
                        light-text
                    <?php endif; ?>
                    ">Dinner</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="<?php echo e($key); ?>-dinner-start" value="<?php echo e($slots[$i + 1]->dinner_starts); ?>"
                    <?php if($slots[$i + 1]->dinner_on == "0"): ?>
                        disabled
                    <?php endif; ?>
                    >
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="<?php echo e($key); ?>-dinner-end" value="<?php echo e($slots[$i + 1]->dinner_ends); ?>"
                    <?php if($slots[$i + 1]->dinner_on == "0"): ?>
                        disabled
                    <?php endif; ?>
                    >
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="<?php echo e($key); ?>-dinner-on" class="time-check"
                        <?php if($slots[$i + 1]->dinner_on == "1"): ?>
                            checked
                        <?php endif; ?>
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
            <div class="row">
                <div class="col-4">
                    <p class="mb-0 pl-3 p-edit-oneline
                    <?php if($slots[$i + 1]->latenight_on == "0"): ?>
                        light-text
                    <?php endif; ?>
                    ">Late Night</p>
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="<?php echo e($key); ?>-latenight-start" value="<?php echo e($slots[$i + 1]->latenight_starts); ?>"
                    <?php if($slots[$i + 1]->latenight_on == "0"): ?>
                        disabled
                    <?php endif; ?>
                    >
                </div>
                <div class="col-3 text-right pr-5">
                    <input type="text" class="time-element" name="<?php echo e($key); ?>-latenight-end" value="<?php echo e($slots[$i + 1]->latenight_ends); ?>"
                    <?php if($slots[$i + 1]->latenight_on == "0"): ?>
                        disabled
                    <?php endif; ?>
                    >
                </div>
                <div class="col-2 pl-0">
                    <label class="switch">
                        <input type="checkbox" name="<?php echo e($key); ?>-latenight-on" class="time-check"
                        <?php if($slots[$i + 1]->latenight_on == "1"): ?>
                            checked
                        <?php endif; ?>
                        >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-lg-12"><hr class=""></div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo csrf_field(); ?>
    </form>
    <div class="col-lg-11 pr-2 mt-3 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0" onclick="onapply()">Apply</h5></a>
    </div>
</div>
<script type="text/javascript" src="<?php echo e(asset('js/timepicki.js')); ?>"></script>
<script>
    $(document).ready(function(){
        //$(".time-element").timepicki({start_time: ["06", "00", "AM"]});
        $(".time-element").each(function(i, obj){
            var init_time = $(obj).val();
            $(obj).timepicki({start_time: [init_time.substring(0, 2), init_time.substring(3, 5), init_time.substring(6, 8)]})
        });

        $('.accordion-check').change(function(){
            var obj = $(this);
            var parent = $(this).closest('.particular');
            var accordion = $('.accordion-div', parent);
            accordion.slideToggle(500, function(){
                return obj.is(':checked') ? "Collapse" : "Expand";
            });
        });

        $('.timepicker_wrap').css('width', '265px');

        $('.time-check').change(function(){
            var parent = $(this).closest('.row');
            if($(this).is(":checked")){
                $('.p-edit-oneline', parent).removeClass('light-text');
                $('.time-element', parent).prop('disabled', false);
            } else {
                $('.p-edit-oneline', parent).addClass('light-text');
                $('.time-element', parent).prop('disabled', true);
            }
        })
    });
    function onapply(){
        $('#post_form').submit();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.setting', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>