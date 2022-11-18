@extends('admin.admin_master')

@section('admin-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content ">
    <div class="page-header">
        <div class="page-title">
            <h4>Stock list</h4>
            <h6>supplier/Product Stock</h6>
        </div>
        <div class="page-btn">
            <a href="{{ route('stock.report.pdf') }}" class="btn btn-added">
                <i class="fa fa-plus"> </i> &nbsp; Supplier and Product Wise Report
            </a>
        </div>
    </div>


    

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <strong> Supplier Wise Report </strong>
                            <input type="radio" name="product_supplier_wise" value="supplier_wise" id="supplier_wise" class="search_value"> &nbsp;&nbsp;
                
                
                            <strong> Product Wise Report </strong>
                            <input type="radio" id="product_wise" name="product_supplier_wise" value="product_wise" class="search_value">
                
                
                        </div>        
                    </div> <!-- // end row  -->

                    {{-- Show Product wise Stock by click radio button --}}
                    <div class="show_supplier" style="display:none">
                        <form method="GET" action="{{ route('supplier.wise.pdf') }}" id="myForm" target="_blank" >

                            <div class="row">
                                <div class="col-sm-8 form-group">
                                    <label>Supplier Name </label>
                              <select name="supplier_id" class="form-select select2"  >
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                               @endforeach
                                </select>                    
                                </div>
                
                                <div class="col-sm-4" style="padding-top: 28px;">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                                
                            </div>

                        </form>
                    </div>
                                    

{{-- Show Products By category by click radio --}}
<!--  /// Product Wise  -->
<div class="show_product" style="display:none; ">
    <form method="GET" action="{{ route('product.wise.pdf') }}" id="myForm" target="_blank" >

        <div class="row">

           <div class="col-md-4">
        <div class="md-3">
            <label for="example-text-input" class="form-label">Category Name </label>
            <select name="category_id" id="category_id" class="form-select select2" aria-label="Default select example">
            <option  value="">Open this select menu</option>
              @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
           @endforeach
            </select>
        </div>
    </div>


     <div class="col-md-4">
        <div class="md-3">
            <label for="example-text-input" class="form-label">Product Name </label>
            <select name="product_id" id="product_id" class="form-select select2" aria-label="Default select example">
            <option value="">Open this select menu</option>
           
            </select>
        </div>
    </div>

            <div class="col-sm-4" style="padding-top: 28px;">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
            
        </div>
        
    </form>
    
</div>
<!--  /// End Product Wise  -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div>


<script>
      $(document).ready(function (){
        $('#myForm').validate({
            rules: {
               
                 supplier_id: {
                    required : true,
                },
                 
                 category_id: {
                    required : true,
                },
                 product_id: {
                    required : true,
                },
            },
            messages :{
               
                supplier_id: {
                    required : 'Please Select One Supplier',
                },
               
                category_id: {
                    required : 'Please Select One Category',
                },
                product_id: {
                    required : 'Please Select One Product',
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
   
   $(function(){
    $(document).on('change','#category_id', function(){
        let category_id = $(this).val();
       
        $.ajax({
            url:"{{ route('get-product') }}",
            type:'GET',
            data:{category_id:category_id},
            success: function(response){
                console.log(response);
                var html = '<option value="">Select One Category</option>';
                $.each(response,function(key,value){
                    html+= `<option value="${value.id}">${value.name}</option>`;
                });
                $('#product_id').html(html);
            }
        })
    })
   })

</script>

<script>
    /* Show Supplier or Product by Condition */
$(document).on('change','.search_value', function(){
    var value = $(this).val();
    if(value == 'product_wise'){
        $('.show_product').show()
    }
    else{
        $('.show_product').hide()
    }
if(value == 'supplier_wise'){
    $('.show_supplier').show()
}
else{
    $('.show_supplier').hide()
}
})
</script>


@endsection
