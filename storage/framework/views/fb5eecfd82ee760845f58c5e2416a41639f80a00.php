<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-body">
      
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                   <div class="card-header header-elements-sm-inline">
								<h4 class="card-title"> Permissions</h4>
								<div class="header-elements">
								   
                             
                        <button type="button" class="btn btn-outline-info btn-xs px-4"
                            data-toggle="modal" data-target="#addPermissionModal">
                        <i class="fa fa-plus-circle"></i>
                        Add
                    </button>
									
				                	</div>
			                	
							</div>
                    <div class="card-body">
                      
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped" id="table-1">
                                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Slug</th>
                        <th>Module</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                   <tbody>
                                            <?php if(isset($permissions)): ?>
                                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $f = $permission->slug;  ?>

                                            <tr>
                                                <th><?php echo e($loop->iteration); ?></th>
                                                <td><?php echo e($permission->slug); ?></td>
                                                <td><?php echo e($permission->modules->slug  ?? ''); ?></td>
                                                <td>
                                                    <?php echo Form::open(['route' => ['permissions.destroy',
                                                    $permission->id], 'method' => 'delete']); ?>

                                                    <button type="button"
                                                        class="btn btn-outline-info btn-xs edit_permission_btn"
                                                        data-toggle="modal" data-id="<?php echo e($permission->id); ?>"
                                                        data-name="<?php echo e($permission->name); ?>"
                                                        data-slug="<?php echo e($permission->slug); ?>"
                                                        data-module="<?php echo e(isset($permission->modules->id) ? $permission->modules->id:''); ?>">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <?php echo e(Form::button('<i class="fas fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"])); ?>

                                                    <?php echo e(Form::close()); ?>

                                                </td>
                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php echo $__env->make('authorization.permission.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('authorization.permission.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Main Body Ends -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script>
$(document).on('click', '.edit_permission_btn', function() {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var slug = $(this).data('slug');
    var module = $(this).data('module');
    $('#id').val(id);
    $('#p-name_').val(name);
    $('#p-slug_').val(slug);
    $('#p-module_').val(module);
    $('#editPermissionModal').modal('show');
});
</script>

<script>
       $('.datatable-basic').DataTable({
            autoWidth: false,
            "columnDefs": [
                {"targets": [1]}
            ],
           dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "language": {
               search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
             paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            },
        
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/authorization/permission/index.blade.php ENDPATH**/ ?>