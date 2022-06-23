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
                            <li class="breadcrumb-item active">Sales</li>
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

                        <div class="card ">
                            <div class="card-header ">
                                <h3 class="card-title"></h3>
                                <a href="{{route('sales.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>  Add New Sale</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product code</th>
                                        <th>Product Name</th>
                                        <th>Product Stock</th>
                                        <th>Quantity</th>
                                        <th>Sale Price</th>
                                        <th>Subtotal </th>
                                        <th>Grand Total </th>
                                        <th style="width: 90px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sale as $row)
                                        <tr>

                                            <td>
                                                @if(!empty($row->code))
                                                    @foreach(json_decode($row->code,true) as $data1)
                                                        {{$data1}} ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($row->name))
                                                    @foreach(json_decode($row->name,true) as $data2)
                                                        {{$data2}},
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($row->stock))
                                                    @foreach(json_decode($row->stock,true) as $data3)
                                                        {{$data3}} ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($row->quantity))
                                                    @foreach(json_decode($row->quantity,true) as $data4)
                                                        {{$data4}} ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($row->price))
                                                    @foreach(json_decode($row->price,true) as $data5)
                                                        {{$data5}} ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($row->subtotal))
                                                    @foreach(json_decode($row->subtotal,true) as $data6)
                                                        {{$data6}} ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                {{$row->grandtotal}}
                                            </td>


                                            <td>
                                                <a href="{{route('sales.edit', ['id' => $row->id])}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="edit">

                                                </a>

                                                <a href="{{route('sales.delete', ['id' => $row->id])}}" class="btn btn-sm btn-danger" data-toggle="tooltip" id="delete" title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </a>
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
