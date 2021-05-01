@extends('panel.master')
@section('content')
 <div class="content">
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
               <h3>{{$cities->count()}} Commune(s)</h3>

               <div style="display: flex; width: 100%;">
                 <a class="btn btn-primary" style="margin-left:auto; color: white;" href="{{ route('admin.other.page','add-city') }}">Ajouter</a>
               </div>
               
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
                    <th colspan=>Commune</th>
                    <th colspan=>Personness</th>
                    <th colspan=>Maisons en locations</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                  <tr>
                    <td >{{ $city->city }}</td>
                    <td >{{ $city->users->count() }} personnes(s)</td>
                    <td >{{ $city->houses->count() }} maisons(s)</td>
                    
                    <td><button class="btn btn-danger"><a class="text-white" href="{{ route('delete.city.path', $city) }}">
                      <i class="fa fa-trash"></i>
                    </a></button></td>
                  </tr>
                @endforeach

                </tbody>
               
              </table>
               <div class="float-left ml-4">
                 {{$cities->links()}}
               </div>
            </div>
          </div>
        </div>
     
      </div>
      <!-- /.row -->
      
     
      <!-- /.row --> 
    </div>
    @stop