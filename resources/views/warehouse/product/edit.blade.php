@extends('layouts.main')

@section('title', 'Tambah Produk')

@section('content')
<div class="pcoded-content">
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Produk</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ __('/dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{__('edit')}}">{{__('edit')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-md-10">
        <div class="card">
            {{-- form create product --}}
            <div class="card-header">
                <h5>Tambah Produk</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="/product/{{ $products->id }}">
                    @csrf
                    @method('put')
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ProductCode">Kode Produk</label>
                            <input required value="{{ old('productCode', $products->productCode)}}" name="productCode" type="text" class="form-control @error('productCode') is-invalid @enderror" id="productCode">
                            @error('productCode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productName">Nama Produk</label>
                            <input required value="{{ old('productName', $products->productName)}}" name="productName" type="text" class="form-control  @error('productName') is-invalid @enderror" id="productName">
                            @error('productName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="brand">Merk</label>
                            <input required value="{{ old('brand', $products->brand)}}" name="brand" type="text" class="form-control  @error('brand') is-invalid @enderror" id="brand">
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">Stok</label>
                            <input required value="{{ old('stock', $products->stock)}}" name="stock" type="number" class="form-control  @error('stock') is-invalid @enderror" id="stock">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="purchasePrice">Harga Beli</label>
                            <input required value="{{ old('purchasePrice', $products->purchasePrice)}}" name="purchasePrice" type="number" class="form-control  @error('purchasePrice') is-invalid @enderror" id="purchasePrice">
                            @error('purchasePrice')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sellingPrice">Harga Jual</label>
                            <input required value="{{ old('sellingPrice', $products->sellingPrice)}}" name="sellingPrice" type="number" class="form-control  @error('sellingPrice') is-invalid @enderror" id="sellingPrice">
                            @error('sellingPrice')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="categoryId">pilih kategori</label>
                            <select required name="categoryId" class="form-control" id="categoryId" >
                                <option value="">pilih kategory</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}">{{ $category->categoriName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="suplayerId">pilih suplayer</label>
                            <select required name="suplayerId" class="form-control" id="suplayerId">
                                <option value="">Pilih Suplayer</option>
                                @foreach ($suplayers as $suplayer)
                                    <option value="{{ $suplayer->id}}" @checked( old('suplayerId') == $suplayer)>{{ $suplayer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn  btn-primary">Tambah Produk</button>
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