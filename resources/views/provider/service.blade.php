@extends('provider.app')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					@livewire('provider.create-prestation')
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
												<th>Service</th>
												<th>Prix</th>
												<th>Domaine</th>
												<th>Proposition de prix</th>
												<th  class="text-left">Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach(auth()->user()->services as $service)
												<tr>
													<td>
														<img class="rounded service-img mr-1" src="{{ asset('care/images/service-img/'.$service->image) }}" alt=""> {{$service->name}}
													</td>
													<td>{{$service->price}} FCFA</td>
													<td>{{$service->domaine->name}}</td>
													<td>
														@if($service->pivot->proposal)
														<button disabled class="btn btn-success"><i class="fa fa-check"></i></button>
														@else
														 <a class="btn btn-info" href="{{ route('show.proposal',[ 'service' =>$service->slug]) }}">Faire</a>
														@endif
													</td>
													<td>
														<a href="{{ route('provider.delete.service',$service->slug) }}" class="btn btn-sm bg-danger-light mr-2">
															<i class="fa fa-trash mr-1"></i>
														</a>
													
													</td>
												</tr>
											@endforeach
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