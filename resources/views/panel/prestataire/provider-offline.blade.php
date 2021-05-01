@extends('panel.master')
@section('content')
 <div class="content">
     
     
    
      
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h5 class="card-title">Prestation en cours<a class="btn btn-sm btn-primary pull-right text-white">View all</a></h5>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Commune</th>
                    <th>Email</th>
                    <th>Genre</th>
                    <th>Contact</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
              
             
                @forelse($providers_offline as $user)
                  <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td><button type="button" class="btn btn-sm btn-outline-danger btn-rounded">{{$user->city->city}}</button></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->genre}}</td>
                    <td>{{$user->phone}}</td>
                    <td><button class="btn btn-dark"><a href="{{ route('prestataire.inline',$user->token) }}">Mettre en ligne</a></button></td>
                  </tr>
                  @empty
                  <tr>
                     <td style="color: red;">Aucune prestations n'est en cours</td>
                  </tr>
                @endforelse

                </tbody>
               
              </table>
               <div class="float-left ml-4">
               </div>
            </div>
          </div>
        </div>
     
      </div>
      <!-- /.row -->
      
     
      <!-- /.row --> 
    </div>
    @stop