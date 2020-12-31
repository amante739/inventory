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

                        @can('city-edit')
                        <form role="form" action="{{ route('cities.update', $city_data->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="category">Category</label>
                                                <select id="inputCat" required disabled name="cat_id" class="form-control">
                                                    <option value="">Choose Category</option>
                                                    @foreach($all_cat as $category)
                                                    <option value="{{ $category->id }}" @if($city_data->cat_id == $category->id) selected @endif>{{ $category->category_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputState">State</label>
                                                <select id="inputState" required disabled name="state_id" class="form-control">
                                                    <option value="">Choose State</option>
                                                    @foreach($states as $state)
                                                    <option value="{{ $state->id }}" @if($city_data->state_id == $state->id) selected @endif>{{ $state->state_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="county">County</label>
                                                <select id="inputCounty" required disabled name="county_id" class="form-control">
                                                    <option value="">Choose County</option>
                                                    @foreach($counties as $county)
                                                    <option value="{{ $county->id }}" @if($city_data->county_id == $county->id) selected @endif>{{ $county->county_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputcity">City</label>
                                                <select id="inputcity" required disabled name="city_id" class="form-control">
                                                    <option value="">Choose City</option>
                                                    @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" @if($city_data->city_id == $city->id) selected @endif>{{ $city->city_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="city_title">Title</label>
                                            <input type="text" class="form-control" name="city_title" id="city_title" value="{{ $city_data->city_title }}" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="city_description">Description</label>
                                            <textarea class="form-control" name="city_description" id="city_description" cols="30" rows="5">{{ $city_data->city_description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="city_meta_title">Meta Title</label>
                                            <input type="text" class="form-control" name="city_meta_title" id="city_meta_title" value="{{ $city_data->city_meta_title }}" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="city_meta_description">Meta Description</label>
                                            <textarea class="form-control" name="city_meta_description" id="city_meta_description" cols="30" rows="5">{{ $city_data->city_meta_description }}</textarea>
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

    ClassicEditor
        .create(document.querySelector('#city_description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection