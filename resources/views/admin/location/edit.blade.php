@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Locations</h1>
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
                            <form action="{{ route('locations.update',$locations->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="location_name" class="col-sm-2 col-form-label">Location*</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="location_name" id="location_name" value="{{$locations->location_name}}" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success btn-sm" value="Save">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
