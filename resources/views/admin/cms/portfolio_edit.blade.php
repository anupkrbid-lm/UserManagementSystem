@extends('layouts.admin')

@section('links')

<style>
.thumb{
    margin: 10px 5px 0 0;
    width: 100px;
}
</style>

@endsection

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <b>
                        Edit Exising Portfolio
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
                        <i class="fa fa-hashtag"></i> Edit Portfolio
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8">

                 <form role="form" method='post' enctype="multipart/form-data" action="{{ url('/admin/manage/cms/portfolio/update/'.$portfolio_cms->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            {{ method_field('patch') }}
                     <div class="form-group">
                        <label>
                        Upload Image 
                        </label>
                        <input id="file-input" type="file" name="portfolio">
                        <div id="thumb-output"></div>
                    </div>

                    <div class="form-group">
                    </div>

                    <div class="form-group">
                        <label>
                            Project Title
                        </label>
                        <input class="form-control" placeholder="Enter Project Title" type="text" name="project_title" value="{{ $portfolio_cms->project_title }}" required autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label>
                            Description
                        </label>
                        <textarea id="description" class="form-control" placeholder="Enter Description" type="text" name="description" required autocomplete="off">
                            {{ $portfolio_cms->description }}    
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>
                            Project Details
                        </label>
                        <textarea id="project_details" class="form-control" placeholder="Enter Project Details" type="text" name="project_details" required autocomplete="off">
                            {{ $portfolio_cms->project_details }}
                        </textarea>
                    </div>                    

                    <div class="form-group">
                        <label>
                            Tags
                        </label>
                        <input class="form-control" placeholder="Enter Tags" type="text" name="tags" value="{{ $portfolio_cms->tags }}" required autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label>
                            Project Link
                        </label>
                        <input class="form-control" placeholder="Enter Project Link" type="text" name="project_link" value="{{ $portfolio_cms->project_link }}" required autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label>
                            Client
                        </label>
                        <input class="form-control" placeholder="Enter Client's Name" type="text" name="client" value="{{ $portfolio_cms->client }}" required  autocomplete="off"/>
                    </div>                    

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Update Portfolio
                        </button>
                        <a href="{{ route('admin.get.portfolioEdit',['id' => $portfolio_cms->id]) }}">
                            <button type="button" class="btn btn-warning">
                                Reset Changes
                            </button>
                        </a>
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

{{-- /** Image Preview before upload */ --}}
<script>
$(document).ready(function(){
    $('#file-input').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            $('#thumb-output').html(''); //clear html of output element
            var data = $(this)[0].files; //this file data
            
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                        $('#thumb-output').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
            
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
});
</script>
@endsection