@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <h2>Tambah Data Konsumen</h2>
		    <ol class="breadcrumb">
	            <li><a href="/home">Home</a></li>
	            <li><a href="/customer">Konsumen</a></li>
	            <li class="active">Tambah Konsumen</li>
	        </ol>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form action="/customer" method="post">
			@include('inventory/validation')
			@include('inventory/notification')
			<div>
				<label>Nama Konsumen</label>
				<input class="form-control" type="text" name="nama_konsumen">
			</div><br>

			<input class="btn btn-primary" type="submit" name="submit" value="Tambahkan">
			{{csrf_field()}}
			<a href="{{ route('customer.index') }}" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
		</form>
	</div>
</div>

@endsection