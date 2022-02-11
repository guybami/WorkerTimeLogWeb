<?php
/* Module used to include usefull modules.
 * Author: Guy Bami
 * Last update: 19.09.2016
 */
    include_once "ReportErrors.php";
    include_once "Sessions.php";
    //include_once "CommonNoSessionsCheck.php"; //"CheckSessions.php";
    include_once "CheckSessions.php";  
    include_once "Utils.php";




    class Common{
        public static $UPDATE_SUCCESSFUL = "SUCCESSFUL_UPDATE";
        public static $UPDATE_INLINE_SUCCESSFUL = "SUCCESSFUL_UPDATE_INLINE";
        public static $INSERT_SUCCESSFUL = "SUCCESSFUL_INSERT";
        public static $DELETE_SUCCESSFUL = "SUCCESSFUL_DELETE";
        public static $UPDATE_FAILED = "UPDATE_FAILED";
        public static $DELETE_FAILED = "DELETE_FAILED";
        public static $INSERT_FAILED = "INSERT_FAILED";

    }