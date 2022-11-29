<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function imageStoreOrUpdate($requestImage)
    {
        if($requestImage->hasFile('product_image')){
            $extension = $requestImage->file('product_image')->extension();
            $imageName = 'product-' . mt_rand(1000,9999) . '.'. $extension;
            $imagePath = $requestImage->product_image->storeAs('product/',$imageName,'public');
            $image_uri = env('APP_URL') . '/storage/' . $imagePath;
            return ['image'=>$imageName,'image_uri'=>$image_uri];
            }
    }
    public function storeOrUpdate($model,$request)
    {
        $image = $this->imageStoreOrUpdate($request);

                $model->name = $request->name;
                $model->supplier_id = $request->supplier_id;
                 $model->unit_id = $request->unit_id;
                $model->category_id = $request->category_id;
                 $model->quantity = '0';
                 if($request->hasFile('product_image')){
                
                    $model->image= $image['image'];
                    $model->image_uri= $image['image_uri'];
                 }

                
                $model->created_by = Auth::user()->id;
                $model->created_at = Carbon::now();

           
           
        }
   

    public function productAll()
    {
        $products = Product::latest()->get();
        // dd($products);
        /* $relationShipProduct = Product::has('supplier','unit')->with('supplier')->get();
        dd($relationShipProduct); */
        return view('backend.product.product_all', compact('products'));
    }

   public function productAdd()
   {
    $units = Unit::where(['status'=>1])->get();
    $categories = Category::where(['status'=>1])->get();
    $suppliers = Supplier::where(['status'=>1])->get();

    return view('backend.product.product_add', compact('units','categories','suppliers'));
   }

public function productStore(Request $request)
{
    $product = new Product();
    // $storeData =;

    $this->storeOrUpdate($product,$request);

    if($product->save()){
        $notice = [
            'alert-type'=>'success',
            'message'=>'Product Data Insterted Successfully',
        ];
    }
    else{
        $notice = [
            'alert-type'=>'error',
            'message'=>'Product Inserted in failed',
        ];

    }

    return redirect()->route('product.all')->with($notice);

}

public function productEdit($id)
{
    $units = Unit::where(['status'=>1])->get();
    $categories = Category::where(['status'=>1])->get();
    $suppliers = Supplier::where(['status'=>1])->get();
    $editProducts = Product::findOrFail($id);

    return view('backend.product.product_add',compact('units','categories','suppliers','editProducts'));

}

public function productUpdate(Request $request,Product $update)
{
  
    $model = $update;
 
//    dd($model);

    $model->name = $request->name;
    $model->supplier_id = $request->supplier_id;
     $model->unit_id = $request->unit_id;
    $model->category_id = $request->category_id;
    $model->quantity = '0';
    $oldImage = $request->old_image;
    $path = 'product/' . $oldImage;
    // $image = $this->imageStoreOrUpdate($request);
     if($request->hasFile('product_image')){
    
        if(Storage::disk('public')->exists($path)){
        Storage::disk('public')->delete($path);
        }

        $extension = $request->file('product_image')->extension();
        $imageName = 'product-' . mt_rand(1000,9999) . '.'. $extension;
        $imagePath = $request->product_image->storeAs('product/',$imageName,'public');
        $image_uri = env('APP_URL') . '/storage/' . $imagePath;
      $model->image = $imageName;
      $model->image_uri = $image_uri;
    }
   

    $model->created_by = Auth::user()->id;
    $model->updated_at = Carbon::now();
// dd($model);
    if($model->save()){
        $notice = [
            'alert-type'=>'success',
            'message'=>'Product Data Updated Successfully',
        ];
    }
    else{
        $notice = [
            'alert-type'=>'error',
            'message'=>'Product Updated in fail',
        ];

    }

    return redirect('/allProducts')->with($notice);

}

public function productDelete($id)
{
    $productModel = Product::findOrFail($id);
// dd($oldImage);
$oldImage = Product::select('image')->where('id',$id)->first();
$path = 'product/' . $oldImage->image;
//  dd($path);
    if(Storage::disk('public')->exists($path)){
    Storage::disk('public')->delete($path);
    }

    $isDelete = $productModel->delete();
    if($isDelete){
        $notice = [
            'alert-type'=>'success',
            'message'=>'Product Data Deleted Successfully',
        ];
    }
    else{
        $notice = [
            'alert-type'=>'error',
            'message'=>'Product Not Deleted',
        ];
}

return redirect()->back()->with($notice);

}

public function status($status,$id)
    {
        $model = Product::findOrFail($id);
        $model->status = $status;
        if($model->save()){

            $notice = ['message'=>'You Have Changed Status','alert-type'=>'warning'];
        }
        return redirect()->back()->with($notice);
    }

}
