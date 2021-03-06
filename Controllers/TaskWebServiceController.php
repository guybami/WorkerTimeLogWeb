
<?php

/**
 * This module was auto generated by GWatcho-Code generator
 * The Task controller entity class.
 * @author
 *    Guy Bami Watcho
 */
include_once 'BaseController.php';

class TaskController extends BaseController {

    private $task = null;

    /**
     * Constructor of the Task controller 

     * @param $userAction string the user action
     * @param $userRoles array the user roles 
     */
    function __construct($userAction, $userRoles = array()) {
        parent::__construct($userAction, $userRoles);
        $this->task = new Task();
    }

    /**
     * Gets all Task entities
     * @return mixed object having all Task entities
     *    or string with the Exception details if error occured
     */
    public function getAllTasks() {

        $itemSperator = ",";
        $entitiesList = "";
        $resultObject = $this->task->selectAllTasks();
        if (is_string($resultObject)) {
            return Utils::formatJsonErrorMessage($resultObject);
        } else if (is_array($resultObject)) {
            for ($i = 0; $i < count($resultObject); $i++) {
                $entitiesList .=
                        '{"taskId":"' . $resultObject[$i]["taskId"] . '"'
                        . ',"projectId":"' . $resultObject[$i]["projectId"] . '"'
                        . ',"title":"' . $resultObject[$i]["title"] . '"'
                        . ',"date":"' . Utils::formatShortDate($resultObject[$i]["date"]) . '"'
                        . ',"descriptionFileName":"' . $resultObject[$i]["descriptionFileName"] . '"'
                        . ',"summary":"' . $resultObject[$i]["summary"] . '"'
                        // foreign field
                        . ',"projectId":"' . $resultObject[$i]["projectId"] . '"'
                        . ',"projectName":"' . $resultObject[$i]["projectName"] . '"'
                        
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
     * Inserts new Task entity
     * @param mixed $jsonData json object entity to insert
     * @return mixed  true if insertion was successful
     *    or string with the Exception details if error occured
     */
    public function insertNewTask($jsonData) {

        // get json posted values from request
        $formJsonValues = json_decode($jsonData, true);
        $postbackData = "";
        $resultObject = null;
        // insert entity using model object
        $resultObject = $this->task->insertNewTask(
                $formJsonValues['projectId']
                , $formJsonValues['title']
                , $formJsonValues['date']
                , $formJsonValues['descriptionFileName']
                , $formJsonValues['summary']
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
     * Updates Task entity via POST request
     * @param int $customerId
     * @param string $updateMode
     * @param mixed $jsonData
     * @return mixed  true if update was successful
     *    or string with the Exception details if error occured
     */
    public function updateTask($taskId, $updateMode, $jsonData) {

        // get json posted values from request
        $formJsonValues = json_decode($jsonData, true);
        $postbackData = "";
        $resultObject = null;
        if ($updateMode == "allFields") {
            // update all entity fields
            $resultObject = $this->task->updateTaskDetails(
                    $taskId
                    , $formJsonValues['projectId']
                    , $formJsonValues['title']
                    , $formJsonValues['date']
                    , $formJsonValues['descriptionFileName']
                    , $formJsonValues['summary']
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
            $resultObject = $this->task->updateTaskEntityField($fieldName, $keyFieldValue, $newFieldValue);
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
    public function deleteTasks($jsonData) {

        // delete entity using model
        $resultObject = $this->task->deleteSelectedTasks($jsonData);
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
    public function deleteAllTasks() {

        // delete entities using corresponding model
        $resultObject = $this->task->deleteAllTasks();
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
                $postbackData = $this->getAllTasks();
                break;
            case "addNewItem":
            case "insertNewItem":
                $jsonData = array();
                if (isset($_POST['formValues'])) {
                    $jsonData = $_POST['formValues'][0];
                }
                $postbackData = $this->insertNewTask($jsonData);
                break;
            case "updateItem":
                $updateMode = "allFields";
                if (isset($_POST['updateMode'])) {
                    $updateMode = $_POST['updateMode'];
                }
                $taskId = $_POST['taskId'];
                $jsonData = $_POST['formValues'][0];
                $postbackData = $this->updateTask($taskId, $updateMode, $jsonData);
                break;
            case "deleteItem":
                $jsonData = array();
                if (isset($_POST['selectedIds'])) {
                    $jsonData = $_POST['selectedIds'];
                }
                $postbackData = $this->deleteTasks($jsonData);
                break;
            case "deleteAllItems":
                $postbackData = $this->deleteAllTasks();
                break;
            case "editDetails":
                $postbackData = "Undefined Content";
                if (isset($_POST['taskId'])) {
                    $taskId = $_POST['taskId'];
                    $resultObject = $this->task->getTaskDetails($taskId);
                }
                if (is_string($resultObject)) {
                    $postbackData = Utils::formatJsonErrorMessage($resultObject);
                } else if (is_array($resultObject)) {
                    $postbackData = Utils::convertArrayToJson($resultObject[0]);
                }
                break;
            case "viewDetails":
            case "cancelChanges":
                if (isset($_POST['taskId'])) {
                    $taskId = $_POST['taskId'];
                    $resultObject = $this->task->getTaskDetails($taskId);
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


function testAddNewItem() {
    
    // $customerId, $title, $creationDate, $status, $hasOrder
    $title = "FG Bank France-" . uniqid();
    $jsonRaw = '{"userAction":"addNewItem", "formValues":'
            . '[{"customerId":"2"'
            . ',"title":"'.$title.'"'
            . ',"creationDate":"' . date('Y-m-d H:i:s') . '"'
            . ',"status":"STARTED"'
            . ',"hasOrder":"0"'
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


function testDeleteItem() {
    
    $jsonRaw = '{"userAction":"deleteItem", "selectedIds":'
            . '[{"projectId":"1"'
             . ',"projectId":"3"'
            . ' }]
              }';
            

    if (is_string($jsonRaw)) {
        $_POST = Utils::jsonDecode($jsonRaw, true);
    } else {
        $_POST = $jsonRaw;
    }
            
}

//testAddNewItem();
testGetAllItems();           

//testDeleteItem();



if ($_SERVER['CONTENT_TYPE'] === "application/json; charset=UTF-8" || $_SERVER['CONTENT_TYPE'] === "application/json") {
    $jsonRaw = file_get_contents('php://input');

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
if (!isset($userAction)) {
    echo "No action has been set";
} else {
    Utils::logRequestToFile($userAction);
    $taskController = new TaskController($userAction);
    $taskController->setUserAction($userAction);
    $postbackContent = $taskController->getDynamicPageContent();

    // send back content to client
    echo $postbackContent;
}
            

