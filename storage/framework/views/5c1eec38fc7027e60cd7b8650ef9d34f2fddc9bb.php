<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <!-- Additional Stylesheets -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/chartist.css')); ?>">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <title>Admin Panel</title>

    <link rel="icon" href="<?php echo e(asset('images/log.jpeg')); ?>" type="image/x-icon">

    <style>
  
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            border-radius: 12px 12px 0 0;
            padding: 20px;
            color: #333;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .card-body {
            padding: 20px;
            background-color: #ffffff;
        }
        .icon-shape {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #ffffff;
            font-size: 28px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .bg-danger { background-color: #e57373; }
        .bg-warning { background-color: #fbc02d; }
        .bg-success { background-color: #4caf50; }
        .bg-info { background-color: #03a9f4; }
        .text-muted { color: #9e9e9e; }
        .text-success { color: #388e3c; }
        .text-warning { color: #f57f17; }
        .text-info { color: #0288d1; }
        .icon-book i {
            font-size: 22px;
        }
        .card-stats {
            background: linear-gradient(135deg, #ff8a80 0%, #ff6d00 100%);
            color: #ffffff;
        }
        .card-stats .card-body {
            padding: 20px;
        }
        .status-widget .card {
            background: linear-gradient(135deg, #a5d6a7 0%, #66bb6a 100%);
            color: #ffffff;
        }
        .status-widget .status-chart {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 0 0 12px 12px;
            padding: 20px;
        }
        .status-details {
            padding: 20px;
        }
        .status-details h4 {
            font-weight: bold;
        }
        .table th {
            background-color: #F96D41;
            color: #ffffff;
            font-weight: bold;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f1f1f1;
        }
        .table tbody tr:hover {
            background-color: #e0e0e0;
        }
        .table img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }
        .icon-shape {
    font-size: 20px; /* Adjust size as needed */
    margin-right: 50px;
    color: #333; /* Adjust color as needed */
}
.icon-book {
    font-size: 20px; /* Adjust size as needed */
    margin-right: 140px;
    color: #333; /* Adjust color as needed */
}
    </style>
</head>
<body>
   

<div class="container-fluid">

    <div class="header pb-8 pt-5 pt-md-8">
  
        <div class="container-fluid">
     
            <div class="header-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow-sm card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><i class="fas fa-list"></i> Categories</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo e($categories); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-list"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow-sm card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><i class="fas fa-book"></i> Books</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo e($books); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow-sm card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><i class="fas fa-comments"></i> Feedbacks</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo e($feedbacks); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="fas fa-comments"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                    <span class="text-nowrap">Since yesterday</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow-sm card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><i class="fas fa-users"></i> Users</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo e($users); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top 5 Users Section -->
                <div class="row mt-4">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title mb-0"><i class="fas fa-user icon-shape"></i> Top 5 Users</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Icon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $topUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($user->name); ?></td>
                                                    <td><?php echo e($user->email); ?></td>
                                                    <td><img src="<?php echo e($user->icon_url); ?>" alt="User Icon"></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Count by Category & Order Status -->
                <div class="row mt-5">
                    <div class="col-xl-8 mb-5 mb-xl-0">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h3 class="mb-0"><i class="fas fa-tags icon-book icon-shape"></i> Book Count by Category</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Books Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $categoriesWithBookCount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="icon-book"><i class="fas fa-book"></i> <?php echo e($category->type); ?></td>
                                                    <td><?php echo e($category->books_count); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Status -->
                    <div class="col-xl-4 col-lg-12">
    <div class="card shadow-sm">
        <div class="card-header">
            <h5><i class="fas fa-shopping-bag icon-shape"></i> Order Status</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span style="background-color: #F96D41; color: #ffffff; padding: 5px 10px; border-radius: 4px;">Delivered</span></td>
                            <td><h4 class="mb-0"><span class="counter"><?php echo e($deliveredPercentage); ?></span>%</h4></td>
                        </tr>
                        <tr>
                            <td><span style="background-color: #F96D41; color: #ffffff; padding: 5px 10px; border-radius: 4px;">Pending</span></td>
                            <td><h4 class="mb-0"><span class="counter"><?php echo e($pendingPercentage); ?></span>%</h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

                    <!-- End Order Status -->
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php /**PATH F:\web\bookscity\resources\views/widgets/dashboardwidgets.blade.php ENDPATH**/ ?>