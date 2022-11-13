<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Product;
use Illuminate\Notifications\Notification;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function uploadImage($requestImage)
    {
        if($requestImage->hasFile('customer_image')){
        $extension = $requestImage->customer_image->extension();
        $imageName = 'customer-' . time() . '.'. $extension;
        $imagePath = $requestImage->customer_image->storeAs('customer/',$imageName,'public');
        $image_uri = env('APP_URL') . '/storage/' . $imagePath;
        return ['imageName'=>$imageName,'imageUri'=>$image_uri];
    }

    }
   public function InvoiceAll()
   {
    $allData = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
    return view('backend.invoice.invoice_all', compact('allData'));
   }

   public function invoiceAdd()
   {

    /* $supplier = Supplier::all();
    $unit = Unit::all(); */
    $category = Category::all();
 $customers = Customer::orderBy('id','desc')->where(['status'=>1])->get();
//  dd($customer);
    $invoice_data = Invoice::orderBy('id','desc')->first();
    if($invoice_data == null){
        $firstReg = 0;
    $invoice_no = $firstReg + 1;
    }else{
        $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no;
        $invoice_no = $invoice_data + 1;
    }

$date = date('Y-m-d');
// dd($invoice_no);
return view('backend.invoice.invoice_add', compact('invoice_no','date','category','customers'));

   }

   public function invoiceStore(Request $request)
   {
   /*  $stock = Product::where('id', $request->product_id)->first()->quantity;
    // dd($product_qty);
    if($stock == null or $stock  < $request->selling_qty){
        $notification = [
            'message'=>'Sorry Selling quantity can\'t be more than stock or null',
            'alert-type'=>'error',
        ];
        return redirect()->back()->with($notification);
    } */
    if($request->category_id == null){
$notification = [
    'message'=>'Sorry You do not select any item',
    'alert-type'=>'error',
];
return redirect()->back()->with($notification);


}

else{

    if($request->paid_amount  > $request->estimated_amount){

        $notification = [
            'message'=>'Sorry, Paid Amount can\'t be max than Estimated amount',
            'alert-type'=>'error',
        ];

        return redirect()->back()->with($notification);

    }
    else{

        /* This is for INvoice data inserting from new */

        $invoice = new Invoice();
        $invoice->invoice_no = $request->invoice_no;
        $invoice->date = date('Y-m-d', strtotime($request->date));
        $invoice->description = $request->description;
        $invoice->status = '0';
        $invoice->created_by = Auth::user()->id;

        /* data inserting by DB transaction becuse no error show while not injecting data in db table, it just return rollback the table if not inserted data */

        DB::transaction(function () use($request,$invoice) {

            if($invoice->save()){
                $count_category = count($request->category_id);

                for ($i=0; $i < $count_category; $i++) {

                    /*  There are many invoiceDetail record will be inserted based on one invoice , That's why loop is used here.It depends of multiple add on multiple category*/

                    $invoiceDetail = new InvoiceDetail();

                    $invoiceDetail->date = date('Y-m-d', strtotime($request->date));

                    $invoiceDetail->invoice_id = $invoice->id;
                    $invoiceDetail->category_id = $request->category_id[$i];
                    $invoiceDetail->product_id = $request->product_id[$i];
                    $invoiceDetail->selling_qty = $request->selling_qty[$i];
                    $invoiceDetail->unit_price = $request->unit_price[$i];
                    $invoiceDetail->selling_price = $request->selling_price[$i];
                    $invoiceDetail->status = '0';
                    $invoiceDetail->save();

                }

                /* This is For New Customer when no customers are found in previus */
                if($request->customer_id == '0'){

                    $image = $this->uploadImage($request);
                    $customer = new Customer();
                    $customer->name = $request->name;
                    $customer->mobile_no = $request->mobile_no;
                    $customer->address = $request->address;
                    $customer->customer_image = $image['imageName'];
                    $customer->customer_img_uri = $image['imageUri'];
                    $customer->email = $request->email;
                    $customer->save();

                    $customer_id = $customer->id;
                }else{

                    /* This id collected from previous customer Data */

                    $customer_id = $request->customer_id;
                }

// payments =	invoice_id	customer_id	paid_status	paid_amount	due_amount	total_amount	discount_amount

// payment_details Table ---  invoice_id	current_paid_amount	date	updated_by

       /*  New Payment data will be stored by this way */

                $payment = new Payment();
                $payment_details = new PaymentDetail();
                $payment->invoice_id = $invoice->id;
                $payment->customer_id  = $customer_id;
                $payment->paid_status = $request->paid_status;
                $payment->total_amount =  $request->estimated_amount;
                $payment->discount_amount = $request->discount_amount;

                if($request->paid_status == 'full_paid'){
                    $payment->paid_amount = $request->estimated_amount;
                    $payment->due_amount = '0';
                    $payment_details->current_paid_amount = $request->estimated_amount;
                }

                elseif($request->paid_status == 'full_due'){
                    $payment->paid_amount = '0';
                    $payment->due_amount = $request->estimated_amount;
                    $payment_details->current_paid_amount = '0';
                }
                elseif($request->paid_status == 'partial_paid'){
                    $payment->paid_amount = $request->paid_amount;
                    $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                    $payment_details->current_paid_amount = $request->paid_amount;
                }

                $payment->save();

                $payment_details->invoice_id = $invoice->id;
                $payment_details->date = date('Y-m-d', strtotime($request->date));
                $payment_details->save();


            }

        });


    }

   $notification = [
    'message'=>'Invoice Data inserted successfully',
    'alert-type'=>'success',
   ];

}
return redirect()->route('invoice.pending_list')->with($notification);

// End this store Method
}

/* Pending list method here */
public function pendingList()
{
    $allData = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
    // dd($allData);

    return view('backend.invoice.pending_list',compact('allData'));
}

/* Invoice approval section here */
public function invoiceApprove($id)
{

$invoice = Invoice::with('invoice_details')->findOrFail($id);
//  dd($invoice);

return view('backend.invoice.approve_list',compact('invoice'));


}

public function invoiceApproveStore(Request $request,$id)
{
    foreach ($request->selling_qty as $key => $value) {
        $invoiceDetail = InvoiceDetail::where('id',$key)->first();
        $product = Product::where('id',$invoiceDetail->product_id)->first();

        if($product->quantity < $request->selling_qty[$key]){

            $notification = [
                'message'=>'SOrry, You approved maximum  quantity Value',
                'alert-type'=>'error',
            ];

            return redirect()->back()->with($notification);
        }
        
    } // End Foreach Loop

    $invoice = Invoice::findOrFail($id)->first();
    $invoice->updated_by = Auth::user()->id;
    $invoice->status = '1';
    DB::transaction(function() use($request,$invoice,$id){

        foreach ($request->selling_qty as $key => $value) {
            $invoiceDetails = InvoiceDetail::where('id',$key)->first();
            $product = Product::where('id',$invoiceDetails->product_id)->first();
            $product->quantity = ((float)$product->quantity) - $request->selling_qty[$key];
            $product->save();

        } // End Foreach Loop
        $invoice->save();
        
    });
    $notification = array(
        'message' => 'Invoice Approve Successfully', 
        'alert-type' => 'success'
    );
    
    return redirect()->route('invoice.pending_list')->with($notification);
  
}


public function invoiceDelete($id)
{
    $invoice = Invoice::findOrFail($id);
   $result =  $invoice->delete();
   $result = InvoiceDetail::where('invoice_id',$invoice->id)->delete();
   $result = Payment::where('invoice_id',$invoice->id)->delete();
   $result = PaymentDetail::where('invoice_id',$invoice->id)->delete();
   if($result){

    $Notification = ['message'=>'Invoice deleted successfully','alert-type'=>'success'];
    return redirect()->back()->with($Notification);

   }else{
    $Notification = ['message'=>'Sorry! Invoice ot deleted','alert-type'=>'error'];
    return redirect()->back()->with($Notification);
   }


}

}
