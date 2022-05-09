@extends('layouts.main')

@section('title', 'Tambah Suplayer')

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
								<li class="breadcrumb-item"><a href="{{ __('create') }}">{{ __('create') }}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
                <div class="card-body">
                    <h5>Tambah Suplayer</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <form method="POST" action="/suplayer">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input required name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input required name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber">Nomor Telp</label>
                                    <input required name="phoneNumber" type="number" class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber">
                                    @error('phoneNumber')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input required name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input name="website" type="text" class="form-control @error('website') is-invalid @enderror" id="website">
                                    @error('website')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn  btn-primary">Tambah Suplayer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection