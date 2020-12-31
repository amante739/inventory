@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Property</h1>
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
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <table id="example1" class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th style="width: 10px"></th>
                                <th>Category Name</th>
                                <th>State Name</th>
                                <th>City Name</th>
                                <th>Property Name</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_property as $key => $property)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $property->category_name }}</td>
                                <td>{{ $property->state_name }}</td>
                                <td>{{ $property->city_name }}</td>
                                <td>{{ $property->property_name }}</td>
                                <td>
                                    @if($property->propert_status)
                                    <h4 class="badge badge-success">Active</h4>
                                    @else
                                    <h4 class="badge badge-danger">Inactive</h4>
                                    @endif
                                </td>
                                <td>
                                    <img style="height:60px;width:100px;" src="{{ asset('storage/app/public/'.$property->property_summary_image) }}" alt="">
                                </td>
                                <td>
                                    @can('property-final-delete')
                                    <a class="btn" href="{{ url('propertiesdelete', $property->id) }}" onclick="return confirm('Are you sure?')">
                                        <i data-toggle="tooltip" data-original-title="Delete permanently" class="fas fa-trash"></i>
                                    </a>
                                    <a class="btn" href="{{ url('property-restore', $property->id) }}" onclick="return confirm('Are you sure to restore this property ?')">
                                        <i data-toggle="tooltip" data-original-title="Restore this Property" class="fas fa-undo"></i>
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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