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
                            <a href="{{ route('admin.get.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> User Management
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <a href="{{ route('admin.get.addUser') }}">
                <button type="button" class="btn btn-md btn-success pull-right">
                    <i class="fa fa-user-plus"></i> Add New User
                </button>
            </a>
            <br /><hr />
            <div class="row">
                <div class="col-lg-12">         
                    <div class="table-responsive" style="text-align:center;"> 
                        {{-- <h2><i class="fa fa-table"></i> List of All Users </h2> --}}
                        <table class="table table-bordered table-centered table-hover table-striped">
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
                                        <td>{{ $user->sex == 1 ? "Male" : ($user->sex == 2 ? "Female" : "Other") }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->profile_picture }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.get.viewUser', ['id' => $user->id]) }}" style="float: left; margin-right: 10px;">
                                                <button type="button" class="btn btn-md btn-info">
                                                    <i class="fa fa-info"></i> View
                                                </button>
                                            </a>
                                            <a href="{{ route('admin.get.editUser', ['id' => $user->id]) }}"  style="float: left; margin-right: 10px;">
                                                <button type="button" class="btn btn-md btn-warning">
                                                    <i class="fa fa-edit"></i> Update
                                                </button>
                                            </a>
                                            <form method='post' action="{{ route('admin.delete.deleteUser', ['id' => $user->id]) }}"  style="float: left; margin-right: 10px;">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-md btn-danger">
                                                    <i class="fa fa-user-times"></i> Delete
                                                </button>
                                            </form>
                                            <a href="#"  style="float: left;">
                                                <button type="button" class="btn btn-md btn-default">
                                                    <i class="fa fa-ban"></i> Block
                                                </button>
                                            </a>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
