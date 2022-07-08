@extends('layouts.main')

@section('title', 'Klien')

@section('content')

<div class="pcoded-content">

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Klien</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{__('/dashboard')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{__('customer')}}">{{__('customer')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="row">

    <div class="col-xl-12">
        @if (session()->has('success'))    
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        
        <!-- [ customers-table ] start -->
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h5>Tabel Klien</h5>
                    <span class="d-block m-t-5">Daftar Klien Yang menjadi member</span>
                </div>
                <a href="/customer/create" class="btn btn-success mb-3 float-right"><i class="feather icon-plus-square mr-2"></i>Tambah Member</a>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Member</th>
                                <th>Nama Member</th>
                                <th>No telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $customer->customerNo }}</td>
                                    <td>{{ $customer->customerName}}</td>
                                    <td>{{ $customer->customerPhone}}</td>
                                    <td>
                                        <a href="/customer/{{ $customer->id }}" class="badge badge-info" data-toggle="tooltip" data-placement="top" title="detail"><i class="feather icon-eye"></i></a>
                                        <a href="/customer/{{ $customer->id}}/edit" class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="edit"><i class="feather icon-edit"></i></a>
                                        <form action="{{ route('customer.destroy', $customer->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                            <button onclick="return confirm('apakah yakin ingin menghapus Member {{ $customer->customerName}}')" class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top" title="hapus"><i class="feather icon-x-circle"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- [ customers-table ] end -->

    </div>

</div>
<!-- [ Main Content ] end -->

@endsection