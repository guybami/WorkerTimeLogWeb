<?php

    // This module is used to start sessions
    if (strlen(session_id()) < 1) {
        //session_start();
    }
    // set timeout period in seconds. 30 min
    $inactive = 600 * 3;
    // check to see if $_SESSION['timeout'] is set
    if (isset($_SESSION['timeout'])) {
        $session_life = time() - $_SESSION['timeout'];
        if ($session_life > $inactive) {
            $values = preg_split('[/]', $_SERVER['SCRIPT_NAME']);
            //printArray($values);
            $url = "http://" . $_SERVER['HTTP_HOST'] . "/" . $values[1] . "/";
            $logoutURL = $url . "UserLogout.php";
            header("Location: $logoutURL ");
        }
    }
    // set session timeout
    $_SESSION['timeout'] = time();

 
