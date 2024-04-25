@php
    $setting = App\Models\Setting::first();
    $tawk_setting = App\Models\TawkChat::first();

@endphp
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>@yield('pageTitle')</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="{{ asset('./user/vendors/images/apple-touch-icon.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="{{ asset('./user/vendors/images/favicon-32x32.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="{{ asset('./user/vendors/images/favicon-16x16.png') }}"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('./user/vendors/styles/core.css') }}" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="{{ asset('./user/vendors/styles/style.css') }}" />
		<link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

		@stack('stylesheets')
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="login.html">
						<img src="{{ asset($setting->logo) }}" alt="" />
					</a>
				</div>
				<div class="login-menu">
					{{-- <ul>
						<li><a href="register.html">Register</a></li>
					</ul> --}}
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="{{ asset('./user/vendors/images/login-page-img.png') }}" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
		

		


		<!-- js -->
		<script src="{{ asset('./user/vendors/scripts/core.js') }}"></script>
		<script src="{{ asset('./user/vendors/scripts/script.min.js') }}"></script>
		<script src="{{ asset('./user/vendors/scripts/process.js') }}"></script>
		<script src="{{ asset('./user/vendors/scripts/layout-settings.js') }}"></script>

		

		<script src="{{ asset('toastr/toastr.min.js') }}"></script>

		<script>
			@if(Session::has('messege'))
			var type="{{Session::get('alert-type','info')}}"
			switch(type){
				case 'info':
					toastr.info("{{ Session::get('messege') }}");
					break;
				case 'success':
					toastr.success("{{ Session::get('messege') }}");
					break;
				case 'warning':
					toastr.warning("{{ Session::get('messege') }}");
					break;
				case 'error':
					toastr.error("{{ Session::get('messege') }}");
					break;
			}
			@endif
		</script>
	
		@if ($errors->any())
		@foreach ($errors->all() as $error)
			<script>
				toastr.error('{{ $error }}');
			</script>
		@endforeach
		@endif

		@stack('scripts')
	</body>
</html>
