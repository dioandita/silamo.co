@push('css')
<style>
    #feauture img{
    width: 100%;
    height: 75%;
}
#feauture img:hover{
    opacity: 0.5;
}
#feauture .btn {
    position: absolute;
    top: 75%;
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
  #feauture .btn:hover {
    background-color: grey;
  }
</style>
@endpush
<section id="feauture" class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Recent Ordered</h3>
                <img src="{{asset('templatehome/chair.jpg')}}"  alt="...">
                <button class="btn">Buy</button>
            </div>
            <div class="col-md-8">
              <h3>Custom Woodwork</h3>
                <img src="{{asset('templatehome/workWood.jpg')}}"  alt="...">
                <button class="btn">Custom Now!</button>
            </div>
        </div>
      </section>