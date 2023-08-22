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
                                        <th>Customer Name</th>
                                        <th>Invoice Date</th>
                                        <th>Grand Total</th>
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
                                            @foreach($customers as $rows)
                                            <td>{{$rows->name}}</td>
                                            @endforeach
                                            <td>
                                                {{$row->created_at}}
                                            </td>

                                            <td>
                                                {{$row->grandtotal}}
                                            </td>
                                            <td>

                                                <a href="{{route('sales.edit', ['id' => $row->id])}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="edit">
                                                    <i class="fa fa-pen"></i>
                                                </a>

{{--                                                <a href="{{route('sales.delete', ['id' => $row->id])}}" class="btn btn-sm btn-danger" data-toggle="tooltip" id="delete" title="Delete">--}}
{{--                                                    <i class="fa fa-times"></i>--}}
{{--                                                </a>--}}
                                                <form action="{{route('sales.delete',$row->id)}}" method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                            style="padding-left:8px ;padding-right: 8px; padding-top: 3px; padding-bottom: 3px"
                                                            onclick="return confirm('Are you sure you want to delete this?')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                                <a href="{{route('sales.view',['id'=>$row->id])}}" class="btn btn-sm btn-success" data-toggle="tooltip"  title="view">
                                                    <i class="fa fa-eye"></i>
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
