@extends('provider.app')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-12">
							<h3 class="page-title">Bonjour {{auth()->user()->firstname}}!<br></h3>
							@if(auth()->user()->admin_validation)
							@if(auth()->user()->disponible)
							 <p class="text-success"><i class="fa fa-check"></i> Votre compte est visible par les clients</p>
							 @else
							  <p class="text-info"><i class="fa fa-info-circle"></i>  Votre compte n'est pas visible par les clients. Vous etes indisponible.</p>
							 @endif
							  @else
							    <div class="alert alert-info text-center">
							    	 Votre compte est en cours de vérification, il sera actif dans 07 jours au plus tard. Merci de patienter.
							    </div>
							@endif
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<div class="row">
					<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-primary">
										<i class="fas fa-car"></i>
									</span>
									<div class="dash-widget-info">
										<h3>{{auth()->user()->services->count()}}</h3>
										<h6 class="text-muted">Mes prestations</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-primary">
										<i class="fas fa-bicycle"></i>
									</span>
									<div class="dash-widget-info">
										<h3>14</h3>
										<h6 class="text-muted">Mes prestations realisées</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-primary">
										<i class="fas fa-check"></i>
									</span>
									<div class="dash-widget-info">
										<h3>{{auth()->user()->inline ? 'oui' : 'non'}}</h3>
										<h6 class="text-muted">En ligne</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
						<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-primary">
										<i class="fas fa-id-badge"></i>
									</span>
									<div class="dash-widget-info">
										<h3>{{auth()->user()->admin_validation ? 'oui' : 'non'}}</h3>
										<h6 class="text-muted">Validation de votre identité</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
						<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-primary">
										<i class="fas fa-wrench"></i>
									</span>
									<div class="dash-widget-info">
										<h3>{{$category}}</h3>
										<h6 class="text-muted">Domaines d'activités sur House care</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
						<div class="col-xl-4 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-primary">
										<i class="fas fa-baby-carriage"></i>
									</span>
									<div class="dash-widget-info">
										<h3>{{$services}}</h3>
										<h6 class="text-muted">services sur House Care</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>
			 
			</div>
		</div> 
@endsection