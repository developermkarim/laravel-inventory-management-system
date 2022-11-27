@extends('admin.admin_master')

@section('admin-content')

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Paid Customer list</h4>
            <h6>View/Search product Customer</h6>
        </div>
        <div class="page-btn">
            <a href="{{ route('customer.add') }}" class="btn btn-added">
               <i class="fa fa-plus"> </i> &nbsp; Print Paid Customers
            </a>
        </div>
    </div>


  

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                  

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Customer Name</th> 
                                <th>Invoice No </th>
                                <th>Date</th>
                                <th>Due Amount</th> 
                                <th>Action</th>

                        </thead>


                        <tbody>

                            @foreach($paidCustomers as $key => $item)
                            <tr>
                                <td> {{ ++$key}} </td>
                                <td> {{ $item->customer->name ?? 'No Name' }} </td>
                              
                                <td> {{ $item->invoice->id ?? ''}} </td>
                                <td> {{ $item->invoice->date ?? Carbon\Carbon::now() }} </td>
                            <td> {{ $item->due_amount }}৳ </td>
                                <td> {{ $item->address }} </td>

                                
                                <td>
                                    <a href="{{ route('customer.invoice.details.pdf',$item->invoice_id) }}" class="btn text-primary sm" title="View Customer"> <i class="fas fa-eye"></i>
                                    </a>

                                  

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div>

@push('customIs')
    <script>
        $(document).ready( function () {
    $('#datatable').DataTable();
} );
    </script>
@endpush

@endsection