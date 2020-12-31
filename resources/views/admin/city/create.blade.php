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

                        @can('city-create')
                        <form role="form" action="{{ route('cities.store') }}" method="post">
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
                                                <select id="inputState" required disabled name="state_id" class="form-control">
                                                    <option value="">Choose State</option>
                                                    @foreach($all_state as $state)
                                                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="county">County</label>
                                                <select id="inputCounty" required disabled name="county_id" class="form-control">
                                                    <option value="">Choose County</option>
                                                    @foreach($all_county as $county)
                                                    <option value="{{ $county->id }}">{{ $county->county_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputCity">City</label>
                                                <select id="inputCity" required disabled name="city_id" class="form-control">
                                                    <option value="">Choose City</option>
                                                    @foreach($all_city as $city)
                                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="city_title">Title</label>
                                            <input type="text" class="form-control" name="city_title" id="city_title" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="city_description">Description</label>
                                            <textarea class="form-control" name="city_description" id="city_description" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="city_meta_title">Meta Title</label>
                                            <input type="text" class="form-control" name="city_meta_title" id="city_meta_title" placeholder="meta Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="city_meta_description">Meta Description</label>
                                            <textarea class="form-control" name="city_meta_description" id="city_meta_description" cols="30" rows="5"></textarea>
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
        .create(document.querySelector('#city_description'))
        .catch(error => {
            console.error(error);
        });
</script>



<script>
    $('#inputCat').on('change', function(e) {
        $("#inputState").removeAttr('disabled');
        $("#inputCounty").attr('disabled', 'disabled');
        $("#inputCity").attr('disabled', 'disabled');
    });



    $('#inputState').on('change', function(e) {
        if ($(this).val()) {
            $.get("/submission/getcoutiesbystate/" + $(this).val(), function(data) {
                console.log(data);
                $element = $("#inputCounty");
                $element.removeAttr('disabled');
                $element.find('option').remove().end().append("<option value=" + '' + ">Choose County</option>");
                $(data).each(function() {
                    $element.append("<option value='" + this.id + "'>" + this.county_name +
                        "</option>");
                });


            });
        }
    });

    $('#inputCounty').on('change', function(e) {
        if ($(this).val()) {

            var cat_id = $("#inputCat option:selected").val();
            var state_id = $("#inputState option:selected").val();


            $.get("/submission/getcountycity/" + cat_id + '/' + state_id + '/' + $(this).val(), function(data) {
                // console.log(data);
                $element = $("#inputCity");
                $element.removeAttr('disabled');
                $element.find('option').remove().end().append("<option value=" + '' + ">Choose City</option>");
                $(data).each(function() {
                    $element.append("<option value='" + this.id + "'>" + this.city_name + "</option>");
                });


            });
        }
    });
</script>

@endsection