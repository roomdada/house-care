
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
                         <h1 class="text-center" style="color: red;">Pas de prestations</h1>
                         <div class="container">
                          @if (session()->has('message'))
                           <div style="display: block; width: 100%; height: 50px;" class="btn btn-success">
                         {{session()->get('message')}}
                          </div>
                         @endif
                         @if (session()->has('error'))
                          <div class="btn btn-danger" style="display: block; width: 100%; height: 50px;">
                             {{session()->get('error')}}
                          </div>
                         @endif
                            <h2 class="text-center">Suggestion de prestation</h2>
                            <form class="form-group" action="{{ route('suggestion.provider') }}" method="POST">
                                @csrf
                                <input type="text" name="prestation" class="form-control" placeholder="Nom de la prestation"><br>
                                <input type="email" name="email" class="form-control" placeholder="votre email"><br>
                                <input type="text" name="contact" class="form-control" placeholder="votre contact"><br>
                                <button type="submit" style="display: block; width: 100%;" class="btn btn-success">Soumettre</button>
                            </form>
                        </div>
                      
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
                                        <img class="card-img-top img-fluid" src="{{ asset('care/images/'.$item->image_1) }}" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body">
                             <h4 class="card-title"><a href="{{ route('house.details.path',$item->token) }}">{{$item->location}}</a></h4>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach             
                      <div class="container" style="width: 200px; margin: auto">
                          {{$houses->links()}}
                      </div>
                   </div>
            <div class="container">
            </div>
</div>




                </div>
           </div>
       </div>
</section>
@stop