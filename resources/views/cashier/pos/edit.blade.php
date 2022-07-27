@extends('layouts.main')

@section('title', 'Metode Bayar')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Metode Pembayaran</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="#">Metode Bayar</a></li>
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
				<h5>Detail Pesanan</h5>
			</div>
			<div class="card-body">
            <form method="POST" action="/invoice/{{ $invoice->id}}">
                @csrf
                @method('put')
				<div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="30%" >No invoice</th>
                                    <td width="70%" >{{ $invoice->invoiceNo}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal dibuat</th>
                                    <td>{{ $invoice->date}}</td>
                                </tr>
                                @if ($invoice->memberId <> null)
                                    <tr>
                                        <th>Member</th>
                                        <td>{{$invoice->customer->customerName}}</td>
                                    </tr>
                                @endif
                            </thead>
                        </table>
                    </div>
                </div>
                <h5>Daftar Barang</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Beli</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $sale->product->productCode}}</td>
                                    <td>{{ $sale->product->productName}}</td>
                                    <td>{{ $sale->qty}}</td>
                                    <td>Rp. {{ number_format($sale->product->purchasePrice,0)}}</td>
                                    <td>Rp. {{ number_format($sale->subTotal,0) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-6">

                        <!-- [ select payment ] end -->
                        <div class="form-group row">
                            <label for="payment" class="col-sm-5 col-form-label col-form-label-sm">Metode Bayar</label>
                            <div class="col-sm-7">
                                <select name="payment" id="payment" class="form-control form-control-sm">
                                    <option>Pilih Metode</option>
                                    @foreach ($payments as $payment)
                                        <option value="{{$payment->payment}}">{{$payment->payment}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- [ pay ] -->
                        <div class="form-group row">
                            <strong for="pay" class="col-sm-5 col-form-label col-form-label-sm">bayar (Rp)</strong>
                            <div class="col-sm-7">
                                <input name="pay" id="pay" type="number" readonly value="{{$sum}}" class="form-control form-control-sm">
                            </div>
                        </div>
                        
                        <!-- [ discount ] -->
                        @if ($invoice->memberId <> null)
                            <div class="form-group row">
                                <strong for="discount" class="col-sm-5 col-form-label col-form-label-sm">Potongan (%)</strong>
                                <div class="col-sm-7">
                                    <input name="discount" id="discount" type="number" class="form-control form-control-sm">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div id="page"></div>
                </div>
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
    $('#payment').change(function(){
        $('#page').children().remove()
        if ($(this).val() == 'cash') {
            let cash = `<div class="form-group row">
                            <strong for="cash" class="col-sm-5 col-form-label col-form-label-sm">Jumlah Bayar (Rp)</strong>
                            <div class="col-sm-7">
                                <input name="cash" id="cash" type="number" class="form-control form-control-sm">
                            </div>
                        </div>`
            $('#page').append(cash);
        }else if ($(this).val() == 'tranfer') {
            let cash = `<div class="form-group row">
                            <strong for="recNo" class="col-sm-5 col-form-label col-form-label">No Rekening</strong>
                            <div class="col-sm-7">
                                <input name="recNo" id="recNo" value="recno" readonly type="text" class="form-control form-control-sm">
                            </div>
                        </div>`
            $('#page').append(cash);
        } else if ($(this).val() == 'credit') {
            let cash = `<div class="form-group row">
                            <strong for="creditPay" class="col-sm-5 col-form-label col-form-label-sm">Jumlah Bayar (Rp)</strong>
                            <div class="col-sm-7">
                                <input name="creditPay" id="creditPay" value="credit" type="text" class="form-control form-control-sm">
                            </div>
                        </div>`
            $('#page').append(cash);
        }
    })

    // count refund
    $('#page').change('#cash', function(){
        let refund = 0
        @if ($invoice->memberId <> null)
            refund = parseInt($('#cash').val()) - (parseInt($('#pay').val()) -(parseInt($('#pay').val()) * parseInt($('#discount').val()) /100))
        @else
            refund = parseInt($('#cash').val()) - parseInt($('#pay').val())
        @endif
        // console.log(refund);
        let cash = `<div class="form-group row">
                        <strong for="refund" class="col-sm-5 col-form-label col-form-label-sm">Kembalian (Rp)</strong>
                        <div class="col-sm-7">
                            <input name="refund" id="refund" value="${Math.round(refund)}" type="number" class="form-control form-control-sm">
                        </div>
                    </div>`
        $('#page').append(cash);
    })

    // count paytotal if discount
    $('#discount').change(function()
    {
        let pay = parseInt($('#pay').val()) - (parseInt($('#pay').val()) * parseInt($('#discount').val()) /100)
        let payTotal = `<div class="form-group row">
                        <strong for="payTotal" class="col-sm-5 col-form-label col-form-label-sm">Total Bayar (Rp)</strong>
                        <div class="col-sm-7">
                            <input name="payTotal" id="payTotal" value="${Math.round(pay)}" type="number" class="form-control form-control-sm">
                        </div>
                    </div>`
        $('#page').append(payTotal);
    })
</script>
@endpush
@endsection