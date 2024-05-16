@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- <h1>DataTables</h1> -->
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Purchases</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <a href="{{route('purchase.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>  Add New Purchase</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Reference No</th>
                                        <th>Product</th>
                                        <th>Supplier</th>
                                        <th>Purchase Price</th>
                                        <th>Sale Price</th>
                                        <th>Items Purchased</th>
                                        <th>Total Cost</th>
                                        <th>Profit</th>
                                        <th>Purchase Status</th>
                                        <th>Payment Status</th>
                                        <th style="width: 90px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($purchases as $row)
                                        <tr>
                                            <td>{{$row->referenceno}}</td>
                                            <td>{{$row->product->name}}</td>
                                            <td>{{$row->supplier->name}}</td>
                                            <td>{{$row->purchaseprice}}</td>
                                            <td>{{$row->saleprice}}</td>
                                            <td>{{$row->stock}}</td>
                                            <td>{{$row->total}}</td>
                                            <td>{{$row->profit}}</td>
                                            <td>
                                                @if($row->purchasestatus == 'Orderd')
                                                    <span class="badge bg-success">Orderd</span>
                                                @else
                                                    <span class="badge bg-primary">Recieved</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->paymentstatus == 'Paid')
                                                    <span class="badge bg-primary">Paid</span>
                                                @else
                                                    <span class="badge bg-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('purchase.edit', ['id' => $row->id])}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="edit">
                                                    <i class="fa fa-pen"></i>
                                                </a>

{{--                                                <a href="{{route('product.delete', ['id' => $row->id])}}" class="btn btn-sm btn-danger" data-toggle="tooltip" id="delete" title="Delete">--}}
{{--                                                    <i class="fa fa-times"></i>--}}
{{--                                                </a>--}}
                                                <form action="{{route('purchase.delete',$row->id)}}" method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                            style="padding-left:8px ;padding-right: 8px; padding-top: 3px; padding-bottom: 3px"
                                                            onclick="return confirm('Are you sure you want to delete this?')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
