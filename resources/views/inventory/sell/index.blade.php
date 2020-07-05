@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-2">
	    <h1>
	        Transaksi Penjualan
	    </h1>
	    <small>Data ini digunakan untuk menampilkan penjualan barang</small>
	    <ol class="breadcrumb">
	        <li><a href="/home">Home</a></li>
	        <li class="active">Penjualan</li>
	    </ol>
	</div>
</div>

<section class="content">
	<form action="{{ route('sell.store') }}" method="post">
		<div class="col-md-6">
			<div class="box box-info">
	        	<div class="box-header">
	        		<h3 class="box-title">Data Penjualan</h3>
	        	</div>
				<div class="form-group">
					<label>Pilih Konsumen</label>
					<select class="form-control" name="id_customer">
						@foreach($customers as $customers)
						<option value="<?=$customers->id_customer?>"><?=$customers->nama_konsumen?></option>
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
		                            <th>Nama Konsumen</th>
		                            <th>Nama Barang</th>
		                            <th>Jumlah</th>
		                            <th>Harga</th>
		                            <th>Subtotal</th>
		                            <th>Action</th>
	                        	</tr>
	                    	</thead>
	                    	<tbody>
	                    		<?php $no=1; $total=0; ?>
	                    		@foreach($sells as $sell)
	                        	<tr>
		                        	<th>{{ $no++ }}</th>
		                            <th>{{ $sell->id_product }}</th>
		                            <th>{{ $sell->nama_konsumen }}</th>
		                            <th>{{ $sell->nama_barang }}</th>
		                            <th>{{ $sell->qty }}</th>
		                            <th>{{ $sell->harga_jual }}</th>
		                            <th>{{ $sell->harga_jual*$sell->qty }}</th>
		                            <th>
		                            	<form action="{{ url('sell')}}/{{$sell->id_sell}}" method="post">
		                            		<input class="btn btn-danger btn-sm" type="submit" name="submit" value="Cancel">
		                            		{{method_field('delete')}}
		                            		{{csrf_field()}}
																		<input type="hidden" name="_method" value="DELETE">
		                            	</form>
		                            </th>
		                            <?php $total=$total+($sell->harga_jual*$sell->qty) ?>
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
	                <a href="{{ route('sell.update') }}" class="btn btn-success"><i class="glyphicon glyphicon-circle-arrow-right"></i> Selesai</a>
	            </div>
	        </div>
	    </div>
	</div>
	</div>
</section>

@endsection