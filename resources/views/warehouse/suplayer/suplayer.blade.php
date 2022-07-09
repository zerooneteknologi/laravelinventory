@extends('layouts.main')

@section('title', 'Suplayer')

@section('content')
<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Suplayer</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ __('dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ __('suplayer') }}">{{ __('suplayer') }}</a></li>
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
                    <h5>Tabel Suplayer</h5>
                    <span class="d-block m-t-5">Daftar Suplayer terdaftar</span>
                </div>
                <a href="/suplayer/create" class="btn btn-success mb-3 float-right"><i class="feather icon-plus-square"></i> Tambah Suplayer</a>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suplayers as $suplayer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $suplayer->name }}</td>
                                <td>{{ $suplayer->email }}</td>
                                <td>{{ $suplayer->phoneNumber }}</td>
                                <td>
                                    <a href="/suplayer/{{ $suplayer->id}}" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="detail">
                                        <i class="feather icon-eye"></i>
                                    </a>
                                    <a href="suplayer/{{ $suplayer->id }}/edit" enc class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="edit">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                    <form action="{{ route('suplayer.destroy', $suplayer->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('apakah yakin ingin menghapus {{ $suplayer->name}}')" class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top" title="hapus">
                                            <i class="feather icon-x-circle"></i>
                                        </button>
                                    </form>
                                    </a>
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

