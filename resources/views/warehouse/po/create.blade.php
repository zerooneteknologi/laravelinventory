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
				<form>
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
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                    <h5 class="mt-5">Daftar Barang</h5>
                    <hr>
                    <!-- [ product table ] start -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
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