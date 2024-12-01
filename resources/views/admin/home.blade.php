
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Style for Sidebar */
        .sidebar {
            position: fixed;
            top: 75px; /* Adjust based on the height of the navbar */
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #F96D41;
            padding-top: 15px;
            transition: all 0.3s;
            display: none; /* Initially hide the sidebar */
        }
        .sidebar ul {
            list-style-type: none;
            padding-left: 0;
        }
        .sidebar ul li a {
            padding: 10px 20px;
           
            color: #fff;
        }
        /* Style for Navbar */
        .navbar {
            background-color: #444;
            padding: 15px 0;
        }
        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        .navbar-nav {
            list-style-type: none;
            padding-left: 0;
        }
        .navbar-nav li {
            padding: 0 15px;
        }
        .navbar-nav li a {
            color: #fff;
            text-decoration: none;
        }
        /* Content Area */
        .content {
            margin-left: 250px;
            padding: 20px;
            margin-top: 70px; /* Adjusted margin-top to accommodate navbar height */
        }
        /* Media Query for Responsive Layout */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
            }
            .content {
                margin-left: 0;
                margin-top: 0; /* Reset margin-top for small screens */
            }
        }
    </style>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar"style="background-color:#F96D41">
        <div class="container">
        <a class="navbar-brand" href="#"style="color:white;">BooksCity</a>
         <ul class="navbar-nav">
                <!-- Button to toggle sidebar -->
                
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <button class="btn btn-dark" id="sidebarToggle">Toggle Sidebar</button>
    <div class="sidebar" id="sidebar">
        <ul>
        <li><a href="{{route('book.index')}}">Add Books</a></li>
        <li><a href="{{route('admin.viewbooks')}}">Users</a></li>
        <li><a href="{{route('category.index')}}">show categories</a></li>
        
        <li><a href="{{url('/Register/view')}}">Orders</a></li>
        <li><a href="{{url('/Register/view')}}">Feedback</a></li>
        <li><a href="{{url('/Register/view')}}">Link 3</a></li>

        </ul>
    </div>

    <!-- Content Area -->
    <div class="content">
        <h2>Welcome to your Dashboard</h2>
        <p>This is the content area where you can display your dashboard content.</p>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            console.log("Document is ready.");
            // Check if jQuery is loaded
            if (typeof jQuery == 'undefined') {
                console.error('jQuery is not loaded!');
            } else {
                console.log('jQuery is loaded successfully!');
            }

            // Toggle sidebar on button click
            $("#sidebarToggle").click(function(){
                $("#sidebar").toggle(); // Toggle visibility of the sidebar
            });
        });
    </script>

</body>
</html>
