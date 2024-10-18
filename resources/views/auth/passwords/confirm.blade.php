@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f1f4f9; /* Light background color */
    }

    .card {
        background-color: #ffffff; /* White card background */
        border: 1px solid #d1d9e6; /* Light gray border */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    .card-header {
        background-color: #28a745; /* Green header background */
        color: white; /* White text */
        font-weight: bold; /* Bold font */
        text-align: center; /* Centered text */
    }

    .card-body {
        color: #343a40; /* Dark gray text for content */
        font-size: 1.1rem; /* Slightly larger font size */
    }

    .form-control {
        border-radius: 8px; /* Rounded edges for input fields */
        border: 1px solid #ced4da; /* Light border for input fields */
    }

    .invalid-feedback strong {
        color: #dc3545; /* Red text for error messages */
    }

    .btn-primary {
        background-color: #28a745; /* Green primary button */
        border-color: #28a745; /* Matching border color */
        border-radius: 20px; /* Rounded button edges */
        padding: 10px 20px; /* Padding inside button */
    }

    .btn-link {
        color: #007bff; /* Blue color for forgot password link */
        text-decoration: none; /* Remove underline */
    }

    .btn-link:hover {
        text-decoration: underline; /* Underline on hover */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

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

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
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
