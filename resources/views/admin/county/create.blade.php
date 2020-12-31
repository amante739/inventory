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

                        @can('county-create')
                        <form role="form" action="{{ route('counties.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="category">Category</label>
                                                <select id="inputCat" required name="cat_id" class="form-control">
                                                    <option value="">Choose Category</option>
                                                    @foreach($all_category as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputState">State</label>
                                                <select id="inputState" required disabled name="state_id" class="form-control">
                                                    <option value="">Choose State</option>
                                                    @foreach($all_state as $state)
                                                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="county">County</label>
                                                <select id="inputCounty" required disabled name="county_id" class="form-control">
                                                    <option value="">Choose County</option>
                                                    @foreach($all_county as $county)
                                                    <option value="{{ $county->id }}">{{ $county->county_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="county_title">Title</label>
                                            <input type="text" class="form-control" name="county_title" id="county_title" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="county_description">Description</label>
                                            <textarea class="form-control" name="county_description" id="county_description" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="county_meta_title">Meta Title</label>
                                            <input type="text" class="form-control" name="county_meta_title" id="county_meta_title" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="county_meta_description">Meta Description</label>
                                            <textarea class="form-control" name="county_meta_description" id="county_meta_description" cols="30" rows="5"></textarea>
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


<script>
    $('#inputCat').on('change', function(e) {
        $("#inputState").removeAttr('disabled');
        $("#inputCounty").attr('disabled', 'disabled');
    });

    $('#inputState').on('change', function(e) {
        var cat_id = $("#inputCat option:selected").val();
        if ($(this).val()) {
            $.get("/submission/getstatescouties/" + cat_id + '/' + $(this).val(), function(data) {
                console.log(data);
                $element = $("#inputCounty");
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
</script>

@endsection