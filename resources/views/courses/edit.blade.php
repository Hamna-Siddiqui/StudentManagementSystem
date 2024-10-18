@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Edit Course</div>
  <div class="card-body">

    <form action="{{ url('Courses/' . $course->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")

      <!-- Name Field -->
      <div class="form-group">
        <label for="name">Name</label></br>
        <input type="text" name="name" id="name" value="{{ old('name', $course->name) }}" class="form-control"></br>
        @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <!-- Syllabus Field -->
      <div class="form-group">
        <label for="syllabus">Syllabus</label></br>
        <input type="text" name="syllabus" id="syllabus" value="{{ old('syllabus', $course->syllabus) }}" class="form-control"></br>
        @if ($errors->has('syllabus'))
          <span class="text-danger">{{ $errors->first('syllabus') }}</span>
        @endif
      </div>

      <!-- Duration Field -->
      <div class="form-group">
        <label for="duration">Duration</label></br>
        <input type="text" name="duration" id="duration" value="{{ old('duration', $course->duration) }}" class="form-control"></br>
        @if ($errors->has('duration'))
          <span class="text-danger">{{ $errors->first('duration') }}</span>
        @endif
      </div>

      <!-- Submit Button -->
      <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
