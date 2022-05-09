@extends('layouts.main')

@section('title', 'Suplayer')

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
                        <li class="breadcrumb-item"><a href="{{ __('suplayer') }}">{{ __('suplayer') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
			
	<!-- [ Main Content ] start -->
	<div class="col-xl-12">
        <div class="card">
                    
            <!-- [ Hover-table ] start -->
            <div class="card">
                    <div class="card-header">
                        <h5>Detail Suplayer</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $suplayer->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $suplayer->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $suplayer->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Website</th>
                                        <td>{{ $suplayer->website }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telp</th>
                                        <td>{{ $suplayer->phoneNumber }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Hover-table ] end -->
        </div>
    </div>
			<!-- [ Main Content ] end -->
		</div>

@endsection

