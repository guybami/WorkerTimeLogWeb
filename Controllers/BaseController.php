<?php



include_once dirname(__DIR__) . DIRECTORY_SEPARATOR .  join(DIRECTORY_SEPARATOR, array('Includes', 'ReportErrors.php'));
include_once dirname(__DIR__) . DIRECTORY_SEPARATOR .  join(DIRECTORY_SEPARATOR, array('Includes', 'Utils.php'));
include_once dirname(__DIR__) . DIRECTORY_SEPARATOR .  join(DIRECTORY_SEPARATOR, array('Includes', 'CommonNoSessionsCheck.php'));
include_once dirname(__DIR__) . DIRECTORY_SEPARATOR .  join(DIRECTORY_SEPARATOR, array('Includes', 'ExceptionLogger.php'));
include_once dirname(__DIR__) . DIRECTORY_SEPARATOR .  join(DIRECTORY_SEPARATOR, array('DataAccessObject', 'DaoCommon.php'));
include_once dirname(__DIR__) . DIRECTORY_SEPARATOR .  join(DIRECTORY_SEPARATOR, array('Models', 'EntityCommon.php'));


/**
 * BaseController class for all controllers, will be used for request handling and routing
 * Created: 12.01.17
 * Last changes: 09.07.17
 *
 * @version 2.1
 * @author Guy Watcho B.
 */
class BaseController
{
    private $userAction = "Undefined";
    private $userRole = array();
    private $baseEntity = null;


    function __construct($userAction = "", $userRole = array()) {
        $this->userAction = $userAction;
        $this->userRole = $userRole;
        $this->baseEntity = new BaseEntity();
    }

    public function getUserAction(){
        return $this->userAction;
    }

    public function getUserRole(){
        return $this->userRole;
    }

    public function setUserAction($userAction){
        $this->userAction = $userAction;
    }

    public function setUserRole($userRole){
        $this->userRole = $userRole;
    }

    public function selectAllEntitiesRecordsCount(){

        $itemSperator = ",";
        $entitiesList = "";
        $resultObject = $this->baseEntity->selectAllEntitiesRecordsCount();
        if(is_string($resultObject)){
            return Utils::formatJsonErrorMessage($resultObject);
        }
        else if(is_array($resultObject)){
            for ($i = 0; $i < count($resultObject); $i++)
            {
                $entitiesList .=
                '{"conferenceId":"'.$resultObject[$i]["conferenceId"].'"'
                .',"date":"'.$resultObject[$i]["date"].'"'
                .',"title":"'.$resultObject[$i]["title"].'"'
                .',"location":"'.$resultObject[$i]["location"].'"'
                .',"summary":"'.$resultObject[$i]["summary"].'"'
                .'}';

                if ($i != count($resultObject) - 1) {
                    $entitiesList .= $itemSperator;
                }
            }
            // close json list
            $entitiesList = "[" . $entitiesList . "]";

        }
        return Utils::encodeSpecialCahrsForJson($entitiesList);
    }
    
    public function selectActualFinancesStatus(){

        $itemSperator = ",";
        $entitiesList = "";
        $resultObject = $this->baseEntity->selectActualFinancesStatus();
        if(is_string($resultObject)){
            return Utils::formatJsonErrorMessage($resultObject);
        }
        else if(is_array($resultObject)){
            for ($i = 0; $i < count($resultObject); $i++)
            {
                $entitiesList .=
                '{"sumIncomes":"'.$resultObject[$i]["sumIncomes"].'"'
                .',"sumExpenses":"'.$resultObject[$i]["sumExpenses"].'"'
                .',"actualAmount":"'.$resultObject[$i]["actualAmount"].'"'
                .'}';

                if ($i != count($resultObject) - 1) {
                    $entitiesList .= $itemSperator;
                }
            }
            // close json list
            $entitiesList = "[" . $entitiesList . "]";

        }
        return Utils::encodeSpecialCahrsForJson($entitiesList);
    }


    /**
     * Get dynamic page content
     * @return mixed
     */
    public function getDynamicPageContent() {

        $postbackData = "Undefined Content";
        switch ($this->getUserAction()) {
            case "getAllEntitiesRecordsCount":
                $postbackData = $this->selectAllEntitiesRecordsCount();
                break;
            case "getActualFinancesStatus":
                $postbackData = $this->selectActualFinancesStatus();
                break;
            case "cancelChanges":
                 
                break;
        }
        return $postbackData;
    }
}
            