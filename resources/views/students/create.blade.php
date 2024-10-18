@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
      
  <form action="{{ url('Students') }}" method="post">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
        @if ($errors->has('address'))
            <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile') }}">
        @if ($errors->has('mobile'))
            <span class="text-danger">{{ $errors->first('mobile') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="e_mail">E-mail</label>
        <input type="text" name="e_mail" id="e-mail" class="form-control" value="{{ old('e_mail') }}">
        @if ($errors->has('e_mail'))
            <span class="text-danger">{{ $errors->first('e_mail') }}</span>
        @endif
    </div>

    <input type="submit" value="Save" class="btn btn-success">
</form>

   
  </div>
</div>
 
@stop