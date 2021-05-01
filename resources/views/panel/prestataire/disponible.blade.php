@extends('panel.master')
@section('content')
 <div class="content">
     
      <!-- /.row -->
      

      <!-- /.row -->
    
      
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h5 class="card-title">Prestataire de service</h5>
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
                    <th>Date d'inscription</th>
                  </tr>
                </thead>
                <tbody>
              
             
                @forelse($users_indispo as $user)

                  <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td><button type="button" class="btn btn-sm btn-outline-danger btn-rounded">{{$user->city}}</button></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->genre}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->created_at}}</td>

                  </tr>
                  @empty
                     <tr>
                         <td style="color: red; text-align: center;">Aucun prestataire n'est indisponible</td>
                     </tr>
                @endforelse

                </tbody>
               
              </table>
               <div class="float-left ml-4">
                 {{$customers->links()}}
               </div>
            </div>
          </div>
        </div>
     
      </div>
      <!-- /.row -->
      
     
      <!-- /.row --> 
    </div>
    @stop