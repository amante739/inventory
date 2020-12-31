@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Property Reviews</h1>
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

                    @can('review-list')
                    <table id="example1" class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th style="width: 10px"></th>
                                <th>Property</th>
                                <th>Review Star</th>
                                <th>Reviewed By</th>
                                <th>Approved By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_reviews as $key => $all_review)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $all_review->property_name }}</td>
                                <td>{{ $all_review->review_rate }}</td>
                                <td>{{ $all_review->name }}</td>
                                <td>
                                    @if ($all_review->approved_by != 0)
                                    {{ $all_review->approved_name }}
                                    @endif
                                </td>
                                <td>
                                    @if($all_review->review_status)
                                    <h4 class="badge badge-success">Active</h4>
                                    @else
                                    <h4 class="badge badge-danger">Inactive</h4>
                                    @endif
                                </td>
                                <td>

                                    @can('review-edit')
                                    @if($all_review->review_status == 0)
                                    <a class="btn" href="{{ route('reviews.edit', $all_review->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
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