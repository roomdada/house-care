@extends('customer.app')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col-sm-12">
									<h3 class="page-title">Votre compte</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid" role="tablist">
									<li class="nav-item home_tab">
										<a class="nav-link active" data-toggle="tab" href="#profile_settings" role="tab" aria-selected="false">
											 Vos informations
										</a> 
									</li>
									
									<li class="nav-item home_add">
										<a class="nav-link" data-toggle="tab" href="#change_password" role="tab" aria-selected="false">
											Changer de mot de passe
										</a> 
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="profile_settings" role="tabpanel">
										<form action="{{ route('edit.account.post') }}" method="POST">
											@csrf
											<div class="form-group">
												<label>Nom</label>
												<input name="firstname" type="text" class="form-control" value="{{auth()->user()->firstname}}" >
											</div>
											<div class="form-group">
												<label>Préom</label>
												<input name="lastname" type="text" class="form-control" value="{{auth()->user()->lastname}}" >
											</div>
											<div class="form-group">
												<label>Email</label>
												<input name="email" type="text" class="form-control" value="{{auth()->user()->email}}" >
											</div>
											<div class="form-group">
												<label>Phone</label>
												<input name="phone" type="text" class="form-control" value="{{auth()->user()->phone}}" >
											</div>
											<div class="form-group">
												<label>Commune</label>
												<input name="city" type="text" class="form-control" value="{{auth()->user()->city->city}}" >
											</div>
											<div class="form-group">
												<label>Contact 2</label>
												<input name="phone_1" type="text" class="form-control" value="{{auth()->user()->phone_1}}" >
											</div>
										
											
											

											<div class="mt-4 save-form">
												<button  class="btn btn-primary save-btn" type="submit">Enregistrer les modifications</button>
											</div>
										</form>
									</div>
									<!-- /Profile Tab -->

									<!-- Password Tab -->
									<div class="tab-pane fade" id="change_password" role="tabpanel">
										@livewire('auth.password')
									</div>
									<!-- /Password Tab -->
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection