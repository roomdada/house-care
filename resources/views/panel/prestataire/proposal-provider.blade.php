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
              @if(session()->has('success'))$
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
                    <th>Service</th>
                    <th>Contact</th>
                    <th>Date de suggestion</th>
                    <th >Actions</th>
                  </tr>
                </thead>
                <tbody>
              
             
                @forelse($proposal_providers as $user)
                  <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td><button type="button" class="btn btn-sm btn-outline-danger btn-rounded">{{$user->service->name}}</button></td>
                    <td>{{$user->phone}}</td>
                   
                    <td>{{$user->created_at}}</td>
                    <td>
                      <button class="btn btn-danger"><a href="{{ route('admin.delete.provider.proposal',$user->id) }}" class="text-white"><i class="fa fa-trash"></i></a></button>
                     
                    </td>

                  </tr>
                @empty
                  <tr><td>Aucune proposition trouvées</td></tr>
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