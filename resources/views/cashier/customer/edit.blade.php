@extends('layouts.main')

@section('title', 'Edit Member')

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
                        <li class="breadcrumb-item"><a href="{{ __('edit') }}">{{ __('edit') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Edit Member</h5>
            <hr>
            <div class="row">
                <div class="col-md-10">
                    <form method="POST" action="/customer/{{ $customer->id}}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="customerNo">No Member</label>
                            <input required value="{{ old('customerNo', $customer->customerNo)}}" name="customerNo" type="text" class="form-control @error('customerNo') is-invalid @enderror" id="customerNo">
                            @error('customerNo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customerName">Nama member</label>
                            <input required value="{{ old('customerName', $customer->customerName)}}" name="customerName" type="text" class="form-control @error('customerName') is-invalid @enderror" id="customerName">
                            @error('customerName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customerAddress">Alamat member</label>
                            <input required value="{{ old('customerAddress', $customer->customerAddress)}}" name="customerAddress" type="text" class="form-control @error('customerAddress') is-invalid @enderror" id="customerAddress">
                            @error('customerAddress')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customerPhone">No Telp</label>
                            <input required value="{{ old('customerPhone', $customer->customerPhone)}}" name="customerPhone" type="number" class="form-control @error('customerPhone') is-invalid @enderror" id="customerPhone">
                            @error('customerPhone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn  btn-primary">Edit Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection