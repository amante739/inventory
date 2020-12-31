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

                        @can('state-edit')
                        <form role="form" action="{{ route('states.update', $state_info->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="category">Category</label>
                                                <select id="inputCat" name="cat_id" required disabled class="form-control">
                                                    <option value="">Choose Category</option>
                                                    @foreach($all_cat as $category)
                                                    <option value="{{ $category->id }}" @if ($state_info->cat_id == $category->id) selected @endif)>{{ $category->category_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputState">State</label>
                                                <select id="inputState" required disabled name="state_id" class="form-control">
                                                    <option value="">Choose State</option>
                                                    @foreach($states as $state)
                                                    <option value="{{ $state->id }}" @if ($state_info->state_id == $state->id) selected @endif)>{{ $state->state_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="state_title">Title</label>
                                            <input type="text" class="form-control" name="state_title" value="{{ $state_info->state_title }}" id="state_title" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="state_description">Description</label>
                                            <textarea class="form-control" name="state_description" id="state_description" cols="30" rows="5">{{ $state_info->state_description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="state_meta_title">Meta Title</label>
                                            <input type="text" class="form-control" name="state_meta_title" value="{{ $state_info->state_meta_title }}" id="state_meta_title" placeholder="Meta Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="state_meta_description">Meta Description</label>
                                            <textarea class="form-control" name="state_meta_description" id="state_meta_description" cols="30" rows="5">{{ $state_info->state_meta_description }}</textarea>
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
        .create(document.querySelector('#state_description'))
        .catch(error => {
            console.error(error);
        });
</script>

<!-- <script>
    $('#inputCat').on('change', function(e) {
        if ($(this).val()) {
            $.get("/submission/getstates/" + $(this).val(), function(data) {
                console.log(data);
                $element = $("#inputState");
                $element.removeAttr('disabled');
                $element.find('option').remove().end().append("<option value=" + '' +
                    ">Choose State</option>");
                $(data).each(function() {
                    $element.append("<option value='" + this.id +
                        "'>" + this.state_name +
                        "</option>");
                });


            });
        }
    });
</script> -->

@endsection