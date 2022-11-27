@extends('admin.admin_master')
@section('admin-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Daily Invoice Report </h4><br><br>

<form method="get" action="{{ route('invoice.daily.report.pdf') }}" target="_blank" id="myForm">
    @csrf
    <div class="row">


        <div class="col-md-5">
            <div class="md-3 form-group">
                <label for="example-text-input" class="form-label">Start Date</label>
                 <input class="form-control example-date-input" name="start_date" type="date"  id="start_date" placeholder="YY-MM-DD">
            </div>
        </div>


        <div class="col-md-5">
            <div class="md-3 form-group">
                <label for="example-text-input" class="form-label">End Date</label>
                 <input class="form-control example-date-input" name="end_date" type="date"  id="end_date" placeholder="YY-MM-DD">
            </div>
        </div>

         <div class="col-md-2">
            <div class="page-btn">
                <button type="submit" style="background-color: #1a2751;color:white" class="btn m-4">
                 search
                </button>
            </div>

        </div>



    </div> <!-- // end row  -->

    </form>

        </div> <!-- End card-body -->



    </div>
</div> <!-- end col -->
</div>


</div>
</div>

<script>
       $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                start_date: {
                    required : true,
                },
                 end_date: {
                    required : true,
                },

            },
            messages :{
                start_date: {
                    required : 'Please Enter a Start date',
                },
                end_date: {
                    required : 'Please Enter End Date',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    })
</script>
@endsection
