<div>
   <form action="" method="POST">
   	@if(session()->has('error'))
   	 <div class="alert alert-danger">
   	 	{{session()->get('error')}}
   	 </div>
   	@endif
	@if(session()->has('success'))
   	 <div class="alert alert-success">
   	 	{{session()->get('success')}}
   	 </div>
   	@endif
	@csrf
	<div class="form-group">
		<label>Mot de passe actuel</label>
		<input wire:model="old_password" type="password" class="form-control">
		@error('old_password')<span style="color: red;">{{$message}}</span>@enderror

	</div>
	<div class="form-group">
		<label>Nouveau mot de passe</label>
		<input wire:model="password" type="password" class="form-control">
		@error('password')<span style="color: red;">{{$message}}</span>@enderror

	</div>
	<div class="form-group">
		<label>Retaper le nouveau mot de passe</label>
		<input type="password" wire:model="password_confirmation" class="form-control">
		@error('password_confirmation')<span style="color: red;">{{$message}}</span>@enderror
	</div>
	<div class="mt-4 save-form">
		<button wire:click.prevent='store()' class="btn save-btn btn-primary" type="submit">Enregistrer le nouveau mot de passe</button>
	</div>
</form>
</div>
