<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    </style>
</head>
<body>
    <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="main-content" id="main-content">
        <div class="container" style="margin-top:40px">
            <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>All Categories</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn" href="<?php echo e(route('category.create')); ?>" style="background-color:#F96D41;color:white;">
                            <i class="fas fa-plus"></i> Add New Category
                        </a>
                    </div>
                </div>
            </div>

            <?php if($message = Session::get('success')): ?>
                <div class="alert">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>

            <table class="table table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th width="280px">Action</th>
                </tr>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($category->category_id); ?></td>
                    <td><?php echo e($category->type); ?></td>
                    <td><img src="<?php echo e(asset('storage/'.$category->icon)); ?>" style="height: 50px; width: 50px"></td>
                    <td>
                        <form action="<?php echo e(route('category.destroy', $category->category_id)); ?>" method="POST">
                            <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='<?php echo e(route('category.edit', $category->category_id)); ?>'">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger action-btn">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
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
    </script><?php /**PATH F:\web\bookscity\resources\views/admin/category/index.blade.php ENDPATH**/ ?>