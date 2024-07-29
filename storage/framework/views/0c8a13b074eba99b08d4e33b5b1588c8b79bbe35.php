<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add content</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            color: #F96D41;
        }
        .btn-back {
            background-color: #F96D41;
            color: #fff;
            height: 40px;
            line-height: 20px;
            padding: 6px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-back:hover {
            background-color: #E75731;
        }
        .form-control {
            height: 40px;
        }
        .form-group {
            margin-bottom: 20px; /* Added margin between form groups */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h2>Add Content</h2>
        </div>
    </div>

    <?php if(session('status')): ?>
        <div class="alert alert-danger mb-3">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('content.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
        <div class="col-md-6">
    <div class="form-group">
        <label for="book_id">Book:</label>
        <select name="book_id" class="form-control">
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($book->book_id); ?>" style="color:blue"><?php echo e($book->title); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          
        </select>
        <?php $__errorArgs = ['book_id'];
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
                    <strong>Description:</strong>
                    <input type="text" name="description" class="form-control" placeholder="Description">
                    <?php $__errorArgs = ['description'];
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
           
            <div class="col-md-12">
                <button type="submit" class="btn btn-back form-control">Submit</button>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-md-12">
            <a class="btn btn-back" href="<?php echo e(route('admin.content.index')); ?>">Back</a>
        </div>
    </div>
</div>

</body>
</html>
<?php /**PATH F:\bookscity\resources\views/admin/content/create.blade.php ENDPATH**/ ?>