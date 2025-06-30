<?php $__env->startPush('plugin-styles'); ?>
<!-- add some inline style or css file if any -->
<?php echo Html::style('plugins/table/datatable/datatables.css'); ?>

<?php echo Html::style('plugins/table/datatable/dt-global_style.css'); ?>


</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php

$data = App\Models\Setting::all()->last();

?>
<!-- Main Body Starts -->
<div class="layout-px-spacing">
    <div class="layout-top-spacing mb-2">
        <div class="col-md-12">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h4><a data-active="" href="<?php echo e(url('setting')); ?>" ><span> Settings</span></a></h4>
                        

                    </div>
                    <div class="widget-content">
                        <div class="tabs tab-content">
                            <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="bg-light card">
                                            <div class="list-group list-group-flush">

                                                <a href="<?php echo e(route('setting.sms')); ?>"
                                                    class="list-group-item list-group-item-action <?php echo e((request()->is('admin/setting/sms')) ? 'active' : ''); ?>"><?php echo e(__('SMS Setting')); ?></a>
                                                <a href="<?php echo e(route('setting.email')); ?>"
                                                    class="list-group-item list-group-item-action <?php echo e((request()->is('admin/setting/email')) ? 'active' : ''); ?>"><?php echo e(__('Email Setting')); ?></a>
                                                <a href="<?php echo e(route('setting.notification')); ?>"
                                                    class="list-group-item list-group-item-action <?php echo e((request()->is('admin/setting/notification')) ? 'active' : ''); ?>"><?php echo e(__('Notification Setting')); ?></a>
                                                <a href="<?php echo e(route('setting.email-template')); ?>"
                                                    class="list-group-item list-group-item-action <?php echo e((request()->is('admin/setting/emailtemplate')) ? 'active' : ''); ?>"><?php echo e(__('Email Sms Template Setting')); ?></a>

                                            </div>
                                        </div>
                                    </div>

                                    <?php echo $__env->yieldContent('admin.setting.layout'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Main Body Ends -->
<?php $__env->stopSection(); ?>

<!-- push external js if any -->
<?php $__env->startPush('plugin-scripts'); ?>
<?php echo Html::script('assets/js/loader.js'); ?>

<?php echo Html::script('plugins/table/datatable/datatables.js'); ?>

<!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
<?php echo Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js'); ?>

<?php echo Html::script('plugins/table/datatable/button-ext/jszip.min.js'); ?>

<?php echo Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js'); ?>

<?php echo Html::script('plugins/table/datatable/button-ext/buttons.print.min.js'); ?>

<!-- The following JS library files are loaded to use PDF Options-->
<?php echo Html::script('plugins/table/datatable/button-ext/pdfmake.min.js'); ?>

<?php echo Html::script('plugins/table/datatable/button-ext/vfs_fonts.js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('custom-scripts'); ?>
<script>
$(document).on('click', '.edit_role_btn', function() {
    let id = $(this).data('id');
    let name = $(this).data('name');
    let slug = $(this).data('slug');
    console.log("here");
    $('#r-id_').val(id);
    $('#r-slug_').val(slug);
    $('#r-name_').val(name);
    $('#editRoleModal').modal('show');
});
</script>



<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/admin/setting/index.blade.php ENDPATH**/ ?>