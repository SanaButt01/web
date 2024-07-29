<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All books</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn " href="<?php echo e(route('book.create')); ?>"style="background-color:#F96D41;color:white;"> Add New book</a>
            </div>
        </div>
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert "style="background-color:#F96D41;color:white">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($book->id); ?></td>
            <td><?php echo e($book->title); ?></td>
            <td><?php echo e($book->author); ?></td>
            <td><?php echo e($book->description); ?></td>
            <td><?php echo e($book->price); ?></td>
            <td>
                                        <img src="<?php echo e(asset('storage/'.$book->path)); ?>" style="height: 50px; width: 50px">
                                    </td>
            <td>
                <form action="<?php echo e(route('book.destroy',$book->id)); ?>" method="Post">
    
                    <a class="btn" href="<?php echo e(route('book.edit',$book->id)); ?>"style="background-color:#F96D41;color:white;">Edit</a>
   
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
      
                    <button type="submit" class="btn"style="background-color:#F96D41;color:white;">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

</body>
</html><?php /**PATH F:\bookscity\resources\views/admin/Book/index.blade.php ENDPATH**/ ?>