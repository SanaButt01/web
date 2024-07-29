<!--<?php $__env->startSection('styles'); ?>-->
<!--<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/tagsinput.css')); ?>">-->
<!--<style>-->
<!--    .progress {-->
<!--        position: relative;-->
<!--        width: 100%;-->
<!--    }-->

<!--    .bar {-->
<!--        background-color: #00ff00;-->
<!--        width: 0%;-->
<!--        height: 20px;-->
<!--    }-->

<!--    .percent {-->
<!--        position: absolute;-->
<!--        display: inline-block;-->
<!--        left: 50%;-->
<!--        color: #040608;-->
<!--    }-->
<!--</style>-->
<!--<?php $__env->stopSection(); ?>-->
<?php echo csrf_field(); ?>
<div class="row py-2">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label for="type" class="bmd-label-floating">Category Name</label>
            <input type="text" autofocus autocomplete="off" class="form-control" name="type" id="type" value="<?php echo e(old('type', isset($category) ? $category->type : '' )); ?>" required>
            <?php if($errors->has('type')): ?>
            <span class="error text-danger"><?php echo e($errors->first('type')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php if(isset($category)): ?>
    <hr>
    <div class="col-md-6">
        <div>
            <label for="icon" class="col-form-label"><?php echo e(__("Image")); ?></label>
            <input type="file" class="form-control" accept=".jpg, .jpeg, .png, .gif" name="icon" id="icon" />
            <?php if($errors->has('icon')): ?>
            <span class="error text-danger"><?php echo e($errors->first('icon')); ?></span>
            <?php endif; ?>
            <br />
            <img src="<?php echo e(asset('storage/'.$category->icon)); ?>" style="height: 80px; width: 80px; border-radius: 50%" />
        </div>
    </div>
    <?php else: ?>
    <div class="col-md-6">
        <div>
            <label for="icon" class="col-form-label"><?php echo e(__("Image")); ?> <button type="button" class="btn-danger btn-xs clearFile">Clear</button></label>
            <input required type="file" class="form-control" accept=".jpg, .jpeg, .png, .gif" name="icon" id="icon" />
            <?php if($errors->has('icon')): ?>
            <span class="error text-danger"><?php echo e($errors->first('icon')); ?></span>
            <?php endif; ?>
        </div><br>
         <div class="icon_holder_update"></div><br>
    </div>
    <?php endif; ?>
    <br />
    <!--<div class="progress">-->
    <!--    <div class="progress-bar" role="progressbar" aria-valuenow=""-->
    <!--         aria-valuemin="0" aria-valuemax="100" style="width: 0%">-->
    <!--        0%-->
    <!--    </div>-->
    <!--</div>-->
    <!--<br/>-->
    <!--<div id="success">-->

    <!--</div>-->
    <!--<br/>-->
</div>

<?php $__env->startSection('scripts'); ?>
 <script src="<?php echo e(asset('assets/js/tagsinput/tagsinput.js')); ?>"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" type="text/javascript"></script> 
 <script>
        // $(document).ready(function () {
        //     setTimeout(function (){
        //         $('#formone').ajaxForm({
        //         beforeSend: function () {
        //             $('#success').empty();
        //         },
        //         uploadProgress: function (event, position, total, percentComplete) {
        //             $('.progress-bar').text(percentComplete + '%');
        //             $('.progress-bar').css('width', percentComplete + '%');
        //         },
        //         success: function (data) {
        //             // alert(data);
        //             console.log(data);
        //             if (data.errors) {
        //                 $('.progress-bar').text('0%');
        //                 $('.progress-bar').css('width', '0%');
        //                 $('#success').html('<span class="text-danger"><b>' + data.errors + '</b></span>');
        //             }
        //             if (data.success) {
        //                 $('.progress-bar').text('Uploaded');
        //                 $('.progress-bar').css('width', '100%');
        //                 $('#success').html('<span class="text-success"><b>' + data.success + '</b></span><br /><br />');
        //                 $('#success').append(data.image);
        //             }
        //         }
        //     });
        //     }, 3000)
        // });
         $('input[type="file"][name="icon"]').on('change', function() {
        var icon_path = $(this)[0].value;
        var icon_holder = $('.icon_holder_update');
        var currentImagePath = $(this).data('value');
        var extension = icon_path.substring(icon_path.lastIndexOf('.') + 1).toLowerCase();
        if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {
            if (typeof(FileReader) != 'undefined') {
                icon_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('<img>', {
                        'src': e.target.result,
                        'class': 'icon-fluid',
                        'style': 'height: 80px; width: 80px; border-radius: 50%;'
                    }).appendTo(icon_holder);
                }
                icon_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(icon_holder).html('Browser does not support FileReader');
            }
        } else {
            $(icon_holder).empty();
        }
    });
    $('.clearFile').on('click', function() {
         $('#icon').val("");
        $('.icon_holder_update').html("");
    });
    </script> 
<?php $__env->stopSection(); ?><?php /**PATH F:\bookscity\resources\views/admin/category/fields.blade.php ENDPATH**/ ?>