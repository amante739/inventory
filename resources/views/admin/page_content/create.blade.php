@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Page Manager</h1>
            </ul>

        </nav>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        @can('page-manager-create')
        <form role="form" action="{{ route('pagemanagers.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-12">
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
                </div>

                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" required name="page_title" class="form-control" id="title" placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="shortnote">Short Note</label>
                                        <textarea class="form-control" required name="page_short_note" id="shortnote"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="description">Page Description</label>
                                        <textarea class="form-control" name="page_description" rows="5" id="page_description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Meta Information(Optional)</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="page_meta_title">Meta Title</label>
                                        <input type="text" name="page_meta_title" class="form-control" id="page_meta_title" placeholder="Page Meta Title">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="page_meta_key">Meta Key</label>
                                        <textarea class="form-control" name="page_meta_key" id="page_meta_key"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="page_meta_description">Meta Desc</label>
                                        <textarea class="form-control" name="page_meta_description" rows="5" id="page_meta_description"></textarea>
                                    </div>
                                </div>
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
</section>
@endsection

@section('extrajs')
<script>
    $('#inputState').on('change', function(e) {
        if ($(this).val()) {
            $.get("/submission/getcounties/" + $(this).val(), function(data) {

                $element = $("#inputcounty");
                $element.removeAttr('disabled');
                $element.find('option').remove().end().append("<option value=" + '' +
                    ">Choose County</option>");
                $(data).each(function() {
                    $element.append("<option value='" + this.id +
                        "'>" + this.county_name +
                        "</option>");
                });

            });
        }

    });

    $('#inputcounty').on('change', function(e) {
        if ($(this).val()) {
            $.get("/submission/getcities/" + $(this).val(), function(data) {

                $element = $("#city");
                $element.removeAttr('disabled');
                $element.find('option').remove().end().append("<option value=" + '' +
                    ">Choose City</option>");
                $(data).each(function() {
                    $element.append("<option value='" + this.id +
                        "'>" + this.city_name +
                        "</option>");
                });

            });
        }

    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#page_description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection