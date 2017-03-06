@extends('layouts.admin')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
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
                        <i class="fa fa-hashtag"></i> Portfolio
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <a href="{{ route('admin.get.portfolioAdd') }}">
            <button type="button" class="btn btn-md btn-success pull-right">
                <i class="fa fa-plus-circle"></i> Add New Portfolio
            </button>
        </a>
        <br/><hr />

        <!-- Portfolio Listing Table -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Portfolio Listing
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Select</th>
                                        <th>Order</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Clients</th>
                                        <th>Tags</th>
                                        <th>Links</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($portfolio_cms as $portfolioCMS)
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td><input class="single-checkbox" type="checkbox" name="order" data-id="<?php echo $portfolioCMS->id;?>"></td>
                                            <td>    
                                               <select class="drop-down" disabled id="select_<?php echo $portfolioCMS->id;?>">
                                                    <option value="NULL"></option>        
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
{{--                                                     <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option> --}}
                                               </select>
                                            </td>
                                            <td><img src="{{ Storage::disk('custom')->url($portfolioCMS->image) }}" style="height: 75px;width: 100px;"></td>
                                            <td>{{ $portfolioCMS->project_title }}</td>
                                            <td>{{ $portfolioCMS->client }}</td>
                                            <td>{{ $portfolioCMS->tags }}</td>
                                            <td><a href=" {{ $portfolioCMS->project_link }}" target="_blank" style="color: #2c3e50">Visit Link</a></td>
                                            <td>
                                                <a href="{{ route('admin.get.portfolioView', ['id' => $portfolioCMS->id]) }}">
                                                    <button type="button" class="btn btn-md btn-info" style="float: left; margin-right: 5px;">
                                                        <i class="fa fa-info">
                                                        </i>
                                                         View
                                                    </button>
                                                </a>                                        
                                                <a href="{{ route('admin.get.portfolioEdit', ['id' => $portfolioCMS->id]) }}">
                                                    <button type="button" class="btn btn-md btn-warning" style="float: left; margin-right: 5px;">
                                                        <i class="fa fa-pencil">
                                                        </i>
                                                         Update
                                                    </button>
                                                </a>
                                                <form method='post' action="{{ route('admin.delete.portfolioDelete', ['id' => $portfolioCMS->id]) }}"  style="float: left; margin-right: 5px;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-md btn-danger">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>

$(document).ready(function() {
    var limit = 3;
    $('input.single-checkbox').on('change', function(evt) {
        var data_id=$(this).data('id');
        if ($(this).parent().parent().siblings().children().children('input.single-checkbox:checked').length >= limit) {
        this.checked = false;
        alert("Cannot select more than 3 portfolios");
        } else {
            if($(this).prop("checked") == true){
               $('#select_'+data_id).prop('disabled',false);
            } else if ($(this). prop("checked") == false) {
               $('#select_'+data_id).prop('disabled',true);
               $('#select_'+data_id).val("");
            }
        }
    });
});

</script>
{{--
<script>
$(document).ready(function (){
    $("select").change(function()
       {          
            $("select option").attr("disabled","");
            DisableOptions();           
        });

    function DisableOptions()
    {
        $("select option").filter(function() {
            var bSuccess=false;
            var selectedEl=$(this);
            $("select option:selected").each(function() {
                if($(this).val()==selectedEl.val())
                {
                   bSuccess=true;
                   return false;
                }
            });
            return bSuccess;
        }).attr("disabled","disabled");                     
    }
});            
</script> --}}

{{-- <script>

$(document).ready(function(){  
    $("select").change(function() {   
        $("select").not(this).find("option[value="+ $(this).val() + "]").attr('disabled', true);
    }); 
}); 

</script>
 --}}

@endsection
