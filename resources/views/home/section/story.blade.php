@push('css')
<style>
#our_story .carousel-caption{
position: absolute;
top: 0;
background-color: black;
width: 35%;
        right: 0;
        margin-left: 50%;
        height: 100%;
    }

#our_story h1{
  font-size: 2em;
  text-align: center;
  position: absolute;
  top: 10%;
  left: 15%;

}
#our_story p{
  position: absolute;
  font-size: 1em;
  top: 25%;
  left: 10%;
  right: 10%;
  text-align: center;


}
</style>
@endpush
<section id="our_story" class="container w-75">
        <h3 class="text-center">Our Story</h3>
        <div id="ll" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{asset('templatehome/1.jpg')}}" alt="First slide">
                  <div class="carousel-caption d-none d-sm-block">
                     <h1><b> Craftsmanship<b></h1>
                      <p class="lead text-justify">The quality of a woodwork
                          lies in its craftsmanship. We
                          work beyond hours to put
                          together the best. And only
                          the best.</p>
                        </div>
                  </div>
                  <div class="carousel-item">
                      <img class="d-block w-100" src="{{asset('templatehome/1.jpg')}}" alt="First slide">
                          <div class="carousel-caption d-none d-sm-block">
                             <h1><b> Passion<b></h1>
                              <p class="lead text-justify">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                                </div>
                          </div>
                          <div class="carousel-item">
                              <img class="d-block w-100" src="{{asset('templatehome/1.jpg')}}" alt="First slide">
                                  <div class="carousel-caption d-none d-sm-block">
                                     <h1><b> Passion<b></h1>
                                      <p class="lead text-justify">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                                        </div>
                                  </div>
            </div>
            <a class="carousel-control-prev" href="#ll" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#ll" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>
    </section>