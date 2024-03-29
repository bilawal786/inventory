<!DOCTYPE html>
<html lang="en">
<head>


     @php
      $app=App\Apperance::first();

    @endphp
{{--  <meta charset="utf-8">--}}
{{--  <meta name="viewport" content="width=device-width, initial-scale=1">--}}
  <title> {{ $app->name }}</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{('fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{('code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
   <!-- DataTables -->
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">

   <link rel="stylesheet" type="text/css" href="{{asset('cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css')}}">
    <style>
        td{
            color: black;
        }
        /*.buttons-pdf{*/
        /*    background-color: #ee1f1f;*/
        /*}*/
    </style>
</head>
<body >
  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
{{--    <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">--}}
  </div> -->
    <!-- Content Header (Page header) -->

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-user"></i> Customer Info
                    <small class="float-right">Date:{{$customer->created_at->format('d/m/Y')}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-8 invoice-col">

                  <address>
                    <strong>{{$customer->name}}</strong><br>
                    {{$customer->address}}<br>
                    <br>
                    Phone: {{$customer->phone}}<br>
                    Email: {{$customer->email}}
                  </address>
                </div>
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #00{{$customer->id}}</b><br>
                  <br>
                  <b>Order ID:</b> {{$customer->id}}4F3S8J<br>

                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td>
                                     @if(!empty($sale->quantity))
                                    @foreach(json_decode($sale->quantity,true) as $data4)
                                    {{$data4}} <br> <br>
                                    @endforeach
                                    @endif
                                </td>
                                <td>
                                     @if(!empty($sale->name))
                                    @foreach(json_decode($sale->name,true) as $data2)
                                    {{$data2}} <br> <br>
                                    @endforeach
                                    @endif
                                </td>
                                <td>
                                     @if(!empty($sale->code))
                                    @foreach(json_decode($sale->code,true) as $data1)
                                    {{$data1}} <br> <br>
                                    @endforeach
                                    @endif
                                </td>
                      <td>{{$sale->description}}</td>
                      <td>
                                @if(!empty($sale->subtotal))
                                    @foreach(json_decode($sale->subtotal,true) as $data6)
                                    {{$data6}}<br> <br>
                                    @endforeach
                                    @endif
                                    </td>
                    </tr>


                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <h1></h1>
                </div>


                <!-- /.col -->
                <div class="col-6">


                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Grand Total:</th>
                        <td>{{$sale->grandtotal}}</td>
                      </tr>

                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="#" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
    <!-- /.content -->



<script>
  window.addEventListener("load", window.print());
</script>
