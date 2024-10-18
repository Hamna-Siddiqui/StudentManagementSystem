@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">
    <h2>Teacher Details</h2>
  </div>

  <div class="card-body">
    <h5 class="card-title">Name: {{ $Teachers->name }}</h5>
    <p class="card-text"><strong>Address:</strong> {{ $Teachers->address }}</p>
    <p class="card-text"><strong>Mobile:</strong> {{ $Teachers->mobile }}</p>
    <p class="card-text"><strong>E-mail:</strong> {{ $Teachers->e_mail }}</p>

    <!-- Edit and Delete Actions (Optional) -->
    <a href="{{ url('/Teachers/' . $Teachers->id . '/edit') }}" class="btn btn-warning btn-sm">
      <i class="fas fa-edit" aria-hidden="true"></i> Edit
    </a>

    <form method="POST" action="{{ url('/Teachers' . '/' . $Teachers->id) }}" accept-charset="UTF-8" style="display:inline">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
      <button type="submit" class="btn btn-danger btn-sm" title="Delete Teacher" onclick="return confirm(&quot;Confirm delete?&quot;)">
        <i class="fa fa-trash" aria-hidden="true"></i> Delete
      </button>
    </form>

    <!-- Back Button -->
    <a href="{{ url('/Teachers') }}" class="btn btn-primary btn-sm">
      <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Teachers List
    </a>
  </div>
</div>

@endsection