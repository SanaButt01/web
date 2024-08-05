<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
       
        body {
            background-color: #f8f9fa;
        }
        .action-btn {
            width: 100px;
            display: inline-block;
            text-align: center;
        }
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
    </style>
</head>
<body>
    
        <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="main-content"id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>All Orders</h2>
                    </div>
                </div>
            </div>
            <div class="pull-right mb-2">
                <a class="btn" href="<?php echo e(route('orders.status')); ?>" style="background-color:#F96D41;color:white;">
                    <i class="fas fa-plus"></i> Add status
                </a>
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
                    <th>Address</th>
                    <th>Phone no</th>
                    <th>Product</th>
                    <th>Status</th>
                </tr>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->email); ?></td>
                    <td><?php echo e($order->address); ?></td>
                    <td><?php echo e($order->phone_number); ?></td>
                    <td>
                        <?php if(is_array($order->product)): ?>
                            <?php echo e(implode(', ', $order->product)); ?>

                        <?php else: ?>
                            <?php echo e($order->product); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e($order->status); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH F:\bookscity\resources\views/admin/order/index.blade.php ENDPATH**/ ?>