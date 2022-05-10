@extends('layouts.main')

@section('title', 'Kategori')


@section('content')
<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kategori Produk</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ __('dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ __('category') }}">{{ __('category') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

			
	<!-- [ Main Content ] start -->
    <div class="col-md-10">
        <div class="card">

            {{-- alert start --}}
            @if (session()->has('success'))    
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            {{-- alert end --}}
            
            <!-- [ cakegory-table ] start -->
            <div class="card-header">
                <div class="float-left">
                    <h5>Tabel Kategori</h5>
                    <span class="d-block m-t-5">Daftar Kategori Produk</span>
                </div>
                <button type="button" class="btn  btn-primary float-right" data-toggle="modal" data-target="#createCategory"><i class="feather icon-plus-square mr-2"></i>Tambah Kategori</button>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->categoriName }}</td>
                                <td>
                                    <a href="category/{{ $category->id }}/edit" class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="edit">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('apakah yakin ingin menghapus {{ $category->categoriName}}')" class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top" title="hapus">
                                            <i class="feather icon-x-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- [ category-table ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    
</div>

<!-- [ create-modal ] start -->
<div class="col-sm-12">
    <div class="card">
        <div id="createCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Kategory</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="/category" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label for="name">Nama Kategori</label>
                                        <input required name="categoriName" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn  btn-primary">Tambah Kategori</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ create-modal ] end -->

@endsection

