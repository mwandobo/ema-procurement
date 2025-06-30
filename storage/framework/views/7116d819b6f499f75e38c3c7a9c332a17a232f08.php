<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <!-- Main navbar -->
    <?php echo $__env->make('layout.main_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
        <?php echo $__env->make('layout.aside2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /main sidebar -->



        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Page header -->
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-lg-inline">
                        <div class="page-title d-flex">
                            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> -
                                Dashboard</h4>
                            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                        </div>


                        <div class="header-elements d-none">
                            <div class="d-flex justify-content-center">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-member-menu')): ?>

                               <?php else: ?>
                                 <?php
$user= App\Models\User::find(auth()->user()->id);
?>
                                    <span class="font-weight-semibold">Hello , <?php echo e($user->name); ?></span>
                         <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                                <span class="breadcrumb-item active">Dashboard</span>
                            </div>

                            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                        </div>

                        <div class="header-elements d-none">
                            <div class="breadcrumb justify-content-center">
                                <a href="#" class="breadcrumb-elements-item">
                                    <i class="icon-comment-discussion mr-2"></i>
                                    Support
                                </a>

                                <div class="breadcrumb-elements-item dropdown p-0">
                                    <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-gear mr-2"></i>
                                        Settings
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account
                                            security</a>
                                        <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                                        <a href="#" class="dropdown-item"><i class="icon-accessibility"></i>
                                            Accessibility</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page header -->

                <?php echo $__env->make('layout.alerts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Content area -->
                <div class="content">

                    <?php echo $__env->yieldContent('content'); ?>

                </div>
                <!-- /content area -->


                <!-- Footer -->

                <?php echo $__env->make('layout.footer2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- /footer -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>

    
    <!-- /page content -->
    <?php echo $__env->make('layout.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo Toastr::message(); ?>

   
</body>


</html>

<?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/layout/master.blade.php ENDPATH**/ ?>