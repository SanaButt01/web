<head>
<style>
.custom-margin-left {
    margin-left: 450px; /* Adjust the value as needed */
}
</style>
</head>
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-uppercase d-none d-lg-inline-block custom-margin-left" href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a>
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" onclick="toggleSidePanel()" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="<?php echo e(asset('argon')); ?>/img/theme/team-3-800x800.jpg">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm font-weight-bold" style="color:black;"><?php echo e(auth()->user()->name); ?></span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0"><?php echo e(__('Welcome!')); ?></h6>
                    </div>
                    <a href="<?php echo e(route('profile.edit')); ?>" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span><?php echo e(__('My profile')); ?></span>
                    </a>
<<<<<<< HEAD:storage/framework/views/be91cf48d58ec4b5dcecddef0a62a7852358c884.php
                  
=======
>>>>>>> refs/remotes/origin/main:storage/framework/views/9187e195a4c28ec5312580256b5947da57d46bf0.php
                    <a href="<?php echo e(route('admin.edit', ['admin' => $admin->id])); ?>" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span><?php echo e(__('Update profile')); ?></span>
                    </a>
<<<<<<< HEAD:storage/framework/views/be91cf48d58ec4b5dcecddef0a62a7852358c884.php
                      
=======
>>>>>>> refs/remotes/origin/main:storage/framework/views/9187e195a4c28ec5312580256b5947da57d46bf0.php
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span><?php echo e(__('Logout')); ?></span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
<<<<<<< HEAD:storage/framework/views/be91cf48d58ec4b5dcecddef0a62a7852358c884.php
</nav><?php /**PATH D:\sana_project\web\resources\views/layouts/navbars/navs/auth.blade.php ENDPATH**/ ?>
=======
</nav>
<?php /**PATH C:\Users\sanan\Documents\bookscity\resources\views/layouts/navbars/navs/auth.blade.php ENDPATH**/ ?>
>>>>>>> refs/remotes/origin/main:storage/framework/views/9187e195a4c28ec5312580256b5947da57d46bf0.php
