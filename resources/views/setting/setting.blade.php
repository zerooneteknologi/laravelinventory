@extends('layouts.main')

@section('title', 'Pengaturan')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Penagturan</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('/dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="{{__('setting')}}">{{__('setting')}}</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

@if (session()->has('success'))    
<div class="alert alert-primary alert-dismissible fade show" role="alert">
	{{ session('success')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
	<!-- [ company profil ] start -->
    @include('setting.company.company')
	<!-- [ company profil ] end -->
</div>

<div class="row">
<!-- [ users-table ] start -->
@include('setting.user.user')
<!-- [ users-table ] end -->
</div>


<!-- [ Main Content ] end -->
</div>
@endsection