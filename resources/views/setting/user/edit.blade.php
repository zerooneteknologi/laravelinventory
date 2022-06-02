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
	<div class="col-sm-12">
		<div class="card">
            <div class="card-header">
				<h5>Edit Pengguna</h5>
			</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form method="POST" action="/user/{{ $user->id }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input required name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $user->name)}}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $user->email)}}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">level Pengguna</label>
                                <select required  name="role" class="form-control" id="exampleFormControlSelect1">
                                    <option>pilih level</option>
                                    <option value="owner">Pemilik</option>
                                    <option value="warehouse">Staff Gudang</option>
                                    <option value="marketing">Kasir</option>
                                </select>
                            </div>
                            <button type="submit" class="btn  btn-primary">Edit Pengguna</button>
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