<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>User Management System | Development </title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="css/freelancer.min.css" rel="stylesheet">


        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- GetStarted Page Customizations -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="css/style.css">   
        <!-- Sweet Alert 2-->
        <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.min.css" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>


    <body id="page-top" class="index">
    
        @include('includes.home.navigation_home')
        @yield('content')

         <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="js/freelancer.min.js"></script>

        <!-- GetStarted Page JavaScripts -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

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
<!--
        <script>
            $(document).ready(function () {
                $.getJSON("http://jsonip.com/?callback=?", function (data) {
                    console.log(data);
                    alert(data.ip);
                });
            });
        </script>
--><!--
        <script>
            $(document).ready(function () {
                $.getJSON("http://jsonip.com/?callback=?", function (data) {
                    console.log(data);
                    alert(data.ip);
                    var ums = getCookie("UserManagementSystem");
                    if (ums != "") {
                        alert("Welcome again " + ums);
                    } else {
                        alert("Setting Cookie ");
                        var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
                        var pass = "";
                        for (var x = 0; x < 26; x++) {
                            var i = Math.floor(Math.random() * chars.length);
                            pass += chars.charAt(i);
                        }
                        setCookie("UserManagementSystem", pass, 30);
                        }
                    }

                     $(document).ready(function () {
                $.getJSON("http://jsonip.com/?callback=?", function (data) {
                    console.log(data);
                    alert(data.ip);
                    function setCookie(cname, cvalue, exdays) {
                    var d = new Date();
                    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                    var expires = "expires="+d.toUTCString();
                    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                    }

                    function getCookie(cname) {
                        var name = cname + "=";
                        var ca = document.cookie.split(';');
                        for(var i = 0; i < ca.length; i++) {
                            var c = ca[i];
                            while (c.charAt(0) == ' ') {
                                c = c.substring(1);
                            }
                            if (c.indexOf(name) == 0) {
                                return c.substring(name.length, c.length);
                            }
                        }
                        return "";
                    }
                });


            }

        </script>
-->
        <script>

        $(document).ready(function () {
            $.getJSON("http://jsonip.com/?callback=?", function (data) {
                console.log(data);
                alert(data.ip);
                var user=getCookie("guest");
                if (user != "") {
                    alert(user);
                } else {
                    alert("Setting Cookie ");
                    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
                    var user = "";
                    for (var x = 0; x < 26; x++) {
                        var i = Math.floor(Math.random() * chars.length);
                        user += chars.charAt(i);
                    }
                   if (user != "" && user != null) {
                       setCookie("guest", user, 30);
                   }
                }
    
                function setCookie(cname,cvalue,exdays) {
                    var d = new Date();
                    d.setTime(d.getTime() + (exdays*24*60*60*1000));
                    var expires = "expires=" + d.toGMTString();
                    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                }

                function getCookie(cname) {
                    var name = cname + "=";
                    var decodedCookie = decodeURIComponent(document.cookie);
                    var ca = decodedCookie.split(';');
                    for(var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length, c.length);
                        }
                    }
                    return "";
                }
            });
        });

        </script>



    </body>
</html>


