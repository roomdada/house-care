@extends('panel.master')
@section('content')
 <div class="content"> 
    <!-- Content Header (Page header) -->

    
    <!-- Main content -->
    <div class="content">
      <div class="card">
      <div class="card-body">
        <h4 class="text-black" value="old('price')">Modification de prestation {{$service->name}}</h4>
           @if(session()->has('success'))
            <div class="text-center alert alert-success">
              {{session()->get('success')}}
            </div>
            @endif
         <form action="{{ route('admin.store.edit.service') }}" method="POST" enctype="multipart/form-data">
          @csrf
               <div class="row">
                <div class="col-lg-6">
                  <fieldset class="form-group">
                    <label>Nom</label>
                    <input value="{{$service->name}}" class="form-control" name="name" id="readonlyInput"  type="text">
                 @error('name') <span class="error">{{ $message }}</span> @enderror
                  </fieldset>

                </div>
                 <div class="col-lg-6">
                  <fieldset class="form-group">
                    <label>Prix</label>
                    <input value="{{$service->price}}" class="form-control" name="price" id="readonlyInput"  type="text">
                 @error('price') <span class="error">{{ $message }}</span> @enderror
                  </fieldset>

                </div>
                <div class="col-lg-6">
                  <fieldset class="form-group">
                    <label>Categorie</label>
                    <select class="form-control" name="domaine" id="readonlyInput"  type="text">
                      <option value="{{$service->domaine->id}}" selected>{{$service->domaine->name}}</option>
                      @foreach($domaines as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                    @error('domaine') <span class="error">{{ $message }}</span> @enderror

                  </fieldset>
                </div>
                  <div class="col-lg-6">
                  <fieldset class="form-group">
                    <label>Image</label>
                    <input class="form-control" name="image" id="readonlyInput"  type="file">
                     @error('image') <span class="error">{{ $message }}</span> @enderror
                  </fieldset>

                </div>
                <input type="hidden" name="service" value="{{$service->id}}">

                <button class="btn btn-info ml-3 w-100">Enregistrer</button>
              
              </div>
         </form>
    </div>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>
    @stop