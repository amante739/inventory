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
                                <th>Property Name</th>
                                <th>Category Name</th>
                                <th>State Name</th>
                                <th>County Name</th>
                                <th>City Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($scrape_datas as $key => $scrape_data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td style="width: 25%;">{{ $scrape_data->property_name }}</td>
                                <td>
                                    @foreach($scrape_data->category as $key => $value)
                                    <label class="badge">({{ $value }})</label>
                                    @endforeach
                                </td>
                                <td>{{ $scrape_data->state }}</td>
                                <td>{{ $scrape_data->county }}</td>
                                <td>{{ $scrape_data->city }}</td>
                                <td>
                                    <a class="btn" href="{{ url('show_detail', $scrape_data->id) }}">
                                        <i class="fa fa-copy"></i>
                                    </a>
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