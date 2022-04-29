<!DOCTYPE html>
<html lang="en">

<head>

	<title>Inventory | @yield('title', 'Inventory')</title>

	<!-- meta  -->
	@include('partials.meta')

</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->

	@include('partials.sidebar')
	<!-- [ navigation menu ] end -->

	<!-- [ Header ] start -->

	@include('partials.header')
	<!-- [ Header ] end -->

	<!-- [ Main Content ] start -->
	<div class="pcoded-main-container">
		@yield('content')
	</div>
	<!-- [ Main Content ] end -->
	@include('partials.footer')
</body>

</html>