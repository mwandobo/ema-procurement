<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Creditors Report</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link <?php if(empty($id)): ?> active show <?php endif; ?>" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Creditors Report
                                    List</a>
                            </li>
                       

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">

<br>
<?php
$center=App\Models\Bar\POS\Supplier::where('id',$account_id)->first();
?>

        <div class="panel-heading">
            <h6 class="panel-title">
              Creditors Report
                <?php if(!empty($start_date)): ?>
                    for the period: <b><?php echo e($start_date); ?> to <?php echo e($end_date); ?> for <?php echo e($center->name); ?></b>
                <?php endif; ?>
            </h6>
        </div>

<br>
        <div class="panel-body hidden-print">
            <?php echo Form::open(array('url' => Request::url(), 'method' => 'post','class'=>'form-horizontal', 'name' => 'form')); ?>

            <div class="row">

                <div class="col-md-4">
                    <label class="">Start Date</label>
                   <input  name="start_date" type="date" class="form-control date-picker" required value="<?php
                if (!empty($start_date)) {
                    echo $start_date;
                } else {
                    echo date('Y-m-d', strtotime('first day of january this year'));
                }
                ?>">

                </div>
                <div class="col-md-4">
                    <label class="">End Date</label>
                     <input  name="end_date" type="date" class="form-control date-picker" required value="<?php
                if (!empty($end_date)) {
                    echo $end_date;
                } else {
                    echo date('Y-m-d');
                }
                ?>">
                </div>
                <div class="col-md-4">
                    <label class="">Creditors List</label>
                    <?php echo Form::select('account_id',$chart_of_accounts,$account_id, array('class' => 'm-b','id'=>'account_id','placeholder'=>'Select','style'=>'width:100%','required'=>'required')); ?>

                  
                </div>

   <div class="col-md-4">
                      <br><button type="submit" class="btn btn-success">Search</button>
                        <a href="<?php echo e(Request::url()); ?>"class="btn btn-danger">Reset</a>

                </div>                  
                </div>
           
            <?php echo Form::close(); ?>


        </div>

        <!-- /.panel-body -->

   <br> <br>
<?php if(!empty($start_date)): ?>
        <div class="panel panel-white">
            <div class="panel-body ">
                <div class="table-responsive">

                  <table class="table datatable-basic table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> Reference</th>
                            <th>Due Date</th>
                         <th>Total</th>
                            <th>Current</th>
                         <th> 1-30 </th>
                            <th> 31-60 </th>
                            <th>61-90 </th>
                            <th>91-120 </th>
                            <th>Over 120 </th>
                            <th>Due</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                          <?php
            $total1 = $total2 = $total3 = $total4 = $total5 = $total6= $total7= 0; 
?>

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                        $dueDate = strtotime($key->due_date);
                          $todayDate= strtotime(date('d-m-Y'));
                          $datediff = $dueDate - $todayDate;
                           round($datediff / (60 * 60 * 24));
                          $dateDifferences = round($datediff / (60 * 60 * 24));
                         $invoice_due =($key->purchase_amount + $key->purchase_tax) -$key->due_amount;
                        
                        ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                     <td><a class="nav-link" id="profile-tab2"  href="<?php echo e(route('bar_purchase.show',$key->id)); ?>" role="tab"   aria-selected="false"><?php echo e($key->reference_no); ?></a</td>
                      
                       <td><?php echo e(Carbon\Carbon::parse($key->due_date)->format('d/m/Y')); ?> </td>
                         <td><?php echo e(number_format($key->purchase_amount + $key->purchase_tax,2)); ?> <?php echo e($key->exchange_code); ?></td>  
                                    <td>
                                   <?php      
                           if($dateDifferences > 0){                          
                            echo number_format($invoice_due, 2) . ' ' .$key->exchange_code; 
                            $total1 = $total1 + $invoice_due;
                         } ?>
                                       </td>
                              <td>
                                   <?php      
                          if($dateDifferences < 0 && $dateDifferences >-31){  
                           $total2 = $total2 + $invoice_due;
                            echo number_format($invoice_due, 2). ' ' .$key->exchange_code;  
                         } ?>
                                       </td>                               
                            <td>
                                   <?php      
                         if($dateDifferences < -30 && $dateDifferences >-61){  
                              $total3 = $total3 + $invoice_due;                         
                            echo number_format($invoice_due, 2). ' ' .$key->exchange_code; 
                           
                         } ?>
                                       </td>
                               <td>
                                   <?php      
                          if($dateDifferences < -60 && $dateDifferences > -91){  
                            $total4 = $total4+ $invoice_due;                        
                            echo number_format($invoice_due, 2). ' ' .$key->exchange_code; 
                         } ?>
                                       </td>
                               <td>
                                   <?php      
                        if($dateDifferences < -90 && $dateDifferences > -120){ 
                       $total5 = $total5 + $invoice_due;                         
                            echo number_format($invoice_due, 2). ' ' .$key->exchange_code;  
                         } ?>
                                       </td>                             
                             <td>
                                   <?php      
                          if($dateDifferences < -120){     
                         $total6 = $total6 + $invoice_due;                    
                            echo number_format($invoice_due, 2). ' ' .$key->exchange_code; 
                         } ?>
                                       </td>
          
                            <td><?php echo e(number_format($key->due_amount,2)); ?> <?php echo e($key->exchange_code); ?></td>                      
                           
                                           <td> 
                                                  <?php if($key->status == 1): ?>
                                                    <div class="badge badge-warning badge-shadow">Not Paid</div>
                                                    <?php elseif($key->status == 2): ?>
                                                    <div class="badge badge-info badge-shadow">Partially Paid</div>
                                                    <?php elseif($key->status == 3): ?>
                                                    <div class="badge badge-success badge-shadow">Fully Paid</div>
                                                         <?php elseif($key->status == 0): ?>
                                                    <div class="badge badge-danger badge-shadow">Not Approved</div>
                                                           <?php elseif($key->status == 4): ?>
                                                    <div class="badge badge-danger badge-shadow">Cancelled</div>
                                                    <?php endif; ?>
                                             </td>                                
                            </tr>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        
                    </table>
                  
                </div>
            </div>
            <!-- /.panel-body -->
             </div>
    <?php endif; ?>              

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
<script src="<?php echo e(url('assets/js/plugins/sweetalert/sweetalert.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/bar/pos/purchases/creditors_report.blade.php ENDPATH**/ ?>