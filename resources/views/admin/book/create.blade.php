<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Books</title>

    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
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
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h2>Add New Books</h2>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-danger mb-3">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6">
    <div class="form-group">
        <label for="category_id">Category:</label>
        <select name="category_id" class="form-control">
        @foreach($categories as $category)
    <option value="{{ $category->category_id }}" style="color:blue">{{ $category->type }}</option>
@endforeach

          
        </select>
        @error('category_id')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
        
    </div>
</div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    @error('title')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <strong>Image:</strong>
                    <input type="file" name="path" class="form-control" placeholder="Image">
                    @error('path')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Author:</strong>
                    <input type="text" name="author" class="form-control" placeholder="Author">
                    @error('author')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                    @error('price')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Discount:</strong>
                    <input type="text" name="disc" class="form-control" placeholder="Discount">
                    @error('disc')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
         
           
         
         
           
         
                
            <div class="col-md-12">
                <button type="submit" class="btn btn-back form-control">Submit</button>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-md-12">
            <a class="btn btn-back" href="{{ route('admin.book.index') }}">Back</a>
        </div>
    </div>
</div>

</body>
</html>
