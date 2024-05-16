@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add New Purchase</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add New Purchase</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{route('purchase.store')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product *</label>
                                        <select class="form-control select2" name="product_id" style="width: 100%;" required>
                                            <option value="">Select Product *</option>
                                           @foreach($products as $row)
                                            <option value="{{$row->id}}">{{$row->name}} ({{$row->code}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Purchase Price (Per Item) *</label>
                                        <input type="number" id="purchaseprice" onkeyup="checkTotalCost()" name="purchaseprice" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Stock Qunatity *</label>
                                        <input type="number" id="stock" onkeyup="checkTotalCost()" name="stock" class="form-control" required>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier *</label>
                                        <select class="form-control select2" name="supplier_id" style="width: 100%;" required>
                                            <option value="">Select Supplier *</option>
                                            @foreach($suppliers as $row)
                                                <option value="{{$row->id}}">{{$row->name}} ({{$row->city}})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sale Price (Per Item) *</label>
                                        <input type="number" onkeyup="checkTotalCost()" id="saleprice"  name="saleprice" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Cost</label>
                                        <input type="number" id="total" name="total" readonly class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Profit</label>
                                        <input type="number" id="profit" name="profit" readonly class="form-control">
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purchase Status *</label>
                                        <select name="purchasestatus" class="form-control" id="">
                                            <option value="Orderd">Orderd</option>
                                            <option value="Received">Received</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Payment Status *</label>
                                        <select name="paymentstatus" class="form-control" id="">
                                            <option value="Paid">Paid</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Purchase</button>
                        </div>
                    </form>
                    <!-- /.card -->

                    <!-- /.container-fluid -->
        </section>
    </div>
@endsection
@section('script')
    <script>
        function checkTotalCost() {
            var purchaseprice = $('#purchaseprice').val();
            var saleprice = $('#saleprice').val();
            var stock = $('#stock').val();
            var total = purchaseprice  * stock;
            var totalsale = saleprice  * stock;
            $('#total').val(total);
            $('#profit').val(totalsale - total);
        }
    </script>
@endsection
