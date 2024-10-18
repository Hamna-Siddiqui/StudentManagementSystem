@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Edit Batch</div>
  <div class="card-body">

    <form action="{{ url('Batches/' . $batches->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")

      <!-- Batch Name Field -->
      <div class="form-group">
        <label for="name">Batch Name</label></br>
        <input type="text" name="name" id="name" value="{{ old('name', $batches->name) }}" class="form-control"></br>
        @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <!-- Course Field -->
      <div class="form-group">
        <label for="course_id">Course</label></br>
        <select name="course_id" id="course_id" class="form-control">
          @foreach($courses as $id => $name)
            <option value="{{ $id }}" {{ $id == old('course_id', $batches->course_id) ? 'selected' : '' }}>
              {{ $name }}
            </option>
          @endforeach
        </select>
        @if ($errors->has('course_id'))
          <span class="text-danger">{{ $errors->first('course_id') }}</span>
        @endif
      </div>

      <!-- Start Date Field -->
      <div class="form-group">
        <label for="start_date">Start Date</label></br>
        <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $batches->start_date) }}" class="form-control"></br>
        @if ($errors->has('start_date'))
          <span class="text-danger">{{ $errors->first('start_date') }}</span>
        @endif
      </div>

      <!-- Submit Button -->
      <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
