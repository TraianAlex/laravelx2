<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
	@include('layouts.navigation')
	<div class="container">
		@if(Session::has('global'))
			<div class="row">
				<div class="col-md-5 col-md-offset-4">
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">
						{{ Session::get('global') }}
					</p>
				</div>
			</div>
		@endif
		<section>
			@yield('content')
		</section>
	</div>
<script src="{{ asset('assets/js/vendor/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>