@extends('layouts.admin')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <b>
                        CMS Management<small> :: Statistics Overview</small>
                    </b>
                </h1>
                <ol class="breadcrumb">
                    <li style="color: white;">
                        <i class="fa fa-list-ul"></i> CMS Management
                    </li>
                    <li class="active">
                        <i class="fa fa-hashtag"></i> About Us
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-8">
         
                <form role="form" method='post' action="{{ url('/admin/manage/cms/about-us/update/1') }}">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    {{ method_field('patch') }}
                    <div class="form-group">
                        <label>
                            Left Block
                        </label>
                        <textarea id="left_block" class="form-control" placeholder="Enter Text" type="text" name="left_block" required autocomplete="off">
                            {{ $aboutus_cms->left_block }}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>
                            Right Block
                        </label>
                        <textarea id="right_block" class="form-control" placeholder="Enter Text" type="text" name="right_block" required autocomplete="off">
                            {{ $aboutus_cms->right_block }}
                        </textarea>
                    </div>
                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                             Update About Us
                        </button>
                        <button type="button" class="btn btn-danger">
                            <a href="{{ route('admin.get.aboutUs') }}">
                                 Reset
                            </a> 
                        </button>
                    </div>
                </form>
         
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    CKEDITOR.replace('left_block');
    CKEDITOR.replace('right_block');
    CKEDITOR.config.height = 140;
</script>

@endsection