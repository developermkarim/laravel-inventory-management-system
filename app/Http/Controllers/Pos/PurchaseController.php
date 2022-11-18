<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

    public function purchaseAdd(){

        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('backend.purchase.purchase_add',compact('supplier','unit','category'));

    }

    public function purchaseStore(Request $request)
    {
        if($request->category_id == null){

            $errorNotice = array(
                'message'=>'Sorry, You Do not select any item',
                'alert-type'=>'error',
            );
            return redirect()->back()->with($errorNotice);
        }
        else{
            $count_category = count($request->category_id);
            for ($i=0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];

                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();

            }
            $notification = array(
                'message' => 'Data Save Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('purchase.all')->with($notification);
        }
    }

    public function purchaseAll()
    {
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        // dd($allData);
       return view('backend.purchase.purchase_all',compact('allData'));
    }

    public function purchaseDelete($id)
    {
       $deletePurchase = Purchase::findOrFail($id);
        $result =  $deletePurchase->delete();
        if($result){
            $notice = [
                'alert-type'=>'success',
                'message'=>'Purchase data deleted',
            ];

            return redirect()->back()->with($notice);
        }else{
            $notice = [
                'alert-type'=>'error',
                'message'=>'Purchase data not deleted',
            ];

            return redirect()->back()->with($notice);
        }
    }

    public function purchasePending()
    {
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('backend.purchase.purchase_pending', compact('allData'));
    }

    public function purchaseApproved($id)
    {

      $purchase = Purchase::findOrFail($id);
      $product = Product::where('id',$purchase->product_id)->first();
      $purchase_qty = ((float)($purchase->buying_qty))+((float) ($product->quantity));
      $product->quantity = $purchase_qty;
      if($product->save()){
        Purchase::findOrfail($id)->update([
            'status'=>'1',
        ]);
        $notice = [
            'alert-type'=>'success',
            'message'=>'Purchase data Approved',
        ];

      }
       return redirect()->back()->with($notice);
    }

    public function purchasedailyReport()
    {
      /*   $startDate = $request->start_date;
        $endDate  = $request->end_date;
        $allData = Purchase::orderBy('created_at','desc')->between($startDate,$endDate)->get(); */
        return view('backend.purchase.purchase_daily_report');
    }

    public function purchasedailyReportPdf(Request $request)
    {
        /* $startDate = date('Y-m-d',strtotime($request->start_date));
        $endDate = date('Y-m-d', strtotime($request->end_date));
        $allData = Purc::whereBetween('date',[$startDate,$endDate])->get();
     
         return view('backend.pdf.purchase_daily_report_pdf',compact('allData','startDate','endDate')); */
        
        $startDate = date('Y-m-d',strtotime($request->start_date)); 
        $endDate  = date('y-m-d',strtotime($request->end_date)); 
        $allData = Purchase::whereBetween('date',[$startDate,$endDate])->get();
      /*   $sDate = date('Y-m-d',strtotime($request->start_date));
        $eDate = date('Y-m-d',strtotime($request->end_date)); */

        return view('backend.pdf.purchase_daily_report_pdf',compact('allData','startDate','endDate'));
    }
}
