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
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        @can('state-create')
                        <form role="form" action="{{ route('states.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="category">Category</label>
                                                <select id="inputCat" required name="cat_id" class="form-control">
                                                    <option value="">Choose Category</option>
                                                    @foreach($all_category as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputState">State</label>
                                                <select id="inputState" disabled required name="state_id" class="form-control">
                                                    <option value="">Choose State</option>
                                                    @foreach($all_state as $state)
                                                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="state_title">State Title</label>
                                            <input type="text" class="form-control" name="state_title" id="state_title" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="state_description">Description</label>
                                            <textarea class="form-control" name="state_description" id="state_description" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="state_meta_title">Meta Title</label>
                                            <input type="text" class="form-control" name="state_meta_title" id="state_meta_title" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="state_meta_description">Meta Description</label>
                                            <textarea class="form-control" name="state_meta_description" id="state_meta_description" cols="30" rows="5"></textarea>
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

<script>
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
</script>
@endsection