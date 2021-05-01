<div>
		<div class="page-header">
			  <div class="row">
				<div class="col">
					<h3 class="page-title">Historiques</h3>
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
									<th>Nom</th>
									<th>Prenom</th>
									<th>Commune de la maison</th>
									<th>Prix</th>
									<th>image 1</th>
									<th>image 2</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								@foreach($check as $house)
								  @if($house->house->user->id == auth()->user()->id)
									<tr>
										<td>{{$house->firstname}}</td>
										<td>{{$house->lastname}}</td>
										<td>{{$house->city->city}}</td>
										<td>{{$house->house->price}}</td>
										<td>
											<img class="rounded service-img mr-1" src="{{ asset($house->house->image_1) }}" alt="">
										</td>
										<td>
											<img class="rounded service-img mr-1" src="{{ asset($house->house->image_2) }}" alt="">
										</td>
										<td>{{$house->created_at}}</td>
									</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
