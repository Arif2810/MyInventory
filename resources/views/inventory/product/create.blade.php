@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <h2>Tambah Data Barang</h2>
		    <ol class="breadcrumb">
	            <li><a href="/home">Home</a></li>
	            <li><a href="home/product">Barang</a></li>
	            <li class="active">Tambah Data</li>
	        </ol>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
			<form action="/product" method="post">
				@include('inventory/validation')
				@include('inventory/notification')
				<div class="form-group">
					<label>SKU</label>
					<input class="form-control" type="text" name="id_product">
				</div>
				<div class="form-group">
					<label>Nama Barang</label>
					<input class="form-control" type="text" name="nama_barang">
				</div>
				<div class="form-group">
					<label>Kategori Barang</label>
					<select class="form-control" name="id_category">
						<option>--Pilih Kategori--</option>
						@foreach($categories as $categories)
						<option value="<?=$categories->id_category?>"><?=$categories->kategori?></option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Harga Beli (Rp.)</label>
					<input class="form-control" class="uang" type="text" name="harga_beli">
				</div>
				<div class="form-group">
					<label>Harga Jual</label>
					<input class="form-control" type="text" name="harga_jual">
				</div>
				<div class="form-group">
					<label>Stok</label>
					<input class="form-control" type="text" name="stok">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="submit" value="Tambahkan">
					{{csrf_field()}}
					<a href="{{ route('product.index') }}" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.uang').mask('000.000.000', {reverse:true});
	});
</script>

@endsection