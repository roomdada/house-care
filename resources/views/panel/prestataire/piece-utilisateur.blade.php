@extends('panel.master')
@section('content')
 <div class="content">
     
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h5 class="card-title">Piece </h5>
              <p><b>Pour mieux voir la piece veuillez cliquer sur la piece</b></p>

              @if(session()->has('success'))
                <div class="alert alert-success text-center">
                   {{session()->get('success')}}
                </div>
              @endif
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prenoms</th>
                    <th>Piece</th>
                    <th>Contact</th>
                    <th>type</th>
                    <th colspan="2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($users_identity_card as $user)
                  <tr>
                     <td>{{$user->firstname}}</td>
                     <td>{{$user->lastname}}</td>
                     <td><a href="/{{"storage/$user->identity"}}" target="__blank">
                       <img height="40" width="100"  src="{{ ($user->identity) ? asset('storage/'.$user->identity) : '' }}">
                     </a></td>
                     <td>{{$user->phone}}</td>
                     <td>{{$user->role->name}}</td>
                     <td>
                      <button class="btn btn-success "><a class="text-white" href="{{ route('accept.user.account',$user->token) }}"><i class="fa fa-check"></i></a></button>
                      <button class="btn btn-danger "><a class="text-white" href="{{ route('admin.delete.user',$user->token) }}"><i class="fa fa-trash"></i></a></button>
                      </td>
                  </tr>
                  @empty
                   <tr>
                      <td colspan="6" style="text-align: center; color: red;">Aucune piece trouvée!</td>
                   </tr>
                  @endforelse
              
             

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