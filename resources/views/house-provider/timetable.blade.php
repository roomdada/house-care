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
									<h3 class="page-title">Gestion de mon emploi du temps</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
								<form action="{{ route('timetable.post') }}" method="POST">
									@csrf
									<div class="form-group">
										@if(session()->has('success'))
										  <div class="alert alert-success">
										  	 {{session()->get('success')}}
										  </div>
										@endif
										<label>Choississez la date</label>
										<input name="day" class="form-control" type="date" >
									</div>
									@error('day')<span style="color: red;">{{$message}}</span>@enderror
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