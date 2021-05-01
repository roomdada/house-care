@extends('panel.master')
@section('content')
 <div class="content">
     
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h5 class="card-title">Prestataires</h5>
              @if(session()->has('message'))
                <div class="alert alert-success text-center">
                  {{session()->get('message')}}
                </div>
              @endif
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
                    <th>Status</th>
                    <th>Type</th>
                    <th colspan="2">Actions</th>
                  </tr>
                </thead>
                <tbody>
              
             
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td><button type="button" class="btn btn-sm btn-outline-danger btn-rounded">{{$user->city->city}}</button></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->genre}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->validation ? 'validé' : 'Non validé'}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>
                      <button class="btn btn-primary"><a href="{{ route('show.user.path', $user) }}" class="text-white"><i class="fa fa-eye"></i></a></button>
                      <button class="btn btn-danger"><a href="{{ route('admin.delete.user',$user->token) }}" class="text-white"><i class="fa fa-trash"></i></a></button>
                    </td>
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
      <!-- /.row -->
      
     
      <!-- /.row --> 
    </div>
    @stop