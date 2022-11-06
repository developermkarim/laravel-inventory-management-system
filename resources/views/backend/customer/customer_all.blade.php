@extends('admin.admin_master')

@section('admin-content')

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Product Customer list</h4>
            <h6>View/Search product Customer</h6>
        </div>
        <div class="page-btn">
            <a href="{{ route('customer.add') }}" class="btn btn-added">
               <i class="fa fa-plus"> </i> &nbsp; Add Customers
            </a>
        </div>
    </div>


    <!-- start page title -->
   {{--  <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Customer All</h4>
            </div>
        </div>
    </div> --}}
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- <a href="" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add
                        Customer </a> <br> <br>

                    <h4 class="card-title">Customer All Data </h4>
 --}}

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Profile Image</th>
                                <th>Mobile Number </th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>

                        </thead>


                        <tbody>

                            @foreach($customers as $key => $item)
                            <tr>
                                <td> {{ ++$key}} </td>
                                <td> {{ $item->name }} </td>
                                <td> <img src="{{$item->customer_img_uri}}" alt="{{ $item->name }}" width="60" height="60">  </td>
                                <td> {{ $item->mobile_no }} </td>
                                <td> {{ $item->email }} </td>
                                <td> {{ $item->address }} </td>

                                <td>
                                    @if ($item->status == 1)
                                        <a href="{{ url('customer/status') }}/0/{{ $item->id }}">
                                            <span class="badges bg-lightgreen">unblock</span>
                                        </a>
                                    @elseif ($item->status == 0)
                                    <a href="{{ url('customer/status') }}/1/{{ $item->id }}"><span class="badges bg-lightred">block</span></a>
                                        
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('customer.edit',$item->id) }}" class="btn text-primary sm" title="Edit Data"> <i class="fas fa-edit"></i>
                                    </a>

                                    <a  href="{{ route('customer.delete',$item->id) }}" class="btn text-danger sm" title="Delete Data" id="delete"> <i
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