@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Units</h1>
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
                            data-target=".add-unit-modal">
                            Add Unit
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
                                    <th>Unit Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $key => $unit)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $unit->unit_name}}</td>
                                    <td>
                                        @if($unit->unit_status)
                                        <h4 class="badge badge-success">Active</h4>
                                        @else
                                        <h4 class="badge badge-danger">Inactive</h4>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn" data-toggle="modal" data-target=".edit-unit-modal">
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

{{-- Add Modal Unit --}}
<div class="modal fade add-unit-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('units.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="unit_name" class="col-sm-2 col-form-label">Unit*</label>
                        <div class="col-sm-10">
                            <input type="text" name="unit_name" id="unit_name" required class="form-control">
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


{{-- Edit Modal Unit --}}
<div class="modal fade edit-unit-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="edit_unit_name">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="unit_name" class="col-sm-2 col-form-label">Unit*</label>
                        <div class="col-sm-10">
                            <input type="text" name="unit_name" id="unit_name" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-sm modal_update_click" value="Update">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('extrajs')
<script>
    $('.modal_update_click').on('click', function (event) {
        event.preventDefault();
        alert('zdfgzsd');
    });
</script>
@endsection