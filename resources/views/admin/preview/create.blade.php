<!DOCTYPE html>
<html>
<head>
    <title>Upload Previews</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="file"] {
            margin-top: 5px;
        }
        button {
            padding: 8px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Previews for "{{ $content->description }}"</h1>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('previews.store', ['contentId' => $content->content_id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="images">Select Images:</label>
                <input type="file" name="images[]" multiple required>
            </div>
            <button type="submit">Upload</button>
        </form>
        <a href="{{ route('previews.index', $content->content_id) }}" class="back-link">Back to Content</a>
    </div>
</body>
</html>
