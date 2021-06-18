<!doctype html>
<html class="boxed">
  <head>
    <title>Sistem {{ config('app.name') }}</title>
    <link href="{{ asset('salert/sweetalert2.css') }}" rel="stylesheet">
    <!-- Head Libs -->
    <script src="{{ asset('salert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('salert/sweetalert2.common.js') }}"></script>
  </head>
  <body style="background-image:url(images/MOTAC.jpg);background-repeat:no-repeat;background-size:cover;">

  </body>
</html>
<script language="javascript">
swal({
  title: 'Berjaya',
  text: 'Anda telah log keluar daripada sistem.',
  type: 'success',
  confirmButtonClass: "btn-success",
  confirmButtonText: "Ok",
  showConfirmButton: true,
}).then(function () {
  window.location.href = "/";
});
</script>