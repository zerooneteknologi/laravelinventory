<div class="table-responsive">
    <table id="product" class="table table-striped">
        <thead>
            <tr>
                <th width="15%">Kode Produk</th>
                <th width="25%">Nama Produk</th>
                <th width="20%">Harga Jual</th>
                <th width="15%">qty</th>
                <th width="20%">Jumlah</th>
                <th width="5%">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($drafProducts as $drafProduct)
                <tr>
                    <td>
                        <input name="productId[]" id="productId" type="hidden" class="form-control-plaintext" value="{{ $drafProduct->productId}}">
                        <input name="productCode[]" id="productCode" type="text" class="form-control-plaintext" value="{{ $drafProduct->productCode}}">
                    </td>
                    <td><input name="productName[]" id="productName" type="text" class="form-control-plaintext" value="{{ $drafProduct->productName}}"></td>
                    <td><input name="price[]" id="price" type="text" class="form-control-plaintext" value="{{ $drafProduct->price}}"></td>
                    <td><input name="qty[]" id="qty" type="number" class="form-control" value="{{ $drafProduct->qty}}" onchange="update({{$drafProduct->id}}, $('#price').val(), $(this).val(), $('#subTotal').val())"></td>
                    <td><input name="subTotal[]" id="subTotal" type="text" class="form-control-plaintext" value="{{ $drafProduct->total}}"></td>
                    <td><a onclick="destroy({{$drafProduct->id}})" class="badge badge-danger badge-pill"><i class="feather icon-trash-2"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<hr>
<div class="form-group row">
    <label for="payTotal" class="col-sm-3 col-form-label col-form-label-lg">Jumlah Bayar</label>
    <div class="col-sm-9">
        <input name="payTotal" id="payTotal" readonly type="text" class="form-control" value="{{$sum}}">
    </div>
</div>