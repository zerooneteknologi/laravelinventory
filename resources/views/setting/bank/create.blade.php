@extends('layouts.main')

@section('title', 'Tambah Akun Bank')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Akun Bank</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('/dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="{{__('/bank')}}">tanbah akun bank</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
	<!-- [ sample-page ] start -->
	<div class="col-md-10">
		<div class="card">
            <div class="card-header">
				<h5>Tambah Akun Bank</h5>
			</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="/bank">
                            @csrf
                            <div class="form-group">
                                <label for="bankName">Nama Bank</label>
                                <input required name="bankName" type="text" class="form-control @error('bankName') is-invalid @enderror" id="bankName" value="{{ old('bankName')}}">
                                @error('bankName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="acountBank">Nama Pemilik</label>
                                <input required name="acountBank" type="text" class="form-control @error('acountBank') is-invalid @enderror" id="acountBank" value="{{ old('acountBank')}}">
                                @error('acountBank')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="noReck">No Rekening</label>
                                <input required name="noReck" type="text" class="form-control @error('noReck') is-invalid @enderror" id="noReck" value="{{ old('noReck')}}">
                                @error('noReck')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn  btn-primary">Tambah Akun Bank</button>
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
</div>
@endsection