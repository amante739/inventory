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

                        @can('community-relation-edit')
                        <form role="form" action="{{ route('communityrelations.update', $community_relation->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="community_relation_name">Sub Topic Of Review Name</label>
                                        <input type="text" class="form-control" name="community_relation_name" id="community_relation_name" value="{{ $community_relation->community_relation_name }}">
                                    </div>
                                </div>

                                <!-- <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="topic_of_review_id">
                                            Check for Specific Topic of Review
                                        </label>
                                    </div>
                                </div> -->

                                <!-- <div class="row">
                                    @foreach($all_topic_of_review as $topics)
                                    <div class="col-sm-4">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="topic_of_review_id[]"
                                                    class="form-check-input checky" value="{{ $topics->id }}"
                                                    {{ in_array($topics->id, $comm_top_rev) ? 'checked' : '' }}>{{ $topics->topic_review_name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div> -->

                                <div class="col-sm-10 mt-3">
                                    <div class="form-group">
                                        <label for="community_relation_status">Status</label>
                                        <select name="community_relation_status" id="community_relation_status" class="form-control">
                                            <option value="1" {{ $topics->community_relation_status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $topics->community_relation_status == 0 ? 'selected' : '' }}>Inactive
                                            </option>
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


@section('extrajs')
<script>
    $(document).ready(function() {
        $(".check").click(function() {
            $(".checky").prop("checked", true);
        });
        $(".uncheck").click(function() {
            $(".checky").prop("checked", false);
        });
    });
</script>
@endsection