<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Contents</title>
    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to the external stylesheet -->
    <style>
        /* Ensure the main content does not overlap with the side panel */
        .main-content {
            transition: margin-left 0.3s;
        }

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

            .toggle-btn-navbar {
                margin-bottom: 15px;
            }

            .side-panel.hidden + .main-content {
                margin-left: 0;
            }
        }

        @media (min-width: 769px) {
            .main-content {
                margin-left: 250px; /* Width of the side panel */
            }
        }

        /* Custom styling for success alert */
        /* .alert {
            background-color: #F96D41;
            color: white;
        } */

       

        /* Adjust the spacing of the button rows and headings */
        .toggle-btn-row, .add-btn-row {
            margin-bottom: 15px;
        }

        /* Center the heading */
        .heading-row {
            text-align: center;
            margin-bottom: 20px;
        }
        .action-btn {
            width: 100px; /* Set equal width */
            height: 40px;  /* Set equal height */
            margin: 5px;   /* Space between buttons */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            white-space: nowrap;
            padding: 5px;
        }

        .action-btn i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    @include('side-panel')

    <div class="main-content" id="main-content">
        <div class="container" style="margin-top:40px">

            <!-- Row for Toggle Button -->
            <div class="toggle-btn-row">
                <button class="toggle-btn-navbar btn btn-primary" id="toggle-btn" onclick="toggleSidePanel()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Row for Heading -->
            <div class="heading-row">
                <h2>All Contents</h2>
            </div>

            <!-- Row for Add New Content Button -->
            <div class="add-btn-row">
                <a class="btn" href="{{ route('admin.content.create') }}" style="background-color:#F96D41;color:white;">
                    <i class="fas fa-plus"></i> Add New Content
                </a>
            </div>

         <!-- Success message if any -->
@if (Session::has('success'))
    <div class="alert alert-success" id="success-alert">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger" id="error-alert">
        {{ Session::get('error') }}
    </div>
@endif

            <!-- Content Table -->
            @if($contents->isEmpty())
                <p>No contents found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>S.No</th>
                            <th>Description</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($contents as $content)
                            <tr>
                                <td>{{ $content->content_id }}</td>
                                <td>{{ $content->description }}</td>
                                <td>
                                    <form action="{{ route('content.destroy', $content->content_id) }}" method="POST">
                                        <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='{{ route('content.edit', $content->content_id) }}'">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger action-btn">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                        <button type="button" class="btn btn-secondary action-btn" onclick="window.location.href='{{ route('previews.create', $content->content_id) }}'">
                                            <i class="fas fa-plus"></i> Add Preview
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>
    </div>
</body>
</html>

<script>
    function toggleSidePanel() {
        var panel = document.getElementById('side-panel');
        var mainContent = document.getElementById('main-content');
        
        if (panel.classList.contains('hidden')) {
            panel.classList.remove('hidden');
            mainContent.classList.remove('expanded');
        } else {
            panel.classList.add('hidden');
            mainContent.classList.add('expanded');
        }
    }
</script>
<script>
    // Automatically remove success alert after 1 second
    setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            // successAlert.classList.add('fade-out');  // Add fade-out class
            setTimeout(function() {
                successAlert.style.display = 'none';  // Hide the element after fade-out
            }, 500);  // Time for fade-out effect
        }
    }, 1000);  // Time before hiding the alert (1 second)

    // Automatically remove error alert after 1 second
    setTimeout(function() {
        var errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            // errorAlert.classList.add('fade-out');  // Add fade-out class
            setTimeout(function() {
                errorAlert.style.display = 'none';  // Hide the element after fade-out
            }, 500);  // Time for fade-out effect
        }
    }, 1000);  // Time before hiding the alert (1 second)
</script>

