@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Dashboard</h1> <small> Halaman Utama</small>
                </div>
                <div class="panel-body">
                @if(Auth::user()->jabatan == 'ADMIN')
                    <div class="panel-body" align="center">
                        <div>
                            <a href="{{ route('category.index') }}"><img title="kategori barang" src="images/category.jfif" alt="kategori barang"></a>                     
                            <a href="{{ route('supplier.index') }}"><img title="daftar supplier" src="images/supplier.png"></a>
                            <a href="{{ route('customer.index') }}"><img title="daftar customer" src="images/customer.jpg"></a>
                        </div>
                        <div><hr></div>
                        <div>
                            <a href="{{ route('product.index') }}"><img title="daftar barang" src="images/product.png"></a>
                            <a href="{{ route('sell.index') }}"><img title="penjualan" src="images/sell.jfif"></a>
                            <a href="{{ route('purchase.index') }}"><img title="pembelian" src="images/purchase.jpg"></a>
                        </div>
                    </div>
                @else
                    <div class="panel-body">
                        Halaman Member
                    </div>
                @endif  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection