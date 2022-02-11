
<?php

/**
 * This module was auto generated by GWatcho-Code generator
 * The Fertigung controller entity class.
 * @author
 *    Guy Bami Watcho
 */
include_once 'BaseController.php';

class FertigungController extends BaseController {

    private $fertigung = null;

    /**
     * Constructor of the Fertigung controller 

     * @param $userAction string the user action
     * @param $userRoles array the user roles 
     */
    function __construct($userAction, $userRoles = array()) {
        parent::__construct($userAction, $userRoles);
        $this->fertigung = new Fertigung();
    }

    /**
     * Gets all Fertigung entities
     * @return mixed object having all Fertigung entities
     *    or string with the Exception details if error occured
     */
    public function getAllFertigungs() {

        $itemSperator = ",";
        $entitiesList = "";
        $resultObject = $this->fertigung->selectAllFertigungs();
        if (is_string($resultObject)) {
            return Utils::formatJsonErrorMessage($resultObject);
        } else if (is_array($resultObject)) {
            for ($i = 0; $i < count($resultObject); $i++) {
                $entitiesList .=
                        '{"fertigungId":"' . $resultObject[$i]["fertigungId"] . '"'
                        . ',"rapportId":"' . $resultObject[$i]["rapportId"] . '"'
                        . ',"nachbearbeitung":"' . $resultObject[$i]["nachbearbeitung"] . '"'
                        . ',"lackieren":"' . $resultObject[$i]["lackieren"] . '"'
                        . ',"beschichten":"' . $resultObject[$i]["beschichten"] . '"'
                        . ',"strahlen":"' . $resultObject[$i]["strahlen"] . '"'
                        . ',"auftragAbgeschlossen":"' . $resultObject[$i]["auftragAbgeschlossen"] . '"'
                        . ',"datum":"' . $resultObject[$i]["datum"] . '"'
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
     * Inserts new Fertigung entity
     * @param mixed $jsonData json object entity to insert
     * @return mixed  true if insertion was successful
     *    or string with the Exception details if error occured
     */
    public function insertNewFertigung($jsonData) {

        // get json posted values from request
        //$formJsonValues = json_decode($jsonData, true);
        $formJsonValues = $jsonData;
        $postbackData = "";
        $resultObject = null;
        // insert entity using model object
        $resultObject = $this->fertigung->insertNewFertigung(
                $formJsonValues['rapportId']
                , $formJsonValues['nachbearbeitung']
                , $formJsonValues['lackieren']
                , $formJsonValues['beschichten']
                , $formJsonValues['strahlen']
                , $formJsonValues['auftragAbgeschlossen']
                , $formJsonValues['datum']
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
     * Updates Fertigung entity via POST request
     * @param int $customerId
     * @param string $updateMode
     * @param mixed $jsonData
     * @return mixed  true if update was successful
     *    or string with the Exception details if error occured
     */
    public function updateFertigung($fertigungId, $updateMode, $jsonData) {

        // get json posted values from request
        //$formJsonValues = json_decode($jsonData, true);
        $formJsonValues = $jsonData;
        $postbackData = "";
        $resultObject = null;
        if ($updateMode == "allFields") {
            // update all entity fields
            $resultObject = $this->fertigung->updateFertigungDetails(
                    $fertigungId
                    , $formJsonValues['rapportId']
                    , $formJsonValues['nachbearbeitung']
                    , $formJsonValues['lackieren']
                    , $formJsonValues['beschichten']
                    , $formJsonValues['strahlen']
                    , $formJsonValues['auftragAbgeschlossen']
                    , $formJsonValues['datum']
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
            $resultObject = $this->fertigung->updateFertigungEntityField($fieldName, $keyFieldValue, $newFieldValue);
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
    public function deleteFertigungs($jsonData) {

        // delete entity using model
        $resultObject = $this->fertigung->deleteSelectedFertigungs($jsonData);
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
    public function deleteAllFertigungs() {

        // delete entities using corresponding model
        $resultObject = $this->fertigung->deleteAllFertigungs();
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
    
    
     function checkData($formJsonValues) {
        // check data
        echo 'formJsonValues: ';
        print_r($formJsonValues);
        echo '<br /><br />';

        echo 'skizzeFilesList: ';
        print_r($_POST['skizzeFilesList']);
        echo '<br /><br />';

        echo 'bilderFilesList: ';
        print_r($_POST['bilderFilesList']);
        echo '<br /><br />';

        echo 'arbeitszeitList: ';
        print_r($_POST['arbeitszeitList']);
        echo '<br /><br />';
    }

    function addNewItemWithRelatedEntities($jsonData) {

        $formJsonValues = $jsonData;

        // step1: insert Fertigung
        $resultObject = null;
        $fertigungId = "";
        $fertigungBild = new FertigungBild();
        $arbeitszeit = new Arbeitszeit();
        $postbackData = "-";
        $daoSelect = new DaoSelect();


        // insert entity using model object
        $resultObject = $this->fertigung->insertNewFertigung(
                $formJsonValues['rapportId']
                , $formJsonValues['nachbearbeitung']
                , $formJsonValues['lackieren']
                , $formJsonValues['beschichten']
                , $formJsonValues['strahlen']
                , $formJsonValues['auftragAbgeschlossen']
                , $formJsonValues['datum']
        );
            
        if (is_int($resultObject)) {
            $fertigungId = $resultObject;
            $postbackData = Utils::formatJsonMessage("insertedItemKey", $resultObject);
            
            // hier no skizze
            // 
            // step 3: insert Bilder
            $arrayBilder = array();
            //step 3.1: get all image for this Fertigung
            $arrayBilder = $daoSelect->selectAllBilderByFertigung($fertigungId);
            //step 3.2: delete
            $fertigungBild->deleteSelectedFertigungBilds($arrayBilder);
            // step 3.3 insert new array
            $countBilder = 0;
            $newArrayBilderToInsert = $_POST['bilderFilesList'];
            foreach (array_values($newArrayBilderToInsert) as $fileName) {
                // insert entity using model object
                $resultObject = $fertigungBild->insertNewFertigungBild(
                        $fertigungId
                        , $fileName
                );
                if (is_bool($resultObject) || is_int($resultObject)) {
                    $countBilder++;
                }
            }


            // step 4: insert Arbeitszeit
            $arrayZeiten = array();
            //step 4.1: get all entries for this Fertigung
            $arrayZeiten = $daoSelect->selectAllArbeitszeitByFertigung($formJsonValues['rapportId']);
            $arrayArbeitszeitId = array();
            foreach (array_values($arrayZeiten) as $arrayItem) {
                array_push($arrayArbeitszeitId, $arrayItem['arbeitszeitId']);
            }
            //step 4.2: delete
            $arbeitszeit->deleteSelectedArbeitszeits($arrayArbeitszeitId);
            // step 4.3 insert new array

            $newArrayArbeitszeit = $_POST['arbeitszeitList'];
            foreach (array_values($newArrayArbeitszeit) as $arrayItem) {
                // insert entity using model object
                $resultObject = $arbeitszeit->insertNewArbeitszeit(
                        $arrayItem['rapportId']
                        , "Fertigung"
                        , $arrayItem['mitarbeiterName']
                        , $arrayItem['gruppe']
                        , $arrayItem['zeit']
                        , $arrayItem['datum']
                );
            }
        }

        return $postbackData;
    }

    function updateItemWithRelatedEntities($jsonData) {

        $formJsonValues = $jsonData;

        $resultObject = null;
        $fertigungBild = new FertigungBild();
        $arbeitszeit = new Arbeitszeit();
        $postbackData = "-";
        $fertigungId = '0';
        $daoSelect = new DaoSelect();

        if (isset($formJsonValues['rapportId']))
            $rapportId = $formJsonValues['rapportId'];

        // step 1: get FertigungId from rapport
        $resultObject = $daoSelect->selectRapportFertigungDatails($rapportId);
        if (is_array($resultObject)) {

            $fertigungId = $resultObject[0]['fertigungId'];
        }

        // update  entity using model object
        $resultObject = $this->fertigung->updateFertigungDetails(
                    $fertigungId
                    , $formJsonValues['rapportId']
                    , $formJsonValues['nachbearbeitung']
                    , $formJsonValues['lackieren']
                    , $formJsonValues['beschichten']
                    , $formJsonValues['strahlen']
                    , $formJsonValues['auftragAbgeschlossen']
                    , $formJsonValues['datum']
            );

        if (is_bool($resultObject)) {
            if ($resultObject == true) {
                $postbackData = Utils::formatJsonResultMessage(Common::$UPDATE_SUCCESSFUL);
            }

            // step 2: no skizze
            // 
            // step 3: insert Bilder
            $arrayBilder = array();
            //step 3.1: get all image for this Fertigung
            $arrayBilder = $daoSelect->selectAllBilderByFertigung($fertigungId);
            //step 3.2: delete Bilder
            $arrayBilderId = array();
            foreach (array_values($arrayBilder) as $arrayItem) {
                array_push($arrayBilderId, $arrayItem['bildId']);
            }
            $fertigungBild->deleteSelectedFertigungBilds($arrayBilderId);
            // step 3.3 insert new array
            $countBilder = 0;
            $newArrayBilderToInsert = $_POST['bilderFilesList'];
            foreach (array_values($newArrayBilderToInsert) as $fileName) {
                // insert entity using model object
                $resultObject = $fertigungBild->insertNewFertigungBild(
                        $fertigungId
                        , $fileName
                );
                if (is_bool($resultObject) || is_int($resultObject)) {
                    $countBilder++;
                }
            }


            // step 4: insert Arbeitszeit
            $arrayZeiten = array();
            //step 4.1: get all entries for this Fertigung
            $arrayZeiten = $daoSelect->selectAllArbeitszeitByFertigung($formJsonValues['rapportId']);
            $arrayArbeitszeitId = array();
            foreach (array_values($arrayZeiten) as $arrayItem) {
                array_push($arrayArbeitszeitId, $arrayItem['arbeitszeitId']);
            }
            //step 4.2: delete
            $arbeitszeit->deleteSelectedArbeitszeits($arrayArbeitszeitId);
            // step 4.3 insert new array

            $newArrayArbeitszeit = $_POST['arbeitszeitList'];
            foreach (array_values($newArrayArbeitszeit) as $arrayItem) {
                // insert entity using model object
                $resultObject = $arbeitszeit->insertNewArbeitszeit(
                        $arrayItem['rapportId']
                        , "Fertigung"
                        , $arrayItem['mitarbeiterName']
                        , $arrayItem['gruppe']
                        , $arrayItem['zeit']
                        , $arrayItem['datum']
                );
            }
        }

        return $postbackData;
    }

    
    function getDatailsItemWithRelatedEntities($rapportId) {

        $resultObject = null;
        $fertigungBild = new FertigungBild();
        $arbeitszeit = new Arbeitszeit();
        $postbackData = "-";
        $fertigungId = '0';
        $daoSelect = new DaoSelect();
        $resultJson;

        // step 0: get FertigungId from rapport
        $resultObject = $daoSelect->selectRapportFertigungDatails($rapportId);
        if (is_array($resultObject)) {
            $fertigungId = $resultObject[0]['fertigungId'];
        }


        // step1: get Fertigung details
        if (isset($fertigungId)) {
            //$fertigungId = $_POST['fertigungId'];
            $resultObject = $this->fertigung->getFertigungDetails($fertigungId);
        }

        if (is_array($resultObject)) {
            // formvalues

            $postbackData = Utils::removeNumericalKeys($resultObject[0]);

            // add key
            $resultJson->formValues = $postbackData;
            
            
            // step 3: get images
            $arrayBilder = $daoSelect->selectAllBilderByFertigung($fertigungId);
            $arrayBilderFileNames = array();
            foreach (array_values($arrayBilder) as $arrayItem) {
                array_push($arrayBilderFileNames, $arrayItem['dateiName']);
            }
            if (is_array($arrayBilderFileNames))
                $resultJson->bilderFilesList = $arrayBilderFileNames;

            // step 4: arbeitszeiten
            $arrayZeiten = array();

            //step 4.1: get all entries for this Fertigung
            $arrayZeiten = $daoSelect->selectAllArbeitszeitByFertigung($rapportId);
            $arrayZeitenCleaned = array();
            foreach (array_values($arrayZeiten) as $arrayItem) {
                $arrayBuf = Utils::removeNumericalKeys($arrayItem);
                array_push($arrayZeitenCleaned, $arrayBuf);
            }

            $resultJson->arbeitszeitList = $arrayZeitenCleaned;
        } else if (is_string($resultObject)) {
            $postbackData = Utils::formatJsonErrorMessage($resultObject);
        }


        $postbackData = "[" . json_encode($resultJson) . "]";
        //echo $postbackData;
        return $postbackData;
    }

    
    function getRapportFertigungDatails($rapportId) {

        $resultObject = null;
        // echo '$rapportId: ' . $rapportId; 
        $daoSelect = new DaoSelect();
        $resultObject = $daoSelect->selectRapportFertigungDatails($rapportId);
        //print_r($postbackData);
        return $resultObject;
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
                $postbackData = $this->getAllFertigungs();
                break;
            case "addNewItem":
            case "insertNewItem":
                $jsonData = array();
                if (isset($_POST['formValues'])) {
                    $jsonData = $_POST['formValues'][0];
                }
                $postbackData = $this->insertNewFertigung($jsonData);
                break;
            case "updateItem":
                $updateMode = "allFields";
                if (isset($_POST['updateMode'])) {
                    $updateMode = $_POST['updateMode'];
                }
                $fertigungId = $_POST['fertigungId'];
                $jsonData = $_POST['formValues'][0];
                $postbackData = $this->updateFertigung($fertigungId, $updateMode, $jsonData);
                break;
            case "deleteItem":
                $jsonData = array();
                if (isset($_POST['selectedIds'])) {
                    $jsonData = $_POST['selectedIds'];
                }
                $postbackData = $this->deleteFertigungs($jsonData);
                break;
            case "deleteAllItems":
                $postbackData = $this->deleteAllFertigungs();
                break;
            case "editDetails":
                $postbackData = "Undefined Content";
                if (isset($_POST['fertigungId'])) {
                    $fertigungId = $_POST['fertigungId'];
                    $resultObject = $this->fertigung->getFertigungDetails($fertigungId);
                }
                if (is_string($resultObject)) {
                    $postbackData = Utils::formatJsonErrorMessage($resultObject);
                } else if (is_array($resultObject)) {
                    $postbackData = Utils::convertArrayToJson($resultObject[0]);
                }
                break;
            case "viewDetails":
            case "cancelChanges":
                if (isset($_POST['fertigungId'])) {
                    $fertigungId = $_POST['fertigungId'];
                    $resultObject = $this->fertigung->getFertigungDetails($fertigungId);
                }
                if (is_string($resultObject)) {
                    $postbackData = Utils::formatJsonErrorMessage($resultObject);
                } else if (is_array($resultObject)) {
                    $postbackData = Utils::convertArrayToJson($resultObject[0]);
                }
                break;
            case "getRapportFertigungDatails":
                if (isset($_POST['rapportId'])) {
                    $rapportId = $_POST['rapportId'];
                    $resultObject = $this->getRapportFertigungDatails($rapportId);
                }

                if (is_string($resultObject)) {
                    $postbackData = Utils::formatJsonErrorMessage($resultObject);
                } else if (is_array($resultObject)) {
                    $postbackData = Utils::convertArrayToJson($resultObject[0]);
                }

                break;
            case "addNewItemWithRelatedEntities":
                $postbackData = "Undefined Content";
                $jsonData = array();
                if (isset($_POST['formValues'])) {
                    $jsonData = $_POST['formValues'][0];
                }
                $postbackData = $this->addNewItemWithRelatedEntities($jsonData);
                break;
            case "updateItemWithRelatedEntities":
                $postbackData = "Undefined Content";
                $jsonData = array();

                if (isset($_POST['formValues'])) {
                    $jsonData = $_POST['formValues'][0];
                }
                $postbackData = $this->updateItemWithRelatedEntities($jsonData);
                break;
            case "getDatailsItemWithRelatedEntities":
                $postbackData = "Undefined Content";
                $jsonData = array();

                if (isset($_POST['rapportId'])) {
                    $rapportId = $_POST['rapportId'];
                }
                $postbackData = $this->getDatailsItemWithRelatedEntities($rapportId);
                break;
        }
        return $postbackData;
    }

}


            
function testAddNewItem($rapportId) {

    $jsonRaw = '{"userAction":"addNewItem", "formValues":'
            . '[{"rapportId":"' . $rapportId . '"'
            . ',"nachbearbeitung":"ja"'
            . ',"lackieren":"ja"'
            . ',"beschichten":"nein"'
            . ',"strahlen":"ja"'
            . ',"auftragAbgeschlossen":"nein"'
            . ',"datum":"2020-03-23 12:13:00"'
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

    $jsonRaw = '{"userAction":"updateItem", "fertigungId":"1", "formValues":'
            . '[{"rapportId":"1"'
            . ',"nachbearbeitung":"ja"'
            . ',"lackieren":"ja"'
            . ',"beschichten":"nein"'
            . ',"strahlen":"ja"'
            . ',"auftragAbgeschlossen":"nein"'
            . ',"datum":"2020-03-23 15:11:00"'
            . ' }]
              }';

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

function testGetDatailsItem() {

    $jsonRaw = '{"userAction":"viewDetails", "fertigungId":"1"}';

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

            
function testAddNewItemWithRelatedEntities($rapportId) {

    $jsonRaw = '{"userAction":"addNewItemWithRelatedEntities"'
            . ',"formValues":[{"rapportId":"' . $rapportId . '", "nachbearbeitung":"ja", "lackieren":"ja", "beschichten":"ja", "strahlen":"nein", "auftragAbgeschlossen":"nein", "datum":"2020-03-23 12:13:00"}]'
            . ',"bilderFilesList":["bild1.jpg", "bild2.jpg", "bild3.jpg"]'
            . ',"arbeitszeitList":'
            . '[{"rapportId":"' . $rapportId . '" ,"bereich":"Fertigung", "mitarbeiterName":"Bami 1-fertigung", "gruppe":"AB-Gruppe-123", "zeit":"2", "datum":"2020-03-16 12:13:00"},'
            . ' {"rapportId":"' . $rapportId . '" ,"bereich":"Fertigung", "mitarbeiterName":"Sokoi 2fertigung", "gruppe":"AB-Gruppe-433", "zeit":"3", "datum":"2020-03-16 12:23:00"}]'
            . '}';

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

function testUpdateItemWithRelatedEntities($rapportId) {

    $jsonRaw = '{"userAction":"updateItemWithRelatedEntities" '
            . ',"formValues":[{"rapportId":"' . $rapportId . '", "nachbearbeitung":"nein", "lackieren":"nein", "beschichten":"nein", "strahlen":"ja", "auftragAbgeschlossen":"ja", "datum":"2020-03-23 12:13:00"}]'
            . ',"bilderFilesList":["bild1-new.jpg", "bild2.jpg", "bild3-new.jpg", "bild4-new.jpg"]'
            . ',"arbeitszeitList":'
            . '[{"rapportId":"' . $rapportId . '" ,"bereich":"Fertigung", "mitarbeiterName":"Bami 1-fertigung-new", "gruppe":"AB-Gruppe-123", "zeit":"2", "datum":"2020-03-20 12:13:00"},'
            . ' {"rapportId":"' . $rapportId . '" ,"bereich":"Fertigung", "mitarbeiterName":"Sokoi 2-new-fertigung", "gruppe":"AB-Gruppe-433", "zeit":"1", "datum":"2020-03-20 12:23:00"}]'
            . '}';

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

function testGetDatailsItemWithRelatedEntities($rapportId) {

    $jsonRaw = '{"userAction":"getDatailsItemWithRelatedEntities", "rapportId":"' . $rapportId . '"}';

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

function testGetRapportFertigungDatails($rapportId) {

    $jsonRaw = '{"userAction":"getRapportFertigungDatails", "rapportId":"' . $rapportId . '"}';

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
}

$rapportId = "1";
//testAddNewItem($rapportId);
//testUpdateItem();
//testGetAllItems();
//testGetDatailsItem();
//testAddNewItemWithRelatedEntities($rapportId);
//testUpdateItemWithRelatedEntities($rapportId);
//testGetDatailsItemWithRelatedEntities($rapportId);
 //testGetRapportFertigungDatails($rapportId);


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
    $fertigungController = new FertigungController($userAction);
    $fertigungController->setUserAction($userAction);
    $postbackContent = $fertigungController->getDynamicPageContent();

    // send back content to client
    echo $postbackContent;
}
            

