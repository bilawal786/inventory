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
                                <li class="breadcrumb-item active">Report</li>
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
                                <div class="row">
                                    <div class="col-6" >
                                    <form action="{{route('report.search')}}"  method="get" accept-charset="UTF-8" enctype="multipart/form-data" style="display: flex; margin-bottom: 20px">
                                        @csrf
                                        <input type="month" class="form-control" name="month" style="width: 50%" >
                                        <br>
                                        <input type="submit" class="btn btn-success"  value="Search" style="margin-left: 20px">
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <table  class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Expence</th>
                                                    <th>Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach( $expencerp as  $row )
                                                    <tr>
                                                        <td>
                                                            {{$row->name}}
                                                        </td>
                                                        <?php $sum = \App\Expences::where('category_id','=',$row->id)->sum('price'); ?>
                                                       <td>
                                                           {{$sum}}
                                                       </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-4">
                                            <table  class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Income</th>
                                                    <th>Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach( $inccategory as  $row )
                                                    <tr>
                                                        <td>
                                                            {{$row->name}}
                                                        </td>
                                                        <?php  $sum2 =\App\Income::where('category_id','=',$row->id)->sum('price') ?>

                                                       <td> {{$sum2}} </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-4">
                                            <table  class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Total Expence </th>
                                                    <th>Total Income</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{$totalexpence}}</td>
                                                    <td>{{$totalincome}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
@endsection
