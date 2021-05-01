@extends('panel.master')
@section('content')
 <div class="content">
       
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h5 class="card-title">Compte non activé</h5>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Commune</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Type</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td><button type="button" class="btn btn-sm btn-outline-danger btn-rounded">{{$user->common}}</button></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->contact_1}}</td>
                    <td>{{($user->role_id == 1) ? 'Prestataire de service' : 'Chasseur immobilier'}}</td>
                  </tr>
                @endforeach

                </tbody>
               
              </table>
               <div class="float-left ml-4">
                 {{$users->links()}}
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @stop