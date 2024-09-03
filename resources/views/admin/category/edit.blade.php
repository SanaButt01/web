<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category Form</title>
    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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
                    <h2>Edit Category</h2>
                </div>
            </div>

            <!-- Display Success or Error Alert -->
            @if(session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
            @endif

          

            <form action="{{ route('category.update', $category->category_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Category Type:</strong>
                            <input type="text" name="type" value="{{ $category->type }}" class="form-control" placeholder="Category Type">
                            @error('type')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Category Image:</strong>
                            <input type="file" name="icon" class="form-control" placeholder="Category Image">
                            <img src="{{ asset('storage/' . $category->icon) }}" style="height: 50px; width: 50px; margin-top: 5px;">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-back form-control" >Submit</button>
                    </div>
                </div>
            </form>

            <div class="row mt-3">
                <div class="col-md-12">
                    <a class="btn btn-back" href="{{ route('category.index') }}" >Back</a>
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
