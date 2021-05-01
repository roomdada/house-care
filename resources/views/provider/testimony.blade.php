@extends('provider.app')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col">
									<h3 class="page-title">Ajouter un temoignage</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
								<form action="{{ route('create.testimony.path') }}" method="POST">
									@csrf
									<div class="form-group">
										@if(session()->has('success'))
										  <div class="alert alert-success">
										  	 {{session()->get('success')}}
										  </div>
										@endif
										<label>Votre témoignagne</label>
										<textarea name="testimony" class="form-control" type="text" required>{{old('testimony')}}</textarea>
									</div>
									@error('testimony')<span style="color: red;">{{$message}}</span>@enderror
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