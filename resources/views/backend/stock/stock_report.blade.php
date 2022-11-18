@extends('admin.admin_master')

@section('admin-content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Stock list</h4>
            <h6>supplier/Product Stock</h6>
        </div>
        <div class="page-btn">
            <a href="{{ route('stock.report.pdf') }}" class="btn btn-added">
                <i class="fa fa-plus"> </i> &nbsp; Print Stock Report
            </a>
        </div>
    </div>


    <!-- start page title -->
    {{--  <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Category All</h4>



            </div>
        </div>
    </div> --}}
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- <a href="" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add
                        Category </a> <br> <br>

                    <h4 class="card-title">Category All Data </h4> --}}


                    <table id="datatable" class="table-striped nowrap table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Supplier Name </th>
                                <th>Unit</th>
                                <th>Category</th>

                                <th>In Quantity</th>
                                <th>Out Quantity</th>
                                <th>Stock(current)</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($allData as $key => $item)
                            @php
                            $buying_qty = App\Models\Purchase::where('category_id', $item->category_id)
                            ->where('product_id', $item->id)
                            ->where(['status' => '1'])
                            ->sum('buying_qty');

                            $selling_qty = App\Models\InvoiceDetail::where('category_id', $item->category_id)
                            ->where('product_id', $item->id)
                            ->where('status', 1)
                            ->sum('selling_qty');
                            @endphp
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $item->name }} </td>
                                <td>{{ $item['supplier']['name'] }} </td>
                                <td> {{ $item['unit']['name'] }}</td>
                                <td> {{ $item['category']['name'] }} </td>
                                <td> {{ $buying_qty }} </td>
                                <td> {{ $selling_qty }} </td>
                                <td>{{ $item->quantity }}</td>
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
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
@endpush
@endsection
