@extends('customer.app')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-12">
							<h3 class="page-title">Bonjour {{auth()->user()->firstname}}!<br></h3>
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
										<h3>{{$services}}</h3>
										<h6 class="text-muted">Prestations sur House Care</h6>
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
										<h3>{{$service_count}}</h3>
										<h6 class="text-muted">Prestations</h6>
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
										<h3>{{$house_count}}</h3>
										<h6 class="text-muted">Maisons louées</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				
				</div>
			 
			</div>
		</div> 
@endsection