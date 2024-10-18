@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f0f8ff; /* Light blue background */
    }

    .card {
        background-color: #ffffff; /* White background for the card */
        border: 1px solid #e0f2f1; /* Light green border */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }

    .card-header {
        background-color: #4caf50; /* Green background for header */
        color: white; /* White text color */
        font-weight: bold; /* Make the text bold */
        text-align: center; /* Center align the header text */
    }

    .form-control {
        border-radius: 8px; /* Rounded edges for input fields */
        border: 1px solid #c8e6c9; /* Light green border */
    }

    .btn-primary {
        background-color: #4caf50; /* Green button color */
        border-color: #4caf50; /* Matching border color */
        border-radius: 20px; /* Rounded buttons */
        padding: 10px 20px;
    }

    .btn-link {
        color: #4caf50; /* Green text for links */
        text-decoration: none;
        font-weight: bold;
    }

    .btn-link:hover {
        text-decoration: underline;
    }

    .form-check-label {
        color: #4caf50; /* Green text for "Remember Me" */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
