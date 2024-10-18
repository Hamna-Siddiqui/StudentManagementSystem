@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa; /* Soft gray background */
    }

    .card {
        background-color: #ffffff; /* White card background */
        border: 1px solid #dee2e6; /* Light gray border */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }

    .card-header {
        background-color: #28a745; /* Green background for header */
        color: white; /* White text */
        font-weight: bold; /* Bold text */
        text-align: center; /* Centered text */
    }

    .card-body {
        color: #343a40; /* Dark gray text */
        font-size: 1.1rem; /* Slightly larger text */
    }

    .alert-success {
        background-color: #d4edda; /* Light green background for success message */
        color: #155724; /* Dark green text */
        border-color: #c3e6cb; /* Matching border */
    }

    .btn-link {
        color: #28a745; /* Green color for link button */
        font-weight: bold; /* Bold link */
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
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
