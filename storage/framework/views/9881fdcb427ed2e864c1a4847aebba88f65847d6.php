<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="icon" href="<?php echo e(asset('images/log.jpeg')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <style>
        .main-content {
            transition: margin-left 0.3s;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 0 10px;
            }
        }

        .table-responsive {
            overflow-x: auto;
        }

        /* Layout adjustments for the toggle, add, heading, and filter */
        .toggle-btn-row, .add-btn-row, .filter-row {
            margin-bottom: 15px;
        }

        /* Center the heading */
        .heading-row {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Align the filter controls inline */
        .filter-row .form-inline {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .filter-row .form-group {
            margin-right: 10px;
        }
        /* Add fade-out transition effect */


     
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
                <h2>All Books</h2>
            </div>

            <!-- Row for Add Button -->
            <div class="add-btn-row">
                <a class="btn" href="<?php echo e(route('admin.book.create')); ?>" style="background-color:#F96D41;color:white;">
                    <i class="fas fa-plus"></i> Add New Book
                </a>
            </div>

            <!-- Row for Filter -->
            <div class="filter-row">
                <form action="<?php echo e(route('admin.book.index')); ?>" method="GET" class="form-inline">
                    <div class="form-group">
                        <label for="category_id">Filter by Category:</label>
                        <select name="category_id" id="category_id" class="form-control ml-2">
                            <option value="">All Categories</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->category_id); ?>" 
                                    <?php echo e(request('category_id') == $category->category_id ? 'selected' : ''); ?>>
                                    <?php echo e($category->type); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Filter</button>
                </form>
            </div>

            <!-- Success message if any -->
    <!-- Success message if any -->
<?php if(Session::has('success')): ?>
    <div class="alert alert-success" id="success-alert">
        <?php echo e(Session::get('success')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <div class="alert alert-danger" id="error-alert">
        <?php echo e(Session::get('error')); ?>

    </div>
<?php endif; ?>

            <!-- Table displaying the books -->
            <?php if($books->isEmpty()): ?>
                <p>No books found.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th width="280px">Action</th>
                        </tr>
                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($book->book_id); ?></td>
                                <td><?php echo e($book->title); ?></td>
                                <td><?php echo e($book->author); ?></td>
                                <td><?php echo e($book->category ? $book->category->type : 'No Category'); ?></td>
                                <td><img src="<?php echo e(asset('storage/' . $book->path)); ?>" style="height: 50px; width: 50px"></td>
                                <td><?php echo e($book->price); ?></td>
                                <td><?php echo e($book->disc); ?></td>
                                <td>
                                    <form action="<?php echo e(route('book.destroy', $book->book_id)); ?>" method="POST">
                                        <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='<?php echo e(route('book.edit', $book->book_id)); ?>'">
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
        var toggleBtn = document.getElementById('toggle-btn');
        
        if (panel.classList.contains('hidden')) {
            panel.classList.remove('hidden');
            mainContent.classList.remove('expanded');
        } else {
            panel.classList.add('hidden');
            mainContent.classList.add('expanded');
        }
    }
</script>
<script>
    // Automatically remove success alert after 1 second
    setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            // successAlert.classList.add('fade-out');  // Add fade-out class
            setTimeout(function() {
                successAlert.style.display = 'none';  // Hide the element after fade-out
            }, 500);  // Time for fade-out effect
        }
    }, 1000);  // Time before hiding the alert (1 second)

    // Automatically remove error alert after 1 second
    setTimeout(function() {
        var errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            // errorAlert.classList.add('fade-out');  // Add fade-out class
            setTimeout(function() {
                errorAlert.style.display = 'none';  // Hide the element after fade-out
            }, 500);  // Time for fade-out effect
        }
    }, 1000);  // Time before hiding the alert (1 second)
</script>

<?php /**PATH F:\web\bookscity\resources\views/admin/book/index.blade.php ENDPATH**/ ?>