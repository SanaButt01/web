<!-- resources/views/side_panel.blade.php -->

<!-- Include Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-eUHtv4g/lz9O9CDnpbFBsl3wWVYBdI1F2uhKp8buqojQDfj/Z2xt6Zr8viV+a2zr" crossorigin="anonymous">

<style>
    .side-panel ul {
        list-style: none; /* Remove default list styles */
        padding: 0;
        margin: 0;
    }

    .side-panel ul li {
        margin-bottom: 10px; /* Add margin between each list item */
    }

    .side-panel ul li a {
        display: block;
        padding: 10px;
        color: #333;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .side-panel ul li a:hover {
        background-color: #f0f0f0; /* Change background color on hover */
    }

    /* Toggle button styles */
    .toggle-btn {
        display: none;
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Media query for small screens */
    @media screen and (max-width: 768px) {
        .side-panel ul {
            display: none; /* Hide the list */
        }
        .toggle-btn {
            display: block; /* Show the toggle button */
        }
    }
</style>

<div class="side-panel">
    <a class="navbar-brand pt-0" href="{{ route('home') }}">
        <img src="{{ asset('argon') }}/img/brand/logo2.png" class="navbar-brand-img" alt="..." style="width: 150px; height: 150px;">
    </a>
    <br><br>
    <ul>
        <li><a href="{{ route('admin.book.create') }}"><i class="fas fa-book"></i> Add Books</a></li>
        <li><a href="{{ route('admin.book.index') }}"><i class="fas fa-users"></i> Users</a></li>
        <li><a href="{{ route('admin.content.create') }}"><i class="fas fa-plus-circle"></i> Add content</a></li>
        <li><a href="{{ route('admin.content.index') }}"><i class="fas fa-eye"></i> Show content</a></li>
        <li><a href="{{ route('category.index') }}"><i class="fas fa-list"></i> Show Categories</a></li>
        <li><a href="{{ route('category.create') }}"><i class="fas fa-plus"></i> Add Categories</a></li>
        <li><a href="{{ url('/Register/view') }}"><i class="fas fa-comments"></i> Feedback</a></li>
        <li><a href="{{ url('/Register/view') }}"><i class="fas fa-link"></i> Link 3</a></li>
    </ul>
</div>

<!-- Toggle button -->
<button class="toggle-btn" onclick="toggleSidePanel()"><i class="fas fa-bars"></i></button>

<script>
    function toggleSidePanel() {
        var panel = document.querySelector('.side-panel ul');
        panel.style.display = panel.style.display === 'none' ? 'block' : 'none';
    }
</script>
