@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">
    <h2>Student Details</h2>
  </div>

  <div class="card-body">
    <h5 class="card-title">Name: {{ $Students->name }}</h5>
    <p class="card-text"><strong>Address:</strong> {{ $Students->address }}</p>
    <p class="card-text"><strong>Mobile:</strong> {{ $Students->mobile }}</p>
    <p class="card-text"><strong>E-mail:</strong> {{ $Students->e_mail }}</p>

    <!-- Edit and Delete Actions (Optional) -->
    <a href="{{ url('/Students/' . $Students->id . '/edit') }}" class="btn btn-warning btn-sm">
      <i class="fas fa-edit" aria-hidden="true"></i> Edit
    </a>

    <form method="POST" action="{{ url('/Students' . '/' . $Students->id) }}" accept-charset="UTF-8" style="display:inline">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
      <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)">
        <i class="fa fa-trash" aria-hidden="true"></i> Delete
      </button>
    </form>

    <!-- Back Button -->
    <a href="{{ url('/Students') }}" class="btn btn-primary btn-sm">
      <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Students List
    </a>
  </div>
</div>

@endsection
