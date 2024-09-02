<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to the external stylesheet -->
</head>
<body>

    @include('side-panel')

    <div class="main-content" id="main-content">
        <div class="container">
        <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
            <i class="fas fa-bars"></i>
        </button>
       
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <h2>Edit Book</h2>
                </div>
            </div>

            @if(session('status'))
                <div class="alert alert-danger mb-3">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('book.update', $book->book_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Category:</strong>
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
                            <img src="{{ asset('storage/'.$book->path) }}" style="height: 50px; width: 50px; margin-top: 5px;">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Price:</strong>
                            <input type="text" name="price" class="form-control" value="{{ $book->price }}" placeholder="Price">
                            @error('price')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Discount:</strong>
                            <input type="text" name="disc" class="form-control" value="{{ $book->disc }}" placeholder="Discount">
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
