
<?php


/**
 * This module was auto generated by GWatcho-Code generator
 * The Zeichnung controller entity class.
 * @author
 *    Guy Bami Watcho
 */


include_once 'BaseController.php';


class ZeichnungController extends BaseController {
    private $zeichnung = null;


    /**
     *Constructor of the Zeichnung controller

     * @param $userAction string the user action
     * @param $userRoles array the user roles
     */

    function __construct($userAction, $userRoles = array()){
        parent::__construct($userAction, $userRoles);
        $this->zeichnung = new Zeichnung(); }


    /**
     * Gets all Zeichnung entities
     * @return mixed object having all Zeichnung entities
     *    or string with the Exception details if error occured
     */
    public function getAllZeichnungs(){

        $itemSperator = ",";
        $entitiesList = "";
        $resultObject = $this->zeichnung->selectAllZeichnungs();
        if(is_string($resultObject)){
            return Utils::formatJsonErrorMessage($resultObject);
        }
        else if(is_array($resultObject)){
            for ($i = 0; $i < count($resultObject); $i++)
            {
                $entitiesList .=
                    '{"zeichnungId":"'.$resultObject[$i]["zeichnungId"].'"'
                    .',"auftragId":"'.$resultObject[$i]["auftragId"].'"'
                    .',"dateiName":"'.$resultObject[$i]["dateiName"].'"'
                    .'}';

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
     * Inserts new Zeichnung entity
     * @param mixed $jsonData json object entity to insert
     * @return mixed  true if insertion was successful
     *    or string with the Exception details if error occured
     */
    public function insertNewZeichnung($jsonData){

        // get json posted values from request
        if(is_string($jsonData)){
            //convert json string into array
            $formJsonValues = json_decode($jsonData, true);
        }
        else{
            // case of json array
            $formJsonValues = $jsonData;
        }
        $postbackData = "";
        $resultObject = null;
        // insert entity using model object
        $resultObject = $this->zeichnung->insertNewZeichnung(
            $formJsonValues['auftragId']
            ,$formJsonValues['dateiName']


        );

        if(is_bool($resultObject) || is_int($resultObject)){
            $postbackData = Utils::formatJsonMessage("insertedItemKey", $resultObject);
        }
        else if(is_string($resultObject)){
            //error occured
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }
        else {
            //error occured
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }
        return $postbackData;

    }


    /**
     * Updates Zeichnung entity via POST request
     * @param int $customerId
     * @param string $updateMode
     * @param mixed $jsonData
     * @return mixed  true if update was successful
     *    or string with the Exception details if error occured
     */
    public function updateZeichnung($zeichnungId, $updateMode, $jsonData){

        // get json posted values from request
        if(is_string($jsonData)){
            //convert json string into array
            $formJsonValues = json_decode($jsonData, true);
        }
        else{
            // case of json array
            $formJsonValues = $jsonData;
        }
        $postbackData = "";
        $resultObject = null;
        if ($updateMode == "allFields") {
            // update all entity fields
            $resultObject = $this->zeichnung->updateZeichnungDetails(
                $zeichnungId
                ,$formJsonValues['auftragId']
                ,$formJsonValues['dateiName']


            );
            if(is_bool($resultObject)){
                if($resultObject == true){
                    $postbackData = Utils::formatJsonResultMessage(Common::$UPDATE_SUCCESSFUL);
                }
                else{
                    $postbackData = Utils::formatJsonResultMessage(Common::$UPDATE_FAILED);
                }
            }
            else if(is_string($resultObject)){
                //error occured
                $postbackData = Utils::formatJsonErrorMessage($resultObject);
            }

        }
        else if ($updateMode == "inlineUpdate") {
            // Update entity from the datagrid
            $fieldName = $formJsonValues['fieldName'];
            $keyFieldValue = $formJsonValues['entityKeyId'];
            $newFieldValue = $formJsonValues['newFieldValue'];
            $resultObject = $this->zeichnung->updateZeichnungEntityField($fieldName, $keyFieldValue, $newFieldValue);
            if(is_string($resultObject)){
                //error occured
                $postbackData = Utils::formatJsonErrorMessage($resultObject);
            }
            else if(is_bool($resultObject)){
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
    public function deleteZeichnungs($jsonData){

        // delete entity using model
        $resultObject = $this->zeichnung->deleteSelectedZeichnungs($jsonData);
        if(is_bool($resultObject)){
            if($resultObject == true){
                $postbackData = Utils::formatJsonResultMessage(Common::$DELETE_SUCCESSFUL);
            }
            else{
                $postbackData = Utils::formatJsonResultMessage(Common::$DELETE_FAILED);
            }
        }
        else if(is_string($resultObject)){
            //error occured
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }
        else {
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }
        return $postbackData;

    }


    /**
     * Deletes all entities
     * @param mixed $jsonData all entities Id to delete
     * @return mixed
     */
    public function deleteAllZeichnungs(){

        // delete entities using corresponding model
        $resultObject = $this->zeichnung->deleteAllZeichnungs();
        if(is_bool($resultObject)){
            if($resultObject == true){
                $postbackData = Utils::formatJsonResultMessage(Common::$DELETE_SUCCESSFUL);
            }
            else{
                $postbackData = Utils::formatJsonResultMessage(Common::$DELETE_FAILED);
            }
        }
        else if(is_string($resultObject)){
            //error occured
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }
        else {
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
                $postbackData = $this->getAllZeichnungs();
                break;
            case "addNewItem":
            case "insertNewItem":
                $jsonData = array();
                if (isset($_POST['formValues'])) {
                    $jsonData = $_POST['formValues'][0];
                }
                $postbackData = $this->insertNewZeichnung($jsonData);
                break;
            case "updateItem":
                $updateMode = "allFields";
                if (isset($_POST['updateMode'])) {
                    $updateMode = $_POST['updateMode'];
                }
                $zeichnungId = $_POST['zeichnungId'];
                $jsonData = $_POST['formValues'][0];
                $postbackData = $this->updateZeichnung($zeichnungId, $updateMode, $jsonData);
                break;
            case "deleteItem":
                $jsonData = array();
                if (isset($_POST['selectedIds'])) {
                    $jsonData = $_POST['selectedIds'];
                }
                $postbackData = $this->deleteZeichnungs($jsonData);
                break;
            case "deleteAllItems":
                $postbackData = $this->deleteAllZeichnungs();
                break;
            case "editDetails":
                $postbackData = "Undefined Content";
                if ( isset($_POST['zeichnungId']) ) {
                    $zeichnungId = $_POST['zeichnungId'];
                    $resultObject = $this->zeichnung->getZeichnungDetails($zeichnungId);
                }
                if(is_string($resultObject)){
                    $postbackData = Utils::formatJsonErrorMessage($resultObject);
                }
                else if(is_array($resultObject)){
                    $postbackData = Utils::convertArrayToJson($resultObject[0]);
                }
                break;
            case "viewDetails":
            case "cancelChanges":
                if ( isset($_POST['zeichnungId']) ) {
                    $zeichnungId = $_POST['zeichnungId'];
                    $resultObject = $this->zeichnung->getZeichnungDetails($zeichnungId);
                }
                if(is_string($resultObject)){
                    $postbackData = Utils::formatJsonErrorMessage($resultObject);
                }
                else if(is_array($resultObject)){
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
}
else if (isset($_GET) && isset($_GET['userAction'])) {
    $userAction = $_GET['userAction'];
}
if (!isset($userAction)) {
    echo "No action has been set";
}
else{
    Utils::logRequestToFile($userAction);
    $zeichnungController = new ZeichnungController($userAction);
    $zeichnungController->setUserAction($userAction);
    $postbackContent = $zeichnungController->getDynamicPageContent();

    // send back content to client
    echo $postbackContent;
}

