@extends('admin.admin_master')

@section('admin-content')

<div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-10">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="{{$adminModel->profile_image ? url('uploads/admin_images/'. $adminModel->profile_image) : url('uploads/default-user.png')}}" width="100" class="rounded-circle">
                </div>
               {{--  {{asset('uploads/admin_images/{{$adminModel->profile_image}}')}} --}}
               {{-- {{asset('uploads/admin_images/profile-2022-10-27-1654.png')}} --}}
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">User Profile</span>
                    <h5 class="mt-2 mb-0">{{$adminModel->name}}</h5>
                    <span>{{$adminModel->email}}</span>
                    
                    <div class="px-4 mt-1">
                        <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    
                    </div>
                    
                     <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                    
                    
                        
                        {{-- <button class="btn btn-outline-primary px-4">Message</button> --}}
                       <a href="{{route('admin.profile.edit',$adminModel->id)}}"> <button class="btn btn-submit me-2">Edit Profile</button></a>
                    
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</div>


{{-- <div class="content">
    <div class="page-header">
    <div class="page-title">
    <h4>Profile</h4>
    <h6>User Profile</h6>
    </div>
    </div>
    
    <div class="card">
    <div class="card-body">
    <div class="profile-set">
    <div class="profile-head">
    </div>
    <div class="profile-top">
    <div class="profile-content">
    <div class="profile-contentimg">
    <img src="assets/img/customer/customer5.jpg" alt="img" id="blah">
    <div class="profileupload">
    <input type="file" id="imgInp">
    <a href="javascript:void(0);"><img src="{{asset('backend/assets/img/profiles/avator1.jpg')}}" alt="img" width="200" height="200"></a>
    </div>
    </div>
    <div class="profile-contentname">
    <h2>{{$adminModel->name}}</h2>
    <p>{{$adminModel->email}}</p>
    <h4>Updates Your Photo and Personal Details.</h4>
    </div>
    </div>
    <div class="ms-auto">
    <a href="javascript:void(0);" class="btn btn-submit me-2">Save</a>
    <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>First Name</label>
    <input type="text" placeholder="William">
    </div>
    </div>
    <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>Last Name</label>
    <input type="text" value="{{$adminModel->name}}" placeholder="">
    </div>
    </div>
    <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>Email</label>
    <input type="text" placeholder="william@example.com">
    </div>
    </div>
    <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>Phone</label>
    <input type="text" placeholder="+1452 876 5432">
    </div>
    </div>
    <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>User Name</label>
    <input type="text" placeholder="+1452 876 5432">
    </div>
    </div>
    <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>Password</label>
    <div class="pass-group">
    <input type="text" class=" pass-input">
    <span class="fas toggle-password fa-eye"></span>
    </div>
    </div>
    </div>
    <div class="col-12">
    <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
    <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
    </div>
    </div>
    </div>
    </div>
    
    </div>

 --}}
 
 @endsection