@extends('layouts.main')

@section('title', 'Profil Perusahan')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Profil Perusahaan</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('/dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="{{__('edit')}}">{{__('edit')}}</a></li>
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

			<div class="card-header">
				<h5>Edit Profil Perusahaan</h5>
			</div>
			<div class="card-body">
                <form method="POST" action="/company/{{$company->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="companyName" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-9">
                            <input required name="companyName" type="text" class="form-control @error ('companyName') is-invalid @enderror" id="companyName" value="{{ old('companyName', $company->companyName)}}">
                        </div>
                        @error('companyName')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="companyAddress" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input required name="companyAddress" type="text" class="form-control @error ('companyAddress') is-invalid @enderror" id="companyAddress" value="{{ old('companyAddress', $company->companyAddress)}}">
                        </div>
                        @error('companyAddress')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="companyEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input required name="companyEmail" type="email" class="form-control @error ('companyEmail') is-invalid @enderror" id="companyEmail" value="{{ old('companyEmail', $company->companyEmail)}}">
                        </div>
                        @error('companyEmail')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="companyWebsite" class="col-sm-3 col-form-label">Website</label>
                        <div class="col-sm-9">
                            <input required name="companyWebsite" type="text" class="form-control @error ('companyWebsite') is-invalid @enderror" id="companyWebsite" value="{{ old('companyWebsite', $company->companyWebsite)}}">
                        </div>
                        @error('companyWebsite')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="companyPhone" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input required name="companyPhone" type="text" class="form-control @error ('companyPhone') is-invalid @enderror" id="companyPhone" value="{{ old('companyPhone', $company->companyPhone)}}">
                        </div>
                        @error('companyPhone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="companyPhone" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <div class="input-group cust-file-button mb-3">
                                <div class="custom-file">
                                    <input required name="companyPhoto" type="file" class="custom-file-input @error ('companyPhone') is-invalid @enderror" id="companyPhoto" value="{{ old('companyPhoto', $company->companyPhoto)}}">
                                    <label class=" btn custom-file-label" for="companyPhoto">Choose file</label>
                                </div>
                            </div>
                            <small id="passwordHelpBlock" class="form-text text-muted">format gambar maksimal ukuran 2 MB</small>
                        </div>
                        @error('companyPhoto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-md-10">
                            <button type="submit" class="btn  btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
	<!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
</div>
@endsection