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
                        <h3 class="card-title">Add New Sale</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{route('Sales.store')}}" method="get" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <!-- /.card-header -->
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
                                <!-- /.col -->
                               
                                <!-- /.col -->
                            </div>
          <div class="row">
          <div class="col-md-10">

            <div class="card">
              <div class="card-header">
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
                  
                    </tr>
                  </thead>
                  <tbody id='myTable'>
                   <td name='name'></td>
                   <td name='price'></td>
                   <td name='quantity'></td>
                   <td name='subtotal' ></td>
                
                   
                    
                  </tbody>
                    <tfoot>
    <tr>

                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
                            <!-- /.row -->
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Grandtotal</label>
                                        <div id=grandtotal name="grandtotal">
                                            0
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Sale</button>
                           
                           
                        </div>
                        
                    </form>
                    <!-- /.card -->
            </div>
                    <!-- /.container-fluid -->
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
            $('#myTable').append("<tr><td name='name'>" +response.name+"("+response.stock+")<br>"+response.code+"</td><td   id='price"+response.code+"'>"+response.price+"</td>  <td id='stock' ><input type='number' min='0' onclick='subtotal("+response.code+")' value='0' id='quantity"+response.code+"' ></td><td id='total"+response.code+"'></td></tr>");
           
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
   
  let  arr =   $("#grandtotal").text();
  let sum = parseInt(arr) + parseInt(total);  

  $("#grandtotal").text(sum);
  alert(sum);

   
  

   

  }
  
  

</script>

   

@endsection