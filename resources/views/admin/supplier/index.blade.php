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
                        <h3 class="card-title">List</h3>
                        <button class="btn btn-success btn-sm float-right" data-toggle="modal"
                            data-target=".add-supplier-modal">
                            Add Supplier
                        </button>

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


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Mobile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $key => $supplier)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $supplier->supplier_name }}</td>
                                    <td>{{ $supplier->supplier_email }}</td>
                                    <td>{{ $supplier->supplier_phone }}</td>
                                    <td>{{ $supplier->supplier_cell_phone }}</td>
                                    <td>
                                        <a class="btn" href="{{ route('suppliers.edit',$supplier->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn" onclick="return confirm('Are you sure?')" href="">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Add Modal Supplier --}}
<div class="modal fade add-supplier-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('suppliers.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="supplier_name" class="col-sm-2 col-form-label">Name*</label>
                        <div class="col-sm-10">
                            <input type="text" name="supplier_name" id="supplier_name" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="supplier_email" class="col-sm-2 col-form-label">Email*</label>
                        <div class="col-sm-10">
                            <input type="text" name="supplier_email" id="supplier_email" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="supplier_phone" class="col-sm-2 col-form-label">Phone*</label>
                        <div class="col-sm-10">
                            <input type="text" name="supplier_phone" id="supplier_phone" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="supplier_cell_phone" class="col-sm-2 col-form-label">Mobile*</label>
                        <div class="col-sm-10">
                            <input type="text" name="supplier_cell_phone" id="supplier_cell_phone" required
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="supplier_address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="supplier_address" id="supplier_address" cols="20"
                                rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-sm" value="Save">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
