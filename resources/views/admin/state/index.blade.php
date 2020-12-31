@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>State</h1>
            </ul>

        </nav>
    </div>
</section>
<section class="content">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List</h3>
                    @can('state-create')
                    <a href="{{ route('states.create') }}">
                        <button class="btn btn-success btn-sm float-right">
                            Add New
                        </button>
                    </a>
                    @endcan
                </div>
                <div class="card-body">@if (count($errors) > 0)
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

                    @can('state-list')
                    <table id="example1" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Category Name</th>
                                <th>State Name</th>
                                <th>State Code</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_state_info as $key => $state)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $state->category_name }}</td>
                                <td>{{ $state->state_name }}</td>
                                <td>{{ $state->state_code }}</td>
                                <td>
                                    @can('state-edit')
                                    <a class="btn" href="{{ route('states.edit', $state->id) }}">
                                        <i data-toggle="tooltip" data-original-title="Edit Information" class="fa fa-edit"></i>
                                    </a>
                                    @endcan

                                    @can('state-delete')
                                    <a class="btn" href="{{ url('statedelete', $state->id) }}" onclick="return confirm('Are you sure?')">
                                        <i data-toggle="tooltip" data-original-title="Delete State Data" class="fas fa-trash"></i>
                                    </a>
                                    @endcan

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('extracss')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endsection

@section('extrajs')

<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection