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
					<h5 class="m-b-10">PO</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="{{__('purchase')}}">PO</a></li>
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
                    <h5>Tabel PO</h5>
                    <span class="d-block m-t-5">Tabel Daftar PO</span>
                </div>
                <a href="/purchase/create" class="btn btn-success mb-3 float-right"><i class="feather icon-plus-square"> Buat PO Baru</i></a>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No PO</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchases as $purchase)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $purchase->purchaseNo}}</td>
                                    <td>{{ $purchase->date}}</td>
                                    <td>Rp. {{ number_format($purchase->payTotal,0) }}</td>
                                    <td>{{ $purchase->status}}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="detail" class="badge badge-info" href="/purchase/{{$purchase->id}}"><i class="feather icon-eye"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="cetak" class="badge badge-secondary" href="#"><i class="feather icon-printer"></i></a>
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