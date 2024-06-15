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
            
            <th>Price</th>
       
         
            <th width="280px">Action</th>
        </tr>
        @foreach ($contents as $content)
    <tr>
        <td>{{ $content->content_id }}</td>
      
        <td>{{ $content->description }}</td>
        <td>{{ $content->price }}</td>
       
      
        <td>
            <form action="{{ route('content.destroy', $content->content_id) }}" method="POST">
                <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='{{ route('content.edit', $content->content_id) }}'">
                    <i class="fas fa-edit"></i> Edit
                </button>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger action-btn">
                    <i class="fas fa-trash"></i> Delete
                </button>
                <button type="button" class="btn btn-secondary action-btn" onclick="window.location.href='{{ route('previews.create', $content->content_id) }}'">
    <i class="fas fa-plus"></i> Add Preview
</button>

            </form>
        </td>
    </tr>
@endforeach
</table>


    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert "style="background-color:#F96D41;color:white">
            <p>{{ $message }}</p>
        </div>
    @endif
   
   
</body>
</html>