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
                            <div class="form-group row">
                                <label for="category_id" class="col-sm-2 col-form-label">Item Category*</label>
                                <div class="col-sm-8">
                                    <select name="category_id" id="category_id" required class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="button" class="btn btn btn-primary btn-m" id="add_more" value="Add More Item">
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
                            <tbody>
                                <tr>
                                    <td>1.</td>

                                    <input type="hidden" id="t_1" data-type="productName" name="product_name[]"
                                        class="t_name form-control">

                                    <td><input name="item_code[]" type="text" class="item_code form-control"
                                            id="item_code_1" required=""></td>
                                    <td>
                                        <input name="item_name[]" type="text" class="item_name form-control"
                                            id="item_name_1" required="">
                                    </td>
                                    <td>
                                        <select name="item_unit[]" id="item_unit_1" class="item_unit form-control"
                                            required="">
                                            <option selected="" disabled="">Select</option>
                                            <option value="28">Auns</option>
                                            <option value="3">Bag</option>
                                            <option value="33">Bandle </option>
                                            <option value="13">Book</option>
                                            <option value="22">Bottle</option>
                                            <option value="11">Box</option>
                                            <option value="19">Cane</option>
                                            <option value="30">Cft</option>
                                            <option value="27">Coil</option>
                                            <option value="29">Coil/Mtr</option>
                                            <option value="38">Cone</option>
                                            <option value="26">Dozen</option>
                                            <option value="36">Drum</option>
                                            <option value="9">Feet</option>
                                            <option value="23">Gallon</option>
                                            <option value="21">Gm</option>
                                            <option value="41">Item</option>
                                            <option value="35">Jur</option>
                                            <option value="2">Kg</option>
                                            <option value="8">Kg/bag</option>
                                            <option value="7">Lbs</option>
                                            <option value="24">Ltr</option>
                                            <option value="31">M3</option>
                                            <option value="39">ML</option>
                                            <option value="17">Mtr</option>
                                            <option value="25">Onz</option>
                                            <option value="16">Pair</option>
                                            <option value="12">Pc</option>
                                            <option value="1">Pcs</option>
                                            <option value="5">Pkt</option>
                                            <option value="40">Plate</option>
                                            <option value="10">Rft</option>
                                            <option value="14">Rft/Inch</option>
                                            <option value="32">Rin</option>
                                            <option value="20">Roll</option>
                                            <option value="4">Set</option>
                                            <option value="6">Sft</option>
                                            <option value="15">Tin</option>
                                            <option value="37">UNIT</option>
                                            <option value="34">Y</option>
                                            <option value="18">Yds</option>
                                        </select>
                                    </td>


                                    <input type="hidden" id="tag_1" data-type="productName" name="group_name[]"
                                        class="paname form-control">
                                    <td>
                                        <a href="javascript:void(0);" id="deleteRow_1"
                                            class="deleteRow btn btn-danger btn-flat btn-sm">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <div class="form-group row">

                                <div class="col-sm-6 d-flex justify-content-center">
                                    <input type="submit" class="btn btn-success btn-m " value="Save">
                                </div>
                                <div class="col-sm-6 d-flex justify-content-center">
                                    <button type="button" class="btn btn-danger btn-m" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection
@section('extrajs')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Your jquery code
            $("#add_more").click(function() {
               // alert('JQuery is ready!');
            });

        });
    </script>
@endsection
