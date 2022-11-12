<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getCategory(Request $request)
    {
 
$supplier_id = $request->supplier_id;
// dd($supplier_id);
       $allCategories = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
    //    dd($allCategories);
    return response()->json($allCategories);

    }

    public function getProduct(Request $request)
    {
       $category_id = $request->category_id;
    //    dd($category_id);

    $allProducts = Product::select('id','name')->where('category_id',$category_id)->get();
    // dd($allProducts);
    return response($allProducts);
    // dd($data);
    }

    public function getStock(Request $request)
    {
        $product_id = $request->product_id;
        $stock = Product::where('id', $product_id)->first()->quantity;
        return response($stock);
    }

}
