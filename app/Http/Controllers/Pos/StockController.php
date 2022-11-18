<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stockReport()
    {
        $allData = Product::orderBy('supplier_id','desc')->orderBy('category_id','desc')->get();
       return view('backend.stock.stock_report',compact('allData'));
    }

    public function stockReportPdf()
    {
        $allData = Product::orderBy('supplier_id','desc')->orderBy('category_id','desc')->get();
        return view('backend.pdf.stock_report_pdf',compact('allData'));
    }
}
