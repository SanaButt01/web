<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h2 {
            color: #F96D41;
        }
        .btn-back {
            background-color: #F96D41;
            color: #fff;
            height: 40px;
            line-height: 20px;
            padding: 6px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-back:hover {
            background-color: #E75731;
        }
        .form-control {
            height: 40px;
        }
        .form-group {
            margin-bottom: 20px; /* Added margin between form groups */
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px; /* Adjust width as needed */
            background-color: #f8f9fa; /* Sidebar background color */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .main-content {
            margin-left: 220px; /* Adjust according to sidebar width */
            margin-top: 20px; /* Add top margin */
            padding: 20px;
            background-color: #ffffff; /* Change shade of white */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="sidebar">
    <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h2>Edit Admin</h2>
            </div>
        </div>

        <?php if(session('status')): ?>
            <div class="alert alert-primary mb-3">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.update', $admin->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="<?php echo e($admin->name); ?>" class="form-control" placeholder="Name">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="icofont icofont-envelope"></i></span></div>
                            <input type="email" name="email" value="<?php echo e($admin->email); ?>" class="form-control" placeholder="Email" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" placeholder="*****" class="form-control" autocomplete="off">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-back form-control">Submit</button>
        </form>
        <div class="row mt-3">
            <div class="col-md-12">
                <a class="btn btn-back" href="<?php echo e(route('admin.dashboard')); ?>">Back</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH F:\bookscity\resources\views/admin/edit.blade.php ENDPATH**/ ?>