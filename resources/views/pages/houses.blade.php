
@extends('layouts.care')

@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <h2 class="text-center">NOS MAISONS EN LOCATION</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-grid-list">
                  <div>
            <div class="row mt-30">
                 @if (empty($houses->all()))
                       <div class="container ml-0 mr-O">
                         <h1 class="text-center" style="color: red;">Aucune maison disponible pour l'instant</h1>
                     </div>
                 @endif
                        @foreach($houses as $item)
                        <div class="col-sm-12 col-lg-4 col-md-6">
                                                    <!-- product card -->
                        <div class="product-item bg-light">
                            <div class="card">
                                <div class="thumb-content">
                                    <!-- <div class="price">$200</div> -->
                                    <a href="{{ route('house.details.path',$item->token) }}">
                                        <img class="card-img-top img-fluid" src="{{ asset("storage/$item->image_1") }}" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body">
                             <h4 class="card-title text-center" ><span style="font-weight: bold;">{{$item->city->city}} ({{$item->place}}) places</span></h4>
                             <a class="btn btn-primary mt-4" style="display: block; margin:auto;" href="{{ route('house.details.path',$item->token) }}">Voir plus</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach             
                   </div>
                      <div class="container" style="width: 200px; margin: auto">
                          {{ $houses->links() }}
                      </div>
            <div class="container">
            </div>
            </div>
                </div>
           </div>
       </div>
</section>
@stop