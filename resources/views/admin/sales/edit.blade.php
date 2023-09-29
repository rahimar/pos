@extends('admin.layouts.template')

@section('page_title')
Edit Sales
@endsection

@section('page_css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<style>
    input.form-control, select.form-control{
    height: 30px !important;
    padding: 2px 10px !important;
    font-size: 15px !important;
    color: #222 !important;
    border-color: steelblue !important;
  } 
   
   .select2-choice, .select2-container { 
    height: 30px !important;
    padding: 0 !important;
  }    
  .select2-chosen{ 
  	padding-left: 10px !important;
  }
  .select2-results .select2-result-label {
    padding: 3px 2px 0px !important;
    font-size: 15px !important;
  }
    </style>
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>Edit Sales Record
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                       
                    </div>
                </div>    
            </div>
        </div> 
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                    
                        <h5 class="card-title">Edit Sales</h5>
                        <form class="" action="{{ route('updatesalesitems')}}" method="POST">
                            @csrf

                            <div class="row">
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="customer_id" class="">Customer Name</label>
                                        <select name="customer_id" id="customer_id" class="form-control @error('customer_id') is-invalid @enderror" required="required">
                                         <option value="">Select Customer</option>
                                         @foreach($registers as $reg)
                                            <option value="{{ $reg->id }}" {{ ($sales->customer_id ==  $reg->id) ? 'selected':''}}>{{ $reg->name }}</option>
                                          @endforeach
                                        </select>
                                        @error('customer_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                              
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="product_name" class="">Payable</label>
                                        <input name="product_name" id="product_name" value="0" type="text" class="form-control">
                                    </div>
                                </div>
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="sales_date" class="">Sales Date</label>
                                        <input name="sales_date" value="{{$sales->sales_date}}" id="sales_date" placeholder="sales_date" type="text" class="form-control @error('sales_date') is-invalid @enderror">
                                    
                                        <input name="sales_id" id="sales_id" value="{{$sales->id}}"  type="hidden">
        
                                        @error('sales_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               
                               


                            </div>

                            <div class="row">

                              <div class="col-md-9" style="background: darkgray;">
                                    <div class="ibox-content" style="overflow:scroll; height: 370px;">
                                            <div class="table-responsive">
                                                <div id="addButton">
                                                    <input style="background-color: green; color: white;" type="button" value="Add" class="plusbtn" />
                                                    <!-- <input style="background-color: red; color: white;" type="button" value="Remove" class="minusbtn" /> -->
                                                </div>
                                            
                                                <table id="table_row_delete" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align:center; width: 3%;">#</th>
                                                            <th style="text-align:center; width: 12%;">Category</th>
                                                            <th style="text-align:center; width: 12%;">Product</th>
                                                            <th style="text-align:center; width: 8%;">Unit</th>
                                                            <th style="text-align:center; width: 8%;">Qty</th>
                                                            <th style="text-align:center; width: 10%;">Rate</th>
                                                            <th style="text-align:center; width: 7%;"></th>
                                                            <th style="text-align:center; width: 10%; ">Discount</th>
                                                            <th style="text-align:center; width: 10%;">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="acctheight" id="fixedTbody">

                                                    @if($salesDetails)
                                                    
                                                    <input type="hidden" class="form-control" id="rowCount" value="{{ $count = count($salesDetails); }}" />
                                                        @foreach($salesDetails as $key =>$pDetails)
                                                        <tr id="tr_{{$key + 1}}">
                                                            <td style="">{{$key + 1}}</td>
                                                            <td>
                                                                <select style="width:;" id="category_id{{$key + 1}}" name="category_id[]" class="form-control" required onchange="productChg({{$key + 1}})">
                                                                <option value="" >Select an option</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select style="width:;" id="product_id{{$key + 1}}" name="product_id[]" class="form-control " onchange="productRate({{$key + 1}})" required="required">
                                                                    <option value="" >Select an option</option>
                                                                    

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select style="width:;" id="unit_id{{$key + 1}}" name="unit_id[]" class="form-control" required="required">
                                                                    <option value="" >Select an option</option>
                                                                    @foreach($units as $unit)
                                                                    <option value="{{ $unit->id }}" {{ ($pDetails->unit_id ==  $unit->id) ? 'selected':''}}>{{ $unit->unit_name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" id="product_qty{{$key + 1}}" required="required" name="product_qty[]" style="width: 100%" type="text" value="{{$pDetails->quantity}}" onchange="productRate({{$key + 1}})">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" id="rate{{$key + 1}}" name="rate[]" required="required" style="width: 100%" type="text" value="{{$pDetails->rate}}" onchange="productRate({{$key + 1}})">
                                                            </td>
                                                            <td>
                                                                <select style="width:;" id="product_discount{{$key + 1}}" name="product_discount[]" class="form-control " onchange="productRate({{$key + 1}})">
                                                                    <option value="1" {{ ($pDetails->product_discount ==  1) ? 'selected':''}}>%</option>
                                                                    <option value="2" {{ ($pDetails->product_discount ==  2) ? 'selected':''}}>BDT</option>
                                                                    

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" id="discount{{$key + 1}}" name="discount[]" style="width: 100%" type="text" value="{{$pDetails->product_discount_amount}}" onchange="productRate({{$key + 1}})">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" id="amount{{$key + 1}}" name="amount[]" style="width: 100%" type="text" value="{{$pDetails->product_total_amount}}" required>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    @else
                                                    <tr id="tr_1">
                                                            <td style="">1</td>
                                                            <td>
                                                                <select style="width:;" id="category_id1" name="category_id[]" class="form-control" required onchange="productChg(1)">
                                                                <option value="" >Select an option</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select style="width:;" id="product_id1" name="product_id[]" class="form-control " onchange="productRate(1)" required="required">
                                                                    <option value="" >Select an option</option>
                                                                    

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select style="width:;" id="unit_id1" name="unit_id[]" class="form-control" required="required">
                                                                    <option value="" >Select an option</option>
                                                                    @foreach($units as $unit)
                                                                    <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" id="product_qty1" required="required" name="product_qty[]" style="width: 100%" type="text" value="1" onchange="productRate(1)">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" id="rate1" name="rate[]" required="required" style="width: 100%" type="text" value="0" onchange="productRate(1)">
                                                            </td>
                                                            <td>
                                                                <select style="width:;" id="product_discount1" name="product_discount[]" class="form-control " onchange="productRate(1)">
                                                                    <option value="1">%</option>
                                                                    <option value="2">BDT</option>
                                                                    

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" id="discount1" name="discount[]" style="width: 100%" type="text" value="0" onchange="productRate(1)">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" id="amount1" name="amount[]" style="width: 100%" type="text" value="0" required>
                                                            </td>
                                                        </tr>
                                                    @endif


                                                    </tbody>
                                                    <tbody class="test acctheight">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>  
                             </div>
                              <div class="col-md-3" style="    background: gainsboro;padding: 15px 7px;">
                                
                                  <div class="row">
                                        <div class="position-relative form-group col-lg-4" style="text-align:right">
                                            <label for="sub_total" >Sub Totla</label>
                                        </div>
                                        <div class="position-relative form-group col-lg-8">
                                            <input name="sub_total" id="sub_total" value="{{$sales->subTotal}}"type="text" class="form-control">
                                        </div>
                                  </div>
                                  <div class="row">
                                        <div class="position-relative form-group col-lg-4" style="text-align:right">
                                            <label for="vat" >Vat</label>
                                        </div>
                                        <div class="position-relative form-group col-lg-3">
                                            <select style="width:;" id="vat_type" name="vat_type" class="form-control " onchange="orderBy()">
                                                <option value="1" {{ ($sales->vat ==  1) ? 'selected':''}}>%</option>
                                                <option value="2" {{ ($sales->vat ==  2) ? 'selected':''}}>BDT</option>
                                            </select>
                                        </div>
                                        <div class="position-relative form-group col-lg-5">
                                            <input name="vat_amount" id="vat_amount" value="{{$sales->vat_amount}}" type="text" class="form-control" onchange="orderBy()">
                                        </div>
                                  </div>
                                  <div class="row">
                                        <div class="position-relative form-group col-lg-4" style="text-align:right" >
                                            <label for="discount" >Discount</label>
                                        </div>
                                        <div class="position-relative form-group col-lg-3">
                                            <select style="width:;" id="discount_type" name="discount_type" class="form-control " onchange="orderBy()">
                                                <option value="1" {{ ($sales->discount ==  1) ? 'selected':''}}>%</option>
                                                <option value="2" {{ ($sales->discount ==  2) ? 'selected':''}}>BDT</option>
                                            </select>
                                        </div>
                                        <div class="position-relative form-group col-lg-5">
                                            <input name="discount_amount" id="discount_amount" value="{{$sales->discount_amount}}" type="text" class="form-control" onchange="orderBy()">
                                        </div>
                                  </div>
                                  <div class="row">
                                        <div class="position-relative form-group col-lg-4" style="text-align:right">
                                            <label for="discount_note" >Dis. Note</label>
                                        </div>
                                        <div class="position-relative form-group col-lg-8">
                                            <input name="discount_note" id="discount_note" value="{{$sales->discount_note}}" type="text" class="form-control">
                                        </div>
                                  </div>
                                  <div class="row">
                                        <div class="position-relative form-group col-lg-4" style="text-align:right">
                                            <label for="total_payable" >Total Payable</label>
                                        </div>
                                        <div class="position-relative form-group col-lg-8">
                                            <input name="total_payable" id="total_payable" value="{{$sales->total_amount}}" type="text" class="form-control">
                                        </div>
                                  </div>
                                  <div class="row">
                                        <div class="position-relative form-group col-lg-4" style="text-align:right">
                                            <label for="total_paid" >Total Paid</label>
                                        </div>
                                        <div class="position-relative form-group col-lg-8">
                                            <input name="total_paid" id="total_paid" value="{{$sales->payable_amount}}" type="text" class="form-control" onchange="orderPaid()">
                                        </div>
                                  </div>
                                  <div class="row">
                                        <div class="position-relative form-group col-lg-4" style="text-align:right">
                                            <label for="total_due" >Total Due</label>
                                        </div>
                                        <div class="position-relative form-group col-lg-8">
                                            <input name="total_due" id="total_due" value="{{$sales->total_amount - $sales->payable_amount}}" type="text" class="form-control">
                                        </div>
                                  </div>
                                </div>
                            </div>

                           
                           
                            
                            <button class="mt-1 btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection



@section('page_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
		$(function () {
		  $("#purchase_date").datepicker({ 
		        autoclose: true, 
		        todayHighlight: true,
		        showButtonPanel: true,
		        changeMonth: true,
		        format: 'dd/mm/yyyy'
		  }).datepicker('update', new Date());
		});
		
$(document).ready(function() {
    productChg(1);
    productChg(2);
    productChg(3);
    productChg(4);
    productChg(5);
    productChg(6);
var sl = $('#rowCount').val();;
$('.plusbtn').click(function(){
    sl++;
    //alert('dsfdsf');
    $(".test").append('<tr id="tr_'+sl+'"><td>'+sl+'<span style="padding-left: 0%; cursor: pointer;"'
   +' onclick="remove_tr('+sl+')" class="glyphicon glyphicon-remove" aria-hidden="true"><i class="fa fa-times"></i></span></td>'
   +'<td><select style="width:;" id="category_id'+sl+'" onchange="productChg('+sl+')" name="category_id[]" class="form-control" required>'
   +'<option value="" >Select an option</option>'
   +'@foreach($categories as $category)<option value="{{ $category->id }}">{{ $category->category_name }}</option>@endforeach'
   +'</select></td>'
   +'<td><select style="width:;" id="product_id'+sl+'" name="product_id[]" class="form-control" onchange="productRate('+sl+')">'
   +'<option value="" >Select an option</option></select></td>'
   +'<td><select style="width:;" id="unit_id'+sl+'" name="unit_id[]" class="form-control" ><option value="" >Select an option</option>'
   +'@foreach($units as $unit)<option value="{{ $unit->id }}">{{ $unit->unit_name }}</option> @endforeach'
   +'</select></td>'
  +' <td><input class="form-control" id="product_qty'+sl+'" name="product_qty[]" style="width: 100%" type="text" value="1" onchange="productRate('+sl+')"></td>'
  +' <td><input class="form-control" id="rate'+sl+'" name="rate[]" style="width: 100%" type="text" value="0" onchange="productRate('+sl+')"></td>'
  +'<td><select style="width:;" id="product_discount'+sl+'" name="product_discount[]" class="form-control" onchange="productRate('+sl+')" >'
   +'<option value="1">%</option><option value="2">BDT</option></select></td>'
  +' <td><input class="form-control" id="discount'+sl+'" name="discount[]" style="width: 100%" type="text" value="0" onchange="productRate('+sl+')"></td>'
  +'<td><input id="amount'+sl+'" class="form-control" name="amount[]" style="width: 100%" type="text" value="0" required>'
  +'<input type="hidden" value="0" id="amount_old'+sl+'"></td></tr>'
  );
        
 

        $('#amount'+sl).bind('input', function() { 
            var inputvalue = parseFloat($(this).val()); // get the current value of the input field.
            var inputIdName = $(this).attr('id'); 
            var newsl = inputIdName.replace("amount", "");
            //alert(inputvalue);				    

            currValue = parseFloat($('#total_amount').val());
            oldValue = parseFloat($('#amount_old'+newsl).val());

            if(isNaN(inputvalue)) {
                inputvalue = 0;
            }
            if(isNaN(currValue)) {
                currValue = 0;
            }
            if(isNaN(oldValue)) {
                oldValue = 0;
            }
            //alert(newsl);
            newvalue = currValue - oldValue;
            setValue = newvalue + inputvalue;
            $('#total_amount').val((setValue).toFixed(2));
            $('#total_payable').val((setValue).toFixed(2));
            $('#amount_old'+newsl).val((inputvalue).toFixed(2));
            //$('#amount_old'+newsl).val(inputvalue);
        });
    				
});
});		

function remove_tr(remove_tr_id){
        var value = parseFloat($('#amount'+remove_tr_id).val());
        var old_total_amount = $('#total_amount').val();
        if(isNaN(value)) {
            value = 0;
        }
        if(isNaN(old_total_amount)) {
            old_total_amount = 0;
        }
        setValue = old_total_amount - value;
        $('#total_amount').val((setValue).toFixed(2));
        $("#tr_"+remove_tr_id).remove();
        //rowCount-1;
        //alert(remove_tr_id);
    }
    function productChg(i) {
			var category_id = $("#category_id"+i).val();
			
			$.ajax({
                type: 'GET',
                url: "{{ route('catbyproductid', "+1+")}}",
                datatype: 'JSON',
                success:function(data){
                    console.log(data);
                    if (data) {
                      $('#product_id'+i).empty();
                     
                        $.each(data, function(index, object) {
                            $("#product_id"+i).append('<option value="' + object.id + '">' + object.product_name + '</option>');
                        });
                     
                      $("#product_id"+i).append("<option value='' selected='selected'>Select</option>");
                      
                  } // if
                },
                error:function(data){
                    console.log(data);
                }
            });
		}
    function productRate(i) {
			var product_qty = $("#product_qty"+i).val();
			var rate = $("#rate"+i).val();
			var discount = $("#discount"+i).val();
			var discount_type = $("#product_discount"+i).val();

            var ratet = (product_qty * rate);
            if(discount_type == 1){
                var ratet2 = (ratet / 100)
                var discount = (discount * ratet2)
                var amountT = ratet - discount;
            }else{
                var amountT = ratet - discount;
            }

            $("#amount"+i).val(amountT);
             var tdamtT=0;
            $('tr[id*="tr_"]').each(function (i, v) {
                  var srlArray = $(this).attr('id').split('_');
                  var srl = srlArray[1];
                  var tdamt = $('#amount'+srl).val();
                  tdamtT += parseFloat(tdamt);
                });
            $("#sub_total").val(tdamtT);vat_type
            
			var vat_type = $("#vat_type").val();
			var vat_amount = $("#vat_amount").val();
			var discount_typem = $("#discount_type").val();
			var discount_amount = $("#discount_amount").val();
            
            if(vat_type == 1){
                var mainbalance = (tdamtT / 100)
                var vat_amount = (vat_amount * mainbalance)
                var vat_amountT = parseFloat(tdamtT) + parseFloat(vat_amount);
            }else{
                var vat_amountT = parseFloat(tdamtT) - parseFloat(vat_amount);
            }

            if(discount_typem == 1){
                var mainbalance2 = (vat_amountT / 100)
                var discount_amount = (discount_amount * mainbalance2)
                var balance = parseFloat(vat_amountT) - parseFloat(discount_amount);
            }else{
                var balance = parseFloat(vat_amountT) - parseFloat(discount_amount);
            }

            $("#total_payable").val(balance);
            $("#total_paid").val(balance);
		}
    function orderBy() {
			
            
			var tdamtT = $("#sub_total").val();
			var vat_type = $("#vat_type").val();
			var vat_amount = $("#vat_amount").val();
			var discount_typem = $("#discount_type").val();
			var discount_amount = $("#discount_amount").val();
            
            if(vat_type == 1){
                var mainbalance = (tdamtT / 100)
                var vat_amount = (vat_amount * mainbalance)
                var vat_amountT = parseFloat(tdamtT) + parseFloat(vat_amount);
            }else{
                var vat_amountT = parseFloat(tdamtT) - parseFloat(vat_amount);
            }

            if(discount_typem == 1){
                var mainbalance2 = (vat_amountT / 100)
                var discount_amount = (discount_amount * mainbalance2)
                var balance = parseFloat(vat_amountT) - parseFloat(discount_amount);
            }else{
                var balance = parseFloat(vat_amountT) - parseFloat(discount_amount);
            }

            $("#total_payable").val(balance);
            $("#total_paid").val(balance);
		}
        function orderPaid() {
			
            
			var tdamtT = $("#total_payable").val();
			var total_paid = $("#total_paid").val();
              var total_due = parseFloat(tdamtT) - parseFloat(total_paid);
            $("#total_due").val(total_due);
		}
	
	

	
        $( ".select2" ).select2( { placeholder: "Select an option", maximumSelectionSize: 6 } );
		
	</script>
@endsection