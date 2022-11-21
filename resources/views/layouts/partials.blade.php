@if(session()->has('updateUser'))
  <script type="text/javascript">
  $(document).ready(function(){
    swal({
      title: "{{ \Session::get('updateUser')['flash_title'] }}",
      text: "{{ \Session::get('updateUser')['flash_message'] }}",
      icon: "{{ \Session::get('updateUser')['flash_level'] }}",
      button: "{{ \Session::get('updateUser')['flash_button'] }}",
      timer: 3000
    });
  });



  </script>
@endif


@if(session()->has('permissionDenied'))
  <script type="text/javascript">
  $(document).ready(function(){
    toastr.{{ \Session::get('permissionDenied')['flash_level'] }}('{{ \Session::get('permissionDenied')['flash_message'] }}', '{{ \Session::get('permissionDenied')['flash_title'] }}');
  });
  </script>
@endif
