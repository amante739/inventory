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

                        @can('setting-edit')
                        <form class="form-horizontal" action="{{ route('settings.update', $setting->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class=" form-group row">
                                <label for="inputValue" class="col-sm-1 col-form-label">{{ $setting->key }}</label>
                                <div class="col-sm-8">
                                    @if($setting->type == 1)
                                    <input type="text" value="{{ $setting->value }}" name="value" class="form-control" id="inputValue">
                                    @else
                                    <textarea class="form-control" id="inputValue" name="value" rows="4">{{ $setting->value }}</textarea>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group row">
                                <label for="inputType" class="col-sm-1 col-form-label">Type</label>
                                <div class="col-sm-8">
                                    <select name="type" id="inputType" class="form-control">
                                        <option value="1" @if($setting->type == '1') selected @endif>Text</option>
                                        <option value="2" @if($setting->type == '2') selected @endif>TextArea</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="inputFooter" class="col-sm-2 col-form-label"></label>
                                <button type="submit" class="btn btn-success btn-sm">Update Settings</button>
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