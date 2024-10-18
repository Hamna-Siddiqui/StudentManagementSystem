@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Batches Page</div>
  <div class="card-body">

    <form action="{{ url('Batches') }}" method="post">
      {!! csrf_field() !!}

      <div class="form-group">
          <label for="name">Batch Name</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
          @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
      </div>

      <div class="form-group">
          <label for="course_id">Course</label>
          <select name="course_id" id="course_id" class="form-control">
              @foreach($courses as $id => $name)
                  <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
              @endforeach
          </select>
          @if ($errors->has('course_id'))
              <span class="text-danger">{{ $errors->first('course_id') }}</span>
          @endif
      </div>

      <div class="form-group">
          <label for="start_date">Start Date</label>
          <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
          @if ($errors->has('start_date'))
              <span class="text-danger">{{ $errors->first('start_date') }}</span>
          @endif
      </div>

      <input type="submit" value="Save" class="btn btn-success">

    </form>

  </div>
</div>

@stop
