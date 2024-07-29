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

<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn" href="<?php echo e(route('admin.content.index')); ?>"> Back</a>
            </div>
        </div>
    </div>

    <?php if(session('status')): ?>
    <div class="alert alert-primary mb-1 mt-1">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('content.update', $content->content_id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="book_id">Category:</label>
                    <select name="book_id" class="form-control">
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($book->book_id); ?>"
                                style="color:blue"
                                <?php echo e(old('book_id', $content->book_id) == $book->book_id ? 'selected' : ''); ?>>
                                <?php echo e($book->title); ?>

                            </option>
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
               
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control"  value="<?php echo e($content->price); ?>"placeholder="Price">
                    <?php $__errorArgs = ['price'];
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
                    <input type="text" name="description" class="form-control" value="<?php echo e($content->description); ?>" placeholder="Description">
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
            
        <button type="submit" class="btn ">Submit</button>
    </form>
</div>

</body>
</html>
<?php /**PATH F:\bookscity\resources\views/admin/content/edit.blade.php ENDPATH**/ ?>