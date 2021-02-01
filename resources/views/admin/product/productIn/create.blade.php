@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Product In</h1>
            </ul>

        </nav>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <form action="{{ url('productInStore') }}" method="post">
                                @csrf
                            @method('GET')
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-3 col-form-label">Purchase Order*</label>

                                    <label for="category_id" class="col-sm-3 col-form-label">Purchase Date*</label>

                                    <label for="category_id" class="col-sm-3 col-form-label">Quality Certificate*</label>

                                    <label for="category_id" class="col-sm-3 col-form-label">Supplier*</label>

                                </div>
                                <div class="form-group row ">

                                    <div class="col-sm-3">
                                        <input type="text" id="po_no" required="" name="po_no" class="po_no form-control">
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text" id="po_date" required=""  name="po_date" class="po_date form-control">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" id="qc_no" required=""  name="qc_no" class="qc_no form-control">
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="supplier_id" id="supplier_id" required class="form-control">
                                            <option value="">Select Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-3 col-form-label">Challan No.*</label>

                                    <label for="category_id" class="col-sm-3 col-form-label">Delivered Place*</label>

                                    <label for="category_id" class="col-sm-3 col-form-label">Delivered Date*</label>

                                    <label for="category_id" class="col-sm-3 col-form-label">Received/Checked By*</label>

                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-3">
                                        <input type="text" id="challan_no" required=""  name="challan_no" class="challan_no form-control">
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text" id="delivered_place" required=""  name="delivered_place" class="delivered_place form-control">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" id="delivered_date"  name="delivered_date" class="delivered_date form-control">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" id="received_by"  name="received_by" class="received_by form-control">
                                    </div>


                                </div>
                                <table class="table " id="data_table">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">SL</th>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Location</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tableDynamic">
                                    <tr>
                                        <td>1.</td>
                                        <input type="hidden" id="t_1" data-type="productName"   name="product_name[]" class="t_name form-control">
                                        <td>
                                            <div class="ui-widget">
                                            <input name="item_name[]" type="text" required
                                                   class="item_name form-control" id="item_name_1" required="">
                                            </div>


                                        </td>
                                        <td>
                                            <input name="quantity[]" required type="text"
                                                   class="quantity form-control" id="item_code_1" required="">
                                        </td>
                                        <td>

                                            <select name="item_location_id[]" id="item_location_id_1"
                                                    class="item_location_id form-control" required="">
                                                <option value="">Select</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->location_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" id="deleteRow_1"
                                               class="deleteRow btn btn-danger btn-flat btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="width: 48%;border-top: medium none;" rowspan="6">
                                            <br>
                                            <a href="javascript:void(0);" id="addRow" style="margin-left: 45px;"
                                               class="btn btn-info btn-flat btn-sm">Add Item</a>
                                        </td>
                                        <td>
                                            <br>
                                            <button type="submit" id="save" style="margin-left: 390px;"
                                                    class="btn btn-success btn-flat"
                                                    onclick="return checkadd();">Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('extrajs')

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
        $(function () {
            //alert("test");
            $('.po_date').datepicker({
                format: 'yyyy/mm/dd',
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });
            $('.delivered_date').datepicker({
                format: 'yyyy/mm/dd',
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });

        });
    </script>
    <script>
        $(document).ready(function () {
            var scntDiv = $('#tableDynamic');
            var i = $('#tableDynamic tr').length + 1;
            $('#addRow').on('click', function () {
                var rowgen='<tr><td>'+i+'<input type="hidden" id="t_'+i+'" data-type="productName"  name="product_name[]" placeholder="test" class="t_name form-control">\n\
<td><input type="text" name="item_name[]" id="item_name_'+i+'" class="item_name form-control" required /></td>\n\
<td><input type="text" name="quantity[]" id="quantity'+i+ '" class="quantity form-control" required /> </td>\n\
<td>\n\
    <select id="item_location_id_' + i + '" name="item_location_id[]" class="item_location_id form-control" required>\n\
        <option value="">Select</option>\n\
        @foreach($locations as $location)\n\
        <option value="{{ $location->id }}">{{ $location->location_name }}</option>\n\
        @endforeach\n\
    </select>\n\
</td>\n\
<td><a href="javascript:void(0);" id="deleteRow_' + i + '"  class="deleteRow btn btn-danger btn-flat btn-sm">Delete</a></td></tr>'
                $('#tableDynamic').append(rowgen);
                i++;
               // return false;
            });
        });
        $(document).on("click", ".deleteRow", function (e) {
            if ($('#tableDynamic tr').length > 1) {
                var target = e.target;

                var id_arr = $(this).attr('id');
                var id = id_arr.split("_");
                var element_id = id[id.length - 1];

                $(target).closest('tr').remove();
            } else {
                //alert('One row should be present in table');
            }
        });


        /*$(".item_name").on('keyup',function() {
            //alert("test");
            var query = $(this).val();

            var item_id =$(this).attr("id");
           // alert(item_id);
            var id_arr = $(this).attr('id');
            var id = id_arr.split("_");
            var element_id = id[id.length - 1];
            $.ajax({
                url:"{{ URL('itemSearch') }}",
                type:"GET",
                data:{search:query},
                dataType: 'json',
                success:function (res) {
                   // alert(data);
                   // console.log(data);
                    var _html='';
                    $.each(res.data, function (index, data) {
                        _html+='<li class="list-group"><a href="#" class="selectid" item_id="'+data.id+'" >'+data.item_name+'</a></li>';
                        $(".search-result").html(_html);

                    });

                }
            });

            // end of ajax call
        });
        $(document).on("click", ".selectid", function (e) {

                var target = e.target;

                var id_arr = $(this).attr('item_id');
                alert(id_arr);
                //var id = id_arr.split("_");
                //var element_id = id[id.length - 1];

               // $(target).closest('tr').remove();

        });*/
        /*$( ".item_name" ).autocomplete({
            source: "{{ URL('itemSearch') }}",
            minLength: 2,
            select: function( event, ui ) {
                console.log(ui.item.item_name);
                log( "Selected: " + ui.item.item_name + " aka " + ui.item.id );
            }
        });*/

    </script>
    <script>

        $(document).on("click",'.item_name' ,function() {
            $( ".item_name" ).autocomplete({

                source: function( request, response ) {
                    $.ajax( {
                        url: "{{ URL('itemSearch') }}",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function( data ) {
                            var result;
                            result=[{
                                label:'there is no match found'+request.term,
                                value:''
                            }];
                            // response( data );
                            console.log(data);
                            if(data.length)
                            {
                                result=$.map(data,function(obj){
                                    return{
                                        label:obj.item_name,
                                        value:obj.itam_name,
                                        data:obj
                                    };
                                });
                            }
                            response( result );

                        }
                    } );
                },
                minLength: 2,
                select: function( event, ui ) {
                    //console.log(ui);
                    var item_id =$(this).attr("id");
                    var id_arr = $(this).attr('id');
                    var id = id_arr.split("_");
                    var element_id = id[id.length - 1];
                    var data=ui.item.data;
                    //  alert(data.id);
                    $("#t_"+element_id).val(data.id);

                }
            } );

        });



    </script>

@endsection
