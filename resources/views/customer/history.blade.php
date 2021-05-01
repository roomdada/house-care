@extends('customer.app')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				
				<div class="page-header">
			  <div class="row">
				<div class="col">
					<h3 class="page-title">Historiques</h3>
				</div>
	  </div>
	</div>
	@livewire('customer.customer-history');
	</div>
</div>
@endsection