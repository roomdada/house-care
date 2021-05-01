@extends('panel.master')
@section('content')
 <div class="content">
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
               <h5 class="card-title">Categorie des prestations <a href="{{ route('admin.service.page','add-category') }}" class="btn btn-sm btn-primary pull-right text-white">Ajouter</a></h5>
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
                    <th>Nombre de service</th>
                    <th colspan="2">Actions</th>
                  </tr>
                </thead>
                <tbody>
              
             
                @foreach($categories as $category)
                  <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->services_count}}</td>
                    <td>
                      <button class="btn btn-danger"><a class="text-white" href="{{ route('admin.delete.domaine',$category->slug) }}">
                      Supprimer
                    </a>
                  </button>
                   <button class="btn btn-primary"><a class="text-white" href="{{ route('admin.edit.domaine',$category) }}">
                      Modifier
                    </a>
                  </button>
                </td>
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