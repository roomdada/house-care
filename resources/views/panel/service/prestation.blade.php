@extends('panel.master')
@section('content')
 <div class="content">
     
      <!-- /.row -->
      

      <!-- /.row -->
    
      
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
               <h5 class="card-title">Nos prestations<a href="{{ route('admin.service.page','add-prestation') }}" class="btn btn-sm btn-primary pull-right text-white">Ajouter</a></h5>
                  @if(session()->has('success'))
                  <div class="text-center alert alert-success">
                    {{session()->get('success')}}
                  </div>
                  @endif
            </div>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Price</th>
                    <th>Domaine</th>
                    <th>Image</th>
                    <th colspan="2">Actions</th>
                  </tr>
                </thead>
                <tbody>
              
             
                @foreach($services as $service)
                  <tr>
                    <td>{{$service->name}}</td>
                    <td>{{$service->price}} FCFA</td>
                    <td>{{$service->domaine->name}}</td>
                    <td><img height="100" width="100" src="{{ asset('storage/'.$service->image) }}"></td>
                    <td>
                   <button class="btn btn-primary"><a class="text-white" href="{{ route('admin.edit.service',$service) }}">
                      <i class="fa fa-pencil"></i>
                     
                    </a>
                  </button>
                      <button class="btn btn-danger"><a class="text-white" href="{{ route('admin.delete.service',$service->slug) }}">
                      <i class="fa fa-trash"></i>
                    </a>
                  </button>
                </td>
                  </tr>
                @endforeach

                </tbody>
               
              </table>
               <div class="float-left ml-4">
                {{$services->links()}}
               </div>
            </div>
          </div>
        </div>
     
      </div>
      <!-- /.row -->
      
     
      <!-- /.row --> 
    </div>
    @stop