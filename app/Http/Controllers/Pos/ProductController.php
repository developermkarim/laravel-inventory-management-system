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

class ProductController extends Controller
{
    public function storeOrUpdate($request)
    {
             $data = [
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 
        ];
        return $data;
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
    $units = Unit::all();
    $categories = Category::all();
    $suppliers = Supplier::all();

    return view('backend.product.product_add', compact('units','categories','suppliers'));
   }

public function productStore(Request $request)
{
    // $product_id = $request->id;
    $storeData = $this->storeOrUpdate($request);

    $products = Product::insert($storeData);

    if($products){
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
    $units = Unit::all();
    $categories = Category::all();
    $suppliers = Supplier::all();
    $editProducts = Product::findOrFail($id);

    return view('backend.product.product_add',compact('units','categories','suppliers','editProducts'));

}

public function productUpdate(Request $request)
{
    $product_id = $request->id;
    $storeData = $this->storeOrUpdate($request);

    $products = Product::findOrFail($product_id)->update($storeData);

    if($products){
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

}
