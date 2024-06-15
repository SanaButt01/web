<form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit">Upload Image</button>
</form>
