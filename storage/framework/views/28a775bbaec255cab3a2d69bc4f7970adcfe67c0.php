<?php $__env->startSection('content'); ?>
    <?php echo app('arrilot.widget')->run('DashboardWidgets'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\web\bookscity\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>