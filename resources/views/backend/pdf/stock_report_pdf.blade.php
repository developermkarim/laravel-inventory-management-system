@extends('admin.admin_master')
@section('admin-content')
    
<div class="page-content print-container">
    <div class="container-fluid ">

    </div>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="text-center">Stock Report</h4>

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

<h3 class="text-center">
    <img src="{{ asset('backend/assets/img/logo.png') }}" alt="logo" width="80" height="80"/> <span>GROCERY STORE</span> 
</h3>
</div>
<hr>

<div class="row">
<div class="col-8 mt-4">
    <address>
        <strong>GROCERY STORE:</strong><br>
        Purana Palton Dhaka<br>
        support@easylearningbd.com
    </address>
</div>

{{-- <div class="p-2 col-4 mt-4">
    <h5><span>From : </span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<span>To</span></h5>
    
        <span class="p-1 text-white custom-btn">{{ date('d-m-Y',strtotime($startDate)) }}</span> --
        <span class="p-1 text-white custom-btn">{{ date('d-m-Y',strtotime($endDate)) }}</span>
       

</div> --}}

</div>
</div>
</div>






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
<td class="text-center"><strong>Supplier Name</strong></td>
<td class="text-center"><strong>Unit</strong></td>
<td class="text-center"><strong>Category</strong></td>
<td class="text-center"><strong>Product Name</strong>
</td>
<td class="text-center"><strong>In Quantity</strong>
</td>
<td class="text-center"><strong>Out Quantity</strong>
</td>

<td class="text-center"><strong>Stock (Current)</strong>
</td>

</tr>
</thead>
<tbody>
<!-- foreach ($order->lineItems as $line) or some such thing here -->

                       @foreach($allData as $key => $item)
                  
                   @php
                       $buying_qty = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
                       $selling_qty = App\Models\InvoiceDetail::where('category_id', $item->category_id)->where('product_id',$item->id)->where('status',1)->sum('selling_qty');
                   @endphp    
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $item->name }} </td>
                                <td>{{ $item['supplier']['name'] }} </td>
                                <td> {{ $item['unit']['name'] }}</td>
                                <td> {{ $item['category']['name'] }} </td>
                                <td>{{ $buying_qty }}</td>
                                <td>{{  $selling_qty }}</td>
                                <td>{{ $item->quantity }}</td>
                            </tr>
                            @endforeach
{{-- <tr>
<td class="no-line"></td>
 <td class="no-line"></td>
  <td class="no-line"></td>
   <td class="no-line"></td>
    <td class="no-line"></td>
   <td class="no-line text-center">
    <strong>Grand Amount</strong></td>
<td class="no-line text-end"><h4 class="m-0">${{ $total_sum }}</h4></td>
</tr> --}}
            </tbody>
        </table>
    </div>

    @php
        $date = new Datetime('now',new DatetimeZone('Asia/Dhaka'));
        $formattedDate =   $date->format('F j, Y, g:i a');
    @endphp
    <i> <b> Printing Time : {{  $formattedDate }}</b></i>
    <div class="d-print-none">
        <div class="float-end">
            <a href="javascript:window.print()" class="btn text-white custom-btn waves-effect waves-light"><i class="fa fa-print"></i></a>
            <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Download</a>
        </div>
    </div>
</div>
</div>

</div>
</div> <!-- end row -->

</div>
</div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>





@endsection