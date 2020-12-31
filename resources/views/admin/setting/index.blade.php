@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Setting</h1>
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

                        @can('setting-list')
                        <!-- <form class="form-horizontal" action="{{ route('settings.update',1) }}" method="post"> -->
                        @csrf
                        @foreach($settings as $setting)
                        <div class="form-group row">
                            <label for="inputFooter" class="col-sm-2 col-form-label">{{ $setting->key }}</label>
                            <div class="col-sm-7">
                                @if($setting->type == 1)
                                <input type="text" value="{{ $setting->value }}" name="key" class="form-control" id="inputKey">
                                @else
                                <textarea class="form-control" name="key" rows="4">{{ $setting->value }}</textarea>
                                @endif
                            </div>
                            <div class="col-sm-2">
                                <a class="btn" href="{{ route('settings.edit', $setting->id) }}">
                                    <i data-toggle="tooltip" data-original-title="Edit Information" class="fa fa-edit"></i>
                                </a>
                                <a class="btn" href="{{ url('settingdelete', $setting->id) }}" onclick="return confirm('Are you sure?')">
                                    <i data-toggle="tooltip" data-original-title="Delete setting Data" class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <!-- </form> -->
                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form class="form-horizontal" action="{{ route('settings.store') }}" method="post">
                            @csrf

                            <div class=" form-group row">
                                <label for="inputKey" class="col-sm-1 col-form-label">Key</label>
                                <div class="col-sm-8">
                                    <input type="text" name="key" class="form-control" id="inputKey">
                                </div>
                            </div>

                            <div class=" form-group row">
                                <label for="inputValue" class="col-sm-1 col-form-label">Value</label>
                                <div class="col-sm-8">
                                    <input type="text" name="value" class="form-control" id="inputValue">
                                </div>
                            </div>

                            <div class=" form-group row">
                                <label for="inputType" class="col-sm-1 col-form-label">Type</label>
                                <div class="col-sm-8">
                                    <select name="type" id="inputType" class="form-control">
                                        <option value="1">Text</option>
                                        <option value="2">TextArea</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="inputFooter" class="col-sm-2 col-form-label"></label>
                                <button type="submit" class="btn btn-success btn-sm">Add Settings</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection