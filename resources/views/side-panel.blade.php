<!-- Include Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-eUHtv4g/lz9O9CDnpbFBsl3wWVYBdI1F2uhKp8buqojQDfj/Z2xt6Zr8viV+a2zr" crossorigin="anonymous">
<style>
    .side-panel {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 250px;
        background-color: #fff;
        padding-top: 20px;
        overflow-y: auto;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        transform: translateX(0); /* Visible by default */
    }

    .side-panel.hidden {
        transform: translateX(-100%); /* Hide the side panel */
    }

    .side-panel ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .side-panel ul li {
        margin-bottom: 10px;
        transition: background-color 0.3s, transform 0.3s; /* Transition for background color and scaling */
    }

    .side-panel ul li:hover {
        background-color: #f0f0f0; /* Change background color on hover */
        transform: scale(1.02); /* Slightly scale up the item on hover */
    }

    .side-panel ul li a {
        display: block;
        padding: 10px;
        color: #333;
        text-decoration: none;
        transition: color 0.3s; /* Transition for text color */
    }

    .side-panel ul li a:hover {
        color: #007bff; /* Change text color on hover */
    }

    .main-content {
        transition: margin-left 0.3s ease;
        margin-left: 250px; /* Adjust according to sidebar width */
    }

    .main-content.expanded {
        margin-left: 0;
    }

    .toggle-btn {
        position: fixed; /* Fixed position relative to the viewport */
        top: 20px; /* Distance from the top of the viewport */
        left: 260px; /* Adjust according to sidebar width */
        z-index: 1000; /* Ensures the button stays above other content */
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: left 0.3s ease;
    }

    /* Optional: Adjust position when the side panel is hidden */
    .toggle-btn.hidden {
        left: 10px;
    }
</style>

</style>

<div class="side-panel" id="side-panel">
    <a class="navbar-brand pt-0" href="#">
        <img src="{{ asset('argon') }}/img/brand/logo2.png" class="navbar-brand-img" alt="..." style="width: 150px; height: 150px;">
    </a>
   <ul>

   
   <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-columns"></i> Dashboard</a></li>

                       <li><a href="{{ route('admin.book.index') }}"><i class="fas fa-book"></i> Show Books</a></li>
        <li><a href="{{ route('admin.content.create') }}"><i class="fas fa-plus-circle"></i> Add Content</a></li>
        <li><a href="{{ route('admin.content.index') }}"><i class="fas fa-eye"></i> Show Content</a></li>
        <li><a href="{{ route('category.index') }}"><i class="fas fa-list"></i> Show Categories</a></li>
        <li>
    <a href="{{ route('previews.index') }}">
        <i class="fas fa-book-open"></i> Previews
    </a>
</li>

        <li><a href="{{ route('feedbacks.index') }}"><i class="fas fa-comments"></i> Feedback</a></li>
        <li><a href="{{ route('admin.user.index') }}"><i class="fas fa-users"></i> Users</a></li>
        <li><a href="{{ route('orders.index') }}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
    </ul>
</div>
<!-- 
<button class="toggle-btn" id="toggle-btn" onclick="toggleSidePanel()"><i class="fas fa-bars"></i></button> -->

<!-- <script>
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
</script> -->
