<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


	<title><?php echo $__env->yieldContent('title',''); ?> DIY | DIY</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('global_assets/css/icons/icomoon/styles.min.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('assets2/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
     <link href="<?php echo e(asset('assets2/css/datepicker.min.css')); ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/toastr.min.css')); ?>">
  
<!-- Core JS files -->
	<script src="<?php echo e(asset('global_assets/js/main/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('global_assets/js/main/bootstrap.bundle.min.js')); ?>"></script>

<!-- /chart JS files -->
<script src="<?php echo e(asset('global_assets/js/plugins/visualization/echarts/echarts.min.js')); ?>"></script>
<script src="<?php echo e(asset('global_assets/js/plugins/visualization/charts-js/charts.js')); ?>"></script>
	

    <?php echo Html::script('plugins/table/datatable/datatables.js'); ?>

    <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
    <?php echo Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js'); ?>

    <?php echo Html::script('plugins/table/datatable/button-ext/jszip.min.js'); ?>

    <?php echo Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js'); ?>

    <?php echo Html::script('plugins/table/datatable/button-ext/buttons.print.min.js'); ?>

    <!-- The following JS library files are loaded to use PDF Options-->
    <?php echo Html::script('plugins/table/datatable/button-ext/pdfmake.min.js'); ?>

    <?php echo Html::script('plugins/table/datatable/button-ext/vfs_fonts.js'); ?>

	
   
    <script>
        $(document).ready(function(){
            /*
                         * Multiple drop down select
                         */
            $('.m-b').select2({ width: '100%', });



        });
    </script>


    <!-- Stack array for including inline js or scripts -->
<?php echo $__env->yieldPushContent('plugin-scripts'); ?>

<?php echo $__env->yieldPushContent('custom-scripts'); ?>


<!-- Stack array for including inline css or head elements -->
<?php echo $__env->yieldPushContent('plugin-styles'); ?>




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

</head>
<?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/layout/header.blade.php ENDPATH**/ ?>