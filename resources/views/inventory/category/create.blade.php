@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <h2>Tambah Data kategori</h2>
		    <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	            <li><a href="#">Kategori</a></li>
	            <li class="active">Tambah Kategori</li>
	        </ol>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form action="/category" method="post">
			@include('inventory/validation')
			@include('inventory/notification')
			<div>
				<label>Nama Kategori</label>
				<input class="form-control" type="text" name="kategori">
			</div><br>
			<input class="btn btn-primary" class="" type="submit" name="submit" value="Tambahkan">
			{{csrf_field()}}
			<a href="{{ route('category.index') }}" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
		</form>
	</div>
</div>

@endsection