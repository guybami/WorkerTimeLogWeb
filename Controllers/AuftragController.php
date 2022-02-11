
<?php


/**
 * This module was auto generated by GWatcho-Code generator
 * The Auftrag controller entity class.
 * @author
 *    Guy Bami Watcho
 */


include_once 'BaseController.php';

class AuftragController extends BaseController {
    private $auftrag = null;


    /**
     *Constructor of the Auftrag controller

     * @param $userAction string the user action
     * @param $userRoles array the user roles
     */

    function __construct($userAction, $userRoles = array()){
        parent::__construct($userAction, $userRoles);
        $this->auftrag = new Auftrag(); }


    /**
     * Gets all Auftrag entities
     * @return mixed object having all Auftrag entities
     *    or string with the Exception details if error occured
     */
    public function getAllAuftrags(){

        $itemSperator = ",";
        $entitiesList = "";
        $resultObject = $this->auftrag->selectAllAuftrags();
        if(is_string($resultObject)){
            return Utils::formatJsonErrorMessage($resultObject);
        }
        else if(is_array($resultObject)){
            for ($i = 0; $i < count($resultObject); $i++)
            {
                $entitiesList .=
                    '{"auftragId":"'.$resultObject[$i]["auftragId"].'"'
                    .',"auftragsNummer":"'.$resultObject[$i]["auftragsNummer"].'"'
                    .',"kundenNummer":"'.$resultObject[$i]["kundenNummer"].'"'
                    .',"bezeichnung":"'.$resultObject[$i]["bezeichnung"].'"'
                    .',"auftragAbgeschlossen":"'.$resultObject[$i]["auftragAbgeschlossen"].'"'
                    .',"datum":"'.$resultObject[$i]["datum"].'"'
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
     * Inserts new Auftrag entity
     * @param mixed $jsonData json object entity to insert
     * @return mixed  true if insertion was successful
     *    or string with the Exception details if error occured
     */
    public function insertNewAuftrag($jsonData){

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
        $resultObject = $this->auftrag->insertNewAuftrag(
            $formJsonValues['auftragsNummer']
            ,$formJsonValues['kundenNummer']
            ,$formJsonValues['bezeichnung']
            ,$formJsonValues['auftragAbgeschlossen']
            ,date("Y-m-d h:i:s")
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
     * Updates Auftrag entity via POST request
     * @param int $customerId
     * @param string $updateMode
     * @param mixed $jsonData
     * @return mixed  true if update was successful
     *    or string with the Exception details if error occured
     */
    public function updateAuftrag($auftragId, $updateMode, $jsonData){

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
            $resultObject = $this->auftrag->updateAuftragDetails(
                $auftragId
                ,$formJsonValues['auftragsNummer']
                ,$formJsonValues['kundenNummer']
                ,$formJsonValues['bezeichnung']
                ,$formJsonValues['auftragAbgeschlossen']
                ,date("Y-m-d h:i:s")
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
            $resultObject = $this->auftrag->updateAuftragEntityField($fieldName, $keyFieldValue, $newFieldValue);
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
    public function deleteAuftrags($jsonData){

        // delete entity using model
        $resultObject = $this->auftrag->deleteSelectedAuftrags($jsonData);
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
    public function deleteAllAuftrags(){

        // delete entities using corresponding model
        $resultObject = $this->auftrag->deleteAllAuftrags();
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

    function getDatailsItemWithRelatedEntities($auftragId) {

        $resultObject = null;
        $auftrag = new Auftrag();
        $postbackData = "-";
        $daoSelect = new DaoSelect();
        $resultJson = "";

        // step1: get Auftrag details
        if (isset($auftragId)) {
            $resultObject = $auftrag->getAuftragDetails($auftragId);
        }

        if (is_array($resultObject)) {
            // formvalues
            $postbackData = Utils::removeNumericalKeys($resultObject[0]);
            // add key
            $resultJson->formValues =  $postbackData;
            // step 2:
            $arrayZeichnung = $daoSelect->selectAllZeichnungByAuftrag($auftragId);
            $arrayZeichnungFileNames = array();
            $item = "";
            foreach (array_values($arrayZeichnung) as $arrayItem) {
                $item->zeichnungId = $arrayItem['zeichnungId'];
                $item->dateiName = $arrayItem['dateiName'];
                array_push($arrayZeichnungFileNames, $item);
            }
            if (is_array($arrayZeichnungFileNames))
                $resultJson->zeichnungFilesList = $arrayZeichnungFileNames;

        }
        else if (is_string($resultObject)) {
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }


        $postbackData = "[" . json_encode($resultJson) . "]";
        //echo $postbackData;
        return $postbackData;
    }


    function getAllZeichnungByAuftrag($auftragId) {

        $resultObject = null;
        $auftrag = new Auftrag();
        $postbackData = "-";
        $daoSelect = new DaoSelect();
        $resultJson = "";

        if (isset($auftragId)) {

            // step 1:
            $arrayZeichnung = $daoSelect->selectAllZeichnungByAuftrag($auftragId);
            $arrayZeichnungFileNames = array();
            foreach (array_values($arrayZeichnung) as $arrayItem) {
                $item = "";
                $item->zeichnungId = $arrayItem['zeichnungId'];
                $item->dateiName = $arrayItem['dateiName'];
                array_push($arrayZeichnungFileNames, $item);
            }
            //if (is_array($arrayZeichnungFileNames))
            //  $resultJson->zeichnungFilesList = $arrayZeichnungFileNames;
            $resultJson = $arrayZeichnungFileNames;
        }
        else if (is_string($resultObject)) {
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }

        $postbackData =  json_encode($resultJson);
        //echo 'result: ' . $postbackData;
        return $postbackData;
    }

    public function getAllAuftragZeichnung(){

        $itemSperator = ",";
        $entitiesList = "";
        $resultObject = $this->auftrag->selectAllAuftrags();
        if(is_string($resultObject)){
            return Utils::formatJsonErrorMessage($resultObject);
        }
        else if(is_array($resultObject)){
            for ($i = 0; $i < count($resultObject); $i++)
            {
                $entitiesList .=
                    '{"auftragId":"'.$resultObject[$i]["auftragId"].'"'
                    .',"zeichnungFilesList":'.$this->getAllZeichnungByAuftrag($resultObject[$i]["auftragId"]).''
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


    public function addAddAssignZeichnungToAuftrag($jsonData, $filesList){

        // get json posted values from request
        // get json posted values from request
        if(is_string($jsonData)){
            //convert json string into array
            $formJsonValues = json_decode($jsonData, true);
        }
        else{
            // case of json array
            $formJsonValues = $jsonData;
        }
        //echo 'aa: ' . $formJsonValues['auftragsNummer'] . ' --<br />';
        $postbackData = "";
        $resultObject = null;
        // insert entity using model object
        $resultObject = $this->auftrag->insertNewAuftrag(
            $formJsonValues['auftragsNummer']
            ,$formJsonValues['kundenNummer']
            ,$formJsonValues['bezeichnung']
            ,$formJsonValues['auftragAbgeschlossen']
            ,date("Y-m-d h:i:s")
        );

        if(is_bool($resultObject) || is_int($resultObject)){

            $auftragId = $resultObject;
            $daoInsert = new DaoInsert();
            foreach (array_values($filesList) as $dateiName) {
                $daoInsert->insertNewZeichnung($auftragId, $dateiName);
            }
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
     * Get dynamic page content
     * @return mixed
     */
    public function getDynamicPageContent() {

        $postbackData = "Undefined Content";
        $resultObject = null;
        switch ($this->getUserAction()) {
            case "getAllItems":
                $postbackData = $this->getAllAuftrags();
                break;
            case "addNewItem":
            case "insertNewItem":
                $jsonData = array();
                if (isset($_POST['formValues'])) {
                    $jsonData = $_POST['formValues'][0];
                }
                $postbackData = $this->insertNewAuftrag($jsonData);
                break;
            case "updateItem":
                $updateMode = "allFields";
                if (isset($_POST['updateMode'])) {
                    $updateMode = $_POST['updateMode'];
                }
                $auftragId = $_POST['auftragId'];
                $jsonData = $_POST['formValues'][0];
                $postbackData = $this->updateAuftrag($auftragId, $updateMode, $jsonData);
                break;
            case "deleteItem":
                $jsonData = array();
                if (isset($_POST['selectedIds'])) {
                    $jsonData = $_POST['selectedIds'];
                }
                $postbackData = $this->deleteAuftrags($jsonData);
                break;
            case "deleteAllItems":
                $postbackData = $this->deleteAllAuftrags();
                break;
            case "editDetails":
                $postbackData = "Undefined Content";
                if ( isset($_POST['auftragId']) ) {
                    $auftragId = $_POST['auftragId'];
                    $resultObject = $this->auftrag->getAuftragDetails($auftragId);
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
                if ( isset($_POST['auftragId']) ) {
                    $auftragId = $_POST['auftragId'];
                    $resultObject = $this->auftrag->getAuftragDetails($auftragId);
                }
                if(is_string($resultObject)){
                    $postbackData = Utils::formatJsonErrorMessage($resultObject);
                }
                else if(is_array($resultObject)){
                    $postbackData = Utils::convertArrayToJson($resultObject[0]);
                }
                break;
            case "getDatailsItemWithRelatedEntities":
                $postbackData = "Undefined Content";
                if (isset($_POST['auftragId'])) {
                    $auftragId = $_POST['auftragId'];
                }
                $postbackData = $this->getDatailsItemWithRelatedEntities($auftragId);
                break;
            case "getAllZeichnungByAuftrag":
                if (isset($_POST['auftragId'])) {
                    $auftragId = $_POST['auftragId'];
                }
                $postbackData = $this->getAllZeichnungByAuftrag($auftragId);
                break;
            case "getAllAuftragZeichnung":
                $postbackData = $this->getAllAuftragZeichnung();
                break;
            case "addAndAssignZeichnungToAuftrag":
                //print_r($_POST['formValues']);
                if (isset($_POST['formValues']) && isset($_POST['fileNamesList'])) {
                    $postbackData = $this->addAddAssignZeichnungToAuftrag($_POST['formValues'][0], $_POST['fileNamesList']);
                }

                break;
        }
        return $postbackData;

    }

}



function testAddNewItem() {
    $t = Utils::generateItemRefenceNumber(5);
    $jsonRaw = '{"userAction":"addNewItem", "formValues":'
        . '[{'
        . '"auftragsNummer":"auftragNummer-1323"'
        . ',"kundenNummer":"kundenNummer-1323"'
        . ',"bezeichnung":"bezeichnung-1323"'
        . ',"auftragAbgeschlossen":"ja"'
        . ',"datum":"2020-03-12 14:33:11"'
        . ' }]
              }';

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

function testGetAllItems() {

    $jsonRaw = '{"userAction":"getAllItems"}';

    if (is_string($jsonRaw)) {
        $_POST = json_decode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

function testUpdateItem() {

    $jsonRaw = '{"userAction":"updateItem", "auftragId":"1", "formValues":'
        . '[{'
        . '"auftragsNummer":"auftragNummer-1323-new"'
        . ',"kundenNummer":"kundenNummer-new"'
        . ',"bezeichnung":"bezeichnung-new"'
        . ',"auftragAbgeschlossen":"ja"'
        . ',"datum":"2020-03-12 14:33:11"'
        . ' }]
        }';

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

function testDeleteItem() {

    $jsonRaw = '{"selectedIds":["3", "1"], "userAction":"deleteItems"}';
    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}



function testGetDatailsItemWithRelatedEntities($auftragId) {

    $jsonRaw = '{"userAction":"getDatailsItemWithRelatedEntities", "auftragId":"'.$auftragId.'"}';
    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}


function testGetAllZeichnungByAuftrag($auftragId){
    $jsonRaw = '{"userAction":"getAllZeichnungByAuftrag", "auftragId":"'.$auftragId.'"}';
    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }

}

function testAssign(){
    $jsonRaw = '{"fileNamesList":["Zeichnung-1.pdf"],"formValues":["{\n\t\"auftragsNummer\": \"auftragsNummer-0a05acf\",\n\t\"kundenNummer\": \"kundenNummer-6844f76\",\n\t\"bezeichnung\": \"bezeichnung-cd8389e\",\n\t\"auftragAbgeschlossen\": \"ja\",\n\t\"fileFullName\": \"\",\n\t\"userAction\": \"uploadSchemas\"\n}"],"userAction":"addAndAssignZeichnungToAuftrag"}';
    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
    //print_r($_POST);
}

$auftragId = "2";
//testAddNewItem();
//testUpdateItem();
//testGetAllItems();
//testDeleteItem();
//testGetDatailsItemWithRelatedEntities($auftragId);
//testGetAllZeichnungByAuftrag($auftragId);
//testAssign();

if ($_SERVER['CONTENT_TYPE'] === "application/json; charset=UTF-8" || $_SERVER['CONTENT_TYPE'] === "application/json") {
    $jsonRaw = file_get_contents("php://input");

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

//echo 'action: ' . $_POST['userAction'];

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
    $auftragController = new AuftragController($userAction);
    $auftragController->setUserAction($userAction);
    $postbackContent = $auftragController->getDynamicPageContent();

    // send back content to client
    echo $postbackContent;
}

