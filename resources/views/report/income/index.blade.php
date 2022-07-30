@extends('layouts.main')

@section('title', 'Report')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Laporan</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('/dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="{{__('/report')}}">Report</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
	<!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h5>Laporan Pendapatan</h5>
                    <span class="d-block m-t-5">Tabel Daftar Pendapatan</span>
                </div>
            </div>
            <div class="card-body table-border-style">
                <form method="GET" action="/report/print" target="-blank">
                    @csrf
                    <div class="form-row float-lg-right">
                        <div class="col-sm-5">
                            <div class="form-group row">
                                <label for="start" class="col-sm-5 col-form-label col-form-label-sm"><i class="feather icon-filter"></i> Dari</label>
                                <div class="col-sm-7">
                                    <input name="start" id="start" type="date" value="{{date('Y-m-01')}}" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group row">
                                <label for="end" class="col-sm-5 col-form-label col-form-label-sm">sampai</label>
                                <div class="col-sm-7">
                                    <input name="end" id="end" type="date" value="{{date('Y-m-30')}}" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn-sm btn-success float-right"><i class="feather icon-printer"></i></button>
                        </div>
                    </div>
                </form>
                <div id="table"></div>
            </div>
        </div>
    </div>
    <!-- [ stiped-table ] end -->

</div>
<!-- [ Main Content ] end -->
</div>
@include('report.income.js')
@endsection