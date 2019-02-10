@extends('layouts.admin')
@section('content')
<div class="card">
        <div class="card-body">
          <h3 class="card-title">Data Kategori</h3>
          @if ($message = Session::get('message'))
          <div class="alert alert-success martop-sm">
              <p>{{ $message }}</p>
          </div>
          @endif
          <a href="{{ route('datakategori.create')}}" class="btn btn-gradient-primary btn-sm">Tambah Kategori</a>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                  <td>{{$item->name}}</td>
                    <td>
                     <button type="button" class="btn btn-gradient-primary btn-sm">Show</button>
                     <a href="{{ route('datakategori.edit',$item->id) }}" class="btn btn-gradient-warning btn-sm">Edit</a>
                    <a class="btn btn-gradient-danger btn-sm" 
                        href="{{ route('datakategori.destroy',$item->id)}}"
                        onclick="event.preventDefault();
                        document.getElementById('delete').submit();">Hapus</a>
                    <form id="delete" action="{{ route('datakategori.destroy',$item->id)}}" method="POST">
                      {{csrf_field()}}
                      {{ method_field('DELETE') }} 
                    </form>
                     
                   </td>
                  </tr> 
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
@endsection
