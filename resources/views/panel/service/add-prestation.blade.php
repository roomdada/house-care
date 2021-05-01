@extends('panel.master')
@section('content')
 <div class="content"> 
    <!-- Content Header (Page header) -->

    
    <!-- Main content -->
    <div class="content">
      <div class="card">
      <div class="card-body">
        <h4 class="text-black" value="old('price')">Nouvelle prestation</h4>
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{session()->flash('success')}}
          </div>
        @endif
         <form action="{{ route('admin.create.service') }}" method="POST" enctype="multipart/form-data">
          @csrf
               <div class="row">
                <div class="col-lg-6">
                  <fieldset class="form-group">
                    <label>Nom</label>
                    <input value="{{old('name')}}" class="form-control" name="name" id="readonlyInput"  type="text">
                 @error('name') <span class="error">{{ $message }}</span> @enderror
                  </fieldset>

                </div>
                 <div class="col-lg-6">
                  <fieldset class="form-group">
                    <label>Prix</label>
                    <input value="{{old('price')}}" class="form-control" name="price" id="readonlyInput"  type="text">
                 @error('price') <span class="error">{{ $message }}</span> @enderror
                  </fieldset>

                </div>
                <div class="col-lg-6">
                  <fieldset class="form-group">
                    <label>Categorie</label>
                    <select class="form-control" name="domaine" id="readonlyInput"  type="text">
                      <option value=" " selected>Selectionner la categorie</option>
                      @foreach($categories as $item)
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

                <button class="btn btn-info ml-3 w-100">Enregistrer</button>
              
              </div>
         </form>
    </div>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>
    @stop