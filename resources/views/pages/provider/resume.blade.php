@extends('layouts.care')

@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-light">
                    <h2 class="text-center">Résumé sur la prestation</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="category-sidebar">
                    <div class="widget category-list">
    <h4 class="widget-header">Categories</h4>
    <ul class="category-list">
        @foreach ($category as $item)
        <li><a href="{{ route('category.details.path',$item->slug) }}">{{$item->name}}<span>{{$item->prestations_count}}</span></a></li>
        @endforeach

    </ul>
</div>

         </div>
            </div>
            <div class="col-lg-9 col-md-8">
             <div class="ad-listing-list mt-20">
                <div class="row p-lg-3 p-sm-5 p-4">
                    <div class="col-lg-4 align-self-center">
                        <a href="single.html">
                            <img src="{{($prestataire->genre == 'M') ? asset('care/images/avatar-homme.jpeg') : asset('care/images/avatar-femme.jpg')}}" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 col-md-10">
                                <div class="ad-listing-content">
                                    <div>
                                        <a href="single.html" class="font-weight-bold"></a>
                                    </div>
                                    <ul class="list-inline mt-2 mb-3">
                                        <li class="list-inline-item"><a href="category.html"> <i class="fa fa-user"></i>{{$prestataire->firstname}} {{$prestataire->lastname}}</a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-map"></i> {{$prestataire->common}}</a></li>
                                    </ul>
                                     <ul class="list-inline mt-2 mb-3">
                                        <h2 style="color: blue;">Autres prestations</h2>
                                        @foreach($prestataire->services as $item)
                                        <li class="list-inline-item"><a>{{$item['name']}}</a></li>
                                        @endforeach
                                    </ul>
                                   
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                            </div>
                        </div>
                    </div>
              
                     <div class="container mt-2 mb-1">
                    <h2>Resumé de la prestation de Mr/Mme {{$prestataire->firstname}} {{$prestataire->lastname}}</h2>
                     <form class="form-group">
                        <input class="form-control" type="text" disabled="disabled" value="Prestataion: {{$service->name}}" name="prestation" placeholder="Prestation">
                         <input class="form-control" type="text" disabled="disabled" value="Prix: {{$service->price}} FCFA" name="price" placeholder="Prestation">
                        <input class="form-control" type="text" disabled="disabled" value=" Commune : {{$prestataire->common}}" name="price" placeholder="Prestation"><br>

                    </form>
                        <a class="btn btn-info" style="display: block; width: 100%;" href="{{ route('provider.call.path',['user' => $prestataire->token,'service' => $service->slug]) }}">ME CONTACTER MAINTENANT</a>

                        
                    </div>
                </div>
                
            </div>
            </div>
        </div>
    </div>
</section>



@stop


