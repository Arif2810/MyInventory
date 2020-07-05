@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <h1>
		        Daftar Supplier
		    </h1>
		    <small>Daftar ini digunakan untuk menampilkan Supllier</small>
		    <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		        <li><a href="#">Other</a></li>
		        <li class="active">Supplier</li>
		    </ol>
		</div>
	</div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-heading">Data Supplier</div><br>
            	<div class="box-tools pull-right" style="padding-right: 10px">
            		<a href="{{ url('supplier/create') }}"> <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Supplier</button></a>
            	</div><br>
            	<div class="panel-body">
            		@include('inventory/notification')
            		<table class="table table-hover">
			        	<thead>
			        		<tr>
			        			<th>No</th>
			            		<th>Nama Supplier</th>
			            		<th colspan="2">Action</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        		<?php $no=1; ?>
			        		@foreach($suppliers as $suppliers)
			        		<tr>
			        			<td>{{ $no++ }}</td>
			        			<td>{{ $suppliers->nama_supplier}}</td>
			        			<td>
			        				<a href="supplier/{{$suppliers->id_supplier}}/edit"><button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</button></a>
			        				<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
			        			</td>	
		        				<!-- <td>	
		        				<form action="/supplier/{{$suppliers->id_supplier}}" method="post">
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
			<form action="/supplier/{{$suppliers->id_supplier}}" method="post">
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