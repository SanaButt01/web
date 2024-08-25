{{-- resources/views/orders/edit.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Order Status</title>
    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to the external stylesheet -->
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
                    <h2>Edit Order Status</h2>
                </div>
            </div>

            @if(session('status'))
                <div class="alert alert-danger mb-3">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('status.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>User Email:</strong>
                            <input type="email" class="form-control" value="{{ $order->email }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Old Status:</strong>
                            <input type="text" class="form-control" value="{{ $order->status }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>New Status:</strong>
                            <select name="status" class="form-control">
                                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-back form-control">Update Status</button>
                    </div>
                </div>
            </form>

            <div class="row mt-3">
                <div class="col-md-12">
                    <a class="btn btn-back" href="{{ route('orders.index') }}">Back</a>
                </div>
            </div>
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