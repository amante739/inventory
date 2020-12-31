@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>City Images</h1>
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

                        <form role="form" action="{{ url('city/images/store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="city_image">Image</label>
                                            <input type="file" name="city_image" class="form-control" id="city_image">
                                        </div>
                                        <input type="hidden" name="city_id" value="{{ $id }}" class="form-control" id="city_id">

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">City Images</h3>
                        <!-- <a href="{{ url('city/images/create', $id) }}">
                            <button class="btn btn-success btn-sm float-right">
                                Add New
                            </button>
                        </a> -->
                    </div>
                    <div class="card-body">
                        <div class="row">

                            @foreach($city_datas as $city_data)
                            <div class="col-sm-2">
                                <a href="{{ asset('storage/'.$city_data->city_image) }}" data-toggle="lightbox" data-gallery="gallery">
                                    <img style="height: 200px;width:230px;" src="{{ asset('storage/'.$city_data->city_image) }}" class="img-fluid mb-2" alt="City Image" />
                                    <p class="text-center"><a style="color: #106241;" onclick="return confirm('Are you sure?')" href="{{ url('city/images/delete', $city_data->id) }}">Delete this picture</a></p>
                                </a>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('extrajs')

<!-- Ekko Lightbox -->
<script src="{{ asset('admin/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- Filterizr-->
<script src="{{ asset('admin/plugins/filterizr/jquery.filterizr.min.js') }}"></script>

<script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>
@endsection