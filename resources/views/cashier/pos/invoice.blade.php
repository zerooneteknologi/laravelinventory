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
		<a href="/dashboard" class="btn  btn-icon btn-success"><i class="feather icon-home"></i></a>
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
						<div class="form-group row">
							@foreach ($invoices as $invoice)
							<div class="col-sm-6 row">
								<label for="invoiceNo" class="col-sm-5 col-form-label">Nomor Dokumen</label>
								<div class="col-sm-7">
									<input name="invoiceNo" id="invoiceNo" type="text" readonly class="form-control-plaintext" value=": {{ $invoice->invoiceNo}}">
								</div>
								<label for="payment" class="col-sm-5 col-form-label">Metode Bayar</label>
								<div class="col-sm-7">
									<input name="payment" id="payment" type="text" readonly class="form-control-plaintext" value=": {{ $invoice->payment}}">
								</div>
							</div>
							<div class="col-sm-6 row">
								<label for="date" class="col-sm-5 col-form-label">Tanggal</label>
								<div class="col-sm-7">
									<input type="text" readonly class="form-control-plaintext" id="date" value=": {{ $invoice->date}}">
								</div>
								@if ($invoice->memberId <> null)
									<label for="member" class="col-sm-5 col-form-label">Member</label>
									<div class="col-sm-7">
										<input type="text" readonly class="form-control-plaintext" id="member" value=": {{ $invoice->customer->customerName}}">
									</div>
								@endif
							</div>
							@endforeach
						</div>
						<h5>Daftar Barang</h5>
						<hr>
						<div class="table-responsive">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Harga Jual</th>
										<th>Jumlah</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($sales as $sale)
										<tr>
											<td>{{ $loop->iteration}}</td>
											<td>{{ $sale->product->productCode}}</td>
											<td>{{ $sale->product->productName}}</td>
											<td>Rp. {{ number_format($sale->product->purchasePrice,0)}}</td>
											<td>{{ $sale->qty}}</td>
											<td>Rp. {{ number_format($sale->subTotal,0) }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-7">
							</div>
							<div class="col-5 form-group row">
								<table class="table table-borderless float-right">
									<tbody>
										<tr>
											<td width="35%">Total</td>
											<td>:</td>
											<td class="float-lg-right">Rp. {{ number_format($invoice->pay, 0)}}</td>
										</tr>
										<tr>
											<td>Potongan</td>
											<td>:</td>
											<td class="float-lg-right">{{number_format($invoice->discount, 0)}}%</td>
										</tr>
										@if ($invoice->payment ==='cash')
											<tr>
												<td>Jumlah Bayar</td>
												<td>:</td>
												<td class="float-lg-right">Rp. {{ number_format($invoice->payTotal, 0)}}</td>
											</tr>
											<tr>
												<td>Bayar</td>
												<td>:</td>
												<td class="float-lg-right">Rp. {{ number_format($invoice->cash, 0)}}</td>
											</tr>
											<tr>
												<td>Kembalian</td>
												<td>:</td>
												<td class="float-lg-right">Rp. {{ number_format($invoice->refund, 0)}}</td>
											</tr>
											@endif
											@if ($invoice->payment === 'credit')
												@foreach ($creidts as $creidt)
													<tr>
														<td>Utang</td>
														<td>:</td>
														<td class="float-lg-right">Rp. {{ number_format($creidt->credit, 0)}}</td>
													</tr>
												@endforeach
											@endif
									</tbody>
								</table>
							</div>
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