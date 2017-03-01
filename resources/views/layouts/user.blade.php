<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>User - User Management System ~ Development</title>

        <!-- Plugins CSS -->
        <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.css">
        
        <!-- Theme CSS -->  
        <link id="theme-style" rel="stylesheet" href="/assets/css/styles-3.css">
        <link id="theme-style" rel="stylesheet" href="/assets/css/style.css"> 

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        
        <!-- Global CSS -->
        <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">   

        <!-- Sweet Alert 2-->
        <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>


    <body>

         <div id="wrapper">
         @include('includes.user.navigation_user')
                    @yield('content')
        </div> 
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/js/bootstrap.min.js"></script>
        
        <!-- Sweet Alert 2 -->
        <script src='https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.min.js'></script>
        <!--  <script src='sweetalert2/sweetalert2.min.js'></script>   -->

        <script>
            @if(session()->has('error'))
                swal('', "{{ session()->get('error') }}", 'error');
            @endif
        </script>

        <script>
            @if(session()->has('success'))
                swal('', "{{ session()->get('success') }}", 'success');
            @endif
        </script>

        @yield('scripts')
    </body>

</html>
