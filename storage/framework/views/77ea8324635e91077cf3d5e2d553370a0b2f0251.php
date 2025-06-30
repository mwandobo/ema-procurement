	<!-- /core JS files -->
<script src="<?php echo e(asset('global_assets/js/main/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('global_assets/js/main/bootstrap.bundle.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets2/js/bootbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets2/js/bootstrap-datepicker.min.js')); ?>"></script>
	<!-- Theme JS files -->
	<script src="<?php echo e(asset('global_assets/js/plugins/visualization/d3/d3.min.js')); ?>"></script>
	<script src="<?php echo e(asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js')); ?>"></script>
	<script src="<?php echo e(asset('global_assets/js/plugins/ui/moment/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('global_assets/js/plugins/pickers/daterangepicker.js')); ?>"></script>

	<script src="<?php echo e(asset('assets2/js/app.js')); ?>"></script>
	

		<!-- Theme JS files -->
	<script src="<?php echo e(asset('global_assets/js/plugins/tables/datatables/datatables.min.js')); ?>"></script>

	<script src="<?php echo e(asset('global_assets/js/demo_pages/datatables_basic.js')); ?>"></script>

    
   
<!-- /theme JS files -->
	<!-- /theme JS files -->

<script type="text/javascript" src="<?php echo e(asset('assets2/js/downloadFile.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>



<script src="<?php echo e(asset('global_assets/js/demo_pages/components_modals.js')); ?>"></script>

   <!-- new js -->


   <!-- end new js -->


   <script src="https://logistic.ema.co.tz/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo e(asset('plugins/sweetalerts/sweetalert2.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/all.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jautocalc.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/jQuery/jQuery.print.js')); ?>"></script>


    <?php echo Html::script('plugins/table/datatable/datatables.js'); ?>

    <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
    <?php echo Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js'); ?>

    <?php echo Html::script('plugins/table/datatable/button-ext/jszip.min.js'); ?>

    <?php echo Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js'); ?>

    <?php echo Html::script('plugins/table/datatable/button-ext/buttons.print.min.js'); ?>

    <!-- The following JS library files are loaded to use PDF Options-->
    <?php echo Html::script('plugins/table/datatable/button-ext/pdfmake.min.js'); ?>

    <?php echo Html::script('plugins/table/datatable/button-ext/vfs_fonts.js'); ?>

	<?php echo Html::script('global_assets/js/main/bootstrap.bundle.min.js'); ?>

   
    <script src="<?php echo e(asset('global_assets/js/plugins/tables/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
   
    <script>
        $(document).ready(function(){
            /*
                         * Multiple drop down select
                         */
            $('.m-b').select2({ width: '100%', });



        });
    </script>
    
    <script>
  $(document).ready(function(){
$( '.append-button-single-field' ).select2( {
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
} );

 });
</script>

<script type="text/javascript" >
    function CheckAll(obj){
        var row = obj.parentNode.parentNode;
        var inputs = row.getElementsByTagName("input");

        for(var i = 0; i < inputs.length; i++){
            if(inputs[i].type == "checkbox") {
                inputs[i].checked = obj.checked;
            }

        }
    }

    </script>

    <script>

$(document).ready(function(){

        $('#select-all').click( function()  {

    $('input[type="checkbox"]').prop('checked', this.checked);

})

});

</script>

<?php echo $__env->yieldContent('scripts'); ?>
<?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/layout/scripts.blade.php ENDPATH**/ ?>