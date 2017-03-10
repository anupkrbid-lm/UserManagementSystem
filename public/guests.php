<?php 

    

    /**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/

    require_once('conn_chat.php');
    global $link;
    session_start();
    date_default_timezone_set('America/New_York'); 
    /*$servername = "localhost";
    $username = "root";
    $password = "tier5";
    // Create connection
    $conn = mysql_connect($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } */
    function getUserIP()
    {
        global $link;
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        if(filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        return $ip;
    }
    
    $user_ip = getUserIP();
    if($user_ip)
    {
        $visitrcheck ="SELECT * FROM `portal_tier5_in`.`visiters_log` WHERE ip='".$user_ip."' AND session='".$_SESSION["time"]."'";
        $govisitrcheck = mysqli_query( $link, $visitrcheck);
        if (mysqli_num_rows($govisitrcheck) > 0)
        {
            $status=0;
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $sql = "UPDATE `portal_tier5_in`.`visiters_log` SET `status`='0' , `date` = '".$date."' , `time` = '".$time."' WHERE ip='".$user_ip."' AND session='".$_SESSION["time"]."'";
            $result=mysqli_query($link, $sql);
            //echo mysql_error();
            if ($result1=mysqli_query($link, $visitrcheck))
            {
                while ($row = mysqli_fetch_assoc($result1))
                {
                    $viewstatus=$row['view'];
                    if($viewstatus==1)
                    {
                        echo 1;
                    }
                }
            }
        }
        else
        {
          
           /*$visitripcheck ="SELECT * FROM `emp_management`.`visiters_log` WHERE ip='".$user_ip."' ORDER BY `v_id` DESC LIMIT 1";
            $govisitripcheck = mysql_query($visitripcheck);
            if (mysql_num_rows($govisitripcheck) > 0)
            {
                $max_public_id = mysql_fetch_row($govisitripcheck);
                $country= $max_public_id->country; //"country":"United States",
                $country_code= $max_public_id->country_code;//  "country_code":"US",
                $continent= $max_public_id->continent;  //"continent":"North America",
                $continent_code= $max_public_id->continent_code;  //"continent_code":"NA",
                $city= $max_public_id->city;  //"city":"Mountain View",
                $county= $max_public_id->county; // "county":"Santa Clara",
                $region= $max_public_id->region; //"region":"California",
                $region_code= $max_public_id->region_code; //"region_code":"CA",
                $timezone= $max_public_id->timezone;  //"timezone":"PST",
                $owner= $max_public_id->owner; //"owner":"LEVEL 3 COMMUNICATIONS INC",
                $longitude= $max_public_id->longitude; //"longitude":"-122.0865",
                $latitude= $max_public_id->latitude;// "latitude":"37.3801"
                $flag=$max_public_id->$flag1;
                $status=0;
                $date=date('Y-m-d');
                $time=date('H:i:s');
                $sql1="INSERT INTO `emp_management`.`visiters_log` (`v_id`,`ip`,`status`,`date`,`session`,`activation`,`time`,`country`,`country_code`,`continent`,`continent_code`,`city`,`county`,`region`,`region_code`,`timezone`,`flag`) 
                VALUES (NULL, '".$user_ip."','".$status."','".$date."','".$_SESSION["time"]."','0','".$time."','".$country."','".$country_code."','".$continent."','".$continent_code."','".$city."','".$county."','".$region."','".$region_code."','".$timezone."','".$flag."')";
                $result1=mysql_query($sql1);
                $result1=mysql_query($sql1);
                $_SESSION["userid"]=mysql_insert_id();
                echo mysql_error();
                
            }
            else
            {*/
                
                $request_uri = 'https://ipfind.co';
                $auth = 'aaa5c6bd-49b9-4b50-bec7-555ce58db3fb';
                $url = $request_uri."?ip=".$user_ip."&auth=".$auth;
                $document = file_get_contents($url);
                $details = json_decode($document);
                $country= $details->country; //"country":"United States",
                $country_code= $details->country_code;//  "country_code":"US",
                $continent= $details->continent;  //"continent":"North America",
                $continent_code= $details->continent_code;  //"continent_code":"NA",
                $city= $details->city;  //"city":"Mountain View",
                $county= $details->county; // "county":"Santa Clara",
                $region= $details->region; //"region":"California",
                $region_code= $details->region_code; //"region_code":"CA",
                $timezone= $details->timezone;  //"timezone":"PST",
                $owner= $details->owner; //"owner":"LEVEL 3 COMMUNICATIONS INC",
                $longitude= $details->longitude; //"longitude":"-122.0865",
                $latitude= $details->latitude;// "latitude":"37.3801"
                //=================================
                $request_uri1 = 'https://ipfind.co/flag'; //1
               
                $auth1 = '9617ccf4-17a3-4bc4-bbe5-126d39963e68'; //'aaa5c6bd-49b9-4b50-bec7-555ce58db3fb'; 
                $url1 = $request_uri1 . "?ip=" . $user_ip . "&auth=" . $auth;
                $flag1 = file_get_contents($url1); //this thing 
                //$image = 'http://images.itracki.com/2011/06/favicon.png';
                // Read image path, convert to base64 encoding
                $imageData = base64_encode($flag1);
                // Format the image SRC:  data:{mime};base64,{data};
                $src = 'data: '.mime_content_type($url1).';base64,'.$imageData;
                //======================
                $flag=$src;
                $status=0;
                $date=date('Y-m-d');
                $time=date('H:i:s');
                if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
                   $browser='Internet explorer';
                elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
                    $browser= 'Internet explorer';
                elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
                    $browser= 'Mozilla Firefox';
                elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
                    $browser= 'Google Chrome';
                elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
                    $browser= "Opera Mini";
                elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
                    $browser= "Opera";
                elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
                    $browser= "Safari";
                else
                    $browser= 'Something else'; 
                
                $tablet_browser = 0;
                $mobile_browser = 0;
                 
                if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                    $tablet_browser++;
                }
                 
                if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                    $mobile_browser++;
                }
                 
                if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
                    $mobile_browser++;
                }
 
                $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
                $mobile_agents = array(
                    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
                    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
                    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
                    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
                    'newt','noki','palm','pana','pant','phil','play','port','prox',
                    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
                    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
                    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
                    'wapr','webc','winw','winw','xda ','xda-');
                 
                if (in_array($mobile_ua,$mobile_agents)) {
                    $mobile_browser++;
                }
                 
                if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
                    $mobile_browser++;
                    //Check for tablets on opera mini alternative headers
                    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
                    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                      $tablet_browser++;
                    }
                }
                 
                if ($tablet_browser > 0) {
                   // do something for tablet devices
                   $device='Tablet';
                }
                else if ($mobile_browser > 0) {
                   // do something for mobile devices
                   $device='Mobile';
                }
                else {
                   // do something for everything else
                   $device='Desktop';
                } 
                $sql1="INSERT INTO `portal_tier5_in`.`visiters_log` (`v_id`,`ip`,`status`,`date`,`session`,`activation`,`time`,`country`,`country_code`,`continent`,`continent_code`,`city`,`county`,`region`,`region_code`,`timezone`,`flag`,`view`,`browser`,`device`) 
                VALUES (NULL, '".$user_ip."','".$status."','".$date."','".$_SESSION["time"]."','0','".$time."','".$country."','".$country_code."','".$continent."','".$continent_code."','".$city."','".$county."','".$region."','".$region_code."','".$timezone."','".$flag."','0','".$browser."','".$device."')";
                $result1=mysqli_query($link,$sql1);
                $_SESSION["userid"]=mysqli_insert_id($link);
                echo mysqli_insert_id();
                //echo mysql_error();
            //}
        }
    }
?>
