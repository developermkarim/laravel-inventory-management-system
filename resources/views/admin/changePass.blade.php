@extends('admin.admin_master')

@section('admin-content')


<div class="container">
	<div class="row ">
        <h2 class="text-center">Change Password</h2>

        @if (count($errors))
            @foreach ($errors->all() as $error)
                
            <div class="m-auto alert alert-danger w-50 alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
              </div>
               {{--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button> --}}
                </div>
            @endforeach
        @endif
		<div class="col-sm-6 m-auto">
		    

            <form action="{{ route('admin.password.updated') }}" method="POST">
          @csrf
		    <label>Current Password</label>
		    <div class="form-group pass_show"> 
                <input type="password" name="oldPassword" class="form-control" placeholder="Current Password"> 
            </div> 
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="password" name="newPassword"  class="form-control" placeholder="New Password"> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="password" name="confirm_password"  class="form-control" placeholder="Confirm Password"> 
            </div> 
                  <button type="submit" class="btn btn-submit me-2">Change Password</button>
        </form>
		</div>  
	</div>
</div>

@push('customJs')
<script>


$(document).ready(function(){
    $('.pass_show').append('<span class="ptxt">Show</span>');  
    });
      
    
    $(document).on('click','.pass_show .ptxt', function(){ 
    
    $(this).text($(this).text() == "Show" ? "Hide" : "Show"); 
    
    $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 
    
    });  
</script>
    @endpush
@endsection