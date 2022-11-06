@extends('admin.admin_master')

@section('admin-content')

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Product list</h4>
            <h6>View/Search product</h6>
        </div>
        <div class="page-btn">
            <a href="{{ route('product.add') }}" class="btn btn-added">
                <i class="fa fa-plus"> </i> &nbsp; Add Product
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


                    <table id="datatable" class="table table-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Supplier Name </th>
                                <th>Unit</th>
                                <th>Category</th>
                                <th>Status</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $key => $item)
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $item->name }} </td>
                                <td>{{ $item['supplier']['name'] }} </td>
                                <td> {{ $item['unit']['name'] }}</td>
                                <td> {{ $item['category']['name'] }} </td>


                                <td>
                                    <span>{{ $item->status == 1 ? '✔️':'❌' }}</span>
                                </td>

                                <td>
                                    <a href="{{ route('product.edit',$item->id) }}" class="btn text-success sm"
                                        title="Edit Data"> <i class="fas fa-edit"></i> </a>

                                    <a href="{{ route('product.delete',$item->id) }}" class="btn text-danger sm"
                                        title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i></i></a>

                                    @if ($item->status == 1)
                                    <a href="{{ url('product/status') }}/0/{{ $item->id }}">
                                        <button class="btn btn-outline-success"> Active</button>
                                    </a>
                                    @elseif ($item->status == 0)
                                    <a href="{{ url('product/status') }}/1/{{ $item->id }}"><span
                                            class="btn btn-outline-danger"> Inactive</span> </a>

                                    @endif
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
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
@endpush

@endsection