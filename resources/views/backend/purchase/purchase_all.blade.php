@extends('admin.admin_master')

@section('admin-content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Purchase All</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

<a href="{{ route('purchase.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add Purchase </a> <br>  <br>               

    <h4 class="card-title">Purchase All Data </h4>


    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <tr>
            <th>Sl</th>
            <th>Purhase No</th> 
            <th>Date </th>
            <th>Supplier</th>
            <th>Category</th> 
            <th>Qty</th> 
            <th>Product Name</th> 
            <th>Status</th>
            <th>Action</th>

        </thead>


        <tbody>

            @foreach($allData as $key => $item)
<tr>
<td> {{ ++$key}} </td>
<td> {{ $item->purchase_no }} </td> 
<td> {{ date('d-m-Y',strtotime($item->date))}} </td> 
 <td> {{ $item['supplier']['name'] }} </td> 
 <td> {{ $item['category']['name'] }} </td> 
 <td> {{ $item->buying_qty }} </td> 
 <td> {{ $item['product']['name'] }} </td> 
 <td>
    @if ($item->status == 0)
    <a id="approve" href="{{ url('purchasePending') }}/{{ $item->id }}"> <span class="badges bg-lightyellow">Pending</span> </a>
    @elseif($item->status == 1)
    <a href="#"> <span class="badges bg-lightgreen">Approved</span> </a>
    
    @endif
     
    
    </td> 

<td> 

<a href="{{ route('purchase.delete',$item->id) }}" class="btn btn-danger text-white sm {{ $item->status == 1 ? 'd-none':'' }}" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

</td>

</tr>
        @endforeach

        </tbody>
    </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </div> <!-- container-fluid -->
</div>

@push('customIs')
<script>
$(function(){
    $(document).on('click','#approve',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Approved This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1B2850',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, approve it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Approved!',
                        'Your file has been Approved.',
                        'success'
                      )
                    }
                  }) 


    });

  });
</script>
@endpush

@endsection