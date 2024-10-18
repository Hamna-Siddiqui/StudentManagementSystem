@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #e6f7ff; /* Light blue background */
    }

    .card {
        background-color: #ffffff; /* White card background */
        border: 1px solid #e0f2f1; /* Light green border */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow for card */
    }

    .card-header {
        background-color: #4caf50; /* Green header background */
        color: white; /* White text */
        font-weight: bold; /* Bold font */
        text-align: center; /* Center the header text */
    }

    .form-control {
        border-radius: 8px; /* Rounded corners for input fields */
        border: 1px solid #c8e6c9; /* Light green border for inputs */
    }

    .btn-primary {
        background-color: #4caf50; /* Green button color */
        border-color: #4caf50; /* Matching border */
        border-radius: 20px; /* Rounded button */
        padding: 10px 20px;
    }

    .invalid-feedback strong {
        color: #dc3545; /* Red color for error messages */
    }

    .form-check-label {
        color: #4caf50; /* Green text for form labels */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
