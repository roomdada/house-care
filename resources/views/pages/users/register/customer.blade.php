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

                         @if (session()->has('success'))
                           <div style="display: block; width: 100%; border: " class="alert alert-success ">
                         {{session()->get('success')}}
                          </div>
                         @endif
                         @if (session()->has('error'))
                          <div class="alert alert-danger " style="display: block; width: 100%; height: 50px;">
                             {{session()->get('error')}}
                          </div>
                         @endif

                            <form action="{{ route('store.register.cistomer') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                             
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Nom</label>
                                  <input type="text" name="firstname" value="{{old('firstname')}}" class="form-control" id="inputEmail4">
                                   @error('firstname') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Prénoms</label>
                                  <input type="text" name="lastname" value="{{old('lastname')}}"  class="form-control" id="inputPassword4">
                                   @error('lastname') <span class="error">{{ $message }}</span> @enderror

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
                                  <input type="text" name="phone" value="{{old('phone')}}"  class="form-control" id="inputPassword4">
                                   @error('phone') <span class="error">{{ $message }}</span> @enderror

                                     <div class="form-group">
                                        <div class="form-check">
                                          <input     class="form-check-input" name="watsapp" type="checkbox" id="gridCheck">
                                          <label class="form-check-inputlabel text-bold" for="gridCheck">
                                            <b>Le contact est un numéro watsapp?</b> 
                                          </label>
                                        </div>
                                       @error('watsapp') <span class="error">{{ $message }}</span> @enderror
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
                                   <a href="{{ route('page.path','terms') }}">TERMES ET CONDITIONS</a>
                                  </label>
                                </div>
                                @error('validation') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <button type="submit" class="btn btn-primary">Soumettre</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>

</section>
@stop