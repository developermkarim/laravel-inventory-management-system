@extends('admin.admin_master')

@section('admin-content')

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Product Category list</h4>
            <h6>View/Search product Category</h6>
        </div>
        <div class="page-btn">
            <a href="{{ url('categoryForm') }}" class="btn btn-added">
               <i class="fa fa-plus"> </i> &nbsp; Add Categorys
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


                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                               <th>Status</th>
                                <th>Action</th>

                        </thead>


                        <tbody>

                            @foreach($categorys as $key => $item)
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $item->name }} </td>
                               

                                <td>
                                    @if ($item->status == 1)
                                        <a href="{{ url('category/status') }}/0/{{ $item->id }}"><span class="badges bg-lightgreen">Activated</span></a>
                                    @elseif ($item->status == 0)
                                    <a href="{{ url('category/status') }}/1/{{ $item->id }}"><span class="badges bg-lightred">Deactivated</span></a>
                                        
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('category.edit',$item->id) }}" class="btn sm" title="Edit Data">
                                        <img src="{{ asset('backend/assets/img/icons/edit.svg') }}" alt="img">
                                        {{-- <i class="fas fa-edit"></i> --}}
                                    </a>

                                    <a  href="{{ route('category.delete',$item->id) }}" class="btn 
                                     sm" title="Delete Data" id="delete">  <img src="{{ asset('backend/assets/img/icons/delete.svg') }}" alt="img"> </a>

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