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
      <h4 class="card-title">Tambah Kategori</h4>
      <form class="login-form" method="POST" action="{{ route('datakategori.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputUsername1">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-gradient-success mr-2">Save</button>
        <a href="{{ route('datakategori.index')}}" class="btn btn-danger">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection