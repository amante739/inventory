@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
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
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <!-- /.card-header -->
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

                        @can('menu-placement-edit')
                        <form role="form" action="{{ route('menuplacements.update', $menu_placements->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="menu_placement_name">Title</label>
                                            <input type="text" class="form-control" name="menu_placement_name" id="menu_placement_name" value="{{ $menu_placements->menu_placement_name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="menu_placement_slug">Identifier</label>
                                            <input type="text" class="form-control" name="menu_placement_slug" id="menu_placement_slug" value="{{ $menu_placements->menu_placement_slug }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="menu_name">Status</label>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="menu_placement1" name="menu_placement_status" value="1" {{ $menu_placements->menu_placement_status == 1 ? 'checked' : '' }}>
                                                <label for="menu_placement1" class="custom-control-label">Active</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="menu_placement2" name="menu_placement_status" value="0" {{ $menu_placements->menu_placement_status == 0 ? 'checked' : '' }}>
                                                <label for="menu_placement2" class="custom-control-label">Inactive
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Submit
                                    </button>
                                </div>

                            </div>
                        </form>
                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection