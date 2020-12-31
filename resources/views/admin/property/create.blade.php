@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Property</h1>
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
                        <h3 class="card-title">New Property</h3>
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

                        @can('property-create')
                        <form role="form" action="{{ route('properties.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label for="category">Category</label>
                                            <select id="category" required name="cat_id" class="form-control">
                                                <option value="">Choose Category</option>
                                                @foreach($all_category as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputState">State</label>
                                            <select id="inputState" required name="state_id" class="form-control">
                                                <option value="">Choose State</option>
                                                @foreach($all_state as $state)
                                                <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="county">County</label>
                                            <select id="inputcounty" disabled required name="county_id" class="form-control">
                                                <option value="">Choose county</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="city">City</label>
                                            <select id="city" disabled required name="city_id" class="form-control">
                                                <option value="">Choose City</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="name">Property Name</label>
                                            <input type="text" required name="property_name" class="form-control" id="name" placeholder="Property Name">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="address">Address</label>
                                            <input type="text" required name="property_address" class="form-control" id="address" placeholder="Enter Adress">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" required name="property_phone" placeholder="Enter Phone">
                                        </div>

                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="summaryImage">Summary Image</label>
                                            <input type="file" required name="property_summary_image" class="form-control" id="summaryImage">
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label for="shortnote">Property Short Note</label>
                                            <textarea class="form-control" required name="property_short_note" id="shortnote"></textarea>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label for="description">Property Description</label>
                                            <textarea class="form-control" name="property_description" rows="10" id="description"></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="property_meta_title">Meta Title</label>
                                        <input type="text" class="form-control" name="property_meta_title" id="property_meta_title" placeholder="Property Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="property_meta_description">Meta Description</label>
                                        <textarea class="form-control" name="property_meta_description" id="property_meta_description" cols="30" rows="5"></textarea>
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
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection