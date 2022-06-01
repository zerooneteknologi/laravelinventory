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
                        <li class="breadcrumb-item"><a href="{{ __('dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ __('product') }}">{{ __('product') }}</a></li>
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
                    <span class="d-block m-t-5">Daftar Produk</span>
                </div>
                @can('isWarehous')
                    <a href="/product/create" class="btn btn-success mb-3 float-right"><i class="feather icon-plus-square"></i> Tambah Produk</a>
                @endcan
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Merk</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->productCode }}</td>
                                <td>{{ $product->productName }}</td>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <a href="/product/{{ $product->id}}" class="badge badge-primary" >
                                        <i class="feather icon-eye"></i>
                                    </a>
                                    @can('isWarehous')
                                    <a href="product/{{ $product->id }}/edit" class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="edit">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('apakah yakin ingin menghapus {{ $product->productName}}')" class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top" title="hapus">
                                            <i class="feather icon-x-circle"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- [ suplayer-table ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

@endsection