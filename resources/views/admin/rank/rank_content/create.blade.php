@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Area Rank Content Management</h1>
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
                        <form role="form" action="{{ route('rankcontents.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="rank_content_title">Title</label>
                                            <input type="text" class="form-control" name="rank_content_title"
                                                id="rank_content_title" placeholder="Title">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label for="rank_amount">Current Amount</label>
                                                    <input type="text" class="form-control" name="rank_amount"
                                                        id="rank_amount" placeholder="Amount">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="rank_content_note">Note for Current Amount</label>
                                                    <input type="text" class="form-control" name="rank_content_note"
                                                        id="rank_content_note" placeholder="Short Text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="rank_average_amount">National Average Amount</label>
                                            <input type="text" class="form-control" name="rank_average_amount"
                                                id="rank_average_amount" placeholder="Average Amount">
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirm">Description</label>
                                            <textarea class="form-control" name="rank_content_description"
                                                id="rank_content_description" cols="30" rows="5"></textarea>
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
