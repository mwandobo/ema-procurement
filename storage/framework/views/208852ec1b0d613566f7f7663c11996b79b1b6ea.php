<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Trucks History</h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade <?php if(empty($id)): ?> active show <?php endif; ?>" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <br>
                                <div class="panel-heading">
                                
                                    <h6 class="panel-title"  style="font-family: 'Dancing Script', cursive;font-weight: bold; 
                                    background: linear-gradient(to right, #4CAF50, #2196F3); -webkit-background-clip: text; -webkit-text-fill-color:transparent;">

                                        <?php if(!empty($start_date)): ?>
                                         Truck Details:  <?php echo e($truck_details); ?> 
                                        <?php endif; ?>
                                    </h6>
                                </div>

                                <br>
                                <div class="panel-body hidden-print">
                                    <?php echo Form::open(array('url' => '#', 'method' => 'post','class'=>'form-horizontal',
                                    'name' => 'form')); ?>

                                    <div class="row">

                                        
                                        <div class="col-md-4">
                                            <label class="">Start Date</label>
                                            <input name="start_date" id="start_date" type="date"
                                                class="form-control date-picker" required value="<?php
                                                if (!empty($start_date)) {
                                                    echo $start_date;
                                                } else {
                                                    echo date('Y-m-d', strtotime('first day of january this year'));
                                                }
                                                ?>">

                                        </div>
                                        <div class="col-md-4">
                                            <label class="">End Date</label>
                                            <input name="end_date" id="end_date" type="date"
                                                class="form-control date-picker" required value="<?php
                                                if (!empty($end_date)) {
                                                    echo $end_date;
                                                } else {
                                                    echo date('Y-m-d');
                                                }
                                                ?>">
                                        </div>

                                     


                                        <div class="col-md-4">
                                            <label class="">Trucks</label>

                                            <select name="truck_id" class="form-control m-b truck"
                                                id="truck_id" required>
                                                <option value="">Select Truck</option>
                                                
                                                
                                                 <?php if(!empty($trucks[0])): ?>

                                                <?php $__currentLoopData = $trucks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($br->id); ?>"><?php echo e($br->truck_name); ?> - <?php echo e($br->reg_no); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <option value="all">All Trucks</option>
                                                <?php endif; ?>

                                                
                                                
                                            </select>

                                        </div>


                                        <div class="col-md-4">
                                            <br><button type="submit" class="btn btn-success"
                                                id="btnFiterSubmitSearch">Search</button>
                                                
                                            <a href="<?php echo e(Request::url()); ?>" class="btn btn-danger" >Reset</a>
                                            <br>
                                           

                                        </div>
                                    </div>

                                    <?php echo Form::close(); ?>


                                </div>


                                 <br>
                                
                                <?php if(!empty($start_date)): ?>


                                <div class="panel panel-white">
                                    <div class="panel-body ">


                                        <div class="table-responsive">
          
                                            <div id="map" style="height: 500px; width: 100%;"></div>
                                        
                                        
                                        </div>


                                    </div>
                                </div>


                                

                                <?php endif; ?>

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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDv8vz14oxg6iZbw_qJFtKU8gomGJcQCPk&callback=initMap" async defer></script>
 
<script>
    function initMap() {
        var center = { lat: -6.369028, lng: 34.888822 }; // Center of Tanzania
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: center
        });

        <?php if(count($histories) > 0): ?>

        <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $truck_dt = $truckMap[$row['device_id']] ?? null;
            ?>

            var marker = new google.maps.Marker({
                position: { lat: <?php echo e($row['latitude']); ?>, lng: <?php echo e($row['longitude']); ?> },
                map: map,
                title: "<?php echo e(e($row['location_name'])); ?>"
            });

            var contentString = `
                <h3>Location: <?php echo e(e($row['location_name'])); ?></h3>
                <h3>Truck: <?php echo e($truck_dt ? e($truck_dt->truck_name . ' - ' . $truck_dt->reg_no) : 'Unknown'); ?></h3>
                <p>Speed: <?php echo e(e($row['speed'])); ?></p>
                <p>Time: <?php echo e(e($row['sent'])); ?></p>
                <p>IMEI: <?php echo e(e($row['imei'])); ?></p>
            `;

            attachInfoWindow(marker, contentString);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>
    }

    function attachInfoWindow(marker, content) {
        var infoWindow = new google.maps.InfoWindow({ content: content });

        marker.addListener('click', function () {
            infoWindow.open(marker.get('map'), marker);
        });
    }
</script>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/truck/tracking_history.blade.php ENDPATH**/ ?>