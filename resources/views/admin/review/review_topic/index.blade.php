@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Sub Reviews</h1>
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
                        <h3 class="card-title">List</h3>
                        <a href="{{ route('topicofreviews.create') }}">
                            <button class="btn btn-success btn-sm float-right">
                                Add New
                            </button>
                        </a>
                    </div>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Review Topic Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($otherReviews as $key => $otherReview)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $otherReview->topic_review_name }}</td>
                                    <td>
                                        <a class="btn" href="{{ route('topicofreviews.edit', $otherReview->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn" href="{{ url('deletsubtopic', $otherReview->id) }}"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
