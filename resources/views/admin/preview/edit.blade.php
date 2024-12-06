<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Previews for Content: {{ $content_id }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            color: #F96D41;
        }
        .btn {
            background-color: #F96D41;
            color: #fff;
            border: none;
        }
        .btn:hover {
            background-color: #E75731;
        }
        .form-control {
            height: 40px;
        }
        img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 style="text-align:center">Edit Previews </h2>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div id="successMessage" class="alert alert-success" style="display: none;"></div>
    <form id="editPreviewsForm" action="{{ route('previews.update', $content_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="images">Upload New Images (max 3):</label>
            <input type="file" name="images[]" class="form-control" multiple>
            @error('images')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @error('images.*')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Previews</button>
    </form>

    <hr>

    <h2>Existing Images</h2>
    <div class="row">
       
@foreach ($previews as $preview)
<div class="col-md-4">
    <div class="card mb-4">
        <img src="{{ asset('storage/' . $preview->path) }}" class="card-img-top" alt="Image">
        <div class="card-body text-center">
            
            <button class="btn btn-warning btn-edit"
                    data-content-id="{{ $content_id }}"
                    data-preview-id="{{ $preview->preview_id }}">
                Edit
            </button>
           
            <button class="btn btn-danger btn-delete"
                    data-content-id="{{ $content_id }}"
                    data-preview-id="{{ $preview->preview_id }}">
                Delete
            </button>
        </div>
    </div>
</div>
@endforeach

    </div>
    
    <div class="row mt-3">
                <div class="col-md-12">
                    <a class="btn btn-back" href="{{ route('previews.index') }}">Back</a>
                </div>
            </div>

    
    <div class="modal fade" id="editImageModal" tabindex="-1" role="dialog" aria-labelledby="editImageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editImageModalLabel">Edit Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editImageForm" method="POST" enctype="multipart/form-data">
    @csrf
 
    <div class="modal-body">
        <div class="form-group">
            <label for="image_update">Upload New Image:</label>
            <input type="file" name="image_update" class="form-control">
            @error('image_update')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
    
</form>

</div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editImageButtons = document.querySelectorAll('.btn-edit');
        const deleteImageButtons = document.querySelectorAll('.btn-delete');
        const editImageForm = document.getElementById('editImageForm');
        const editImageModal = new bootstrap.Modal(document.getElementById('editImageModal'));

       
        const urlParams = new URLSearchParams(window.location.search);
        const successMessage = urlParams.get('success');
        if (successMessage) {
            document.getElementById('successMessage').innerText = successMessage;
            document.getElementById('successMessage').style.display = 'block';
        }

        editImageButtons.forEach(button => {
            button.addEventListener('click', function () {
                const previewId = this.dataset.previewId;
                const contentId = this.dataset.contentId;
                
                editImageForm.action = `{{ route('previews.updateImage', ['content_id' => $content_id, 'preview_id' => ':preview_id']) }}`.replace(':preview_id', previewId);
                editImageModal.show();
            });
        });

        deleteImageButtons.forEach(button => {
            button.addEventListener('click', function () {
                const previewId = this.dataset.previewId;
                const contentId = this.dataset.contentId;
                if (confirm('Are you sure you want to delete this image?')) {
                    fetch(`{{ route('previews.deleteImage', ['content_id' => $content_id, 'preview_id' => ':preview_id']) }}`.replace(':preview_id', previewId), {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ preview_id: previewId, content_id: contentId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.code === 1) {
                            location.reload();
                        } else {
                            alert('Failed to delete the image.');
                        }
                    });
                }
            });
        });
    });
</script>

</body>
</html>
