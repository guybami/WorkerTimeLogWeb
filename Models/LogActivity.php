
<?php

/**
 * This module was auto generated by the G-Watcho module generator
 * The LogActivity model entity class.
 * @author
 *    Guy Bami
 */
include_once '../Utils/ExceptionLogger.php';

class LogActivity {

    private $activityId;
    private $userId;
    private $summary;
    private $date;

    /** Constructor of an LogActivity object
     *  @param $activityId int The entity  primary key field 
     * @param  $userId int The entity  userId field 
     * @param  $summary string The entity  summary field 
     * @param  $date string The entity  date field 
     */
    function __construct($activityId = "", $userId = "", $summary = "", $date = "") {
        $this->activityId = $activityId;
        $this->userId = $userId;
        $this->summary = $summary;
        $this->date = $date;
    }

    /**
     * Gets  $userId value
     * @param $userId
     * @return mixed
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Gets  $summary value
     * @param $summary
     * @return mixed
     */
    public function getSummary() {
        return $this->summary;
    }

    /**
     * Gets  $date value
     * @param $date
     * @return mixed
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Sets  $userId value
     * @param $userId
     * @return void
     */
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    /**
     * Sets  $summary value
     * @param $summary
     * @return void
     */
    public function setSummary($summary) {
        $this->summary = $summary;
    }

    /**
     * Sets  $date value
     * @param $date
     * @return void
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * Selects all LogActivity items
     * @return
     *   array The object having all LogActivity items
     *    or string with the Exception details if error occured
     */
    public function selectAllLogActivities() {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAllLogActivities();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Gets LogActivity item
     * @param $activityId int  The table primary key
     * @return
     *   array The object with the given $activityId value
     */
    public function getLogActivityDetails($activityId) {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectLogActivityDetails($activityId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Inserts new LogActivity entity
     * @param  $userId int The entity  userId field 
     * @param   $summary string The entity  summary field
     * @param   $date string The entity  date field
     * @return
     *   boolean TRUE if insert successful, otherwise FALSE
     */
    public function insertNewLogActivity($userId, $summary, $date) {
        try {
            $daoInsert = new DaoInsert();
            return $daoInsert->insertNewLogActivity($userId, $summary, $date);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates LogActivity item
     * @param  $activityId int The entity  activityId field 
     * @param  $userId int The entity  userId field 
     * @param  $summary string The entity  summary field 
     * @param  $date string The entity  date field 
     * @return
     *   boolean  TRUE if update successful, otherwise FALSE
     */
    public function updateLogActivity($activityId, $userId, $summary, $date) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateLogActivity($activityId, $userId, $summary, $date);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates LogActivity item  details

     * @param  $activityId int The entity  activityId field 
     * @param  $userId int The entity  userId field 
     * @param  $summary string The entity  summary field 
     * @param  $date string The entity  date field 
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateLogActivityDetails($activityId, $userId, $summary, $date) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateLogActivityDetails($activityId, $userId, $summary, $date);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates userId of the LogActivity entity
     * @param   $activityId int The entity  activityId field 
     * @param   $userId int The entity  userId field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateLogActivityUserId($activityId, $userId) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateLogActivityUserId($activityId, $userId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates summary of the LogActivity entity
     * @param   $activityId int The entity  activityId field 
     * @param   $summary string The entity  summary field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateLogActivitySummary($activityId, $summary) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateLogActivitySummary($activityId, $summary);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates date of the LogActivity entity
     * @param   $activityId int The entity  activityId field 
     * @param   $date string The entity  date field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateLogActivityDate($activityId, $date) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateLogActivityDate($activityId, $date);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates specific field of the LogActivity item
     * @param    $fieldName string The field name
     * @param    $keyFieldValue int The primary key field value
     * @param    $newFieldValue string The new field value
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateLogActivityEntityField($fieldName, $keyFieldValue, $newFieldValue) {
        try {
            switch ($fieldName) {

                case "userId":
                    return $this->updateLogActivityUserId($keyFieldValue, $newFieldValue);

                case "summary":
                    return $this->updateLogActivitySummary($keyFieldValue, $newFieldValue);

                case "date":
                    return $this->updateLogActivityDate($keyFieldValue, $newFieldValue);
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes LogActivity item
     * @param  $activityId int  The table primary key
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteLogActivity($activityId) {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteLogActivity($activityId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Deletes selected LogActivity items
     * @param  $selectedItemsId array The List of primary keys item to be deleted
     * @return boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteSelectedLogActivities($selectedItemsId) {

        try {
            $daoDelete = new DaoDelete();
            if (!isset($selectedItemsId) || !is_array($selectedItemsId)) {
                return "Error: Invalid Parameters type for this method.";
            }
            foreach (array_values($selectedItemsId) as $itemId) {
                if ($daoDelete->deleteLogActivity($itemId)) {
                    continue;
                } else {
                    return "error: Can not delete LogActivity !";
                }
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes all LogActivity items
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteAllLogActivities() {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteAllLogActivities();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

}
