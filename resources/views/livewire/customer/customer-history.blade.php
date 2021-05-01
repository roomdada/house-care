<div>
	   @if($form)
	    	  <div class="container">
	    	  	<form class="form-group">   
	    	  	<div>
	    	  	   <textarea wire:model='comment' class="form-control mb-3 col-lg-12" placeholder="votre commentaire"></textarea>
	    	  	   @error('comment')<span style="color: red;">{{$message}}</span>@enderror
	    	  	</div> 	  		
	    	  	  <input type="hidden" wire:model="service_id">
	    	  	  <button wire:click.prevent='store()' class="btn btn-primary">Enregistrer</button>
	    	  	</form>
	    	  </div>
    	  @endif
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
						<h4>Prestations de service</h4>
						<table class="table table-hover table-center mb-0 datatable">
							<thead>
								<tr>
									<th>Prestations</th>
									<th>Prix</th>
									<th>Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								
							  @forelse($history_services as $service)
								<tr>
									<td>{{$service->service->name}}</td>
									<td>{{$service->service->price}} FCFA</td>
									<td>{{$service->created_at}}</td>
									<td>
									@if(!$service->comment)
									<button wire:click.prevent='ShowForm({{$service->id}})' class="btn btn-primary">Commenter la prestation</button>
									</td>
									 @else
									   <button class="btn btn-success" disabled>Vous avez deja commenté</button>
									</td>
									@endif
								</tr>
								@empty
								 <p style="color: red;">Votre historique est vide</p>
							  @endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
