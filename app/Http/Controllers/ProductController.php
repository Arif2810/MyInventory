<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Product;
use App\Category;

class ProductController extends Controller{
    

    public function index(){

    	$products = Product::all();
    	$products = DB::table('products')
    					->ORDERBY('nama_barang')
    					->join('categories', 'products.id_category', '=', 'categories.id_category')
    					->select('products.*', 'categories.*')
    					->get();

		// $products = Product::all();
  		return view('/inventory/product/index', ['products'=>$products]);
	}

	public function create(){

		$categories = Category::all();
		$data = array(
			'id_product'  => request('id_product'),
			'nama_barang' => request('nama_barang'),
			'id_category' => request('id_category'),
			'harga_jual'  => request('harga_jual'),
			'harga_beli'  => request('harga_beli'),
			'stok'        => request('stok'),
			'categories'  => $categories,
		);

		return view('inventory/product/create', $data);
	}

	public function store(Request $request){

		$this->validate($request, [
            'id_product'  => 'required',
            'nama_barang' => 'required',
            'harga_beli'  => 'required',
            'harga_jual'  => 'required',
            'stok'        => 'required',
        ]);

		Product::create([
			'id_product'  => request('id_product'),
			'nama_barang' => request('nama_barang'),
			'id_category' => request('id_category'),
			'harga_jual'  => request('harga_jual'),
			'harga_beli'  => request('harga_beli'),
			'stok'        => request('stok')
		]);

		// $products = new Product;
		// $products->id_product  = $request->id_product;
		// $products->nama        = $request->nama;
		// $products->id_category = $request->id_category;
		// $products->harga_beli  = $request->harga_beli;
		// $products->harga_jual  = $request->harga_jual;
		// $products->save();
		// dd('kesini');

		return redirect('product/create')->with('pesan', 'Data berhasil ditambahkan');
	}

	public function edit($id_product){

		// dd($id_product);
		$products = Product::find($id_product);
		$categories = Category::all();
		// $data = array(
		// 	'id_product'  => request('id_product'),
		// 	'nama_barang' => request('nama_barang'),
		// 	'id_category' => request('id_category'),
		// 	'harga_jual'  => request('harga_jual'),
		// 	'harga_beli'  => request('harga_beli'),
		// 	'stok'        => request('stok'),
		// 	'categories'  => $categories,
		// );
		return view('inventory/product/edit', compact('products', 'categories'));
	}

	public function update(Request $request, $id_product){

		// dd($id_category);
		$products = Product::find($id_product);
		// Product::create([
		// 	'id_product'  => request('id_product'),
		// 	'nama'        => request('nama'),
		// 	'id_category' => request('id_category'),
		// 	'harga_jual'  => request('harga_jual'),
		// 	'harga_beli'  => request('harga_beli'),
		// 	'kategori'    => request('kategori')
		// ]);
		$products->id_product  = $request->id_product;
		$products->nama_barang = $request->nama_barang;
		$products->id_category = $request->id_category;
		$products->harga_beli  = $request->harga_beli;
		$products->harga_jual  = $request->harga_jual;
		$products->stok        = $request->stok;
		$products->save(); 
		// dd('success');
		return redirect('product')->with('pesan', 'Data berhasil di update');
	}

	public function destroy($id_product){

		$products = Product::find($id_product);
		$products->delete();
		return redirect('product')->with('pesan', 'Data berhasil dihapus');
	}
}
