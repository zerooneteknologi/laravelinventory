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
					<li class="breadcrumb-item"><a href="{{__('/invoice')}}">Penjualan</a></li>
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
            {{-- notif gagal --}}
            @if (session()->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('failed')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif

            @if (session()->has('success'))    
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            <div class="card-header">
                <div class="float-left">
                    <h5>Tabel Penjualan</h5>
                    <span class="d-block m-t-5">Tabel Daftar Penjualan</span>
                </div>
                <a href="/invoice/create" class="btn btn-primary mb-3 float-right"><i class="feather icon-plus-square"> Buat transaksi Baru</i></a>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No invoice</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $invoice->invoiceNo}}</td>
                                    <td>{{ $invoice->date}}</td>
                                    <td>Rp. {{ number_format($invoice->payTotal,0) }}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="detail" class="badge badge-info" href="/invoice/{{$invoice->id}}"><i class="feather icon-eye"></i></a>
                                    </td>
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