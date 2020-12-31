@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>State</h1>
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
                        <h3 class="card-title">edit</h3>
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
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        @can('county-edit')
                        <form role="form" action="{{ route('counties.update', $county_data->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="category">Category</label>
                                                <select id="inputCat" disabled required name="cat_id" class="form-control">
                                                    <option value="">Choose Category</option>
                                                    @foreach($all_category as $category)
                                                    <option value="{{ $category->id }}" @if($county_data->cat_id == $category->id) selected @endif>{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputState">State</label>
                                                <select id="inputState" disabled required name="state_id" class="form-control">
                                                    <option value="">Choose State</option>
                                                    @foreach($all_state as $state)
                                                    <option value="{{ $state->id }}" @if($county_data->state_id == $state->id) selected @endif>{{ $state->state_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="county">County</label>
                                                <select id="inputCounty" disabled required name="county_id" class="form-control">
                                                    <option value="">Choose County</option>
                                                    @foreach($all_county as $county)
                                                    <option value="{{ $county->id }}" @if($county_data->county_id == $county->id) selected @endif>{{ $county->county_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="county_title">Title</label>
                                            <input type="text" class="form-control" name="county_title" value="{{ $county_data->county_title }}" id="county_title" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="county_description">Description</label>
                                            <textarea class="form-control" name="county_description" id="county_description" cols="30" rows="5">{{ $county_data->county_description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="county_meta_title">Meta Title</label>
                                            <input type="text" class="form-control" name="county_meta_title" value="{{ $county_data->county_meta_title }}" id="county_meta_title" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="county_meta_description">Meta Description</label>
                                            <textarea class="form-control" name="county_meta_description" id="county_meta_description" cols="30" rows="5">{{ $county_data->county_meta_description }}</textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
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
        .create(document.querySelector('#county_description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection