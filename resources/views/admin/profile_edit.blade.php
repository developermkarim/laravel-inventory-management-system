@extends('admin.admin_master')

@section('admin-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">
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
    {{-- <div class="profileupload">
    <input type="file" id="imgInp">
    <a href="javascript:void(0);"> --}}
        <img  src="{{asset('backend/assets/img/profiles/mkarim.png')}}" width="100" height="100" alt="img">
    {{-- </a> --}}
    </div>
    </div>
    <div class="profile-contentname">
    <h2>William Castillo</h2>
    <h4>Updates Your Photo and Personal Details.</h4>
    </div>
    </div>
    <div class="ms-auto">
    <a href="javascript:void(0);" class="btn btn-submit me-2">Save</a>
    <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
    </div>
    </div>
    </div>
    <form action="{{route('admin.profile.update',$userData->id)}}" method="POST" enctype="multipart/form-data">
        $@csrf
        @method('PUT')
    <div class="row">
    <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>Full Name</label>
    <input type="text" id="name" name="name" value="{{$userData->name}}">
    @error('name')
        <p class="text-danger">{{$message}}</p>
    @enderror
    </div>
    </div>
    <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>User Name</label>
    <input type="text" value="{{$userData->username}}" id="username" name="username">
    </div>
    </div>
    <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>Email</label>
    <input type="text" id="email" name="email" value="{{$userData->email}}">
    </div>
    </div>
    <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>Profile Image</label>
    <input type="file" id="profile" name="profile_image">
    
    </div>
    <img  id="showImage" src="{{asset('backend/assets/img/profiles/mkarim.png')}}" width="100" height="100" alt="img">
    </div>
    {{-- <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>Phone</label>
    <input type="text" placeholder="+1452 876 5432">
    </div>
    </div> --}}
    {{-- <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>User Name</label>
    <input type="text" placeholder="+1452 876 5432">
    </div>
    </div> --}}
    {{-- <div class="col-lg-6 col-sm-12">
    <div class="form-group">
    <label>Password</label>
    <div class="pass-group">
    <input type="password" class=" pass-input">
    <span class="fas toggle-password fa-eye-slash"></span>
    </div>
    </div>
    </div> --}}
    <div class="col-12">
    <button type="submit" class="btn btn-submit me-2">Submit</button>
    <a href="{{route('admin.profile')}}" class="btn btn-cancel">Cancel</a>
    </div>
    </div>
</form>

    </div>
    </div>
    
    </div>
{{-- @push('customIs') --}}
    

    <script type="text/javascript">
        
$(document).ready(function(){
 $('#profile').change(function(e){
e.preventDefault();
var reader = new FileReader();
reader.onload = function(e){
    $('#showImage').attr('src',e.target.result);
}
reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
    {{-- @endpush --}}
    @endsection