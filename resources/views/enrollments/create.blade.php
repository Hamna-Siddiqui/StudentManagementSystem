@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Enrollments Page</div>
  <div class="card-body">

    <form action="{{ url('Enrollments') }}" method="post">
      @csrf

      <div class="form-group">
          <label for="enroll_no">Enroll No</label>
          <input type="text" name="enroll_no" id="enroll_no" class="form-control" value="{{ old('enroll_no') }}" placeholder="Enter enrollment number">
          @if ($errors->has('enroll_no'))
              <span class="text-danger">{{ $errors->first('enroll_no') }}</span>
          @endif
      </div>

      <div class="form-group">
          <label for="batch_id">Batch</label>
          <select name="batch_id" id="batch_id" class="form-control">
              @foreach($batches as $id => $batch_name)
                  <option value="{{ $id }}" {{ old('batch_id') == $id ? 'selected' : '' }}>{{ $batch_name }}</option>
              @endforeach
          </select>
          @if ($errors->has('batch_id'))
              <span class="text-danger">{{ $errors->first('batch_id') }}</span>
          @endif
      </div>

      <div class="form-group">
          <label for="student_id">Student</label>
          <select name="student_id" id="student_id" class="form-control">
              @foreach($students as $id => $name)
                  <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
              @endforeach
          </select>
          @if ($errors->has('student_id'))
              <span class="text-danger">{{ $errors->first('student_id') }}</span>
          @endif
      </div>

      <div class="form-group">
          <label for="join_date">Join Date</label>
          <input type="date" name="join_date" id="join_date" class="form-control" value="{{ old('join_date') }}">
          @if ($errors->has('join_date'))
              <span class="text-danger">{{ $errors->first('join_date') }}</span>
          @endif
      </div>

      <div class="form-group">
          <label for="fee">Fee</label>
          <input type="text" name="fee" id="fee" class="form-control" value="{{ old('fee') }}" placeholder="Enter fee amount">
          @if ($errors->has('fee'))
              <span class="text-danger">{{ $errors->first('fee') }}</span>
          @endif
      </div>

      <input type="submit" value="Save" class="btn btn-success">

    </form>

  </div>
</div>

@stop
