@extends('panel.master')
@section('content')
 <div class="content">
     
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h5 class="card-title">Suggestions de prestataire <a class="btn btn-sm btn-primary pull-right text-white">View all</a></h5>
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
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Prestation</th>
                    <th>Contact</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
              
             
                @foreach($suggestions as $suggestion)
                  <tr>
                    <td>{{$suggestion->firstname}}</td>
                    <td>{{$suggestion->lastname}}</td>
                    <td>{{$suggestion->service->name}}</td>
                    <td>{{$suggestion->phone}}</td>
                    <td><button class="btn btn-danger" ><a class="text-white" href="{{ route('admin.delete.provider.proposal',$suggestion->id) }}">Supprimer</a></button></td>
                  </tr>
                @endforeach

                </tbody>
               
              </table>
               <div class="float-left ml-4">
                 {{$suggestions->links()}}
               </div>
            </div>
          </div>
        </div>
     
      </div>
      <!-- /.row -->
      
     
      <!-- /.row --> 
    </div>
    @stop