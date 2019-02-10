@extends('layouts.admin')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
      <h4 class="card-title">Tambah User</h4>
      <form class="login-form" method="POST" action="{{ route('datauser.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputUsername1">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
          <label for="exampleInputUsername1">No Handphone</label>
          <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Handphone" value="{{ old('nohp') }}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <div class="form-group">
          <label for="exampleInputConfirmPassword1">Confirm Password</label>
          <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password" name="password_confirmation">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Admin</label>
          <select class="form-control form-control-lg" id="isAdmin" name="isAdmin" value="{{ old('isAdmin') }}">
            <option value="0">No</option>
            <option value="1">Yes</option>
          </select>
        </div>
       
        <button type="submit" class="btn btn-gradient-success mr-2">Submit</button>
        <a href="{{ route('datauser.index')}}" class="btn btn-danger">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection