<div class="sidebar sidebar-light sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-section">
            <div class="sidebar-user-material">
                <div class="sidebar-section-body">
                    <div class="d-flex">
                        <div class="flex-1">
                            <button type="button"
                                class="btn btn-outline-light border-transparent btn-icon btn-sm rounded-pill">
                                <i class="icon-wrench"></i>
                            </button>
                        </div>
                        <a href="#" class="flex-1 text-center"><img
                                src="<?php echo e(url('assets/img/diy_image.jpg')); ?>"
                                class="img-fluid rounded-circle shadow-sm" width="80" height="80" alt=""></a>
                        <div class="flex-1 text-right">
                            <button type="button"
                                class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                <i class="icon-transmission"></i>
                            </button>

                            <button type="button"
                                class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                                <i class="icon-cross2"></i>
                            </button>
                        </div>
                    </div>

                    <?php
                    $settings = App\Models\Setting::first();


                    ?>
                    <div class="text-center">
                        <h6 class="mb-0 text-white text-shadow-dark mt-3"><?php echo e($settings->site_name); ?></h6>
                        <span class="font-size-sm text-white text-shadow-dark"></span>
                    </div>
                </div>

                <div class="sidebar-user-material-footer">
                    <a href="#user-nav"
                        class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle"
                        data-toggle="collapse"><span>My account</span></a>
                </div>
            </div>

            <div class="collapse border-bottom" id="user-nav">
                <ul class="nav nav-sidebar">

                    <a class="nav-link <?php echo e((request()->is('change_password/*')) ? 'active' : ''); ?>" href="<?php echo e(url('change_password')); ?>">
                        <i class="icon-cog"></i>
                        <span> Change Password</span>

                    </a>

                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item has-icon text-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-switch2"></i> <?php echo e(__('Logout')); ?>

                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs mt-1">Main</div> <i class="icon-menu"
                        title="Main"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('home')); ?>"
                        class="nav-link  <?php echo e((request()->is('home')) ? 'active' : ''); ?>">
                        <i class="icon-home"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>



                <li class="nav-item"><a class="nav-link <?php echo e(request()->is('pos/sales/client*') ? 'active' : ''); ?>"
                        href="<?php echo e(url('bar/sales/bar_pos_client')); ?>">
                        <i class="icon-users"></i><span>Clients</span></a></li>



                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-suppliers')): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->is('supplier/*')) ? 'active' : ''); ?>" href="<?php echo e(url('supplier')); ?>">

                        <i class="icon-user"></i>
                        <span> <?php echo e(__('Suppliers')); ?></span>

                    </a>
                </li>


                <li class="nav-item">
                  <a class="nav-link <?php echo e((request()->is('pos/sales/agents/*')) ? 'active' : ''); ?>"
                      href="<?php echo e(route('agents.index')); ?>">
                      <i class="icon-spinner10"></i>
                      <span> Agents</span>
                  </a>
                </li>

                <?php endif; ?>



                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar')): ?>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link <?php echo e(request()->is('truck/*') ? 'active' : ''); ?>">
                        <i class="icon-truck"></i> <span>Truck Tracking</span></a>

                    <ul class="nav nav-group-sub">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar-items')): ?>

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('truck/*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('truck')); ?>"><i></i></i>Manage Truck</a></li>

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('assign_device/*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('assign_device')); ?>"><i></i></i>Assign Device</a></li>

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('device_list/*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('device_list')); ?>"><i></i></i> Device List</a></li>

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('tracking/*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('tracking')); ?>"><i></i></i>Tracking </a></li>

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('tracking_history/*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('tracking_history')); ?>"><i></i></i>Truck History </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>



                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar')): ?>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link <?php echo e(request()->is('leave/*') ? 'active' : ''); ?>">
                        <i class="icon-store"></i> <span>Stores</span></a>

                    <ul class="nav nav-group-sub">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar-items')): ?>

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('leave/*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('location')); ?>"><i></i></i>Store</a></li>

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('leave/*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/category')); ?>"><i></i></i>Manage Categories</a></li>

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('leave/*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/bar_items')); ?>"><i></i></i>Manage Items</a></li>

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('leave/*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/bar_batch_items')); ?>"><i></i></i>Batch Items</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>




                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar-purchase')): ?>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link <?php echo e((request()->is('bar/purchases/*')) ? 'active' : ''); ?>"><i class="icon-cart"></i> <span> Purchases </span></a>
                    <ul class="nav nav-group-sub">


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar-purchase-requisition')): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('bar/purchases/bar_purchase_requisition*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/bar_purchase_requisition')); ?>"><i></i></i>Manage Purchases Requisition</a></li>
                        <?php endif; ?>


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar-purchase-order')): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('bar/purchases/bar_purchase_quotation*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/bar_purchase_quotation')); ?>"><i></i></i>Manage Purchases Quotation</a></li>
                        <?php endif; ?>


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar_purchases')): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('bar/purchases/bar_purchase*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/bar_purchase')); ?>"><i></i></i>Manage Purchases Order</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar_purchases')): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('bar/purchases/supplier/invoice*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/supplier/invoice')); ?>"><i></i></i>Manage Supplier Invoice</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar_purchases')): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('bar/purchases/items/costing*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/items/costing')); ?>"><i></i></i>Items Costing</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar-creditors_report')): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('bar/purchases/creditors_report*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/creditors_report')); ?>"><i></i></i>Creditors Report</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar-debit_note')): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('bar/purchases/bar_debit_note*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/bar_debit_note')); ?>"><i></i></i>Debit Note</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar-issue')): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('bar/purchases/bar_pos_issue*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/purchases/bar_pos_issue')); ?>"><i></i></i>Stock Movement</a></li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->is('inventory/adjustments*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('inventory.adjustments.index')); ?>">
                                <i></i>
                                Inventory Adjustments
                            </a>
                        </li>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-bar-activity')): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('bar/pos_activity*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/pos_activity')); ?>"><i></i></i>Track POS Activity</a></li>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>



                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link <?php echo e((request()->is('bar/sales/*')) ? 'active' : ''); ?>">
                        <i class="icon-store"></i><span>Sales</span>
                    </a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('v2/sales/quotations*')) ? 'active' : ''); ?>"
                                                href="<?php echo e(url('v2/sales/quotations')); ?>"><i></i></i>Sales Quotations</a></li>

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('pos/sales/profoma/invoice*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('pos/sales/profoma/invoice')); ?>"><i></i></i>Profoma Invoice</a></li>

                        

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('pos/sales/invoices*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('pos/sales/invoices')); ?>"><i></i></i>Invoice</a></li>

                        

                        <li class="nav-item"><a class="nav-link <?php echo e((request()->is('bar/sales/bar_invoice/bar_invoice_payment*')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/sales/bar_invoice_payment')); ?>"><i></i></i>Invoice Payment</a></li>



                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->is('inventory/discounts*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('inventory.discounts.index')); ?>">
                                <i></i>
                                Discounts
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->is('bar/sales/credibility*') ? 'active' : ''); ?>"
                                href="<?php echo e(url('bar/sales/credibility')); ?>">
                                <i></i>
                                Customer Credibility
                            </a>
                        </li>

                    </ul>
                </li>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-authorization')): ?>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link <?php echo e((request()->is('authentications/*')) ? 'active' : ''); ?>" data-toggle="collapse">

                        <i class="icon-hammer-wrench"></i>

                        <span>Roles & Permission</span>

                    </a>

                    <ul class="nav nav-group-sub">

                        <li class="nav-item">
                            <a class="nav-link <?php echo e((request()->is('authorization/roles')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('/authorization/roles')); ?>"> <?php echo e(__('Role')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e((request()->is('authorization/permissions')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('/authorization/permissions')); ?>"> <?php echo e(__('Permission')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e((request()->is('authorization/departments')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('/authorization/departments')); ?>"> <?php echo e(__('Departments')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e((request()->is('authorization/designations')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('/authorization/designations')); ?>"> <?php echo e(__('Designations')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e((request()->is('authorization/users')) ? 'active' : ''); ?>"
                                href="<?php echo e(url('/authorization/users')); ?>"> <?php echo e(__('Manage Users')); ?></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php echo e((request()->is('azamPay*')) ? 'active' : ''); ?>"
                                href="<?php echo e(route('azampay.index')); ?>">Subscription</a>
                        </li>

                    </ul>
                </li>
                <?php endif; ?>




                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-settings')): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->is('setting/*')) ? 'active' : ''); ?>" href="<?php echo e(url('setting')); ?>">

                        <i class="icon-cog"></i>
                        <span> <?php echo e(__('Settings')); ?></span>

                    </a>
                </li>

                <?php endif; ?>



                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-member-menu')): ?>
                <li class="nav-item nav-item-submenu">
                    <a href="#cards" class="nav-link <?php echo e((request()->is('transaction/*')) ? 'active' : ''); ?>">

                        <i class="icon-user-plus"></i><span>Manage</span>

                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="cards">

                        <li class="nav-item ">
                            <a class="nav-link <?php echo e((request()->is('manage_member/*')) ? 'active' : ''); ?>" title="View Details" href="<?php echo e(route("manage_member.show", auth()->user()->member_id)); ?>">
                                <span>View Information</span>
                            </a>
                        </li>



                        <li class="nav-item ">
                            <a class="nav-link <?php echo e((request()->is('members/order_summary')) ? 'active' : ''); ?>" title="View " href="<?php echo e(route('member_order')); ?>">
                                <span>Order Summary</span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link <?php echo e((request()->is('transaction_list/*')) ? 'active' : ''); ?>" href="<?php echo e(route("transaction_list", auth()->user()->member_id)); ?>"
                                aria-expanded="false" class="dropdown-toggle">

                                <span> <?php echo e(__('Transaction List')); ?></span>

                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link <?php echo e((request()->is('transaction_report')) ? 'active' : ''); ?>" href="<?php echo e(route('transaction_report')); ?>"
                                aria-expanded="false" class="dropdown-toggle">

                                <span> <?php echo e(__(' Transaction Report')); ?></span>

                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link "
                                href="<?php echo e(url('change_password')); ?>">Change Password</a>
                        </li>

                    </ul>
                </li>
                <?php endif; ?>


            </ul>

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/layout/aside2.blade.php ENDPATH**/ ?>