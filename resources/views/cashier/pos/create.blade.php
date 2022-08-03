@extends('layouts.main')

@section('title', 'Penjualan')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Transaksi Penjualan</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('/dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="{{__('create')}}">Buat Transaksi</a></li>
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
				<h5>Buat Transaksi Baru</h5>
			</div>
			<div class="card-body">
				<form method="POST" action="/invoice">
                    @csrf
                    <div class="row">

                        <!-- [ invoice No ] -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="invoiceNo">No invoice</label>
                                <input name="invoiceNo" id="invoiceNo" readonly value="{{ $invoiceNo}}" type="text" required class="form-control">
                            </div>
                        </div>
                        
                        <!-- [ member No ] -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="memberNo">No Member <i class="feather icon-search" id="membersearch" onclick="membershow()"></i></label>
                                <input name="memberNo" id="memberNo" type="text" class="form-control">
                                <small id="emailHelp" class="form-text text-muted">opsional, diisi jika pelanggan merupakan Member</small>
                                
                                <!-- [ member id ] -->
                                <input name="memberId" id="memberId" type="hidden" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="member">

                        <!-- [ product code ] -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="productCode">Kode Produk <i class="feather icon-search" id="membersearch" onclick="productshow()"></i></label>
                                <input name="productCode" id="productCode" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-5">Daftar Barang</h5>
                    <hr>
                    <!-- [ product table ] start -->
                    <div id="page"></div>
                    <!-- [ product table ] end -->
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button onclick="deletedraf()" type="submit" class="btn  btn-primary">Buat Pesanan</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
	<!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
</div>

<!-- [ Main modal ] start -->
<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title h4" id="modaltitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body" id="modalbody">
			</div>
		</div>
	</div>
</div>
<!-- [ Main modal ] end -->

@include('cashier.pos.js')
@endsection