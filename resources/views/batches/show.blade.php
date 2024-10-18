@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">
    <h2>Batch Details</h2>
  </div>

  <div class="card-body">
    <h5 class="card-title">Batch Name: {{ $batch->name }}</h5>
    <p class="card-text"><strong>Course:</strong> {{ $batch->course->name }}</p>
    <p class="card-text"><strong>Start Date:</strong> {{ $batch->start_date }}</p>

    <!-- Edit and Delete Actions (Optional) -->
    <a href="{{ url('/Batches/' . $batch->id . '/edit') }}" class="btn btn-warning btn-sm">
      <i class="fas fa-edit" aria-hidden="true"></i> Edit
    </a>

    <form method="POST" action="{{ url('/Batches/' . $batch->id) }}" accept-charset="UTF-8" style="display:inline">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
      <button type="submit" class="btn btn-danger btn-sm" title="Delete Batch" onclick="return confirm(&quot;Confirm delete?&quot;)">
        <i class="fa fa-trash" aria-hidden="true"></i> Delete
      </button>
    </form>

    <!-- Back Button -->
    <a href="{{ url('/Batches') }}" class="btn btn-primary btn-sm">
      <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Batches List
    </a>
  </div>
</div>

@endsection
