@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-2">
	    <h1>
	        Transaksi Pembelian
	    </h1>
	    <small>Data ini digunakan untuk menampilkan pembelian barang</small>
	    <ol class="breadcrumb">
	        <li><a href="/home">Home</a></li>
	        <li class="active">Pembelian</li>
	    </ol>
	</div>
</div>

<section class="content">
	<form action="{{ route('purchase.store') }}" method="post">
		<div class="col-md-6">
			<div class="box box-info">
	        	<div class="box-header">
	        		<h3 class="box-title">Data Pembelian</h3>
	        	</div>
				<div class="form-group">
					<label>Pilih Supplier</label>
					<select class="form-control" name="id_supplier">
						@foreach($suppliers as $suppliers)
						<option value="<?=$suppliers->id_supplier?>"><?=$suppliers->nama_supplier?></option>
						@endforeach
					</select>
				</div>					
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
			    <div class="box box-info">
			        <div class="box-header">
			            <h3 class="box-title">Data Barang</h3>
			        </div>			        
			        <div class="box-body">
			            <div class="form-group">
			                <label for="nama_barang">Nama Barang</label>
			                <select class="form-control" name="id_product">
			                	@foreach($products as $products)
			                	<option value="<?=$products->id_product?>">{{ $products->nama_barang }}</option>
			                	@endforeach
			                </select>
			            </div>
			            <div class="form-group">
			                <label for="qty">Jumlah</label>
			                <input class="form-control" placeholder="Masukkan jumlah barang" name="qty" type="number">
			            </div>
			            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Simpan</button><br><br>
			        </div>
			        {{csrf_field()}}
			    </div>       
			</div>
		</div>
	</form>

	<div class="row" style="padding: 0 10px">
	    <div class="col-md-12">
	    	<div class="panel panel-default">
	        <div class="box box-solid">
	            <div class="box-body">
	                <div class="table-responsive no-padding">
	                    <table class="table table-hover" id="temp-product">
	                        <thead>
	                        	<tr>
		                        	<th>No</th>
		                            <th>SKU</th>
		                            <th>Nama Supplier</th>
		                            <th>Nama Barang</th>
		                            <th>Jumlah</th>
		                            <th>Harga</th>
		                            <th>Subtotal</th>
		                            <th>Action</th>
	                        	</tr>
	                    	</thead>
	                    	<tbody>
	                    		<?php $no=1; $total=0; ?>
	                    		@foreach($purchases as $purchases)
	                        	<tr>
		                        	<th>{{ $no++ }}</th>
		                            <th>{{ $purchases->id_product }}</th>
		                            <th>{{ $purchases->nama_supplier }}</th>
		                            <th>{{ $purchases->nama_barang }}</th>
		                            <th>{{ $purchases->qty }}</th>
		                            <th>{{ $purchases->harga_beli }}</th>
		                            <th>{{ $purchases->harga_beli*$purchases->qty }}</th>
		                            <th>		                            	             
		                            	<form action="/purchase/{{$purchases->id_purchase}}" method="post">
		                            		<input class="btn btn-danger btn-sm" type="submit" name="submit" value="Cancel">
		                            		{{method_field('delete')}}
		                            		{{csrf_field()}}
																		<input type="hidden" name="_method" value="DELETE">
		                            	</form>
		                            </th>
		                            <?php $total=$total+($purchases->harga_beli*$purchases->qty) ?>
	                            @endforeach
	                        	</tr>
	                        	<tr>
	                        		<td colspan="6"><p align="right"><strong>Total</strong></p></td>
	                        		<td><strong>{{ $total }}</strong></td>
	                        	</tr>
	                    	</tbody>
	                	</table>
	                </div>
	            </div>
	            <div style="padding: 0 20px">
	            	@include('inventory/notification')
	            </div>
	            <div class="box-footer" style="padding:0 0 20px 20px">
	                <a href="{{ route('purchase.update') }}" class="btn btn-success"><i class="glyphicon glyphicon-circle-arrow-right"></i> Selesai</a>
	            </div>
	        </div>
	    </div>
	</div>
	</div>
</section>

@endsection