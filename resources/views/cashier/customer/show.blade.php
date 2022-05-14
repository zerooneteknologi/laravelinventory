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
                
                <!-- [ customers-table ] start -->
                <div class="table-responsive">
                    <table class="table table-striped sm">
                        <thead>
                            <tr>
                                <th>No Member</th>
                                <td>{{ $customer->customerNo }}</td>
                            </tr>
                            <tr>
                                <th>Nama Member</th>
                                <td>{{ $customer->customerName}}</td>
                            </tr>
                            <tr>
                                <th>Alamat Member</th>
                                <td>{{ $customer->customerAddress}}</td>
                            </tr>
                            <tr>
                                <th>No telp</th>
                                <td>{{ $customer->customerPhone}}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- [ customers-table ] end -->

            </div>
        </div>
    </div>

</div>
<!-- [ Main Content ] end -->

@endsection