@extends('layouts.home')
@push('css')
<style>
   #cart{
       margin-top: 20px;
       margin-bottom: 10%;
   }
</style>
@endpush
@section('content')
<section id="cart" class="container mb-3">
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Sub</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td><img src="{{ asset('images/shop') }}/{{$item->image}}" alt=""></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <form id="update" action="{{ route('cart.update',$item->rowId)}}" method="POST">
                                {{csrf_field()}}
                                {{ method_field('PATCH') }} 
                                <td><input type="number" id="qty" name="qty" value="{{$item->qty}}" class="form-control w-25 pr-0"></td>
                              </form>
                            <td id="subtotal">{{$item->subtotal}}</td>
                            <td>
                              <a class="btn btn-gradient-danger btn-sm" 
                                href="{{ route('cart.update',$item->rowId)}}"
                                onclick="event.preventDefault();
                                document.getElementById('update').submit();">Update</a>
                              <a class="btn btn-gradient-danger btn-sm" 
                                href="{{ route('cart.destroy',$item->rowId)}}"
                                onclick="event.preventDefault();
                                document.getElementById('delete').submit();">Hapus</a>
                                <form id="delete" action="{{ route('cart.destroy',$item->rowId)}}" method="POST">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }} 
                                      </form>
                                      
                            <td>
                          </tr> 
                    @endforeach
                    <tfoot>
                      <tr>
                          <th colspan="4" class="text-right">Total Semua</th>
                          <td>{{Cart::total()}}</td>
                      </tr>
                      <tr>
                          <th colspan="5">
                              <a href="{{ route('checkout')}}" class="btn btn-dark pull-right ml-1">Process Checkout</a>
                            <a href="{{ route('home')}}" class="btn btn-dark pull-right">Belanja Lagi</a>
                          </th>
                      </tr>
                      
                    </tfoot>
                </tbody>
              </table>
</section>
@endsection
