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
      <form class="login-form" method="POST" action="{{ route('dataproduct.update',$item->id) }}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="form-group">
              <label for="exampleInputUsername1">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $item->name }}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Kategori</label>
              <select class="form-control form-control-lg" id="id_kategori" name="id_kategori">
                <option value="{{$item->kategoris->id}}">{{$item->kategoris->name}}</option>
                @foreach ($data as $kategori)
                <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Deskripsi</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi" value="{{ $item->deskripsi }}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Harga</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="harga" value="{{ $item->price }}">
              </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Berat</label>
              <input type="text" class="form-control" id="berat" name="berat" placeholder="berat" value="{{ $item->berat }}">
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">QTY</label>
              <input type="text" class="form-control" id="qty" name="qty" placeholder="qty" value="{{ $item->qty }}">
            </div>
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="image" class="file-upload-default" value="{{ $item->image }}">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled="" placeholder="{{ $item->image }}">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                </span>
              </div>
            </div>
        <button type="submit" class="btn btn-gradient-success mr-2">Update</button>
        <a href="{{ route('dataproduct.index')}}" class="btn btn-danger">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection