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
      <h4 class="card-title">Edit Kategori</h4>
      <form class="login-form" method="POST" action="{{ route('datakategori.update',$data->id) }}">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
        <div class="form-group">
          <label for="exampleInputUsername1">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $data->name}}">
        </div>
        <button type="submit" class="btn btn-gradient-success mr-2">Update</button>
        <a href="{{ route('datakategori.index')}}" class="btn btn-danger">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection