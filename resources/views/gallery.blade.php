<!-- resources/views/image/gallery.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
</head>
<body>

    <h2>Image Gallery</h2>

    @foreach ($images as $image)
        <img src="{{ asset($image->path) }}" alt="Image">
    @endforeach

</body>
</html>
