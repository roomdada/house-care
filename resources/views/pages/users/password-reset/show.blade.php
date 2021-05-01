@extends('layouts.master')
@section('title')
  Mot de passe oublié
@stop
@section('content')

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4 text-center">Mot de passe oublié</h3>
                         @if (session()->has('success'))
                           <div style="display: block; width: 100%; border: " class="btn btn-success flash">
                         {{session()->get('success')}}
                          </div>
                         @endif
                         @if (session()->has('error'))
                          <div class="btn btn-danger flash" style="display: block; width: 100%; height: 50px;">
                             {{session()->get('error')}}
                          </div>
                         @endif
                         <form action="{{ route('verify.user.email') }}" method="POST">
                          @csrf
                          <fieldset class="p-4">
                              <input name='email' type="email" placeholder="Veuillez entrer votre email" class="border p-3 w-100 my-2">
                              @error('email')<span style="color: red;">{{$message}}</span>@enderror
                              <button  style="display: block; width: 100%; height: 70px;" type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Soumettre</button>
                          </fieldset>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@stop