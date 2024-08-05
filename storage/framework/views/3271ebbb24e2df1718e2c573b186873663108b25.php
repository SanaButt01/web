<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Order Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
          
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
        body {
            background-color: #f8f9fa;
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
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
        <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="main-content"id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <h2>Edit Order Status</h2>
                </div>
            </div>

            <?php if(session('status')): ?>
                <div class="alert alert-primary mb-1 mt-1">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('status.create')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <select name="email" class="form-control">
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($order->email); ?>" style="color:blue"><?php echo e($order->email); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Order Status:</label>
                            <input type="text" name="status" class="form-control" placeholder="Order Status">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-back form-control">Submit</button>
            </form>

            <div class="row mt-3">
                <div class="col-md-12">
                    <a class="btn btn-back" href="<?php echo e(route('admin.dashboard')); ?>">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH F:\bookscity\resources\views/admin/order/status.blade.php ENDPATH**/ ?>