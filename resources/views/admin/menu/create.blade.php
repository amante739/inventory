@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
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
                        <h3 class="card-title">Create</h3>
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

                        @can('menu-create')
                        <form role="form" action="{{ route('menus.store') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label for="iscat">Select Parent </label>

                                        <select class="form-control select2" id="cat_parent_id" style="width: 100%;" name="parent_id">
                                            <option value="" selected="selected">Select Parent</option>
                                            @foreach($main_menus as $main_menu)
                                            <option value="{{ $main_menu->id }}">{{ $main_menu->menu_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="menu_name">Title</label>
                                        <input type="text" class="form-control" required name="menu_name" id="menu_name">
                                    </div>

                                    <label for="menu_name">Menutype </label>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="menutype" id="static_page" value="page" checked>
                                            <label class="form-check-label" for="static_page">Static
                                                Page</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="menutype" id="category" value="category">
                                            <label class="form-check-label" for="category">Current Category</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="menutype" id="external_url" value="external_url">
                                            <label class="form-check-label" for="external_url">External Url
                                            </label>
                                        </div>
                                    </div>

                                    <div id="static_page_div" class="form-group col-md-5">
                                        <label for="iscat">Select Pages </label>

                                        <select class="form-control select2" required id="page_id" style="width: 100%;" name="page_id">
                                            <option value="" selected="selected">Select page</option>
                                            @foreach($all_pages as $all_page)
                                            <option value="{{ $all_page->id }}">{{ $all_page->page_title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="category_div" class="form-group col-md-5" style="display: none;">
                                        <label for="iscat">Select Category </label>

                                        <select class="form-control select2" id="cat_id" style="width: 100%;" name="cat_id">
                                            <option value="" selected="selected">Select Category</option>
                                            @foreach($all_cats as $all_cat)
                                            <option value="{{ $all_cat->id }}">{{ $all_cat->category_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="url_div" class="form-group col-md-5" style="display: none;">
                                        <label for="page_url">Url</label>
                                        <input type="text" class="form-control" name="page_url" id="page_url">
                                    </div>

                                    <div class="form-group">
                                        <label for="menu_order">Order</label>
                                        <input type="number" min="0" class="form-control" required name="menu_order" value="" id="menu_order">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="menu_name">Target Page</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="target_field1" name="target_field" value="1" checked>
                                            <label for="target_field1" class="custom-control-label">New Window</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="target_field2" name="target_field" value="0">
                                            <label for="target_field2" class="custom-control-label">Same Page
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="menu_meta_title">Meta Title</label>
                                        <input type="text" name="menu_meta_title" class="form-control" id="menu_meta_title" placeholder="Menu Meta Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="menu_meta_description">Meta Desc</label>
                                        <textarea class="form-control" name="menu_meta_description" rows="5" id="menu_meta_description"></textarea>
                                    </div>

                                    <input type="hidden" name="menu_placement_id" value="{{$id}}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-success btn-sm">
                                    Submit
                                </button>
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

@section('extrajs')
<script>
    $(document).ready(function() {
        $('input[name="menutype"]').click(function() {
            if ($(this).attr('id') == 'static_page') {
                $('#static_page_div').show();
                $("#page_id").prop('required', true);
            } else {
                $('#static_page_div').hide();
                $("#page_id").removeAttr('required');
            }

            if ($(this).attr('id') == 'category') {
                $('#category_div').show();
                $("#cat_id").prop('required', true);
            } else {
                $('#category_div').hide();
                $("#cat_id").removeAttr('required');
            }

            if ($(this).attr('id') == 'external_url') {
                $('#url_div').show();
                $("#page_url").prop('required', true);
            } else {
                $('#url_div').hide();
                $("#page_url").removeAttr('required');
            }

        });
    });
</script>
@endsection