@extends('panel.master')
@section('content')
 <div class="content">
     
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h5 class="card-title">Prestations <a href="{{ route('add.prestation') }}" class="btn btn-sm btn-primary pull-right text-white">Ajouter</a></h5>

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
                    <th>nom</th>
                    <th>Prix prestation</th>
                    <th>Image</th>
                    <th>Categorie</th>
                    <th colspan="2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($services as $service)
                  <tr>
                     <td>{{$service->name}}</td>
                     <td>{{$service->price}} FCFA</td>
                     <td><img height="50" width="100" src="{{ asset('care/images/service-img/'.$service->image) }}"></td>
                     <td>{{$service->category->name}}</td>
                     <td>
                      <button class="btn btn-primary"><a style="color: white;" href="{{ route('edit.service',$service->slug) }}">Editer</a></button>
                      <button type="submit" class="btn btn-danger"><a style="color: white;" href="{{ route('delete.service',$service->slug) }}">Supprimer</a> </button>
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