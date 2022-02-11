
<?php

/**
 * This module was auto generated by the G-Watcho module generator
 * The MontageBild model entity class.
 * @author
 *    Guy Bami
 */
include_once '../Utils/ExceptionLogger.php';

class MontageBild {

    private $bildId;
    private $montageId;
    private $bildTyp;
    private $dateiName;

    /** Constructor of an MontageBild object
     *  @param $bildId int The entity  primary key field 
     * @param  $montageId int The entity  montageId field 
     * @param  $bildTyp string The entity  bildTyp field 
     * @param  $dateiName string The entity  dateiName field 
     */
    function __construct($bildId = "", $montageId = "", $bildTyp = "", $dateiName = "") {
        $this->bildId = $bildId;
        $this->montageId = $montageId;
        $this->bildTyp = $bildTyp;
        $this->dateiName = $dateiName;
    }

    /**
     * Gets  $montageId value
     * @param $montageId
     * @return mixed
     */
    public function getMontageId() {
        return $this->montageId;
    }

    /**
     * Gets  $bildTyp value
     * @param $bildTyp
     * @return mixed
     */
    public function getBildTyp() {
        return $this->bildTyp;
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
     * Sets  $montageId value
     * @param $montageId
     * @return void
     */
    public function setMontageId($montageId) {
        $this->montageId = $montageId;
    }

    /**
     * Sets  $bildTyp value
     * @param $bildTyp
     * @return void
     */
    public function setBildTyp($bildTyp) {
        $this->bildTyp = $bildTyp;
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
     * Selects all MontageBild items
     * @return
     *   array The object having all MontageBild items
     *    or string with the Exception details if error occured
     */
    public function selectAllMontageBilds() {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAllMontageBilds();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Gets MontageBild item
     * @param $bildId int  The table primary key
     * @return
     *   array The object with the given $bildId value
     */
    public function getMontageBildDetails($bildId) {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectMontageBildDetails($bildId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Inserts new MontageBild entity
     * @param  $montageId int The entity  montageId field 
     * @param   $bildTyp string The entity  bildTyp field
     * @param   $dateiName string The entity  dateiName field
     * @return
     *   boolean TRUE if insert successful, otherwise FALSE
     */
    public function insertNewMontageBild($montageId, $bildTyp, $dateiName) {
        try {
            $daoInsert = new DaoInsert();
            return $daoInsert->insertNewMontageBild($montageId, $bildTyp, $dateiName);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates MontageBild item
     * @param  $bildId int The entity  bildId field 
     * @param  $montageId int The entity  montageId field 
     * @param  $bildTyp string The entity  bildTyp field 
     * @param  $dateiName string The entity  dateiName field 
     * @return
     *   boolean  TRUE if update successful, otherwise FALSE
     */
    public function updateMontageBild($bildId, $montageId, $bildTyp, $dateiName) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateMontageBild($bildId, $montageId, $bildTyp, $dateiName);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates MontageBild item  details

     * @param  $bildId int The entity  bildId field 
     * @param  $montageId int The entity  montageId field 
     * @param  $bildTyp string The entity  bildTyp field 
     * @param  $dateiName string The entity  dateiName field 
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateMontageBildDetails($bildId, $montageId, $bildTyp, $dateiName) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateMontageBildDetails($bildId, $montageId, $bildTyp, $dateiName);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates montageId of the MontageBild entity
     * @param   $bildId int The entity  bildId field 
     * @param   $montageId int The entity  montageId field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateMontageBildMontageId($bildId, $montageId) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateMontageBildMontageId($bildId, $montageId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates bildTyp of the MontageBild entity
     * @param   $bildId int The entity  bildId field 
     * @param   $bildTyp string The entity  bildTyp field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateMontageBildBildTyp($bildId, $bildTyp) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateMontageBildBildTyp($bildId, $bildTyp);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates dateiName of the MontageBild entity
     * @param   $bildId int The entity  bildId field 
     * @param   $dateiName string The entity  dateiName field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateMontageBildDateiName($bildId, $dateiName) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateMontageBildDateiName($bildId, $dateiName);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates specific field of the MontageBild item
     * @param    $fieldName string The field name
     * @param    $keyFieldValue int The primary key field value
     * @param    $newFieldValue string The new field value
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateMontageBildEntityField($fieldName, $keyFieldValue, $newFieldValue) {
        try {
            switch ($fieldName) {

                case "montageId":
                    return $this->updateMontageBildMontageId($keyFieldValue, $newFieldValue);

                case "bildTyp":
                    return $this->updateMontageBildBildTyp($keyFieldValue, $newFieldValue);

                case "dateiName":
                    return $this->updateMontageBildDateiName($keyFieldValue, $newFieldValue);
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes MontageBild item
     * @param  $bildId int  The table primary key
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteMontageBild($bildId) {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteMontageBild($bildId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Deletes selected MontageBild items
     * @param  $selectedItemsId array The List of primary keys item to be deleted
     * @return boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteSelectedMontageBilds($selectedItemsId) {

        try {
            $daoDelete = new DaoDelete();
            if (!isset($selectedItemsId) || !is_array($selectedItemsId)) {
                return "Error: Invalid Parameters type for this method.";
            }
            foreach (array_values($selectedItemsId) as $itemId) {
                if ($daoDelete->deleteMontageBild($itemId)) {
                    continue;
                } else {
                    return "error: Can not delete MontageBild !";
                }
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes all MontageBild items
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteAllMontageBilds() {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteAllMontageBilds();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

}