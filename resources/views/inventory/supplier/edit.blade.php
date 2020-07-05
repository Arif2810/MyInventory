@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <h2>Update Data Supplier</h2>
		    <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	            <li><a href="#">Supplier</a></li>
	            <li class="active">Update Supplier</li>
	        </ol>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
			<form action="/supplier/{{$suppliers->id_supplier}}" method="post">
				<div class="form-group">
					<label>Nama Supplier</label>
					<input class="form-control" type="text" name="nama_supplier" value="{{$suppliers->nama_supplier}}"><br>
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