<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Admin Dashboard')); ?></title>
    <!-- Favicon -->

    <link rel="icon" href="<?php echo e(asset('images/log.jpeg')); ?>" type="image/x-icon">
    <!-- Fonts -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="<?php echo e(asset('argon')); ?>/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="<?php echo e(asset('argon')); ?>/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- argon CSS -->
    <link type="text/css" href="<?php echo e(asset('argon')); ?>/css/argon.css?v=1.0.0" rel="stylesheet">
</head>
<body class="<?php echo e($class ?? ''); ?>" style="background-color: #f8f9fe;">
    <?php if(auth()->guard()->check()): ?>
        <!-- Include the sidebar -->
        <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="main-content" id="main-content">
        <!-- Include navigation bar -->
        <?php echo $__env->make('layouts.navbars.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content section -->
        <?php echo $__env->yieldContent('content'); ?>
    </div>

  
    <!-- Include JavaScript files -->
    <script src="<?php echo e(asset('argon')); ?>/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo e(asset('argon')); ?>/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php echo $__env->yieldPushContent('js'); ?>
    
    <!-- argon JS -->
    <script src="<?php echo e(asset('argon')); ?>/js/argon.js?v=1.0.0"></script>
</body>
</html>
<?php /**PATH D:\sana_project\web\resources\views/layouts/app.blade.php ENDPATH**/ ?>