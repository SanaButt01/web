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
            transition: margin-left .3s;
            padding: 20px;
        }
        .main-content.fullscreen {
            margin-left: 0;
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
                        <h2 style="margin-top:50px">All Feedbacks</h2>
                    </div>
                </div>
            </div>
          
            <?php if($message = Session::get('success')): ?>
                <div class="alert" style="background-color:#F96D41;color:white">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>

            <table class="table table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Email</th>
                    <th>Feedback</th>
                    
                </tr>
                <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($feedback->id); ?></td>
                    <td><?php echo e($feedback->email); ?></td>
                    <td><?php echo e($feedback->message); ?></td>
                    
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH F:\bookscity\resources\views/admin/feedback/index.blade.php ENDPATH**/ ?>