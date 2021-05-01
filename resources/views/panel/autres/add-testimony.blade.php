@extends('panel.master')
@section('content')
 <div class="content"> 
    <!-- Content Header (Page header) -->

    
    <!-- Main content -->
    <div class="content">
      <div class="card">
      <div class="card-body">
        <h4 class="text-black" value="old('price')">Nouveau temoignage</h4>
        @if(session()->has('message'))
        <div class="alert alert-success text-center">{{session()->get('message')}}</div>
        @endif
         <form action="{{ route('store.testimony') }}" method="POST" enctype="multipart/form-data">
          @csrf
               <div class="row">
                   <div class="col-lg-12">
                  <fieldset class="form-group">
                    <label>Nom et Prénoms</label>
                    <input value="{{old('fullname')}}" class="form-control" name="fullname" id="readonlyInput"  type="text">
                 @error('fullname') <span class="error">{{ $message }}</span> @enderror
                  </fieldset>

                </div>
             
                 <div class="col-lg-12">
                  <fieldset class="form-group">
                    <label>Temoignage</label>
                    <textarea  class="form-control" name="testimony" id="readonlyInput"  type="text">{{old('testimony')}}</textarea>
                 @error('testimony') <span class="error">{{ $message }}</span> @enderror
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