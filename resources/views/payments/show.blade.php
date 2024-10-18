@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">
    <h2>Payment Details</h2>
  </div>

  <div class="card-body">
    @if($payment->enrollment)
      <h5 class="card-title">Enrollment No: {{ $payment->enrollment->enroll_no }}</h5>
      <p class="card-text"><strong>Paid Date:</strong> {{ $payment->paid_date }}</p>
      <p class="card-text"><strong>Amount:</strong> {{ $payment->amount }}</p>
    @else
      <h5 class="card-title">Enrollment information not available</h5>
    @endif

    <!-- Edit and Delete Actions -->
    <a href="{{ url('/Payments/' . $payment->id . '/edit') }}" class="btn btn-warning btn-sm" title="Edit Payment">
      <i class="fas fa-edit" aria-hidden="true"></i> Edit
    </a>

    <form method="POST" action="{{ url('/Payments/' . $payment->id) }}" accept-charset="UTF-8" style="display:inline">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
      <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment" onclick="return confirm('Confirm delete?')">
        <i class="fa fa-trash" aria-hidden="true"></i> Delete
      </button>
    </form>

    <!-- Back Button -->
    <a href="{{ url('/Payments') }}" class="btn btn-primary btn-sm">
      <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Payments List
    </a>
  </div>
</div>

@endsection
