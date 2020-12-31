@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Role</h1>
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
                        @can('role-create')
                        <a href="{{ route('roles.create') }}">
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


                        @can('role-list')
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Role Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key => $role)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('role-view-permission')
                                        <a class="btn" href=" {{ route('roles.show', $role->id) }}">
                                            <i class="fa fa-copy"></i>
                                        </a>
                                        @endcan

                                        @can('role-edit')
                                        <a class="btn" href="{{ route('roles.edit', $role->id) }}">
                                            <i class="fa fa-edit"></i>
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
    </div>
</section>
@endsection


@section('extrajs')
<script>
    $(document).ready(function() {
        $(".check").click(function() {
            $(".checky").prop("checked", true);
        });
        $(".uncheck").click(function() {
            $(".checky").prop("checked", false);
        });
    });
</script>
@endsection