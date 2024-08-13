<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
       
        body {
            background-color: #f8f9fa;
        }
        .action-btn {
            width: 100px;
            display: inline-block;
            text-align: center;
        }
        .main-content {
            margin-left: 220px;
            margin-top: 20px;
            padding: 20px;
            transition: margin-left .3s;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
                        <h2>All Orders</h2>
                    </div>
                </div>
            </div>
            <div class="pull-right mb-2">
                <a class="btn" href="{{ route('orders.status') }}" style="background-color:#F96D41;color:white;">
                    <i class="fas fa-plus"></i> Add status
                </a>
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
                    <th>Address</th>
                    <th>Phone no</th>
                    <th>Product</th>
                    <th>Status</th>
                </tr>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>
                        @if (is_array($order->product))
                            {{ implode(', ', $order->product) }}
                        @else
                            {{ $order->product }}
                        @endif
                    </td>
                    <td>{{ $order->status }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
