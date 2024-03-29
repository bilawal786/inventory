<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $app->name }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->

    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    {{--    <link rel="stylesheet" href="{{asset('assets/plugins/toastr.toastr.css')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css')}}">--}}
</head>
<body class="hold-transition login-page">

@yield('content')

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}"></script>

{{--<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js')}}"></script>--}}
<script>

    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif

</script>


{{--<script>--}}
{{--        @if(Session::has('messege'))--}}
{{--          var type="{{Session::get('alert-type','info')}}"--}}
{{--          switch(type){--}}
{{--              case 'info':--}}
{{--                   toastr.info("{{ Session::get('messege') }}");--}}
{{--                   break;--}}
{{--              case 'success':--}}
{{--                  toastr.success("{{ Session::get('messege') }}");--}}
{{--                  break;--}}
{{--              case 'warning':--}}
{{--                 toastr.warning("{{ Session::get('messege') }}");--}}
{{--                  break;--}}
{{--              case 'error':--}}
{{--                  toastr.error("{{ Session::get('messege') }}");--}}
{{--                  break;--}}
{{--          }--}}
{{--        @endif--}}
{{--     </script>--}}
</body>
</html>






