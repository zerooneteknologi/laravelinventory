@extends('layouts.main')

@section('title', 'Transaksi')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Transaksi</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('/dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="{{__('invoice')}}">{{__('invoice')}}</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
	<!-- [ stiped-table ] start -->
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header">
				<div class="float-left">
                    <h5>Tabel Transaksi</h5>
                    <span class="d-block m-t-5">Daftar Transaksi setiap Perode</span>
                </div>
                <a href="/invoice/create" class="btn btn-success mb-3 float-right"><i class="feather icon-plus-square"></i> Buat Transaksi Baru</a>
			</div>
			<div class="card-body table-border-style">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>No Invoice</th>
								<th>Waktu Pembuatan</th>
								<th>Jumlah</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($invoices as $invoice)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $invoice->invoiceNo }}</td>
									<td>{{ $invoice->add_at }}</td>
									<td>{{ $invoice->payTotal }}</td>
									<td>
										<a href="/invoice/{{ $invoice->id}}" class="badge badge-info"><i class="feather icon-eye"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- [ stiped-table ] end -->
</div>
<!-- [ Main Content ] end -->
</div>
@endsection