
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .main-content {
            margin-left: 220px;
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        body {
            background-color: #f8f9fa;
        }
        .action-btn {
            width: 100px;
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        @include('side-panel')
    </div>
    <div class="main-content">
        <div class="container">
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
                <div class="alert" style="background-color:#F96D41;color:white">
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
                    <td>
                        <img src="{{asset('storage/'.$category->icon)}}" style="height: 50px; width: 50px">
                    </td>
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
