@extends('layouts.main')

@section('title', 'Tambah Member')

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
                        <li class="breadcrumb-item"><a href="{{ __('/dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ __('create') }}">{{ __('create') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Tambah Member</h5>
            <hr>
            <div class="row">
                <div class="col-md-10">
                    <form method="POST" action="/customer">
                        @csrf
                        <div class="form-group">
                            <label for="customerNo">No Member</label>
                            <input required name="customerNo" type="text" class="form-control @error('customerNo') is-invalid @enderror" id="customerNo">
                            @error('customerNo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customerName">Nama member</label>
                            <input required name="customerName" type="text" class="form-control @error('customerName') is-invalid @enderror" id="customerName">
                            @error('customerName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customerAddress">Alamat member</label>
                            <input required name="customerAddress" type="text" class="form-control @error('customerAddress') is-invalid @enderror" id="customerAddress">
                            @error('customerAddress')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customerPhone">No Telp</label>
                            <input required name="customerPhone" type="number" class="form-control @error('customerPhone') is-invalid @enderror" id="customerPhone">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn  btn-primary">Tambah Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection