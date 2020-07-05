@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <h2>Tambah Data Supplier</h2>
		    <ol class="breadcrumb">
	            <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
	            <li><a href="/supplier">Supplier</a></li>
	            <li class="active">Tambah Supplier</li>
	        </ol>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form action="/supplier" method="post">
			@include('inventory/validation')
			@include('inventory/notification')
			<div>
				<label>Nama Supplier</label>
				<input class="form-control" type="text" name="nama_supplier">
			</div><br>

			<input class="btn btn-primary" type="submit" name="submit" value="Tambahkan">
			{{csrf_field()}}
			<a href="{{ route('supplier.index') }}" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
		</form>
	</div>
</div>

@endsection