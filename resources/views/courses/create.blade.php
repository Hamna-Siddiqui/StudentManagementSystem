@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Courses Page</div>
  <div class="card-body">
      
    <form action="{{ url('Courses') }}" method="post">
      {!! csrf_field() !!}

      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
          @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
      </div>

      <div class="form-group">
          <label for="syllabus">Syllabus</label>
          <input type="text" name="syllabus" id="syllabus" class="form-control" value="{{ old('syllabus') }}">
          @if ($errors->has('syllabus'))
              <span class="text-danger">{{ $errors->first('syllabus') }}</span>
          @endif
      </div>

      <div class="form-group">
          <label for="duration">Duration</label>
          <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration') }}">
          @if ($errors->has('duration'))
              <span class="text-danger">{{ $errors->first('duration') }}</span>
          @endif
      </div>

      <input type="submit" value="Save" class="btn btn-success">
    </form>
   
  </div>
</div>

@stop
