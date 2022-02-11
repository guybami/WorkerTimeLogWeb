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
    
    //print_r($_SESSION) ;
    if (!isset($_SESSION) || strlen($_SESSION['userName']) == 0 || !isset($_SESSION['userName'])) {
        $values = preg_split('[/]', $_SERVER['SCRIPT_NAME']);
        //print_r($values);
        $url = "";
        if (count($values) > 0 && count($values) == 5) {
            // for locahost test server
            $url = "http://" . $_SERVER['HTTP_HOST'] . "/" . $values[1] . "/";
        } 
        else
        if (count($values) > 0 && count($values) == 4) {
            // for live server
            $url = "http://" . $_SERVER['HTTP_HOST'] . "/";
        }
        header("Location: " . $url . "UserLogin.php");
        exit();
    }
    

 