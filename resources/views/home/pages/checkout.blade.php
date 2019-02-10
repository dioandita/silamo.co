@extends('layouts.home')
@section('content')
<section id="penerima" class="container">
   <h1>Checkout</h1>
   <div class="row">
       <div class="col-md-7">
            <div class="card" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title">Penerima</h5>
                      <form id="form" action="#" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Nama Penerima</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="masukkan Nama">
                            </div>
        <div class="row">
                <div class="col-md-6 ">
                        <div class="form-group">
                                <label for="exampleFormControlInput1">Provinsi</label>
                                <select class="custom-select" id="province" name="province_id">
                                        <option value="0"> Pilih Provinsi</option></select>
                                </div>
                                
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleFormControlInput1">Kota</label>
                                <select class="custom-select" id="cities" name="id_city">
                                        <option value="0"> Pilih Kota</option></select>
                                </div>
                    </div>
        </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Alamat Lengkap</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="exampleFormControlInput1">Kurir</label>
                                                <select class="custom-select" id="kurir" name="kurir_id">
                                                        <option value="0"> Pilih Kurir</option></select>
                                                </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="exampleFormControlInput1">Paket</label>
                                                    <select class="custom-select" id="paket" name="paket_id">
                                                            <option value=""></option></select>
                                                    </div>
                                        </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="exampleFormControlInput1">Bank</label>
                                                <select class="custom-select" id="kota" name="kota">
                                                        <option value="0"> Pilih Bank</option></select>
                                                </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="exampleFormControlInput1">No. Rekening</label>
                                                    <input type="text" disabled="true" class="form-control" id="exampleFormControlInput1" placeholder="masukkan Nama">
                                                    </div>
                                        </div>
                           </div>
                    
                        
                    
</div>
</div>
       </div>
       <div class="col-md-5">
            <div class="card" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title">Ringkasan Belanja</h5>
                       <table class="table">
                           <thead>
                                <th>qty</th>
                                <th>Nama</th>
                                <th>Total</th>
                           </thead>
                           <tbody>
                               <td>2</td>
                               <td>bla ba</td>
                               <td>20000</td>
                           </tbody>
                       </table>
                       <table class="table">
                           <tr>
                                <th>Total Belanja</th>
                                <td>Rp. 30000</td>
                           </tr>
                           <tr id="cost">
                                <th>Ongkos Kirim</th>
                                <td>-</td>
                           </tr>
                           <tr>
                                <th>Total Semua</th>
                                <td>Rp. 30000</td>
                           </tr>
                        </table>
                        <a href="" class="btn btn-dark pull-right px-5">Order</a>
                        <a href="{{ route('cart.index') }}" class="btn btn-dark pull-left px-5">kembali</a>  
                    </form>                                      
</div>
</div>
       </div>
   </div>
  
</section>
@endsection
@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
    $( "#province" ).ready(function(e) {
        console.log(e);
      $.get('/getprovince/',function(data) {
        $.each(data, function(index, get){
          $('#province').append('<option value="'+ get.province_id +'">'+ get.province +'</option>');
        })
      });
    });
    $('#province').on('change', function(e){
      console.log(e);
      var province_id = e.target.value;
      $.get('/getcity/' + province_id,function(data) {
        console.log(data);
        $('#cities').empty();
        $('#cities').append('<option value="0" selected="true">Pilih Kota</option> disable');
        $('#kurir').empty();
        $('#kurir').append('<option value="0" disable="true" selected="true">Pilih Kurir</option>');
        $('#cost').empty();
        $('#cost').append('  <th>Ongkos Kirim</th><td>-</td>');
        

        $.each(data, function(index, get){
          $('#cities').append('<option value="'+ get.city_id +'">'+ get.type +' '+ get.city_name +'</option>');
        })
      });
    });

    $('#cities').on('change', function(e){
      console.log(e);
      $.get('/getkurir/',function(data) {
        $('#kurir').empty();
        $('#kurir').append('<option value="0" disable="true" selected="true">Pilih Kurir</option>');
        $('#cost').empty();
        $('#cost').append('  <th>Ongkos Kirim</th><td>-</td>');

        $.each(data, function(index, get){
          $('#kurir').append('<option value="'+ get.kurir_id +'">'+ get.name +'</option>');
        })
      });
    });
    $('#kurir').on('change', function(e){
      var kurir_id = e.target.value;
      console.log(e);
      $.get('/getlayanan/'+kurir_id,function(data) {
        console.log(data);
        $('#paket').empty();
        $('#paket').append('<option value="0" disable="true" selected="true">Pilih Paket</option>');
        $('#cost').empty();
        $('#cost').append('  <th>Ongkos Kirim</th><td>-</td>');
        $.each(data, function(index, get){
         $('#paket').append('<option value="'+index+'">'+ get.service +'</option>');
         
        })
      });
    });
    $('#paket').on('change', function(e){
      var paket_id= e.target.value;
      console.log(e);
      $.get('/getcost/'+paket_id,function(data) {
        console.log(data);
        $('#cost').empty();
        $.each(data, function(index, get){
          $('#cost').append('<th>Ongkos Kirim</th><td>Rp.'+get.value+'</td>');
        })
      });
    });
    


  </script>
@endpush