<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isMember')): ?>
<script type="text/javascript">

 window.location ="<?php echo e(url('members/dashboard')); ?>";

</script>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isVisitor')): ?>
<script type="text/javascript">

 window.location ="<?php echo e(url('visitors/dashboard')); ?>";

</script>
<?php endif; ?>

<script type="text/javascript">

 window.location ="<?php echo e(url('staffs/dashboard')); ?>";

</script>
<?php /**PATH /Users/user/Projects/emasuite/ema-procurement/resources/views/home.blade.php ENDPATH**/ ?>