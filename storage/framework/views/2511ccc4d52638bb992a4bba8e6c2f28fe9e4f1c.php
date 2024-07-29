<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category Form</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px; /* Adjust width as needed */
            background-color: #f8f9fa; /* Sidebar background color */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .main-content {
            margin-left: 220px; /* Adjust according to sidebar width */
            margin-top: 20px; /* Add top margin */
            padding: 20px;
            background-color: #ffffff; /* Change shade of white */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #F96D41;
        }
        .btn {
            background-color: #F96D41;
            color: #fff;
            border: none;
        }
        .btn:hover {
            background-color: #E75731;
        }
        .form-control {
            height: 40px;
        }
        img {
            margin-top: 5px;
        }
        
    </style>
</head>
<body>
<div class="sidebar">
    <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="main-content">
<div class="container ">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn" href="<?php echo e(route('category.index')); ?>"> Back</a>
            </div>
        </div>
    </div>
   
    <?php if(session('status')): ?>
    <div class="alert alert-primary mb-1 mt-1">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
  
    <form action="<?php echo e(route('category.update',$category->category_id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
   
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Category Type:</strong>
                    <input type="text" name="type" value="<?php echo e($category->type); ?>" class="form-control" placeholder="Category Type">
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
                    <strong>Category Image:</strong>  
                    <input type="file" name="icon" class="form-control" placeholder="Category Image">
                    <img src="<?php echo e(asset('storage/'.$category->icon)); ?>" style="height: 50px; width: 50px">
                </div>
            </div>
        </div>
        <button type="submit" class="btn ">Submit</button>
    </form>
</div>
    </div>
</body>
</html>
<?php /**PATH F:\bookscity\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>