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
                            <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="#">{{$house->location}}</a></li>
                        </ul>
                             @if (session()->has('message'))
                           <div style="display: block; width: 100%; " class="btn btn-success flash">
                         {{session()->get('message')}}
                          </div>
                         @endif
                      
                    </div>

                    <!-- product slider -->
                    <div class="product-slider">
                        <div class="product-slider-item my-4" data-image="{{ asset('care/images/'.$house->image_1) }}">
                            <img class="img-fluid w-100" src="{{ asset('care/images/'.$house->image_1) }}" alt="product-img">
                        </div>
                        <div class="product-slider-item my-4" data-image="{{ asset('care/images/'.$house->image_1) }}">
                            <img class="d-block img-fluid w-100" src="{{ asset('care/images/'.$house->image_1) }}" alt="Second slide">
                        </div>
                        <div class="product-slider-item my-4" data-image="{{ asset('care/images/'.$house->image_1) }}">
                            <img class="d-block img-fluid w-100" src="{{ asset('care/images/'.$house->image_1) }}" alt="Third slide">
                        </div>
                        <div class="product-slider-item my-4" data-image="{{ asset('care/images/'.$house->image_1) }}">
                            <img class="d-block img-fluid w-100" src="{{ asset('care/images/'.$house->image_1) }}" alt="Third slide">
                        </div>
                   
                    </div>
                    <!-- product slider -->

                    <div class="container mt-9">
                      
                    </div>

                    <div class="content mt-5 pt-5">
                          <h2 class="text-center mb-4">Contactez le chasseur immobilier</h2>
                     
                               <form action="{{ route('call.provider','prestation-house') }}" class="row" method="POST">
                                @csrf
                                                <div class="col-lg-6">
                                                    <input value="{{old('name')}}" type="text" name="fullname" id="name" class="form-control" placeholder="Nom">
                                                {!! $errors->first('name','<span class="help-block error">:message</span>') !!}

                                                </div>
                                                <div class="col-lg-6">
                                                    <input value="{{old('email')}}" type="email" name="email" id="email" class="form-control" placeholder="Email">
                                              {!! $errors->first('email','<span class="help-block error">:message</span>') !!}

                                                </div>
                                                 <div class="col-lg-6 mt-1">
                                                    <input value="{{old('phone')}}" type="text" name="phone" id="email" class="form-control" placeholder="Contact">
                                            {!! $errors->first('contact','<span class="help-block error">:message</span>') !!}

                                                </div>
                                                   <div class="col-lg-6 mt-1">
                                                    <input value="{{old('city')}}" type="text" name="city" id="email" class="form-control" placeholder="Commune">
                                             {!! $errors->first('commune','<span class="help-block error">:message</span>') !!}

                                                </div>
                                                <input type="hidden" name="prestataire_id" id="email" value="{{$house->user->id}}" class="form-control" placeholder="Email">
                                                <input type="hidden" name="prestation" id="email" value="{{$house->id}}" class="form-control" placeholder="Email">

                                              
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

