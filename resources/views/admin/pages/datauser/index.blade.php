@extends('layouts.admin')
@section('content')
<div class="card">
        <div class="card-body">
          <h3 class="card-title">Data User</h3>
          <a href="{{ route('datauser.create')}}" class="btn btn-gradient-primary btn-sm">Tambah User</a>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No Handphone</th>
                <th>Admin</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                    <td>{{$item->nohp}}</td>
                    <td>{{$item->isAdmin}}</td>
                    <td>
                     <button type="button" class="btn btn-gradient-primary btn-sm">Show</button>
                     <a href="{{ route('datauser.edit',$item->id) }}" class="btn btn-gradient-warning btn-sm">Edit</a>
                    <a class="btn btn-gradient-danger btn-sm" data-id="{{ $item->id}}">Hapus</a>
                     
                   </td>
                  </tr> 
                @endforeach
             
            </tbody>
          </table>
        </div>
      </div>
@endsection

@section('js')
    <script type="text/javascript">
   $(document).on('click', '.btn-gradient-danger', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                type: "GET",
                url: "{{url('admin/datauser/')}}+id", // since your route has /{id} 
                data: {id:id},
                success: function (data) {

                    }
            });
    });
});
    </script>
@endsection