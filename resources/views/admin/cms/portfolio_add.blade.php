@extends('layouts.admin')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <b>
                        Add New Portfolio
                    </b>
                </h1>
                <ol class="breadcrumb">
                    <li style="color: white;">
                        <i class="fa fa-list-ul"></i> CMS Management
                    </li>
                    <li style="color: white;">
                        <a href="{{ route('admin.get.portfolio') }}"><i class="fa fa-hashtag"></i>
                             Portfolio
                        </a>
                    </li>
                    <li class="active">
                        <i class="fa fa-hashtag"></i> Add New Portfolio
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8">

                <form role="form" method='post' action="{{ route('admin.post.portfolioCreate') }}" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>
                        Upload Image 
                        </label>
                        <input type="file" name="portfolio">
                    </div>

                    <div class="form-group">
                        <label>
                            Project Title
                        </label>
                        <input class="form-control" placeholder="Enter Project Title" type="text" name="project_title"  required autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label>
                            Description
                        </label>
                        <textarea id="description" class="form-control" placeholder="Enter Description" type="text" name="description" required autocomplete="off">    
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>
                            Project Details
                        </label>
                        <textarea id="project_details" class="form-control" placeholder="Enter Project Details" type="text" name="project_details" required autocomplete="off">
                        </textarea>
                    </div>                    

                    <div class="form-group">
                        <label>
                            Tags
                        </label>
                        <input class="form-control" placeholder="Enter Tags" type="text" name="tags" required autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label>
                            Project Link
                        </label>
                        <input class="form-control" placeholder="Enter Project Link" type="text" name="project_link" required autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label>
                            Client
                        </label>
                        <input class="form-control" placeholder="Enter Client's Name" type="text" name="client" required autocomplete="off"/>
                    </div>                    

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Add Portfolio
                        </button>
                        <button type="reset" class="btn btn-warning">
                            Reset Changes
                        </button>
                        <a href="{{ route('admin.get.portfolio') }}" >
                            <button type="button" class="btn btn-danger">
                                Cancel
                            </button>
                        </a>
                    </div>
                </form>

            </div>

    
    </div>
</div>

@endsection


@section('scripts')

<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('project_details');
    CKEDITOR.config.height = 120;
</script>

@endsection