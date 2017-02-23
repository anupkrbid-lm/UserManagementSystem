@extends('layouts.admin')

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    User Management <small>Statistics Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Manage Users
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

            <div class="row">
            <button type="button" class="btn btn-md btn-success pull-right">  <a href="{{ url('/admin/mange/users/add') }}"><i class="fa fa-user"></i> Add New User</a> </button>
                <div class="col-lg-12">         
                    <div class="table-responsive" style="text-align:center;"> 
                        <h2> <i class="fa fa-table"></i> List of All Users </h2>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Sex</th>
                                        <th>Email Id</th>
                                        <th>Profile Picture</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->sex==1?'Male':($user->sex==2?'Female':'Other') }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->profile_picture }}</td>
                                        <td>
                                            <button type="button" class="btn btn-md btn-info">  <a href="{{ url('/admin/manage/users/block/').$user->id }}"><i class="fa fa-user"></i> Block</a> </button>
                                            <button type="button" class="btn btn-md btn-warning">  <a href="{{ url('/admin/manage/users/update/'.$user->id) }}"><i class="fa fa-user"></i> Update</a> </button>
                                            <!--  <form method='post' action="{{ url('/admin/manage/users/update/'.$user->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('put') }}
                                                {{ method_field('patch') }}
                                                <button type="submit" class="btn btn-md btn-warning">
                                                    <i class="fa fa-user"></i>Update\
                                                </button>
                                            </form> -->
                                            <form method='post' action="{{ url('/admin/manage/users/delete/'.$user->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-md btn-danger">
                                                    <i class="fa fa-user"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
@endsection
