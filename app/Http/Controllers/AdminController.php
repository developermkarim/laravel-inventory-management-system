<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function profile()
    {
        $id = Auth::user()->id;
    //   $profile_image = Auth::user()->profile_image;
    //   dd($profile_image);
        $adminModel = User::find($id);
       
        return view('admin.admin_profile',compact('adminModel'));
    }

    public function profileEdit($id)
    {
        // echo $id;
        $userData = User::find($id);
        // dd($userData);
        return view('admin.profile_edit',compact('userData'));
    }


    public function profileUpdate(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|min:5|max:50',
            'email' =>'required|email',
            'username'=>'required|min:4|max:20',
        ],
    [
        'name' =>"name must be between 5 to 50 characters",
        'email'=>'email is can\'t be duplicated',
        'username'=>'username must be between 5 to 50 characters',
    ]);

        $userModel = User::find($id);
        $userModel->name = $request->name;
        $userModel->username = $request->username;
        $userModel->email = $request->email;
        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $fileName = 'profile-'. date('Y-m-d-Hi')  . '.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/admin_images'),$fileName);
            $userModel['profile_image'] = $fileName;
        }

        $userModel->update();

        /* toaster Message Notification */

        $notification = [
            'message' => 'Admin Profile Updated Successfully',
            'alert-type'=>'success',
             
        ];

        return redirect()->route('admin.profile')->with($notification);

    }

    public function passwordChange()
    {
        // return 'this is password change';
        return view('admin.changePass');
    }

    public function destroy(Request $request)
    {
        $notification = [
            'message' => 'User logged out successfully',
            'alert-type'=>'success',
             
        ];

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with($notification);

        /* End Method */
    }
}
