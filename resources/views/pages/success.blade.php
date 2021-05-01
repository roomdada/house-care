@extends('layouts.care')
@section('content')
@if(Session::has('search'))
 <div class="alert alert-danger text-center mb-10 container">
 {{Session::get('search')}}
 </div>
 <div class="container justify-center" style="margin: auto;">
 <img height="120px" width="100" style="width: 100%;" src="{{ asset('empty.svg') }}">
 </div>

 @elseif(session()->has('message'))
     <div class="alert alert-success container text-center">
     	 {{session()->get('message')}}
     </div>
@else
"Félicitation!, Vous venez de vous inscrire sur House Care en tant que prestataire. Un mail vous a été envoyé, prière suivre les instructions afin de finaliser votre inscription. Nous vous contacterons sous un délai de 72 heures
@endif
@stop
@section('content')

@stop