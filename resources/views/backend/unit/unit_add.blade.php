@extends('admin.admin_master')
@section('admin-content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Supplier Page </h4><br><br>


                     @if (isset($editUnit))
    

                        <form id="myForm" method="post" action="{{ route('unit.update') }}">

                            @csrf

                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $editUnit->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name </label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" value="{{ $editUnit->name }}" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                          
                            <!-- end row -->


                            
                            <!-- end row -->


                           

                            {{-- <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Image
                                </label>
                                <div class="form-group col-sm-10">
                                   <img src="{{ $editUnit->customer_image }}" alt="">
                                    <input name="customer_image" class="form-control" type="file">
                                </div>
                            </div> --}}
                            <!-- end row -->
                            <div class="col-lg-12">
                                <label class="col-sm-2 col-form-label"> </label>
                                <button type="submit" class="btn btn-submit me-2">Update</button>

                                <a href="{{ route('unit.all') }}" class="btn btn-cancel">Cancel</a>
                                </div>

                        </form>

                        @else
    

                        <form id="myForm" method="post" action="{{ route('unit.store') }}">

                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Unit Name </label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                            
                            <!-- end row -->


                           
                            <!-- end row -->



                            {{-- <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Address
                                </label>
                                <div class="form-group col-sm-10">
                                    <input name="customer_image" class="form-control" type="file">
                                </div>
                            </div> --}}
                            <!-- end row -->
                            <div class="col-lg-12">
                                <label class="col-sm-2 col-form-label"> </label>
                                <button type="submit" class="btn btn-submit me-2">Submit</button>

                                <a href="{{ route('unit.all') }}" class="btn btn-cancel">Cancel</a>
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

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
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
    });
    
</script>

@endpush

@endsection