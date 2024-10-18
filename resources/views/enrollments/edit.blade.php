@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Edit Enrollment</div>
  <div class="card-body">

    <form action="{{ url('Enrollments/' . $enrollment->id) }}" method="post">
      @csrf
      @method('PATCH')

      <input type="hidden" name="id" id="id" value="{{ $enrollment->id }}" />

      <!-- Enroll No Field -->
      <div class="form-group">
        <label for="enroll_no">Enroll No</label>
        <input type="text" name="enroll_no" id="enroll_no" value="{{ old('enroll_no', $enrollment->enroll_no) }}" class="form-control">
        @if ($errors->has('enroll_no'))
          <span class="text-danger">{{ $errors->first('enroll_no') }}</span>
        @endif
      </div>

      <!-- Batch Field -->
      <div class="form-group">
        <label for="batch_id">Batch</label>
        <select name="batch_id" id="batch_id" class="form-control">
          @foreach($batches as $id => $batch_name)
            <option value="{{ $id }}" {{ old('batch_id', $enrollment->batch_id) == $id ? 'selected' : '' }}>{{ $batch_name }}</option>
          @endforeach
        </select>
        @if ($errors->has('batch_id'))
          <span class="text-danger">{{ $errors->first('batch_id') }}</span>
        @endif
      </div>

      <!-- Student Field -->
      <div class="form-group">
        <label for="student_id">Student</label>
        <select name="student_id" id="student_id" class="form-control">
          @foreach($students as $id => $student_name)
            <option value="{{ $id }}" {{ old('student_id', $enrollment->student_id) == $id ? 'selected' : '' }}>{{ $student_name }}</option>
          @endforeach
        </select>
        @if ($errors->has('student_id'))
          <span class="text-danger">{{ $errors->first('student_id') }}</span>
        @endif
      </div>

      <!-- Join Date Field -->
      <div class="form-group">
        <label for="join_date">Join Date</label>
        <input type="date" name="join_date" id="join_date" value="{{ old('join_date', $enrollment->join_date) }}" class="form-control">
        @if ($errors->has('join_date'))
          <span class="text-danger">{{ $errors->first('join_date') }}</span>
        @endif
      </div>

      <!-- Fee Field -->
      <div class="form-group">
        <label for="fee">Fee</label>
        <input type="text" name="fee" id="fee" value="{{ old('fee', $enrollment->fee) }}" class="form-control">
        @if ($errors->has('fee'))
          <span class="text-danger">{{ $errors->first('fee') }}</span>
        @endif
      </div>

      <!-- Submit Button -->
      <input type="submit" value="Update" class="btn btn-success">

    </form>

  </div>
</div>

@stop
