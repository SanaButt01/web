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
                <h2>Sale's Books</h2>
            </div>
            <h1>Books List</h1>

<!-- Filter Form -->
<div class="pull-right mb-2">
                <a class="btn " href="<?php echo e(route('disc.book.create')); ?>"style="background-color:black;color:white;"> Add New book</a>
            </div>
        </div>
    </div>

<!-- Books List -->

        
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Author</th>
         
           <th>Image</th>
           <th>Discount</th>
            <th width="280px">Action</th>
        </tr>
        <!-- Example of listing books -->
<?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($sale->id); ?></td>
    <td><?php echo e($sale->title); ?></td>
    <td><?php echo e($sale->author); ?></td>
   
    <td>
            <img src="<?php echo e(asset('storage/' . $sale->path)); ?>" style="height: 50px; width: 50px">
        </td>
    <td>
        <?php echo e($sale->disc); ?></td>
        <td>
        <form action="<?php echo e(route('disc.book.destroy', $sale->id)); ?>" method="POST">
            <a href="<?php echo e(route('disc.book.edit', $sale->id)); ?>" class="btn btn-primary">Edit</a>
            <button type="button" class="btn btn-secondary action-btn" onclick="window.location.href='<?php echo e(route('sale.content.create', $sale->id)); ?>'">
    <i class="fas fa-plus"></i> Add Content
</button>

            
            <?php echo csrf_field(); ?>

            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     
   
                                 </form>
          
    </table>
            
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert "style="background-color:#F96D41;color:white">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
   
</body>
</html><?php /**PATH F:\bookscity\resources\views/admin/disc/index.blade.php ENDPATH**/ ?>