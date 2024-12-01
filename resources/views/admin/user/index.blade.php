<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Users</title>
    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to the external stylesheet -->
    <style>
     
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 0 10px;
            }

            /* Adjust table for smaller screens */
            .table-responsive {
                overflow-x: auto;
            }

            
        }

        @media (min-width: 769px) {
            .main-content {
                margin-left: 250px; /* Width of the side panel */
            }
        }

        
    </style>
</head>
<body>
    @include('side-panel')

    <div class="main-content" id="main-content">
        <div class="container" style="margin-top:40px">
            <button class="toggle-btn-navbar btn btn-primary" id="toggle-btn" onclick="toggleSidePanel()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="row"style="text-align:center">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>All Users</h2>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert" style="background-color:#F96D41;color:white">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="280px">Icon</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        
                        <td>   <img src="{{ asset('storage/' . $user->icon) }}" style="height: 50px; width: 50px;">

                        </td>
                    </tr>
                    @endforeach
                </table>
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
</script>
