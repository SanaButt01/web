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
    </style>
</head>
<body>
    
        @include('side-panel')

    <div class="main-content"id="main-content">
        <div class="container"style="margin-top:40px">
        <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
            <i class="fas fa-bars"></i>
        </button>
       
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull -left">
                        <h2>All Books</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn" href="{{ route('admin.book.create') }}" style="background-color:#F96D41;color:white;">
                            <i class="fas fa-plus"></i> Add New Book
                        </a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert" style="background-color:#F96D41;color:white">
                    <p>{{ $message }}</p>
                </div>
            @endif

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
                        <th>Price</th>
                        <th>Discount</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->book_id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category ? $book->category->type : 'No Category' }}</td>
                            <td><img src="{{ asset('storage/' . $book->path) }}" style="height: 50px; width: 50px"></td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->disc }}</td>
                            <td>
                                <form action="{{ route('book.destroy', $book->book_id) }}" method="POST">
                                    <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='{{ route('book.edit', $book->book_id) }}'">
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
            @endif
        </div>
    </div>
</body>
</html>
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