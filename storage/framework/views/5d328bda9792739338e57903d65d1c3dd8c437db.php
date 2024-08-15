<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
</head>
<style>
     .action-btn {
            width: 100px;
            display: inline-block;
            text-align: center;
        }
        </style>
<body>
 
<div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Content</h2>
            </div>
            <h1>Books List</h1>

<!-- Filter Form -->
<

<!-- Books List -->

        
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Description</th>
          
       
         
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($content->content_id); ?></td>
      
        <td><?php echo e($content->description); ?></td>
       
       
      
        <td>
            <form action="<?php echo e(route('content.destroy', $content->content_id)); ?>" method="POST">
                <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='<?php echo e(route('content.edit', $content->content_id)); ?>'">
                    <i class="fas fa-edit"></i> Edit
                </button>
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger action-btn">
                    <i class="fas fa-trash"></i> Delete
                </button>
                <button type="button" class="btn btn-secondary action-btn" onclick="window.location.href='<?php echo e(route('previews.create', $content->content_id)); ?>'">
    <i class="fas fa-plus"></i> Add Preview
</button>

            </form>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>


    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert "style="background-color:#F96D41;color:white">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
   
</body>
</html><?php /**PATH F:\web\bookscity\resources\views/admin/content/index.blade.php ENDPATH**/ ?>