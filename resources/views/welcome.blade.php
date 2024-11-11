<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #343a40;
            padding: 10px;
        }

        .navbar .brand {
            color: #fff;
            text-transform: uppercase;
            margin-left: 50px;
        }

        .navbar .navbar-content {
            display: flex;
            align-items: center;
        }

        .navbar .navbar-content ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar .navbar-content ul li {
            margin-left: 15px;
        }

        .navbar .navbar-content ul li a {
            color: #fff;
            text-decoration: none;
        }

        .navbar .toggle-btn-navbar, .navbar .dots-icon {
            background-color: #F96D41;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .navbar .toggle-btn-navbar i, .navbar .dots-icon i {
            font-size: 18px;
        }

        .navbar .dots-icon {
            display: none; /* Hidden by default on larger screens */
        }

        @media (max-width: 768px) {
            .navbar .dots-icon {
                display: block; /* Show dots icon on small screens */
            }

            .navbar .navbar-content {
                display: none; /* Hide content by default on small screens */
                flex-direction: column;
                background-color: #343a40;
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            }

            .navbar .navbar-content.show {
                display: flex; /* Show content when toggled */
            }

            .navbar .navbar-content ul {
                flex-direction: column;
                width: 100%;
            }

            .navbar .navbar-content ul li {
                margin: 10px 0;
                width: 100%;
                text-align: left;
                padding: 10px 15px;
                border-bottom: 1px solid #444;
            }

            .navbar .navbar-content ul li a {
                color: #fff;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <!-- Brand -->
        <a class="brand" href="{{ route('admin.dashboard') }}">
            {{ __('Dashboard') }}
        </a>

        <!-- Dots icon for minimized screens -->
        <button class="dots-icon" id="dots-btn" onclick="toggleNavbarContent()">
            <i class="fas fa-ellipsis-h"></i>
        </button>

        <!-- Navbar content -->
        <div class="navbar-content" id="navbar-content">
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">My Profile</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        function toggleNavbarContent() {
            var navbarContent = document.getElementById('navbar-content');
            navbarContent.classList.toggle('show');
        }
    </script>
</body>
</html>
