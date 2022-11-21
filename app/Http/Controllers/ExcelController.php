<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

//use Maatwebsite\Excel\Excel;
//use Excel;


class ExcelController extends Controller
{
    public function viewExcel( $id)
    {

        $invoice =  Invoice::findOrFail($id);

        return view('dashboards.invoices.invoiceExcel', compact('invoice'));
    }

    public function downloadExcel($type, $id)
    {

        $invoice =  Invoice::findOrFail($id);

//        $type2 = 'xls';


        return Excel::create('invoice', function($excel) use ($invoice) {
           $excel->sheet('mysheet', function($sheet) use($invoice) {
              $sheet->loadView('dashboards.invoices.invoiceExcel')->with('invoice', $invoice);
           });
            })->download('xlsx');

    }
}
