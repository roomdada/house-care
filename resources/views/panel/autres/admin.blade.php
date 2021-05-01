@extends('panel.master')
@section('content')
 <div class="content">
     
     
    
      
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h5 class="card-title">Administrateurs House Care</h5>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Email</th>
                    <th>Genre</th>
                    <th>Contact</th>
                    <th>Type</th>
                  </tr>
                </thead>
                <tbody>
              
             
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->genre}}</td>
                    <td>{{$user->contact_1}}</td>
                    <td>Administrateur House Care</td>
                    
                  </tr>
                @endforeach

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