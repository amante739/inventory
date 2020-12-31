@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>miscellaneous</h1>
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
                        <h3 class="card-title">Update</h3>
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
                        <form role="form" action="{{ url('home/banner/update', 1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="homeBanner">Home Banner</label>
                                            <input type="file" required name="home_banner" class="form-control" id="homeBanner">
                                        </div>

                                        <div class="form-group col-md-2 text-right">
                                            @if($banner->home_banner != '')
                                            <img style="height:auto;width:150px;" src="{{ asset('storage/app/public/'.$banner->home_banner) }}" alt="">
                                            <p><a style="color: #106241;" onclick="return confirm('Are you sure?')" href="{{ url('home/banner/delete', $banner->id) }}">Delete this picture</a></p>
                                            @endif
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection