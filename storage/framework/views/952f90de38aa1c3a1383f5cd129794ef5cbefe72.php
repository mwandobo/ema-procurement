<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Purchase Quotation</h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
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
                                                    style="width: 136.484px;">Purchase Date</th>
                                                
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 101.219px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 108.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!@empty($purchases)): ?>
                                            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="gradeA even" role="row">

                                                <td>
                                                    <a class="nav-link" id="profile-tab2"
                                                        href="<?php echo e(route('bar_purchase.show',$row->id)); ?>" role="tab"
                                                        aria-selected="false"><?php echo e($row->reference_no); ?></a>
                                                </td>


                                                <td><?php echo e(Carbon\Carbon::parse($row->purchase_date)->format('d/m/Y')); ?></td>

                                                


                                                <td>
                                                    <?php if($row->status == 0): ?>
                                                    <div class="badge badge-danger badge-shadow">Not Approved</div>
                                                    <?php elseif($row->status == 1): ?>
                                                    <div class="badge badge-warning badge-shadow">Approved</div>
                                                    <?php elseif($row->status == 2): ?>
                                                    <div class="badge badge-info badge-shadow">Partially Paid</div>
                                                    <?php elseif($row->status == 3): ?>
                                                    <span class="badge badge-success badge-shadow">Fully Paid</span>
                                                    <?php elseif($row->status == 4): ?>
                                                    <span class="badge badge-danger badge-shadow">Cancelled</span>

                                                    <?php endif; ?>
                                                </td>


                                                <td>
                                                    <div class="form-inline">

                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item dropdown-toggle text-teal" data-toggle="dropdown"><i class="icon-cog6"></i></a>
                                                            <div class="dropdown-menu">
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage-first-approval', 'manage-second-approval','manage-third-approval'])): ?>
                                                                <?php if( $row->status == 1): ?>
                                                                <a class="nav-link" id="profile-tab2" data-id="<?php echo e($row->id); ?>" data-type="order" onclick="model(<?php echo e($row->id); ?>,'order')"
                                                                    href="" data-toggle="modal" data-target="#appFormModal"
                                                                    role="tab"
                                                                    aria-selected="false">Create Order</a>
                                                                <?php endif; ?>
                                                                <?php endif; ?>
                                                                <a class="nav-link" id="profile-tab2" href="<?php echo e(route('bar_purchase_pdfview',['download'=>'pdf','id'=>$row->id])); ?>"
                                                                    role="tab" aria-selected="false">Download PDF</a>
                                                            </div>
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
                                        <?php if(empty($id)): ?>
                                        <h5>Create Purchase</h5>
                                        <?php else: ?>
                                        <h5>Edit Purchase</h5>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <?php if(isset($id)): ?>
                                                <?php echo e(Form::model($id, array('route' => array('bar_purchase.update', $id), 'method' => 'PUT'))); ?>


                                                <?php else: ?>
                                                <?php echo e(Form::open(['route' => 'bar_purchase.store'])); ?>

                                                <?php echo method_field('POST'); ?>
                                                <?php endif; ?>

                                                <input type="hidden" name="type"
                                                    class="form-control name_list"
                                                    value="<?php echo e($type); ?>" />

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Location</label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control m-b" name="location" required
                                                            id="location">
                                                            <option value="">Select Location</option>
                                                            <?php if(!empty($location)): ?>
                                                            <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <option <?php if(isset($data)): ?>
                                                                <?php echo e($data->location == $loc->id  ? 'selected' : ''); ?>

                                                                <?php endif; ?> value="<?php echo e($loc->id); ?>"><?php echo e($loc->name); ?></option>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>

                                                        </select>

                                                    </div>
                                                    <label class="col-lg-2 col-form-label">Supplier Name</label>
                                                    <div class="col-lg-4">

                                                        <select class="form-control m-b" name="supplier_id" required
                                                            id="supplier_id">
                                                            <option value="">Select Supplier Name</option>
                                                            <?php if(!empty($supplier)): ?>
                                                            <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <option <?php if(isset($data)): ?>
                                                                <?php echo e($data->supplier_id == $row->id  ? 'selected' : ''); ?>

                                                                <?php endif; ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Purchase Date</label>
                                                    <div class="col-lg-4">
                                                        <input type="date" name="purchase_date"
                                                            placeholder="0 if does not exist"
                                                            value="<?php echo e(isset($data) ? $data->purchase_date : date('Y-m-d')); ?>"
                                                            class="form-control">
                                                    </div>
                                                    <label class="col-lg-2 col-form-label">Due Date</label>
                                                    <div class="col-lg-4">
                                                        <input type="date" name="due_date"
                                                            placeholder="0 if does not exist"
                                                            value="<?php echo e(isset($data) ? $data->due_date : strftime(date('Y-m-d', strtotime("+10 days")))); ?>"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <br>
                                                <h4 align="center">Enter Item Details</h4>
                                                <input type="hidden" name="exchange_code" value="<?php echo e(isset($data) ? $data->exchange_code : 'TZS'); ?>" class="form-control" required>
                                                <input type="hidden" name="exchange_rate" value="<?php echo e(isset($data) ? $data->exchange_rate : '1.00'); ?>" class="form-control" required>
                                                <hr>
                                                <button type="button" name="add" class="btn btn-success btn-xs add"><i
                                                        class="fas fa-plus"> Add item</i></button><br>
                                                <br>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="cart">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                                <th>Unit</th>
                                                                <th>Tax</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                        </tbody>
                                                        <tfoot>
                                                            <?php if(!empty($id)): ?>
                                                            <?php if(!empty($items)): ?>
                                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr class="line_items">
                                                                <td><select name="item_name[]"
                                                                        class="form-control m-b item_name" required
                                                                        data-sub_category_id=<?php echo e($i->order_no); ?>>
                                                                        <option value="">Select Item Name</option><?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($n->id); ?>"
                                                                            <?php if(isset($i)): ?><?php if($n->id == $i->item_name): ?>
                                                                            selected <?php endif; ?> <?php endif; ?> ><?php echo e($n->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select></td>
                                                                <td><input type="number" name="quantity[]"
                                                                        class="form-control item_quantity<?php echo e($i->order_no); ?>"
                                                                        placeholder="quantity" id="quantity"
                                                                        value="<?php echo e(isset($i) ? $i->quantity : ''); ?>"
                                                                        required /></td>
                                                                <td><input type="text" name="price[]"
                                                                        class="form-control item_price<?php echo e($i->order_no); ?>"
                                                                        placeholder="price" required
                                                                        value="<?php echo e(isset($i) ? $i->price : ''); ?>" /></td>
                                                                <td><input type="text" name="unit[]"
                                                                        class="form-control item_unit<?php echo e($i->order_no); ?>"
                                                                        placeholder="unit" required
                                                                        value="<?php echo e(isset($i) ? $i->unit : ''); ?>" />
                                                                <td><select name="tax_rate[]"
                                                                        class="form-control m-b item_tax'+count<?php echo e($i->order_no); ?>"
                                                                        required>
                                                                        <option value="0">Select Tax Rate</option>
                                                                        <option value="0" <?php if(isset($i)): ?><?php if('0'==$i->
                                                                            tax_rate): ?> selected <?php endif; ?> <?php endif; ?>>No tax</option>
                                                                        <option value="0.18" <?php if(isset($i)): ?><?php if('0.18'==$i->
                                                                            tax_rate): ?> selected <?php endif; ?> <?php endif; ?>>18%</option>
                                                                    </select></td>
                                                                <input type="hidden" name="total_tax[]"
                                                                    class="form-control item_total_tax<?php echo e($i->order_no); ?>'"
                                                                    placeholder="total" required
                                                                    value="<?php echo e(isset($i) ? $i->total_tax : ''); ?>" readonly
                                                                    jAutoCalc="{quantity} * {price} * {tax_rate}" />
                                                                <input type="hidden" name="saved_items_id[]"
                                                                    class="form-control item_saved<?php echo e($i->order_no); ?>"
                                                                    value="<?php echo e(isset($i) ? $i->id : ''); ?>"
                                                                    required />
                                                                <td><input type="text" name="total_cost[]"
                                                                        class="form-control item_total<?php echo e($i->order_no); ?>"
                                                                        placeholder="total" required
                                                                        value="<?php echo e(isset($i) ? $i->total_cost : ''); ?>"
                                                                        readonly jAutoCalc="{quantity} * {price}" /></td>
                                                                <input type="hidden" name="items_id[]"
                                                                    class="form-control name_list"
                                                                    value="<?php echo e(isset($i) ? $i->id : ''); ?>" />
                                                                <td><button type="button" name="remove"
                                                                        class="btn btn-danger btn-xs rem"
                                                                        value="<?php echo e(isset($i) ? $i->id : ''); ?>"><i class="icon-trash"></i></button></td>
                                                            </tr>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                            <?php endif; ?>

                                                            <tr class="line_items">
                                                                <td colspan="4"></td>
                                                                <td><span class="bold">Sub Total </span>: </td>
                                                                <td><input type="text" name="subtotal[]"
                                                                        class="form-control item_total"
                                                                        placeholder="subtotal" required
                                                                        jAutoCalc="SUM({total_cost})" readonly></td>
                                                            </tr>
                                                            <tr class="line_items">
                                                                <td colspan="4"></td>
                                                                <td><span class="bold">Tax </span>: </td>
                                                                <td><input type="text" name="tax[]"
                                                                        class="form-control item_total" placeholder="tax"
                                                                        required jAutoCalc="SUM({total_tax})" readonly>
                                                                </td>
                                                            </tr>
                                                            <?php if(!@empty($data->discount > 0)): ?>
                                                            <tr class="line_items">
                                                                <td colspan="4"></td>
                                                                <td><span class="bold">Discount</span>: </td>
                                                                <td><input type="text" name="discount[]"
                                                                        class="form-control item_discount"
                                                                        placeholder="total" required
                                                                        value="<?php echo e(isset($data) ? $data->discount : ''); ?>"
                                                                        readonly></td>
                                                            </tr>
                                                            <?php endif; ?>

                                                            <tr class="line_items">
                                                                <td colspan="4"></td>
                                                                <?php if(!@empty($data->discount > 0)): ?>
                                                                <td><span class="bold">Total</span>: </td>
                                                                <td><input type="text" name="amount[]"
                                                                        class="form-control item_total" placeholder="total"
                                                                        required jAutoCalc="{subtotal} + {tax} - {discount}"
                                                                        readonly></td>
                                                                <?php else: ?>
                                                                <td><span class="bold">Total</span>: </td>
                                                                <td><input type="text" name="amount[]"
                                                                        class="form-control item_total" placeholder="total"
                                                                        required jAutoCalc="{subtotal} + {tax}" readonly>
                                                                </td>
                                                                <?php endif; ?>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>


                                                <br>
                                                <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        <?php if(!@empty($id)): ?>

                                                        <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                            href="<?php echo e(route('bar_purchase.index')); ?>">
                                                            cancel
                                                        </a>
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

<!-- discount Modal -->
<div class="modal fade" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
    </div>
</div>

<!-- supplier Modal -->
<div class="modal fade show" data-backdrop="" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Add Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addClientForm" method="post" action="javascript:void(0)">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 ">

                                    <div class="form-group row"><label
                                            class="col-lg-2 col-form-label">Name</label>

                                        <div class="col-lg-10">
                                            <input type="text" name="name" id="name"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label
                                            class="col-lg-2 col-form-label">Phone</label>

                                        <div class="col-lg-10">
                                            <input type="text" name="phone" id="phone"
                                                class="form-control" placeholder="+255713000000" required>
                                        </div>
                                    </div>

                                    <div class="form-group row"><label
                                            class="col-lg-2 col-form-label">Email</label>
                                        <div class="col-lg-10">
                                            <input type="email" name="email" id="email"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row"><label
                                            class="col-lg-2 col-form-label">Address</label>

                                        <div class="col-lg-10">
                                            <textarea name="address" id="address" class="form-control" required>  </textarea>


                                        </div>
                                    </div>

                                    <div class="form-group row"><label
                                            class="col-lg-2 col-form-label">TIN</label>

                                        <div class="col-lg-10">
                                            <input type="text" name="TIN" id="TIN"
                                                value="<?php echo e(isset($data) ? $data->TIN : ''); ?>"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row"><label
                                            class="col-lg-2 col-form-label">VAT</label>

                                        <div class="col-lg-10">
                                            <input type="text" name="VAT" id="VAT"
                                                value="<?php echo e(isset($data) ? $data->VAT : ''); ?>"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary" id="save" onclick="saveSupplier(this)" data-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $('.datatable-basic').DataTable({
        autoWidth: false,
        order: [
            [2, 'desc']
        ],
        "columnDefs": [{
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

<script>
    $(document).ready(function() {

        $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
        });

        $(document).on('change', '.item_name', function() {
            var id = $(this).val();
            var sub_category_id = $(this).data('sub_category_id');
            $.ajax({
                url: '<?php echo e(url("pos/purchases/findInvPrice")); ?>',
                type: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('.item_price' + sub_category_id).val(data[0]["cost_price"]);
                    $(".item_unit" + sub_category_id).val(data[0]["unit"]);

                }

            });

        });

        $('.m-b').select2({});
    });
</script>



<script type="text/javascript">
    $(document).ready(function() {


        var count = 0;


        function autoCalcSetup() {
            $('table#cart').jAutoCalc('destroy');
            $('table#cart tr.line_items').jAutoCalc({
                keyEventsFire: true,
                decimalPlaces: 2,
                emptyAsZero: true
            });
            $('table#cart').jAutoCalc({
                decimalPlaces: 2
            });
        }
        autoCalcSetup();

        $('.add').on("click", function(e) {

            count++;
            var html = '';
            html += '<tr class="line_items">';
            html +=
                '<td><select name="item_name[]" class="form-control m-b item_name" required  data-sub_category_id="' +
                count +
                '"><option value="">Select Item</option><?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($n->id); ?>"><?php echo e($n->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td>';
            html +=
                '<td><input type="number" name="quantity[]" class="form-control item_quantity" data-category_id="' +
                count + '"placeholder ="quantity" id ="quantity" required /></td>';
            html += '<td><input type="text" name="price[]" class="form-control item_price' + count +
                '" placeholder ="price" required  value=""/></td>';
            html += '<td><input type="text" name="unit[]" class="form-control item_unit' + count +
                '" placeholder ="unit" required /></td>';
            html += '<td><select name="tax_rate[]" class="form-control m-b item_tax' + count +
                '" required ><option value="0">Select Tax Rate</option><option value="0">No tax</option><option value="0.18">18%</option></select></td>';
            html += '<input type="hidden" name="total_tax[]" class="form-control item_total_tax' + count +
                '" placeholder ="total" required readonly jAutoCalc="{quantity} * {price} * {tax_rate}"   />';

            html += '<td><input type="text" name="total_cost[]" class="form-control item_total' + count +
                '" placeholder ="total" required readonly jAutoCalc="{quantity} * {price}" /></td>';
            html +=
                '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="icon-trash"></i></button></td>';

            $('tbody').append(html);
            autoCalcSetup();
            /*
             * Multiple drop down select
             */
            $('.m-b').select2({});
        });



        $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
            autoCalcSetup();
        });


        $(document).on('click', '.rem', function() {
            var btn_value = $(this).attr("value");
            $(this).closest('tr').remove();
            $('tfoot').append(
                '<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +
                btn_value + '"/>');
            autoCalcSetup();
        });

    });
</script>

<script>
    /*
     * Multiple drop down select
     */
    $('.m-b').select2({});
</script>

<script type="text/javascript">
    function model(id, type) {

        let url = '<?php echo e(route("bar_purchase.show", ":id")); ?>';
        url = url.replace(':id', id)
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                'type': type,
            },
            cache: false,
            async: true,
            success: function(data) {
                //alert(data);
                $('.modal-dialog').html(data);
            },
            error: function(error) {
                $('#appFormModal').modal('toggle');

            }
        });

    }

    function saveSupplier(e) {

        var name = $('#name').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var TIN = $('#TIN').val();
        var VAT = $('#VAT').val();

        $.ajax({
            type: 'GET',
            url: '<?php echo e(url("tyre/addSupp")); ?>',
            data: {
                'name': name,
                'phone': phone,
                'email': email,
                'address': address,
                'TIN': TIN,
                'VAT': VAT,
            },
            dataType: "json",
            success: function(response) {
                console.log(response);

                var id = response.id;
                var name = response.name;

                var option = "<option value='" + id + "'  selected>" + name + " </option>";

                $('#supplier_id').append(option);
                $('#appFormModal').hide();

            }
        });
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/bar/pos/purchases/purchase_order.blade.php ENDPATH**/ ?>