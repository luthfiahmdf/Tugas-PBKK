@extends('layout.main')

@section('content')
<h3>Form Edit Students</h3>
<div class="card container">
    <div class="card-header">
     <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('students') }}'">
        Back
     </button>
    </div>
    <div class="card-body">

<form method="POST" action="{{ url('students/'.$idstudents) }}"> 
@csrf
@method('PUT')
<div class="row mb-3">
    <label for="idstudents" class="col-sm-2 col-form-label">Id Students</label>
    <div class="col-sm-4">
      <input type="text" class="form-control-plaintext " value="{{ $idstudents }}">

     
    </div>
  </div>

  <div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ $name }}">
      @error('name')
      <div  class="invalid-feedback">
        {{ $message }}
      </div>
@enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="id" class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-4">
      <select class="form-select form-select-sm @error('gender') is-invalid @enderror" name="gender" id="gender">
        <option value="" selected>--Choose--</option>
        <option value="M"{{ ($gender=='M') ? 'selected' : '' }}>Male</option>
        <option value="F" {{ ($gender=='F') ? 'selected' : '' }}>Female</option>
      </select>
    </div>
  </div>

  <div class="row mb-3">
    <label for="address" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-4">
      <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="30" rows="10" >{{ $address }}</textarea>
      @error('address')
      <div  class="invalid-feedback">
        {{ $message }}
      </div>
@enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="email" class="form-control-sm @error('email') is-invalid @enderror" id="email" name="email" class="form-control form-control-sm" value="{{ $email }}">
      @error('email')
      <div  class="invalid-feedback">
        {{ $message }}
      </div>
@enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="phone" class="col-sm-2 col-form-label">phone</label>
    <div class="col-sm-4">
      <input type="number" class="form-control-sm @error('phone') is-invalid @enderror" id="phone" name="phone" class="form-control form-control-sm" value="{{ $phone }}">
      @error('phone')
      <div  class="invalid-feedback">
        {{ $message }}
      </div>
@enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="phone" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-4">
      <button type="submit" class="btn btn-sm btn-success">Save</button>
    </div>
  </div>


</form>

    </div>
</div>
@endsection
        