@extends('layouts.care')
@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-light">
                    <h2 class="text-center">Contacter le prestataire</h2>
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
        <li><a href="{{ route('category.details.path',$item->slug) }}">{{$item->name}}<span>{{$item->services_count}}</span></a></li>
        @endforeach

    </ul>
</div>

         </div>
            </div>
            <div class="col-lg-9 col-md-8">
             <div class="ad-listing-list mt-20">
                <div class="row p-lg-3 p-sm-5 p-4">
                     <div class="container mt-2 mb-1">
                   <h2>Vos informations</h2>
                       @if (session()->has('message'))
                           <div style="display: block; width: 100%; margin-bottom: 1px;" class="btn btn-success">
                         {{session()->get('message')}}
                          </div>
                         @endif
                         @if (session()->has('error'))
                          <div class="btn btn-danger" style="display: block; width: 100%; height: 50px;">
                             {{session()->get('error')}}
                          </div>
                         @endif
                     <form class="form-group" action = "{{ route('call.provider','prestation-service') }}" method="POST" >
                        @csrf
                        <input value="{{old('fullname')}}" class="form-control" type="text" name="fullname" placeholder="Nom & prénoms"><br>
                        <input value="{{old('email')}}" class="form-control" type="email" name="email" placeholder="Email"><br>
                        <input value="{{old('phone')}}" class="form-control" type="text"  name="phone" placeholder="Contact"><br>
                        <input value="{{old('city')}}" class="form-control" type="text"  name="city" placeholder="Commune"><br>
                        <input class="form-control" value="{{$service->name}}" type="hidden"  name="prestation" placeholder="Commune">
                        <input  class="form-control" value="{{$prestataire->id}}" type="hidden"  name="prestataire_id" placeholder="">
                         
                        <button class="btn btn-info" style="display: block; width: 100%;">ME CONTACTER MAINTENANT</button>
                    </form>
                    </div>
                </div>
                
            </div>
            </div>
        </div>
    </div>
</section>



@stop


