<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>

.main-content {
            transition: margin-left .3s;
            padding: 20px;
        }
        .main-content.fullscreen {
            margin-left: 0;
        }
        </style>
</head>
<body>

        @include('side-panel')

    <div class="main-content"id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2 style="margin-top:50px">All Feedbacks</h2>
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
                    <th>Email</th>
                    <th>Feedback</th>
                    
                </tr>
                @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->message }}</td>
                    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
