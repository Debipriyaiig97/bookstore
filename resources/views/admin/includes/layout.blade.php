<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ config('app.name') }} - Admin | @yield('page_title')</title>

	@include('admin.includes.allstyles')

	@yield('page-style-script')
</head>

<body class="sidebar-fixed">
	<div class="container-scroller">

		@include('admin.includes.header')
		@include('admin.includes.sidebar')

		<div class="main-panel">

			@section('container')
			@show

			@include('admin.includes.footer')

		</div>
		<!-- main-panel ends -->
		<!-- page-body-wrapper ends -->
	</div>

	<!-- container-scroller -->
	@include('admin.includes.allscripts')

	<script>
		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-center",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut",
		}
	</script>

	@if (session()->has('SuccessToastr'))
	<script>
		toastr.success("{!! session()->get('SuccessToastr') !!}", {timeOut: 2500});
	</script>
	@endif

	@if (session()->has('InfoToastr'))
	<script>
		toastr.info("{!! session()->get('InfoToastr') !!}", {timeOut: 2500});
	</script>
	@endif

	@if (session()->has('ErrorToastr'))
	<script>
		toastr.error("{!! session()->get('ErrorToastr') !!}", {timeOut: 2500});
	</script>
	@endif

	{{-- Loader --}}
	<div class="request-loader">
		<img src="{{ url('/') }}/public/assets/admin/images/loader.gif" alt="loader">
	</div>
	{{-- Loader --}}

	@yield('page-js-script')

</body>

</html>
