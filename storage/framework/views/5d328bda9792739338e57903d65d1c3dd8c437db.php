<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Contents</title>
    <link rel="icon" href="<?php echo e(asset('images/log.jpeg')); ?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>"> <!-- Link to the external stylesheet -->
    <style>
        /* Ensure the main content does not overlap with the side panel */
        .main-content {
            transition: margin-left 0.3s;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 0 10px;
            }

            /* Adjust table for smaller screens */
            .table-responsive {
                overflow-x: auto;
            }

            .toggle-btn-navbar {
                margin-bottom: 15px;
            }

            .side-panel.hidden + .main-content {
                margin-left: 0;
            }
        }

        @media (min-width: 769px) {
            .main-content {
                margin-left: 250px; /* Width of the side panel */
            }
        }

        /* Custom styling for success alert */
        .alert {
            background-color: #F96D41;
            color: white;
        }

       

        /* Adjust the spacing of the button rows and headings */
        .toggle-btn-row, .add-btn-row {
            margin-bottom: 15px;
        }

        /* Center the heading */
        .heading-row {
            text-align: center;
            margin-bottom: 20px;
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
                <h2>All Contents</h2>
            </div>

            <!-- Row for Add New Content Button -->
            <div class="add-btn-row">
                <a class="btn" href="<?php echo e(route('admin.content.create')); ?>" style="background-color:#F96D41;color:white;">
                    <i class="fas fa-plus"></i> Add New Content
                </a>
            </div>

            <!-- Success message -->
            <?php if($message = Session::get('success')): ?>
                <div class="alert">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>

            <!-- Content Table -->
            <?php if($contents->isEmpty()): ?>
                <p>No contents found.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>S.No</th>
                            <th>Description</th>
                            <th width="280px">Action</th>
                        </tr>
                        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($content->content_id); ?></td>
                                <td><?php echo e($content->description); ?></td>
                                <td>
                                    <form action="<?php echo e(route('content.destroy', $content->content_id)); ?>" method="POST">
                                        <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='<?php echo e(route('content.edit', $content->content_id)); ?>'">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger action-btn">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                        <button type="button" class="btn btn-secondary action-btn" onclick="window.location.href='<?php echo e(route('previews.create', $content->content_id)); ?>'">
                                            <i class="fas fa-plus"></i> Add Preview
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
<?php /**PATH F:\web\bookscity\resources\views/admin/content/index.blade.php ENDPATH**/ ?>