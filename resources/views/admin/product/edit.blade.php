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
                            <li class="breadcrumb-item active">Edit Product</li>
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
                        <h3 class="card-title">Edit Product</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{route('product.update',['id'=>$products->id])}}"  method="get" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                    <!-- /.card-header -->
                    
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Name *</label>
                                    <input type="text" name="name" required class="form-control" value="{{$products->name}}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Sale Price *</label>
                                    <input type="number" name="price" class="form-control" required   value="{{$products->price}}">
                                </div>
                                <div class="form-group">
                                    <label>Stock Quantity</label>
                                    <input type="number" name="stock" class="form-control" value="{{$products->stock}}">
                                </div>
                                <div class="form-group">
                                    <label>Alert Quantity</label>
                                    <input type="number" name="alert" class="form-control" value="{{$products->alert}}">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input  name="code" value="{{rand(10000000, 50000000)}}" class="form-control" readonly value="{{$products->code}}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" value="{{$products->image}}">
                                </div>


                                <div class="form-group">
                                    <label>Product Unit</label>
                                    <select name="unit" id="" class="form-control" value="{{$products->unit}}">
                                        <option value="">Select Unit</option>
                                        <option value="Piece">Piece</option>
                                        <option value="Meter">Meter</option>
                                        <option value="Kilogram">Kilogram</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Category *</label>
                                    <select class="form-control select2" name="category_id"  style="width: 100%;" required>
                                        <option value="">Select category</option>
                                        @foreach($categories as $row)
                                        
            
                                        <option value="{{$row->id}}" @if($row->id=== $products->category_id) selected='selected' @endif> {{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="summernote" >{{$products->description}}</textarea>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                    </form>
                <!-- /.card -->

            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
