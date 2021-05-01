@extends('layouts.master')
@section('title')
Prestataires disponibles
@stop
@section('content')
<section class="section-sm">
    <div class="container">
    
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="category-sidebar">
                    <div class="widget category-list">
    <h4 class="widget-header">Categories</h4>
    <ul class="category-list">
        @foreach ($category as $item)
        <li><a href="{{ route('category.details.path',$item->slug) }}">{{$item->name}}<span>{{$item->services_count}}</span></a></li>
        @endforeach

    </ul>
</div>


         </div>
            </div>
            <div class="col-lg-9 col-md-8">

                @if (empty($providers->all()))
                    <h2 class="text-center" style="color: red;">Pas de prestataire disponible pour cette prestation</h2>
                    <h3 class="text-center">Proposer une connaissance pour cette prestation</h3>
                       @if (session()->has('message'))
                           <div style="display: block; width: 100%;" class="btn btn-success mt-2 flash">
                         {{session()->get('message')}}
                          </div>
                         @endif
                         @if (session()->has('error'))
                          <div class="btn btn-danger mt-2 flash" style="display: block; width: 100%; height: 50px;">
                             {{session()->get('error')}}
                          </div>
                         @endif
                    <form class="form-group" method="POST" action="">
                        @csrf
                        <input value="{{old('name')}}" class="form-control" type="text" name="name" placeholder="Nom & Prénoms du prestataire">
                        {!! $errors->first('name','<span class="help-block error">:message</span>') !!}<br>

                        <input value="{{old('contact')}}" class="form-control" type="text" name="contact" placeholder=" Son contact">
                        {!! $errors->first('contact','<span class="help-block error">:message</span>') !!}

                        <input class="form-control" value="" type="hidden" name="prestation"><br>
                        <button class="btn btn-success mb-3" style="display: block; width: 100%;">ENVOYER</button>
                    </form>
                @endif
        <div class="row">
        @foreach ($providers[0]->users as $item)
        @if(userActive($item->token))
        <div class="col-md-6">
            <div class="ad-listing-list mt-20">
                <div class="row p-lg-3 p-sm-5 p-4">
                    <div class="col-lg-4 align-self-center">
                        <a href="single.html">
                            <img src="{{($item->genre == 'M') ? asset('care/images/avatar-homme.jpeg') : asset('care/images/avatar-femme.jpg')}}" class="img-fluid" alt="">
                            
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12 col-md-10">
                                <div class="ad-listing-content">
                                    <div>
                                        <a href="#" class="font-weight-bold"></a>
                                    </div>
                                    <ul class="list-inline mt-4 mb-3">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-user"></i> {{$item->firstname}} {{$item->lastname}}
                                            </a><br>
                                              <a href="#">
                                                <i class="fa fa-map"></i> {{$item->common}}
                                            </a>
                                        </li> 
                                      
                                         <li class="">
                                        </li>
                                    </ul>
                                    <p class="pr-5">{{$item->compagny}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center"></div>
                        </div>
                    </div>

                    <div class="container mt-2 mb-1">
                        <a class="btn btn-info" style="display: block; width: 100%;" href="{{ route('provider.resume.path',['user' => $item->token,'service' => $service]) }}">ME CONTACTER</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        </div>

            </div>
        </div>
    </div>
</section>

@stop


