@extends('admin.admin_master')
@section('admin-content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Customer Page </h4><br><br>


                     @if (isset($editCustomer))
    

                        <form id="CustomerForm" method="post" action="{{ route('customer.update') }}" enctype="multipart/form-data">

                            @csrf

                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $editCustomer->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name </label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" value="{{ $editCustomer->name }}" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Mobile </label>
                                <div class="form-group col-sm-10">
                                    <input name="mobile_no" value="{{ $editCustomer->mobile_no }}" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Email </label>
                                <div class="form-group col-sm-10">
                                    <input name="email" class="form-control" value="{{ $editCustomer->email }}" type="email">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Address
                                </label>
                                <div class="form-group col-sm-10">
                                    <input name="address" value="{{ $editCustomer->address }}" class="form-control" type="text">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image
                                </label>
                                <div class="form-group col-sm-10">
                                    <input id="customerImgFile" name="customer_image" class="form-control" type="file">
                                   <img id="customerShowImg" src="{{ $editCustomer->customer_img_uri }}" width="100" height="100" alt="">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="col-lg-12">
                                <label class="col-sm-2 col-form-label"> </label>
                                <button type="submit" class="btn btn-submit me-2">Update</button>

                                <a href="{{ route('customer.all') }}" class="btn btn-cancel">Cancel</a>
                                </div>

                        </form>

                        @else
    

                        <form id="CustomerForm" method="post" action="{{ route('customer.store') }}" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name </label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Mobile </label>
                                <div class="form-group col-sm-10">
                                    <input name="mobile_no" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Email </label>
                                <div class="form-group col-sm-10">
                                    <input name="email" class="form-control" type="email">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Address
                                </label>
                                <div class="form-group col-sm-10">
                                    <input name="address" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image
                                </label>
                                <div class="form-group col-sm-10">
                                    <input id="customerImgFile" name="customer_image" class="form-control" type="file">
                                    
                                   <img id="customerShowImg" src="https://t4.ftcdn.net/jpg/05/07/58/41/360_F_507584110_KNIfe7d3hUAEpraq10J7MCPmtny8EH7A.jpg" width="100" height="100" alt="">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="col-lg-12">
                                <label class="col-sm-2 col-form-label"> </label>
                                <button type="submit" class="btn btn-submit me-2">Submit</button>

                                <a href="{{ route('customer.all') }}" class="btn btn-cancel">Cancel</a>
                                </div>

                        </form>

                        @endif
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>


@push('customIs')
@if (isset($editCustomer))
    

<script type="text/javascript">
    $(document).ready(function (){
        $('#CustomerForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 mobile_no: {
                    required : true,
                },
                 email: {
                    required : true,
                },
                 address: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },
                mobile_no: {
                    required : 'Please Enter Your Mobile Number',
                },
                email: {
                    required : 'Please Enter Your Email',
                },
                address: {
                    required : 'Please Enter Your Address',
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

        /* This Is Live Show Image while uploading */
        $('#customerImgFile').change(function(e){
e.preventDefault();
var reader = new FileReader();
reader.onload = function(e){
    $('#customerShowImg').attr('src',e.target.result);
}
reader.readAsDataURL(e.target.files['0']);
            })

    });
    
</script>
@else

<script type="text/javascript">
    $(document).ready(function (){
        $('#CustomerForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 mobile_no: {
                    required : true,
                },
                 email: {
                    required : true,
                },
                 address: {
                    required : true,
                },
                customer_image:{
                    required:true,
                }
            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },
                mobile_no: {
                    required : 'Please Enter Your Mobile Number',
                },
                email: {
                    required : 'Please Enter Your Email',
                },
                address: {
                    required : 'Please Enter Your Address',
                },
                customer_image:{
                    required:"Please upload Customer Image",
                }
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

        /* This Is Live Show Image while uploading */
        $('#customerImgFile').change(function(e){
e.preventDefault();
var reader = new FileReader();
reader.onload = function(e){
    $('#customerShowImg').attr('src',e.target.result);
}
reader.readAsDataURL(e.target.files['0']);
            })

    });
    
</script>

@endif

@endpush

@endsection