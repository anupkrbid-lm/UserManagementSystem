@extends('layouts.admin')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <b>
                        CMS Management <small> :: Statistics Overview</small>
                    </b>
                </h1>
                <ol class="breadcrumb">
                    <li style="color: white;">
                        <i class="fa fa-list-ul"></i> CMS Management
                    </li>
                    <li class="active">
                        <i class="fa fa-hashtag"></i> Portfolio
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <a href="{{ route('admin.get.portfolioAdd') }}">
            <button type="button" class="btn btn-md btn-success pull-right">
                <i class="fa fa-plus-circle"></i> Add New Portfolio
            </button>
        </a>
        <br /><hr />

    </div>
</div>

@endsection