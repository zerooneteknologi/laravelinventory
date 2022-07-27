@extends('layouts.main')

@section('title', 'PO')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Detail PO</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="#">Detail PO</a></li>
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
				<h5>Detail PO</h5>
			</div>
			<div class="card-body">
                <form method="POST" action="/purchase/{{ $purchase->id}}">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="purchaseNo" class="col-sm-3 col-form-label">Nomor Dokumen</label>
                        <div class="col-sm-9">
                            <input name="purchaseNo" type="text" readonly class="form-control-plaintext" id="purchaseNo" value="{{ $purchase->purchaseNo}}">
                        </div>
                        <label for="date" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input name="date" type="text" readonly class="form-control-plaintext" id="date" value="{{ $purchase->date}}">
                        </div>
                        <label for="suplayerName" class="col-sm-3 col-form-label">Suplayer</label>
                        <div class="col-sm-9">
                            <input name="suplayerName" type="text" readonly class="form-control-plaintext" id="suplayerName" value="{{ $purchase->suplayer->name}}">
                        </div>
                        <label for="payTotal" class="col-sm-3 col-form-label">Total Pembayaran (Rp.)</label>
                        <div class="col-sm-9">
                            <input name="payTotal" type="text" readonly class="form-control-plaintext" id="payTotal" value="{{ number_format($purchase->payTotal, 0)}}">
                        </div>
                    </div>
                    <h5>Daftar Barang</h5>
                    <hr>
                    <div class="table-responsive" id="order">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Beli (Rp)</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>
                                            <input name="orderId[]" id="orderId" readonly type="hidden" class="form-control-plaintext" value="{{$order->id}}">
                                            <input name="productId[]" id="productId" readonly type="hidden" class="form-control-plaintext" value="{{$order->productId}}">
                                            <input name="productCode[]" id="productCode" readonly type="text" class="form-control-plaintext" value="{{$order->product->productCode}}">
                                        </td>
                                        <td><input name="productName[]" id="productName" readonly type="text" class="form-control-plaintext" value="{{$order->product->productName}}"></td>
                                        <td><input name="purchasePrice[]" id="purchasePrice" type="number" class="form-control" value="{{$order->product->purchasePrice}}"></td>
                                        <td><input name="qty[]" id="qty" type="number" class="form-control" value="{{$order->qty}}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-primary" type="submit">Konfirmasi</button>
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
        // read product
        // $(document).ready(function(){
        //     getProduct()
        // });

        // function getProduct()
        // {
        //     $.ajax({
        //         type: 'get',
        //         dataType: 'json',
        //         url: '/getProduct',
        //         data: {id: {{$order->productId}} },
        //         success: function(data, status){
        //             console.log(data);
        //         }
        //     })
        // }
    </script>
@endpush
@endsection