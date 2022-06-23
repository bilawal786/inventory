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
                            <li class="breadcrumb-item active">Add New Sales</li>
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
                        <h3 class="card-title">Cutomer Detail</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{route('sales.store')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">


                    @csrf


                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product *</label>
                                        <select class="form-control  save-data" id="save-data"name="product_id" style="width: 100%;" required>
                                            <option value="">Select Product *</option>
                                           @foreach($products as $row)
                                            <option value="{{$row->id}}">{{$row->name}} ({{$row->code}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <select class="form-control" name="customer_id"  style="width: 100%;" required>
                                            <option value="">Select Customer</option>
                                           @foreach($customers as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
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

                                              </tbody>

                                            </table>
                                          </div>
                                     <!-- /.card-body -->
                                </div>

                                     <!-- /.row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Grandtotal</label>
                                        <div id="grdtotal" >

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="grandtotal" id="grndtotal1">
                            <button type="submit" class="btn btn-primary">Add Sale\print</button>
                        </div>

                         </div>

                        </div>
                    </form>
                </div>
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
            $('#myTable').append("<tr><input type='hidden' name='product_id[]' value="+response.id+">  <td>" +response.name+"("+response.stock+")<br>"+response.code+" <input type='hidden' name='stock[]' value="+response.stock+"> <input type='hidden' name='code[]' value="+response.code+"> <input type='hidden' id='nam' value="+response.name+" name='name[]'  ></td><td   id='price"+response.code+"'>"+response.price+"</td> <input type='hidden'  id='pprice' name='price[]' value="+response.price+"> <td id='stock' ><input type='number'  min='1' onclick='subtotal("+response.code+")' value='0' name='quantity[]' id='quantity"+response.code+"' ></td><input type='hidden'  name='subtotal[]'    id='subtotal"+response.code+"'  ><td class='gtotal'  id='total"+response.code+"'>  </td> <td> <a class='btn btn-danger deletebtn'  > x </a> </td> </tr>");




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
   var price = $('#price'+$id).html();
   var total = qty*price;

   $("#total"+$id).text(total);

   $("#subtotal"+$id).val(total);

  getGrandTotal();

}

function getGrandTotal(){
      var sum = 0;
      $('.gtotal').each(function(){
          sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
      });
      $("#grdtotal").html(sum);
      $("#grndtotal1").val(sum);
      $("#total").val(sum);


      }

      $("#myTable").on('click', '.deletebtn', function () {
    $(this).closest('tr').remove();
    subtotal();
});

getGrandTotal();
</script>



@endsection
