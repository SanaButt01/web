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

    <div class="main-content" id="main-content">
        <div class="container" style="margin-top:40px">
            <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>All Categories</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn" href="{{ route('category.create') }}" style="background-color:#F96D41;color:white;">
                            <i class="fas fa-plus"></i> Add New Category
                        </a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->category_id }}</td>
                    <td>{{ $category->type }}</td>
                    <td><img src="{{ asset('storage/'.$category->icon) }}" style="height: 50px; width: 50px"></td>
                    <td>
                        <form action="{{ route('category.destroy', $category->category_id) }}" method="POST">
                            <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='{{ route('category.edit', $category->category_id) }}'">
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