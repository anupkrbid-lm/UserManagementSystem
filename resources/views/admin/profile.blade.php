@extends('layouts.admin')

@section('content')

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <b>
                                Profile Details<small> :: Statistics Overview</small>
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
                                <i class="fa fa-eye"></i> View Profile Details
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        
                        <br/>
                        
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
                                    <input type="radio" name="is_admin" value="male" {{ $user->is_admin == '1' ? 'checked="checked"' : null }} required />Yes
                                </label>
                                <label class="radio-inline">
                                   <input type="radio" name="is_admin" value="female" {{ $user->is_admin == '0' ? 'checked="checked"' : null }} required />No
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Email Id</label>
                                <input class="form-control" placeholder="Enter Text" type="text" name="last_name" value="{{ $user->email }}" required autocomplete="off">
                            </div>

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

                    <div class="col-lg-6">
                        <div class="form-group">
                              <button id="btn_update_pass" type="button" class="btn btn-primary pull-right">
                                    <i class="fa fa-key">
                                    </i>
                                    Update Password
                                </button>
                        </div>

                        <br/>

                        <div id="currentPasswordBlock"  style="display: none">
                            <div class="form-group">
                                <label>Type Current Password</label>
                                <input id="txt_current_pass" class="form-control" placeholder="Enter Text" type="Password" name="last_name" 
                                required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button id="btn_verify_pass" type="button" class="btn btn-warning">
                                    <i class="fa fa-unlock-alt">
                                    </i>
                                    Verify Password
                                </button>
                                <button id="cancel1" type="button" class="btn btn-danger">
                                    Cancel
                                </button>
                            </div>
                        </div>

                        <form method='post' action="{{ url( '/change-update' ) }}">
                            <div id="newPasswordBlock"  style="display: none">
                                <div class="form-group">
                                    <label>Type New Password</label>
                                    <input id="txt_new_pass" class="form-control" placeholder="Enter Text" type="Password" name="last_name" 
                                    required autocomplete="off">
                                </div>         
                                
                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input id="txt_cnf_new_pass" class="form-control" placeholder="Enter Text" type="Password" name="last_name" 
                                    required autocomplete="off">
                                </div>                                           

                                <div class="form-group">  
                                        <button id="btn_change_pass" type="button" class="btn btn-success">
                                            <i class="fa fa-key">
                                            </i>
                                            Change Password
                                        </button>
                                        <button id="cancel2" type="button" class="btn btn-danger">
                                            Cancel
                                        </button>
                                </div>
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

@section('scripts')

    <script>
        $(document).ready(function () {
            $('#btn_update_pass').click(function () {
                $('#currentPasswordBlock').show();
                $('#newPasswordBlock').hide();
                $(this).prop('disabled',true);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#btn_verify_pass').click(function () {
                $.ajax({
                    type : "post",
                    url : "{{ route('app.post.verifyPassword') }}",
                    data : {
                        _token : "{{ csrf_token() }}",
                        password : $('#txt_current_pass').val(),
                    },
                    success: function(response) {
                        if (response.isMatched == true) {
                            $('#currentPasswordBlock').hide();
                            $('#txt_current_pass').val("");
                            $('#newPasswordBlock').show();
                            $('#btn_update_pass').prop('disabled',true);
                            return false;
                        } else {
                            $('#currentPasswordBlock').hide();
                            $('#txt_current_pass').val("");
                            $('#newPasswordBlock').hide();
                            $('#btn_update_pass').prop('disabled',false);
                            swal('error', response.error ,'error');
                        }
                    }
                });
            });
        });
    </script>



    <script>
        $(document).ready(function () {
            $('#btn_change_pass').click(function () {
            //    e.preventDefault();
                $.ajax({
                    type : "patch",
                    url : "{{ url('/change-password') }}",
                    data : {
                        _token : "{{ csrf_token() }}",
                        new_password : $('#txt_new_pass').val(),
                        cnf_new_password : $('#txt_cnf_new_pass').val(),
                    },
                    success: function(response) {
                        if (response.isMatched == true) {
                            $('#currentPasswordBlock').hide();
                            $('#txt_current_pass').val("");
                            $('#newPasswordBlock').hide();
                            $('#txt_new_pass').val("");
                            $('#txt_cnf_new_pass').val("");
                            $('#btn_update_pass').prop('disabled',false);
                            swal('success','Password successfully changed!', 'success');
                        } else {
                            swal('error', response.error, 'error');
                        }
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $("#cancel1,#cancel2").click(function () {
                $('#currentPasswordBlock').hide();
                $('#txt_current_pass').val("");
                $('#newPasswordBlock').hide();
                $('#txt_new_pass').val("");
                $('#txt_cnf_new_pass').val("");
                $('#btn_update_pass').prop('disabled',false);
            });
        });
    </script>

@endsection