<script src="{{asset('backend/assets/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('backend/assets/js/feather.min.js')}}"></script>

<script src="{{asset('backend/assets/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('backend/assets/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('backend/assets/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>

{{-- <script src="assets/plugins/apexchart/apexcharts.min.js"></script> --}}

<script src="{{asset('backend/assets/plugins/apexchart/apexcharts.min.js')}}"></script>

{{-- <script src="assets/plugins/apexchart/chart-data.js"></script> --}}
<script src="{{asset('backend/assets/plugins/apexchart/chart-data.js')}}"></script>

{{-- <script src="assets/js/script.js"></script> --}}

<script src="{{asset('backend/assets/js/script.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- This blade syntex for custom js to call view files --}}


<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break; 
    }
    @endif 
   </script>
</body>
</html>


