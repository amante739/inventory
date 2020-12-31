@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Community Relation</h1>
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

                        @can('community-relation-create')
                        <form role="form" action="{{ route('communityrelations.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="community_relation_name">Enter Community Relation Name</label>
                                            <input type="text" class="form-control" name="community_relation_name" id="community_relation_name" placeholder="Enter Topic">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="permission_name">
                                        Check for Specific Topic of Review
                                    </label>
                                </div> -->

                                <!-- <div class="col-md-12">
                                    @foreach($all_topic_of_review as $topic_review)
                                    <div class="col-md-4">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="topic_of_review_id[]"
                                                    class="form-check-input checky"
                                                    value="{{ $topic_review->id }}">{{ $topic_review->topic_review_name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div> -->
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
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