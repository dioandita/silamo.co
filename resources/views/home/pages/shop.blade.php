@extends('layouts.home')
@push('css')
<style>
    #sale{
       margin-top: 10px;
       margin-bottom: 10%;
    }
    #sale .btn-primary{
        background-color: black; 
        border: none;
    }
    #sale .btn-primary:hover{
        background-color: grey; 
        
    }
    #sale .btn-primary:active{
        background-color: grey; 
        border: none;
    }
    #sale .card{
        width: 100%;  
        height: 75%;
    } 
    
    
</style>
@endpush
@section('content')
<section id="sale" class="container">
    <div class="row justify-content-md-left">
        @foreach ($data as $item)
        <div class="col-md-3 col-sm-6">
                <div class="card">
                        <img class="card-img-top h-100" src="{{ asset('images/shop') }}/{{$item->image}}" alt="Card image cap"  >
                                <div class="card-body pb-5">
                                <h5 class="card-title">{{$item->name}}</h5>
                                  <p class="card-text">{{$item->price}}</p>
                                  <a href="" class="btn btn-primary btn-sm pull-right" style="padding: 5px 25px;">Detail</a>
                                  <a href="{{ route('cart.edit',$item->id)}}" class="btn btn-primary btn-sm pull-left" style="padding: 5px 23px;">Buy</a>
                                </div>
                              </div>
        </div>   
        @endforeach
    </div>
</section>
@endsection