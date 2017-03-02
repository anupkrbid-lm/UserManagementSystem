@extends('layouts.admin')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <b>
                        Add New User
                    </b>
                </h1>
                <ol class="breadcrumb">
                    <li>
                         <a href="{{ route('admin.get.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                         <a href="{{ route('admin.get.allUsers') }}"><i class="fa fa-users"></i> User Management</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-user-plus">
                        </i> 
                        Add New User
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">

                <form role="form" method='post' action="{{ route('admin.post.createUser') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>
                            First Name
                        </label>
                        <input class="form-control" placeholder="Enter First Name" type="text" name="first_name"  required autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label>
                            Last Name
                        </label>
                        <input class="form-control" placeholder="Enter Last Name" type="text" name="last_name"  required autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label>
                            Sex 
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" value="male" required/> Male
                        </label>
                        <label class="radio-inline">
                           <input type="radio" name="sex" value="female" required/> Female
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" value="other" required/> Other
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Is Admin </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_admin" value="1" required /> Yes
                        </label>
                        <label class="radio-inline">
                           <input type="radio" name="is_admin" value="0" required /> No
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            Email
                        </label>
                        <input class="form-control" placeholder="Enter Email" type="email" name="email"  required autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label>
                            Password
                        </label>
                        <input class="form-control" placeholder="Enter Password" type="password" name="password"  required autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label>
                            Confirm Password
                        </label>
                        <input class="form-control" placeholder="Enter Password Again" type="password" name="cnf_password"  required autocomplete="off"/>
                    </div>

<!--                        <div class="form-group">
                        <label>
                        Upload Image 
                        </label>
                        <input type="file">
                    </div>
-->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Add User
                        </button>
                        <button type="reset" class="btn btn-warning">
                            Reset Changes
                        </button>
                        <a href="{{ url('/admin/manage/users') }}" >
                            <button type="button" class="btn btn-danger">
                                Cancel
                            </button>
                        </a>
                    </div>
                </form>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
    @endsection

