<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to the external stylesheet -->
   
    <style>
       </style>
</head>
<body>
    
@include('side-panel')

<div class="main-content"id="main-content">
    <div class="container">
    <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2 style="margin-top:50px">All Previews</h2>
                    </div>
                </div>
            </div>
       
            @if ($message = Session::get('success'))
                <div class="alert" style="background-color:#F96D41;color:white">
                    <p>{{ $message }}</p>
                </div>
            @endif

       
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Images</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($previews as $content_id => $previewGroup)
        <tr>
            <td>{{ $content_id }}</td>
            <td>
                <div class="image-row">
                    @foreach ($previewGroup as $preview)
                    <img src="{{ asset('storage/' . $preview->path) }}" alt="Image">
                    @endforeach
                </div>
            </td>
           
            <td>
          

                <button type="button" class="btn btn-primary action-btn" onclick="window.location.href='{{ route('previews.edit', $preview->content_id) }}'">
    <i class="fas fa-edit"></i> Edit
</button>
  <!-- Delete Button -->
  <form action="{{ route('previews.destroy', $content_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete this preview?');">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>

</body>
</html>

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