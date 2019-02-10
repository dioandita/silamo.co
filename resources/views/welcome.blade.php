@extends('layouts.home')
@section('content')
        <div class="input-group mb-3">
        <label for=""></label>
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Provinsi</label>
        </div>
        <select class="custom-select" id="provinces" name="provinces">
        @foreach ($data as $item)
        <option selected value="{{$item['province_id']}}">{{$item['province']}}</option>
        @endforeach
        </select>
      </div>
      <form action="{{ route('getCost') }}" method="post">
        {{ csrf_field() }}
      <div class="input-group mb-3">
            <label for=""></label>
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Kota</label>
            </div>
            <select class="custom-select" id="cities" name="city_id">
            <option value="0"> select city</option>
            </select>
          </div>
          <div class="input-group mb-3">
                <label for=""></label>
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Kurir</label>
                </div>
                <select class="custom-select" id="kurir" name="kurir_id">
                  <option value="0"> select kurir</option>
                </select>
              </div>
              <button type="submit">Test</button>
            </form>
@endsection
@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script type="text/javascript">
        $('#provinces').on('change', function(e){
          console.log(e);
          var province_id = e.target.value;
          $.get('/getcity/' + province_id,function(data) {
            console.log(data);
            $('#cities').empty();
            $('#cities').append('<option value="0" disable="true" selected="true">=== Select Regencies ===</option>');
  
            $('#districts').empty();
            $('#districts').append('<option value="0" disable="true" selected="true">=== Select Districts ===</option>');
  
            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');
  
            $.each(data, function(index, get){
              $('#cities').append('<option value="'+ get.city_id +'">'+ get.type +' '+ get.city_name +'</option>');
            })
          });
        });
  
        $('#cities').on('change', function(e){
          console.log(e);
          $.get('/getkurir/',function(data) {
            $('#kurir').empty();
            $('#kurir').append('<option value="0" disable="true" selected="true">=== Select Districts ===</option>');
  
            $.each(data, function(index, get){
              $('#kurir').append('<option value="'+ get.kurir_id +'">'+ get.name +'</option>');
            })
          });
        });
  
        $('#districts').on('change', function(e){
          console.log(e);
          var districts_id = e.target.value;
          $.get('/json-village?districts_id=' + districts_id,function(data) {
            console.log(data);
            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');
  
            $.each(data, function(index, villagesObj){
              $('#villages').append('<option value="'+ villagesObj.id +'">'+ villagesObj.name +'</option>');
            })
          });
        });
  
  
      </script>
  
@endpush

    
