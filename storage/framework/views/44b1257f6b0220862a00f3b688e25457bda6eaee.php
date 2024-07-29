<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
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
        img {
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h2>Edit Discount Book</h2>
        </div>
    </div>

    <?php if(session('status')): ?>
        <div class="alert alert-danger mb-3">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('disc.book.update', $sale->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="<?php echo e($sale->title); ?>" class="form-control" placeholder="Title">
                    <?php $__errorArgs = ['title'];
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
                    <strong>Image:</strong>
                    <input type="file" name="path" class="form-control" placeholder="Image">
                    <img src="<?php echo e(asset('storage/' . $sale->path)); ?>" style="height: 50px; width: 50px">
                    <?php $__errorArgs = ['path'];
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
                    <strong>Author:</strong>
                    <input type="text" name="author" value="<?php echo e($sale->author); ?>" class="form-control" placeholder="Author">
                    <?php $__errorArgs = ['author'];
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
                    <strong>Discount:</strong>
                    <input type="text" name="disc" value="<?php echo e($sale->disc); ?>" class="form-control" placeholder="Discount">
                    <?php $__errorArgs = ['disc'];
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
            <a class="btn btn-back" href="<?php echo e(route('disc.book.index')); ?>">Back</a>
        </div>
    </div>
</div>

</body>
</html>
<?php /**PATH F:\bookscity\resources\views/admin/disc/edit.blade.php ENDPATH**/ ?>