<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('images/log.jpeg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.7);
        }

        .card-header {
            border-radius: 10px 10px 0 0;
            background-color: transparent;
            font-weight: 700;
            color: #000510;
        }

        .card-body {
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control {
            background-color: #f5f5f5;
        }

        .input-group-text {
            background-color: #f5f5f5;
            border: none;
        }

        .btn-primary {
            background-color: #000510;
            border-color: #000510;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #e75731;
            border-color: #e75731;
        }

        .btn-primary:focus {
            box-shadow: none;
        }

        .form-check-label {
            color: #333;
        }

        .btn-link {
            color: #000510;
        }

        .btn-link:hover {
            color: #e75731;
        }

        .navbar-brand img {
            max-height: 50px;
        }

        .container-fluid {
            background-image: url('images/back.jpg');
            background-size: cover;
            background-position: center;
            padding-top: 50px;
            padding-bottom: 50px;
            background-color: rgba(249, 249, 249, 0.8);
        }

        @media (max-width: 768px) {
            .col-md-6 {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center" style="font-size:40px">{{ __('ADMIN LOGIN') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.submit.login') }}">
                    @csrf

                    <!-- Email input field -->
                    <div class="form-group">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <!-- Display error message for email -->
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <!-- Password input field -->
                    <div class="form-group">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>

                        <!-- Display error message for password -->
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
