@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <h2>Update Data Barang</h2>
		    <ol class="breadcrumb">
	            <li><a href="/home">Home</a></li>
	            <li><a href="home/product">Barang</a></li>
	            <li class="active">Update Barang</li>
	        </ol>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
			<form action="/product/{{$products->id_product}}" method="post">
				<div class="form-group">
					<label>SKU</label>
					<input class="form-control" type="text" name="id_product" value="{{$products->id_product}}">
				</div>
				<div class="form-group">
					<label>Nama Barang</label>
					<input class="form-control" type="text" name="nama_barang" value="{{$products->nama_barang}}">
				</div>
				<div class="form-group">
					<label>Kategori Barang</label>
					<select class="form-control" name="id_category">
					@foreach($categories as $categories)
						<option value="<?=$categories->id_category?>"><?=$categories->kategori?></option>
					@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Harga Beli</label>
					<input class="form-control" type="text" name="harga_beli" value="{{$products->harga_beli}}">
				</div>
				<div class="form-group">
					<label>Harga Jual</label>
					<input class="form-control" type="text" name="harga_jual" value="{{$products->harga_jual}}">
				</div>
				<div class="form-group">
					<label>Stok</label>
					<input class="form-control" type="text" name="stok" value="{{$products->stok}}">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="submit" value="Simpan">
					<input type="reset" class="btn btn-danger" value="Reset">

					{{csrf_field()}}
					<input type="hidden" name="_method" value="PUT">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection