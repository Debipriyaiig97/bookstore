<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('page_title')</title>
	 @include('frontend.includes.allstyles')
	 @yield('page-style-script')
</head>

<body>

	{{-- Google Tag Manager (noscript) --}}
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57NZFW3"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	{{-- End Google Tag Manager (noscript) --}}

	@include('frontend.includes.header')

	@section('container')
    @show

	@include('frontend.includes.allscripts')

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

	@yield('page-js-script')
	

</body>

</html>