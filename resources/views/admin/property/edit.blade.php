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
                        <h3 class="card-title">Edit Property Information</h3>
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

                        @can('property-edit')
                        <form role="form" action="{{ route('properties.update', $property->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label for="category">Category</label>
                                            <select id="category" required name="cat_id" class="form-control" enctype="multipart/form-data">
                                                <option value="">Choose Category</option>
                                                @foreach($all_category as $category)
                                                <option value="{{ $category->id }}" @if($category->id == $property->cat_id) selected @endif>
                                                    {{ $category->category_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputState">State</label>
                                            <select id="inputState" required name="state_id" class="form-control">
                                                <option value="">Choose State</option>
                                                @foreach($all_state as $state)
                                                <option value="{{ $state->id }}" @if($state->id ==
                                                    $property->state_id) selected @endif>
                                                    {{ $state->state_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="county">County</label>
                                            <select id="inputcounty" required name="county_id" class="form-control">
                                                <option value="">Choose County</option>
                                                @foreach($all_county as $county)
                                                <option value="{{ $county->id }}" @if($county->id ==
                                                    $property->county_id) selected @endif>
                                                    {{ $county->county_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="city">City</label>
                                            <select id="city" required name="city_id" class="form-control">
                                                <option value="">Choose City</option>
                                                @foreach($all_city as $city)
                                                <option value="{{ $city->id }}" @if($city->id ==
                                                    $property->city_id) selected @endif>
                                                    {{ $city->city_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="name">Property Name</label>
                                            <input type="text" required name="property_name" value="{{ $property->property_name }}" class="form-control" id="name" placeholder="Property Name">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="address">Address</label>
                                            <input type="text" required name="property_address" value="{{ $property->property_address }}" class="form-control" id="address" placeholder="Enter Adress">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" required name="property_phone" value="{{ $property->property_phone }}" placeholder="Enter Phone">
                                        </div>

                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="summaryImage">Summary Image</label>
                                            <input type="file" name="property_summary_image" value="{{ $property->property_summary_image }}" class="form-control" id="summaryImage">
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label for="shortnote">Property Short Note</label>
                                            <textarea class="form-control" required name="property_short_note" id="shortnote">{{ $property->property_short_note }}</textarea>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Property Description</label>
                                            <textarea class="form-control" required name="property_description" rows="10" id="description">{{ $property->property_description }}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="menu_name">Status</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="propert_status1" name="propert_status" value="1" {{ $property->propert_status == 1 ? 'checked' : '' }}>
                                            <label for="propert_status1" class="custom-control-label">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="propert_status2" name="propert_status" value="0" {{ $property->propert_status == 0 ? 'checked' : '' }}>
                                            <label for="propert_status2" class="custom-control-label">Inactive
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="property_meta_title">Meta Title</label>
                                        <input type="text" class="form-control" name="property_meta_title" value="{{ $property->property_meta_title }}" id="property_meta_title" placeholder="Property Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="property_meta_description">Meta Description</label>
                                        <textarea class="form-control" name="property_meta_description" id="property_meta_description" cols="30" rows="5">{{ $property->property_meta_description }}</textarea>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Update
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