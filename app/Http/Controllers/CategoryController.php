<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller{

	public function index(){

		$categories = Category::all();
		// dd($categories);
    	return view('/inventory/category/index', ['categories'=>$categories]);
	}

	public function create(){

		return view('inventory/category/create');
	}

	public function store(Request $request){

		$this->validate($request, [
            'kategori' => 'required',
        ]);

		$categories = new Category;
		$categories->id_category = $request->id_category;
		$categories->kategori        = $request->kategori;
		$categories->save();
		// dd('kesini');

		return redirect('category/create')->with('pesan', 'Data berhasil ditambahkan');
	}

	public function edit($id_category){

		// dd($id_category);
		$categories = Category::find($id_category);
		return view('inventory/category/edit', ['categories'=>$categories]);
	}

	public function update(Request $request, $id_category){

		// dd($id_category);
		$categories = Category::find($id_category);
		$categories->kategori = $request->kategori;
		$categories->save(); 
		// dd('success');
		return redirect('category')->with('pesan', 'Data berhasil di update');
	}

	public function destroy($id_category){

		$categories = Category::find($id_category);
		$categories->delete();
		return redirect('category')->with('pesan', 'Data berhasil dihapus');
	}
    
}
