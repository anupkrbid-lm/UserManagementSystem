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
                                    <button type="button" class="btn btn-md btn-warning">  <a href="{{ url('/admin/manage/users/update/').$user->id }}"><i class="fa fa-user"></i> Update</a> </button>
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

<!-- 
        <div class="row">
            <div class="col-lg-6">
                <h2>Bordered Table</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th>Visits</th>
                                <th>% New Visits</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>/index.html</td>
                                <td>1265</td>
                                <td>32.3%</td>
                                <td>$321.33</td>
                            </tr>
                            <tr>
                                <td>/about.html</td>
                                <td>261</td>
                                <td>33.3%</td>
                                <td>$234.12</td>
                            </tr>
                            <tr>
                                <td>/sales.html</td>
                                <td>665</td>
                                <td>21.3%</td>
                                <td>$16.34</td>
                            </tr>
                            <tr>
                                <td>/blog.html</td>
                                <td>9516</td>
                                <td>89.3%</td>
                                <td>$1644.43</td>
                            </tr>
                            <tr>
                                <td>/404.html</td>
                                <td>23</td>
                                <td>34.3%</td>
                                <td>$23.52</td>
                            </tr>
                            <tr>
                                <td>/services.html</td>
                                <td>421</td>
                                <td>60.3%</td>
                                <td>$724.32</td>
                            </tr>
                            <tr>
                                <td>/blog/post.html</td>
                                <td>1233</td>
                                <td>93.2%</td>
                                <td>$126.34</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h2>Bordered with Striped Rows</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th>Visits</th>
                                <th>% New Visits</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>/index.html</td>
                                <td>1265</td>
                                <td>32.3%</td>
                                <td>$321.33</td>
                            </tr>
                            <tr>
                                <td>/about.html</td>
                                <td>261</td>
                                <td>33.3%</td>
                                <td>$234.12</td>
                            </tr>
                            <tr>
                                <td>/sales.html</td>
                                <td>665</td>
                                <td>21.3%</td>
                                <td>$16.34</td>
                            </tr>
                            <tr>
                                <td>/blog.html</td>
                                <td>9516</td>
                                <td>89.3%</td>
                                <td>$1644.43</td>
                            </tr>
                            <tr>
                                <td>/404.html</td>
                                <td>23</td>
                                <td>34.3%</td>
                                <td>$23.52</td>
                            </tr>
                            <tr>
                                <td>/services.html</td>
                                <td>421</td>
                                <td>60.3%</td>
                                <td>$724.32</td>
                            </tr>
                            <tr>
                                <td>/blog/post.html</td>
                                <td>1233</td>
                                <td>93.2%</td>
                                <td>$126.34</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="col-lg-6">
                <h2>Basic Table</h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th>Visits</th>
                                <th>% New Visits</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>/index.html</td>
                                <td>1265</td>
                                <td>32.3%</td>
                                <td>$321.33</td>
                            </tr>
                            <tr>
                                <td>/about.html</td>
                                <td>261</td>
                                <td>33.3%</td>
                                <td>$234.12</td>
                            </tr>
                            <tr>
                                <td>/sales.html</td>
                                <td>665</td>
                                <td>21.3%</td>
                                <td>$16.34</td>
                            </tr>
                            <tr>
                                <td>/blog.html</td>
                                <td>9516</td>
                                <td>89.3%</td>
                                <td>$1644.43</td>
                            </tr>
                            <tr>
                                <td>/404.html</td>
                                <td>23</td>
                                <td>34.3%</td>
                                <td>$23.52</td>
                            </tr>
                            <tr>
                                <td>/services.html</td>
                                <td>421</td>
                                <td>60.3%</td>
                                <td>$724.32</td>
                            </tr>
                            <tr>
                                <td>/blog/post.html</td>
                                <td>1233</td>
                                <td>93.2%</td>
                                <td>$126.34</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h2>Striped Rows</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th>Visits</th>
                                <th>% New Visits</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>/index.html</td>
                                <td>1265</td>
                                <td>32.3%</td>
                                <td>$321.33</td>
                            </tr>
                            <tr>
                                <td>/about.html</td>
                                <td>261</td>
                                <td>33.3%</td>
                                <td>$234.12</td>
                            </tr>
                            <tr>
                                <td>/sales.html</td>
                                <td>665</td>
                                <td>21.3%</td>
                                <td>$16.34</td>
                            </tr>
                            <tr>
                                <td>/blog.html</td>
                                <td>9516</td>
                                <td>89.3%</td>
                                <td>$1644.43</td>
                            </tr>
                            <tr>
                                <td>/404.html</td>
                                <td>23</td>
                                <td>34.3%</td>
                                <td>$23.52</td>
                            </tr>
                            <tr>
                                <td>/services.html</td>
                                <td>421</td>
                                <td>60.3%</td>
                                <td>$724.32</td>
                            </tr>
                            <tr>
                                <td>/blog/post.html</td>
                                <td>1233</td>
                                <td>93.2%</td>
                                <td>$126.34</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       

        <div class="row">
            <div class="col-lg-6">
                <h2>Contextual Classes</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th>Visits</th>
                                <th>% New Visits</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="active">
                                <td>/index.html</td>
                                <td>1265</td>
                                <td>32.3%</td>
                                <td>$321.33</td>
                            </tr>
                            <tr class="success">
                                <td>/about.html</td>
                                <td>261</td>
                                <td>33.3%</td>
                                <td>$234.12</td>
                            </tr>
                            <tr class="warning">
                                <td>/sales.html</td>
                                <td>665</td>
                                <td>21.3%</td>
                                <td>$16.34</td>
                            </tr>
                            <tr class="danger">
                                <td>/blog.html</td>
                                <td>9516</td>
                                <td>89.3%</td>
                                <td>$1644.43</td>
                            </tr>
                            <tr>
                                <td>/404.html</td>
                                <td>23</td>
                                <td>34.3%</td>
                                <td>$23.52</td>
                            </tr>
                            <tr>
                                <td>/services.html</td>
                                <td>421</td>
                                <td>60.3%</td>
                                <td>$724.32</td>
                            </tr>
                            <tr>
                                <td>/blog/post.html</td>
                                <td>1233</td>
                                <td>93.2%</td>
                                <td>$126.34</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h2>Bootstrap Docs</h2>
                <p>For complete documentation, please visit <a target="_blank" href="http://getbootstrap.com/css/#tables">Bootstrap's Tables Documentation</a>.</p>
            </div>
        </div>
       -->

    </div>
    
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
@endsection
