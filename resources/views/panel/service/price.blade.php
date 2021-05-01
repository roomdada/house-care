@extends('panel.master')
@section('content')
 <div class="content">
       
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
              <h5 class="card-title">Proposition de prix pour les prestations</h5>
            </div>
            <div class="table-responsive">
              @if(session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
              @endif
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Service</th>
                    <th>Prix du service</th>
                    <th>Proposition</th>
                    <th>Prestataire</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($prices as $item)
                  <tr>
                    <td>{{$item->service->name}}</td>
                    <td>{{$item->service->price}} FCFA</td>
                    <td>{{$item->price_proposal}} FCFA</td>
                    <td>{{$item->user->firstname.' '.$item->user->lastname}}</td>
                    <td><a href="{{ route('admin.delete.price.proposal',$item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                  </tr>
                  @empty
                  <tr>
                     <td style="color: red;">Pas de proposition de prix</td>
                  </tr>
                @endforelse

                </tbody>
               
              </table>
               <div class="float-left ml-4">
                 {{$prices->links()}}
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @stop