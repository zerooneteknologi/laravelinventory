@extends('layouts.main')

@section('title', 'Kredit')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Kredit</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="#">bayar Kredit</a></li>
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
				<h5>Detail Kredit</h5>
			</div>
			<div class="card-body">
            <form method="POST" action="/credit/{{ $credit->id}}">
                @csrf
                @method('put')

				{{-- No Member --}}
				<div class="form-group row">
                    <label for="MemberNo" class="col-sm-3 col-form-label">No Member</label>
                    <div class="col-sm-9">
                        <input name="MemberNo" id="MemberNo" type="text" readonly class="form-control-plaintext" value="{{ $credit->customer->customerNo}}">
                    </div>
                </div>

				{{-- Name Member --}}
				<div class="form-group row">
                    <label for="MemberName" class="col-sm-3 col-form-label">Nama Member</label>
                    <div class="col-sm-9">
                        <input name="MemberName" id="MemberName" type="text" readonly class="form-control-plaintext" value="{{ $credit->customer->customerName}}">
                    </div>
                </div>

				{{-- date --}}
				<div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label">Taggal Dibuat</label>
                    <div class="col-sm-9">
                        <input name="date" id="date" type="text" readonly class="form-control-plaintext" value="{{ $credit->date}}">
                    </div>
                </div>

				{{-- expired --}}
				<div class="form-group row">
                    <label for="expired" class="col-sm-3 col-form-label">Jatuh Tempo</label>
                    <div class="col-sm-9">
                        <input name="expired" id="expired" type="text" readonly class="form-control-plaintext" value="{{ $credit->expired}}">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="debt" class="col-sm-3 col-form-label">Jumalh Tagihan (Rp)</label>
                    <div class="col-sm-9">
                        <input name="debt" id="debt" type="number" readonly class="form-control-plaintext" value="{{ $credit->debt }}">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="pay" class="col-sm-3 col-form-label">Bayar</label>
                    <div class="col-sm-9">
                        <input name="pay" id="pay" type="number" class="form-control">
                    </div>
                </div>
				<div class="form-group row" id="refund"></div>
                <button type="submit" class="btn btn-primary">Buat Pesanan</button>
            </form>
			</div>
		</div>
	</div>
	<!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
</div>
@push('script')
	<script>
		$('#pay').change(function()
		{ 
			let cash = $('#debt').val() - $('#pay').val()
			$('#refund').children().remove()
			let div =  `<label for="cash" class="col-sm-3 col-form-label">Sisa</label>
						<div class="col-sm-9">
							<input name="cash" id="cash" type="number" class="form-control" value="${cash}">
						</div>`
			$('#refund').append(div);
		})
	</script>	
@endpush
@endsection