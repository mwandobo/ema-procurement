    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">
Location Manager - <?php echo e($data->name); ?> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
        <div class="modal-body">
                     
                                            <div class="table-responsive">
                                                
                                            <table class="table datatable-modal table-striped" id="service">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                        <th>Manager</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody >
                                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr class="gradeA even" role="row">
                                                <td><?php echo e($loop->iteration); ?></td>
                                                 <td><?php echo e($row->user->name); ?></td>
                                             </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                               

                                            </table>

                                            
        </div>

       <div class="modal-footer ">
         <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>
        </div>
       
    </div>



<?php echo $__env->yieldContent('scripts'); ?>
<script>
       $('.datatable-modal').DataTable({
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
    </script><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/inventory/location_manager.blade.php ENDPATH**/ ?>