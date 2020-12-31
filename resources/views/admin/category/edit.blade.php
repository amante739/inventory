@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Category Update</h1>
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

                        @can('category-edit')
                        <form role="form" action="{{ route('categories.update', $cat->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="menu">Parent</label>
                                            <select class="form-control select2" style="width: 100%;" name="cat_parent_id">
                                                <option value="">Select Parent</option>
                                                @foreach($main_cats as $main_cat)
                                                <option value="{{ $main_cat->id }}" {{ ($cat->cat_parent_id == $main_cat->id) ? 'selected' : '' }}>
                                                    {{ $main_cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_name">Title</label>
                                            <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $cat->category_name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="category_description">description</label>
                                            <textarea class="form-control" name="category_description" id="category_description">{{ $cat->category_description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_meta_key">Meta Title</label>
                                            <input type="text" name="category_meta_key" class="form-control" value="{{ $cat->category_meta_key }}" id="category_meta_key" placeholder="Meta Title">
                                        </div>


                                        <div class="form-group">
                                            <label for="category_meta_description">Meta Description</label>
                                            <textarea class="form-control" name="category_meta_description" rows="5" id="category_meta_description">{{ $cat->category_meta_description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="menu_name">Status</label>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="cat_status1" name="category_status" value="1" {{ $cat->category_status == 1 ? 'checked' : '' }}>
                                                <label for="cat_status1" class="custom-control-label">Active</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="cat_status2" name="category_status" value="0" {{ $cat->category_status == 0 ? 'checked' : '' }}>
                                                <label for="cat_status2" class="custom-control-label">Inactive
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

@section('extrajs')
<script>
    ClassicEditor
        .create(document.querySelector('#category_description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection