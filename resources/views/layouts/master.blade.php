@include('pages.partials.header')

<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>@yield('title')</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
@yield('content')
<x-my-footer  :category="$category"></x-my-footer>
