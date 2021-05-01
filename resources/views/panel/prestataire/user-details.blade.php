@extends('panel.master')
@section('content')
 <div class="content">
     
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h5 class="card-title">Details sur l'utilisateur</h5>
              @if(session()->has('success'))
                <div class="alert alert-success text-center">
                   {{session()->get('success')}}
                </div>
              @endif
              </div>
          

              <div class="row no-gutters">
                    <div class="col-md-4">
                      <img  class='card-img mt-3' src="{{($user->genre == 'M') ? asset('care/images/avatar-homme.jpeg') : asset('care/images/avatar-femme.jpg')}}"  alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Nom & Prénoms: {{ $user->firstname.' '.$user->lastname }}</h5>
                        <h5 class="card-title">Role: {{ $user->role->name }}</h5>
                        <h5 class="card-title">Commune: {{ $user->city->city }}</h5>
                        <h5 class="card-title">Contact: {{ $user->phone}}</h5>
                        <h5 class="card-title">Date d"inscription : {{ $user->created_at->diffForHumans() }}</h5>
                        <h5 class="card-text">Status du compte : {{ $user->validation ? 'Le compte a éte validé' : 'En attente de validation'}}
                        </h5>
                        <p class="{{$user->admin_validation ? 'text-green' : 'text-red' }}">{{ $user->admin_validation ? "Identité de l'utilisateur validée" : "Compte non validé par l'administrateur de House Care"}}</p><br>
                        @if(!$user->admin_validation)
                        <p>Veuillez cliquer sur la piece pour une bonne visibilité</p>
                        <div class="card-img mb-2">
                         <a href="/{{"storage/$user->identity"}}">
                            <img height="40" width="100"  src="{{ ($user->identity) ? asset('storage/'.$user->identity) :  asset('care/images/logo.jpg')  }}">
                         </a>
                        </div>
                          <a class="btn btn-success text-white" {{ route('accept.user.account', $user->token) }}>Valider le compte</a>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
        </div>
     
      </div>
      <!-- /.row -->
      
     
      <!-- /.row --> 
    </div>
    @stop