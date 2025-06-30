<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                   <div class="card-header"
                        style="background-color: #f8f9fa; padding: 15px; border-bottom: 2px solid #dee2e6; margin-bottom: 20px;">
                        <h4 style="margin: 0; font-weight: bold; font-size: 1.5rem; color: #007bff;">
                            Items</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link <?php if(empty($id)): ?> active show <?php endif; ?>" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Items
                                    List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(!empty($id)): ?> active show <?php endif; ?>" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Items</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  " id="importExel-tab"
                                    data-toggle="tab" href="#importExel" role="tab" aria-controls="profile"
                                    aria-selected="false">Import Items</a>
                            </li>

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="itemsDatatable">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 28.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 156.484px;">Item Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 156.484px;">Item Code</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Quantity</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Unit</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade <?php if(!empty($id)): ?> active show <?php endif; ?>" id="profile2" role="tabpanel"
                                aria-labelledby="profile-tab2">

                                <div class="card">
                                    <div class="card-header">
                                        <?php if(!empty($id)): ?>
                                        <h5>Edit Items</h5>
                                        <?php else: ?>
                                        <h5>Add New Items</h5>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <?php if(isset($id)): ?>
                                                <?php echo e(Form::model($id, array('route' => array('bar_items.update', $id), 'method' => 'PUT'))); ?>

                                                <?php else: ?>
                                                <?php echo e(Form::open(['route' => 'bar_items.store'])); ?>

                                                <?php echo method_field('POST'); ?>
                                                <?php endif; ?>
                                                <div class="form-group row"><label class="col-lg-2 col-form-label">Item Name <span class="" style="color:red;">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="name"
                                                            value="<?php echo e(isset($data) ? $data->name : ''); ?>"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Item Code</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="item_code"
                                                            value="<?php echo e(isset($data) ? $data->item_code: ''); ?>"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Category <span class="" style="color:red;">*</span></label>
                                                    <div class="col-lg-10">
                                                        <select class="form-control m-b" name="category_id" required
                                                            id="category">
                                                            <option value="">Select</option>
                                                            <?php if(!empty($category)): ?>
                                                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($br->id); ?>" <?php if(isset($data)): ?><?php echo e($data->category_id == $br->id  ? 'selected' : ''); ?> <?php endif; ?>><?php echo e($br->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                 

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Unit</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="unit"
                                                            value="<?php echo e(isset($data) ? $data->unit : ''); ?>"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-2">Desription</label>
                                                    <div class="col-lg-10">
                                                        <textarea name="description"
                                                            class="form-control"><?php echo e(isset($data)? $data->description : ''); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        <?php if(!@empty($id)): ?>
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                            data-toggle="modal" data-target="#myModal"
                                                            type="submit">Update</button>
                                                        <?php else: ?>
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                            type="submit">Save</button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php echo Form::close(); ?>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade " id="importExel" role="tabpanel"
                                aria-labelledby="importExel-tab">

                                <div class="card">
                                    <div class="card-header">
                                        <form action="<?php echo e(route('bar_item.sample')); ?>" method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-success">Download Sample</button>
                                        </form>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <div class="container mt-5 text-center">
                                                    <h4 class="mb-4">
                                                        Import Excel & CSV File
                                                    </h4>
                                                    <form action="<?php echo e(route('bar_item.import')); ?>" method="POST" enctype="multipart/form-data">

                                                        <?php echo csrf_field(); ?>
                                                        <div class="form-group mb-4">
                                                            <div class="custom-file text-left">
                                                                <input type="file" name="file" class="form-control" id="customFile" required>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary">Import Items</button>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="modal fade" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>



<script>
    $(function () {
        let urlcontract = "<?php echo e(route('bar_items.index')); ?>";

        // Destroy existing DataTable instance if it exists
        if ($.fn.DataTable.isDataTable('#itemsDatatable')) {
            $('#itemsDatatable').DataTable().destroy();
        }

        // Initialize DataTable
        $('#itemsDatatable').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: {
                url: urlcontract,
                data: function (d) {
                    d.start_date = $('#date1').val();
                    d.end_date = $('#date2').val();
                    d.from = $('#from').val();
                    d.to = $('#to').val();
                    d.status = $('#status').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'item_code', name: 'item_code' },
                { data: 'quantity', name: 'quantity' },
                { data: 'unit', name: 'unit' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            columnDefs: [
                { targets: [4], className: 'text-center' }
            ]
        });
    });


    function deleteItem(id) {
        var url = '<?php echo e(route("bar_items.destroy", ":id")); ?>';
        url = url.replace(':id', id);
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        Swal.fire({
            title: "Delete",
            text: "Do you really want to delete!",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            confirmButtonColor: "#3085d6",
            cancelButtonText: "No, cancel!",
            cancelButtonColor: "#aaa",
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: "delete",
                    success: function (data) {
                        $('#itemsDatatable').DataTable().ajax.reload();
                        Swal.fire({
                            title: "Deleted",
                            text: "Your data has been deleted",
                            confirmButtonColor: "#3085d6"
                        });
                    }
                });
            }
        });
    }
</script>



<script>
    $('.datatable-basic').DataTable({
        autoWidth: false,
        "columnDefs": [{
            "orderable": false,
            "targets": [3]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        "language": {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {
                'first': 'First',
                'last': 'Last',
                'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
            }
        },

    });
</script>


<script type="text/javascript">
    function model(id) {
    let url = '<?php echo e(route("bar_items.show", ":id")); ?>';
    url = url.replace(':id', id);

    $.ajax({
        type: 'GET',
        url: url,
        cache: false,
        async: true,
        success: function(data) {
            $('.modal-dialog').html(data);
            $('#appFormModal').modal('show');
        },
        error: function(xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to load the item details.'
            });
        }
    });
}

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/bar/pos/items/index.blade.php ENDPATH**/ ?>