<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .action-btn {
            width: 100px;
            display: inline-block;
            text-align: center;
        }
        .image-row {
            display: flex;
            flex-wrap: wrap;
        }
        .image-row img {
            margin: 5px;
            height: 50px;
            width: 50px;
        }
    </style>
</head>
<body>
<div class="container mt-2">
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Images</th>
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $previews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content_id => $previewGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($content_id); ?></td>
            <td>
                <div class="image-row">
                    <?php $__currentLoopData = $previewGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('storage/' . $preview->path)); ?>" alt="Image">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </td>
           
            <td>
            <form action="<?php echo e(url('Preview/previewdestroy/'.$preview->content_id)); ?>" method="POST">

                <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='<?php echo e(route('previews.edit', $preview->content_id)); ?>'">
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
<?php if($message = Session::get('success')): ?>
    <div class="alert" style="background-color:#F96D41;color:white">
        <p><?php echo e($message); ?></p>
    </div>
<?php endif; ?>
</body>
</html>
<?php /**PATH F:\web\bookscity\resources\views/admin/preview/index.blade.php ENDPATH**/ ?>