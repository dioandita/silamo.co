@push('css')
    <style>
    #my-corousel .carousel-caption {
    position: absolute;
    left: 20%;
    width: 50%;
    top: 20%;
    margin-left: 15%;
        }
    #my-corousel h1{
    font-size: 5em;
    text-align: left;
        }
    #my-corousel a .carousel-control-next{
            top: 30%;
        }
    </style>
@endpush

<section id="my-corousel">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('templatehome/1.jpg')}}" alt="First slide">
                    <div class="carousel-caption d-none d-sm-block">
                            <h1><b> Passion<b></h1>
                             <p class="lead text-justify">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                               </div>
                         </div>
                         <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('templatehome/2.jpg')}}" alt="Second slide">
                                <div class="carousel-caption d-none d-sm-block">
                                        <h1><b> Passion<b></h1>
                                         <p class="lead text-justify">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                                           </div>
                                     </div>
                                     <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset('templatehome/3.jpg')}}" alt="Third slide">
                                            <div class="carousel-caption d-none d-sm-block">
                                                    <h1><b> Passion<b></h1>
                                                     <p class="lead text-justify">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                                                       </div>
                                                 </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                </div>
              </div>
</section>