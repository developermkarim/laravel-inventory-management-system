<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function unitAll()
    {
    $units = Unit::latest()->get();
     return view('backend.unit.unit_all',compact('units'));
    }
    
    public function unitAdd()
    {
     
     return view('backend.unit.unit_add');
    }
    public function unitStore(Request $request)
    {
    
     Unit::insert([
         'name'=>$request->name,
         'created_by'=>Auth::user()->id,
         'created_at'=> Carbon::now(),
     ]);
    
     $notification = [
         'message'=>'Unit added Successfully',
         'alert-type'=>'success',
     ];
    
     return redirect()->route('unit.all')->with($notification);
    
    }
    
    public function unitEdit($id)
    {
     $editUnit = Unit::findOrFail($id);
     // dd($editSupply);
     return view('backend.unit.unit_add',compact('editUnit'));
    }
    
    public function unitUpdate(Request $request)
    {
     $updateId = $request->id;
     Unit::findOrFail($updateId)->update([
         'name'=>$request->name,
         'updated_by' => Auth::user()->id,
         'updated_at' => Carbon::now(),
     ]);
     $notice = [
         'message'=>'Unit Information Updated',
         'alert-type'=>'success',
     ];
    
     return redirect('/allUnits')->with($notice);
    }
    
    public function unitDelete($id)
    {
      Unit::findOrFail($id)->delete();
      $deleteMsg = ['message'=>'Delete Successfully','alert-type'=>'success'];
      return redirect('/allUnits')->with($deleteMsg);
    }

    public function status($status,$id)
    {
        $model = Unit::find($id);
        $model->status = $status;

        if($model->save()){
            $statusChange = ['message'=>'Alert! You have Changed Status','alert-type'=>'warning'];
        }

        return redirect()->back()->with($statusChange);
    }
    
}
