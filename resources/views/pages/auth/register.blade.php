@extends('layouts.master')
@section('title')
Création de compte
@stop
@section('content')

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 align-item-center">
                    <div class="">
                        <h3 class="bg-gray p-4 text-center">Inscription</h3>

                         @if (session()->has('message'))
                           <div style="display: block; width: 100%; border: " class="btn btn-success ">
                         {{session()->get('message')}}
                          </div>
                         @endif
                         @if (session()->has('error'))
                          <div class="btn btn-danger " style="display: block; width: 100%; height: 50px;">
                             {{session()->get('error')}}
                          </div>
                         @endif
                         @if($type == 'provider')
                         <form action="{{ route('store.register') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                              <div class="form-row">
                                 <div class="col-md-4 col-lg-4">
                                      <div class="form-group">
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                          </div>
                                          <select   name="service_1"   class="custom-select" id="inputGroupSelect01">
                                            @if(!old('service_2'))
                                             <option value="">Prestation 1</option>
                                            @endif
                                           @foreach($services as $service) 
                                            @if(old('service_1') == $service->id)
                                                <option value="{{ old('service_1') }}" selected>{{ $service->name }}</option>
                                            @endif
                                              <option value="{{$service->id}}">{{$service->name}}</option>
                                           @endforeach
                                          </select>
                                        </div>
                                         @error('service_1') <span class="error">{{ $message }}</span> @enderror

                                      </div>
                                      
                                  </div>

                                 <div class="col-md-4 col-lg-4">
                                      <div class="form-group">
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                          </div>
                                          <select name="service_2"   class="custom-select mt-auto" id="inputGroupSelect01">

                                          @if(!old('service_2'))
                                           <option value="">Prestation 2</option>
                                          @endif

                                           @foreach($services as $service) 
                                           @if (old('service_2') == $service->id)
                                                <option value="{{ old('service_2') }}" selected>{{ $service->name }}</option>
                                            @endif
                                              <option value="{{$service->id}}">{{$service->name}}</option>
                                           @endforeach
                                          </select>
                                        </div>
                                         @error('service_2') <span class="error">{{ $message }}</span> @enderror

                                      </div>
                                      
                                  </div>  

                                  <div class="col-md-4 col-lg-4">
                                      <div class="form-group">
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                          </div>
                                          <select name="materiels"   class="custom-select mt-auto" id="inputGroupSelect01">
                                              @if (old('materiels'))
                                               <option value="{{ old('materiels') }}" selected>{{ old('matriels') }}</option>
                                              @else
                                                <option value="">Moyen de locomotion</option>
                                              @endif
                                                <option value="velo">Velo</option>
                                                <option value="moto">moto</option>
                                                <option value="vehicule" >vehicule</option>
                                              <option value="tricycle">Tricycle</option>
                                              <option value="autres">Autres</option>
                                          </select>
                                        </div>
                                         @error('materiels') <span class="error">{{ $message }}</span> @enderror

                                      </div>
                                      
                                  </div>      
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Nom</label>
                                  <input type="text" name="nom" value="{{old('nom')}}" class="form-control" id="inputEmail4">
                                   @error('nom') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Prénoms</label>
                                  <input type="text" name="prenom" value="{{old('prenom')}}"  class="form-control" id="inputPassword4">
                                   @error('prenom') <span class="error">{{ $message }}</span> @enderror

                                </div>
                              </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Email</label>
                                       <input type="email" name="email" value="{{old('email')}}" class="form-control" id="inputEmail4">
                                   @error('email') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Contact</label>
                                  <input type="text" name="contact_1" value="{{old('contact_1')}}"  class="form-control" id="inputPassword4">
                                   @error('contact_1') <span class="error">{{ $message }}</span> @enderror

                                     <div class="form-group">
                                        <div class="form-check">
                                          <input     class="form-check-input" name="number_type" type="checkbox" id="gridCheck">
                                          <label class="form-check-inputlabel text-bold" for="gridCheck">
                                            <b>Le contact est un numéro watsapp?</b> 
                                          </label>
                                        </div>
                                       @error('number_type') <span class="error">{{ $message }}</span> @enderror
                                      </div>
                                </div>
                              </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Date de naissance</label>
                                      <input max="2002-01-31" class="form-control" id="inputGroupSelect03" type="date" name="birthday" aria-label="Example select with button addon">
                                       @error('birthday') <span class="error">{{ $message }}</span> @enderror
                                      

                                </div>
                                <div class="form-group col-md-6">
                                      <div class="form-group">
                                        <label for="inputAddress">Genre</label>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                          </div>
                                          <select   name="genre"   class="custom-select" id="inputGroupSelect01">
                                              @if (old('genre'))
                                               <option value="{{ old('genre') }}" selected>{{ old('genre') }}</option>
                                              @else
                                                <option value="">Sexe</option>
                                              @endif
                                              <option value="M">Masculin</option>
                                              <option value="F">Feminin</option>
                                          </select>
                                        </div>
                                      </div>
                                       @error('genre') <span class="error">{{ $message }}</span> @enderror

                                      
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 col-lg-6">
                                      <div class="form-group">
                                        <label for="inputAddress">Selectionner votre commune</label>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                          </div>
                                          <select  name="commune" class="custom-select mt-auto" id="inputGroupSelect01">
                                             @if (old('commune'))
                                               <option value="{{ old('commune') }}" selected>{{ old('commune') }}</option>
                                              @else
                                                <option value="">votre commune de residence...</option>
                                              @endif
                                            <option value="Koumaassi">Koumassi</option>
                                            <option value="Marcory">Marcory</option>
                                            <option value="Cocody">Cocody</option>
                                            <option value="Yopougon">Yopougon</option>
                                            <option value="Abobo">Abobo</option>
                                            <option value="Port-bouet">Port-bouet</option>
                                            <option value="Bingerville">Bingerville</option>
                                            <option value="Treichville">Treichville</option>
                                            <option value="Adjame">Adjame</option>
                                            <option value="Adjame">Adjame</option>
                                            <option value="Plateau">Plateau</option>
                                          </select>
                                        </div>
                                      </div>
                                       @error('commune') <span class="error">{{ $message }}</span> @enderror

                                      
                                  </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Veuillze entrer un piece d'identité valide(CNI,Attestation,Passport)</label>
                                  <input type="file" name="identite" value="{{old('identite')}}"  class="form-control" id="inputPassword4">

                                 @error('identite') <span class="error">{{ $message }}</span> @enderror

                                </div>

                           
                              </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Entrer votre mot de passe</label>
                                      <input class="form-control" id="inputGroupSelect03" type="password" name="password" aria-label="Example select with button addon">
                                       @error('password') <span class="error">{{ $message }}</span> @enderror
                                      
                                    </div>

                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Entrer de nouveau votre mot de passe</label>
                                  <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}"  class="form-control" id="inputPassword4">
                                       @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror

                                </div>
                              </div>
                           
                              <div class="form-group">
                                <div class="form-check">
                                  <input  name="validation" class="form-check-input" type="checkbox" id="gridCheck">
                                  <label class="form-check-label" for="gridCheck">
                                    <a href="{{ route('getpage.path','terms') }}">TERMES ET CONDITIONS</a>
                                  </label>
                                </div>
                                @error('validation') <span class="error">{{ $message }}</span> @enderror

                              </div>
                               <input  name="type" class="form-check-input" value="{{$type}}" type="hidden" id="gridCheck">
                              <button type="submit" class="btn btn-primary">Soumettre</button>
                            </form>

                            @elseif($type == 'house')






                            <form action="{{ route('store.register') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                             
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Nom</label>
                                  <input type="text" name="nom" value="{{old('')}}" class="form-control" id="inputEmail4">
                                   @error('<i class="fab fa-notes-medical"></i>') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Prénoms</label>
                                  <input type="text" name="prenom" value="{{old('prenom')}}"  class="form-control" id="inputPassword4">
                                   @error('prenom') <span class="error">{{ $message }}</span> @enderror

                                </div>
                              </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Email</label>
                                       <input type="email" name="email" value="{{old('email')}}" class="form-control" id="inputEmail4">
                                   @error('email') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Contact</label>
                                  <input type="text" name="contact_1" value="{{old('contact_1')}}"  class="form-control" id="inputPassword4">
                                   @error('contact_1') <span class="error">{{ $message }}</span> @enderror

                                     <div class="form-group">
                                        <div class="form-check">
                                          <input     class="form-check-input" name="number_type" type="checkbox" id="gridCheck">
                                          <label class="form-check-inputlabel text-bold" for="gridCheck">
                                            <b>Le contact est un numéro watsapp?</b> 
                                          </label>
                                        </div>
                                       @error('number_type') <span class="error">{{ $message }}</span> @enderror
                                      </div>
                                </div>
                              </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Date de naissance</label>
                                      <input max="2002-01-31" class="form-control" id="inputGroupSelect03" type="date" name="birthday" aria-label="Example select with button addon">
                                       @error('birthday') <span class="error">{{ $message }}</span> @enderror
                                      

                                </div>
                                <div class="form-group col-md-6">
                                      <div class="form-group">
                                        <label for="inputAddress">Genre</label>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                          </div>
                                          <select   name="genre"   class="custom-select" id="inputGroupSelect01">
                                             @if (old('genre'))
                                               <option value="{{ old('genre') }}" selected>{{ old('genre') }}</option>
                                              @else
                                                <option value="">Sexe</option>
                                              @endif
                                              <option value="M">Masculin</option>
                                              <option value="F">Feminin</option>
                                          </select>
                                        </div>
                                      </div>
                                       @error('genre') <span class="error">{{ $message }}</span> @enderror

                                      
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 col-lg-6">
                                      <div class="form-group">
                                        <label for="inputAddress">Selectionner votre commune</label>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                          </div>
                                          <select name="commune" class="custom-select mt-auto" id="inputGroupSelect01">
                                              @if (old('commune'))
                                               <option value="{{ old('commune') }}" selected>{{ old('commune') }}</option>
                                              @else
                                                <option value="">votre commune de residence...</option>
                                              @endif
                                            <option value="Koumaassi">Koumassi</option>
                                            <option value="Marcory">Marcory</option>
                                            <option value="Cocody">Cocody</option>
                                            <option value="Yopougon">Yopougon</option>
                                            <option value="Abobo">Abobo</option>
                                            <option value="Port-bouet">Port-bouet</option>
                                            <option value="Bingerville">Bingerville</option>
                                            <option value="Treichville">Treichville</option>
                                            <option value="Adjame">Adjame</option>
                                            <option value="Adjame">Adjame</option>
                                            <option value="Plateau">Plateau</option>
                                          </select>
                                        </div>
                                      </div>
                                       @error('commune') <span class="error">{{ $message }}</span> @enderror

                                      
                                  </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Veuillze entrer un piece d'identité valide(CNI,Attestation,Passport)</label>
                                  <input type="file" name="identite" value="{{old('identite')}}"  class="form-control" id="inputPassword4">
                                 @error('identite') <span class="error">{{ $message }}</span> @enderror

                                </div>

                           
                              </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Entrer votre mot de passe</label>
                                      <input class="form-control" id="inputGroupSelect03" type="password" name="password" aria-label="Example select with button addon">
                                       @error('password') <span class="error">{{ $message }}</span> @enderror
                                      
                                    </div>

                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Entrer de nouveau votre mot de passe</label>
                                  <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}"  class="form-control" id="inputPassword4">
                                       @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror

                                </div>
                              </div>
                           
                              <div class="form-group">
                                <div class="form-check">
                                  <input  name="validation" class="form-check-input" type="checkbox" id="gridCheck">
                                  <label class="form-check-label" for="gridCheck">
                                    <a href="{{ route('getpage.path','terms') }}">TERMES ET CONDITIONS</a>
                                  </label>
                                </div>
                                @error('validation') <span class="error">{{ $message }}</span> @enderror

                              </div>
                               <input  name="type" class="form-check-input" value="{{$type}}" type="hidden" id="gridCheck">
                              <button type="submit" class="btn btn-primary">Soumettre</button>
                            </form>
                              @else
                                                      <form action="{{ route('store.register') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                             
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Nom</label>
                                  <input type="text" name="nom" value="{{old('nom')}}" class="form-control" id="inputEmail4">
                                   @error('nom') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Prénoms</label>
                                  <input type="text" name="prenom" value="{{old('prenom')}}"  class="form-control" id="inputPassword4">
                                   @error('prenom') <span class="error">{{ $message }}</span> @enderror

                                </div>
                              </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Email</label>
                                       <input type="email" name="email" value="{{old('email')}}" class="form-control" id="inputEmail4">
                                   @error('email') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Contact</label>
                                  <input type="text" name="contact_1" value="{{old('contact_1')}}"  class="form-control" id="inputPassword4">
                                   @error('contact_1') <span class="error">{{ $message }}</span> @enderror

                                     <div class="form-group">
                                        <div class="form-check">
                                          <input     class="form-check-input" name="number_type" type="checkbox" id="gridCheck">
                                          <label class="form-check-inputlabel text-bold" for="gridCheck">
                                            <b>Le contact est un numéro watsapp?</b> 
                                          </label>
                                        </div>
                                       @error('number_type') <span class="error">{{ $message }}</span> @enderror
                                      </div>
                                </div>
                              </div>
                        
                       
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Entrer votre mot de passe</label>
                                      <input class="form-control" id="inputGroupSelect03" type="password" name="password" aria-label="Example select with button addon">
                                       @error('password') <span class="error">{{ $message }}</span> @enderror
                                      
                                    </div>

                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Entrer de nouveau votre mot de passe</label>
                                  <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}"  class="form-control" id="inputPassword4">
                                       @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror

                                </div>
                              </div>
                           
                              <div class="form-group">
                                <div class="form-check">
                                  <input  name="validation" class="form-check-input" type="checkbox" id="gridCheck">
                                  <label class="form-check-label" for="gridCheck">
                                   <a href="{{ route('getpage.path','terms') }}">TERMES ET CONDITIONS</a>
                                  </label>
                                </div>
                                @error('validation') <span class="error">{{ $message }}</span> @enderror

                              </div>
                               <input  name="type" class="form-check-input" value="{{$type}}" type="hidden" id="gridCheck">
                              <button type="submit" class="btn btn-primary">Soumettre</button>
                            </form>

                            @endif

                        </div>
                </div>
            </div>
        </div>
    </section>

</section>
@stop