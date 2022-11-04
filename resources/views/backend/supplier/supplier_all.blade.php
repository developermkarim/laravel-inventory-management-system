@extends('admin.admin_master')

@section('admin-content')

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Product Category list</h4>
            <h6>View/Search product Category</h6>
        </div>
        <div class="page-btn">
            <a href="{{ url('supplyForm') }}" class="btn btn-added">
               <i class="fa fa-plus"> </i> &nbsp; Add Suppliers
            </a>
        </div>
    </div>


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Supplier All</h4>



            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add
                        Supplier </a> <br> <br>

                    <h4 class="card-title">Supplier All Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Mobile Number </th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>

                        </thead>


                        <tbody>

                            @foreach($suppliers as $key => $item)
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->mobile_no }} </td>
                                <td> {{ $item->email }} </td>
                                <td> {{ $item->address }} </td>
                                <td>
                                    <a href="{{ route('supplier.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i>
                                    </a>

                                    <a  href="{{ route('supplier.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                            class="fas fa-trash-alt"></i> </a>

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