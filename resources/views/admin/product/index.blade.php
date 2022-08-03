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
                            <li class="breadcrumb-item active">Products</li>
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
                                <a href="{{route('product.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>  Add New Product</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Item Code</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Unit</th>
                                        <th style="width: 90px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $row)
                                            <tr>
                                                <td>{{$row->code}}</td>
                                                <td>
                                                    <a href="{{$row->image}}">
                                                        <img height="30px" src="{{empty($row->image) ? asset('assets/dist/img/AdminLTELogo.png') : asset($row->image)}}" alt="">
                                                    </a>
                                                </td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->category->name}}</td>
                                                <td>{{$row->stock}}</td>
                                                <td>{{$row->price}}</td>
                                                <td>{!! $row->description !!}</td>
                                                <td>{{$row->unit}}</td>
                                                <td>
                                                    <a href="{{route('product.edit',['id' => $row->id])}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="edit">
                                                        <i class="fa fa-pen"></i>
                                                    </a>

                                                    <a href="{{route('product.delete', ['id' => $row->id])}}" class="btn btn-sm btn-danger" data-toggle="tooltip" id="delete" title="Delete">
                                                        <i class="fa fa-times"></i>
                                                    </a>
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
