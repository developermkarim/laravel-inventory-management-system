<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
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


    public function stockSupplierWise()
    {
       /*  $allData = Product::orderBy('supplier_id','desc')->orderBy('category_id','desc')->get(); */
       $suppliers = Supplier::all();
       $categories = Category::all();
        return view('backend.stock.supplier_product_wise_stock',compact('suppliers','categories'));
    }

    public function supplierWisePdf(Request $request)
    {
       $pdSupplierData = Product::orderBy('id','desc')->where('supplier_id',$request->supplier_id)->get();
    //    dd($pdSupplierData);
       return view('backend.pdf.supplier_wise_report_pdf',compact('pdSupplierData'));
    }
    public function productWisePdf(Request $request)
    {
       $products = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
    //    dd($products);
       return view('backend.pdf.product_wise_report_pdf',compact('products'));
    }
}
