<?php $__env->startSection('admin.setting.layout'); ?>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('setting.email-template-update')); ?>">
                     <?php echo csrf_field(); ?>
                     <?php

$data = App\Models\Setting::all()->last();

?>
                     <fieldset class="setting-fieldset">
                        <legend class="setting-legend"><?php echo e(__('Email SMS Template Setting')); ?></legend>
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="form-group">
                                     <label for="comment"><?php echo e(__('Notifications Templates')); ?></label>
                                     <textarea class="summernote" name="notify_templates" id="summernote"><?php echo e(old('notify_templates',$data->notify_templates)); ?></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="comment"><?php echo e(__('Invite Templates')); ?></label>
                                     <textarea class="summernote" name="invite_templates" id="summernote"><?php echo e(old('invite_templates',$data->invite_templates)); ?></textarea>
                                 </div>
                             </div>
                         </div>
                    </fieldset>
                     <div class="row">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <span><?php echo e(__('Update')); ?></span>
                            </button>
                        </div>
                     </div>
                 </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.setting.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/admin/setting/email-template.blade.php ENDPATH**/ ?>