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
                        <div class="col-sm-9" id="product">
                            <input name="purchaseNo" readonly value="{{ $purchaseNo }}" required type="text" class="form-control" id="purchaseNo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="suplayerId" class="col-sm-3 col-form-label">Suplayer</label>
                        <div class="col-sm-9">
                            <select required name="suplayerId" class="form-control" id="suplayerId">
                                <option value="">Pilih Suplayer</option>
                                @foreach ($suplayers as $suplayer)
                                    <option value="{{ $suplayer->id}}">{{ $suplayer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h5 class="mt-5">Daftar Barang</h5>
                    <hr>
                    <!-- [ product table ] start -->
                    <div id="page"></div>
                    <!-- [ product table ] end -->
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button onclick="deletedraf()" type="submit" class="btn  btn-primary">Buat PO</button>
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
            $('#id').remove()
            $.ajax(
            {
                type: 'get',
                dataType: 'json',
                url: "/checksuplayer/",
                data: { id : $(this).val() },
                success: function(data, status)
                {
                    // read product
                    $.each(data, function(key, value)
                    {
                        $.each(value, function(i, dat){
                            let product = {
                                productId : dat.id,
                                productCode : dat.productCode,
                                productName : dat.productName,
                                purchasePrice : dat.purchasePrice,
                                qty : 0,
                                subTotal : 0
                            }
                            store(product);
                            index()
                        })
                    }) 
                }
            })

        })
        

        // read drafPrduct
        function index()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post('/index', {}, function(data){
                $('#page').html(data)
            })
        }

        // add drafProdut
        function store(product)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 

            $.ajax({
                type: 'post',
                url: '/store',
                data: product,
                dataType: 'json',
            });
        }

        function update(id, price, qty, total)
        {
            let subTotal = parseInt(price) * parseInt(qty);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 
            $.ajax({
                type: 'post',
                url: '/update/' + id,
                data: {id : id, qty : qty, subTotal: subTotal},
                success: function(){
                    index()
                }
            })
        }

        //  delete drafProduct
        function destroy(id){
            $.post('/destroy/' + id, {}, function(){
                index()
            });
        }
        
        // truncate drafProduct
        function deletedraf()
        {
            $.post('/deletedraf', $('form').serialize())
        }

    </script>
@endpush