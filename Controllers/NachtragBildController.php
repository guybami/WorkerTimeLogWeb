
<?php

/**
 * This module was auto generated by GWatcho-Code generator
 * The NachtragBild controller entity class.
 * @author
 *    Guy Bami Watcho
 */
include_once 'BaseController.php';

class NachtragBildController extends BaseController {

    private $nachtragBild = null;

    /**
     * Constructor of the NachtragBild controller 

     * @param $userAction string the user action
     * @param $userRoles array the user roles 
     */
    function __construct($userAction, $userRoles = array()) {
        parent::__construct($userAction, $userRoles);
        $this->nachtragBild = new NachtragBild();
    }

    /**
     * Gets all NachtragBild entities
     * @return mixed object having all NachtragBild entities
     *    or string with the Exception details if error occured
     */
    public function getAllNachtragBilds() {

        $itemSperator = ",";
        $entitiesList = "";
        $resultObject = $this->nachtragBild->selectAllNachtragBilds();
        if (is_string($resultObject)) {
            return Utils::formatJsonErrorMessage($resultObject);
        } else if (is_array($resultObject)) {
            for ($i = 0; $i < count($resultObject); $i++) {
                $entitiesList .=
                        '{"bildId":"' . $resultObject[$i]["bildId"] . '"'
                        . ',"nachtragId":"' . $resultObject[$i]["nachtragId"] . '"'
                        . ',"dateiName":"' . $resultObject[$i]["dateiName"] . '"'
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
     * Inserts new NachtragBild entity
     * @param mixed $jsonData json object entity to insert
     * @return mixed  true if insertion was successful
     *    or string with the Exception details if error occured
     */
    public function insertNewNachtragBild($jsonData) {

        // get json posted values from request
        //$formJsonValues = json_decode($jsonData, true);
        $formJsonValues = $jsonData;
        $postbackData = "";
        $resultObject = null;
        // insert entity using model object
        $resultObject = $this->nachtragBild->insertNewNachtragBild(
                $formJsonValues['nachtragId']
                , $formJsonValues['dateiName']
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
     * Updates NachtragBild entity via POST request
     * @param int $customerId
     * @param string $updateMode
     * @param mixed $jsonData
     * @return mixed  true if update was successful
     *    or string with the Exception details if error occured
     */
    public function updateNachtragBild($bildId, $updateMode, $jsonData) {

        // get json posted values from request
        //$formJsonValues = json_decode($jsonData, true);
        $formJsonValues = $jsonData;
        $postbackData = "";
        $resultObject = null;
        if ($updateMode == "allFields") {
            // update all entity fields
            $resultObject = $this->nachtragBild->updateNachtragBildDetails(
                    $bildId
                    , $formJsonValues['nachtragId']
                    , $formJsonValues['dateiName']
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
            $resultObject = $this->nachtragBild->updateNachtragBildEntityField($fieldName, $keyFieldValue, $newFieldValue);
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
    public function deleteNachtragBilds($jsonData) {

        // delete entity using model
        $resultObject = $this->nachtragBild->deleteSelectedNachtragBilds($jsonData);
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
    public function deleteAllNachtragBilds() {

        // delete entities using corresponding model
        $resultObject = $this->nachtragBild->deleteAllNachtragBilds();
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
                $postbackData = $this->getAllNachtragBilds();
                break;
            case "addNewItem":
            case "insertNewItem":
                $jsonData = array();
                if (isset($_POST['formValues'])) {
                    $jsonData = $_POST['formValues'][0];
                }
                $postbackData = $this->insertNewNachtragBild($jsonData);
                break;
            case "updateItem":
                $updateMode = "allFields";
                if (isset($_POST['updateMode'])) {
                    $updateMode = $_POST['updateMode'];
                }
                $bildId = $_POST['bildId'];
                $jsonData = $_POST['formValues'][0];
                $postbackData = $this->updateNachtragBild($bildId, $updateMode, $jsonData);
                break;
            case "deleteItem":
                $jsonData = array();
                if (isset($_POST['selectedIds'])) {
                    $jsonData = $_POST['selectedIds'];
                }
                $postbackData = $this->deleteNachtragBilds($jsonData);
                break;
            case "deleteAllItems":
                $postbackData = $this->deleteAllNachtragBilds();
                break;
            case "editDetails":
                $postbackData = "Undefined Content";
                if (isset($_POST['bildId'])) {
                    $bildId = $_POST['bildId'];
                    $resultObject = $this->nachtragBild->getNachtragBildDetails($bildId);
                }
                if (is_string($resultObject)) {
                    $postbackData = Utils::formatJsonErrorMessage($resultObject);
                } else if (is_array($resultObject)) {
                    $postbackData = Utils::convertArrayToJson($resultObject[0]);
                }
                break;
            case "viewDetails":
            case "cancelChanges":
                if (isset($_POST['bildId'])) {
                    $bildId = $_POST['bildId'];
                    $resultObject = $this->nachtragBild->getNachtragBildDetails($bildId);
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
    $nachtragBildController = new NachtragBildController($userAction);
    $nachtragBildController->setUserAction($userAction);
    $postbackContent = $nachtragBildController->getDynamicPageContent();

    // send back content to client
    echo $postbackContent;
}
            
