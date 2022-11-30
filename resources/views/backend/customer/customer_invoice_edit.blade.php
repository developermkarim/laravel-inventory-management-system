@extends('admin.admin_master')
@section('admin-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <div class="page-content print-container">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Invoice</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                            <li class="breadcrumb-item active">Invoice</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
    <div class="row">
        <div class="col-12">
            <div class="invoice-title">

                <h4 class="float-end font-size-16"> <a href="{{ route('customer.credit') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-list"> Back </i></a> </h4>


                   <h3>

                    <strong>Invoice No # {{ $payment->invoice->invoice_no }}</strong>
                    
                    </h3>
                
            </div>
            <hr>
             
            <div class="row">
                <div class="col-6 mt-4">
                    <address>
                        <strong>GROCERY STORE:</strong><br>
                        Purana Palton Dhaka<br>
                        support@easylearningbd.com
                    </address>
                </div>
                <div class="col-6 mt-4 text-end">
                    <address>
                        <strong>Invoice Date:</strong><br>
                         {{ date('d-m-Y',strtotime($payment->invoice->date)) }} <br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

      {{--  @php
    $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
    @endphp    --}}

    <div class="row">
        <div class="col-12">
            <div>
                <div class="p-2">
                    <h3 class="font-size-16"><strong>Customer Invoice</strong></h3>
                </div>
                <div class="">
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td><strong>Customer Name </strong></td>
            <td class="text-center"><strong>Customer Mobile</strong></td>
            <td class="text-center"><strong>Address</strong>
            </td>
           
            
        </tr>
        </thead>
        <tbody>
        <!-- foreach ($order->lineItems as $line) or some such thing here -->
        <tr>
            <td> {{ $payment['customer']['name'] }}</td>
            <td class="text-center">{{ $payment['customer']['mobile_no']  }}</td>
            <td class="text-center">{{ $payment['customer']['email']  }}</td>
            {{--  <td class="text-center">{{ $invoice->description  }}</td> --}}
            
        </tr>
        
                            
                            </tbody>
                        </table>
                    </div>

                  
                </div>
            </div>

        </div>
    </div> <!-- end row -->





   <div class="row">
        <div class="col-12">
            <div>
                <div class="p-2">
                     
                </div>
                <div class="">
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td><strong>Sl </strong></td>
            <td class="text-center"><strong>Category</strong></td>
            <td class="text-center"><strong>Product Name</strong>
            </td>
            <td class="text-center"><strong>Current Stock</strong>
            </td>
            <td class="text-center"><strong>Quantity</strong>
            </td>
            <td class="text-center"><strong>Unit Price </strong>
            </td>
            <td class="text-center"><strong>Total Price</strong>
            </td>
            
        </tr>
        </thead>
        <tbody>
        <!-- foreach ($order->lineItems as $line) or some such thing here -->
        
      @php
        $total_sum = '0';

        $invoice_detail = App\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
        // dd($invoice_detail);
        @endphp
        @foreach($invoice_detail as $key => $details)
        <tr>
           <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $details['category']['name'] }}</td>
            <td class="text-center">{{ $details['product']['name'] }}</td>
            <td class="text-center">{{ $details['product']['quantity'] }}</td>
            <td class="text-center">{{ $details->selling_qty }}</td>
            <td class="text-center">{{ $details->unit_price }}</td>
            <td class="text-center">{{ $details->selling_price }}</td>
            
        </tr>
         @php
        $total_sum += $details->selling_price;
        @endphp
        @endforeach
            <tr>
                <td class="thick-line"></td>
                <td class="thick-line"></td>
                <td class="thick-line"></td>
                <td class="thick-line"></td>
                <td class="thick-line"></td>
                <td class="thick-line text-center">
                    <strong>Subtotal</strong></td>
                <td class="thick-line text-end">${{ $total_sum }}</td>
            </tr>
            <tr>
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line text-center">
                    <strong>Discount Amount</strong></td>
                <td class="no-line text-end">${{ $payment->discount_amount }}</td>
            </tr>
             <tr>
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line text-center">
                    <strong>Paid Amount</strong></td>
                <td class="no-line text-end">${{ $payment->paid_amount }}</td>
            </tr>

             <tr>
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line text-center">
                    <strong>Due Amount</strong></td>
                <td class="no-line text-end">${{ $payment->due_amount }}</td>
            </tr>
            <tr>
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line text-center">
                    <strong>Grand Amount</strong></td>
                <td class="no-line text-end"><h4 class="m-0">${{ $payment->total_amount }}</h4></td>
            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div> <!-- end row -->




{{-- Customer Payment Update --}}


<form action="{{ route('customer.credit.update',$payment->invoice_id) }}" method="post">
    @csrf
    @method('PUT')      
    <div class="row">
    <div class="form-group col-md-3">

        {{-- Hidden INput of Due amount  --}}
        <input type="hidden" name="new_paid_amount" value="{{ $payment->due_amount }}">

          <label> Paid Status </label>
            <select name="paid_status" id="paid_status" class="form-select">
                <option value="">Select Status </option>
                <option value="full_paid">Full Paid </option> 
                <option value="partial_paid">Partial Paid </option>
                
            </select>
<input type="text" name="paid_amount" class="form-control paid_amount" placeholder="Enter Paid Amount" style="display:none;">
    </div>


    <div class="form-group col-md-3">
        <div class="md-3">
        <label for="example-text-input" class="form-label">Date</label>
         <input class="form-control example-date-input" placeholder="YYYY-MM-DD"  name="date" type="date"  id="date">
    </div>
    </div>

    <div class="form-group col-md-3">
         <div class="md-3" style="padding-top: 30px;">
          
        <button type="submit" class="btn btn-submit me-2">Invoice Update</button>
    </div>
        
    </div>

</div>
</form>

</div>
</div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>


                <script>

                    $(document).on('change','#paid_status', function(){
                        var value = $('#paid_status').val();
                        // var value = $("input:name").val();
                        if(value === 'partial_paid'){
                            $('.paid_amount').show();
                        }
                       
                        else{
                            $('.paid_amount').hide()
                        }
                       
                       
                    });

                    
                </script>

@endsection
