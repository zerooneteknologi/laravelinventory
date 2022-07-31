@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Dashboard</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('/dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
	<!-- [ sample-page ] start -->
	
    <!-- table card-1 start -->
    <div class="col-md-12 col-xl-6">
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-grid text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{ $category }}</h5>
                            <span>Kategory</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-box text-c-red mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{ $product }}</h5>
                            <span>Produk</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-table">
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-users text-c-yellow mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{ $member }}</h5>
                            <span>Member</span>
                        </div>
                    </div>
                </div>
				<div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-layers text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{ $suplayer}}</h5>
                            <span>Suplayer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table card-1 end -->

	<!-- table card-2 start -->
	<div class="col-md-12 col-xl-6">
		<div class="card flat-card">
			<div class="row-table">
				<div class="col-sm-6 card-body br">
					<div class="row">
						<div class="col-sm-4">
							<i class="icon feather icon-corner-right-down text-c-blue mb-1 d-block"></i>
						</div>
						<div class="col-sm-8 text-md-center">
							<h5>{{ $income}}</h5>
							<span>Pemasukan</span>
						</div>
					</div>
				</div>
				<div class="col-sm-6 card-body">
					<div class="row">
						<div class="col-sm-4">
							<i class="icon feather icon-corner-left-up text-c-blue mb-1 d-block"></i>
						</div>
						<div class="col-sm-8 text-md-center">
							<h5>{{ $outcome }}</h5>
							<span>Pengeluaran</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row-table">
				<div class="col-sm-12 card-body br">
					<div class="row text-center">
						<div class="col-sm-4">
							<i class="icon feather icon-credit-card text-c-blue mb-1 d-block"></i>
						</div>
						<div class="col-sm-8 text-md-center">
							<h5>{{ $credit}}</h5>
							<span>Kredit</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- table card-2 end -->

	<!-- ,table product start -->
	<div class="col-md-12">
		<div class="card table-card">
			<div class="card-header">
				<h5>Daftar Produk</h5>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-hover mb-0" id="table_id">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Produk</th>
								<th>Nama Produk</th>
								<th>Brand/Merk</th>
								<th>Stok Produk</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)	
								<tr>
									<td>{{ $loop->iteration}}</td>
									<td>{{ $product->productCode}}</td>
									<td>{{ $product->productCode}}</td>
									<td>{{ $product->brand}}</td>
									<td>{{ $product->stock}}</td>
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
@push('script')	
	<script>
		$(document).ready( function () {
    		$('#table_id').DataTable();
		} );
	</script>
@endpush
@endsection