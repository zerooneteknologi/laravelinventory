@extends('layouts.main')

@section('title', 'PO')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Detail PO</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="#">Detail PO</a></li>
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
				<h5>Detail PO</h5>
			</div>
			<div class="card-body">
				<div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="30%" >No invoice</th>
                                    <td width="70%" >{{ $invoice->invoiceNo}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal dibuat</th>
                                    <td>{{ $invoice->date}}</td>
                                </tr>
                                <tr>
                                    <th>Total Penjualan</th>
                                    <td>Rp. {{ number_format($invoice->payTotal, 0)}}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <h5>Daftar Barang</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Beli</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $sale->product->productCode}}</td>
                                    <td>{{ $sale->product->productName}}</td>
                                    <td>{{ $sale->qty}}</td>
                                    <td>Rp. {{ number_format($sale->product->purchasePrice,0)}}</td>
                                    <td>Rp. {{ number_format($sale->subTotal,0) }}</td>
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