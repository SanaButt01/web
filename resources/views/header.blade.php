<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>      
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
        </style>
</head>
<body>

 <!-- Navbar -->
 <nav class="navbar">
        <div class="container">
        <a class="navbar-brand" href="{{url('/home')}}"style="color:white;">BooksCity</a>
         <ul class="navbar-nav">
                <!-- Button to toggle sidebar -->
                <li>
                    <button class="btn btn-dark" id="sidebarToggle">Toggle Sidebar</button>
                </li>
            </ul>
        </div>
    </nav>
  


</body>
</html>
