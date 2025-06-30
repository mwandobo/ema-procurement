<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                   <div class="card-header"
                        style="background-color: #f8f9fa; padding: 15px; border-bottom: 2px solid #dee2e6; margin-bottom: 20px;">
                        <h4 style="margin: 0; font-weight: bold; font-size: 1.5rem; color: #007bff;">
                            Location</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link <?php if(empty($id)): ?> active show <?php endif; ?>" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Location
                                    List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(!empty($id)): ?> active show <?php endif; ?>" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Location</a>
                            </li>

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped" id="table-1">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 58.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 156.484px;">Name</th>                                                   
                                                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 86.484px;">Main Location</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!@empty($location)): ?>
                                            <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                      

                                            <tr class="gradeA even" role="row">
                                                <th><?php echo e($loop->iteration); ?></th>
                                                <td><?php echo e($row->name); ?></td>
                                                
                                             <td>
                                                    <?php if($row->main == 0): ?>
                                                    <div class="badge badge-danger badge-shadow">No</div>
                                                    <?php elseif($row->main == 1): ?>
                                                    <div class="badge badge-success badge-shadow">Yes</div>
                                                    
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                 <div class="form-inline">
                                                      <a class="list-icons-item text-primary"
                                                        href="<?php echo e(route("location.edit", $row->id)); ?>">
                                                        <i class="icon-pencil7"></i>
                                                    </a>
                                              
                                                    <?php echo Form::open(['route' => ['location.destroy',$row->id],
                                                    'method' => 'delete']); ?>

                                                 <?php echo e(Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"])); ?>

                                                    <?php echo e(Form::close()); ?>

&nbsp

           <a href="#"  class="list-icons-item text-info" title="View"  data-toggle="modal" data-target="#appFormModal"  data-id="<?php echo e($row->id); ?>" data-type="template"   onclick="model(<?php echo e($row->id); ?>,'location')">
                        View Manager</a>                                                             
                    &nbsp
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
                                        <h5>Edit Location</h5>
                                        <?php else: ?>
                                        <h5>Add New Location</h5>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                     <?php if(isset($id)): ?>
                                                <?php echo e(Form::model($id, array('route' => array('location.update', $id), 'method' => 'PUT'))); ?>

                                                <?php else: ?>
                                                <?php echo e(Form::open(['route' => 'location.store'])); ?>

                                                <?php echo method_field('POST'); ?>
                                                <?php endif; ?>
                                                <div class="form-group row"><label class="col-lg-2 col-form-label">Name</label>
                                                   <div class="col-lg-10">
                                                           <input type="text" name="name"
                                                            value="<?php echo e(isset($data) ? $data->name : ''); ?>"
                                                            class="form-control" required>
                                                    </div>
                                                </div>

                                                   <div class="form-group row"><label
                                                class="col-lg-2 col-form-label">Is it the Main Location</label>
                                            <div class="col-lg-10">
                                                <select class="form-control m-b" name="main" required
                                                id="main">
                                                <option value="">Select</option>
                                                <option <?php if(isset($data)): ?>
                                                <?php echo e($data->main == '1' ? 'selected' : ''); ?>

                                                <?php endif; ?> value="1">Yes</option>
                                                <option <?php if(isset($data)): ?>
                                                <?php echo e($data->main == '0' ? 'selected' : ''); ?>

                                                <?php endif; ?> value="0">No</option>
                                            </select>
                                            </div>
                                        </div>


                                          <br>
                                                <h4 align="center">Enter Location Manager</h4>
                                                <hr>
                                              
                                                <button type="button" name="add" class="btn btn-success btn-xs add"><i
                                                        class="fas fa-plus"> Add item</i></button><br>
                                                <br>
                                                
                                                <div class=""> <p class="form-control-static errors" id="errors" style="text-align:center;color:red;"></p>   </div>
                                                
                                                <div class="table-responsive">
                                                <table class="table table-bordered" id="cart">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(!empty($id)): ?>
                                                        <?php if(!empty($items)): ?>
                                                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="line_items">
                                                            <td>
                                                            <select name="manager[]" id="manager<?php echo e($i->order_no); ?>_edit"
                                                                    class="form-control m-b manager" required
                                                                    data-sub_category_id="<?php echo e($i->order_no); ?>_edit">
                                                                    <option value="">Select Manager</option><?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($u->id); ?>"
                                                                        <?php if(isset($i)): ?><?php if($u->id == $i->manager): ?>
                                                                        selected <?php endif; ?> <?php endif; ?> ><?php echo e($u->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select></td>
                                                            <td><button type="button" name="remove"
                                                                    class="btn btn-danger btn-xs rem"
                                                                    value="<?php echo e(isset($i) ? $i->id : ''); ?>"><i class="icon-trash"></i></button></td>
                                                          <input type="hidden" name="saved_items_id[]"
                                                                class="form-control item_saved<?php echo e($i->order_no); ?>_edit"
                                                                value="<?php echo e(isset($i) ? $i->id : ''); ?>"
                                                                required />
                                                            
                                                        </tr>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                        <?php endif; ?>

                                                    </tbody>
                                                    
                                                   <tfoot>
                                                   </tfoot>
                                                   
                                                </table>
                                            </div>


                                             
                                             
                                              <br>
                                                <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        <?php if(!@empty($id)): ?>
                                                        <button class="btn btn-sm btn-primary float-right save"
                                                            data-toggle="modal" data-target="#myModal"
                                                            type="submit">Update</button>
                                                        <?php else: ?>
                                                        <button class="btn btn-sm btn-primary float-right save"
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

<!-- discount Modal -->
<div class="modal fade" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
<script type="text/javascript">
$(document).ready(function() {

    var count = 0;
    
    $('.add').on("click", function(e) {

        count++;
        var html = '';
        html += '<tr class="line_items">';
        html +='<td><select name="manager[]" class="form-control m-b manager" id="manager' +count +'" required  data-sub_category_id="' +count +'"><option value="">Select Manager</option><?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td>';
        html +='<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="icon-trash"></i></button></td>';

        $('#cart > tbody').append(html);

            $('.m-b').select2({
                            });
    });



    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
    });


    $(document).on('click', '.rem', function() {
        var btn_value = $(this).attr("value");
        $(this).closest('tr').remove();
        $('tfoot').append(
            '<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +
            btn_value + '"/>');
    });

});
</script>

<script>
    $(document).ready(function() {
    
      
         $(document).on('click', '.save', function(event) {
   
         $('.errors').empty();
        
          if ( $('#cart tbody tr').length == 0 ) {
               event.preventDefault(); 
    $('.errors').append('Please Select Location Manager.');
}
         
         else{
            
         
          
         }
        
    });
    
    
    
    });
    </script>
    

<script type="text/javascript">
    function model(id, type) {
        
         let url = '<?php echo e(route("location.show", ":id")); ?>';
        url = url.replace(':id', id)

        $.ajax({
        type: 'GET',
        url: url,
        data: {
        'type':type,
           },
            cache: false,
            async: true,
            success: function(data) {
                //alert(data);
                $('#appFormModal > .modal-dialog').html(data);
            },
            error: function(error) {
                $('#appFormModal').modal('toggle');

            }
        });

    }
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/inventory/location.blade.php ENDPATH**/ ?>