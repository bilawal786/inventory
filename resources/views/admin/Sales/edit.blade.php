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
                            <li class="breadcrumb-item active">Update New Sales</li>
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
                        <h3 class="card-title">Update New Sale</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{route('sales.update', ['id' => $sale->id])}}" method="get" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product *</label>
                                        <select class="form-control  save-data" id="save-data"name="product_id" style="width: 100%;" >
                                            <option value="">Select Product *</option>
                                            @foreach($products as $row)
                                                <option value="{{$row->id}}">{{$row->name}} ({{$row->code}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-10">

                                    <div class="card">
                                        <div class="card-header bg-success">
                                            <h3 class="card-title">Bordered Table</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table class="table table-bordered" id="ajextable" >
                                                <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Sub Total</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody id='myTable'>

                                                <tr id="udata">
                                                    <td >
                                                        @if(!empty($sale->name))
                                                            @foreach(json_decode($sale->name,true) as $data2)
                                                                <input  value="{{$data2}}" readonly name="name[]"><br>
                                                            @endforeach
                                                        @endif
                                                        @php $code = json_decode($sale->code,true) @endphp
                                                    </td>
                                                    <td >
                                                        @if(!empty($sale->price))
                                                            @foreach(json_decode($sale->price,true) as $key => $data5)
                                                                <input type="text"   id="price{{$code[$key]}}" value="{{$data5}}" name="price[]" >
                                                                <br>
                                                            @endforeach
                                                        @endif

                                                    </td>
                                                    <td>

                                                        @if(!empty($sale->quantity))
                                                            @foreach(json_decode($sale->quantity,true) as $key => $data4)
                                                                <input type="number" onclick="subtotal({{$code[$key]}})" id="quantity{{$code[$key]}}" class="select" value="{{$data4}}" name="quantity[]"><br>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(!empty($sale->subtotal))
                                                            @foreach(json_decode($sale->subtotal,true) as $key => $data6)
                                                                <input  class="gtotal"  type="text" id="total{{$code[$key]}}"  readonly value="{{$data6}}" name="subtotal[]" >
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td> <a class='btn btn-danger deletebtn'  > x </a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Grandtotal</label>
                                                    <div  >
                                                        <input type="text" onfocus="focus()"  name="grandtotal" id="grndtotal1" readonly value="{{$row->grandtotal}}">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Sale</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- /.card -->
                </div>
                <!-- /.container-fluid -->

            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
    <script>

        $(".save-data").change(function(event){
            let id = $(".save-data").val();
            $.ajax({
                url: "/ajax-request/"+id,
                type:"get",

                success:function(response){
                    console.log(response);
                    if(response) {
                        $('#myTable').append("<tr><input type='hidden' name='product_id[]' value="+response.id+">  <td>" +response.name+"("+response.stock+")<br>"+response.code+" <input type='hidden' name='stock[]' value="+response.stock+"> <input type='hidden' name='code[]' value="+response.code+"> <input type='hidden' id='nam' value="+response.name+" name='name[]'  ></td><td   > <input type='text' id='price"+response.code+"' class='gtotal' value="+response.price+"> </td> <input type='hidden'  id='pprice' name='price[]' value="+response.price+"> <td id='stock' ><input type='number' min='1' onclick='subtotal("+response.code+")' value='0' name='quantity[]' id='quantity"+response.code+"' ></td><input type='hidden'  name='subtotal[]'    id='subtotal"+response.code+"'  ><td > <input class='gtotal' readonly  id='total"+response.code+"'>  </td> <td> <a class='btn btn-danger deletebtn'  > x </a> </td> </tr>");




                    }

                },
                error: function(error) {

                }
            });

        });


        function insRow() {

            var table = document.getElementById('purchase_table');
            var rowCount = table.rows.length;


            var row = table.insertRow(rowCount);
            var colCount = table.rows[1].cells.length;
            for (var i = 0; i < colCount; i++) {
                var newcell = row.insertCell(i);
                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
            }

        }

        function subtotal($id){



            var qty = $('#quantity'+$id).val();

            var qty = event.target.value;
            var price = $('#price'+$id).val();


            var total = qty*price;

            $("#total"+$id).val(total);
            $("#subtotal"+$id).val(total);



            getGrandTotal();

        }

        function getGrandTotal(){
            var sum = 0;
            $('.gtotal').each(function(){
                sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
            });

            $("#grndtotal1").val(sum);
            $("#total").val(sum);

        }

        $("#myTable").on('click', '.deletebtn', function () {
            $(this).closest('tr').remove();
            subtotal();
        });



        $(document).ready(function () {
            $("#udata").find("input,textarea,select").on('input', function () {



            });
        });
        getGrandTotal();
    </script>



@endsection
