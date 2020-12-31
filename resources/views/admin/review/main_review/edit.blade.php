@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Reviews Status Update</h1>
            </ul>

        </nav>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Status of Reviews</h3>
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

                        @can('review-edit')
                        <form role="form" action="{{ route('reviews.update', $review->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="topic_review_name">Property Name</label>
                                        <input class="form-control" disabled value="{{ $review->property_name }}">
                                    </div>
                                </div>

                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="review_status">Review Status</label>
                                        <select name="review_status" id="review_status" class="form-control">
                                            <option value="">Select Option</option>
                                            <option value="1" {{ $review->review_status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $review->review_status == 0 ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
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