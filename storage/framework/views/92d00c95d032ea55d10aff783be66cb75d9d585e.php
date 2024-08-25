<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add  Status</title>
    <link rel="icon" href="<?php echo e(asset('images/log.jpeg')); ?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>"> <!-- Link to the external stylesheet -->
    <style>
          
          
    </style>
</head>
<body>
    
        <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="main-content"id="main-content">
        <div class="container">
        <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
                <i class="fas fa-bars"></i>
            </button>
      
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <h2>Add Status</h2>
                </div>
            </div>

            <?php if(session('status')): ?>
                <div class="alert alert-primary mb-1 mt-1">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('status.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <select name="email" class="form-control">
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($order->email); ?>" style="color:blue"><?php echo e($order->email); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
    <div class="form-group">
        <strong>Order Status:</strong>
        <select name="status" class="form-control">
            <option value="Pending">Pending</option>
            <option value="Delivered">Delivered</option>
        </select>
    </div>
</div>


                <button type="submit" class="btn btn-back form-control">Submit</button>
            </form>

            <div class="row mt-3">
                <div class="col-md-12">
                    <a class="btn btn-back" href="<?php echo e(route('orders.index')); ?>">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
        function toggleSidePanel() {
            var panel = document.getElementById('side-panel');
            var mainContent = document.getElementById('main-content');
            var toggleBtn = document.getElementById('toggle-btn');
            
            if (panel.classList.contains('hidden')) {
                panel.classList.remove('hidden');
                mainContent.classList.remove('expanded');
                toggleBtn.classList.remove('hidden');
            } else {
                panel.classList.add('hidden');
                mainContent.classList.add('expanded');
                toggleBtn.classList.add('hidden');
            }
        }
    </script>
<?php /**PATH F:\web\bookscity\resources\views/admin/order/status.blade.php ENDPATH**/ ?>