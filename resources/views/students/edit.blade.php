@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">

    <form action="{{ url('/Students/' . $Students->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")

      <input type="hidden" name="id" id="id" value="{{ $Students->id }}" />

      <!-- Name Field -->
      <label for="name">Name</label></br>
      <input type="text" name="name" id="name" value="{{ old('name', $Students->name) }}" class="form-control"></br>
      @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
      @endif

      <!-- Address Field -->
      <label for="address">Address</label></br>
      <input type="text" name="address" id="address" value="{{ old('address', $Students->address) }}" class="form-control"></br>
      @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
      @endif

      <!-- Mobile Field -->
      <label for="mobile">Mobile</label></br>
      <input type="text" name="mobile" id="mobile" value="{{ old('mobile', $Students->mobile) }}" class="form-control"></br>
      @if ($errors->has('mobile'))
        <span class="text-danger">{{ $errors->first('mobile') }}</span>
      @endif

      <!-- E-mail Field -->
      <label for="e_mail">E-mail</label></br>
      <input type="text" name="e_mail" id="e_mail" value="{{ old('e_mail', $Students->e_mail) }}" class="form-control"></br>
      @if ($errors->has('e_mail'))
        <span class="text-danger">{{ $errors->first('e_mail') }}</span>
      @endif

      <!-- Submit Button -->
      <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
