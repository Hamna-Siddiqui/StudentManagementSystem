@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Your All-in-One Solution for Student Administration.</h1> <!-- Center the heading -->

    <div class="row">
        <!-- Students -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
            <a href="{{ route('Students.index') }}" class="btn btn-success d-flex flex-column align-items-center justify-content-center rounded-circle" style="width: 200px; height: 200px; font-size: 1.5rem; text-align: center; line-height: 1.5;">
                <i class="fas fa-user-graduate mb-2" style="font-size: 2.5rem;"></i>
                <span>Students</span>
            </a>
        </div>

        <!-- Teachers -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
            <a href="{{ route('Teachers.index') }}" class="btn btn-success d-flex flex-column align-items-center justify-content-center rounded-circle" style="width: 200px; height: 200px; font-size: 1.5rem; text-align: center; line-height: 1.5;">
                <i class="fas fa-chalkboard-teacher mb-2" style="font-size: 2.5rem;"></i>
                <span>Teachers</span>
            </a>
        </div>

        <!-- Courses -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
            <a href="{{ route('Courses.index') }}" class="btn btn-success d-flex flex-column align-items-center justify-content-center rounded-circle" style="width: 200px; height: 200px; font-size: 1.5rem; text-align: center; line-height: 1.5;">
                <i class="fas fa-book-open mb-2" style="font-size: 2.5rem;"></i>
                <span>Courses</span>
            </a>
        </div>

        <!-- Batches -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
            <a href="{{ route('Batches.index') }}" class="btn btn-success d-flex flex-column align-items-center justify-content-center rounded-circle" style="width: 200px; height: 200px; font-size: 1.5rem; text-align: center; line-height: 1.5;">
                <i class="fas fa-layer-group mb-2" style="font-size: 2.5rem;"></i>
                <span>Batches</span>
            </a>
        </div>

        <!-- Enrollments -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
            <a href="{{ route('Enrollments.index') }}" class="btn btn-success d-flex flex-column align-items-center justify-content-center rounded-circle" style="width: 200px; height: 200px; font-size: 1.5rem; text-align: center; line-height: 1.5;">
                <i class="fas fa-user-plus mb-2" style="font-size: 2.5rem;"></i>
                <span>Enrollments</span>
            </a>
        </div>

        <!-- Payments -->
        <div class="col-md-4 mb-3 d-flex justify-content-center">
            <a href="{{ route('Payments.index') }}" class="btn btn-success d-flex flex-column align-items-center justify-content-center rounded-circle" style="width: 200px; height: 200px; font-size: 1.5rem; text-align: center; line-height: 1.5;">
                <i class="fas fa-credit-card mb-2" style="font-size: 2.5rem;"></i>
                <span>Payments</span>
            </a>
        </div>
    </div>
</div>
@endsection
