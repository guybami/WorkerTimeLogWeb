<?php 
     
    //Module used to check user session 
     
    $sessionStarted = FALSE;
    if (php_sapi_name() !== 'cli') {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            $sessionStarted = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            $sessionStarted = session_id() === '' ? FALSE : TRUE;
        }
    }
    if($sessionStarted === FALSE && strlen(session_id()) < 2){
        session_start();
    }
    $_SESSION['encryptedData'] = "Test";
    $_SESSION["userID"] = "123";
    $_SESSION['userName'] = "Administrator";
    //print_r($_SESSION);
    //print_r($_SERVER);
    $rootUrl = "";
    if (!isset($_SESSION) || !isset($_SESSION['userName'])  || !isset($_SESSION['encryptedData'])) {
        // NO Session has be initialized, we return to the login page
        $httpHost = $_SERVER['HTTP_HOST'];
        $serverIp = $_SERVER['SERVER_ADDR'];
        $values = preg_split('[/]', $_SERVER['SCRIPT_NAME']);
        //print_r($values[1]);
        //echo 'post: ' . strpos($httpHost, "localhost");
        //echo 'Server: '. $_SERVER['SERVER_ADDR'];
        if (stripos($httpHost, "localhost") !== FALSE || strpos($serverIp, "127.0.0.1") !== FALSE) {
            // case of local host server
            //echo 'LOCAL';
            $rootUrl = "http://" . $httpHost . "/" . $values[1] . "/";
            
        }
        else{
            // case of live server
            $rootUrl = "http://" . $httpHost . "/";
        }
        
        $loginUrl = $rootUrl . "UserLogin.php";
        //echo  "<br />1.LOGIN PAGE: " . $loginUrl;
        header("Location: " . $loginUrl);
        exit();
        
        
    }

 
    function oldCode(){
        $values = preg_split('[/]', $_SERVER['SCRIPT_NAME']);
       // print_r($values);
        print_r($_SERVER);
        $rootUrl = "";
        if (count($values) > 0 && count($values) >= 5) {
            // for locahost test server
            $rootUrl = "http://" . $_SERVER['HTTP_HOST'] . "/" . $values[1] . "/"; // . $values[2] . "/";
        } 
        else if (count($values) > 0 && count($values) >= 4) {
            // for live server
            //$rootUrl = "http://" . $_SERVER['HTTP_HOST'] . "/";
            $rootUrl = "http://" . $_SERVER['HTTP_HOST'] . "/" . $values[1] . "/";
        }
        else if (count($values) > 0 && count($values) >= 3) {
            // for live server
            $rootUrl = "http://" . $_SERVER['HTTP_HOST'] . "/" . $values[1]  . "/";
        }
        $loginUrl = $rootUrl . "UserLogin.php";
        echo  "<br />LOGIN PAGE: " . $loginUrl;
        //header("Location: " . $loginUrl);
        exit();
    }