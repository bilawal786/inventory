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
                            <li class="breadcrumb-item active">Categories</li>
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
                                <a data-toggle="modal" data-target="#modal-lg" class="btn btn-sm btn-success"><i
                                        class="fa fa-plus"></i> Add New Category</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Number of Products</th>
                                        <th>Stock Quantity</th>
                                        <th style="width: 90px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>
                                                <a href="{{$row->image}}">
                                                    <img height="30px"
                                                         src="{{empty($row->image) ? asset('assets/dist/img/AdminLTELogo.png') : asset($row->image)}}"
                                                         alt="">
                                                </a>
                                            </td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->products->count()}}</td>
                                            <td>{{$row->products->sum('stock')}}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-success" data-toggle="tooltip"
                                                   title="edit">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <form action="{{route('categories.destroy',$row->id)}}" method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                            style="padding-left:8px ;padding-right: 8px; padding-top: 3px; padding-bottom: 3px"
                                                            onclick="return confirm('Are you sure you want to delete this?')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>

                                                {{--                                                    <a href="{{route('categories.delete', ['id' => $row->id])}}" class="btn btn-sm btn-danger" data-toggle="tooltip" id="delete" title="Delete">--}}
                                                {{--                                                        <i class="fa fa-times"></i>--}}
                                                {{--                                                    </a>--}}
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
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categories.store') }}" method="post" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name *</label>
                                        <input type="text" class="form-control" name="name" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image *</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
