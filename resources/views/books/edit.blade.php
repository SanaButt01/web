<!-- Example Blade view for update form -->
<form action="{{ route('update.post', ['id' => $book->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Add this line to use the PUT method for updates -->

    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ $book->title }}">
    
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $book->name }}">
    
    <label for="author">Author:</label>
    <input type="text" name="author" value="{{ $book->author }}">
    
    <label for="picture">Picture:</label>
    <input type="file" name="picture">
    
    <button type="submit">Update</button>
</form>

