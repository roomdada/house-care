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
									<h3 class="page-title">Faire la proposition de prix</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
								<form action="{{ route('store.proposal') }}" method="POST">
									@csrf
									<div class="form-group">
										@if(session()->has('success'))
										  <div class="alert alert-success">
										  	 {{session()->get('success')}}
										  </div>
										@endif
										<label>Le prix</label>
										<input name="price" class="form-control" type="text" required>
										<input name="service" value="{{$service->id}}" class="form-control" type="hidden" required>
									</div>
									@error('price')<span style="color: red;">{{$message}}</span>@enderror
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