@extends('layouts.care')
@section('content')
<section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>House Care</h1>
                    <p>votre interface clients - prestataires préférée pour tous vos besoins se rapportant aux ménages</p>
                    <div class="short-popular-category-list text-center">
                        <h2>Categories populaires</h2>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#"> Froid et climatisation</a></li>
                            <li class="list-inline-item">
                                <a href="#"> Jardinage</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"> Travaux de Plomberie et Sanitaire</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Electricité</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <!-- Advance Search -->
                <div class="advance-search container">
                        <div class="container">
                         <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12 align-content-center">
                                        <form action="{{ route('search.path') }}" method="POST" >
                                            @csrf
                                            <div class="form-row container">
                                              
                                                <div class="form-group col-md-4">
                                                    <select name="city" class="w-100 form-control mt-lg-1 mt-md-2">
                                                        <option value="">Commune</option>
                                                        @foreach($cities as $city)
                                                         <option value="{{ $city->city }}">{{ $city->city }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('city')<span style="color: red;">{{$message}}</span>@enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <select name="service" class="w-100 form-control mt-lg-1 mt-md-2">
                                                         <option value="">prestation</option>
                                                        @foreach($services as $service)
                                                         <option value="{{$service->name}}">{{$service->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('service')<span style="color: red;">{{$message}}</span>@enderror

                                                </div>
                                                
                                                <div class="form-group col-md-4 align-self-center">
                                                    <button type="submit" class="btn btn-primary w-100">RECHERCHER</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>



<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>SERVICES RECENTS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="trending-ads-slide">
                    @foreach($recents as $item)
                            <div class="col-sm-12 col-lg-4">
                            <div class="product-item bg-light">
                            <div class="card">
                                <div class="thumb-content">
                                    <!-- <div class="price">$200</div> -->
                                    <a href="{{ route('provider.path',$item->slug) }}">
                                        <img class="card-img-top img-fluid" src="{{ asset('storage/'.$item->image) }}" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title text-center"><a href="{{ route('provider.path',$item->slug) }}">{{$item->name}}</a></h4>
                                </div>
                            </div>
                        </div>
                        </div>
                @endforeach
</div>
</div>
</div>
</div>
</section>

<section class=" section">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section title -->
                <div class="section-title">
                    <h2>NOS OFFRES</h2>
                </div>
                <div class="row">
                    <!-- Category list -->
                 
                    @foreach($category as $item)
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <i style="display: block; width: 50px; height: 50px; border-radius: 100%; background-color: {{$item->color}}; margin: auto;" class="bxs bx-show-alt"><img style="margin-top: 10px; margin-right: 5px;" src="{{ asset("care/category_svg/$item->icone") }}"></i> 
                                <a href="{{ route('domaine.services.path',$item->slug) }}"><h4>{{$item->name}}</h4></a>
                            </div>
                            <ul class="category-list" >
                                <li><a href="{{ route('domaine.services.path',$item->slug) }}">Prestations : <span>{{$item->services_count}}</span></a></li>
                            </ul>
                        </div>
                    </div> <!-- /Category List -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>

<section class="call-to-action overly bg-3 section-sm">
    <!-- Container Start -->
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-md-8">
                <div class="content-holder">
                    <h2>COMMENT ÇA MARCHE?</h2>
                    <ul class="list-inline mt-30">
                        <li class="list-item"><h2><i class="fa fa-check"></i>Remplir le formulaire de recherche</h2></li>
                        <li class="list-item"><h2><i class="fa fa-check"></i> Nous vous proposerons des prestataires disponibles en fonction de votre recherche</h2></li>
                        <li class="list-item"><h2><i class="fa fa-check"></i> Contactez un prestataire de votre choix</li></h2>
                       
                        <li class="list-inline-item"><h2><i class="fa fa-check"></i> Le prestataire se rendra chez vous pour la prestation et encaissera le paiement<h2></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->  
</section>
<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Nos maisons en locations</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- offer 01 -->
            <div class="col-lg-12">
                <div class="trending-ads-slide">
        @foreach($houses as $item)
        <div class="col-sm-12 col-lg-4">
            <div class="product-item bg-light">
                <div class="card">
                    <div class="thumb-content">
                        <a href="{{ route('house.details.path',$item->token) }}">
                            <img class="card-img-top img-fluid" src="{{ asset("storage/$item->image_1") }}" alt="Card image cap">
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><a href="">{{$item->city->city}}</a></h4>
                        <ul class="list-inline product-meta">
                            <li class="list-inline-item">
                                <a href="#">{{$item->place}} pieces</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('house.details.path',$item->token) }}">{{$item->price}} FCFA</a>
                            </li>
                        </ul>
                    </div>
                </div>
          </div>
        </div>
        @endforeach       
        </div>
    </div>       
    </div>
</div>
</section>

</div>
</div>
</div>
</div>
</section>
<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>CE QUE DISENT NOS CLIENTS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- offer 01 -->
            <div class="col-lg-12">
                <div class="trending-ads-slide">
                    @foreach($testimony as $item)
                    <div class="col-sm-12 col-lg-4">
                        <!-- product card -->
                    <div class="product-item bg-info">
                        <div class="card" style="border-radius: 150px;">
                            <div class="thumb-content text-center">
                                <!-- <div class="price">$200</div> -->
                                <a href="single.html" style="display: inline-block; transform: translateY(15px);">
                                    <img class="card-img-top img-fluid" style="width: 50px; height: 50px;" src="{{ asset('care/images/user.svg') }}" alt="Card image cap">
                                </a>
                                <h6 class="card-title mt-3" style="display: inline-block;"><a href="single.html">{{$item->user->firstname}}</a></h6>
                            </div>
                            <div class="card-body">
                                <p style="font-size: 14px;" class="card-text text-center"><b>{{$item->testimony}}</b></p>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>


@endsection