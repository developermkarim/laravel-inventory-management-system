<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
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


    public function customerAll()
    {
 $customers = Customer::latest()->get();
     return view('backend.customer.customer_all',compact('customers'));
    }
 
    public function customerAdd()
    {
     
     return view('backend.customer.customer_add');
    }
    public function customerStore(Request $request)
    {
    $storeImage = $this->uploadImage($request);
     Customer::insert([
         'name'=>$request->name,
         'mobile_no'=>$request->mobile_no,
         'email'=>$request->email,
         'customer_image' => $storeImage['imageName'],
         'customer_img_uri' => $storeImage['imageUri'],
         'address'=> $request->address,
         'created_by'=>Auth::user()->id,
         'created_at'=> Carbon::now(),
     ]);
 
     $notification = [
         'message'=>'Customer added Successfully',
         'alert-type'=>'success',
     ];
 
     return redirect()->route('customer.all')->with($notification);
 
    }
 
    public function customerEdit($id)
    {
     $editCustomer = Customer::findOrFail($id);
     // dd($editSupply);
     return view('backend.customer.customer_add',compact('editCustomer'));
    }
 
    public function customerUpdate(Request $request)
    {
    //  $updateId = $request->id;
     $customer_id = $request->id;
     $deleteImg = Customer::findOrFail($customer_id);
     $path = 'customer/' . $deleteImg->customer_image;
   
     if ($request->file('customer_image')) {
        if(Storage::disk('public')->exists($path)){
        Storage::disk('public')->delete($path);
        
         }

     $storeImage = $this->uploadImage($request);
     Customer::findOrFail($customer_id)->update([
         'name' => $request->name,
         'mobile_no' => $request->mobile_no,
         'email' => $request->email,
         'address' => $request->address,
         'customer_image' => $storeImage['imageName'] ,
         'customer_img_uri' => $storeImage['imageUri'] ,
         'updated_by' => Auth::user()->id,
         'updated_at' => Carbon::now(),

     ]);

      $notification = array(
         'message' => 'Customer Updated with Image Successfully', 
         'alert-type' => 'success'
     );

     return redirect()->route('customer.all')->with($notification);

     } else{

       Customer::findOrFail($customer_id)->update([
         'name' => $request->name,
         'mobile_no' => $request->mobile_no,
         'email' => $request->email,
         'address' => $request->address, 
         'updated_by' => Auth::user()->id,
         'updated_at' => Carbon::now(),

     ]);

      $notification = array(
         'message' => 'Customer Updated without Image Successfully', 
         'alert-type' => 'success'
     );

     return redirect()->route('customer.all')->with($notification);

     } // end else 
    }
 
    public function customerDelete($id)
    {
       /*  $img = $customers->customer_image;
        unlink($img); */
        $deleteid = Customer::findOrFail($id);
        $path = 'customer/' . $deleteid->customer_image;
        if(Storage::disk('public')->exists($path)){
        Storage::disk('public')->delete($path);
        Customer::findOrFail($id)->delete();
        
     }

     $deleteMsg = ['message'=>'Delete Successfully','alert-type'=>'success'];
     
     return redirect()->back()->with($deleteMsg);
    }

    public function status($status,$id)
    {
        $model = Customer::findOrFail($id);
        $model->status = $status;
        if($model->save()){

            $notice = ['message'=>'You Have Changed Status','alert-type'=>'warning'];
        }
        return redirect()->back()->with($notice);
    }


    /* Credit Customer Report */

    public function customerCredit()
    {
      $allData = Payment::has('invoice')->whereIn('paid_status',['partial_paid','full_due'])->get();
        return view('backend.customer.customer_credit',compact('allData'));
    }


    /* Credit customer Report PDF */

    public function customerCreditPdf()
    {
        $allData = Payment::has('invoice')->whereIn('paid_status',['partial_paid','full_due'])->get();
        // dd($allData);
        return view('backend.pdf.customer_credit_pdf',compact('allData'));
    }

    public function customerInvoiceEdit($id)
    {
        $payment = Payment::where('invoice_id', $id)->first();
        //  dd($payment->invoice_id);
       return view('backend.customer.customer_invoice_edit',compact('payment'));
    }

    public function customerInvoiceUpdate(Request $request, $invoice_id)
    {
       
        // dd($request->new_amount);
        if($request->new_paid_amount < $request->paid_amount){
            $notice = ['message'=>'You Have Enter Maximum Value','alert-type'=>'warning'];
            return redirect()->back()->with($notice);
        }
        else{

            $payment = Payment::where('invoice_id', $invoice_id)->first();
            $paymentDetails = new PaymentDetail();
            $payment->paid_status = $request->paid_status;
            if($request->paid_status == 'full_paid'){

$payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
// dd($payment->paid_amount);
$payment->due_amount = '0';
$paymentDetails->current_paid_amount = $request->new_paid_amount;
            }
            elseif($request->paid_status == 'partial_paid'){
$payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount'] + $request->paid_amount;

$payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount'] - $request->paid_amount;
$paymentDetails->current_paid_amount = $request->paid_amount;

            }

$payment->save();
$paymentDetails->invoice_id = $invoice_id;
$paymentDetails->date = date('Y-m-d',strtotime($request->date));
$paymentDetails->updated_by = Auth::user()->id;
$paymentDetails->updated_at = Carbon::now();
$paymentDetails->save();
$notification = array(
    'message'=>'Invoice Update Successfully',
    'alert-type'=> 'success',
);



          
        }

        return redirect()->back()->with($notification);
    }

    public function customerInvoiceDetailsPdf($invoice_id)
    {
       $payment = Payment::where('invoice_id',$invoice_id)->first();
    //    dd($customerInvoice);
    return view('backend.pdf.customer_invoice_pdf',compact('payment'));

    }


    public function customerInvoicePaid()
    {
        $paidCustomers = Payment::where('paid_status','!=','full_due')->get();
        // dd($paidCustomers);

        return view('backend.customer.customer_paid',compact('paidCustomers'));
    }

    public function customerInvoicePaidPdf()
    {
       $payment = Payment::where('paid_status','!=','full_due')->get();

       return view('backend.pdf.customer_invoice_pdf',compact('payment'));
    }


    /* Customer Wise Credit or Paid Report Method HEre */

    public function customerWiseCreditPaid()
    {
       /*  $paidCustomers = Payment::where(['paid_status'=>'full_paid'])->get();
        $creditCustomers = Payment::where('paid_status',['partial_paid','full_due'])->get(); */
// $customers = Customer::all();
$credit_customer = Payment::has('customer')->where('paid_status',['partial_paid','full_due'])->get();
$paid_customer = Payment::has('customer')->where('paid_status','=','full_paid')->get();

//    dd($paid_customer);

        return view('backend.customer.customer_credit_paid',compact('credit_customer','paid_customer'));
    }


    /* Customer Wise Credit Paid Report */

    public function customerWisePaidReport(Request $request)
    {
       $payment = Payment::where('customer_id',$request->paid_customer_id)->first();
    //    dd($customer);
        // $payment = $customer;
        // dd($payment);
        return view('backend.customer.customer_wise_paid_report',compact('payment'));
    }

    public function customerWiseCreditReport(Request $request)
    {
       $payment = Payment::where('customer_id',$request->credit_customer_id)->first();
        // $payment = $customer;
    //    dd($customer->invoice_id);
        return view('backend.customer.customer_wise_credit_report',compact('payment'));
    }


}
