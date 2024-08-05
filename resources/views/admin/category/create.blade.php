<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Categories</title>
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
         
        .main-content {
            margin-left: 220px;
            margin-top: 20px;
            padding: 20px;
            transition: margin-left .3s;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        

        .main-content.fullscreen {
            margin-left: 0;
        }
         </style>
</head>
<body>

    @include('side-panel')


<div class="main-content"id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h2>Add New Category</h2>
            </div>
        </div>

        @if(session('status'))
            <div class="alert alert-danger mb-3">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Category Type:</strong>
                        <input type="text" name="type" class="form-control" placeholder="Category Type">
                        @error('type')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="icon" class="form-control" placeholder="Category Image">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-back form-control">Submit</button>
                </div>
            </div>
        </form>
        <div class="row mt-3">
            <div class="col-md-12">
                <a class="btn btn-back" href="{{ route('category.index') }}">Back</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
