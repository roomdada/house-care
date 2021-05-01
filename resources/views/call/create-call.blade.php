@extends('layouts.care')
@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result alert alert-secondary">
                    <h2 class="text-center">Confirmer maintenant</h2>
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
        <li><a href="">{{$item->name}}<span>{{$item->services_count}}</span></a></li>
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
                       @if (session()->has('success'))
                           <div style="display: block; width: 100%; margin-bottom: 1px;" class="alert alert-success">
                         {{session()->get('success')}}
                          </div>
                         @endif
                         @if (session()->has('error'))
                          <div class="btn btn-danger" style="display: block; width: 100%; height: 50px;">
                             {{session()->get('error')}}
                          </div>
                         @endif
                     <form class="form-group" action="{{ route('store.call.provider') }}" method="POST" >
                        @csrf
                        <input  value="{{auth()->check() ? auth()->user()->firstname : old('firstname')}}" class="form-control" type="text" name="firstname" placeholder="Nom">
                        @error('firstname')<span style="color: red;">{{$message}}</span>@enderror
                        <br>
                        <input value="{{auth()->check() ? auth()->user()->lastname : old('lastname') }}" class="form-control" type="text" name="lastname" placeholder="Prénom">
                        @error('lastname')<span style="color: red;">{{$message}}</span>@enderror

                        <br>
                        <input  value="{{auth()->check() ? auth()->user()->email : old('email') }}" class="form-control" type="text"  name="email" placeholder="Email">
                        @error('email')<span style="color: red;">{{$message}}</span>@enderror

                        <br>
                        <input value="{{auth()->check() ? auth()->user()->phone : old('phone') }}" class="form-control" type="text"  name="phone" placeholder="Contact"><br>
                        @error('contact')<span style="color: red;">{{$message}}</span>@enderror

                        <input value="{{auth()->check() ? auth()->user()->city : old('city') }}" class="form-control" type="text"  name="city" placeholder="Commune"><br>
                        @error('city')<span style="color: red;">{{$message}}</span>@enderror

                        <input class="form-control" value="{{$service->id}}" type="hidden"  name="service_id" placeholder="Commune">
                        <input  class="form-control" value="{{$provider->id}}" type="hidden"  name="user_id" placeholder="">
                         
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


