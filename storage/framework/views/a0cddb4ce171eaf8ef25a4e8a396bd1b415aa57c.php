
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Order Status</title>
    <link rel="icon" href="<?php echo e(asset('images/log.jpeg')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>"> <!-- Link to the external stylesheet -->
</head>
<body>

    <?php echo $__env->make('side-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="main-content" id="main-content">
        <div class="container">
            <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <h2>Edit Order Status</h2>
                </div>
            </div>

            <?php if(session('status')): ?>
                <div class="alert alert-danger mb-3">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('status.update', $order->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>User Email:</strong>
                            <input type="email" class="form-control" value="<?php echo e($order->email); ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Old Status:</strong>
                            <input type="text" class="form-control" value="<?php echo e($order->status); ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>New Status:</strong>
                            <select name="status" class="form-control">
                                <option value="Pending" <?php echo e($order->status == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="Delivered" <?php echo e($order->status == 'Delivered' ? 'selected' : ''); ?>>Delivered</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-back form-control">Update Status</button>
                    </div>
                </div>
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
    </script><?php /**PATH F:\web\bookscity\resources\views/admin/order/edit.blade.php ENDPATH**/ ?>