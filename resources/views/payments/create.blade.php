@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Payments Page</div>
  <div class="card-body">

    <form action="{{ url('Payments') }}" method="post">
      {!! csrf_field() !!}

      <!-- Enrollment Field -->
      <div class="form-group">
          <label for="enrollment_id">Enrollment No</label>
          <select name="enrollment_id" id="enrollment_id" class="form-control" {{ $enrollments->isEmpty() ? 'disabled' : '' }}>
              @if($enrollments->isEmpty())
                  <option value="">No enrollments available</option>
              @else
                  @foreach($enrollments as $id => $enroll_no)
                      <option value="{{ $id }}" {{ old('enrollment_id') == $id ? 'selected' : '' }}>{{ $enroll_no }}</option>
                  @endforeach
              @endif
          </select>
          @if ($errors->has('enrollment_id'))
              <span class="text-danger">{{ $errors->first('enrollment_id') }}</span>
          @endif
      </div>

      <!-- Paid Date Field -->
      <div class="form-group">
          <label for="paid_date">Paid Date</label>
          <input type="date" name="paid_date" id="paid_date" class="form-control" value="{{ old('paid_date') }}">
          @if ($errors->has('paid_date'))
              <span class="text-danger">{{ $errors->first('paid_date') }}</span>
          @endif
      </div>

      <!-- Amount Field -->
      <div class="form-group">
          <label for="amount">Amount</label>
          <input type="text" name="amount" id="amount" class="form-control" value="{{ old('amount') }}">
          @if ($errors->has('amount'))
              <span class="text-danger">{{ $errors->first('amount') }}</span>
          @endif
      </div>

      <!-- Submit Button -->
      <input type="submit" value="Save" class="btn btn-success" {{ $enrollments->isEmpty() ? 'disabled' : '' }}>

    </form>

  </div>
</div>

@stop
