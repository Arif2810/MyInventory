@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
		    <h1>
		        Daftar Produk
		    </h1>
		    <small>Daftar ini digunakan untuk menampilkan produk</small>
		    <ol class="breadcrumb">
		        <li><a href="/home">Home</a></li>
		        <li><a href="#">Other</a></li>
		        <li class="active">Product</li>
		    </ol>
		</div>
	</div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            	<div class="panel-heading">Data Product</div><br>
            	<div class="box-tools pull-right" style="padding-right: 10px">
            		<a href="{{ url('product/create') }}"> <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Produk</button></a>
            	</div><br>
            	<div class="panel-body">
            		@include('inventory/notification')
            		<table class="table table-hover">
			        	<thead>
			        		<tr>
			        			<th>No</th>
			        			<th>SKU</th>
			            		<th>Nama</th>
			            		<th>Kategori</th>
			            		<th>Harga Beli</th>
			            		<th>Harga Jual</th>
			            		<th>Stok</th>
			            		<th colspan="2">Action</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        		<?php $no=1; ?>
			        		@foreach($products as $products)
			        		<tr>
			        			<td>{{ $no++ }}</td>
			        			<td>{{ $products->id_product}}</td>
			        			<td>{{ $products->nama_barang}}</td>
			        			<td>{{ $products->kategori}}</td>
			        			<td>{{ $products->harga_beli}}</td>
			        			<td>{{ $products->harga_jual}}</td>
			        			<td>{{ $products->stok}}</td>
			        			<td></td>
			        			<td>
			        				<a href="product/{{$products->id_product}}/edit"><button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</button></a>
			        				<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
			        			</td>	
		        				<!-- <td>	
		        				<form action="/product/{{$products->id_product}}" method="post">
									<input class="btn btn-danger btn-sm" type="submit" name="submit" value="Delete">
									{{csrf_field()}}
									<input type="hidden" name="_method" value="DELETE">
								</form>
			        			</td> -->
			        		</tr>
			        		@endforeach
			        	</tbody>
					</table>
            	</div>
            </div>
        </div>
	</div>
</div>

<!-- modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="background-color: rgb(200, 200, 200)">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span>	
				</button>
				<h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
			</div>
			<form action="/product/{{$products->id_product}}" method="post">
				{{csrf_field()}}
				<div class="modal-body" style="background-color: rgb(230, 230, 230)">
					<p class="text-center">Apakah anda yakin akan menghapus ini?</p>
					<input type="hidden" name="_method" value="DELETE">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak, kembali</button>
					<button type="submit" class="btn btn-danger">Ya, hapus ini</button>
				</div>
			</form>
		</div>
	</div>	
</div>

@endsection