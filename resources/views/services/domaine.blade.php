@extends('layouts.care')

@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result alert alert-{{ $domaine->services->isEmpty() ? "danger" : "secondary"}}">
                    @if(!$domaine->services->isEmpty())
                      <h2 class="text-center">Services du domaine {{$domaine->name}}</h2>
                      @else
                      <h3 class="text-center">Aucun service dans le domaine <b><i>{{$domaine->name}}</i></b> vous pouvez faire une proposition de service</h3>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
              <div class="col-md-3">
                <div class="category-sidebar">
                    <div class="widget category-list">
                       <x-domaine  :category="$category"></x-domaine>
                   </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="product-grid-list">
                      <div class="row mt-30">
                        @forelse($domaine->services as $item)
                        <div class="col-sm-12 col-lg-4 col-md-6">
                        <div class="product-item bg-light">
                            <div class="card">
                                <div class="thumb-content">
                                    <!-- <div class="price">$200</div> -->
                                    <a href="{{ route('provider.path',$item->slug) }}">
                                        <img class="card-img-top img-fluid" src="{{ asset('storage/'.$item->image) }}" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><a href="{{ route('provider.path',$item->slug) }}">{{$item->name}}</a></h4>
                                </div>
                            </div>
                        </div>
                        </div>
                        @empty
                        <p>Veuillez entrer les informations afin de faire la proposition</p>
                        <form class="form-group container" method="POST" action="{{ route('create.service.proposal') }}">
                        @if(session()->has('success'))
                          <div class="alert alert-success">
                              {{session()->get('success')}}
                          </div>
                        @endif
                            @csrf
                            <input value="{{old('prestation')}}" class="form-control" type="text" name="prestation" placeholder="Prestation">
                            {!! $errors->first('prestation','<span class="help-block error">:message</span>') !!}<br>

                            <input value="{{old('firstname')}}" class="form-control" type="text" name="firstname" placeholder="Votre nom">
                            {!! $errors->first('firstname','<span class="help-block error">:message</span>') !!}<br>

                            <input value="{{old('lastname')}}" class="form-control" type="text" name="lastname" placeholder="Votre prénoms">
                            {!! $errors->first('lastname','<span class="help-block error">:message</span>') !!}<br>

                            <input value="{{old('phone')}}" class="form-control" type="text" name="phone" placeholder="Votre contact">
                            {!! $errors->first('phone','<span class="help-block error">:message</span>') !!}<br>


                            <input class="form-control" value="{{$domaine->id}}" type="hidden" name="domaine_id"><br>
                            <button class="btn btn-success mb-3" style="display: block; width: 100%;">ENVOYER</button>
                        </form>
                        @endforelse         
           
                   </div>
            <div class="container">
            </div>
                </div>
    </div>
</section>
@stop