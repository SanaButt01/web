<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('layouts.navbars.navs.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\sanan\Documents\bookscity\resources\views/layouts/navbars/navbar.blade.php ENDPATH**/ ?>