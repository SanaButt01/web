@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
       
                <a class='btn btn-lg'href="{{ route('admin.read')}}"style='background-color:purple;color:white;border:none;outline:none;font-size:20px;'>Admins</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @endif

                    {{ __('You are logged in! hyy') }}

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
