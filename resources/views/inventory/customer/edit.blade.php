@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <h2>Update Data Konsumen</h2>
		    <ol class="breadcrumb">
	            <li><a href="/home">Home</a></li>
	            <li><a href="/home/customer">konsumen</a></li>
	            <li class="active">Update konsumen</li>
	        </ol>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
			<form action="/customer/{{$customers->id_customer}}" method="post">
				<div class="form-group">
					<label>Nama konsumen</label>
					<input class="form-control" type="text" name="nama_konsumen" value="{{$customers->nama_konsumen}}"><br>
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