<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to the external stylesheet -->
    <style>
      
        .main-content {
            transition: margin-left 0.3s;
        }


        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 0 10px;
            }

            .side-panel.hidden + .main-content {
                margin-left: 0;
            }

            .toggle-btn-navbar {
                margin-bottom: 15px;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }

        @media (min-width: 769px) {
            .main-content {
                margin-left: 250px; 
            }
        }

        
        .toggle-btn-row, .add-btn-row {
            margin-bottom: 15px;
        }

       
        .heading-row {
            text-align: center;
            margin-bottom: 20px;
        }

      

        
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    @include('side-panel')

    <div class="main-content" id="main-content">
        <div class="container" style="margin-top:40px">
            
           
            <div class="toggle-btn-row">
                <button class="toggle-btn-navbar btn btn-primary" id="toggle-btn" onclick="toggleSidePanel()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

          
            <div class="heading-row">
                <h2>All Categories</h2>
            </div>

            
            <div class="add-btn-row">
                <a class="btn" href="{{ route('category.create') }}" style="background-color:#F96D41;color:white;">
                    <i class="fas fa-plus"></i> Add New Category
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



            
            @if($categories->isEmpty())
                <p>No categories found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>S.No</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category_id }}</td>
                            <td>{{ $category->type }}</td>
                            <td><img src="{{ asset('storage/'.$category->icon) }}" style="height: 50px; width: 50px"></td>
                            <td>
                                <form action="{{ route('category.destroy', $category->category_id) }}" method="POST">
                                    <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='{{ route('category.edit', $category->category_id) }}'">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger action-btn">
                                        <i class="fas fa-trash"></i> Delete
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
   
    setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
           
            setTimeout(function() {
                successAlert.style.display = 'none';  
            }, 500); 
        }
    }, 1000);  
    
    setTimeout(function() {
        var errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
           
            setTimeout(function() {
                errorAlert.style.display = 'none';  
            }, 500); 
        }
    }, 1000);  // Time before hiding the alert (1 second)
</script>

