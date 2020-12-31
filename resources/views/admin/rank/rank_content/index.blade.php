dghsx
@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Area Rank Content Management</h1>
            </ul>

        </nav>
    </div>
</section>
<section class="content">
    <div class="container-fluid">

        @can('property-list')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List</h3>
                    <a href="{{ route('rankcontents.create') }}">
                        <button class="btn btn-success btn-sm float-right">
                            Add New
                        </button>
                    </a>
                </div>

                <div class="col-md-12">
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
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th style="width: 10px"></th>
                                <th>Tite</th>
                                <th>Rank Amount</th>
                                <th>Short Note</th>
                                <th>Average Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_rank_content as $key => $content)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $content->rank_content_title }}</td>
                                <td>{{ $content->rank_amount }}</td>
                                <td>{{ $content->rank_content_note }}</td>
                                <td>{{ $content->rank_average_amount }}</td>
                                <td>
                                    @if($content->rank_content_status)
                                    <h4 class="badge badge-success">Active</h4>
                                    @else
                                    <h4 class="badge badge-danger">Inactive</h4>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn" href="{{ route('rankcontents.edit', $content->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn" href="{{ url('rankcontentsdelete', $content->id) }}"
                                        onclick="return confirm('Are you sure?')">
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
        @endcan
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
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

</script>
@endsection
