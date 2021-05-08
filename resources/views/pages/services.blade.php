@extends('layouts.care')

@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result alert alert-secondary">
                    <h2 class="text-center">NOS PRESTATIONS DE SERVICES</h2>
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
                        @foreach($services_paginate as $item)
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
                        @endforeach             
           
                   </div>
            <div class="container">
              {{ $services_paginate->links() }}
            </div>
        </div>
    </div>
</section>
@stop