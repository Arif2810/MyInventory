<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Supplier;

class SupplierController extends Controller{

	public function index(){

		$suppliers = Supplier::all();
		// dd($categories);
    	return view('/inventory/supplier/index', ['suppliers'=>$suppliers]);
	}

	public function create(){

		return view('inventory/supplier/create');
	}

	public function store(Request $request){

		$this->validate($request, [
            'nama_supplier' => 'required',
        ]);
		$suppliers = new Supplier;
		$suppliers->id_supplier   = $request->id_supplier;
		$suppliers->nama_supplier = $request->nama_supplier;
		$suppliers->save();
		// dd('kesini');

		return redirect('supplier/create')->with('pesan', 'Data berhasil ditambahkan');
	}

	public function edit($id_supplier){

		// dd($id_category);
		$suppliers = Supplier::find($id_supplier);
		return view('inventory/supplier/edit', ['suppliers'=>$suppliers]);
	}

	public function update(Request $request, $id_supplier){

		// dd($id_supplier);
		$suppliers               = Supplier::find($id_supplier);
		$suppliers->nama_supplier = $request->nama_supplier;
		$suppliers->save(); 
		// dd('success');
		return redirect('supplier')->with('pesan', 'Data berhasil di update');
	}

	public function destroy($id_supplier){

		$suppliers = Supplier::find($id_supplier);
		$suppliers->delete();
		return redirect('supplier')->with('pesan', 'Data berhasil dihapus');
	}
}
