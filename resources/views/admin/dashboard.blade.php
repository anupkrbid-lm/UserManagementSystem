@extends('layouts.admin')

@section('content')
  
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <b>    
                Dashboard <small> :: Statistics Overview</small>
            </b>    
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>

<!-- Anonymous Visitor's Table -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Anonymous Visitors
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>IP</th>
                                <th>Location</th>
                                <th>Browser</th>
                                <th>Page</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td>{{$guest_remote_ip}}</td>
                                    <td></td>
                                    <td>{{$guest_remote_agent}}</td>
                                    <td>{{$guest_current_page}}</td>
                                    <td>{{$guest_visit_time}}</td>                                 
                                    <td>
                                        <a href="#">
                                            <button type="button" class="btn btn-md btn-primary">
                                                <i class="fa fa-comments">
                                                </i>
                                                 Start Chat
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" class="btn btn-md btn-danger">
                                                <i class="fa fa-ban">
                                                </i>
                                                 Block
                                            </button>
                                        </a>                                        
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>

<!-- Active Visitor's Table -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Identified Visitors
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>IP</th>
                                <th>Location</th>
                                <th>Browser</th>
                                <th>Page</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="#">
                                            <button type="button" class="btn btn-md btn-primary">
                                                <i class="fa fa-window-close-o">
                                                </i>
                                                 End Chat
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" class="btn btn-md btn-danger">
                                                <i class="fa fa-ban">
                                                </i>
                                                 Block
                                            </button>
                                        </a>                                        
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>

@endsection