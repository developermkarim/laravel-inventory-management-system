@extends('admin.admin_master')
@section('admin-content')


@php
$payment = \App\Models\Payment::where('invoice_id',$invoice->id)->first();
// print_r($payment['customer']['name']);
@endphp


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Inovice Approve</h4>



                                </div>
                            </div>
                        </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Invoice No: #{{ $invoice->invoice_no }} - {{  date('d-m-Y',strtotime($invoice->date))  }}</h4>
{{-- <h4>Invoice No: #{{ $invoice->invoice_no }} - {{ date('d-m-Y',strtotime($invoice->date)) }} </h4> --}}
    <a href="" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-list"> Pending Invoice List </i></a> <br>  <br>

     <table style="background-color: #1B2850;color:white" class="table-dark" width="100%">
        <tbody>
            <tr>
                <td><p> Customer Info </p></td>
                <td><p> Name: <strong> {{ $payment['customer']['name'] }} </strong> </p></td>
                <td><p> Mobile: <strong> {{ $payment['customer']['mobile_no'] }} </strong> </p></td>
               <td><p> Email: <strong> {{ $payment['customer']['email'] }} </strong> </p></td>
            </tr>

             <tr>
             <td></td>
              <td colspan="3"><p> Description : <strong>{{ $invoice->description }}  </strong> </p></td>
             </tr>
        </tbody>

     </table>


     <form method="post" action="{{ route('invoice.approve.store',$invoice->id) }}">
      @csrf
         <table border="1"  class="table table-success" width="100%">
            <thead>
                <tr>
                    <th class="text-center">Sl</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center" >Current Stock</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Unit Price </th>
                    <th class="text-center">Total Price</th>
                </tr>
                <tbody>
                    @php
            $total_sum = '0';
                    @endphp
                @foreach ($invoice['invoice_details'] as $key => $detail )
                    <tr>
                        {{-- This is Hidden inputs for backend programm .As these have multiple values of invoice_details table ,so name value is with [] array--}}
                        <input type="hidden" name="category_id[]" value="{{ $detail->category_id }}">
                        <input type="hidden" name="product_id[]" value="{{ $detail->product_id }}">
                        <input type="hidden" name="selling_qty[{{ $detail->id }}]" value="{{ $detail->selling_qty }}">
                       

                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="text-center">{{ $detail['category'] ? $detail['category']['name']:'No Name' }}</td>
                        <td class="text-center">{{ $detail['product']['name'] }}</td>

                        <td style="background-color: #1B2850;color:white" class="text-center">{{ $detail['product']['quantity'] }}</td>
                        <td style="background-color: #1B2850;color:white" class="text-center" >{{ $detail->selling_qty }}</td>
                        <td class="text-center">{{ $detail->unit_price }}</td>
                        <td class="text-center">{{$detail->selling_price }}</td>
                    </tr>

                    @php
                        $total_sum+=$detail->selling_price;

                    @endphp

                    @endforeach
                    {{-- This tr for Total calculation of INvoice details.Per Invoice hase may product selling by invoice_details.The Invoice details table records the sales--}}
                    <tr>
                        <td colspan="6"> Sub Total </td>

                        <td>{{ $total_sum }}</td>
                    </tr>
                     <tr>
                        <td colspan="6"> Discount </td>

                        <td>{{ $payment->discount_amount }}</td>
                    </tr>

                     <tr>
                        <td colspan="6"> Paid Amount </td>
                         <td > {{ $payment->paid_amount }} </td>
                    </tr>

                     <tr>
                        <td colspan="6"> Due Amount </td>
                         <td > {{ $payment->due_amount }}  </td>
                    </tr>

                    <tr>
                        <td colspan="6"> Grand Amount </td>
                         <td > {{ $payment->total_amount }} </td>
                    </tr>
                </tbody>

            </thead>


         </table>

         <div class="col-lg-12 mt-2">
            <button type="submit" class="btn btn-submit me-2">Invoice Store</button>
            <a href="{{ route('invoice.pending_list') }}" class="btn btn-cancel">Cancel</a>
            </div>

     </form>



                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection
