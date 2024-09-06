<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Profile</title>
    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to the external stylesheet -->
    
    <style>
        /* Centering the form container */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-box {
            width: 100%;
            max-width: 600px;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Styling the button to align with the form */
        .btn-back {
            background-color: #F96D41;
            color: white;
        }

        .btn-back:hover {
            background-color: #e65c3c;
            color: white;
        }

        /* Adjustments for side panel toggle */
        .main-content.expanded {
            margin-left: 0;
        }

        #side-panel.hidden {
            display: none;
        }
    </style>
</head>
<body>
@include('side-panel')

<div class="main-content" id="main-content">
    <div class="container form-container">
        <div class="form-box">
            <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
                <i class="fas fa-bars"></i>
            </button>

            <h2 class="text-center mb-4">My Profile</h2>

            @if(session('status'))
                <div class="alert alert-primary mb-3">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Id Field -->
                <div class="form-group">
                    <strong>Id:</strong>
                    <input type="text" name="id" value="{{ $admin->id }}" class="form-control" placeholder="Id" readonly>
                    @error('id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Name Field -->
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $admin->name }}" class="form-control" placeholder="Name" readonly>
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <strong>Email:</strong>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email" value="{{ $admin->email }}" class="form-control" placeholder="Email" readonly>
                    </div>
                    @error('email')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->


            </form>

            <!-- Back Button -->
            <div class="form-group text-center mt-4">
                <a class="btn btn-back" href="{{ route('admin.dashboard') }}">Back</a>
            </div>
        </div>
    </div>
</div>

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

</body>
</html>
