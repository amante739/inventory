@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Add Multiple Items</h1>
            </ul>

        </nav>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create</h3>
                    </div>
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
                        <form action="{{ route('items.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="category_id" class="col-sm-2 col-form-label">Item Category*</label>
                                <div class="col-sm-2">
                                    <select name="category_id" id="category_id" required class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <table class="table" id="data_table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">SL</th>
                                        <th>Code</th>
                                        <th>Item Name</th>
                                        <th>Unit</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody id="tableDynamic">
                                    <tr>
                                        <td>1.</td>
                                        <td>
                                            <input name="item_code[]" required type="text"
                                                class="item_code form-control" id="item_code_1" required="">
                                        </td>
                                        <td>
                                            <input name="item_name[]" type="text" required
                                                class="item_name form-control" id="item_name_1" required="">
                                        </td>
                                        <td>
                                            <select name="item_unit_id[]" id="item_unit_id_1"
                                                class="item_unit_id form-control" required="">
                                                <option value="">Select</option>
                                                @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->unit_name}}</option>
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
<script>
    var scntDiv = $('#tableDynamic');
    var i = $('#tableDynamic tr').length + 1;
    $('#addRow').on('click', function () {
        $('<tr><td>' + i + '</td>\n\
<td><input type="text" name="item_code[]" id="item_code_'+i+'" class="item_code form-control" required </td>\n\
<td><input type="text" name="item_name[]" id="item_name_'+i+'" class="item_name form-control" required </td>\n\
<td>\n\
    <select id="item_unit_id_' + i + '" name="item_unit_id[]" class="item_unit_id form-control" required>\n\
        <option value="">Select</option>\n\
        @foreach($units as $unit)\n\
        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>\n\
        @endforeach\n\
    </select>\n\
</td>\n\
<td><a href="javascript:void(0);" id="deleteRow_' + i + '"  class="deleteRow btn btn-danger btn-flat btn-sm">Delete</a></td></tr>').appendTo(scntDiv);
        i++;    
        return false;
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

    // function checkadd() {
    //     var chk = confirm("Are you sure to add this record ?");
    //     if (chk) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    //     ;
    // }
</script>
@endsection