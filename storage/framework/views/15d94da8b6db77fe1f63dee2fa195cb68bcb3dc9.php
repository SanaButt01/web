<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Categories</title>
    <link rel="icon" href="<?php echo e(asset('images/log.jpeg')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>"> <!-- Link to the external stylesheet -->
</head>
<body>

    <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="main-content" id="main-content">
        <div class="container">
            <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="row"style="text-align:center">
                <div class="col-lg-12 mb-4">
                    <h2>Add New Category</h2>
                </div>
            </div>

            <!-- Display Success or Error Alert -->
            <?php if(session('status')): ?>
                <div class="alert alert-success mb-3">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

          

            <form action="<?php echo e(route('category.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Category Type:</strong>
                            <input type="text" name="type" class="form-control" placeholder="Category Type">
                            <?php $__errorArgs = ['type'];
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
                            <strong>Image:</strong>
                            <input type="file" name="icon" class="form-control" placeholder="Category Image">
                            <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                      </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-back form-control" >Submit</button>
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col-md-12">
                    <a class="btn btn-back" href="<?php echo e(route('category.index')); ?>" >Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

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
<?php /**PATH F:\web\bookscity\resources\views/admin/category/create.blade.php ENDPATH**/ ?>