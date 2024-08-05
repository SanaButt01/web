<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
            .main-content {
            margin-left: 220px;
            margin-top: 20px;
            padding: 20px;
            transition: margin-left .3s;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        

        .main-content.fullscreen {
            margin-left: 0;
        }
        
        body {
            background-color: #f8f9fa;
        }
        .action-btn {
            width: 100px;
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
    
        <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="main-content"id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>All Books</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn" href="<?php echo e(route('admin.book.create')); ?>" style="background-color:#F96D41;color:white;">
                            <i class="fas fa-plus"></i> Add New Book
                        </a>
                    </div>
                </div>
            </div>

            <?php if($message = Session::get('success')): ?>
                <div class="alert" style="background-color:#F96D41;color:white">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.book.index')); ?>" method="GET" class="form-inline mb-3">
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

            <?php if($books->isEmpty()): ?>
                <p>No books found.</p>
            <?php else: ?>
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
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH F:\bookscity\resources\views/admin/book/index.blade.php ENDPATH**/ ?>