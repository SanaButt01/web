<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h2 {
            color: #F96D41;
        }
        .btn-back {
            background-color: #F96D41;
            color: #fff;
            height: 40px;
            line-height: 20px;
            padding: 6px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-back:hover {
            background-color: #E75731;
        }
        .form-control {
            height: 40px;
        }
        .form-group {
            margin-bottom: 20px; /* Added margin between form groups */
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px; /* Adjust width as needed */
            background-color: #f8f9fa; /* Sidebar background color */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .main-content {
            margin-left: 220px; /* Adjust according to sidebar width */
            margin-top: 20px; /* Add top margin */
            padding: 20px;
            background-color: #ffffff; /* Change shade of white */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="sidebar">
    @include('side-panel')
</div>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h2>Update Profile</h2>
            </div>
        </div>

        @if(session('status'))
            <div class="alert alert-primary mb-3">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $admin->name }}" class="form-control" placeholder="Name">
                        @error('name')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="icofont icofont-envelope"></i></span></div>
                            <input type="email" name="email" value="{{ $admin->email }}" class="form-control" placeholder="Email" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" placeholder="*****" class="form-control" autocomplete="off">
                        @error('password')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-back form-control">Submit</button>
        </form>
        <div class="row mt-3">
            <div class="col-md-12">
                <a class="btn btn-back" href="{{ route('admin.dashboard') }}">Back</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
