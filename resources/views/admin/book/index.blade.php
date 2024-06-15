<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
</head>
<style>
     .action-btn {
            width: 100px;
            display: inline-block;
            text-align: center;
        }
        </style>
<body>
 
<div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All books</h2>
            </div>
            <h1>Books List</h1>

<!-- Filter Form -->
<div class="pull-right mb-2">
                <a class="btn " href="{{ route('admin.book.create') }}"style="background-color:black;color:white;"> Add New book</a>
            </div>
        </div>
    </div>
<form action="{{ route('admin.book.index') }}" method="GET" class="form-inline mb-3">
    <div class="form-group">
        <label for="category_id">Filter by Category:</label>
        <select name="category_id" id="category_id" class="form-control ml-2">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->category_id }}" 
                    {{ request('category_id') == $category->category_id ? 'selected' : '' }}>
                    {{ $category->type }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary ml-2">Filter</button>
</form>

<!-- Books List -->
@if($books->isEmpty())
    <p>No books found.</p>
@else
        
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Author</th>
           <th>Category</th>
           <th>Image</th>
           <th>Discount</th>
          
            <th width="280px">Action</th>
        </tr>
        <!-- Example of listing books -->
@foreach ($books as $book)
<tr>
    <td>{{ $book->book_id }}</td>
    <td>{{ $book->title }}</td>
    <td>{{ $book->author }}</td>
    <td>{{ $book->category ? $book->category->type : 'No Category' }}</td>
    <td>
            <img src="{{ asset('storage/' . $book->path) }}" style="height: 50px; width: 50px">
        </td>
    <td>{{$book->disc}}
    </td>
    <td>
        <form action="{{ route('book.destroy', $book->book_id) }}" method="POST">
            <a href="{{ route('book.edit', $book->book_id) }}" class="btn btn-primary">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach

     
   
                                 </form>
          
    </table>

@endif
            
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert "style="background-color:#F96D41;color:white">
            <p>{{ $message }}</p>
        </div>
    @endif
   
   
</body>
</html>