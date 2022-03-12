@extends('layouts.app')

    @section('content')
        
    @include('layouts.nav')

    <div class="hero-wrap js-fullheight" style="background-image: url('{{$room->image}}');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
              <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Start</a></span> <span class="mr-2"><a href="{{route('room.index')}}">Pokoje</a></span></p>
              <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$room->name}}</h1>
            </div>
          </div>
        </div>
      </div>
  
  
      <section class="ftco-section ftco-degree-bg">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    {{-- <div class="col-md-12 ftco-animate">
                        <div class="single-slider owl-carousel">
                            <div class="item">
                                <div class="hotel-img" style="background-image: url(images/hotel-2.jpg);"></div>
                            </div>
                            <div class="item">
                                <div class="hotel-img" style="background-image: url(images/hotel-3.jpg);"></div>
                            </div>
                            <div class="item">
                                <div class="hotel-img" style="background-image: url(images/hotel-4.jpg);"></div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                        <span>Nasze najlepsze hotele i pokoje</span>
                        <h2>{{$room->name}}</h2>
                        <p class="rate mb-5">
                            <span class="loc"><a href="#"><i class="icon-map"></i> Nr. pokoju: 10045</a></span>
                            <span class="star">
                                  <i class="icon-star"></i>
                                  <i class="icon-star"></i>
                                  <i class="icon-star"></i>
                                  <i class="icon-star"></i>
                                  <i class="icon-star-o"></i>
                                  8 Rating</span>
                              </p>
                              <div class="d-md-flex mt-5 mb-5">
                                {{$room->description}}
                              </div>
                    </div>
                    {{-- <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                        <h4 class="mb-4">Our Rooms</h4>
                        <div class="row">
                            <div class="col-md-4">
                                      <div class="destination">
                                          <a href="hotel-single.html" class="img img-2" style="background-image: url(images/room-4.jpg);"></a>
                                          <div class="text p-3">
                                              <div class="d-flex">
                                                  <div class="one">
                                                      <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
                                                      <p class="rate">
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star-o"></i>
                                                          <span>8 Rating</span>
                                                      </p>
                                                  </div>
                                                  <div class="two">
                                                      <span class="price per-price">$40<br><small>/night</small></span>
                                                  </div>
                                              </div>
                                              <p>Far far away, behind the word mountains, far from the countries</p>
                                              <hr>
                                              <p class="bottom-area d-flex">
                                                  <span><i class="icon-map-o"></i> Miami, Fl</span> 
                                                  <span class="ml-auto"><a href="#">Book Now</a></span>
                                              </p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="destination">
                                          <a href="hotel-single.html" class="img img-2" style="background-image: url(images/room-5.jpg);"></a>
                                          <div class="text p-3">
                                              <div class="d-flex">
                                                  <div class="one">
                                                      <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
                                                      <p class="rate">
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star-o"></i>
                                                          <span>8 Rating</span>
                                                      </p>
                                                  </div>
                                                  <div class="two">
                                                      <span class="price per-price">$40<br><small>/night</small></span>
                                                  </div>
                                              </div>
                                              <p>Far far away, behind the word mountains, far from the countries</p>
                                              <hr>
                                              <p class="bottom-area d-flex">
                                                  <span><i class="icon-map-o"></i> Miami, Fl</span> 
                                                  <span class="ml-auto"><a href="#">Book Now</a></span>
                                              </p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="destination">
                                          <a href="hotel-single.html" class="img img-2" style="background-image: url(images/room-6.jpg);"></a>
                                          <div class="text p-3">
                                              <div class="d-flex">
                                                  <div class="one">
                                                      <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
                                                      <p class="rate">
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star"></i>
                                                          <i class="icon-star-o"></i>
                                                          <span>8 Rating</span>
                                                      </p>
                                                  </div>
                                                  <div class="two">
                                                      <span class="price per-price">$40<br><small>/night</small></span>
                                                  </div>
                                              </div>
                                              <p>Far far away, behind the word mountains, far from the countries</p>
                                              <hr>
                                              <p class="bottom-area d-flex">
                                                  <span><i class="icon-map-o"></i> Miami, Fl</span> 
                                                  <span class="ml-auto"><a href="#">Book Now</a></span>
                                              </p>
                                          </div>
                                      </div>
                                  </div>
                        </div>
                    </div> --}}
                    <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                        <h4 class="mb-5">Sprawdź dostępność i rezerwację</h4>
                        <div class="fields">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <input type="text" id="checkin_date" class="form-control" placeholder="Date from">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <input type="text" id="checkin_date" class="form-control" placeholder="Date to">
                                </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                  <div class="select-wrap one-third">
                                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                  <select name="" id="" class="form-control" placeholder="Guest">
                                    <option value="0">Guest</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                  </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                  <div class="form-group">
                                  <div class="select-wrap one-third">
                                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                  <select name="" id="" class="form-control" placeholder="Children">
                                    <option value="0">Children</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                  </select>
                                </div>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="submit" value="Check Availability" class="btn btn-primary py-3">
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                        <h4 class="mb-4">Review &amp; Ratings</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" class="star-rating">
                                            <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  <label class="form-check-label" for="exampleCheck1">
                                                      <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i> 100 Ratings</span></p>
                                                  </label>
                                            </div>
                                            <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                 <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i> 30 Ratings</span></p>
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 5 Ratings</span></p>
                                           </label>
                                            </div>
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span></p>
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span></p>
                                              </label>
                                            </div>
                                          </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div> <!-- .col-md-8 -->
          </div>
        </div>
      </section> <!-- .section -->
  


    @include('layouts.footer')

@endsection