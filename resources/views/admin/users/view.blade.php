@extends('layouts.admin')

@section('content')

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <b>
                                View User Details
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
                                <i class="fa fa-eye"></i> View User Details
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <fieldset disabled>

                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" placeholder="Enter Text" type="text" name="first_name" value="{{ $user->first_name }}" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" placeholder="Enter Text" type="text" name="last_name" value="{{ $user->last_name }}" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Sex </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="male" {{ $user->sex == '1' ? 'checked="checked"' : null }} required/>
                                        Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="female" {{ $user->sex == '2' ? 'checked="checked"' : null }} required/>     Female
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="other" {{ $user->sex == '0' ? 'checked="checked"' : null }} required/>Other
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Is Admin </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_admin" value="1" {{ $user->is_admin == '1' ? 'checked="checked"' : null }} required />Yes
                                </label>
                                <label class="radio-inline">
                                   <input type="radio" name="is_admin" value="0" {{ $user->is_admin == '0' ? 'checked="checked"' : null }} required />No
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Email Id</label>
                                <input class="form-control" placeholder="Enter Text" type="text" name="last_name" value="{{ $user->email }}" required autocomplete="off">
                            </div>
    <!--                             <div class="form-group">
                                <label>Upload Image </label>
                                <input type="file">
                            </div>
    -->
                        </fieldset>
                        <div class="form-group">
                            <a href="{{ route('admin.get.editUser',['id' => $user->id]) }}">
                                <button type="button" class="btn btn-warning">
                                    Update Details
                                </button>
                            </a>
                            <button type="button" class="btn btn-danger"><a href="{{ route('admin.get.allUsers') }}" >Cancel</a> </button>
                            </div>
     
                    </div>

                    <!-- 
                    <div class="col-lg-6">
                        <h1>Disabled Form States</h1>

                        <form role="form">

                            <fieldset disabled>

                                <div class="form-group">
                                    <label for="disabledSelect">Disabled input</label>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="disabledSelect">Disabled select menu</label>
                                    <select id="disabledSelect" class="form-control">
                                        <option>Disabled select</option>
                                    </select>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">Disabled Checkbox
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary">Disabled Button</button>

                            </fieldset>

                        </form>

                        <h1>Form Validation</h1>

                        <form role="form">

                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">Input with success</label>
                                <input type="text" class="form-control" id="inputSuccess">
                            </div>

                            <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">Input with warning</label>
                                <input type="text" class="form-control" id="inputWarning">
                            </div>

                            <div class="form-group has-error">
                                <label class="control-label" for="inputError">Input with error</label>
                                <input type="text" class="form-control" id="inputError">
                            </div>

                        </form>

                        <h1>Input Groups</h1>

                        <form role="form">

                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>

                            <div class="form-group input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                                <input type="text" class="form-control" placeholder="Font Awesome Icon">
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>

                            <div class="form-group input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                            </div>

                        </form>

                        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

                    </div> -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
@endsection

