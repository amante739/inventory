@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>City Information</h1>
            </ul>

        </nav>
    </div>
</section>
<section class="content">
    <div class="container-fluid">

        @can('city-list')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List</h3>
                    @can('city-create')
                    <a href="{{ route('cities.create') }}">
                        <button class="btn btn-success btn-sm float-right">
                            Add New
                        </button>
                    </a>
                    @endcan
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

                    @can('city-list')
                    <table id="example1" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Category Name</th>
                                <th>State Name</th>
                                <th>County Name</th>
                                <th>City Name</th>
                                <th>City Title</th>
                                <th style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_city_info as $key => $city)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $city->category_name }}</td>
                                <td>{{ $city->state_name }}</td>
                                <td>{{ $city->county_name }}</td>
                                <td>{{ $city->city_name }}</td>
                                <td>{{ $city->city_title }}</td>
                                <td>

                                    @can('city-edit')
                                    <a class="btn" href="{{ route('cities.edit', $city->id) }}">
                                        <i data-toggle="tooltip" data-original-title="Edit Information" class="fa fa-edit"></i>
                                    </a>
                                    @endcan

                                    @can('city-delete')
                                    <a class="btn" href="{{ url('citydelete', $city->id) }}" onclick="return confirm('Are you sure?')">
                                        <i data-toggle="tooltip" data-original-title="Delete City Data" class="fas fa-trash"></i>
                                    </a>
                                    @endcan

                                    @can('city-image-list')
                                    <a class="btn" href="{{ url('city/images', $city->city_id) }}">
                                        <i data-toggle="tooltip" data-original-title="Image Folder" class="fas fa-folder"></i>
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
            @endcan
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