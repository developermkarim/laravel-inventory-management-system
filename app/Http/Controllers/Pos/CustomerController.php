<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Payment;
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

    public function creditCustomer()
    {
        $allData = Payment::has('invoice')->whereIn('paid_status',['full_due','partial_paid'])->get();
        // dd($allData);
       RETURN view('backend.customer.customer_credit',compact('allData'));
    }

    public function creditCustomerPdf()
    {
        $allData = Payment::has('invoice')->whereIn('paid_status',['full_due','partial_paid'])->get();
        // dd($allData);
       RETURN view('backend.pdf.customer_credit_pdf',compact('allData'));
    }
}
