<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('layouts.navbars.navs.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH D:\sana_project\web\resources\views/layouts/navbars/navbar.blade.php ENDPATH**/ ?>