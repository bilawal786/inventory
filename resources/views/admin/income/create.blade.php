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
                            <li class="breadcrumb-item active">Add New Income</li>
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
                        <h3 class="card-title">Add New Income</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{route('income.store')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category *</label>
                                        <select class="form-control select2" name="category_id" style="width: 100%;" required>
                                            <option value="">Select category *</option>
                                            @foreach($category as $row)
                                                <option value="{{$row->id}}">{{$row->types}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date"   name="date" class="form-control" required>
                                    </div>

                                    <!-- /.col -->

                                    <div class="form-group">
                                        <label>Price *</label>
                                        <input type="number" name="price" class="form-control" required>

                                        {{--                                            @foreach($suppliers as $row)--}}
                                        {{--                                                <option value="{{$row->id}}">{{$row->name}} ({{$row->city}})</option>--}}
                                        {{--                                            @endforeach--}}
                                    </div>

                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" id="summernote"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Income</button>
                        </div>
                    </form>
                    <!-- /.card -->

                    <!-- /.container-fluid -->
        </section>
    </div>
@endsection
@section('script')
{{--    <script>--}}
{{--        function checkTotalCost() {--}}
{{--            var purchaseprice = $('#purchaseprice').val();--}}
{{--            var saleprice = $('#saleprice').val();--}}
{{--            var stock = $('#stock').val();--}}
{{--            var total = purchaseprice  * stock;--}}
{{--            var totalsale = saleprice  * stock;--}}
{{--            $('#total').val(total);--}}
{{--            $('#profit').val(totalsale - total);--}}
{{--        }--}}
{{--    </script>--}}
@endsection
