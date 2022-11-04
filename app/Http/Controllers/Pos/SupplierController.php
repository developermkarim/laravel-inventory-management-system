<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
   public function supplierAll()
   {
$suppliers = Supplier::latest()->get();
    return view('backend.supplier.supplier_all',compact('suppliers'));
   }

   public function supplyAdd()
   {
    
    return view('backend.supplier.supplier_add');
   }
   public function supplierStore(Request $request)
   {

    Supplier::insert([
        'name'=>$request->name,
        'mobile_no'=>$request->mobile_no,
        'email'=>$request->email,
        'address'=> $request->address,
        'created_by'=>Auth::user()->id,
        'created_at'=> Carbon::now(),
    ]);

    $notification = [
        'message'=>'Supplier added Successfully',
        'alert-type'=>'success',
    ];

    return redirect()->route('supplier.all')->with($notification);

   }

   public function supplyEdit($id)
   {
    $editSupply = Supplier::findOrFail($id);
    // dd($editSupply);
    return view('backend.supplier.supplier_add',compact('editSupply'));
   }

   public function supplierUpdate(Request $request)
   {
    $updateId = $request->id;
    Supplier::findOrFail($updateId)->update([
        'name'=>$request->name,
        'mobile_no'=>$request->mobile_no,
        'email'=>$request->email,
        'address'=> $request->address,
        'created_by'=>Auth::user()->id,
        'created_at'=> Carbon::now(),
    ]);
    $notice = [
        'message'=>'Supplier Information Updated',
        'alert-type'=>'success',
    ];

    return redirect('/allSupliers')->with($notice);
   }

   public function supplierDelete($id)
   {
     Supplier::findOrFail($id)->delete();
     $deleteMsg = ['message'=>'Delete Successfully'];
     return redirect('/allSupliers')->with($deleteMsg);
   }
}
