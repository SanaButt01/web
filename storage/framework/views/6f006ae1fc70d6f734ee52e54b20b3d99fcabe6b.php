<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo e(asset('images/log.jpeg')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.7);
        }

        .card-header {
            border-radius: 10px 10px 0 0;
            background-color: transparent;
          
            font-weight: 700;
            color: #000510;
        }

        .card-body {
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control {
            background-color: #f5f5f5;
        }

        .input-group-text {
            background-color: #f5f5f5;
            border: none;
        }

        .btn-primary {
            background-color: #000510;
            border-color: #000510;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #e75731;
            border-color: #e75731;
        }

        .btn-primary:focus {
            box-shadow: none;
        }

        .form-check-label {
            color: #333;
        }

        .btn-link {
            color: #000510;
        }

        .btn-link:hover {
            color: #e75731;
        }

        .navbar-brand img {
            max-height: 50px;
        }

        .container-fluid {
            background-image: url('images/back.jpg');
            background-size: cover;
            background-position: center;
            padding-top: 50px;
            padding-bottom: 50px;
            background-color: rgba(249, 249, 249, 0.8);
        }

        @media (max-width: 768px) {
            .col-md-6 {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    

<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center" style="font-size:40px"><?php echo e(__('ADMIN LOGIN')); ?></div>

            <div class="card-body">
                <form method="POST" action="<?php echo e(route('admin.submit.login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="email" class="form-label"><?php echo e(__('Email Address')); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label"><?php echo e(__('Password')); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <a class="btn btn-link" href="<?php echo e(route('admin.register')); ?>">
                        <?php echo e(__('Forgot Your Password?')); ?>

                    </a>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('Login')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php /**PATH D:\sana_project\web\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>