@extends('admin.admin_master')
@section('admin-content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add Product Page </h4><br><br>
            
  @if (!isset($editProducts))
      
 <form method="post" action="{{ route('product.store') }}" id="myForm" >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Product Name </label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Supplier Name </label>
        <div class="col-sm-10">
            <select name="supplier_id" class="form-select" aria-label="Default select example">
                <option selected="">Open this select menu</option>
                @foreach($suppliers as $supp)
                <option value="{{ $supp->id }}">{{ $supp->name }}</option>
               @endforeach
                </select>
        </div>
    </div>
  <!-- end row -->

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Unit Name </label>
        <div class="col-sm-10">
            <select name="unit_id" class="form-select" aria-label="Default select example">
                <option selected="">Open this select menu</option>
                @foreach($units as $uni)
                <option value="{{ $uni->id }}">{{ $uni->name }}</option>
               @endforeach
                </select>
        </div>
    </div> 
  <!-- end row -->



      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Category Name </label>
        <div class="col-sm-10">
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option selected="">Open this select menu</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
               @endforeach
                </select>
        </div>
    </div>
  <!-- end row -->
 
        
  <div class="col-lg-12">
    <label class="col-sm-2 col-form-label"> </label>
    <button type="submit" class="btn btn-submit me-2">Submit</button>

    <a href="{{ route('product.all') }}" class="btn btn-cancel">Cancel</a>
    </div>
    
    </form>
             
           @else

           <form method="post" action="{{ route('product.update') }}" id="myForm" >
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $editProducts->id }}">
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Product Name </label>
            <div class="form-group col-sm-10">
                <input name="name" class="form-control" type="text"  value="{{ $editProducts->name }}"  >
            </div>
        </div>
        <!-- end row -->


        <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Supplier Name </label>
    <div class="col-sm-10">
        <select name="supplier_id" class="form-select" aria-label="Default select example">
            <option selected="">Open this select menu</option>
            @foreach($suppliers as $supp)
            <option {{ $supp->id == $editProducts->supplier_id ? 'selected':'' }} value="{{ $supp->id }}">{{ $supp->name }}</option>
           @endforeach
            </select>
    </div>
</div>
<!-- end row -->

  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Unit Name </label>
    <div class="col-sm-10">
        <select name="unit_id" class="form-select" aria-label="Default select example">
            <option selected="">Open this select menu</option>
            @foreach($units as $uni)
            <option {{ $uni->id == $editProducts->unit_id ? 'selected':'' }} value="{{ $uni->id }}">{{ $uni->name }}</option>
           @endforeach
            </select>
    </div>
</div> 
<!-- end row -->



  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Category Name </label>
    <div class="col-sm-10">
        <select name="category_id" class="form-select" aria-label="Default select example">
            <option selected="">Open this select menu</option>
            @foreach($categories as $cat)
            <option {{ $cat->id == $editProducts->category_id ? 'selected':"" }} value="{{ $cat->id }}">{{ $cat->name }}</option>
           @endforeach
            </select>
    </div>
</div>
<!-- end row -->

    
<div class="col-lg-12">
<label class="col-sm-2 col-form-label"> </label>
<button type="submit" class="btn btn-submit me-2">Update</button>

<a href="{{ route('product.all') }}" class="btn btn-cancel">Cancel</a>
</div>

</form>
@endif
           
        </div>
    </div>

</div> <!-- end col -->
</div>
 


</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 supplier_id: {
                    required : true,
                },
                 unit_id: {
                    required : true,
                },
                 category_id: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Product Name',
                },
                supplier_id: {
                    required : 'Please Select One Supplier',
                },
                unit_id: {
                    required : 'Please Select One Unit',
                },
                category_id: {
                    required : 'Please Select One Category',
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


 
@endsection 