<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="icon" href="<?php echo e(asset('images/log.jpeg')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>"> <!-- Link to the external stylesheet -->
    <style>
        /* Ensure the main content does not overlap with the side panel */
        .main-content {
            transition: margin-left 0.3s;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 0 10px;
            }

            .side-panel.hidden + .main-content {
                margin-left: 0;
            }

            .toggle-btn-navbar {
                margin-bottom: 15px;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }

        @media (min-width: 769px) {
            .main-content {
                margin-left: 250px; /* Width of the side panel */
            }
        }

        /* Layout adjustments for toggle, add button, and filter */
        .toggle-btn-row, .add-btn-row {
            margin-bottom: 15px;
        }

        /* Center the heading */
        .heading-row {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Align the action buttons in the table */
    

        /* Custom styling for success alert */
        .alert {
            background-color: #F96D41;
            color: white;
        }

        /* Ensuring responsiveness and overflow handling for table */
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="main-content" id="main-content">
        <div class="container" style="margin-top:40px">
            
            <!-- Row for Toggle Button -->
            <div class="toggle-btn-row">
                <button class="toggle-btn-navbar btn btn-primary" id="toggle-btn" onclick="toggleSidePanel()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Row for Heading -->
            <div class="heading-row">
                <h2>All Categories</h2>
            </div>

            <!-- Row for Add New Category Button -->
            <div class="add-btn-row">
                <a class="btn" href="<?php echo e(route('category.create')); ?>" style="background-color:#F96D41;color:white;">
                    <i class="fas fa-plus"></i> Add New Category
                </a>
            </div>

            <!-- Success message -->
            <?php if($message = Session::get('success')): ?>
                <div class="alert">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>

            <!-- Table for displaying categories -->
            <?php if($categories->isEmpty()): ?>
                <p>No categories found.</p>
            <?php else: ?>
                <div class="table-responsive">
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
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<script>
    function toggleSidePanel() {
        var panel = document.getElementById('side-panel');
        var mainContent = document.getElementById('main-content');
        
        if (panel.classList.contains('hidden')) {
            panel.classList.remove('hidden');
            mainContent.classList.remove('expanded');
        } else {
            panel.classList.add('hidden');
            mainContent.classList.add('expanded');
        }
    }
</script>
<?php /**PATH F:\web\bookscity\resources\views/admin/category/index.blade.php ENDPATH**/ ?>