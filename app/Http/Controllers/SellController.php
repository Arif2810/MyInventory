<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Sell;
use App\Customer;
use App\Product;
use Fpdf;
use Carbon\Carbon;

class SellController extends Controller{

	public function index(){

		$sells = Sell::all();
		$sells = DB::table('sells')
						->join('products', 'sells.id_product', '=', 'products.id_product')
						->join('customers', 'sells.id_customer', '=', 'customers.id_customer')
						->select('sells.*', 'products.*', 'customers.*')
						->where('status','=', '0')
						->get();

		// $sells = DB::table('sells')
		// 				->join('customers', 'sells.id_customer', '=', 'customers.id_customer')
		// 				->select('sells.*', 'customers.*')
		// 				->get();
    	// $sells = Sell::where('status', '0')->get();
    	$customers = Customer::all();
    	$products  = Product::all();
    	$data = array(
			'customers'  => $customers,
			'products'   => $products,
		);
  		return view('/inventory/sell/index', ['sells'=>$sells], $data);
	}

	public function store(Request $request){

		Sell::create($request->all());
		return redirect('sell');
	}

	public function destroy($id_sell){

		$sells = Sell::find($id_sell);
		$sells->delete();
		return redirect('sell');
	}

	public function update(){

		$sells = Sell::where('status', '0');
		$sells->update(['status'=>'1']);
		return redirect('sell')->with('pesan', 'Data dikirim ke laporan');
	}

	public function report(){

		$pdf = new Fpdf("L","cm","A4");
        $pdf::AddPage();
        $pdf::SetFont('Arial', 'B', 18);
        $pdf::Cell(185,7,'Laporan Penjualan',0,1,'C');
        $pdf::SetFont('Arial', '', 12);
        $pdf::Cell(185,5,'Perawang',0,1,'C');
        $pdf::SetFont('Arial', '', 12);
        $pdf::Cell(185,5,"Telpon : 0888877776655 ",0,1,'C');
        $pdf::Line(10,30,190,30);
        $pdf::Line(10,31,190,31);
        $pdf::Cell(30,10,'',0,1);
        $pdf::SetFont('Arial', 'B', 14);
        $pdf::Cell(185,5,'Penjualan',0,0,'C');
        $pdf::Cell(30,10,'',0,1);
        $pdf::Cell(60,7,'Nama Barang',1,0);
        $pdf::Cell(25,7,'Jumlah',1,0);
        $pdf::Cell(40,7,'Harga',1,0);
        $pdf::Cell(38,7,'Subtotal',1,0);
        $pdf::Cell(30,7,'Tanggal',1,1);
        $sells = Sell::all();
		$sells = DB::table('sells')
						->join('products', 'sells.id_product', '=', 'products.id_product')
						->join('customers', 'sells.id_customer', '=', 'customers.id_customer')
						->select('sells.*', 'products.*', 'customers.*')
						->where('status','=', '1')
						->get();
     	$customers = Customer::all();
    	$products  = Product::all();
  	// $data = array(
		// 	'customers'  => $customers,
		// 	'products'   => $products,
		// );
        foreach($sells as $sells){
            $pdf::Cell(60,7,$sells->nama_barang,1,0);
            $pdf::Cell(25,7,$sells->qty,1,0);
            $pdf::Cell(40,7,$sells->harga_jual,1,0);
            $pdf::Cell(38,7,$sells->harga_jual*$sells->qty,1,0);
            $pdf::Cell(30,7,Carbon::parse($sells->date)
            								->formatLocalized('%d %b %Y'),1,1);
       	}
        $pdf::Output();
		exit;
	}
   
}
