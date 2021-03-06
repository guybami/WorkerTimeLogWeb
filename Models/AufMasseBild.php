
<?php

/**
 * This module was auto generated by the G-Watcho module generator
 * The AufMasseBild model entity class.
 * @author
 *    Guy Bami
 */
include_once '../Utils/ExceptionLogger.php';

class AufMasseBild {

    private $bildId;
    private $aufmasseId;
    private $dateiName;

    /** Constructor of an AufMasseBild object
     *  @param $bildId int The entity  primary key field 
     * @param  $aufmasseId int The entity  aufmasseId field 
     * @param  $dateiName string The entity  dateiName field 
     */
    function __construct($bildId = "", $aufmasseId = "", $dateiName = "") {
        $this->bildId = $bildId;
        $this->aufmasseId = $aufmasseId;
        $this->dateiName = $dateiName;
    }

    /**
     * Gets  $aufmasseId value
     * @param $aufmasseId
     * @return mixed
     */
    public function getAufmasseId() {
        return $this->aufmasseId;
    }

    /**
     * Gets  $dateiName value
     * @param $dateiName
     * @return mixed
     */
    public function getDateiName() {
        return $this->dateiName;
    }

    /**
     * Sets  $aufmasseId value
     * @param $aufmasseId
     * @return void
     */
    public function setAufmasseId($aufmasseId) {
        $this->aufmasseId = $aufmasseId;
    }

    /**
     * Sets  $dateiName value
     * @param $dateiName
     * @return void
     */
    public function setDateiName($dateiName) {
        $this->dateiName = $dateiName;
    }

    /**
     * Selects all AufMasseBild items
     * @return
     *   array The object having all AufMasseBild items
     *    or string with the Exception details if error occured
     */
    public function selectAllAufMasseBilds() {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAllAufMasseBilds();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Gets AufMasseBild item
     * @param $bildId int  The table primary key
     * @return
     *   array The object with the given $bildId value
     */
    public function getAufMasseBildDetails($bildId) {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAufMasseBildDetails($bildId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Inserts new AufMasseBild entity
     * @param  $aufmasseId int The entity  aufmasseId field 
     * @param   $dateiName string The entity  dateiName field
     * @return
     *   boolean TRUE if insert successful, otherwise FALSE
     */
    public function insertNewAufMasseBild($aufmasseId, $dateiName) {
        try {
            $daoInsert = new DaoInsert();
            return $daoInsert->insertNewAufMasseBild($aufmasseId, $dateiName);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates AufMasseBild item
     * @param  $bildId int The entity  bildId field 
     * @param  $aufmasseId int The entity  aufmasseId field 
     * @param  $dateiName string The entity  dateiName field 
     * @return
     *   boolean  TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseBild($bildId, $aufmasseId, $dateiName) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseBild($bildId, $aufmasseId, $dateiName);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates AufMasseBild item  details

     * @param  $bildId int The entity  bildId field 
     * @param  $aufmasseId int The entity  aufmasseId field 
     * @param  $dateiName string The entity  dateiName field 
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseBildDetails($bildId, $aufmasseId, $dateiName) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseBildDetails($bildId, $aufmasseId, $dateiName);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates aufmasseId of the AufMasseBild entity
     * @param   $bildId int The entity  bildId field 
     * @param   $aufmasseId int The entity  aufmasseId field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseBildAufmasseId($bildId, $aufmasseId) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseBildAufmasseId($bildId, $aufmasseId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates dateiName of the AufMasseBild entity
     * @param   $bildId int The entity  bildId field 
     * @param   $dateiName string The entity  dateiName field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseBildDateiName($bildId, $dateiName) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseBildDateiName($bildId, $dateiName);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates specific field of the AufMasseBild item
     * @param    $fieldName string The field name
     * @param    $keyFieldValue int The primary key field value
     * @param    $newFieldValue string The new field value
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseBildEntityField($fieldName, $keyFieldValue, $newFieldValue) {
        try {
            switch ($fieldName) {

                case "aufmasseId":
                    return $this->updateAufMasseBildAufmasseId($keyFieldValue, $newFieldValue);

                case "dateiName":
                    return $this->updateAufMasseBildDateiName($keyFieldValue, $newFieldValue);
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes AufMasseBild item
     * @param  $bildId int  The table primary key
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteAufMasseBild($bildId) {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteAufMasseBild($bildId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Deletes selected AufMasseBild items
     * @param  $selectedItemsId array The List of primary keys item to be deleted
     * @return boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteSelectedAufMasseBilds($selectedItemsId) {

        try {
            $daoDelete = new DaoDelete();
            if (!isset($selectedItemsId) || !is_array($selectedItemsId)) {
                return "Error: Invalid Parameters type for this method.";
            }
            foreach (array_values($selectedItemsId) as $itemId) {
                if ($daoDelete->deleteAufMasseBild($itemId)) {
                    continue;
                } else {
                    return "error: Can not delete AufMasseBild !";
                }
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes all AufMasseBild items
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteAllAufMasseBilds() {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteAllAufMasseBilds();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

}
