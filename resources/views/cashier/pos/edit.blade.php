
@extends('layouts.main')

@section('title', 'Transaksi')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Detail Transaksi</h5>
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
	<!-- [ detail-table ] start -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Detail Transaksi</h5>
            </div>
            <div class="card-body">
                <form action="/invoice/{{ $invoice->id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="invoiceNo" class="col-sm-5 col-form-label">No Invoice</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="invoiceNo" value=": {{ $invoice->invoiceNo }}">
                                </div>
                                <label for="add_at" class="col-sm-5 col-form-label">Waktu</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="add_at" value=": {{ $invoice->add_at }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if ($invoice->customerId != 0)
                                <div class="form-group row">
                                    <label for="customerNo" class="col-sm-5 col-form-label">Nomor Member</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly class="form-control-plaintext" id="customerNo" value=": {{ $invoice->customer->customerNo }}">
                                    </div>
                                    <label for="customerName" class="col-sm-5 col-form-label">Nama Member</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly class="form-control-plaintext" id="customerName" value=": {{ $invoice->customer->customerName }}">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <h5 class="mt-5">Daftar Barang</h5>
                    <hr>
                    <div class="table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama barang</th>
                                        <th>jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->product->productCode }}</td>
                                        <td>{{ $order->product->productName }}</td>
                                        <td>{{ $order->qty }}</td>
                                        <td>Rp. {{ number_format($order->total,0) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="payment" class="col-sm-5">Metode Pembayaran</label>
                                <div class="col-sm-7">
                                    <select name="paymentclass=" class="form-control" id="payment">
                                        <option>pilih Metode</option>
                                        @foreach ($payments as $payment)
                                            <option value="{{ $payment->id }}">{{   $payment->payment}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="payTotal" class="col-sm-5">Jumlah Tagihan (Rp.)</label>
                                <div class="col-sm-7">
                                    <input required name="payTotal" type="text" readonly class="form-control" id="payTotal" value="{{ number_format($payTotal) }}">
                                    <input type="hidden" name="hidden" value="{{ $payTotal}}">
                                    
                                </div>
                                {{-- <label for="discond" class="col-sm-5">Potongan</label>
                                <div class="col-sm-7">
                                    <input name="discond" type="text" class="form-control" id="discond">
                                </div> --}}
                                <label for="cash" class="col-sm-5">Bayar (Rp.)</label>
                                <div class="col-sm-7">
                                    <input name="cash" type="text" class="form-control" id="cash">
                                </div>
                                <label for="refund" class="col-sm-5">Kembalian (Rp.)</label>
                                <div class="col-sm-7">
                                    <input name="refund" type="text" class="form-control" id="refund" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ Detail-table ] end -->
</div>
<!-- [ Main Content ] end -->
</div>

@push('script')
    <script>
        $("input[name='cash']").change(function(){
            $("input[name='refund']").val(new Intl.NumberFormat().format(parseInt($("input[name='cash']").val()) - parseInt($("input[name='hidden']").val())))
        })
    </script>
@endpush
@endsection