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
									<h3 class="page-title">Modification de l'appartement</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
								<form action="{{ route('edit.house.post') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										@if(session()->has('success'))
										  <div class="alert alert-success">
										  	 {{session()->get('success')}}
										  </div>
										@endif
										<label>Commune</label>
										<select name="city" class="form-control">
											<option value="{{$house->city}}" selected>{{$house->city}}</option>
											<option value="Koumassi">Koumassi</option>
											<option value="Abobo">Abobo</option>
											<option value="Yopougon">Yopougon</option>
											<option value="Cocody">Cocody</option>
											<option value="Port bouet">Port bouet</option>
											<option value="Adjamé">Adjamé</option>
											<option value="Attecoubé">Attecoubé</option>
											<option value="Treichville">Treichville</option>
										</select>
									    @error('city')<span style="color: red;">{{$message}}</span>@enderror<br>

										<label>Nombre de piece</label>
										<input value="{{$house->place}}" type="text" class="form-control" name="place">
									    @error('place')<span style="color: red;">{{$message}}</span>@enderror<br>

										<label>Prix</label>
										<input value='{{$house->price}}' type="text" class="form-control" name="price">
									    @error('price')<span style="color: red;">{{$message}}</span>@enderror<br>

										<label>Image 1</label>
										<input type="file" class="form-control" name="image_1">
									    @error('image_1')<span style="color: red;">{{$message}}</span>@enderror<br>

										<label>Image 2</label>

										<input type="file" class="form-control" name="image_2">
									    @error('image_2')<span style="color: red;">{{$message}}</span>@enderror<br>

										<label>Image 3</label>

										<input type="file" class="form-control" name="image_3">
										<input value="{{$house->id}}" type="hidden" class="form-control" name="house_id">
										<label>Image 4</label>

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