@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="col-12 col-md-12">
            <nav class="navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <h1>Suppliers</h1>
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


                        </div>
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
                            <form action="{{ route('suppliers.update',$suppliers->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="supplier_name" class="col-sm-2 col-form-label">Name*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="supplier_name" id="supplier_name" value="{{$suppliers->supplier_name}}" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="supplier_email" class="col-sm-2 col-form-label">Email*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="supplier_email" id="supplier_email" value="{{$suppliers->supplier_email}}" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="supplier_phone" class="col-sm-2 col-form-label">Phone*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="supplier_phone" id="supplier_phone" value="{{$suppliers->supplier_phone}}" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="supplier_cell_phone" class="col-sm-2 col-form-label">Mobile*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="supplier_cell_phone" id="supplier_cell_phone" value="{{$suppliers->supplier_cell_phone}}" required
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="supplier_address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                            <textarea class="form-control" name="supplier_address" id="supplier_address"  cols="20"
                                      rows="5">{{$suppliers->supplier_address}}</textarea>
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
