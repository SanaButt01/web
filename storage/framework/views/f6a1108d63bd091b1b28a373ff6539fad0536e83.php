<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
</head>
<style>
     .action-btn {
            width: 100px;
            display: inline-block;
            text-align: center;
        }
        </style>
<body>
 
<div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All books</h2>
            </div>
            <h1>Books List</h1>

<!-- Filter Form -->
<div class="pull-right mb-2">
                <a class="btn " href="<?php echo e(route('admin.book.create')); ?>"style="background-color:black;color:white;"> Add New book</a>
            </div>
        </div>
    </div>
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

<!-- Books List -->
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
        <!-- Example of listing books -->
<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($book->book_id); ?></td>
    <td><?php echo e($book->title); ?></td>
    <td><?php echo e($book->author); ?></td>
    <td><?php echo e($book->category ? $book->category->type : 'No Category'); ?></td>
    <td>
            <img src="<?php echo e(asset('storage/' . $book->path)); ?>" style="height: 50px; width: 50px">
        </td>
        <td><?php echo e($book->price); ?></td>
    <td><?php echo e($book->disc); ?>

    </td>
    <td>
        <form action="<?php echo e(route('book.destroy', $book->book_id)); ?>" method="POST">
            <a href="<?php echo e(route('book.edit', $book->book_id)); ?>" class="btn btn-primary">Edit</a>
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     
   
                                 </form>
          
    </table>

<?php endif; ?>
            
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert "style="background-color:#F96D41;color:white">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
   
</body>
</html><?php /**PATH C:\Users\sanan\Documents\bookscity\resources\views/admin/book/index.blade.php ENDPATH**/ ?>