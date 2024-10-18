@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">
    <h2>Course Details</h2>
  </div>

  <div class="card-body">
    <h5 class="card-title">Name: {{ $course->name }}</h5>
    <p class="card-text"><strong>Syllabus:</strong> {{ $course->syllabus }}</p>
    <p class="card-text"><strong>Duration:</strong> {{ $course->duration() }}</p>

    <!-- Edit and Delete Actions -->
    <a href="{{ url('/Courses/' . $course->id . '/edit') }}" class="btn btn-warning btn-sm">
      <i class="fas fa-edit" aria-hidden="true"></i> Edit
    </a>

    <form method="POST" action="{{ url('/Courses/' . $course->id) }}" accept-charset="UTF-8" style="display:inline">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-danger btn-sm" title="Delete Course" onclick="return confirm('Confirm delete?')">
        <i class="fa fa-trash" aria-hidden="true"></i> Delete
      </button>
    </form>

    <!-- Back Button -->
    <a href="{{ url('/Courses') }}" class="btn btn-primary btn-sm" style="margin-left: 5px;">
      <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Courses List
    </a>
  </div>
</div>

@endsection
