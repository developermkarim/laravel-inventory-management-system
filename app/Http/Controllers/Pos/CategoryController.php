<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function categoryAll()
    {
    $categorys = Category::latest()->get();
     return view('backend.category.category_all',compact('categorys'));
    }
    
    public function categoryAdd()
    {
     
     return view('backend.category.category_add');
    }
    public function categoryStore(Request $request)
    {
    
     Category::insert([
         'name'=>$request->name,
         'created_by'=>Auth::user()->id,
         'created_at'=> Carbon::now(),
     ]);
    
     $notification = [
         'message'=>'Category added Successfully',
         'alert-type'=>'success',
     ];
    
     return redirect()->route('category.all')->with($notification);
    
    }
    
    public function categoryEdit($id)
    {
     $editCategory = Category::findOrFail($id);
     // dd($editSupply);
     return view('backend.category.category_add',compact('editCategory'));
    }
    
    public function categoryUpdate(Request $request)
    {
     $updateId = $request->id;
     Category::findOrFail($updateId)->update([
         'name'=>$request->name,
         'updated_by' => Auth::user()->id,
         'updated_at' => Carbon::now(),
     ]);
     $notice = [
         'message'=>'Category Information Updated',
         'alert-type'=>'success',
     ];
    
     return redirect('/allCategories')->with($notice);
    }
    
    public function categoryDelete($id)
    {
      Category::findOrFail($id)->delete();
      $deleteMsg = ['message'=>'Delete Successfully'];
      return redirect('/allCategories')->with($deleteMsg);
    }


    public function status($status,$id)
    {
        $model = Category::findOrFail($id);
        $model->status = $status;
        if($model->save()){

            $notice = ['message'=>'You Have Changed Status','alert-type'=>'warning'];
        }
        return redirect()->back()->with($notice);
    }
    
}
