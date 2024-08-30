<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
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
                    <th>Action</th>
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
                    <td>
                    <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='<?php echo e(route('status.edit', $order->id)); ?>'">
                                        <i class="fas fa-edit"></i> Edit
                                    </button></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
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
<?php /**PATH F:\web\bookscity\resources\views/admin/order/index.blade.php ENDPATH**/ ?>