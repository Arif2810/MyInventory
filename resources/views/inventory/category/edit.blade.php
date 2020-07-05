@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <h2>Update Data kategori</h2>
		    <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	            <li><a href="#">Kategori</a></li>
	            <li class="active">Update Kategori</li>
	        </ol>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
			<form action="/category/{{$categories->id_category}}" method="post">
				<div class="form-group">
					<label>Nama Kategori</label>
					<input class="form-control" type="text" name="kategori" value="{{$categories->kategori}}"><br>
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