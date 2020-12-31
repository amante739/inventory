@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Area Rank Topic Management</h1>
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
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <form role="form" action="{{ route('ranktopics.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="rank_topic_title">Title</label>
                                                    <input type="text" class="form-control" name="rank_topic_title"
                                                        id="rank_topic_title" placeholder="Title">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="rank_topic_icon">Set Icon</label>
                                                    <input type="text" class="form-control" name="rank_topic_icon"
                                                        id="rank_topic_icon" placeholder="Icon">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="rank_topic_description">Description</label>
                                            <textarea class="form-control" name="rank_topic_description"
                                                id="rank_topic_description" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            @foreach($all_rank_contents as $rank_content)
                                            <div class="col-md-12">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="rank_content_id[]"
                                                            class="form-check-input checky"
                                                            value="{{ $rank_content->id }}">{{ $rank_content->rank_content_title }}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
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
