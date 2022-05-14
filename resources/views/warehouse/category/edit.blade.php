@extends('layouts.main')

@section('title', 'Edit kategori')

@section('content')
<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kategori</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ __('dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ __('edit') }}">{{ __('edit') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Edit Kategori</h5>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <form method="POST" action="/category/{{ $categories->id }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input value="{{ $categories->categoriName }}" required name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn  btn-primary mt-3">Edit Kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection