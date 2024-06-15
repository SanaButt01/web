<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            color: #000510;
        }

        .card-body {
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .form-label {
            font-weight: 500;
            color: #333; /* Change label color */
        }

        .form-control {
            background-color: #f5f5f5; /* Change form control background color */
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
            box-shadow: none; /* Remove button focus shadow */
        }

        .form-check-label {
            color: #333; /* Change form check label color */
        }

        .btn-link {
            color: #000510; /* Change link color */
        }

        .btn-link:hover {
            color: #e75731; /* Change link hover color */
        }

        .navbar-brand img {
            max-height: 50px; /* Adjust the logo height as needed */
        }
    

        /* Your existing styles */
        .container-fluid {
            background-image: url('images/back.jpg');
            background-size: cover;
            background-position: center;
            padding-top: 50px;
            padding-bottom: 50px;
            background-color: rgba(249, 249, 249, 0.8);
        }

        /* Neatly align form in responsive way */
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
            <div class="card-header text-center" style="font-size:40px">{{ __('ADMIN LOGIN') }}
        </a></div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.submit.login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <a class="btn btn-link" href="{{ route('admin.register') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                           
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
