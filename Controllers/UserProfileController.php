
<?php

/**
 * This module was auto generated by GWatcho-Code generator
 * The UserProfile controller entity class.
 * @author
 *    Guy Bami Watcho
 */
include_once 'BaseController.php';

class UserProfileController extends BaseController {

    private $userProfile = null;

    /**
     * Constructor of the UserProfile controller 

     * @param $userAction string the user action
     * @param $userRoles array the user roles 
     */
    function __construct($userAction, $userRoles = array()) {
        parent::__construct($userAction, $userRoles);
        $this->userProfile = new UserProfile();
    }

    /**
     * Gets all UserProfile entities
     * @return mixed object having all UserProfile entities
     *    or string with the Exception details if error occured
     */
    public function getAllUserProfiles() {

        $itemSperator = ",";
        $entitiesList = "";
        $resultObject = $this->userProfile->selectAllUserProfiles();
        if (is_string($resultObject)) {
            return Utils::formatJsonErrorMessage($resultObject);
        } else if (is_array($resultObject)) {
            for ($i = 0; $i < count($resultObject); $i++) {
                $entitiesList .=
                        '{"profileId":"' . $resultObject[$i]["profileId"] . '"'
                        . ',"userId":"' . $resultObject[$i]["userId"] . '"'
                        . ',"gender":"' . $resultObject[$i]["gender"] . '"'
                        . ',"photoFileName":"' . $resultObject[$i]["photoFileName"] . '"'
                        . ',"street":"' . $resultObject[$i]["street"] . '"'
                        . ',"zipCode":"' . $resultObject[$i]["zipCode"] . '"'
                        . ',"city":"' . $resultObject[$i]["city"] . '"'
                        . ',"address":"' . $resultObject[$i]["address"] . '"'
                        . ',"defalutLanguage":"' . $resultObject[$i]["defalutLanguage"] . '"'
                        . '}';

                if ($i != count($resultObject) - 1) {
                    $entitiesList .= $itemSperator;
                }
            }
            // close json list
            $entitiesList = "[" . $entitiesList . "]";
        }
        return $entitiesList;
    }

    /**
     * Inserts new UserProfile entity
     * @param mixed $jsonData json object entity to insert
     * @return mixed  true if insertion was successful
     *    or string with the Exception details if error occured
     */
    public function insertNewUserProfile($jsonData) {

        // get json posted values from request
        //$formJsonValues = json_decode($jsonData, true);
        $formJsonValues = $jsonData;
        $postbackData = "";
        $resultObject = null;
        // insert entity using model object
        $resultObject = $this->userProfile->insertNewUserProfile(
                $formJsonValues['userId']
                , $formJsonValues['gender']
                , $formJsonValues['photoFileName']
                , $formJsonValues['street']
                , $formJsonValues['zipCode']
                , $formJsonValues['city']
                , $formJsonValues['address']
                , $formJsonValues['defalutLanguage']
        );

        if (is_bool($resultObject) || is_int($resultObject)) {
            $postbackData = Utils::formatJsonMessage("insertedItemKey", $resultObject);
        } else if (is_string($resultObject)) {
            //error occured
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        } else {
            //error occured
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }
        return $postbackData;
    }

    /**
     * Updates UserProfile entity via POST request
     * @param int $customerId
     * @param string $updateMode
     * @param mixed $jsonData
     * @return mixed  true if update was successful
     *    or string with the Exception details if error occured
     */
    public function updateUserProfile($profileId, $updateMode, $jsonData) {

        // get json posted values from request
        //$formJsonValues = json_decode($jsonData, true);
        $formJsonValues = $jsonData;
        $postbackData = "";
        $resultObject = null;
        if ($updateMode == "allFields") {
            // update all entity fields
            $resultObject = $this->userProfile->updateUserProfileDetails(
                    $profileId
                    , $formJsonValues['userId']
                    , $formJsonValues['gender']
                    , $formJsonValues['photoFileName']
                    , $formJsonValues['street']
                    , $formJsonValues['zipCode']
                    , $formJsonValues['city']
                    , $formJsonValues['address']
                    , $formJsonValues['defalutLanguage']
            );
            if (is_bool($resultObject)) {
                if ($resultObject == true) {
                    $postbackData = Utils::formatJsonResultMessage(Common::$UPDATE_SUCCESSFUL);
                } else {
                    $postbackData = Utils::formatJsonResultMessage(Common::$UPDATE_FAILED);
                }
            } else if (is_string($resultObject)) {
                //error occured
                $postbackData = Utils::formatJsonErrorMessage($resultObject);
            }
        } else if ($updateMode == "inlineUpdate") {
            // Update entity from the datagrid
            $fieldName = $formJsonValues['fieldName'];
            $keyFieldValue = $formJsonValues['entityKeyId'];
            $newFieldValue = $formJsonValues['newFieldValue'];
            $resultObject = $this->userProfile->updateUserProfileEntityField($fieldName, $keyFieldValue, $newFieldValue);
            if (is_string($resultObject)) {
                //error occured
                $postbackData = Utils::formatJsonErrorMessage($resultObject);
            } else if (is_bool($resultObject)) {
                $postbackData = Utils::formatJsonResultMessage(Common::$UPDATE_INLINE_SUCCESSFUL);
            }
        }
        return $postbackData;
    }

    /**
     * Deletes all selected entities via POST request
     * @param mixed $jsonData all entities Id to delete
     * @return mixed
     */
    public function deleteUserProfiles($jsonData) {

        // delete entity using model
        $resultObject = $this->userProfile->deleteSelectedUserProfiles($jsonData);
        if (is_bool($resultObject)) {
            if ($resultObject == true) {
                $postbackData = Utils::formatJsonResultMessage(Common::$DELETE_SUCCESSFUL);
            } else {
                $postbackData = Utils::formatJsonResultMessage(Common::$DELETE_FAILED);
            }
        } else if (is_string($resultObject)) {
            //error occured
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        } else {
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }
        return $postbackData;
    }

    /**
     * Deletes all entities
     * @param mixed $jsonData all entities Id to delete
     * @return mixed
     */
    public function deleteAllUserProfiles() {

        // delete entities using corresponding model
        $resultObject = $this->userProfile->deleteAllUserProfiles();
        if (is_bool($resultObject)) {
            if ($resultObject == true) {
                $postbackData = Utils::formatJsonResultMessage(Common::$DELETE_SUCCESSFUL);
            } else {
                $postbackData = Utils::formatJsonResultMessage(Common::$DELETE_FAILED);
            }
        } else if (is_string($resultObject)) {
            //error occured
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        } else {
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }
        return $postbackData;
    }

    /**
     * Get dynamic page content
     * @return mixed
     */
    public function getDynamicPageContent() {

        $postbackData = "Undefined Content";
        $resultObject = null;
        switch ($this->getUserAction()) {
            case "getAllItems":
                $postbackData = $this->getAllUserProfiles();
                break;
            case "addNewItem":
            case "insertNewItem":
                $jsonData = array();
                if (isset($_POST['formValues'])) {
                    $jsonData = $_POST['formValues'][0];
                }
                $postbackData = $this->insertNewUserProfile($jsonData);
                break;
            case "updateItem":
                $updateMode = "allFields";
                if (isset($_POST['updateMode'])) {
                    $updateMode = $_POST['updateMode'];
                }
                $profileId = $_POST['profileId'];
                $jsonData = $_POST['formValues'][0];
                $postbackData = $this->updateUserProfile($profileId, $updateMode, $jsonData);
                break;
            case "deleteItem":
                $jsonData = array();
                if (isset($_POST['selectedIds'])) {
                    $jsonData = $_POST['selectedIds'];
                }
                $postbackData = $this->deleteUserProfiles($jsonData);
                break;
            case "deleteAllItems":
                $postbackData = $this->deleteAllUserProfiles();
                break;
            case "editDetails":
                $postbackData = "Undefined Content";
                if (isset($_POST['profileId'])) {
                    $profileId = $_POST['profileId'];
                    $resultObject = $this->userProfile->getUserProfileDetails($profileId);
                }
                if (is_string($resultObject)) {
                    $postbackData = Utils::formatJsonErrorMessage($resultObject);
                } else if (is_array($resultObject)) {
                    $postbackData = Utils::convertArrayToJson($resultObject[0]);
                }
                break;
            case "viewDetails":
            case "cancelChanges":
                if (isset($_POST['profileId'])) {
                    $profileId = $_POST['profileId'];
                    $resultObject = $this->userProfile->getUserProfileDetails($profileId);
                }
                if (is_string($resultObject)) {
                    $postbackData = Utils::formatJsonErrorMessage($resultObject);
                } else if (is_array($resultObject)) {
                    $postbackData = Utils::convertArrayToJson($resultObject[0]);
                }
                break;
        }
        return $postbackData;
    }

}

if ($_SERVER['CONTENT_TYPE'] === "application/json; charset=UTF-8" || $_SERVER['CONTENT_TYPE'] === "application/json") {
    $jsonRaw = file_get_contents("php://input");

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

$userAction = null;
if (isset($_POST) && isset($_POST['userAction'])) {
    $userAction = $_POST['userAction'];
} else if (isset($_GET) && isset($_GET['userAction'])) {
    $userAction = $_GET['userAction'];
}
if (!isset($userAction)) {
    echo "No action has been set";
} else {
    Utils::logRequestToFile($userAction);
    $userProfileController = new UserProfileController($userAction);
    $userProfileController->setUserAction($userAction);
    $postbackContent = $userProfileController->getDynamicPageContent();

    // send back content to client
    echo $postbackContent;
}
            

