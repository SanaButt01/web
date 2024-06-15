<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add content</title>

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
            <h2>Add Content</h2>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-danger mb-3">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6">
    <div class="form-group">
        <label for="book_id">Book:</label>
        <select name="book_id" class="form-control">
        @foreach($books as $book)
    <option value="{{ $book->book_id }}" style="color:blue">{{ $book->title }}</option>
@endforeach

          
        </select>
        @error('book_id')
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
                    <strong>Description:</strong>
                    <input type="text" name="description" class="form-control" placeholder="Description">
                    @error('description')
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
            <a class="btn btn-back" href="{{ route('admin.content.index') }}">Back</a>
        </div>
    </div>
</div>

</body>
</html>
