<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Previews</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="container mt-2">
    <h2>Edit Previews for Content ID: {{ $content_id }}</h2>
    <form action="{{ route('previews.update', $content_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="images">Upload New Images (min: 1, max: 3):</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Previews</button>
        </div>
    </form>
    <div class="mt-3">
        <h4>Current Images:</h4>
        <div class="image-row">
            @foreach ($previews as $preview)
            <img src="{{ asset('storage/' . $preview->path) }}" alt="Image" style="height: 100px; width: 100px; margin: 5px;">
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
