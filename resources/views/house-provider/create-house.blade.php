@extends('house-provider.app')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col">
									<h3 class="page-title">Ajouter un appartement</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
								<form action="{{ route('store.house') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										@if(session()->has('success'))
										  <div class="alert alert-success">
										  	 {{session()->get('success')}}
										  </div>
										@endif
										<label>Commune</label>
										<select name="city_id" class="form-control">
											<option value="" selected>Commune</option>
											@foreach($cities as $city)
											 <option value="{{ $city->id }}" selected>{{ $city->city }}</option>
											@endforeach
										</select>
									    @error('city')<span style="color: red;">{{$message}}</span>@enderror<br>

										<label>Nombre de piece</label>
										<input type="text" class="form-control" name="place">
									    @error('place')<span style="color: red;">{{$message}}</span>@enderror<br>

										<label>Prix</label>
										<input type="text" class="form-control" name="price">
									    @error('price')<span style="color: red;">{{$message}}</span>@enderror<br>

										<label>Vue extérieure</label>
										<input type="file" class="form-control" name="image_1">
									    @error('image_1')<span style="color: red;">{{$message}}</span>@enderror<br>

										<label>Séjour</label>

										<input type="file" class="form-control" name="image_2">
									   @error('image_2')<span style="color: red;">{{$message}}</span>@enderror<br>

										<label>Salle d'eau</label>

										<input type="file" class="form-control" name="image_3">
										<label>Chambre principale</label>

										<input type="file" class="form-control" name="image_4">
										<label>Description de la maison</label>
										<textarea name="description" class="form-control" type="text" >{{old('description')}}</textarea>
									</div>
									<div class="mt-4">
										<button class="btn btn-primary" type="submit">Enregistrer</button>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection