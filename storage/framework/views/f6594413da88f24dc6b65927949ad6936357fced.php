<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Admin Dashboard')); ?></title>
        <!-- Favicon -->
        <link href="<?php echo e(asset('argon')); ?>/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="<?php echo e(asset('argon')); ?>/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="<?php echo e(asset('argon')); ?>/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- argon CSS -->
        <link type="text/css" href="<?php echo e(asset('argon')); ?>/css/argon.css?v=1.0.0" rel="stylesheet">

        <style>
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                width: 200px;
                background-color: #fff;
                padding-top: 20px;
                overflow-y: auto;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }

            .main-content {
                margin-left: 250px; /* Adjust according to sidebar width */
                padding: 20px; /* Add padding to prevent content from sticking to the sidebar */
            }
        </style>
    </head>
    <body class="<?php echo e($class ?? ''); ?>" style="background-color: #f8f9fe;">
        <?php if(auth()->guard()->check()): ?>
            <!-- Include the sidebar -->
            <div class="sidebar">
                <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <div class="main-content">
            <!-- Include navigation bar -->
            <?php echo $__env->make('layouts.navbars.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Content section -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <?php if(auth()->guard()->guest()): ?>
            <!-- Include footer for guest users -->
            <?php echo $__env->make('layouts.footers.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <!-- Include JavaScript files -->
        <script src="<?php echo e(asset('argon')); ?>/vendor/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo e(asset('argon')); ?>/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        <?php echo $__env->yieldPushContent('js'); ?>
        
        <!-- argon JS -->
        <script src="<?php echo e(asset('argon')); ?>/js/argon.js?v=1.0.0"></script>
    </body>
</html>
<?php /**PATH F:\bookscity\resources\views/layouts/app.blade.php ENDPATH**/ ?>