@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Menu Placement</h1>
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
                        <a href="{{ route('menuplacements.create') }}">
                            <button class="btn btn-success btn-sm float-right">
                                Add New
                            </button>
                        </a>
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

                        @can('menu-placement-list')
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Identifier</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menu_placements as $key => $menu_placement)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <a href="{{ route('menus.show', $menu_placement->id) }}">
                                            {{ $menu_placement->menu_placement_name }}
                                        </a>
                                    </td>
                                    <td>{{ $menu_placement->menu_placement_slug }}</td>
                                    <td>
                                        @if($menu_placement->menu_placement_status)
                                        <h4 class="badge badge-success">Active</h4>
                                        @else
                                        <h4 class="badge badge-danger">Inactive</h4>
                                        @endif
                                    </td>
                                    <td>

                                        @can('menu-placement-edit')
                                        <a class="btn" href="{{ route('menuplacements.edit', $menu_placement->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endcan

                                        @can('menu-placement-delete')
                                        @if(!in_array($menu_placement->id, $menu_place_id))
                                        <a class="btn" onclick="return confirm('Are you sure?')" href="{{ url('menuplacementdelete', $menu_placement->id) }}">
                                            <i class="fas fa-trash"></i>
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
        </div>
    </div>
</section>
@endsection