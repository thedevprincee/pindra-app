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
			href="{{ asset('/backend/vendors/images/apple-touch-icon.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="{{ asset('/backend/vendors/images/favicon-32x32.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="{{ asset('/backend/vendors/images/favicon-16x16.png') }}"
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
		<link rel="stylesheet" type="text/css" href="{{ asset('/backend/vendors/styles/core.css') }}" />
	
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('/backend/vendors/styles/icon-font.min.css') }}"
		/>
	
		<link rel="stylesheet" type="text/css" href="{{ asset('/backend/vendors/styles/style.css') }}" />
	
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('/backend/src/plugins/jquery-steps/jquery.steps.css') }}"
		/>
	
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('/backend/src/plugins/plyr/dist/plyr.css') }}"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('/backend/src/plugins/sweetalert2/sweetalert2.css') }}"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('/backend/src/plugins/dropzone/src/dropzone.css') }}"
		/>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

	
	</head>
	<body>


		@include('backend.layouts.partials._preloader')

		@include('backend.layouts.partials._header')

		@include('backend.layouts.partials._sidebar')
		

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0">@yield('pageTitle')</h2>
				</div>

				@yield('content')


	
			</div>
		</div>


		<!-- js -->


		<script src="{{ asset('./backend/vendors/scripts/core.js') }}"></script>
		<script src="{{ asset('./backend/vendors/scripts/script.min.js') }}"></script>
		<script src="{{ asset('./backend/vendors/scripts/process.js') }}"></script>
		<script src="{{ asset('./backend/vendors/scripts/layout-settings.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/plyr/dist/plyr.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
		<script src="{{ asset('./backend/vendors/scripts/steps-setting.js') }}"></script>


		<script src="{{ asset('./backend/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
		<script src="{{ asset('./backend/vendors/scripts/datatable-setting.js') }}"></script>

		<script src="{{ asset('./backend/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
		<script src="{{ asset('./backend/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

		<script src="{{ asset('./backend/src/scripts/sweetalert.js') }}"></script>

		<script src="https://cdn.shr.one/1.0.1/shr.js'"></script>
		
		<script src="{{ asset('./backend/src/plugins/dropzone/src/dropzone.js') }}"></script>
	
		<script>
			Dropzone.autoDiscover = false;
			$(".dropzone").dropzone({
				addRemoveLinks: true,
				removedfile: function (file) {
					var name = file.name;
					var _ref;
					return (_ref = file.previewElement) != null
						? _ref.parentNode.removeChild(file.previewElement)
						: void 0;
				},
			});
		</script>
		<script>
			plyr.setup({
				tooltips: {
					controls: !0,
				},
			});
		</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
	@if(Session::has('message'))
	var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>


	</body>
</html>
