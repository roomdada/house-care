@extends('layouts.care')

@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <h2 class="text-center">NOS SERVICES</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-grid-list">
                    <div class="row mt-30">
                 @if (empty($services[0]->services->toArray()))
                       <div class="container ml-0 mr-O">
                         <h1 class="text-center" style="color: red;">Pas de prestations pour <span style="color: grey; font-style: italic; font-size: 24px;">"{{$services[0]->name}}"</span></h1>
                         <div class="container">
                          @if (session()->has('message'))
                           <div style="display: block; width: 100%; " class="btn btn-success flash">
                         {{session()->get('message')}}
                          </div>
                         @endif
                         @if (session()->has('error'))
                          <div class="btn btn-danger flash" style="display: block; width: 100%; height: 50px;">
                             {{session()->get('error')}}
                          </div>
                           @endif
                            <h2 class="text-center">Suggérer une prestation</h2>
                            <form class="form-group" action="{{ route('store.suggestion') }}" method="POST">
                                @csrf
                                <input value="{{old('prestation')}}" type="text" name="prestation" class="form-control" placeholder="Nom de la prestation">
                              {!! $errors->first('prestation','<span class="help-block error">:message</span>') !!}

                                <br>
                                <input value="{{old('email')}}" type="email" name="email" class="form-control" placeholder="votre email">
                             {!! $errors->first('email','<span class="help-block error">:message</span>') !!}

                                <br>
                                <input value="{{old('contact')}}" type="text" name="contact" class="form-control" placeholder="votre contact">
                              {!! $errors->first('contact','<span class="help-block error">:message</span>') !!}

                                <br>
                                <button type="submit" style="display: block; width: 100%;" class="btn btn-success">ENVOYER</button>
                            </form>
                        </div>
                      
                     </div>
                 @endif
                        @foreach($services[0]->services as $item)
                        <div class="col-sm-12 col-lg-4 col-md-6">
                                                    <!-- product card -->
                        <div class="product-item bg-light">
                            <div class="card">
                                <div class="thumb-content">
                                    <!-- <div class="price">$200</div> -->
                                    <a href="{{ route('provider.path',$item->slug) }}">
                                        <img class="card-img-top img-fluid" src="{{ asset('care/images/service-img/'.$item->image) }}" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><a href="{{ route('provider.path',$item->slug) }}">{{$item->name}}</a></h4>
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
@stop