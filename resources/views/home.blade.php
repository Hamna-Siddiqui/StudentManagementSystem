@extends('layouts.app') 

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Your All-in-One Solution for Student Administration.</h1> <!-- Center the heading -->

    <div class="row justify-content-center">
        <!-- Students -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
        Students
            <div class="d-flex align-items-center justify-content-center py-4 px-5 shadow-lg rounded-circle bg-light" style="font-size: 2.5rem; width: 180px; height: 180px;">
                <i class="fas fa-user-graduate" style="font-size: 4rem; color: #28a745;"></i>
                </div>
        </div>

        <!-- Teachers -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
        Teachers
            <div class="d-flex align-items-center justify-content-center py-4 px-5 shadow-lg rounded-circle bg-light" style="font-size: 2.5rem; width: 180px; height: 180px;">
                <i class="fas fa-chalkboard-teacher" style="font-size: 4rem; color: #28a745;"></i>
            </div>
        </div>

        <!-- Courses -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
        Courses
            <div class="d-flex align-items-center justify-content-center py-4 px-5 shadow-lg rounded-circle bg-light" style="font-size: 2.5rem; width: 180px; height: 180px;">
                <i class="fas fa-book-open" style="font-size: 4rem; color: #28a745;"></i>
            </div>
        </div>

        <!-- Batches -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
        Batches
            <div class="d-flex align-items-center justify-content-center py-4 px-5 shadow-lg rounded-circle bg-light" style="font-size: 2.5rem; width: 180px; height: 180px;">
                <i class="fas fa-layer-group" style="font-size: 4rem; color: #28a745;"></i>
            </div>
        </div>

        <!-- Enrollments -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
        Enrollments
            <div class="d-flex align-items-center justify-content-center py-4 px-5 shadow-lg rounded-circle bg-light" style="font-size: 2.5rem; width: 180px; height: 180px;">
                <i class="fas fa-user-plus" style="font-size: 4rem; color: #28a745;"></i>
            </div>
        </div>

        <!-- Payments -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
        Payments
            <div class="d-flex align-items-center justify-content-center py-4 px-5 shadow-lg rounded-circle bg-light" style="font-size: 2.5rem; width: 180px; height: 180px;">
                <i class="fas fa-credit-card" style="font-size: 4rem; color: #28a745;"></i>
            </div>
        </div>
    </div>
</div>
@endsection
