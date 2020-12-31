@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Menu</h1>
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
                        @can('menu-create')
                        <a href="{{ url('menus/create', $id) }}">
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

                        @can('menu-list')
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($main_menus as $key => $menu)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $menu->menu_name }}</td>
                                    <td>
                                        @if($menu->parent)
                                        <h4 class="badge badge-warning">{{ $menu->parent->menu_name }}</h4>
                                        @else
                                        <h4 class="badge badge-info">ROOT</h4>
                                        @endif
                                    </td>
                                    <td>
                                        @if($menu->menu_status)
                                        <h4 class="badge badge-success">Active</h4>
                                        @else
                                        <h4 class="badge badge-danger">Inactive</h4>
                                        @endif
                                    </td>
                                    <td>
                                        @can('menu-edit')
                                        <a class="btn" href="{{ route('menus.edit', $menu->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endcan

                                        @can('menu-delete')
                                        <a class="btn" href="{{ url('menudelete', $menu->id) }}" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
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
            $("#menuselect").attr("disabled", "disabled");
        });

        $(".uncheck").click(function() {
            $("#menuselect").removeAttr("disabled", "disabled");
        });
    });


    $('input:radio[id="is_cat_1"]').change(function() {
        $("#menuselect").prop('required', true);
    });

    $('input:radio[id="is_cat_2"]').change(function() {
        $("#menuselect").removeAttr('required');
    });
</script>
@endsection