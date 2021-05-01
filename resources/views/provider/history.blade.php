@extends('provider.app')
@section('content')

		<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Historique de mes prestations realisées</h3>
						</div>
						<div class="col-auto text-right">
							
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0 datatable">
										<thead>
											<tr>
												<th>Date</th>
												<th>Prestation</th>
												<th>Retour client</th>
											</tr>
										</thead>
										<tbody>
										
                                         @forelse(auth()->user()->checkouts as $checkout)
											<tr>
												<td>{{$checkout->created_at}}</td>
												<td>
													{{$checkout->service->name}}</td>
												<td>{{$checkout->comment ? $checkout->comment : 'pas de commentaire pour le moment'}}</td>
											</tr>
											@empty
											<tr>
												<td style="color: red;">Votre historique est vide</td>
											</tr>
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