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
                            <li class="breadcrumb-item active">Edit Purchase</li>
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
                        <h3 class="card-title">Edit Purchase</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{route('purchase.update', ['id' => $purchase->id])}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product *</label>
                                        <select class="form-control select2" name="product_id" style="width: 100%;" required>
                                            <option value="{{$purchase->product->id}}">{{$purchase->product->name}}</option>
                                            @foreach($products as $row)
                                                <option value="{{$row->id}}">{{$row->name}} ({{$row->code}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Purchase Price (Per Item) *</label>
                                        <input type="number" id="purchaseprice" onkeyup="checkTotalCost()" name="purchaseprice" value="{{$purchase->purchaseprice}}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Stock Qunatity *</label>
                                        <input type="number" id="stock" onkeyup="checkTotalCost()" name="stock" value="{{$purchase->stock}}"  class="form-control" required>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier *</label>
                                        <select class="form-control select2" name="supplier_id" style="width: 100%;" required>
                                            <option value="{{$purchase->supplier->id}}">{{$purchase->supplier->name}}</option>
                                            @foreach($suppliers as $row)
                                                <option value="{{$row->id}}">{{$row->name}} ({{$row->city}})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sale Price (Per Item) *</label>
                                        <input type="number" onkeyup="checkTotalCost()" id="saleprice" value="{{$purchase->saleprice}}"  name="saleprice" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Cost</label>
                                        <input type="number" id="total" value="{{$purchase->total}}"  name="total" readonly class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Profit</label>
                                        <input type="number" id="profit" name="profit" value="{{$purchase->profit}}"  readonly class="form-control">
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
                                                 <option value="{{$purchase->purchasestatus}}">{{$purchase->purchasestatus}}</option>
                                        @if($purchase->purchasestatus == 'Orderd')
                                                <option value="Received">Received</option>
                                        @else
                                                <option value="Orderd">Orderd</option>
                                        @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Payment Status *</label>
                                        <select name="paymentstatus" class="form-control" id="">
                                            <option value="{{$purchase->paymentstatus}}">{{$purchase->paymentstatus}}</option>
                                            @if($purchase->purchasestatus == 'Paid')
                                                <option value="Received">Pending</option>
                                            @else
                                                <option value="Orderd">Paid</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="summernote">{{$purchase->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Purchase</button>
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
