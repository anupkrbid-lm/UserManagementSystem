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

        <script>
            /**
             * This javascript file checks for the brower/browser tab action.
             * It is based on the file menstioned by Daniel Melo.
             * Reference: http://stackoverflow.com/questions/1921941/close-kill-the-session-when-the-browser-or-tab-is-closed
             */

            // Wire up the events as soon as the DOM tree is ready
            $(document).ready(function() {
              wireUpEvents();
            });

            var validNavigation = false;

            function wireUpEvents() {
              /**
               * For a list of events that triggers onbeforeunload on IE
               * check http://msdn.microsoft.com/en-us/library/ms536907(VS.85).aspx
               *
               * onbeforeunload for IE and chrome
               * check http://stackoverflow.com/questions/1802930/setting-onbeforeunload-on-body-element-in-chrome-and-ie-using-jquery
               */
                var dont_confirm_leave = 0; //set dont_confirm_leave to 1 when you want the user to be able to leave without confirmation
                var leave_message = 'You sure you want to leave?'
                function goodbye(e) {
                    if (!validNavigation) {
                        if (dont_confirm_leave!==1) {
                            if(!e) e = window.event;
                            //e.cancelBubble is supported by IE - this will kill the bubbling process.
                            e.cancelBubble = true;
                            e.returnValue = leave_message;
                                //e.stopPropagation works in Firefox.
                            if (e.stopPropagation) {
                                e.stopPropagation();
                                e.preventDefault();
                            }
                            //return works for Chrome and Safari
                            return leave_message;
                        }
                    }
                }

                window.onbeforeunload=goodbye;

                // Attach the event keypress to exclude the F5 refresh
                $(document).bind('keypress', function(e) {
                    if (e.keyCode == 116){
                    validNavigation = true;
                    }
                });

                // Attach the event click for all links in the page
                $("a").bind("click", function() {
                validNavigation = true;
                });

                // Attach the event submit for all forms in the page
                $("form").bind("submit", function() {
                validNavigation = true;
                });

                // Attach the event click for all inputs in the page
                $("input[type=submit]").bind("click", function() {
                validNavigation = true;
                });

            }

            
        </script>




{{--         <script>

        $(document).ready(function () {
            $.getJSON("http://jsonip.com/?callback=?", function (data) {
                console.log(data);
            //    alert(data.ip);
                var user=getCookie("guest");
                if (user != "") {
            //        alert(user);
                } else {
            //        alert("Setting Cookie ");
                    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*-<>ABCDEFGHIJKLMNOP1234567890";
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
 --}}        
    </body>
</html>


