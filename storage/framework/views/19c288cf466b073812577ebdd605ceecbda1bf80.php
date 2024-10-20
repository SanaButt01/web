<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Previews for Content: <?php echo e($content_id); ?></title>
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
    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <div id="successMessage" class="alert alert-success" style="display: none;"></div>
    <form id="editPreviewsForm" action="<?php echo e(route('previews.update', $content_id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="images">Upload New Images (max 3):</label>
            <input type="file" name="images[]" class="form-control" multiple>
            <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn btn-primary">Update Previews</button>
    </form>

    <hr>

    <h2>Existing Images</h2>
    <div class="row">
       <!-- Existing Images Section -->
<?php $__currentLoopData = $previews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-4">
    <div class="card mb-4">
        <img src="<?php echo e(asset('storage/' . $preview->path)); ?>" class="card-img-top" alt="Image">
        <div class="card-body text-center">
            <!-- Edit Button -->
            <button class="btn btn-warning btn-edit"
                    data-content-id="<?php echo e($content_id); ?>"
                    data-preview-id="<?php echo e($preview->preview_id); ?>">
                Edit
            </button>
            <!-- Delete Button -->
            <button class="btn btn-danger btn-delete"
                    data-content-id="<?php echo e($content_id); ?>"
                    data-preview-id="<?php echo e($preview->preview_id); ?>">
                Delete
            </button>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    
    <div class="row mt-3">
                <div class="col-md-12">
                    <a class="btn btn-back" href="<?php echo e(route('admin.content.index')); ?>">Back</a>
                </div>
            </div>

    <!-- Edit Image Modal -->
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
    <?php echo csrf_field(); ?>
 
    <div class="modal-body">
        <div class="form-group">
            <label for="image_update">Upload New Image:</label>
            <input type="file" name="image_update" class="form-control">
            <?php $__errorArgs = ['image_update'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editImageButtons = document.querySelectorAll('.btn-edit');
        const deleteImageButtons = document.querySelectorAll('.btn-delete');
        const editImageForm = document.getElementById('editImageForm');
        const editImageModal = new bootstrap.Modal(document.getElementById('editImageModal'));

        // Check for success message and display if present
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
                // Set action for POST method
                editImageForm.action = `<?php echo e(route('previews.updateImage', ['content_id' => $content_id, 'preview_id' => ':preview_id'])); ?>`.replace(':preview_id', previewId);
                editImageModal.show();
            });
        });

        deleteImageButtons.forEach(button => {
            button.addEventListener('click', function () {
                const previewId = this.dataset.previewId;
                const contentId = this.dataset.contentId;
                if (confirm('Are you sure you want to delete this image?')) {
                    fetch(`<?php echo e(route('previews.deleteImage', ['content_id' => $content_id, 'preview_id' => ':preview_id'])); ?>`.replace(':preview_id', previewId), {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
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
<?php /**PATH F:\web\bookscity\resources\views/admin/preview/edit.blade.php ENDPATH**/ ?>