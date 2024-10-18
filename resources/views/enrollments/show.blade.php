@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">
    <h2>Enrollment Details</h2>
  </div>

  <div class="card-body">
    <h5 class="card-title">Enroll No: {{ $enrollment->enroll_no }}</h5>
    <p class="card-text"><strong>Batch:</strong> {{ $enrollment->batch->name }}</p>
    <p class="card-text"><strong>Student:</strong> {{ $enrollment->student->name }}</p>
    <p class="card-text"><strong>Join Date:</strong> {{ $enrollment->join_date }}</p>
    <p class="card-text"><strong>Fee:</strong> {{ $enrollment->fee }}</p>

    <!-- Edit and Delete Actions (Optional) -->
    <a href="{{ url('/Enrollments/' . $enrollment->id . '/edit') }}" class="btn btn-warning btn-sm">
      <i class="fas fa-edit" aria-hidden="true"></i> Edit
    </a>

    <form method="POST" action="{{ url('/Enrollments/' . $enrollment->id) }}" accept-charset="UTF-8" style="display:inline">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger btn-sm" title="Delete Enrollment" onclick="return confirm('Confirm delete?')">
        <i class="fa fa-trash" aria-hidden="true"></i> Delete
      </button>
    </form>

    <!-- Back Button -->
    <a href="{{ url('/Enrollments') }}" class="btn btn-primary btn-sm">
      <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Enrollments List
    </a>
  </div>
</div>

@endsection
