@extends('panel.master')
@section('content')
 <div class="content">
     
      <!-- /.row -->
      

      <!-- /.row -->
    
      
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h3>Les temoignages</h3>
              @if(session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
              @endif
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nom & Prénoms</th>
                    <th>Image</th>
                    <th>Role</th>
                    <th>Temoignages</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
              
             
                @forelse($testimonies as $testimony)
                  <tr>
                    <td>{{$testimony->user->firstname.' '.$testimony->user->lastname}}</td>
                    <td><img class="card-img-top img-fluid" style="width: 50px; height: 50px;" src="{{ asset('care/images/user.svg') }}" alt="Card image cap"></td>
                    <td>{{$testimony->user->role->name}}</td>
                    <td>{{$testimony->testimony}}</td>
                    <td><button class="btn btn-danger"><a class="text-white" href="{{ route('admin.delete.testimony',$testimony->id) }}">
                      <i class="fa fa-trash"></i>
                    </a></button></td>
                  </tr>
                  @empty
                  <tr>
                     <td style="color: red;">Pas de temoignage pour l'instant</td>
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