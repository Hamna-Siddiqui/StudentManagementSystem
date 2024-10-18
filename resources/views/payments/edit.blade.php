@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Edit Payment</div>
  <div class="card-body">

    <form action="{{ url('Payments/' . $payment->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")

      <!-- Enrollment No Field -->
      <label for="enrollment_id">Enrollment No</label></br>
      <select name="enrollment_id" id="enrollment_id" class="form-control">
        @if($enrollments->isEmpty())
          <option value="">No enrollments available</option>
        @else
          @foreach($enrollments as $id => $enroll_no)
            <option value="{{ $id }}" {{ old('enrollment_id', $payment->enrollment_id) == $id ? 'selected' : '' }}>
              {{ $enroll_no }}
            </option>
          @endforeach
        @endif
      </select>
      @if ($errors->has('enrollment_id'))
        <span class="text-danger">{{ $errors->first('enrollment_id') }}</span>
      @endif

      <!-- Paid Date Field -->
      <label for="paid_date">Paid Date</label></br>
      <input type="date" name="paid_date" id="paid_date" value="{{ old('paid_date', $payment->paid_date) }}" class="form-control"></br>
      @if ($errors->has('paid_date'))
        <span class="text-danger">{{ $errors->first('paid_date') }}</span>
      @endif

      <!-- Amount Field -->
      <label for="amount">Amount</label></br>
      <input type="text" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" class="form-control"></br>
      @if ($errors->has('amount'))
        <span class="text-danger">{{ $errors->first('amount') }}</span>
      @endif

      <!-- Submit Button -->
      <input type="submit" value="Update" class="btn btn-success"></br>

    </form>

  </div>
</div>

@stop
