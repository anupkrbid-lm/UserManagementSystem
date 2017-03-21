@extends('layouts.admin')

@section('content')
  
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <b>    
                Dashboard <small> :: Statistics Overview</small>
            </b>    
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>

<!-- Anonymous Visitor's Table -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Anonymous Visitors
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>IP</th>
                                <th>Country /City</th>
                                <th>Browser</th>
                                <th>Device/OS</th>
                                <th>Page</th>
                                <th>Date Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                             @foreach( $guests as $guest )
                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $guest->ip_address }}</td>
                                    <td>{{ $guest->country.", ".$guest->city }}</td>
                                    <td>{{ $guest->ua_browser }}</td>
                                    <td>{{ $guest->ua_type.", ".$guest->ua_os }}</td>
                                    <td>{{ $guest->path }}</td>
                                    <td>{{ $guest->created_at }}</td>                                 
                                    <td>
                                        <a href="#">
                                            <button type="button" class="btn btn-md btn-primary">
                                                <i class="fa fa-comments">
                                                </i>
                                                 Start Chat
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" class="btn btn-md btn-danger">
                                                <i class="fa fa-ban">
                                                </i>
                                                 Block
                                            </button>
                                        </a>                                        
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

<!-- Active Visitor's Table -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Identified Visitors
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>IP</th>
                                <th>Location</th>
                                <th>Browser</th>
                                <th>Page</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="#">
                                            <button type="button" class="btn btn-md btn-primary">
                                                <i class="fa fa-window-close-o">
                                                </i>
                                                 End Chat
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" class="btn btn-md btn-danger">
                                                <i class="fa fa-ban">
                                                </i>
                                                 Block
                                            </button>
                                        </a>                                        
                                    </td>
                                </tr>
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

@endsection

@section('scripts')
    
 <script>
    $(document).ready(function () {
        $.ajax({
            type : "post",
            url : "{{ route('app.post.checkOnlineVisitors') }}",
            data : {
                _token : "{{ csrf_token() }}",
            },
            success: function (response) {
                if(response.isFound == true) {
                    console.log(response);
                    $.each(response.guest , function (index, obj) {
                        row += "<tr><td>" + obj.ip_address + "</td><td>" + obj.country + "</td><td>" + obj.city + "</td></tr>";
                    });
                    $("#tbody").append(row);
                }
            }
        });
    });
</script>

@endsection


       {{--      // success: function(response) {
            //     if (response.isFound == true) {
            //         $.getJSON(response.guests, function(guest) {
            //             var items = [];
            //             $.each(guest, function(key, val) {
            //                 items.push("<tr>");
            //                 items.push("<td></td>");
            //                 items.push("<td>"+val.ip_address+"</td>");
            //                 items.push("<td>"+val.country+", "+val.city+"</td>");
            //                 items.push("<td>"+val.ua_browser+"</td>");
            //                 items.push("<td>"+val.ua_type+", "+val.ua_os+"</td>");
            //                 items.push("<td>"+val.path+"</td>");
            //                 items.push("<td>"+val.created_at+"</td>");
            //                 items.push("</tr>");
            //             });
            //             $("<tbody/>", {html: items.join("")}).appendTo("table");
            //             alert(items);
            //         });

            //         // var obj = JSON.parse(response.guests);
            //         // console.log(obj);
            //         // $(response.guests).each(function(index, guest) {
            //         //     console.log(response.guest);
            //         // });
            //     // } else {
            //     //     swal('error', response.error ,'error');
            //     // }
            // }
 --}}