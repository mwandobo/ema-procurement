<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Devices</h4>
                    </div>
                    <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if(empty($id)): ?> active show <?php endif; ?>" id="home-tab2" data-toggle="tab"
                                        href="#home2" role="tab" aria-controls="home" aria-selected="true">Devices
                                        List</a>
                                </li>
                            </ul>

                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>" id="home2" role="tabpanel"
                                    aria-labelledby="home-tab2">
                                    <div class="table-responsive">
                                        <table class="table datatable-basic2 table-striped">
                                            <thead>
                                                <tr role="row">
                                                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending"
                                                        style="width: 30.531px;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 98.484px;">Device Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 98.484px;">Device IMEI No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 98.1094px;">Device Last Data</th>
                                                  
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!@empty($devices)): ?>
                                                <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="gradeA even" role="row">
                                                    <th><?php echo e($loop->iteration); ?></th>
                                                    <td><?php echo e($row->name); ?></td>
                                                    <td><?php echo e($row->imei); ?></td>
                                                    <td><?php echo e($row->sent); ?></td>
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

</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<script>
    $('.datatable-basic2').DataTable({
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
    var loadBigFile=function(event){
      var output=document.getElementById('big_output');
      output.src=URL.createObjectURL(event.target.files[0]);
    };
  </script>
<script>
$(document).ready(function() {
    $('.dataTable-basic').DataTable({
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/truck/device_list.blade.php ENDPATH**/ ?>