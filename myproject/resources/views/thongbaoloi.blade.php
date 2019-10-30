@if ($errors->any())
	@foreach ($errors->all() as $error)
		<div class="alert alert-info" role="alert">
			<i class="mdi mdi-alert-circle-outline mr-2"></i><strong>{{ $error }}</strong>
		</div>
	@endforeach
@endif