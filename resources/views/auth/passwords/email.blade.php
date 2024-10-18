@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #e9ecef; /* Light background color */
    }

    .card {
        background-color: #ffffff; /* White card background */
        border: 1px solid #d1d9e6; /* Light gray border */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
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

    .alert-success {
        background-color: #d4edda; /* Light green success alert */
        color: #155724; /* Dark green success text */
        border-color: #c3e6cb; /* Border matches success alert */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
