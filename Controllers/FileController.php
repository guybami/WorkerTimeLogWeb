
<?php

/**
 *  
 * The file controller entity class.
 * @author
 *    Guy Bami Watcho
 */
include_once 'BaseController.php';

class FileController extends BaseController {

    

    /**
     * Constructor of the Task controller 

     * @param $userAction string the user action
     * @param $userRoles array the user roles 
     */
    function __construct($userAction, $userRoles = array()) {
         
    }

    /**
     * Gets all Task entities
     * @return mixed object having all Task entities
     *    or string with the Exception details if error occured
     */
    public function getAllFilesJson() {

        $itemSperator = ",";
        $entitiesList = "";
		$directoryName = ".";
        $directoryName = "../UploadedFiles/TaskReports/";
		//$directoryName = "../UploadedFiles";
		//$path    = '.';
		//$parent_dir = dirname(__DIR__);
		echo  "parent: $parent_dir";
		$allFiles = array_diff(scandir($directoryName), array('.', '..'));
		if (count($allFiles) > 0) {
            for ($i = 0; $i < count($allFiles); $i++) {
                $entitiesList .=
                        '{"fileId":"' .  $i . '"'
                        . ',"fileName":"' . $allFiles[$i] . '"'
                         
                        . '}';

                if ($i != count($allFiles) - 1) {
                    $entitiesList .= $itemSperator;
                }
            }
            // close json list
            $entitiesList = "[" . $entitiesList . "]";
        }
        return $entitiesList;
    }
	
	public function getAllFiles(){
		
		$path    = '.';
		$files = array_diff(scandir($path), array('.', '..'));
		foreach($files as $file){
			echo "$file <br />";
		}
		return "DONE";
	}

     
     

 }
 
 

$userAction = null;
if (isset($_POST) && isset($_POST['userAction'])) {
    $userAction = $_POST['userAction'];
}
else if (isset($_GET) && isset($_GET['userAction'])) {
    $userAction = $_GET['userAction'];
}

if (!isset($userAction)) {
    echo "No action has been set";
} else {
    $fileController = new FileController($userAction);
    $fileController->setUserAction($userAction);
    $postbackContent = $fileController->getAllFilesJson();

    // send back content to client
    echo $postbackContent;
}
            

