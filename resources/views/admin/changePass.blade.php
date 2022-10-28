@extends('admin.admin_master')

@section('admin-content')


<div class="container">
	<div class="row ">
        <h2 class="text-center">Change Password</h2>
		<div class="col-sm-6 m-auto">
		    
            <form action="" method="POST" class="">
          
		    <label>Current Password</label>
		    <div class="form-group pass_show"> 
                <input type="password" value="faisalkhan@123" class="form-control" placeholder="Current Password"> 
            </div> 
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="password" value="faisal.khan@123" class="form-control" placeholder="New Password"> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="password" value="faisal.khan@123" class="form-control" placeholder="Confirm Password"> 
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