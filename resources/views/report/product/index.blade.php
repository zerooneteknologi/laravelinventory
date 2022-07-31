@extends('layouts.main')

@section('title', 'Laporan')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">laporan</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="#!">Laporan Barang</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
	<!-- [ sample-page ] start -->
	<div class="col-sm-12">
		<div class="card">

			<div class="card-header">
				<h5>Laporan Barang Masuk Dan Keluar</h5>
				<div class="card-header-right">
					<div class="btn-group card-option">
						{{-- <a href="productprint"></a> --}}
						<a href="/productprint" target="-blank" type="button" class="btn btn-icon btn-success">
							<i class="feather icon-printer"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="card-body">
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
			</div>
		</div>
	</div>
	<!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
</div>
@endsection