<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  
    public function dashboard()
    {
        $totalCustomers = Customer::where('status','1')->count();
        // dd($totalCustomers);
       return view('admin.index',compact('totalCustomers'));
    }

}
