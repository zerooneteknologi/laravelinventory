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
                    <li class="breadcrumb-item"><a href="{{__('show')}}">{{__('show')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="row">

    <div class="col-xl-12">

        <div class="card">
            
            {{-- alert start --}}
            @if (session()->has('success'))    
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            {{-- alert start --}}

            <div class="card-header">
                <h5>Detail Klien</h5>
                <span class="d-block m-t-5">Detail Data member</span>
            </div>
            <div class="card-body table-border-style">
                <div class="row">
                    <label for="memberName" class="col-sm-3 col-form-label">Nomor Member</label>
                    <div class="col-sm-9">
                        <input id="memberName"  type="text" readonly class="form-control-plaintext" value="{{ $customer->customerNo }}">
                    </div>
                </div>
                <div class="row">
                    <label for="memberName" class="col-sm-3 col-form-label">Nama Member</label>
                    <div class="col-sm-9">
                        <input id="memberName"  type="text" readonly class="form-control-plaintext" value="{{ $customer->customerName }}">
                    </div>
                </div>
                <div class="row">
                    <label for="memberName" class="col-sm-3 col-form-label">Alamat Member</label>
                    <div class="col-sm-9">
                        <input id="memberName"  type="text" readonly class="form-control-plaintext" value="{{ $customer->customerAddress }}">
                    </div>
                </div>
                <div class="row">
                    <label for="memberName" class="col-sm-3 col-form-label">No Telp/Hp</label>
                    <div class="col-sm-9">
                        <input id="memberName"  type="text" readonly class="form-control-plaintext" value="{{ $customer->customerPhone }}">
                    </div>
                </div>
                <!-- [ customers-table ] start -->
                <h5 class="mt-4">Daftar Utang</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jumlah Tagihan</th>
                                <th>Sisa Tagihan</th>
                                <th>Jatuh Tempo</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($credits as $credit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $credit->date }}</td>
                                    <td>{{ $credit->credit }}</td>
                                    <td>{{ $credit->debt }}</td>
                                    <td>{{ $credit->expired }}</td>
                                    <td>
                                        @if ($credit->debt <> 0)
                                            <a href="/credit/{{ $credit->id}}/edit">Bayar</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-7">
                    </div>
                    <div class="col-5 form-group row">
                        <table class="table table-borderless float-right">
                            <tbody>
                                <tr>
                                    <td><h5 for="payTotal" class="col-sm-5 col-form-label">Total Utang (Rp)</h5></td>
                                    <td class="float-lg-right"><h5 for="payTotal" class="col-sm-5 col-form-label">{{ number_format($sum, 0)}}</h5></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- [ customers-table ] end -->

            </div>
        </div>
    </div>

</div>
<!-- [ Main Content ] end -->

@endsection