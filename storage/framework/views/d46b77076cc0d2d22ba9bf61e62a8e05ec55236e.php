<?php $__env->startSection('admin.setting.layout'); ?>
<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('setting.site-update')); ?>"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php

                  $data = App\Models\Setting::all()->last();

                ?>
                <fieldset class="setting-fieldset">
                    <legend class="setting-legend"><?php echo e(__('General Setting')); ?></legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="site_name"><?php echo e(__('Site Name')); ?></label>
                                <span class="text-danger">*</span>
                                <input name="site_name" id="site_name" type="text"
                                    class="form-control <?php $__errorArgs = ['site_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('site_name',$data->site_name)); ?>" required>
                                <?php $__errorArgs = ['site_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="site_phone_number"><?php echo e(__('Site Phone Number')); ?></label>
                                <span class="text-danger">*</span>
                                <input name="site_phone_number" id="site_phone_number" type="text"
                                    class="form-control <?php $__errorArgs = ['site_phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('site_phone_number',$data->site_phone_number)); ?>" required>
                                <?php $__errorArgs = ['site_phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                             <div class="form-group">
                                <label for="site_address"><?php echo e(__('Site address')); ?></label> <span
                                    class="text-danger">*</span>
                                <textarea name="site_address" id="site_address" cols="30" rows="3" required
                                    class="form-control small-textarea-height <?php $__errorArgs = ['site_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('site_address',$data->site_address)); ?></textarea>
                                <?php $__errorArgs = ['site_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>



                          
                           

                            <div class="form-group">
                                <label for="customFile"><?php echo e(__('Site Logo')); ?></label>
                                <div class="custom-file">
                                    <input name="site_logo" type="file"
                                        class="file-upload-input custom-file-input <?php $__errorArgs = ['site_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="customFile" onchange="readURL(this);">
                                    <label class="custom-file-label"
                                        for="customFile"><?php echo e(__('Choose File')); ?></label>
                                </div>
                                <?php $__errorArgs = ['site_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                
                             
                                
                                <img class="img-thumbnail image-width mt-4 mb-3" id="previewImage"
                                    src="<?php echo e(asset('images/$data->site_logo')); ?>" alt="<?php echo e(__('Visitor pass Logo')); ?>" />
                                
                            </div>


                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="site_email"><?php echo e(__('Site Email')); ?></label> <span
                                    class="text-danger">*</span>
                                <input name="site_email" id="site_email"
                                    class="form-control <?php $__errorArgs = ['site_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('site_email',$data->site_email)); ?>" required>
                                <?php $__errorArgs = ['site_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                             <div class="form-group">
                                <label for="site_address"><?php echo e(__('Site TIN')); ?></label>
                              <input name="tin" id="tin"
                                    class="form-control <?php $__errorArgs = ['tin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('tin',$data->tin)); ?>">
                                <?php $__errorArgs = ['tin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                           
                            <div class="form-group">
                                <label for="site_description"><?php echo e(__('Description')); ?></label> 
                                <textarea name="site_description" id="site_description" cols="30" rows="3"
                                    class="form-control small-textarea-height <?php $__errorArgs = ['site_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('site_description',$data->site_description)); ?></textarea>
                                <?php $__errorArgs = ['site_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                              <div class="form-group">
                                <label for="site_footer"><?php echo e(__('Site Footer')); ?></label> 
                                <input name="site_footer" id="site_footer"
                                    class="form-control <?php $__errorArgs = ['site_footer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('site_footer',$data->site_footer)); ?>">
                                <?php $__errorArgs = ['site_footer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="form-group col-md-6">
                        <button class="btn btn-primary">
                            <span><?php echo e(__('Update')); ?></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/modules/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/preregister/create.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.setting.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/admin/setting/site.blade.php ENDPATH**/ ?>