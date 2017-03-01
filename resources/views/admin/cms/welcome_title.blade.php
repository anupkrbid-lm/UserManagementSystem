@extends('layouts.admin')

@section('content')

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
                <i class="fa fa-hashtag"></i> Welcome Title
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
{{-- 
        <form role="form" method='post' action="{{ url('/admin/manage/users/update/'.$user->id) }}">
            {{ csrf_field() }}
            {{ method_field('put') }}
            {{ method_field('patch') }}
            <div class="form-group">
                <label>Welcome Title</label>
                <input class="form-control" placeholder="Enter Text" type="text" name="first_name" value="{{ $user->first_name }}" required autocomplete="off">
            </div>

            <div class="form-group">
                <label>Welcome Sub-Title</label>
                <input class="form-control" placeholder="Enter Text" type="text" name="last_name" value="{{ $user->last_name }}" required autocomplete="off">
            </div>
           
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Titles</button>
                <button type="button" class="btn btn-danger"><a href="{{ url('/admin/manage/users') }}" >Reset</a> </button>
                </div>
        </form>
 --}}
    </div>
</div>





@endsection