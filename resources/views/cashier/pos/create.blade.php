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
	<div class="col-md-7">
		<div class="card">
			<div class="card-header">
				<h5>Buat Pesanan Baru</h5>
			</div>
			<div class="card-body">
				<form method="POST" action="/invoice">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="invoiceNo">No Invoice</label>
							<input required name="invoiceNo" type="text" class="form-control @error('invoiceNo') is-invalid @enderror"id="invoiceNo">
							<small id="emailHelp" class="form-text text-muted">No Invoice diisi otomatis</small>
							@error('invoiceNo')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="customerNo">No Member</label>
							<input name="customerNo" type="text" class="form-control @error('customerNo') is-invalid @enderror"id="customerNo">
							<input name="customerId" type="hidden" id="customerId">
							<small id="emailHelp" class="form-text text-muted">* opsional, diisi jika pembeli telah menjadi Member</small>
							@error('customerNo')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="productCode">Kode Barang</label>
							<input required name="productCode" type="text" class="form-control @error('productCode') is-invalid @enderror" id="productCode">
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
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>QTY</th>
                                        <th>Jumlah</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody class="drafprodut"></tbody>
                            </table>
                        </div>
                    </div>
					<button name="submit" type="submit" class="btn  btn-primary">Buat Transaksi</button>
				</form>
			</div>
		</div>
	</div>
	<!-- [ invoice ] end -->

	<!-- [ product-table ] start -->
	<div class="col-md-5 listprduct">
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
								<th>Harga</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
								<tr>
									<td width="10%">{{ $loop->iteration }}</td>
									<td width="20%">{{ $product->productCode }}</td>
									<td width="40%">{{ $product->productName }}</td>
									<td width="30%">{{ $product->sellingPrice }}</td>
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

@push('script')
	<script>

		// $('form').submit(function(e){
		// 	e.preventDefault();
		// })
		// get id customer
		$(function(e){
			$("input[name='customerNo']").change(function(){
				$.ajax({
					type:'get',
					dataType:'json',
					url:"/customer/getcode/"+$(this).val(),
					success:function(data){
						// console.log(data.data.id);
						$("#customerId").val(data.data.id);
					}
				})
			})
		})

		// get product
		$('#productCode').change(function(e)
		{
			$.ajax({
				type:'get',
				dataType:'json',
				url:"/product/getproduct/"+$(this).val(),
				success:function(data){
					// console.log(data.data.id);
					let value =`<tr>
						<input name="productId[]" type="hidden" value="${data.data.id}">
						<td width="25%"><input name="productName[]" type="text" readonly class="form-control-plaintext form-control-sm" value="${data.data.productName}"></td>
						<td width="25%"><input name="sellingPrice[]" type="text" readonly class="form-control-plaintext form-control-sm" value="${new Intl.NumberFormat().format(data.data.sellingPrice)}"></td>
						<td width="20%"><input name="qty[]" class="form-control form-control-sm" type="number" value="1"></input></td>
						<td width="25%" class="subTotal"><input name="subTotal[]" type="text" readonly class="form-control-plaintext form-control-sm"></td>
						<td width="5%" class="trash"><label class="form-control-plaintext form-control-sm"><a class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="hapus"><i class="feather icon-trash-2"></i></a></label></td>
						</tr>`;
					$('.drafprodut').append(value);
					$("input[name='subTotal[]']").val(new Intl.NumberFormat().format(data.data.sellingPrice * $("input[name='qty[]']").val()));
				}
			})
		})
		$('.drafprodut').on('click', '.trash', function(){
			$(this).parent().remove();
		})

		$('.drafprodut').on('change', '.subTotal', function(){
			$("input[name='subTotal[]']").val(new Intl.NumberFormat().format(data.data.sellingPrice * $("input[name='qty[]']").val()));
		})

	</script>
@endpush