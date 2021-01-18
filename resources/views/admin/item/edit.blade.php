@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Items Update</h1>
            </ul>

        </nav>
    </div>
</section>
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

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
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                            <form action="{{ route('items.update',$items->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="item_name" class="col-sm-2 col-form-label">Item Name*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="item_name" id="item_name" value="{{$items->item_name}}" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-2 col-form-label">Item Category*</label>
                                        <div class="col-sm-10">
                                            <select name="category_id" id="category_id" required class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ ( $category->id  == $items->category_id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item_code" class="col-sm-2 col-form-label">Item Code*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="item_code" id="item_code" value="{{$items->item_code}}" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item_unit_id" class="col-sm-2 col-form-label">Item Unit*</label>
                                        <div class="col-sm-10">
                                            <select name="item_unit_id" id="item_unit_id" required class="form-control">
                                                <option value="">Select Unit</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}" {{ ( $unit->id  == $items->item_unit_id) ? 'selected' : '' }}>{{ $unit->unit_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success btn-sm" value="Update">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



@endsection
