<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header"
                        style="background-color: #f8f9fa; padding: 15px; border-bottom: 2px solid #dee2e6; margin-bottom: 20px;">
                        <h4 style="margin: 0; font-weight: bold; font-size: 1.5rem; color: #007bff;">
                            Agents</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link <?php if(empty($id)): ?> active show <?php endif; ?>" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Agents
                                    List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(!empty($id)): ?> active show <?php endif; ?>" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Agents</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 38.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Phone</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 161.219px;">Address</th>
                                               
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 108.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!@empty($agent)): ?>
                                            <?php $__currentLoopData = $agent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="gradeA even" role="row">
                                                <th><?php echo e($loop->iteration); ?></th>
                                                <td><?php echo e($row->name); ?></td>
                                                <td><?php echo e($row->phone); ?></td>
                                                <td> <?php echo e($row->email); ?></td>
                                                <td> <?php echo e($row->address); ?></td>
                                                
                                               



                                                <td>
                                                    <div class="form-inline">

                                                        <div class="input-group">
                                                            <a class="list-icons-item text-primary"
                                                                href="<?php echo e(route("agents.edit", $row->id)); ?>"><i
                                                                    class="icon-pencil7"></i>
                                                            </a>
                                                        </div>&nbsp
                                                        <div class="input-group">
                                                            <?php echo Form::open(['route' => ['agents.destroy',$row->id], 'method' => 'delete']); ?>

                                                            <?php echo e(Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'onclick' => "return confirm('Are you sure?')"])); ?>

                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade <?php if(!empty($id)): ?> active show <?php endif; ?>" id="profile2" role="tabpanel"
                                aria-labelledby="profile-tab2">

                                <div class="card">
                                    <div class="card-header">
                                        <?php if(!empty($id)): ?>
                                        <h5>Edit Client</h5>
                                        <?php else: ?>
                                        <h5>Add New Client</h5>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <?php if(isset($id)): ?>
                                                <?php echo e(Form::model($id, array('route' => array('agents.update', $id), 'method' => 'PUT'))); ?>

                                                <?php else: ?>
                                                <?php echo e(Form::open(['route' => 'agents.store'])); ?>

                                                <?php echo method_field('POST'); ?>
                                                <?php endif; ?>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Name</label>
                                                        <input type="text" name="name" value="<?php echo e(isset($data) ? $data->name : ''); ?>" class="form-control" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone" value="<?php echo e(isset($data) ? $data->phone : ''); ?>" class="form-control" placeholder="+255713000000" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="<?php echo e(isset($data) ? $data->email : ''); ?>" class="form-control" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>TIN</label>
                                                        <input type="text" name="TIN" value="<?php echo e(isset($data) ? $data->TIN : ''); ?>" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>VRN</label>
                                                        <input type="text" name="VRN" value="<?php echo e(isset($data) ? $data->VRN : ''); ?>" class="form-control">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Address</label>
                                                        <textarea name="address" class="form-control" rows="1" required><?php echo e(isset($data) ? $data->address : ''); ?></textarea>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
<script src="<?php echo e(url('assets/js/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/bar/pos/agent/index.blade.php ENDPATH**/ ?>