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
					<h5 class="m-b-10">Detail penjualan</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="#">Detail penjualan</a></li>
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
				<h5>Detail penjualan</h5>
			</div>
			<div class="card-body">
				<div class="card-body table-border-style">
                    <div class="form-group row">
                        <label for="invoiceNo" class="col-sm-3 col-form-label">No invoice</label>
                        <div class="col-sm-9">
                            <input name="invoiceNo" id="invoiceNo" type="text" readonly class="form-control-plaintext" value="{{ $invoice->invoiceNo}}">
                        </div>
                        <label for="date" class="col-sm-3 col-form-label">Tanggal Buat</label>
                        <div class="col-sm-9">
                            <input name="date" id="date" type="text" readonly class="form-control-plaintext" value="{{ $invoice->date}}">
                        </div>
                        <label for="pay" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input name="pay" id="pay" type="text" readonly class="form-control-plaintext" value="Rp. {{ number_format($invoice->pay, 0)}}">
                        </div>
                        <label for="discount" class="col-sm-3 col-form-label">Potongan</label>
                        <div class="col-sm-9">
                            <input name="discount" id="discount" type="text" readonly class="form-control-plaintext" value="{{ $invoice->discount}}%">
                        </div>
                        <label for="payTotal" class="col-sm-3 col-form-label">Total Bayar</label>
                        <div class="col-sm-9">
                            <input name="payTotal" id="payTotal" type="text" readonly class="form-control-plaintext" value="Rp. {{ number_format($invoice->payTotal,0) }}">
                        </div>
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