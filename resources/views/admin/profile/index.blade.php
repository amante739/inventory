@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Admin Information</h1>
            </ul>

        </nav>
    </div>
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <form class="form-horizontal"> -->

                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <img src="https://via.placeholder.com/150">
                            </div>
                        </div>

                        <div class=" form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $user_data->name }}" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" value="{{ $user_data->email }}" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputBio" class="col-sm-2 col-form-label">Bio</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputBio">{{ $user_data->bio }}</textarea>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div> -->
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection