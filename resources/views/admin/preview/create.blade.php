<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Previews</title>
    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- External stylesheet -->
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
        <h2>Upload Previews for "{{ $content->description }}"</h2>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('previews.store', ['contentId' => $content->content_id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Select Images:</strong>
                <input type="file" name="images[]" multiple class="form-control" required>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-back form-control">Upload</button>
        </div>
    </div>
</form>

<div class="row mt-3">
    <div class="col-md-12">
        <a class="btn btn-back" href="{{ route('previews.index', $content->content_id) }}">Back to Content</a>
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
