@extends('layouts.main')

@section('title', 'Penjualan')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Transaksi Penjualan</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{__('/dashboard')}}"><i class="feather icon-home"></i></a></li>
					<li class="breadcrumb-item"><a href="{{__('create')}}">Buat Transaksi</a></li>
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
				<h5>Buat Transaksi Baru</h5>
			</div>
			<div class="card-body">
				<form method="POST" action="/invoice">
                    @csrf
                    <div class="row">

                        <!-- [ invoice No ] -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="invoiceNo">No invoice</label>
                                <input name="invoiceNo" id="invoiceNo" type="text" required class="form-control">
                            </div>
                        </div>
                        
                        <!-- [ member No ] -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="memberNo">No Member</label>
                                <input name="memberNo" id="memberNo" type="text" class="form-control">
                                <small id="emailHelp" class="form-text text-muted">opsional, diisi jika pelanggan merupakan Member</small>
                                
                                <!-- [ member id ] -->
                                <input name="memberId" id="memberId" type="hidden" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="member">

                        <!-- [ product code ] -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="productCode">Kode Produk</label>
                                <input name="productCode" id="productCode" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-5">Daftar Barang</h5>
                    <hr>
                    <!-- [ product table ] start -->
                    <div id="page"></div>
                    <!-- [ product table ] end -->
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button onclick="deletedraf()" type="submit" class="btn  btn-primary">Buat Pesanan</button>
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
        // get member by member No
        $('#memberNo').change(function()
        {
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/getMember/' + $(this).val(),
                success: function(data, status)
                {
                    $('#memberId').val(data.member.id);
                    let member = `
                                <!-- [ product code ] end -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="productCode">Nama Member</label>
                                        <input name="memberName" id="memberName" value="${data.member.customerName}" type="text" class="form-control">
                                    </div>
                                </div>`
                    $('#member').append(member);            
                }
            })
        })

        // get product by product code
        $('#productCode').change(function()
        {
            $.ajax({
                type: 'get',
                url: '/getProduct/' + $(this).val(),
                dataType: 'json',
                success: function(data, status)
                {
                    let product = {
                        productId : data.product.id,
                        productCode : data.product.productCode,
                        productName : data.product.productName,
                        purchasePrice : data.product.sellingPrice,
                        qty : 0,
                        subTotal : 0
                    }
                    store(product);
                    index()
                }
            })
        })

        // index drafProduct
        function index()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post('/index', {}, function(data){
                $('#page').html(data);
            })
        }

        // store drafPorduct
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
                dataType: 'json'
            }) 
        }

        // update qty
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
            })
        }
        
        // truncate drop drafProduct
        function deletedraf()
        {
            $.post('/deletedraf', $('form').serialize())
        }
    </script>
@endpush