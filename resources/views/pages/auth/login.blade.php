@extends('layouts.master')
@section('title')
Connexion
@stop
@section('content')

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4 text-center">Veuillez vous connecter</h3>
                         @if (session()->has('message'))
                           <div style="display: block; width: 100%; border: " class="btn btn-success flash">
                         {{session()->get('message')}}
                          </div>
                         @endif
                         @if (session()->has('error'))
                          <div class="btn btn-danger flash" style="display: block; width: 100%; height: 50px;">
                             {{session()->get('error')}}
                          </div>
                         @endif
                         <form action="{{ route('login') }}" method="POST">
                          @csrf
                          <fieldset class="p-4">
                              <input name='email' type="email" placeholder="Email*" class="border p-3 w-100 my-2">
                              <input name='password' type="password" placeholder="Password*" class="border p-3 w-100 my-2">

                              <a href="{{ route('show.password.forget.form') }}" class="mb-2">Mot de passe oublié</a>
                              <button  style="display: block; width: 100%; height: 70px;" type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">CONNEXION</button>
                          </fieldset>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>
@stop