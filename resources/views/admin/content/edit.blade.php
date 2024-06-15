<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category Form</title>
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
                <a class="btn" href="{{ route('admin.content.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if(session('status'))
    <div class="alert alert-primary mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('content.update', $content->content_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="book_id">Category:</label>
                    <select name="book_id" class="form-control">
                    @foreach($books as $book)
                    <option value="{{ $book->book_id }}"
                                style="color:blue"
                                {{ old('book_id', $content->book_id) == $book->book_id ? 'selected' : '' }}>
                                {{ $book->title }}
                            </option>
                        @endforeach
                        
                    </select>
                    @error('book_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
               
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control"  value="{{ $content->price }}"placeholder="Price">
                    @error('price')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" class="form-control" value="{{ $content->description }}" placeholder="Description">
                    @error('description')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
        <button type="submit" class="btn ">Submit</button>
    </form>
</div>

</body>
</html>
