@extends('layouts.main')

@section('title', 'Edit Pengguna')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Pengguna</h5>
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
	<div class="col-md-10">
		<div class="card">
            <div class="card-header">
				<h5>Tambah Pengguna</h5>
			</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="/user">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input required name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name')}}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email')}}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input required name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password')}}">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">level Pengguna</label>
                                <select required name="role" class="form-control" id="exampleFormControlSelect1">
                                    <option>pilih level</option>
                                    <option value="owner">Pemilik</option>
                                    <option value="warehouse">Staff Gudang</option>
                                    <option value="marketing">Kasir</option>
                                </select>
                            </div>
                            <button type="submit" class="btn  btn-primary">Tambah Pengguna</button>
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