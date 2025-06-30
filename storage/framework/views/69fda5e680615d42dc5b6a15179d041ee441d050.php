<?php $__env->startSection('admin.setting.layout'); ?>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('setting.notification-update')); ?>">
                     <?php echo csrf_field(); ?>
                     <?php

$data = App\Models\Setting::all()->last();

?>
                     <fieldset class="setting-fieldset">
                        <legend class="setting-legend"><?php echo e(__('Notification Setting')); ?></legend>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group" id="">
                                     <label class="control-label" for="defaultUnchecked"><?php echo e(__('Email Notifications')); ?></label>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="notifications_email" <?php echo e(!empty('notifications_email') == true ? "checked":""); ?> value="1"><?php echo e(__('Enable')); ?>

                                         </label>
                                     </div>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="notifications_email" <?php echo e(!empty('notifications_email') == false ? "checked":""); ?> value="0"><?php echo e(__('Disable')); ?>

                                         </label>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group" id="">
                                     <label class="" for="defaultUnchecked"><?php echo e(__('SMS Notifications')); ?></label>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="notifications_sms" <?php echo e(!empty('notifications_sms') == true ? "checked":""); ?> value="1"><?php echo e(__('Enable')); ?>

                                         </label>
                                     </div>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="notifications_sms" <?php echo e(!empty('notifications_sms') == false ? "checked":""); ?> value="0"><?php echo e(__('Disable')); ?>

                                         </label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                    </fieldset>
                     <div class="row">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <span><?php echo e(__('Update Notification Setting')); ?></span>
                            </button>
                        </div>
                     </div>
                 </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.setting.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/admin/setting/notification.blade.php ENDPATH**/ ?>