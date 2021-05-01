@extends('house-provider.app')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				
		  <div class="page-header">
			  <div class="row">
				<div class="col">
					<h3 class="page-title">Jour de visite</h3>
					<p>Veuillez mettre a jour votre emploi du temps chaque semaine</p>
				</div>
		
		
	  </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					@if(session()->has('success'))
						<div class="alert alert-success container">
							{{session()->get('success')}}
						</div>
					@endif
					<div class="table-responsive">
						<table class="table table-hover table-center mb-0 datatable">
							<thead>
								<tr>
									<th>Jour</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse(auth()->user()->timetable as $time)
									<tr>
										<td>{{$time->day}}</td>
										<td><a href="{{ route('timetable.delete',$time->id) }}" class="btn btn-danger">Retirer</a></td>
									</tr>
									@empty
									<p style="color: red;">Veuillez planifier vos jours pour les visites. cela permettra aux client de prendre rendez vous pour la visite de vos appartements</p>

								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

			</div>
		</div>
@endsection