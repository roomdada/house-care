<div>
		<div class="page-header">
			  <div class="row">
				<div class="col">
					<h3 class="page-title">({{auth()->user()->houses->count()}}) Appartements en location</h3>
				</div>
			<div class="col-auto text-right">
			 	<a wire:click.prevent='form' class="btn btn-primary text-white">ajouter</a>
			
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
									<th>Lieu</th>
									<th>Nom de place</th>
									<th>Prix</th>
									<th>Image 1</th>
									<th>Image 2</th>
									<th  class="text-left">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($houses as $house)
									<tr>
										<td>{{$house->city->city}}</td>
										<td>{{$house->place}} place(s)</td>
										<td>{{$house->price}} FCFA</td>
										<td>
											<img class="rounded service-img mr-1" src="{{ asset("storage/$house->image_1") }}" alt="">
										</td>
										<td>
											<img class="rounded service-img mr-1" src="{{ asset("storage/$house->image_2") }}" alt="">
										</td>
										
										<td>
											<a href="{{ route('edit.house.show',$house->token) }}" class="btn btn-sm bg-info mr-2">
												<i class="fa fa-pen mr-1"></i>
											</a>
											<button wire:click.prevent='delete({{ $house }})' class="btn btn-sm bg-danger-light mr-2">
												<i class="fa fa-trash mr-1"></i>
											</button>
										
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $houses->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
