@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">

    <form action="{{ url('/Teachers/' . $Teachers->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")

      <input type="hidden" name="id" id="id" value="{{ $Teachers->id }}" />

      <!-- Name Field -->
      <label for="name">Name</label></br>
      <input type="text" name="name" id="name" value="{{ old('name', $Teachers->name) }}" class="form-control"></br>
      @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
      @endif

      <!-- Address Field -->
      <label for="address">Address</label></br>
      <input type="text" name="address" id="address" value="{{ old('address', $Teachers->address) }}" class="form-control"></br>
      @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
      @endif

      <!-- Mobile Field -->
      <label for="mobile">Mobile</label></br>
      <input type="text" name="mobile" id="mobile" value="{{ old('mobile', $Teachers->mobile) }}" class="form-control"></br>
      @if ($errors->has('mobile'))
        <span class="text-danger">{{ $errors->first('mobile') }}</span>
      @endif

      <!-- E-mail Field -->
      <label for="e_mail">E-mail</label></br>
      <input type="text" name="e_mail" id="e_mail" value="{{ old('e_mail', $Teachers->e_mail) }}" class="form-control"></br>
      @if ($errors->has('e_mail'))
        <span class="text-danger">{{ $errors->first('e_mail') }}</span>
      @endif

      <!-- Submit Button -->
      <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop