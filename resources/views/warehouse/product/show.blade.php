@extends('layouts.main')

@section('title', 'Produk')
    
@section('content')

<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Produk</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ __('/dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ __('/product') }}">{{ __('product') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

			
	<!-- [ Main Content ] start -->
    <div class="col-xl-12">
        <div class="card">

            {{-- alert start --}}
            @if (session()->has('success'))    
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            {{-- alert end --}}
            
            <!-- [ suplayer-table ] start -->
            <div class="card-header">
                <div class="float-left">
                    <h5>Tabel Produk</h5>
                    <span class="d-block m-t-5">Detail Produk</span>
                </div>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped sm">
                        <thead>
                            <tr>
                                <th>Kode Produk</th>
                                <td>{{ $product->productCode }}</td>
                            </tr>
                            <tr>
                                <th>Nama Produk</th>
                                <td>{{ $product->productName }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $product->category->categoriName}}</td>
                            </tr>
                            <tr>
                                <th>Suplayer</th>
                                <td>{{ $product->suplayer->name }}</td>
                            </tr>
                            <tr>
                                <th>Merk</th>
                                <td>{{ $product->brand }}</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>{{ $product->stock }}</td>
                            </tr>
                            <tr>
                                <th>Harga Beli</th>
                                <td>Rp.{{ number_format($product->purchasePrice,0) }}</td>
                            </tr>
                            <tr>
                                <th>Harga Beli</th>
                                <td>Rp.{{ number_format($product->sellingPrice,0) }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- [ suplayer-table ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

@endsection