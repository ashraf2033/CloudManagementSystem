
	@if($errors->any())
	<div class="container">
	<div class="col-md-12">
		<ul class="alert alert-danger col-md-6">
		@foreach($errors->all() as $error)
		<li> {{ $error }}</li>
		@endforeach
		</ul>
	</div>
	</div>
	@endif
