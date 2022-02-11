<?php

/* Module used to write usefull funtions...
 * Author: Guy Bami
 * Last update: 28.08.17
 * modified Utils::escapeJsonChars
 */

class Utils {

    public static function checkUserSession() {

        //$_SERVER['userName'] = 123;
        //self::checkAndStartSession();

        $rootUrl = "";
        if (!isset($_SESSION) || !isset($_SESSION['userName']) || !isset($_SESSION['encryptedData'])) {
            // NO Session has be initialized, we return to the login page
            $httpHost = $_SERVER['HTTP_HOST'];
            $values = preg_split('[/]', $_SERVER['SCRIPT_NAME']);
            //print_r($values[1]);
            //echo 'post: ' . strpos($httpHost, "localhost");
            if (strpos($httpHost, "localhost") !== FALSE) {
                // case of local host server
                //echo 'LOCAL';
                $rootUrl = "http://" . $httpHost . "/" . $values[1] . "/";
            } else {
                // case of live server
                $rootUrl = "http://" . $httpHost . "/";
            }

            $loginUrl = $rootUrl . "UserLogin.php";
            //echo  "<br />1.LOGIN PAGE: " . $loginUrl;
            header("Location: " . $loginUrl);
            exit();
        }
    }

    /* Summary: generates a table
     * Params: an array
     */

    public static function generateTableArray($array) {
        $buf = '';
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $buf .= '<tr>' . generateTableArray($value) . '</tr>';
            } else
                $buf .= "<td>$value</td>";
        }
        return $buf;
    }

    public static function generateEmptyLine($count) {
        $buff = '';
        for ($i = 0; $i < $count; $i++)
            $buff .= '<br />';
        return $buff;
    }

    public static function printArray($items) {
        //ob_start();
        echo "<pre>";
        print_r($items);
        echo "</pre>";
        //ob_end_clean();
    }

    public static function formatShortDate($str_date) {
        $sent_date = new DateTime($str_date);
        return date_format($sent_date, 'd.m.Y');
    }

    public static function formatShortDateFR($str_date) {
        $sent_date = new DateTime($str_date);
        return date_format($sent_date, 'd/m/Y');
    }

    function formatShortDateUS($str_date) {
        $sent_date = new DateTime($str_date);
        return date_format($sent_date, 'Y-m-d');
    }

    public static function formatFullDateUS($str_date) {
        $sent_date = new DateTime($str_date);
        return date_format($sent_date, 'Y-m-d H:i:s');
    }

    public static function formatFullDate($str_date) {
        $sent_date = new DateTime($str_date);
        return date_format($sent_date, 'd.m.Y H:i:s');
    }

    public static function getDisplayedUserType($userType) {
        if ($userType == "meeting_member")
            return "Membre";
        else if ($userType == "administrator")
            return "Administrator";
        return "Utilisateur";
    }

    public static function getWebsiteRootURL() {

        $httpHost = $_SERVER['HTTP_HOST'];
        $values = preg_split('[/]', $_SERVER['SCRIPT_NAME']);
        //print_r($values[1]);
        $serverIp = $_SERVER['SERVER_ADDR'];

        if (stripos($httpHost, "localhost") !== FALSE || strpos($serverIp, "127.0.0.1") !== FALSE){
            // case of local host server
            $rootUrl = "http://" . $httpHost . "/" . $values[1] . "/";
        } else {
            // case of live server
            $rootUrl = "http://" . $httpHost . "/";
        }
        return $rootUrl;
    }

    public static function getWebsiteRootURL_old() {
        $values = preg_split('[/]', $_SERVER['SCRIPT_NAME']);
        //print_r($values);
        $url = "";
        if (count($values) > 0 && count($values) >= 3) {
            // for locahost test server
            $url = "http://" . $_SERVER['HTTP_HOST'] . "/" . $values[1] . "/";
        } else
        if (count($values) > 0 && count($values) == 2) {
            // for live server
            $url = "http://" . $_SERVER['HTTP_HOST'] . "/";
        }
        //echo "url: " . $url;
        return $url;
    }

    public static function isLiveServer() {
        $rootURL = Utils::getWebsiteRootURL();
        //echo "rootURL: " .  $rootURL;
        if (strpos($rootURL, "localhost") !== FALSE) {
            return false;
        }

        return true;
    }

    public static function loadUIResources($frResourceFileName, $enResourceFileName, $deResourceFileName = "") {

        self::checkAndStartSession();

        if (!isset($_SESSION) || !isset($_SESSION['userLang'])) {
            // default language ist english
            if (file_exists($enResourceFileName)) {
                include_once $enResourceFileName;
            }
            return;
        }

        //throw new Exception("Exception occured in loadUIResources: Session not initialized");
        $_SESSION['userLang'] = "de-DE";
        $userLang = $_SESSION['userLang'];
        //echo 'user lang: '. $_SESSION['userLang'];
        if ($userLang == "fr-FR") {
            //include_once($fr_resource_file_name);
            if (file_exists($frResourceFileName)) {
                include_once $frResourceFileName;
            }
        } else if ($userLang == "de-DE") {
            if (file_exists($deResourceFileName)) {
                include_once $deResourceFileName;
            }
        }
        else {
            if (file_exists($enResourceFileName)) {
                include_once $enResourceFileName;
            }
        }
    }

    public static function sendMail($senderFullName, $message) {

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // receivers mails
        //$to = 'heilbronnconnectiongroup@yahoo.fr';
        $to = 'forum@smartfretline.com';
        // Additional headers

        $subject = $senderFullName . " a commente une photo ";
        $fullMessage = "<b>" . $senderFullName . " </b><br />" . $message;
        // send email
        $sendMail = false;
        if (!$sendMail)
            return;
        if (mail($to, $subject, $fullMessage, $headers)) {
            // mail has been successfully sent
        } else {
            echo "<br /><br />
                    <span class='errorMsg'>Error when sending your email to Administrator</span>
                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            ";
        }
    }

    public static function sendMailToGroup($type, $senderFullName, $userPhoto, $message) {

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Smart Fret Line <administrator@smartfretline.com>';
        //$headers .=  'To: Smart Fret Line - Forum <forum@smartfretline.com>';
        // receivers mails
        $to = 'guybami@yahoo.fr';
        //$to = 'forum@smartfretline.com';

        $to = 'Smart Fret Line - Forum <forum@smartfretline.com>';
        if ($type == "email")
            $to = 'Smart Fret Line - Mail <forum@smartfretline.com>';

        // Additional headers
        switch ($type) {
            case "photoComment":
                $subject = $senderFullName . " a commente une photo ";
                $fullMessage = "<b>" . $senderFullName . ":</b>" . $message;
                break;
            case "postComment":
                $subject = $senderFullName . " a poste un message";
                $fullMessage = "<b>" . $senderFullName . ":</b>" . $message;
                break;
            case "info":
                $subject = $senderFullName . " a poste une info";
                $fullMessage = "<b>" . $senderFullName . ":</b>" . $message;
                break;
            case "email":
                $subject = $senderFullName . " a envoye un mail";
                $fullMessage = "<b>" . $senderFullName . ":</b>" . $message;
                break;
            default:
                $subject = $senderFullName . " a poste une info";
                $fullMessage = "<b>" . $senderFullName . ":</b>" . $message;
                break;
        }

        $head = '
      <html>
      <head>
          <style type="text/css">

              body
              {
	              padding-bottom: 1px;
	              margin: 0px 0px 0px 0px;
	              padding-top:0;
	              height: 100%;
	              vertical-align:middle;
	              font-style:normal;
   	            font-family:Verdana;
   	              font-size:13px;
   	              color:#000000;
   	              overflow-x:hidden;
              }

              .biggerWidth
              {
                  width:90%;
              }
              .fullWidth
              {
                  width:100%;
              }

              .smallerMsg
              {
	              font-size:smaller;
              }
              .toLeft
              {
	                text-align:left;
              }
              .toRight
              {
	                text-align:right;
              }

              table.fullWidth {
                  width: 100%;
              }
              .userCommentInnerTableNoBottom {
                  background-color: #CCCFE4;
                  border-color: #FFFFFF;
                  border-style: solid;
                  border-width: 1px 0 0 1px;
                  margin: 0;
                  width: 100%;
              }
              td.toLeft, th.toLeft {
                  text-align: left;
              }
              .commentTextCol {
                  word-wrap: break-word;
              }
              .toLeft {
                  text-align: left;
              }

              .toCenter {
                  text-align: center;
              }

              .userDisplayName {
                  font-size: 13px;
                  font-weight: bold;
              }


              .commentText {
                  font-size: 12px;
                  line-height: 1.5;
                  margin-left: 3px;
                  text-align: justify;
              }

              .commentDate {
                  color: #333333;
                  font-size: 10px;
                  text-align: left;
              }
          </style>
      </head>
      <body>
      ';

        $footer = '
            </body>
        </html>';
        $sentDate = date('d.m.Y H:i:s');
        $userPhotoPath = "http://smartfretline.com/Resources/images/userPhotos/" . $userPhoto;

        //echo 'userPhotoPath: '  . $userPhotoPath;

        $content = '
        <table cellspacing="0" cellpadding="2" class="fullWidth userCommentInnerTableNoBottom">
						<tbody>
              <tr>
							<td valign="top">
								<div class="userPhotoComment">
									<img src="' . $userPhotoPath . '" alt="-"/>
								</div>
							</td>
							<td valign="top" class="toLeft fullWidth commentTextCol">
								<table cellpadding="0" class="fullWidth">
									<tbody>
                  <tr>
										<td class="toLeft  commentTextCol">
											<span class="userDisplayName">' . $senderFullName . '</span>
											<span class="commentText">
												' . $message . '
											</span><br>
											<span class="toLeft  commentTextCol">
												<span class="commentDate">' . $sentDate . '</span>
											</span>
										</td>
									</tr>
								</tbody>
               </table>
							</td>
						</tr>
					</tbody>
				</table>
    ';

        $htmlMessage = $head . $content . $footer;

        $webURL = getWebsiteRootURL();
        $pos = strpos($webURL, "localhost");
        //echo " url-pos: " . $pos;
        if ($pos > 0)
            $sendMail = false;
        else
            $sendMail = true;
        // send email

        if (!$sendMail)
            return;
        if (mail($to, $subject, $htmlMessage, $headers)) {
            // mail has been successfully sent
            return true;
        } else {
            echo "<br /><br />
                        <span class='errorMsg'>Error when sending your email to Administrator</span>
                       <br />
              ";
            return false;
        }
    }

    public static function sendMailWithSender($senderName, $subject, $message) {

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        //$headers .=  $senderEmail;
        $headers .= 'From: Smart Fret Line <administrator@smartfretline.com>';
        $to = 'Smart Fret Line - Forum <forum@smartfretline.com>';
        // receivers mails
        $to = "guybami@yahoo.fr";
        // Additional headers

        $fullMessage = $message;
        // send email
        $canSend = false;
        $rootURL = getWebsiteRootURL();
        if (strpos($rootURL, "localhost") !== false)
            $canSend = false;
        else
            $canSend = true;

        if (!$canSend)
            return false;
        if (mail($to, $subject, $message, $headers)) {
            // mail has been successfully sent
            return true;
        } else {
            return false;
        }
    }

    public static function checkAndStartSession() {

        $sessionStarted = FALSE;
        if (php_sapi_name() !== 'cli') {
            if (version_compare(phpversion(), '5.4.0', '>=')) {
                $sessionStarted = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                $sessionStarted = session_id() === '' ? FALSE : TRUE;
            }
        }
        if ($sessionStarted === FALSE && strlen(session_id()) < 2) {
            session_start();
            //echo "Session Started with id: " . session_id();
        }
    }

    public static function escapeString($str) {
        $str = trim($str);
        return htmlspecialchars(stripcslashes($str));
    }

    public static function escapeJsonChars($message) {
        $message = str_replace('"', "'", $message);
        $message = str_replace(PHP_EOL, " ", $message);
        $message = htmlentities($message);
        $message = str_replace(array("\r\n", "\r", "\n", "\\r", "\\n", "\\r\\n"), "<br/>", $message);

        //$message = preg_replace('/\t/', '--', $message);
        // $message = preg_replace("~[\r\n\t]+~", "X", $message);
        return ($message);
    }

    /**
     *
     * @param mixed $message
     * @return mixed
     */
    public static function formatJsonErrorMessage($message) {
        //echo self::escapeJsonChars($message);
        return '[{"jsonErrorMessage":"' . self::escapeJsonChars($message) . '"}]';
    }

    /**
     * format result message
     * @param mixed $message
     * @return mixed
     */
    public static function formatJsonResultMessage($message) {
        return '[{"jsonResult":"' . self::escapeJsonChars($message) . '"}]';
    }

    public static function formatJsonMessage($key, $message) {
        return '[{"' . $key . '":"' . self::escapeJsonChars($message) . '"}]';
    }

    /**
     * count array dimension
     * @param mixed $Array
     * @param mixed $count
     * @return mixed
     */
    public static function countArrayDimension($Array, $count = 0) {
        if (is_array($Array)) {
            return self::countArrayDimension(current($Array), ++$count);
        } else {
            return $count;
        }
    }

    /**
     * Converts an array to JSON string
     * @param mixed $arrayObject
     * @param mixed $userFirstFieldAsKey
     * @param mixed $useNonMumericKey
     * @return string
     */
    public static function convertArrayToJson($arrayObject, $userFirstFieldAsKey = false, $useNonMumericKey = false) {
        $jsonResult = "[{";
        $itemSperator = ",";
        $i = 0;

        if ($useNonMumericKey == false) {
            // remove all numerical keys
            foreach ($arrayObject as $key => $var) {
                if (is_numeric($key)) {
                    unset($arrayObject[$key]);
                }
            }
        }

        foreach ($arrayObject as $key => $value) {

            $value = Utils::escapeJsonChars($value);
            if ($userFirstFieldAsKey) {
                if ($i == 0) {
                    $jsonResult .= '{"id":"' . $value . '"';
                    $jsonResult .= '"' . $key . '":"' . $value . '"';
                } else {
                    $jsonResult .= ',"' . $key . '":"' . $value . '"';
                }
            } else {
                if ($i == 0) {
                    $jsonResult .= '"' . $key . '":"' . $value . '"';
                } else {
                    $jsonResult .= $itemSperator . '"' . $key . '":"' . $value . '"';
                }
            }
            $i++;
            // if ($i != count($arrayObject) - 1) {
            //   $usersList .= $itemSperator;
            //}
        }
        // close the list
        $jsonResult .= "}]";

        return Utils::encodeSpecialCahrsForJson($jsonResult);
    }

    
    public static function convertArrayToObject($arrayObject, $useNonMumericKey = false) {
        $jsonResult = "";
        $itemSperator = ",";
        $i = 0;

        if ($useNonMumericKey == false) {
            // remove all numerical keys
            foreach ($arrayObject as $key => $var) {
                if (is_numeric($key)) {
                    unset($arrayObject[$key]);
                }
            }
        }

        foreach ($arrayObject as $key => $value) {

            $value = Utils::escapeJsonChars($value);
            {
                if ($i == 0) {
                    $jsonResult .= '{"' . $key . '":"' . $value . '"';
                } else {
                    $jsonResult .= $itemSperator . '"' . $key . '":"' . $value . '"';
                }
            }
            $i++;
            // if ($i != count($arrayObject) - 1) {
            //   $usersList .= $itemSperator;
            //}
        }
        // close the list
        $jsonResult .= "}";

        return Utils::encodeSpecialCahrsForJson($jsonResult);
    }


    public static function removeNumericalKeys($arrayObject){
        // remove all numerical keys
            foreach ($arrayObject as $key => $var) {
                if (is_numeric($key)) {
                    unset($arrayObject[$key]);
                }
            }
            return $arrayObject;
    }
    
    /**
     * Formats tring into date and time
     * @param mixed $engDateStr
     * @param mixed $locale
     * @return mixed
     */
    public static function strToDateAndTime($engDateStr, $locale = "en") {

        //date_default_timezone_set('UTC');
        $dateTime = strtotime($engDateStr);
        if ($locale == "fr") {
            return date('d/m/Y H:i:s', $dateTime);
        } else if ($locale == "en") {
            return date('Y-m-d H:i:s', $dateTime);
        } else if ($locale == "de") {
            return date('d.m.Y H:i:s', $dateTime);
        }
        return date('Y-m-d H:i:s', $dateTime);
    }

    /**
     *
     * @param mixed $engDateStr
     * @param mixed $locale
     * @return mixed
     */
    public static function strToDate($engDateStr, $locale = "en") {
        $dateTime = strtotime($engDateStr);
        if ($locale == "fr") {
            return date('d/m/Y', $dateTime);
        } else if ($locale == "en") {
            return date('Y-m-d', $dateTime);
        } else if ($locale == "de") {
            return date('d.m.Y', $dateTime);
        }
        return date('Y-m-d', $dateTime);
    }

    /**
     * generates item Refence Number
     * @return mixed
     */
    public static function generateItemRefenceNumber($size = 10) {
        // uniqid() returns 13 chars by default. We use only 10
        $buffGUID = uniqid() . uniqid();
        $randomString = substr($buffGUID, 0, $size);
        return strtoupper($randomString);
    }

    public static function logMessage($message, $bold = NULL, $red = NULL) {
        // uniqid() returns 13 chars by default. We use only 10
        if (isset($bold)) {
            echo "<b>$message</b>";
        } else if (isset($bold)) {
            echo "<b>$message</b>";
        } else {
            echo "$message";
        }
    }

    public static function deleteDirectory($path) {
        $class_func = array(__CLASS__, __FUNCTION__);
        return is_file($path) ?
                @unlink($path) :
                array_map($class_func, glob($path . '/*')) == @rmdir($path);
    }

    public static function getServerRootURL() {
        $httpHost = $_SERVER['HTTP_HOST'];
        $values = preg_split('[/]', $_SERVER['SCRIPT_NAME']);
        //print_r($values[1]);
        $serverIp = $_SERVER['SERVER_ADDR'];

        if (stripos($httpHost, "localhost") !== FALSE || strpos($serverIp, "127.0.0.1") !== FALSE){
            // case of local host server
            $rootUrl = "http://" . $httpHost . "/" . $values[1] . "/";
        } else {
            // case of live server
            $rootUrl = "http://" . $httpHost . "/";
        }
        return $rootUrl;
    }

    public static function encodeSpecialCahrsForJson($jsonString) {
        return str_replace("\n", " ", str_replace("\r", " ", $jsonString));
    }

    public static function getClientIP() {
        $ipAddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipAddress = 'UNKNOWN';
        }
        return $ipAddress;
    }
    
    public static function  getServerIP() { 
        $ipAddress = '';
        if (isset($_SERVER['SERVER_ADDR'])) {
            $ipAddress = $_SERVER['SERVER_ADDR'];
        } 
        else {
            $ipAddress = 'UNKNOWN';
        }
        return $ipAddress;
    }

    
    public static function jsonDecode($jsonData, $assoc = true, $depth = NULL, $options = NULL){
        $jsonDecoded = $jsonData;
        if(is_string($jsonData)){
            $jsonDecoded = json_decode($jsonData, $assoc);
        }
        else if(is_array($jsonData)){
            $jsonDecoded = $jsonData;
        }
        else {
            $jsonDecoded = $jsonData;
        }
        return $jsonDecoded;
    }
    
    public static function logMessageToFile($message){
        $suffix = date('d.m.Y'); // date('d.m.Y H:i:s');
        $logFileName = "../Logs/webLog." . $suffix . ".log";
        $messageLog = "[" . date('d.m.Y H:i:s') . "]: " . $message;
        // log errors into file
        error_log($messageLog . "\n\n", 3, $logFileName);
    }
    
    public static function logRequestToFile($userAction){
        $message = "requestPath: " . $_SERVER['REQUEST_URI'] . ", ";
        $message .= "userAction: " . $userAction . ", \n";
        $message .= "Post data: " . json_encode($_POST);
        Utils::logMessageToFile($message);
    }
    
    
    public static function formatShortTime($str_date) {
        $sent_date = new DateTime($str_date);
        return date_format($sent_date, 'H:i');
    }

    public static function logDataToFile($data){
        $message = "requestPath: " . $_SERVER['REQUEST_URI'] . ", ";
        $message .= "Post data: " . json_encode($data);
        Utils::logMessageToFile($message);
    }
}
