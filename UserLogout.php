<?php

    include_once("Includes/Utils.php");

    //clear session
    Utils::checkAndStartSession();
    unset($_SESSION['userID']);
    unset($_SESSION['userName']);
    $_SESSION['userID'] = null;
    unset($_SESSION);
    session_unset();
    session_destroy();
    $url = Utils::getWebsiteRootURL();

    $loginURL = $url . "UserLogin.php";
    $pos = strrpos("/", $_SERVER['REQUEST_URI']);
    $len = strlen( $_SERVER['REQUEST_URI']);

    //echo "<br />: Sub:" .   substr($_SERVER['REQUEST_URI'], 0,    $pos);
    //echo "<br />: " . "URL: " .   $_SERVER['REQUEST_URI'];
    //print_r($_SERVER);
    // redirect the page to login page
    header("Location: $loginURL ");

 

