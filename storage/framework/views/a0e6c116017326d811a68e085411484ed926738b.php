<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Assign Truck</h4>
                    </div>
                    <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if(empty($id)): ?> active show <?php endif; ?>" id="home-tab2" data-toggle="tab"
                                        href="#home2" role="tab" aria-controls="home" aria-selected="true">Assigned Truck
                                        List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(!empty($id)): ?> active show <?php endif; ?>" id="profile-tab2"
                                        data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                        aria-selected="false">Assign New Truck</a>
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
                                                        style="width: 30.531px;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 98.484px;">Truck Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 98.484px;">Registration No</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 98.1094px;">Device Name</th>
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 170.1094px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!@empty($assigned)): ?>
                                                <?php $__currentLoopData = $assigned; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="gradeA even" role="row">
                                                    <th><?php echo e($loop->iteration); ?></th>
                                                    <td><?php echo e($row->truck_name); ?></td>
                                                    <td><?php echo e($row->reg_no); ?></td>
                                                    
                                                    <?php $dev_mm = App\Models\Truck\Device::where('id', $row->device_id)->first(); ?>

                                                    <?php if(!empty($dev_mm)): ?>

                                                    <td><?php echo e($dev_mm->name); ?></td> 

                                                    <?php else: ?>

                                                    <td>-</td> 


                                                    <?php endif; ?>

                                                    <td>
                                                        -
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
                                          
                                            <h5>Assign Truck To Device</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    
                                                    <?php echo Form::open(array('route' => 'truck.assign_device_store',"enctype"=>"multipart/form-data")); ?>

                                                    <?php echo method_field('POST'); ?>


                                                    
                                                    
                                                <div class="form-group row">                                                
                                                        <label class="col-lg-2 col-form-label">Trucks</label>
                                                        <div class="col-lg-10">
                                                                <select class="form-control m-b" name="truck_id" required
                                                                    id="truck_id">
                                                                    <option value="">Select Trucks</option>
                                                                    <?php if(!empty($trucks)): ?>
                                                                    <?php $__currentLoopData = $trucks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->truck_name); ?> - <?php echo e($row->reg_no); ?> - <?php echo e($row->truck_type); ?></option>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>

                                                                </select>
                                                        </div>
                                                </div>

                                                <div class="form-group row">                                                
                                                        <label class="col-lg-2 col-form-label">Devices</label>
                                                        <div class="col-lg-10">
                                                                <select class="form-control m-b" name="device_id" required
                                                                    id="device_id">
                                                                    <option value="">Select Devices</option>
                                                                    <?php if(!empty($devices)): ?>
                                                                    <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?> - <?php echo e($row->imei); ?> </option>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>

                                                                </select>
                                                        </div>
                                                </div>


                                                       
                                                    <div class="form-group row">
                                                        <div class="col-lg-offset-2 col-lg-12">
                                                           
                                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                type="submit">Save</button>
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

</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    var loadBigFile=function(event){
      var output=document.getElementById('big_output');
      output.src=URL.createObjectURL(event.target.files[0]);
    };
  </script>
  
  
  <script>
    $('.datatable-basic').DataTable({
            autoWidth: false,
            "columnDefs": [
                {"orderable": false, "targets": [3]}
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
<script>
$(document).ready(function() {
    $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
                extend: 'copy'
            },
            {
                extend: 'csv'
            },
            {
                extend: 'excel',
                title: 'ExampleFile'
            },
            {
                extend: 'pdf',
                title: 'ExampleFile'
            },

            {
                extend: 'print',
                customize: function(win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]

    });

});


$('.demo4').click(function() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function() {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
});
</script>
<script src="<?php echo e(url('assets/js/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/truck/assign_truck.blade.php ENDPATH**/ ?>