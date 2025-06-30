<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sales Quotations</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if(empty($id)): ?> active show <?php endif; ?>" id="home-tab2"
                                       data-toggle="tab"
                                       href="#home2" role="tab" aria-controls="home" aria-selected="true">Sales
                                        Quotations
                                        List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(!empty($id)): ?> active show <?php endif; ?>" id="profile-tab2"
                                       data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                       aria-selected="false">New Sale Quotation</a>
                                </li>

                            </ul>
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
                                                    style="width: 156.484px;">Ref No
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 136.484px;">Client Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 161.219px;">Due Amount
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 168.1094px;">Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!@empty($salesQuotations)): ?>
                                                <?php $__currentLoopData = $salesQuotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="gradeA even" role="row">

                                                        <td>
                                                            <a class="nav-link" id="profile-tab2"
                                                               href="<?php echo e(route('purchase.show',$row->id)); ?>" role="tab"
                                                               aria-selected="false"><?php echo e($row->reference_no); ?></a>
                                                        </td>


                                                        <td> <?php echo e($row->client->name); ?></td>
                                                        <td> <?php echo e($row->due_amount); ?></td>

                                                        <td>
                                                            <div class="form-inline">
                                                                <?php if($row->approval_1 == ''): ?>

                                                                    <a class="list-icons-item text-primary"
                                                                       title="Edit"
                                                                       onclick="return confirm('Are you sure?')"
                                                                       href="<?php echo e(route('purchase.edit', $row->id)); ?>"><i
                                                                            class="icon-pencil7"></i></a>&nbsp


                                                                    <?php echo Form::open(['route' => ['purchase.destroy',$row->id],
                                                                    'method' => 'delete']); ?>

                                                                    <?php echo e(Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"])); ?>

                                                                    <?php echo e(Form::close()); ?>

                                                                    &nbsp
                                                                <?php endif; ?>
                                                                <div class="dropdown">
                                                                    <a href="#"
                                                                       class="list-icons-item dropdown-toggle text-teal"
                                                                       data-toggle="dropdown"><i class="icon-cog6"></i></a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="nav-link" id="profile-tab2"
                                                                           href="<?php echo e(route('purchase_pdfview',['download'=>'pdf','id'=>$row->id])); ?>"
                                                                           role="tab" aria-selected="false">Download
                                                                            PDF</a>
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
                                <div class="tab-pane fade <?php if(!empty($id)): ?> active show <?php endif; ?>" id="profile2"
                                     role="tabpanel"
                                     aria-labelledby="profile-tab2">

                                    <div class="card">
                                        <div class="card-header">
                                            <?php if(empty($id)): ?>
                                                <h5>Create Sale Quotation</h5>
                                            <?php else: ?>
                                                <h5>Edit Sale Quotation</h5>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    <?php if(isset($id)): ?>
                                                        <?php echo e(Form::model($id, array('route' => array('quotations.update', $id), 'method' => 'PUT'))); ?>


                                                    <?php else: ?>
                                                        <?php echo e(Form::open(['route' => 'quotations.store'])); ?>

                                                        <?php echo method_field('POST'); ?>
                                                    <?php endif; ?>


                                                    <input type="hidden" name="type"
                                                           class="form-control name_list"/>


                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Clients Name</label>
                                                        <div class="col-lg-4">
                                                            <select class="form-control m-b" name="client_id" required
                                                                    id="supplier_id">
                                                                <option value="">Select Client Name</option>
                                                                <?php if(!empty($clients)): ?>
                                                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                        <option <?php if(isset($data)): ?>
                                                                                    <?php echo e($data->client_id == $row->id  ? 'selected' : ''); ?>

                                                                                <?php endif; ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                        <br>
                                                        <h4 align="center">Enter Item Details</h4>
                                                        <hr>

                                                        <button type="button" name="add"
                                                                class="btn btn-success btn-xs add">
                                                            <i
                                                                class="fas fa-plus"> Add item</i></button>
                                                        <br>
                                                        <br>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="cart">
                                                                <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Quantity</th>
                                                                    <th>Price</th>
                                                                    <th>Unit</th>
                                                                    <th>Store</th>
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
                                                                                            class="form-control m-b item_name"
                                                                                            required
                                                                                            data-sub_category_id=<?php echo e($i->order_no); ?>>
                                                                                        <option value="">Select Item
                                                                                            Name
                                                                                        </option><?php $__currentLoopData = $name ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <option value="<?php echo e($n->id); ?>"
                                                                                                    <?php if(isset($i)): ?><?php if($n->id == $i->item_name): ?>
                                                                                                        selected <?php endif; ?> <?php endif; ?> ><?php echo e($n->name); ?></option>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </select></td>
                                                                                <td><input type="number"
                                                                                           name="quantity[]"
                                                                                           class="form-control item_quantity<?php echo e($i->order_no); ?>"
                                                                                           placeholder="quantity"
                                                                                           id="quantity"
                                                                                           value="<?php echo e(isset($i) ? $i->quantity : ''); ?>"
                                                                                           required/></td>
                                                                                <td><input type="text" name="price[]"
                                                                                           class="form-control item_price<?php echo e($i->order_no); ?>"
                                                                                           placeholder="price" required
                                                                                           value="<?php echo e(isset($i) ? $i->price : ''); ?>"/>
                                                                                </td>
                                                                                <td><input type="text" name="unit[]"
                                                                                           class="form-control item_unit<?php echo e($i->order_no); ?>"
                                                                                           placeholder="unit" disabled
                                                                                           value="<?php echo e(isset($i) ? $i->unit : ''); ?>"/>
                                                                                <input type="hidden"
                                                                                       name="saved_items_id[]"
                                                                                       class="form-control item_saved<?php echo e($i->order_no); ?>"
                                                                                       value="<?php echo e(isset($i) ? $i->id : ''); ?>"
                                                                                       required/>
                                                                                <td><input type="text"
                                                                                           name="total_cost[]"
                                                                                           class="form-control item_total<?php echo e($i->order_no); ?>"
                                                                                           placeholder="total" required
                                                                                           value="<?php echo e(isset($i) ? $i->total_cost : ''); ?>"
                                                                                           readonly
                                                                                           jAutoCalc="{quantity} * {price}"/>
                                                                                </td>
                                                                                <input type="hidden" name="items_id[]"
                                                                                       class="form-control name_list"
                                                                                       value="<?php echo e(isset($i) ? $i->id : ''); ?>"/>
                                                                                <td>
                                                                                    <button type="button" name="remove"
                                                                                            class="btn btn-danger btn-xs rem"
                                                                                            value="<?php echo e(isset($i) ? $i->id : ''); ?>">
                                                                                        <i class="icon-trash"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>

                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                </tfoot>
                                                            </table>
                                                        </div>


                                                        <br>
                                                        <div class="form-group row">
                                                            <div class="col-lg-offset-2 col-lg-12">
                                                                <?php if(!@empty($id)): ?>

                                                                    <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                                       href="<?php echo e(route('purchase.index')); ?>">
                                                                        cancel
                                                                    </a>
                                                                    <button
                                                                        class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                        data-toggle="modal" data-target="#myModal"
                                                                        type="submit">Update
                                                                    </button>
                                                                <?php else: ?>
                                                                    <button
                                                                        class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                        type="submit">Save
                                                                    </button>
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
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('.datatable-basic').DataTable({
            autoWidth: false,
            order: [[2, 'desc']],
            "columnDefs": [
                {"targets": [3]}
            ],
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
        $(document).ready(function () {

            $(document).on('click', '.remove', function () {
                $(this).closest('tr').remove();
            });

            $(document).on('change', '.item_name', function () {
                var id = $(this).val();
                var sub_category_id = $(this).data('sub_category_id');
                $.ajax({
                    url: '<?php echo e(url("sales/item")); ?>',
                    type: "GET",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $('.item_price' + sub_category_id).val(data[0]["cost_price"]);
                        $(".item_unit" + sub_category_id).val(data[0]["unit"]);

                    }

                });

            });


        });
    </script>



    <script type="text/javascript">
        $(document).ready(function () {


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

            $('.add').on("click", function (e) {
                count++;
                var html = '';

                html += '<tr class="line_items">';

                // Item select (populated later via JS or server)
                html += '<td><select name="item_name[]" class="form-control m-b item_name" required data-sub_category_id="' + count + '">';
                html += '<option value="">Select Item</option>';
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    html += '<option value="<?php echo e($n->id); ?>"><?php echo e($n->name); ?></option>';
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    html += '</select></td>';

                // Quantity input
                html += '<td><input type="number" name="quantity[]" class="form-control item_quantity" placeholder="Quantity" data-category_id="' + count + '" required /></td>';

                // Price input
                html += '<td><input type="text" name="price[]" class="form-control item_price' + count + '" placeholder="Price" required /></td>';

                // Unit input
                html += '<td><input type="text" name="unit[]" class="form-control item_unit' + count + '" placeholder="Unit" readonly /></td>';

                // Store select (example with dummy options – replace with real data)
                html += '<td><select name="store_id[]" class="form-control m-b item_store" required>';
                html += '<option value="">Select Store</option>';
                <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    html += '<option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>';
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    html += '</select></td>';

                // Remove button
                html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="icon-trash"></i></button></td>';

                html += '</tr>';

                $('tbody').append(html);
                autoCalcSetup();

                $('.m-b').select2({});
            });


            $(document).on('click', '.remove', function () {
                $(this).closest('tr').remove();
                autoCalcSetup();
            });


            $(document).on('click', '.rem', function () {
                var btn_value = $(this).attr("value");
                $(this).closest('tr').remove();
                $('tfoot').append(
                    '<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +
                    btn_value + '"/>');
                autoCalcSetup();
            });

        });
    </script>



    <script type="text/javascript">
        function model(id, type) {

            $.ajax({
                type: 'GET',
                url: '/courier/public/discountModal/',
                data: {
                    'id': id,
                    'type': type,
                },
                cache: false,
                async: true,
                success: function (data) {
                    //alert(data);
                    $('.modal-dialog').html(data);
                },
                error: function (error) {
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
                success: function (response) {
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

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/sales/quotation/index.blade.php ENDPATH**/ ?>