<div>
  <div class="row">
			<div class="col">
				<h3 class="page-title">Mes prestations({{auth()->user()->services->count()}})</h3>
			</div>
		<div class="col-auto text-right">
		@if(auth()->user()->services->count() < 3)
		 	<button wire:click.prevent='form' class="btn btn-primary">ajouter une prestation</button>
		@endif
		
	</div>
	@if($form)
		<div class="container mt-4">
			<form class="form-group">
				<div class="row">
					<select required wire:model.lazy='service_id' class="form-control col-lg-6">
						 <option selected value=''>Choississez la prestation</option>
						 @foreach($services as $service)
							 <option selected value='{{$service->id}}'>{{$service->name}}</option>
						 @endforeach
					</select>
					<button wire:click.prevent='store()'  class="btn btn-primary col-lg-3 mr-2">
						 Enregistrer
					</button>
				</div>
			</form>
		</div>
	@endif
  </div>
</div>
