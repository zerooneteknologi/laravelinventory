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
					<h5 class="m-b-10">Buat Pesanan</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('/dashoard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="{{__('create')}}">{{__('create')}}</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
	<!-- [ invoice ] start -->
	<div class="col-sm-7">
		<div class="card">
			<div class="card-header">
				<h5>Buat Pesanan Baru</h5>
			</div>
			<div class="card-body">
				<form>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="invoiceNo">No Invoice</label>
							<input required name="invoiceNo" type="text" class="form-control @error('invoiceNo') is-invalid @enderror"id="invoiceNo" readonly>
							<small id="emailHelp" class="form-text text-muted">No Invoice diisi otomatis</small>
							@error('invoiceNo')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="customerNo">No Member</label>
							<input name="customerNo" type="text" class="form-control @error('customerNo') is-invalid @enderror"id="customerNo">
							<small id="emailHelp" class="form-text text-muted">* opsional, diisi jika pembeli telah menjadi Member</small>
							@error('customerNo')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="productCode">Kode Barang</label>
							<input required name="productCode" type="text" class="form-control @error('productCode') is-invalid @enderror"id="productCode">
							<small id="emailHelp" class="form-text text-muted">isi untuk menambahkan barang yang dibeli</small>
							@error('productCode')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<h5 class="mt-3">Daftar Barang</h5>
					<hr>
					<div class="table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>
											<input required name="qty" type="number" class="form-control form-control-sm" id="qty">
										</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
					<div class="form-row">
						<div class="form-group col-md-6"></div>
						<div class="form-group col-md-6 row">
							<label for="payment" class="col-sm-5 col-form-label">Metode Pembayaran</label>
							<div class="col-sm-7">
								<select required name="payment" id="payment" class="form-control">
									<option>pilih metode Pembayaran</option>
									@foreach ($payments as $payment)
										<option value="{{ $payment->id }}">{{ $payment->payment}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6"></div>
						<div class="form-group col-md-6 row">
							<label for="payTotal" class="col-sm-5 col-form-label">Jumlah Pembayaran</label>
							<div class="col-sm-7">
								<input readonly type="text" class="form-control" id="payTotal">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6"></div>
						<div class="form-group col-md-6 row">
							<label for="discond" class="col-sm-5 col-form-label">Potongan</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="discond">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6"></div>
						<div class="form-group col-md-6 row">
							<label for="cash" class="col-sm-5 col-form-label">Uang Pembayaran</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="cash">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6"></div>
						<div class="form-group col-md-6 row">
							<label for="refund" class="col-sm-5 col-form-label">Uang Kembalian</label>
							<div class="col-sm-7">
								<input readonly type="text" class="form-control" id="refund">
							</div>
						</div>
					</div>
					<button type="submit" class="btn  btn-primary">Buat Transaksi</button>
				</form>
			</div>
		</div>
	</div>
	<!-- [ invoice ] end -->

	<!-- [ product-table ] start -->
	<div class="col-xl-5">
		<div class="card">
			<div class="card-header">
				<h5>Daftar Produk</h5>
			</div>
			<div class="card-body table-border-style">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>kode Barang</th>
								<th>Nama Barang</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $product->productCode }}</td>
									<td>{{ $product->productName }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- [ product-table ] end -->
</div>
<!-- [ Main Content ] end -->
</div>
@endsection