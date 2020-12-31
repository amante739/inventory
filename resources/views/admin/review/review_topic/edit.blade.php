@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Topic of Reviews Update</h1>
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
                        <h3 class="card-title">Edit</h3>
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
                        <form role="form" action="{{ route('topicofreviews.update', $tipoc_review->id) }}"
                            method="post">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="topic_review_name">Sub Topic Of Review Name</label>
                                        <input type="text" class="form-control" name="topic_review_name"
                                            id="topic_review_name" value="{{ $tipoc_review->topic_review_name }}">
                                    </div>
                                </div>

                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="topic_review_status">Status</label>
                                        <select name="topic_review_status" id="topic_review_status"
                                            class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('extrajs')
<script>
    $(document).ready(function () {
        $(".check").click(function () {
            $(".checky").prop("checked", true);
        });
        $(".uncheck").click(function () {
            $(".checky").prop("checked", false);
        });
    });

</script>
@endsection
