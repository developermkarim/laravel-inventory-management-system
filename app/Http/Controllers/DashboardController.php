<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $result = [];
        $result['totalCustomers'] = Customer::where('status','1')->count();
        // dd($totalCustomers);
        $result['totalSuppliers'] = Supplier::where('status','1')->count();
        // $result['totalPurchase'] = Purchase::where('status','1')->count();
        $result['totalInvoice'] = Invoice::where('status','1')->count();

    //    $result['payments'] = Payment::all();

    $result['customerPayment'] = Payment::all();

        $result['purchase'] = Purchase::where('status',1)->get();
       $result['today_income'] = Invoice::select('date')->get();

       $todayDate = date('Y-m-d',strtotime($result['today_income']));

    //    dd($result['today_income']);


// dd($todayDate);
        // dd($result['purchase']);

        /* Graph Chart  between Purchase and sales */

        $result['products'] = Product::has('purchase')->orderBy('created_at','desc')->where('status','1')->get();
        // dd($result['products']);

        // $todaySales = Invoice
        $date = date('Y-m-d');
        $result['todayPurchase'] = Purchase::where('date',$date)->sum('buying_price');
     
        // $test = Purchase::select('created_at')->get();

        // $ConvertDate = Carbon::parse('2022-11-10 13:58:10')->format('Y-d-m');
        // dd(strtotime($ConvertDate));



       return view('admin.index',$result);
    }

}
