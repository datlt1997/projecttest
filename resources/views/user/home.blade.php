<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('css/css/all.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="user-login">
	<div class="container">
		<div class="row">
			<div class="col-12 footer-logo mt-5 mb-2 text-center">
				<img src="{{ asset('assets/admin/dist/img/logo.gif') }}" />
			</div>
		</div>
		<hr>

		@yield('content')

	</div>
	<!-- Validation jQuery -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>
	<script src="{{ asset('js/adminlte.min.min.js') }}"></script>
	<script src="{{ asset('js/demo.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			bsCustomFileInput.init();
		});
	</script>
</body>

</html>