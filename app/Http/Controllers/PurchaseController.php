<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Purchase;
use App\Supplier;
use App\Product;
use Fpdf;
use Carbon\Carbon;

class PurchaseController extends Controller{

	public function index(){

		$purchases = Purchase::all();
		$purchases = DB::table('purchases')
						->join('products', 'purchases.id_product', '=', 'products.id_product')
						->join('suppliers', 'purchases.id_supplier', '=', 'suppliers.id_supplier')
						->select('purchases.*', 'products.*', 'suppliers.*')
						->where('status','=', '0')
						->get();
    	$suppliers = Supplier::all();
    	$products  = Product::all();
    	$data = array(
			'suppliers'  => $suppliers,
			'products'   => $products,
		);
  		return view('/inventory/purchase/index', ['purchases'=>$purchases], $data);
	}

	public function store(Request $request){

		Purchase::create($request->all());
		return redirect('purchase');
	}

	public function destroy($id_sell){

		$purchases = Purchase::find($id_sell);
		$purchases->delete();
		return redirect('purchase');
	}

	public function update(){

		$purchases = Purchase::where('status', '0');
		$purchases->update(['status'=>'1']);
		return redirect('purchase')->with('pesan', 'Data dikirim ke laporan');
	}

	public function report(){

		$pdf = new Fpdf("L","cm","A4");
        $pdf::AddPage();
        $pdf::SetFont('Arial', 'B', 18);
        $pdf::Cell(185,7,'Laporan Pembelian',0,1,'C');
        $pdf::SetFont('Arial', '', 12);
        $pdf::Cell(185,5,'Perawang',0,1,'C');
        $pdf::SetFont('Arial', '', 12);
        $pdf::Cell(185,5,"Telpon : 0888877776655 ",0,1,'C');
        $pdf::Line(10,30,190,30);
        $pdf::Line(10,31,190,31);
        $pdf::Cell(30,10,'',0,1);
        $pdf::SetFont('Arial', 'B', 14);
        $pdf::Cell(185,5,'Pembelian',0,0,'C');
        $pdf::Cell(30,10,'',0,1);
        $pdf::Cell(60,7,'Nama Barang',1,0);
        $pdf::Cell(25,7,'Jumlah',1,0);
        $pdf::Cell(40,7,'Harga',1,0);
        $pdf::Cell(38,7,'Subtotal',1,0);
        $pdf::Cell(30,7,'Tanggal',1,1);
        $purchases = Purchase::all();
		$purchases = DB::table('purchases')
						->join('products', 'purchases.id_product', '=', 'products.id_product')
						->join('suppliers', 'purchases.id_supplier', '=', 'suppliers.id_supplier')
						->select('purchases.*', 'products.*', 'suppliers.*')
						->where('status','=', '1')
						->get();
        $suppliers = Supplier::all();
    	$products  = Product::all();
    	$data = array(
			'suppliers'  => $suppliers,
			'products'   => $products,
		);
        foreach($purchases as $purchases){
            $pdf::Cell(60,7,$purchases->nama_barang,1,0);
            $pdf::Cell(25,7,$purchases->qty,1,0);
            $pdf::Cell(40,7,$purchases->harga_beli,1,0);
            $pdf::Cell(38,7,$purchases->harga_beli*$purchases->qty,1,0);
            $pdf::Cell(30,7,\Carbon\Carbon::parse($purchases->date)->formatLocalized('%d %b %Y'),1,1);
       	}
        $pdf::Output();
		exit;
	}

}
