<head>
<style>
.custom-margin-left {
    margin-left: 50px; /* Adjust the value as needed */
}
.toggle-btn-navbar {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 15px; /* Adjust spacing as needed */
}

.toggle-btn-navbar i {
    font-size: 18px; /* Icon size */
}
</style>
</head>
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
       
        <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Brand -->
        <a class="h4 mb-0 text-uppercase d-none d-lg-inline-block custom-margin-left" href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
        <!-- Toggle button -->
        

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
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span><?php echo e(__('My profile')); ?></span>
                    </a>
                    <a href="<?php echo e(route('admin.edit', ['admin' => $admin->id])); ?>" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span><?php echo e(__('Update profile')); ?></span>
                    </a>                        
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo e(route('admin.logout')); ?>" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span><?php echo e(__('Logout')); ?></span>  <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>

                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
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
</script><?php /**PATH F:\web\bookscity\resources\views/layouts/navbars/navs/auth.blade.php ENDPATH**/ ?>