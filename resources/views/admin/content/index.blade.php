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
        /* Additional Styles */
        
    </style>
</head>
<body>
    @include('side-panel')

    <div class="main-content" id="main-content">
        <div class="container"style="margin-top:40px">
        <button class="toggle-btn-navbar" id="toggle-btn" onclick="toggleSidePanel()">
                <i class="fas fa-bars"></i>
            </button>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>All Contents</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn" href="{{ route('admin.content.create') }}" style="background-color:#F96D41;color:white;">
                            <i class="fas fa-plus"></i> Add New Content
                        </a>
                    </div>
                                   </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert">
                    <p>{{ $message }}</p>
                </div>
            @endif

           
            @if($contents->isEmpty())
                <p>No contents found.</p>
            @else
                <table class="table table-bordered">
                    <tr>
                        <th>S.No</th>
                        <th>Description</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($contents as $content)
                        <tr>
                            <td>{{ $content->content_id }}</td>
                            <td>{{ $content->description }}</td>
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
            @endif
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