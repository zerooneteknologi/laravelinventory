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
					<h5 class="m-b-10">Buat PO Baru</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="{{__('create')}}">Buat PO</a></li>
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
				<h5>Buat PO Baru</h5>
			</div>
			<div class="card-body">
				<form method="POST" action="/purchase">
                    @csrf
                    <div class="form-group row">
                        <label for="purchaseNo" class="col-sm-3 col-form-label">No PO</label>
                        <div class="col-sm-9">
                            <input required name="purchaseNo" type="text" class="form-control" id="purchaseNo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="suplayerId" class="col-sm-3 col-form-label">Suplayer</label>
                        <div class="col-sm-9">
                            <select name="suplayerId" class="form-control" id="suplayerId">
                                <option>Pilih Suplayer</option>
                                @foreach ($suplayers as $suplayer)
                                    <option value="{{ $suplayer->id}}">{{ $suplayer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h5 class="mt-5">Daftar Barang</h5>
                    <hr>
                    <!-- [ product table ] start -->
                    <div class="table-responsive">
                        <table id="product" class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="20%">Kode Produk</th>
                                    <th width="30%">Nama Produk</th>
                                    <th width="20%">Harga Jual</th>
                                    <th width="10%">qty</th>
                                    <th width="20%">Jumlah</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- [ product table ] end -->
                    <hr>
                    <div class="form-group row">
                        <label for="payTotal" class="col-sm-3 col-form-label col-form-label-lg">Jumlah Bayar</label>
                        <div class="col-sm-9">
                            <input readonly name="payTotal" type="text" class="form-control" id="payTotal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn  btn-primary">Buat PO</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
	<!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
</div>
@endsection

@push('script')
    <script>
        // get product wher id suplayer start
        $('#suplayerId').change(function(e)
        {
            deletedraf()
            $('tbody').remove()
            $.ajax(
            {
                type: 'get',
                dataType: 'json',
                url: "/checksuplayer/",
                data: { id : $(this).val() },
                success: function(data)
                {
                    // read product
                    $.each(data, function(key, value)
                    {
                        $.each(value, function(i, dat)
                        {
                            let product = `<tbody>
                                            <tr>
                                                <td><input name="productCode" type="text" readonly class="form-control-plaintext" value="${dat.productCode}"></td>
                                                <td><input name="productName" type="text" readonly class="form-control-plaintext" value="${dat.productName}"></td>
                                                <td><input id="sellingPrice" name="sellingPrice" type="text" readonly class="form-control-plaintext" value="${dat.sellingPrice}"></td>
                                                <td><input value="0" id="qty" name="qty" class="form-control form-control-sm" type="number"></td>
                                                <td><input value="0" id="subTotal" name="subTotal" type="text" readonly class="form-control-plaintext"></td>
                                            </tr>
                                        </tbody>`
                            $('#product').append(product)
                            creatdraf();
                        })
                    })
                    // read product end
                }
            })

        })
        // get product wher id suplayer end

        // edit qyt start
        const product = document.querySelector('#product');
        product.addEventListener('change', function(e)
        {
            let total = parseInt(e.target.value)*parseInt(e.target.parentElement.previousElementSibling.firstChild.value);
            let subTotal = e.target.parentElement.nextElementSibling.firstChild
            subTotal.value = total;
        })
        // edit qyt end

        function creatdraf()
        {
            $.post('/createdraf', $('form').serialize())
        }

        function deletedraf()
        {
            // $.post('/deletedraf');
            $.post('/deletedraf', $('form').serialize())
            
        }

    </script>
@endpush