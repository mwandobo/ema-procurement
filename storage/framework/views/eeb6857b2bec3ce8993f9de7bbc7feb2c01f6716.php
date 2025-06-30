<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                            <h4 style="margin: 0;">Supplier Invoice</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                                    <div class="table-responsive">
                                        <table class="table datatable-basic table-striped" id="supplierInvoiceTable">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Ref No: activate to sort column ascending" style="width: 106.484px;">Ref No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Purchase Date: activate to sort column ascending" style="width: 136.484px;">Purchase Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Supplier Name: activate to sort column ascending" style="width: 161.219px;">Supplier Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Supplier Date: activate to sort column ascending" style="width: 101.219px;">Supplier Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Purchase Amount: activate to sort column ascending" style="width: 101.219px;">Purchase Amount</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 108.1094px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><a href="<?php echo e(route('invoice.supplier_invoice_show', $invoice->reference_no)); ?>"><?php echo e($invoice->reference_no); ?></a></td>
                                                        <td><?php echo e(\Carbon\Carbon::parse($invoice->purchase_date)->format('Y-m-d')); ?></td>
                                                        <td><?php echo e($invoice->supplier ? $invoice->supplier->name : 'N/A'); ?></td>
                                                        <td><?php echo e(\Carbon\Carbon::parse($invoice->supplier_date)->format('Y-m-d')); ?></td>
                                                        <td><?php echo e(number_format($invoice->purchase_amount, 2)); ?></td>
                                                        <td>
                                                            <a href="<?php echo e(route('supplier_invoice_show_pdf', $invoice->reference_no)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-download"></i> Download</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade <?php if(!empty($id)): ?> active show <?php endif; ?>" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Initial Payment Selection Modal -->
        
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- DataTables Bootstrap 5 CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            // Check if DataTable is already initialized and destroy it
            if ($.fn.DataTable.isDataTable('#supplierInvoiceTable')) {
                $('#supplierInvoiceTable').DataTable().destroy();
            }

            // Initialize DataTable
            $('#supplierInvoiceTable').DataTable({
                autoWidth: false,
                order: [[2, 'desc']],
                columnDefs: [{ targets: [5], orderable: false }], // Disable sorting on Actions column
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: {
                        'first': 'First',
                        'last': 'Last',
                        'next': $('html').attr('dir') == 'rtl' ? '←' : '→',
                        'previous': $('html').attr('dir') == 'rtl' ? '→' : '←'
                    }
                }
            });
        });
    </script>
    <script src="<?php echo e(url('assets/js/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/bar/pos/purchases/supplier_invoice.blade.php ENDPATH**/ ?>