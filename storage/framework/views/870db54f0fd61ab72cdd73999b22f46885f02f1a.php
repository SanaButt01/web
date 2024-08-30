<head>
<style>
.custom-margin-left {
    margin-left: 50px; /* Adjust the value as needed */
}

.toggle-btn-navbar, .dots-icon {
    background-color: #F96D41;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.toggle-btn-navbar i, .dots-icon i {
    font-size: 18px; /* Icon size */
}

.dots-icon {
    display: none; /* Hidden by default on larger screens */
}

.navbar-content {
    display: flex;
    align-items: center;
    transition: all 0.3s ease; /* Smooth transition */
}

.navbar-content.show {
    display: flex !important; /* Force display when toggled */
}

@media (max-width: 768px) {
    .dots-icon {
        display: inline-block; /* Show dots icon on small screens */
    }
    
    .navbar-content {
        display: none; /* Hide content by default on small screens */
        position: absolute;
        top: 60px; /* Adjust based on your navbar height */
        left: 0;
        width: 100%;
        background-color: #343a40; /* Match navbar background color */
        z-index: 1000;
        flex-direction: column;
        align-items: flex-start;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        color: #fff; /* Ensure text is visible */
    }
    
    .navbar-content.show {
        display: flex !important; /* Force display when toggled */
    }
}
</style>
</head>

<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Toggle button for side panel -->
        <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Dots icon for minimized screens -->
        <button class="dots-icon" id="dots-btn" onclick="toggleNavbarContent()">
            <i class="fas fa-ellipsis-h"></i>
        </button>

        <!-- Brand -->
        <a class="h4 mb-0 text-uppercase d-none d-lg-inline-block custom-margin-left" href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>

        <!-- Navbar content -->
        <div class="navbar-content">
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
                        <a href="<?php echo e(route('admin.logout')); ?>" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span><?php echo e(__('Logout')); ?></span>  
                            <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
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

    function toggleNavbarContent() {
        var navbarContent = document.querySelector('.navbar-content');
        // Toggle 'show' class to show/hide content
        navbarContent.classList.toggle('show');
        
        // Log to console to debug
        console.log('Navbar content toggled', navbarContent.classList);
    }
</script>
<?php /**PATH F:\web\bookscity\resources\views/layouts/navbars/navs/auth.blade.php ENDPATH**/ ?>