@extends('layouts.master')
@section('title')
Details sur la maison
@stop
@section('content')
<section class="section bg-gray">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <!-- Left sidebar -->
            <div class="col-md-8">
                <div class="product-details">
                    <div class="product-meta">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-user-o"></i><a href="#">Maison a louée</a></li>
                            <li class="list-inline-item"><i class="fa fa-folder-open-o"></i><a href="#">{{$house->place}} pieces</a></li>
                            <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="#">{{ $house->city->city }}</a></li>
                        </ul>
                        <div class="alert alert-light mt-4">
                            {{$house->description}}
                        </div>
                             @if (session()->has('success'))
                           <div style="display: block; width: 100%; " class="alert alert-success flash">
                         {{session()->get('success')}}
                          </div>
                         @endif
                      
                    </div>

                    <!-- product slider -->
                    <div class="product-slider">
                        <div class="product-slider-item my-4" data-image="{{ asset("storage/$house->image_1") }}">
                            <img class="img-fluid w-100" src="{{ asset("storage/$house->image_1") }}" alt="product-img">
                        </div>
                        <div class="product-slider-item my-4" data-image="{{ asset("storage/$house->image_2") }}">
                            <img class="d-block img-fluid w-100" src="{{ asset("storage/$house->image_2") }}" alt="Second slide">
                        </div>
                        <div class="product-slider-item my-4" data-image="{{ asset("storage/$house->image_3") }}">
                            <img class="d-block img-fluid w-100" src="{{ asset("storage/$house->image_3") }}" alt="Third slide">
                        </div>
                        <div class="product-slider-item my-4" data-image="{{ asset("storage/$house->image_4") }}">
                            <img class="d-block img-fluid w-100" src="{{ asset("storage/$house->image_4") }}" alt="Third slide">
                        </div>
                   
                    </div>
                    <!-- product slider -->

                    <div class="container mt-9">
                      
                    </div>

                    <div class="content mt-5 pt-5">
                          <h2 class="text-center mb-4">Contactez le chasseur immobilier</h2>
                     
                               <form action="{{ route('store.call.canvasser') }}" class="row" method="POST">
                                @csrf
                                                <div class="col-lg-6">
                                                    <input value="{{old('firstname')}}" type="text" name="firstname" id="name" class="form-control" placeholder="Nom">
                                                {!! $errors->first('firstname','<span class="help-block error">:message</span>') !!}

                                                </div>
                                                <br>
                                                <br>
                                                 <div class="col-lg-6 mt-1">
                                                    <input value="{{old('lastname')}}" type="text" name="lastname" id="name" class="form-control" placeholder="Prénom">
                                                  {!! $errors->first('lastname','<span class="help-block error">:message</span>') !!}
                                                </div>
                                                <br>
                                                <br>
                                                <div class="col-lg-6">
                                                    <input value="{{old('email')}}" type="email" name="email" id="email" class="form-control" placeholder="Email">
                                                     {!! $errors->first('email','<span class="help-block error">:message</span>') !!}

                                                </div>
                                                <br>
                                                 <div class="col-lg-6 mt-1">
                                                    <input value="{{old('phone')}}" type="text" name="phone" id="email" class="form-control" placeholder="Contact">
                                                      {!! $errors->first('contact','<span class="help-block error">:message</span>') !!}

                                                </div>
                                                <br>
                                                   <div class="col-lg-6 mt-1">
                                                    <input value="{{old('city')}}" type="hidden" name="city" id="email" class="form-control" placeholder="Commune">
                                             {!! $errors->first('commune','<span class="help-block error">:message</span>') !!}

                                                </div>
                                                
                                                <input type="hidden" name="house_id" id="email" value="{{$house->id}}" class="form-control" placeholder="Email">

                                              
                                                <div class="col-12 mt-4">
                                                    <button style="display: block; width: 100%;" type="submit" class="btn btn-main">ENVOYER</button>
                                                </div>
                                            </form>
                     
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="widget price text-center">
                        <h4>Prix de la maison</h4>
                        <p>{{$house->price }} FCFA</p>
                    </div>
                    <!-- User Profile widget -->
                    <div class="widget user text-center">
                        <img class="rounded-circle img-fluid mb-5 px-5" src="{{asset('care/images/avatar-homme.jpeg')}}" alt="">
                        <h4><a href="#">{{$house->user->firstname}}</a></h4>
                        <p class="member-time">{{$house->user->lastname}}</p>
                        <p class="text-center">
                          <b>Chasseur immobilier sur House Care</b>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container End -->
</section>

@stop

