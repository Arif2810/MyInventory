<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Customer;

class CustomerController extends Controller{

	public function index(){

		$customers = Customer::all();
    	return view('/inventory/customer/index', ['customers'=>$customers]);
	}

	public function create(){

		return view('inventory/customer/create');
	}

	public function store(Request $request){

		$this->validate($request, [
            'nama_konsumen' => 'required',
        ]);
		$customers = new Customer;
		$customers->id_customer = $request->id_customer;
		$customers->nama_konsumen        = $request->nama_konsumen;
		$customers->save();
		// dd('kesini');

		return redirect('customer/create')->with('pesan', 'Data berhasil ditambahkan');
	}

	public function edit($id_customer){

		// dd($id_category);
		$customers = Customer::find($id_customer);
		return view('inventory/customer/edit', ['customers'=>$customers]);
	}

	public function update(Request $request, $id_customer){

		// dd($id_category);
		$customers = Customer::find($id_customer);
		$customers->nama_konsumen = $request->nama_konsumen;
		$customers->save(); 
		// dd('success');
		return redirect('customer')->with('pesan', 'Data berhasil di update');
	}

	public function destroy($id_customer){

		$customers = Customer::find($id_customer);
		$customers->delete();
		return redirect('customer')->with('pesan', 'Data berhasil dihapus');
	}
    
}
