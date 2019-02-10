@push('css')
<style>
    #sale img{
    width: 100%;
    height: 75%;
 }
 #sale img:hover{
     opacity: 0.5;
  }
 #sale .btn {
     position: absolute;
     top: 60%;
     left: 50%;
     transform: translate(-50%, -50%);
     -ms-transform: translate(-50%, -50%);
     background-color: black;
     color: white;
     font-size: 16px;
     padding: 12px 50px;
     border: none;
     cursor: pointer;
     border-radius: 5px;
     text-align: center;
   }
   #sale .btn:hover {
     background-color: grey;
   }
</style>
@endpush
<section id="sale" class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <img src="{{asset('templatehome/justOut.jpg')}}" alt="...">
                <button class="btn">Buy</button>
            </div>
            <div class="col-md-3">
                <img src="{{asset('templatehome/onsale.jpg')}}" alt="...">
                <button class="btn">Buy</button>
            </div>
            <div class="col-md-4">
                <img src="{{asset('templatehome/happyPack.jpg')}}"  alt="...">
                <button class="btn">Buy</button>
            </div>
        </div>
</section>