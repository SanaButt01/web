<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .action-btn {
            width: 100px;
            display: inline-block;
            text-align: center;
        }
        .image-row {
            display: flex;
            flex-wrap: wrap;
        }
        .image-row img {
            margin: 5px;
            height: 50px;
            width: 50px;
        }
    </style>
</head>
<body>
<div class="container mt-2">
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Images</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($previews as $content_id => $previewGroup)
        <tr>
            <td>{{ $content_id }}</td>
            <td>
                <div class="image-row">
                    @foreach ($previewGroup as $preview)
                    <img src="{{ asset('storage/' . $preview->path) }}" alt="Image">
                    @endforeach
                </div>
            </td>
            <td>
                <!-- Your action buttons here -->
                <form action="{{ route('previews.destroy', $preview->preview_id) }}" method="POST">
                <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='{{ route('previews.edit', $preview->preview_id) }}'">
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
@if ($message = Session::get('success'))
    <div class="alert" style="background-color:#F96D41;color:white">
        <p>{{ $message }}</p>
    </div>
@endif
</body>
</html>
