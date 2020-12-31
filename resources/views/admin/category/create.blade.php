@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Category</h1>
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

                        @can('category-create')
                        <form menu="form" action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label for="iscat">Select Parent</label>

                                        <select class="form-control select2" id="cat_parent_id" style="width: 100%;" name="cat_parent_id">
                                            <option value="" selected="selected">Select Parent</option>
                                            @foreach($all_cats as $all_cat)
                                            <option value="{{ $all_cat->id }}">{{ $all_cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="category_name">Title</label>
                                        <input type="text" class="form-control" name="category_name" id="category_name" required placeholder="Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="category_description">Description</label>
                                        <textarea class="form-control" name="category_description" rows="10" id="category_description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="category_meta_key">Meta Title</label>
                                        <input type="text" name="category_meta_key" class="form-control" id="category_meta_key" placeholder="Meta Title">
                                    </div>


                                    <div class="form-group">
                                        <label for="category_meta_description">Meta Description</label>
                                        <textarea class="form-control" name="category_meta_description" rows="5" id="category_meta_description"></textarea>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endcan

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">

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
        .create(document.querySelector('#category_description'), {

        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection