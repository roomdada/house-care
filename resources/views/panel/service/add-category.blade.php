@extends('panel.master')
@section('content')
 <div class="content"> 
    <!-- Content Header (Page header) -->

    
    <!-- Main content -->
    <div class="content">
      <div class="card">
      <div class="card-body">
        <h4 class="text-black" value="old('price')">Nouvelle categorie</h4>
         @if(session()->has('success'))
            <div class="text-center alert alert-success">
              {{session()->get('success')}}
            </div>
            @endif
         <form action="{{ route('admin.create.domaine') }}" method="POST" enctype="multipart/form-data">
          @csrf
               <div class="row">
                <div class="col-lg-6">
                  <fieldset class="form-group">
                    <label>Nom</label>
                    <input value="{{old('session_name()')}}" class="form-control" name="name" id="readonlyInput"  type="text">
                 @error('name') <span class="error">{{ $message }}</span> @enderror
                  </fieldset>

                </div>
             
                  <div class="col-lg-6">
                  <fieldset class="form-group">
                    <label>Uploader un svg</label>
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