@extends('admin.layouts.app')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>View Product In</h1>
            </ul>

        </nav>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row" >
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="form-group row" style="margin-top: 5px;">
                        <div class="col-sm-2">
                              <select id="limit" class="form-control" onchange="searchFilter()">
                                <option value="" selected="selected">Display</option>

                            </select>

                        </div>
                        <div class="col-sm-2">
                            <select id="limit" class="form-control" onchange="searchFilter()">
                                <option value="" selected="selected">ALL</option>

                            </select>

                        </div>
                        <div class="col-sm-2">
                            <select id="limit" class="form-control" onchange="searchFilter()">
                                <option value="" selected="selected">ALL</option>

                            </select>

                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" placeholder="Search" id="keywords" onkeyup="searchFilter()" />


                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="category_id" class="col-sm-1 col-form-label">SL </label>
                        <label for="category_id" class="col-sm-2 col-form-label">Item Code</label>
                        <label for="category_id" class="col-sm-2 col-form-label">P.O.</label>
                        <label for="category_id" class="col-sm-1 col-form-label">QC</label>
                        <label for="category_id" class="col-sm-1 col-form-label">Date</label>
                        <label for="category_id" class="col-sm-1 col-form-label">Status</label>
                        <label for="category_id" class="col-sm-3 col-form-label">Action</label>

                    </div><?php $i=1;?>
                    <table>

                    </table>
                    @foreach ($inventories as $inventory)

                    <div class="form-group row">
                        <label for="category_id" class="col-sm-1 col-form-label">{{$i++}} </label>
                        <label for="category_id" class="col-sm-2 col-form-label">{{$inventory->item_code}}</label>
                        <label for="category_id" class="col-sm-2 col-form-label">{{$inventory->po_no}}</label>
                        <label for="category_id" class="col-sm-1 col-form-label">{{$inventory->qc_no}}</label>
                        <label for="category_id" class="col-sm-1 col-form-label">{{$inventory->po_date}}</label>
                        <label for="category_id" class="col-sm-1 col-form-label">@if($inventory->status==1)
                                           Active
                            @else
                                                                                     inactive
                            @endif</label>
                        <label for="category_id" class="col-sm-3 col-form-label"><a button class="btn btn-primary" href="">
                                Approve
                            </a>
                            <a button class="btn btn-success" href="">
                                View
                            </a>
                            <a button class="btn btn-danger" onclick="if(confirm('Sure to Delete?')){return true}else{return false}" href="#">
                                Delete
                            </a>
                        </label>

                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</section>
@endsection
