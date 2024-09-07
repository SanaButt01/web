<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Profile</title>
    <link rel="icon" href="<?php echo e(asset('images/log.jpeg')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>"> <!-- Link to the external stylesheet -->
    
    <style>
        /* Centering the form container */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-box {
            width: 100%;
            max-width: 600px;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Styling the button to align with the form */
        .btn-back {
            background-color: #F96D41;
            color: white;
        }

        .btn-back:hover {
            background-color: #e65c3c;
            color: white;
        }

        /* Adjustments for side panel toggle */
        .main-content.expanded {
            margin-left: 0;
        }

        #side-panel.hidden {
            display: none;
        }
    </style>
</head>
<body>
<?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main-content" id="main-content">
    <div class="container form-container">
        <div class="form-box">
            <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
                <i class="fas fa-bars"></i>
            </button>

            <h2 class="text-center mb-4">My Profile</h2>

            <?php if(session('status')): ?>
                <div class="alert alert-primary mb-3">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.update', $admin->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Id Field -->
                <div class="form-group">
                    <strong>Id:</strong>
                    <input type="text" name="id" value="<?php echo e($admin->id); ?>" class="form-control" placeholder="Id" readonly>
                    <?php $__errorArgs = ['id'];
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

                <!-- Name Field -->
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="<?php echo e($admin->name); ?>" class="form-control" placeholder="Name" readonly>
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

                <!-- Email Field -->
                <div class="form-group">
                    <strong>Email:</strong>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email" value="<?php echo e($admin->email); ?>" class="form-control" placeholder="Email" readonly>
                    </div>
                    <?php $__errorArgs = ['email'];
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

                <!-- Submit Button -->


            </form>

            <!-- Back Button -->
            <div class="form-group text-center mt-4">
                <a class="btn btn-back" href="<?php echo e(route('admin.dashboard')); ?>">Back</a>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleSidePanel() {
        var panel = document.getElementById('side-panel');
        var mainContent = document.getElementById('main-content');
        var toggleBtn = document.getElementById('toggle-btn');
        
        if (panel.classList.contains('hidden')) {
            panel.classList.remove('hidden');
            mainContent.classList.remove('expanded');
            toggleBtn.classList.remove('hidden');
        } else {
            panel.classList.add('hidden');
            mainContent.classList.add('expanded');
            toggleBtn.classList.add('hidden');
        }
    }
</script>

</body>
</html>
<?php /**PATH F:\web\bookscity\resources\views/admin/index.blade.php ENDPATH**/ ?>