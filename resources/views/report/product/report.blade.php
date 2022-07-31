<!DOCTYPE html>
<html lang="en">

<head>

	<title>Inventory | @yield('title', 'Invoice')</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

	<!-- vendor css -->
	<!-- <link rel="stylesheet" href="assets/css/style.css"> -->
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	{{-- <link href="{{base_path().'/assets/css/style.css'}}" rel="stylesheet'}}" rel="stylesheet"> --}}
	
{{-- + <link href="{{ public_path('assets/css/style.css') }}" rel="stylesheet"> --}}

</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>

	<!-- [ Main Content ] start -->
	<div class="fixed-top">
		<button class="btn  btn-icon btn-secondary"><i class="feather icon-printer"></i></button>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card bg-light">
					<div class="card-header">
						<div class="row mb-0">
							@foreach ($companies as $company)								
							<div class="col-4">
								<img width="200" class="img-fluid" src="{{ asset('storage/' . $company->companyPhoto);}}" alt="{{ $company->companyName}}">
							</div>
							<div class="col-8 text-center">
								<h3>{{ $company->companyName}}</h3>
								<h5>{{ $company->companyAddress}}</h5>
								<p>Email : {{ $company->companyEmail}}, No Telp : {{ $company->companyPhone}}</p>
							</div>
							@endforeach
						</div>
						<hr style="height:4px;border-width:0;color:gray;background-color:gray">
						<hr class="mt-0" style="height:2px;border-width:0;color:gray;background-color:gray">
					</div>
					<div class="card-body">
						<h5>Daftar Barang</h5>
						<hr>
						<div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Penjualan</th>
                                        <th>pengeluaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($products as $product)    
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $product->productName}}</td>
                                                <td>{{ $product->sale->sum('qty')}}</td>
                                                <td>{{ $product->order->sum('qty')}}</td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
						<label class="form-label">{{ auth()->user()->name }}</label>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
	<script src="{{ asset('assets/js/printThis.js') }}"></script>
	<script>
		$('.btn').on('click', function(){
			$('.container').printThis();
		})
	</script>
</body>

</html>