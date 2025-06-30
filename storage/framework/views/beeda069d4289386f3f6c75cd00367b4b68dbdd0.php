<?php $__env->startPush('plugin-styles'); ?>
 <style>
 .body > .line_items{
     border:1px solid #ddd;
 }
 .c261b1ca9 {
    width: 100%;
    display: flex;
    flex-direction: row;
    text-transform: uppercase;
    border: none;
    font-size: 12px;
    font-weight: 500;
    margin: 0;
    padding: 24px 0 0;
    padding: var(--spacing-3) 0 0 0;
}

 .c261b1ca9:after, .c261b1ca9:before {
    content: "";
    border-bottom: 1px solid #c2c8d0;
    flex: 1 0 auto;
    height: 0.5em;
    margin: 0;
}
 </style>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>



    <section class="section">
        <div class="section-body">
            <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profoma Invoice </h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if(empty($id)): ?> active show <?php endif; ?>" id="home-tab2"
                                        data-toggle="tab" href="#home2" role="tab" aria-controls="home"
                                        aria-selected="true">Invoice
                                        List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(!empty($id)): ?> active show <?php endif; ?>"
                                        id="profile-tab2" data-toggle="tab" href="#profile2" role="tab"
                                        aria-controls="profile" aria-selected="false">New Invoice</a>
                                </li>

                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>"
                                    id="home2" role="tabpanel" aria-labelledby="home-tab2">
                                    <div class="table-responsive">
                                        <table class="table datatable-basic table-striped">
                                            <thead>
                                                <tr>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 106.484px;">Ref No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 186.484px;">Client Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 126.484px;">Invoice Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending"
                                                        style="width: 161.219px;">Amount</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending"
                                                        style="width: 141.219px;">Location</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending"
                                                        style="width: 121.219px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 168.1094px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php if(!@empty($invoices)): ?>
                                                    <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="gradeA even" role="row">

                                                            <td>
                                                            <a href="<?php echo e(route('profoma_invoice.show', $row->id)); ?>"><?php echo e($row->reference_no); ?></a>
                                                            </td>
                                                            <td>
                                                                <?php echo e($row->client->name); ?>

                                                            </td>

                                                            <td><?php echo e(Carbon\Carbon::parse($row->invoice_date)->format('d/m/Y')); ?></td>

                                                            <td><?php echo e(number_format($row->due_amount, 2)); ?>

                                                                <?php echo e($row->exchange_code); ?></td>
                                                            <td>
                                                                <?php if(!empty($row->store->name)): ?>
                                                                    <?php echo e($row->store->name); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if($row->status == 0): ?>
                                                                    <div class="badge badge-danger badge-shadow">Not
                                                                        Approved</div>
                                                                <?php elseif($row->status == 1): ?>
                                                                    <div class="badge badge-warning badge-shadow">Not Paid
                                                                    </div>
                                                                <?php elseif($row->status == 2): ?>
                                                                    <div class="badge badge-info badge-shadow">Partially
                                                                        Paid</div>
                                                                <?php elseif($row->status == 3): ?>
                                                                    <span class="badge badge-success badge-shadow">Fully
                                                                        Paid</span>
                                                                <?php elseif($row->status == 4): ?>
                                                                    <span
                                                                        class="badge badge-danger badge-shadow">Cancelled</span>
                                                                <?php endif; ?>
                                                            </td>

                                                            <?php if($row->status != 4 && $row->status != 3): ?>
                                                                <td>
                                                                    <div class="form-inline">
                                                                        <?php if($row->good_receive == 0): ?>
                                                                            <a class="list-icons-item text-primary"
                                                                                title="Edit"
                                                                                onclick="return confirm('Are you sure?')"
                                                                                href="<?php echo e(route('profoma_invoice.edit', $row->id)); ?>"><i
                                                                                    class="icon-pencil7"></i></a>&nbsp
                                                                        <?php endif; ?>

                                                                        <?php echo Form::open(['route' => ['profoma_invoice.destroy', $row->id], 'method' => 'delete']); ?>

                                                                        <?php echo e(Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"])); ?>

                                                                        <?php echo e(Form::close()); ?>


                                                                        &nbsp

                                                                        <div class="dropdown">
                                                                            <a href="#"
                                                                                class="list-icons-item dropdown-toggle text-teal"
                                                                                data-toggle="dropdown"><i
                                                                                    class="icon-cog6"></i></a>
                                                                            <div class="dropdown-menu">
                                                                                <?php if($row->invoice_status == 0): ?>
                                                                                    <a class="nav-link"
                                                                                        onclick="return confirm('Are you sure?')"
                                                                                        href="<?php echo e(route('invoice.convert_to_invoice', $row->id)); ?>"
                                                                                        title=""> Convert To Invoice
                                                                                    </a>
                                                                                <?php endif; ?>
                                                                                <?php if($row->status != 0 && $row->status != 4 && $row->status != 3 && $row->good_receive == 0): ?>
                                                                                    <a class="nav-link" id="profile-tab2"
                                                                                        href="<?php echo e(route('invoice.receive', $row->id)); ?>"
                                                                                        role="tab"
                                                                                        aria-selected="false">Good
                                                                                        Receive</a>
                                                                                <?php endif; ?>
                                                                                <?php if($row->status != 0 && $row->status != 4 && $row->status != 3 && $row->good_receive == 1): ?>
                                                                                    <a class="nav-link" id="profile-tab2"
                                                                                        href="<?php echo e(route('invoice.pay', $row->id)); ?>"
                                                                                        role="tab"
                                                                                        aria-selected="false">Make
                                                                                        Payments</a>
                                                                                <?php endif; ?>
                                                                                <?php if($row->good_receive == 0): ?>
                                                                                    <a class="nav-link" title="Cancel"
                                                                                        onclick="return confirm('Are you sure?')"
                                                                                        href="<?php echo e(route('invoice.cancel', $row->id)); ?>">Cancel
                                                                                        Invoice</a>
                                                                                <?php endif; ?>
                                                                                
                                                                                <a class="nav-link" id="profile-tab2"
                                                                                        href="<?php echo e(route('pos_profoma_pdfview',['download'=>'pdf','id'=>$row->id])); ?>"
                                                                                        role="tab"
                                                                                        aria-selected="false">Download PDF</a>

                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </td>
                                                            <?php else: ?>
                                                                <td></td>
                                                            <?php endif; ?>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php endif; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade <?php if(!empty($id)): ?> active show <?php endif; ?>"
                                    id="profile2" role="tabpanel" aria-labelledby="profile-tab2">

                                    <div class="card">
                                        <div class="card-header">
                                            <?php if(empty($id)): ?>
                                                <h5>Create Invoice</h5>
                                            <?php else: ?>
                                                <h5>Edit Invoice</h5>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                   <?php if(isset($id)): ?>
                                                        <?php echo e(Form::model($id, ['route' => ['profoma_invoice.update', $id], 'method' => 'PUT'])); ?>

                                                    <?php else: ?>
                                                        <?php echo e(Form::open(['route' => 'profoma_invoice.store'])); ?>

                                                        <?php echo method_field('POST'); ?>
                                                    <?php endif; ?>


                                                    <input type="hidden" name="edit_type" class="form-control name_type"
                                                        value="<?php echo e($type); ?>" />
                                                    <div class="form-group row">

                                                        <label class="col-lg-2 col-form-label">Client Name <span class="required"> * </span></label>
                                                        <div class="col-lg-4">
                                                            <div class="input-group mb-3">
                                                                <select
                                                                    class="form-control append-button-single-field client_id"
                                                                    name="client_id" id="client_id" required>
                                                                    <option value="">Select Client Name</option>
                                                                    <?php if(!empty($client)): ?>
                                                                        <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option
                                                                                <?php if(isset($data)): ?> <?php echo e($data->client_id == $row->id ? 'selected' : ''); ?> <?php endif; ?>
                                                                                value="<?php echo e($row->id); ?>">
                                                                                <?php echo e($row->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>

                                                                </select>&nbsp

                                                                <button class="btn btn-outline-secondary" type="button"
                                                                    data-toggle="modal" value=""
                                                                    onclick="model('1','client')"
                                                                    data-target="#appFormModal" href="app2FormModal"><i
                                                                        class="icon-plus-circle2"></i></button>
                                                            </div>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label">Location <span class="required"> * </span></label>
                                                        <div class="col-lg-4">
                                                            <select class="form-control m-b location" name="location"
                                                                required id="location">
                                                                <option value="" disabled>Select Location</option>
                                                                <?php if(!empty($location)): ?>
                                                                    <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option
                                                                            <?php if(isset($data)): ?> <?php echo e($data->location == $loc->id ? 'selected' : ''); ?> <?php endif; ?>
                                                                            value="<?php echo e($loc->id); ?>">
                                                                            <?php echo e($loc->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Invoice Date <span class="required"> * </span></label>
                                                        <div class="col-lg-4">
                                                            <input type="date" name="invoice_date"
                                                                placeholder="0 if does not exist"
                                                                value="<?php echo e(isset($data) ? $data->invoice_date : date('Y-m-d')); ?>"
                                                                class="form-control">
                                                        </div>
                                                        <label class="col-lg-2 col-form-label">Due Date <span class="required"> * </span></label>
                                                        <div class="col-lg-4">
                                                            <input type="date" name="due_date"
                                                                placeholder="0 if does not exist"
                                                                value="<?php echo e(isset($data) ? $data->due_date : strftime(date('Y-m-d', strtotime('+10 days')))); ?>"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Sales Agent <span class="required"> * </span></label>
                                                        <div class="col-lg-4">
                                                            <?php if(!empty($data->user_agent)): ?>

                                                                <select class="form-control m-b" name="user_agent"
                                                                    id="user_agent" required>
                                                                    <option value="<?php echo e(old('user_agent')); ?>" disabled
                                                                        selected>Select User</option>
                                                                    <?php if(isset($user)): ?>
                                                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option
                                                                                <?php if(isset($data)): ?> <?php echo e($data->user_agent == $row->id ? 'selected' : 'TZS'); ?> <?php endif; ?>
                                                                                value="<?php echo e($row->id); ?>">
                                                                                <?php echo e($row->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                            <?php else: ?>
                                                                <select class="form-control m-b" name="user_agent"
                                                                    id="user_agent" required>
                                                                    <option value="<?php echo e(old('user_agent')); ?>" disabled
                                                                        selected>Select User</option>
                                                                    <?php if(isset($user)): ?>
                                                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if($row->id == auth()->user()->id): ?>
                                                                                <option value="<?php echo e($row->id); ?>"
                                                                                    selected><?php echo e($row->name); ?></option>
                                                                            <?php else: ?>
                                                                                <option value="<?php echo e($row->id); ?>">
                                                                                    <?php echo e($row->name); ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </select>


                                                            <?php endif; ?>
                                                        </div>
                                                        
                                                        <label class="col-lg-2 col-form-label">Branch</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control m-b" name="branch_id">
                                                                    <option>Select Branch</option>
                                                                    <?php if(!empty($branch)): ?>
                                                                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($row->id); ?>">
                                                                                <?php echo e($row->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    
                                                   
                                                     <div class="form-group row">
                                                     <label class="col-lg-2 col-form-label">Notes</label>

                                                        <div class="col-lg-10">
                                                    <textarea name="notes" class="form-control" rows="4"><?php echo e(isset($data) ? $data->notes : ''); ?></textarea>
                                                        </div>
                                                    </div>


                                                        
                                                    


                                                    <br>
                                                    <h4 align="center">Enter Item Details</h4>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Currency <span class="required"> * </span></label>
                                                        <div class="col-lg-4">
                                                            <?php if(!empty($data->exchange_code)): ?>

                                                                <select class="form-control m-b" name="exchange_code"
                                                                    id="currency_code" required>
                                                                    <option value="<?php echo e(old('currency_code')); ?>" disabled
                                                                        selected>Choose option</option>
                                                                    <?php if(isset($currency)): ?>
                                                                        <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option
                                                                                <?php if(isset($data)): ?> <?php echo e($data->exchange_code == $row->code ? 'selected' : 'TZS'); ?> <?php endif; ?>
                                                                                value="<?php echo e($row->code); ?>">
                                                                                <?php echo e($row->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                            <?php else: ?>
                                                                <select class="form-control m-b" name="exchange_code"
                                                                    id="currency_code" required>
                                                                    <option value="<?php echo e(old('currency_code')); ?>" disabled>
                                                                        Choose option</option>
                                                                    <?php if(isset($currency)): ?>
                                                                        <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            
                                                                                <option value="<?php echo e($row->code); ?>">
                                                                                    <?php echo e($row->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </select>


                                                            <?php endif; ?>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label">Exchange Rate <span class="required"> * </span></label>
                                                        <div class="col-lg-4">
                                                            <input type="number" name="exchange_rate" step="0.0001"
                                                                placeholder="1 if TZSH"
                                                                value="<?php echo e(isset($data) ? $data->exchange_rate : '1.0000'); ?>"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                     <div class=""> <p class="form-control-static item_errors" id="errors" style="text-align:center;color:red;"></p>   </div>
                                                    <button type="button" name="add"
                                                        class="btn btn-success btn-xs add"><i class="fas fa-plus"></i> Add
                                                            item</button><br>
                                                    <br>
                                              <div class="table-responsive">
                                        
                                        <div class="cart" id="cart">
                                        
                                        <div class="row body">
                                        
                                        
                                        </div>
                                        </div>
                                        
                                        
                                        
                                        <br>

<div class="cart1" id="cart1">
<div class="row body1">
 <div class="table-responsive">
            <br><table class="table" id="table1">
                                                     <thead style="display: <?php if(!empty($items)): ?>  <?php else: ?> none <?php endif; ?> ;">
                                                    <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Tax</th>
                                                    <th scope="col">Total Tax</th>
                                                    <th scope="col">Total Cost</th>
                                                     <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                     <tbody>
              <?php if(!empty($id)): ?>
                                                    <?php if(!empty($items)): ?>
                                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <?php
                                                     $it=App\Models\POS\Items::where('id',$i->item_name)->first();
                                                        $c = App\Models\POS\Color::find($it->color);
                                                        $s = App\Models\POS\Size::find($it->size);
                                                                
                                                       if(!empty($c) && empty($s)){
                                                         $a = $it->name .' - '.$c->name;  
                                                       }
                                                          
                                                      elseif(empty($c) && !empty($s)){
                                                         $a =  $it->name .' - '.$s->name;   
                                                       } 
                                                       
                                                       elseif(!empty($c) && !empty($s)){
                                                       $a =  $it->name .' - '.$c->name . ' - '.$s->name;
                                                       } 
                                                       
                                                       else{
                                                            $a =  $it->name ; 
                                                       }
                                                       
                                                       if($i->tax_rate == '0'){
                                                          $r='No Tax';
                                                      }
                                                     else if($i->tax_rate == '0.18'){
                                                          $r='Exclusive';
                                                      } 

                                                      if ($i->sale_type == 'qty') {
                                                        $z = 'Quantity';
                                                    } else if ($i->sale_type == 'crate') {
                                                        $z = 'Crate/Dozen';
                                                    } 
                                                    ?>
                                                    
                                                    <tr class="trlst<?php echo e($i->id); ?>_edit">
                                                      <td><?php echo e($a); ?></td>
                                                      <td><?php echo e(isset($i) ? number_format($i->quantity,2) : ''); ?>

                                                      <div class=""> <span class="form-control-static errorslst<?php echo e($i->id); ?>_edit" id="errors" style="text-align:center;color:red;"></span></div></td>
                                                      <td><?php echo e(isset($i) ? number_format($i->price,2) : ''); ?></td>
                                                      <td><?php echo e($r); ?></td>
                                                    <td><?php echo e(isset($i) ? number_format($i->total_tax,2) : ''); ?></td>
                                                      <td><?php echo e(isset($i) ? number_format($i->total_cost,2) : ''); ?></td>
                                                    
  <td>
<a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="<?php echo e($i->id); ?>_edit"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp;&nbsp;
<a class="list-icons-item text-danger rem" title="Delete" href="javascript:void(0)" data-button_id="<?php echo e($i->id); ?>_edit" value="<?php echo e($i->id); ?>"><i class="icon-trash" style="font-size:18px;"></i></a>
</td>
                                                    </tr>
                                                     
                                                     
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                                 
                                                     </tbody>
                                                    </table>

</div>

<?php if(!empty($id)): ?>
                                                    <?php if(!empty($items)): ?>
                                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <div class="line_items" id="lst<?php echo e($i->id); ?>_edit">
  <input type="hidden" name="item_name[]" class="form-control item_name" id="name lst<?php echo e($i->id); ?>_edit" value="<?php echo e(isset($i) ? $i->item_name : ''); ?>" required="">
  <input type="hidden" name="description[]" class="form-control item_desc" id="desc lst<?php echo e($i->id); ?>_edit" value="<?php echo e(isset($i) ? $i->description : ''); ?>">
  <input type="hidden" name="quantity[]" class="form-control item_quantity" id="qty lst<?php echo e($i->id); ?>_edit" data-category_id="lst<?php echo e($i->id); ?>_edit" value="<?php echo e(isset($i) ? $i->quantity : ''); ?>" required="">
  <input type="hidden" name="price[]" class="form-control item_price" id="price lst<?php echo e($i->id); ?>_edit" value="<?php echo e(isset($i) ? $i->price : ''); ?>" required="">
  <input type="hidden" name="sub[]" class="form-control item_sub" id="sub lst<?php echo e($i->id); ?>_edit" value="<?php echo e(isset($i) ? $i->total_cost  : ''); ?>" required="">
  <input type="hidden" name="tax_rate[]" class="form-control item_rate" id="rate lst<?php echo e($i->id); ?>_edit" value="<?php echo e(isset($i) ? $i->tax_rate : ''); ?>" required="">
  <input type="hidden" name="total_cost[]" class="form-control item_cost" id="cost lst<?php echo e($i->id); ?>_edit" value="<?php echo e(isset($i) ? $i->total_cost : ''); ?>" required="">
  <input type="hidden" name="total_tax[]" class="form-control item_tax" id="tax lst<?php echo e($i->id); ?>_edit" value="<?php echo e(isset($i) ? $i->total_tax : ''); ?>" required="">
  <input type="hidden" name="unit[]" class="form-control item_unit" id="unit lst<?php echo e($i->id); ?>_edit" value="<?php echo e(isset($i) ? $i->unit : ''); ?>">
  <input type="hidden" name="type" class="form-control item_type" id="type lst<?php echo e($i->id); ?>_edit" value="edit">
  <input type="hidden" name="no[]" class="form-control item_type" id="no lst<?php echo e($i->id); ?>_edit" value="<?php echo e($i->id); ?>_edit">
  <input type="hidden" name="saved_items_id[]" class="form-control item_savedlst<?php echo e($i->id); ?>_edit" value="<?php echo e($i->id); ?>">
  <input type="hidden" id="item_id" class="form-control item_idlst<?php echo e($i->id); ?>_edit" value="<?php echo e(isset($i) ? $i->item_name : ''); ?>">
</div>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    <?php endif; ?>

                                                 

</div>
       
     <br> <br>
<div class="row">



<div class="col-lg-1"></div><label class="col-lg-3 col-form-label"> Sub Total (+):</label>
<div class="col-lg-6 line_items">
<input type="text" name="subtotal[]" class="form-control item_total" value="<?php echo e(isset($data) ? '' : '0.00'); ?>" required="" jautocalc="SUM({sub})" readonly=""> <br>
</div><div class="col-lg-2"></div>

<div class="col-lg-1"></div><label class="col-lg-3 col-form-label">Tax (+):</label>
<div class="col-lg-6 line_items">
<input type="text" name="tax[]" class="form-control item_total" value="<?php echo e(isset($data) ? '' : '0.00'); ?>" required="" jautocalc="SUM({total_tax})" readonly=""> <br>
</div><div class="col-lg-2"></div>

<div class="col-lg-1"></div><label class="col-lg-3 col-form-label"> Shipping Cost (+):</label>
<div class="col-lg-6 line_items">
<input type="number" name="shipping_cost[]" class="form-control item_shipping" required="" value="<?php echo e(isset($data) ? $data->shipping_cost : '0.00'); ?>"> <br> 
</div><div class="col-lg-2"></div>

<div class="col-lg-1"></div><label class="col-lg-3 col-form-label">  Discount (-)</label>
<div class="col-lg-6 line_items">
<input type="number" name="discount[]" class="form-control item_discount" required="" value="<?php echo e(isset($data) ? $data->discount : '0.00'); ?>"><br>  
</div><div class="col-lg-2"></div>

<div class="col-lg-1"></div><label class="col-lg-3 col-form-label"> Total Before Adjustment:</label>
<div class="col-lg-6 line_items">
<input type="text" name="before[]" class="form-control item_total" value="<?php echo e(isset($data) ? '' : '0.00'); ?>" required="" jautocalc="{subtotal} + {tax} + {shipping_cost} - {discount}" readonly="readonly" ><br> 
</div><div class="col-lg-2"></div>

<div class="col-lg-1"></div><label class="col-lg-3 col-form-label"> Adjustment:</label>
<div class="col-lg-6 line_items">
<input type="number" name="adjustment[]" step="0.01" class="form-control item_total" value="<?php echo e(isset($data) ? $data->adjustment : '0.00'); ?>" ><br> 
</div><div class="col-lg-2"></div>

<div class="col-lg-1"></div><label class="col-lg-3 col-form-label"> Total:</label>
<div class="col-lg-6 line_items">
<input type="text" name="amount[]" class="form-control item_total" value="<?php echo e(isset($data) ? '' : '0.00'); ?>" required="" jautocalc="{before} + {adjustment}" readonly="readonly" ><br> 
</div><div class="col-lg-2"></div>

</div>


</div>





</div>



                                                    <br>
                                                    <div class="form-group row">
                                                        <div class="col-lg-offset-2 col-lg-12">
                                                             <?php if(!@empty($id)): ?>

                                                                <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                                    href="<?php echo e(route('profoma_invoice.index')); ?>">
                                                                    cancel
                                                                </a>
                                                                <button class="btn btn-sm btn-primary float-right m-t-n-xs save"
                                                                   
                                                                    type="submit" id="save">Update</button>
                                                            <?php else: ?>
                                                                <button class="btn btn-sm btn-primary float-right m-t-n-xs save"
                                                                    type="submit" id="save">Save</button>
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

    <!-- supplier Modal -->
    <div class="modal fade" data-backdrop="" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">

        </div>
    </div>
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('.datatable-basic').DataTable({
            autoWidth: false,
            "ordering": false,
            order: [
                [2, 'desc']
            ],
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
   

    
    
<script>
    
    $(document).ready(function() {
       

        
         $(document).on('change', '.location', function() {
 $(".item_quantity").change();

});

        $(document).on('change', '.item_quantity', function() {
            var id = $(this).val();
              var type = $('.name_type').val();
            var sub_category_id = $(this).data('category_id');
            var item = $('.item_id' + sub_category_id).val();
            var location = $('.location').val();

            console.log(location);
            $.ajax({
                 url: '<?php echo e(url('pos/sales/findInvQuantity')); ?>',
                type: "GET",
                data: {
                    id: id,
                    item: item,
                    location: location,
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                      if (type == 'receive') {
                    $('.errors' + sub_category_id).empty();
                    $("#save").attr("disabled", false);
                      $(".add_edit_form").attr("disabled", false);
                    if (data != '') {
                        $('.errors' + sub_category_id).append(data);
                        $("#save").attr("disabled", true);
                         $(".add_edit_form").attr("disabled", true);
                    } else {

                    }
                      }  

                }

            });

        });



    });
</script>

<script type="text/javascript">
    $(document).ready(function() {



        var count = 0;


        function autoCalcSetup() {
            $('div#cart').jAutoCalc('destroy');
            $('div#cart div.line_items').jAutoCalc({
                keyEventsFire: true,
                decimalPlaces: 2,
                emptyAsZero: true
            });
            $('div#cart').jAutoCalc({
                decimalPlaces: 2
            });
        }
        autoCalcSetup();

        $('.add').on("click", function(e) {

            count++;
            var html = '';
             html +='<div class="col-lg-3 line_items" id="td'+count + '"><br><div class="input-group mb-3"><select name="checked_item_name[]" class="form-control m-b item_name"  id="item_name' +
                count + '" data-sub_category_id="' + count +'" required><option value="">Select Item Name</option><?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($n->id); ?>"><?php echo e($n->name); ?> <?php if(!empty($n->color)): ?> - <?php echo e($n->c->name); ?> <?php endif; ?>   <?php if(!empty($n->size)): ?> - <?php echo e($n->s->name); ?> <?php endif; ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div><?php if($type == 'receive'): ?><br><div id="upd'+count + '" style="display:none; "><a href="#" class="col-lg-12 btn btn-outline-info text-center update"  data-toggle="modal" data-target="#appFormModal" data-sub_category_id="' +count +'">Update Quantity</a></div><?php endif; ?><br><textarea name="checked_description[]"  class="form-control desc' + count +'" placeholder="Description"  ></textarea><br></div>';
            
                html +='<div class="col-lg-6 line_items" id="td'+count + '"><br>Sale Type <select name="checked_sale_type[]" class="form-control m-b sale_type" id="sale_type' + count + '" required><option value="">Select Type</option><option value="qty">Quantity</option><option value="crate">Crate/Dozen</option></select> <br><br>Quantity <input type="number" name="checked_quantity[]" class="form-control item_quantity" min="0.01" step="0.01" data-category_id="' +count +'"placeholder ="quantity" id ="quantity" required /><div class=""> <p class="form-control-static errors' +count + '" id="errors" style="text-align:center;color:red;"></p> </div><br>Price <input type="text" name="checked_price[]" class="form-control item_price' + count +'" placeholder ="price" id="price td'+count + '" required  value=""/><br>Tax <select name="checked_tax_rate[]" class="form-control m-b item_tax" id="item_tax' + count +'" required><option value="">Select Tax</option><option value="0">No Tax</option><option value="0.18">Exclusive</option></select><br><br>Total Cost <input type="text" name="checked_total_cost[]" class="form-control item_total' +
                count + '" placeholder ="total" id="total td'+count + '" required readonly jAutoCalc="{checked_quantity} * {checked_price}" /><br>';
                 html += '<input type="hidden" name="checked_no[]" class="form-control item_no' + count +'" id="no td'+count + '" value="' + count +'" required />';
            html += '<input type="hidden" name="checked_unit[]" class="form-control item_unit' + count +'" id="unit td'+count + '" placeholder ="unit" required />';
            html += '<input type="hidden" id="item_id"  class="form-control item_id' + count +'" value="" /></div>';
            html +='<div class="col-lg-3 text-center line_items" id="td'+count + '"><br><a class="list-icons-item text-info add1" title="Check" href="javascript:void(0)" data-save_id="' +count + '"><i class="icon-check2" style="font-size:30px;font-weight:bold;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger remove" title="Delete" href="javascript:void(0)" data-button_id="' +count + '"><i class="icon-trash" style="font-size:18px;"></i></a><br><div class=""> <p class="form-control-static body_errors' +count + '" id="errors" style="text-align:center;color:red;"></p></div></div>';


          
            if ( $('#cart > .body div').length == 0 ) {
            $('#cart > .body').append(html);
            autoCalcSetup();
            
              }

            /*
             * Multiple drop down select
             */
            $('.m-b').select2({});


               $(document).on('change', '.item_price'+ count, function() {
                var id = $(this).val();
                $.ajax({
                url: '<?php echo e(url('format_number')); ?>',
                type: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                 console.log(data);
                $('.item_price' + count).val(data);
                   
                    }

                });

            });
        
        
      
                        
                        
        });
        
             $(document).on('change', '.item_name', function() {
            var id = $(this).val();
            var sub_category_id = $(this).data('sub_category_id');
            $.ajax({
                url: '<?php echo e(url('pos/sales/findInvPrice')); ?>',
                type: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    
                    if(data != ''){
                    $('.item_price' + sub_category_id).val(numberWithCommas(data[0]["sales_price"]));
                    $(".item_unit" + sub_category_id).val(data[0]["unit"]);
                    //$(".item_tax" + sub_category_id).val(data[0]["tax_rate"]);
                    $(".desc" + sub_category_id).val(data[0]["description"]);
                    $('.item_id' + sub_category_id).val(id);
                    
                    var tax=data[0]["tax_rate"];
                   $('div#td' + sub_category_id +'.col-lg-6.line_items > .item_tax').find('option:selected').removeAttr("selected");
                   if(tax == '0.00'){
                   $('div#td' + sub_category_id +'.col-lg-6.line_items > .item_tax').find('option[value="0"]').attr("selected", true); 
                    $('div#td' + sub_category_id +'.col-lg-6.line_items > .item_tax').find('option[value="0"]').trigger('change');
                   }
                   else{
                     $('div#td' + sub_category_id +'.col-lg-6.line_items > .item_tax').find('option[value="' + tax + '"]').attr("selected", true); 
                    $('div#td' + sub_category_id +'.col-lg-6.line_items > .item_tax').find('option[value="' + tax + '"]').trigger('change');  
                   }
                   
                     $('div#upd' + sub_category_id).show();
                      autoCalcSetup();
                      
                }
                
                else{
                    //console.log(333);
                   $('.item_price' + sub_category_id).val();
                    $(".item_unit" + sub_category_id).val();
                    $(".desc" + sub_category_id).val();
                    $('.item_id' + sub_category_id).empty(); 
                     $('div#td' + sub_category_id +'.col-lg-6.line_items > .item_tax').find('option:selected').removeAttr("selected");
                     $('div#td' + sub_category_id +'.col-lg-6.line_items > .item_tax').trigger('change');
                      $('div#upd' + sub_category_id).hide();
                }
                      
                }

            });

        });
        
      


        $(document).on('click', '.remove', function() {
            var button_id = $(this).data('button_id');
            var contentToRemove = document.querySelectorAll('#td' + button_id);
            $(contentToRemove).remove(); 
            autoCalcSetup();
        });

    });
</script>


<script type="text/javascript">
    $(document).ready(function() {


     
        function autoCalcSetup1() {
            $('div#cart1').jAutoCalc('destroy');
            $('div#cart1.div.line_items').jAutoCalc({
                keyEventsFire: true,
                decimalPlaces: 2,
                emptyAsZero: true
            });
            $('div#cart1').jAutoCalc({
                decimalPlaces: 2
            });
        }
        autoCalcSetup1();
        
        

         $(document).on('click', '.add1', function() {
            console.log(1);
            
            
            
        var button_id = $(this).data('save_id');
        $('.body_errors'+ button_id).empty();
        //$('.body').find('select, textarea, input').serialize();
        
        var b=$('#td' + button_id).find('.item_name').val();
        var z = $('#td' + button_id).find('.sale_type').val();

        var c=$('div#td' + button_id +'.col-lg-6.line_items').find('.item_quantity').val();
        var d=$('.item_price' + button_id).val();
         var e = $('div#td' + button_id +'.col-lg-6.line_items').find('.item_tax').val();
        
         
        
        if( b == '' || c == '' || d == '' || e == ''){
           $('.body_errors'+ button_id).append('Please Fill Required Fields.');
        
     }
     
     else{
        
        
         $.ajax({
                type: 'GET',
                 url: '<?php echo e(url('pos/sales/add_inv_item')); ?>',
               data: $('#cart > .body').find('select, textarea, input').serialize(),
                cache: false,
                async: true,
                success: function(data) {
                    console.log(data);
                    
           $('#cart1 > .body1 table thead').show();
             $('#cart1 > .body1 table tbody').append(data['list']);
             $('#cart1 > .body1').append(data['list1']);
              autoCalcSetup1();
 
                },
              


            });
            
            
            var contentToRemove = document.querySelectorAll('#td' + button_id);
            $(contentToRemove).remove(); 
            
     }
     

        });



        $(document).on('click', '.remove1', function() {
            var button_id = $(this).data('button_id');
            var contentToRemove = document.querySelectorAll('#lst' + button_id);
            $(contentToRemove).remove(); 
             $(this).closest('tr').remove();
             $(".item_quantity").change();
            autoCalcSetup1();
        });
        
        
          $(document).on('click', '.rem', function() {
            var button_id = $(this).data('button_id');
            var btn_value = $(this).attr("value");
            var contentToRemove = document.querySelectorAll('#lst' + button_id);
            $(contentToRemove).remove(); 
             $(this).closest('tr').remove();
              $('#cart1 > .body1').append('<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +btn_value + '"/>');
              $(".item_quantity").change();
            autoCalcSetup1();
        });



  $(document).on('click', '.edit1', function() {
            var button_id = $(this).data('button_id');
            
            console.log(button_id);
            $.ajax({
                type: 'GET',
                 url: '<?php echo e(url('pos/sales/invModal')); ?>',
                 data: $('#cart1 > .body1 #lst'+button_id).find('select, textarea, input').serialize(),
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
           
            
        });
        
        
            $(document).on('click', '.add_edit_form', function(e) {
            e.preventDefault();
           
            var sub = $(this).data('button_id');
            console.log(sub);
            
            $.ajax({
                data: $('.addEditForm').serialize(),
                type: 'GET',
                 url: '<?php echo e(url('pos/sales/add_inv_item')); ?>',
                dataType: "json",
                success: function(data) {
                    console.log(data);
                  
                  $('#cart1 > .body1 table tbody').find('.trlst'+sub).html(data['list']);
                  $('#cart1 > .body1').find('#lst'+sub).html(data['list1']);
                    $(".item_quantity").change();
              autoCalcSetup1();
           

                }
            })
        });




            $(document).on('click', '.scan', function() {
                var type = 'scan';
                var id = $(this).data('sub_category_id');
                console.log(id);
                $.ajax({
                    type: 'GET',
                      url: '<?php echo e(url('pos/sales/invModal')); ?>',
                    data: {
                        'id': id,
                        'type': type,
                    },
                    cache: false,
                    async: true,
                    success: function(data) {
                        //alert(data);
                        $('#appFormModal').find('.modal-dialog').html(data);
                        
                    },
                    error: function(error) {
                        $('#appFormModal').modal('toggle');

                    }


                });


            });
            
            
              $(document).on('click', '.check_item', function(e) {
                e.preventDefault();
                var sub = $("#select_id").val();
                console.log(sub);
                
                $.ajax({
                    data: $('.addScanForm').serialize(), 
                    type: 'GET',
                    url: '<?php echo e(url('pos/sales/check_item')); ?>',
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('#cart1 > .body1 table thead').show();
                        $('#cart1 > .body1 table tbody').append(data['list']);
                        $('#cart1 > .body1').append(data['list1']);
                        autoCalcSetup1();
                        
                         var contentToRemove = document.querySelectorAll('#td' + sub);
                            $(contentToRemove).remove(); 

                    }
                })
            });
            
            
                            $(document).on('click', '.update', function() {
                var type = 'update';
                var id = $(this).data('sub_category_id');
                var item = $('.item_id' + id).val();
                var location = $('.location').val();
                console.log(id);
                $.ajax({
                    type: 'GET',
                      url: '<?php echo e(url('pos/sales/invModal')); ?>',
                    data: {
                        'id': id,
                        'type': type,
                        'item': item,
                        'location': location,
                    },
                    cache: false,
                    async: true,
                    success: function(data) {
                        //alert(data);
                        $('#appFormModal').find('.modal-dialog').html(data);
                        
                    },
                    error: function(error) {
                        $('#appFormModal').modal('toggle');

                    }


                });


            });
            
            
              $(document).on('click', '.upd_qty', function(e) {
                e.preventDefault();
                var sub = $("#select_id2").val();
                console.log(sub);
                
                $.ajax({
                    data: $('.addUpdateForm').serialize(), 
                    type: 'GET',
                    url: '<?php echo e(url('pos/sales/update_item')); ?>',
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        
                        $(".item_quantity").trigger('change');
                        $('#appFormModal').hide(); 

                    }
                })
            });
            
            
            

/*
            $(document).on('click', '.check_item', function(e) {
                e.preventDefault();
                var sub = $("#select_id").val();
                console.log(sub);
                
                $.ajax({
                    data: $('.addScanForm').serialize(), 
                    type: 'GET',
                    url: '<?php echo e(url('pos/sales/check_item')); ?>',
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

                        var id = response.id;
                        var name = response.name;
                        var price = response.sales_price;
                        var unit = response.unit;
                        var tax = response.tax_rate;
                         var desc = response.description;

                        var option = "<option value='" + id + "'  selected>" + name +
                            " </option>";
                        $('select[data-sub_category_id="' + sub + '"]').append(option);
                        $('.item_price' + sub).val(price);
                        $(".item_unit" + sub).val(unit);
                        $(".item_tax" + sub).val(tax);
                         $('.item_id' + sub).val(id);
                          $(".desc" + sub).val(desc);
                        $('#appFormModal').hide();

                    }
                })
            });
*/



        });
    </script>



    <script type="text/javascript">
        function model(id, type) {


            $.ajax({
                type: 'GET',
                url: '<?php echo e(url('pos/sales/invModal')); ?>',
                data: {
                    'id': id,
                    'type': type,
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

        function saveClient(e) {

            $.ajax({
                type: 'GET',
                url: '<?php echo e(url('pos/sales/save_client')); ?>',
                data: $('.addClientForm').serialize(),
                dataType: "json",
                success: function(response) {
                    console.log(response);

                    var id = response.id;
                    var name = response.name;

                    var option = "<option value='" + id + "'  selected>" + name + " </option>";

                    $('#client_id').append(option);
                    $('#appFormModal').hide();



                }
            });
        }
        
        
         function model2(id, type) {


            $.ajax({
                type: 'GET',
                url: '<?php echo e(url('pos/sales/invModal')); ?>',
                data: {
                    'id': id,
                    'type': type,
                },
                cache: false,
                async: true,
                success: function(data) {
                    //alert(data);
                    $('#app2FormModal > .modal-dialog').html(data);
                      
                    
                },
                error: function(error) {
                    $('#app2FormModal').modal('toggle');

                }
            });

        }
    </script>

    <script>
        $(document).ready(function() {

            $(document).on('change', '.sales', function() {
                var id = $(this).val();
                console.log(id);


                if (id == 'Cash Sales') {
                    $('.bank1').show();
                    $('.bank2').show();
                    $("#bank_id").prop('required',true);

                } else {
                    $('.bank1').hide();
                    $('.bank2').hide();
                     $("#bank_id").prop('required',false);

                }

            });



        });
    </script>
    
    
    
    <script type="text/javascript">
    
        function attach_model(id, type) {

            $.ajax({
                type: 'GET',
                url: '<?php echo e(url('pos/sales/attachModal')); ?>',
                data: {
                    'id': id,
                    'type': type,
                },
                cache: false,
                async: true,
                success: function(data) {
                    //alert(data);
                    $('.table-img').html(data);
                     $('#invoice_id').val(id);
              
                    
                },
                error: function(error) {
                    $('#attachFormModal').modal('toggle');

                }
            });

        }

    
    </script>
    
    <script>
    $(document).ready(function() {
      $(".item_quantity").trigger('change');
      
         $(document).on('click', '.save', function(event) {
   
         $('.item_errors').empty();

          if ( $('#cart1 > .body1 .line_items').length == 0 ) {
               event.preventDefault(); 
    $('.item_errors').append('Please Add Items.');
}
         
         else{
            
         
          
         }
        
    });
    
    
    
    });
    </script>
    
    
  
    </script>
    
    
    <script type="text/javascript">


function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

</script>
     
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/pos/sales/sales_profoma_invoice.blade.php ENDPATH**/ ?>