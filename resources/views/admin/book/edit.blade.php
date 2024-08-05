<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category Form</title>
    
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
        .btn {
            background-color: #F96D41;
            color: #fff;
            border: none;
        }
        .btn:hover {
            background-color: #E75731;
        }
        .form-control {
            height: 40px;
        }
        img {
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn" href="{{ route('admin.book.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if(session('status'))
    <div class="alert alert-primary mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('book.update', $book->book_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}"
                                style="color:blue"
                                {{ old('category_id', $book->category_id) == $category->category_id ? 'selected' : '' }}>
                                {{ $category->type }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $book->title }}" class="form-control" placeholder="Title">
                    @error('title')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <strong>Image:</strong>
              
                   
                   
                    <input type="file" name="path" class="form-control" placeholder="Image">
                    <img src="{{asset('storage/'.$book->path)}}" style="height: 50px; width: 50px">
                    @error('path')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
              
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Author:</strong>
                    <input type="text" name="author" value="{{ $book->author }}" class="form-control" placeholder="Author">
                    @error('author')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>    <div class="col-md-6">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control"  value="{{ $book->price }}"placeholder="Price">
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
         
           
         

        <button type="submit" class="btn ">Submit</button>
    </form>
</div>

</body>
</html>
