@extends('panel.master')
@section('content')
 <div class="content"> 
    <div class="content">
      <div class="card">
      <div class="card-body">
        <h4 class="text-black" value="old('price')">Ajout d'une nouvelle commune</h4>
           @if(session()->has('success'))
            <div class="alert alert-success">
              {{session()->get('success')}}
            </div>
           @endif
        @if(session()->has('message'))
        <div class="alert alert-success text-center">{{session()->get('message')}}</div>
        @endif
         <form action="{{ route('store.city.path') }}" method="POST" enctype="multipart/form-data">
          @csrf
               <div class="row">
                   <div class="col-lg-12">
                  <fieldset class="form-group">
                    <label>Entrer la commune</label>
                    <input value="{{old('city')}}" class="form-control" name="city" id="readonlyInput"  type="text">
                 @error('city') <span class="error">{{ $message }}</span> @enderror
                  </fieldset>
                </div>
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