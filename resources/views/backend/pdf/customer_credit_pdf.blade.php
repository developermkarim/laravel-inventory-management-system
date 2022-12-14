@extends('admin.admin_master')
@section('admin-content')
    
<div class="page-content print-container">
    <div class="container-fluid ">

    </div>
        <!-- start page title -->
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> Customer Payment Report </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                            <li class="breadcrumb-item active">Customer Payment Report</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

<div class="row">
<div class="col-12">
<div class="invoice-title">

<h3 class="text-center">
    <img src="{{ asset('backend/assets/img/logo.png') }}" alt="logo" height="24"/> GROCERY STORE
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
<td class="text-center"><strong>Customer Name</strong></td>
<td class="text-center"><strong>Invoice No:</strong></td>
<td class="text-center"><strong>Date</strong></td>

<td class="text-center"><strong>Due Amount</strong>
{{-- <td class="text-center"><strong>Action</strong> --}}
</td>

</tr>
</thead>
<tbody>
<!-- foreach ($order->lineItems as $line) or some such thing here -->

@php
$total_sum = '0';
@endphp
@foreach($allData as $key => $details)
<tr>
<td class="text-center">{{ $key+1 }}</td>
<td class="text-center">{{ $details->customer->name ?? 'No Customer'  }}</td>
<td class="text-center">#{{ $details->invoice->invoice_no ?? 'No Invoice' }}</td>
<td class="text-center">{{ $details->invoice->date ?? 'no date' }}</td>
<td class="text-center">{{ $details->due_amount }}</td>




</tr>
@php
$total_sum += $details->due_amount;
@endphp
@endforeach
<tr>
<td class="no-line"></td>
 <td class="no-line"></td>
  <td class="no-line"></td>
   <td class="no-line"></td>
    <td class="no-line"></td>
   <td class="no-line text-center">
    <strong>Grand Amount</strong></td>
<td class="no-line text-end"><h4 class="m-0">${{ $total_sum }}</h4></td>
</tr>
            </tbody>
        </table>
    </div>

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