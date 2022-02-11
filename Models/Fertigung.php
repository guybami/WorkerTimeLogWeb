
<?php

/**
 * This module was auto generated by the G-Watcho module generator
 * The Fertigung model entity class.
 * @author
 *    Guy Bami
 */
include_once '../Utils/ExceptionLogger.php';

class Fertigung {

    private $fertigungId;
    private $rapportId;
    private $nachbearbeitung;
    private $lackieren;
    private $beschichten;
    private $strahlen;
    private $auftragAbgeschlossen;
    private $datum;

    /** Constructor of an Fertigung object
     *  @param $fertigungId int The entity  primary key field 
     * @param  $rapportId int The entity  rapportId field 
     * @param  $nachbearbeitung string The entity  nachbearbeitung field 
     * @param  $lackieren string The entity  lackieren field 
     * @param  $beschichten string The entity  beschichten field 
     * @param  $strahlen string The entity  strahlen field 
     * @param  $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     * @param  $datum string The entity  datum field 
     */
    function __construct($fertigungId = "", $rapportId = "", $nachbearbeitung = "", $lackieren = "", $beschichten = "", $strahlen = "", $auftragAbgeschlossen = "", $datum = "") {
        $this->fertigungId = $fertigungId;
        $this->rapportId = $rapportId;
        $this->nachbearbeitung = $nachbearbeitung;
        $this->lackieren = $lackieren;
        $this->beschichten = $beschichten;
        $this->strahlen = $strahlen;
        $this->auftragAbgeschlossen = $auftragAbgeschlossen;
        $this->datum = $datum;
    }

    /**
     * Gets  $rapportId value
     * @param $rapportId
     * @return mixed
     */
    public function getRapportId() {
        return $this->rapportId;
    }

    /**
     * Gets  $nachbearbeitung value
     * @param $nachbearbeitung
     * @return mixed
     */
    public function getNachbearbeitung() {
        return $this->nachbearbeitung;
    }

    /**
     * Gets  $lackieren value
     * @param $lackieren
     * @return mixed
     */
    public function getLackieren() {
        return $this->lackieren;
    }

    /**
     * Gets  $beschichten value
     * @param $beschichten
     * @return mixed
     */
    public function getBeschichten() {
        return $this->beschichten;
    }

    /**
     * Gets  $strahlen value
     * @param $strahlen
     * @return mixed
     */
    public function getStrahlen() {
        return $this->strahlen;
    }

    /**
     * Gets  $auftragAbgeschlossen value
     * @param $auftragAbgeschlossen
     * @return mixed
     */
    public function getAuftragAbgeschlossen() {
        return $this->auftragAbgeschlossen;
    }

    /**
     * Gets  $datum value
     * @param $datum
     * @return mixed
     */
    public function getDatum() {
        return $this->datum;
    }

    /**
     * Sets  $rapportId value
     * @param $rapportId
     * @return void
     */
    public function setRapportId($rapportId) {
        $this->rapportId = $rapportId;
    }

    /**
     * Sets  $nachbearbeitung value
     * @param $nachbearbeitung
     * @return void
     */
    public function setNachbearbeitung($nachbearbeitung) {
        $this->nachbearbeitung = $nachbearbeitung;
    }

    /**
     * Sets  $lackieren value
     * @param $lackieren
     * @return void
     */
    public function setLackieren($lackieren) {
        $this->lackieren = $lackieren;
    }

    /**
     * Sets  $beschichten value
     * @param $beschichten
     * @return void
     */
    public function setBeschichten($beschichten) {
        $this->beschichten = $beschichten;
    }

    /**
     * Sets  $strahlen value
     * @param $strahlen
     * @return void
     */
    public function setStrahlen($strahlen) {
        $this->strahlen = $strahlen;
    }

    /**
     * Sets  $auftragAbgeschlossen value
     * @param $auftragAbgeschlossen
     * @return void
     */
    public function setAuftragAbgeschlossen($auftragAbgeschlossen) {
        $this->auftragAbgeschlossen = $auftragAbgeschlossen;
    }

    /**
     * Sets  $datum value
     * @param $datum
     * @return void
     */
    public function setDatum($datum) {
        $this->datum = $datum;
    }

    /**
     * Selects all Fertigung items
     * @return
     *   array The object having all Fertigung items
     *    or string with the Exception details if error occured
     */
    public function selectAllFertigungs() {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAllFertigungs();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Gets Fertigung item
     * @param $fertigungId int  The table primary key
     * @return
     *   array The object with the given $fertigungId value
     */
    public function getFertigungDetails($fertigungId) {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectFertigungDetails($fertigungId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Inserts new Fertigung entity
     * @param  $rapportId int The entity  rapportId field 
     * @param   $nachbearbeitung string The entity  nachbearbeitung field
     * @param   $lackieren string The entity  lackieren field
     * @param   $beschichten string The entity  beschichten field
     * @param   $strahlen string The entity  strahlen field
     * @param   $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     * @param   $datum string The entity  datum field
     * @return
     *   boolean TRUE if insert successful, otherwise FALSE
     */
    public function insertNewFertigung($rapportId, $nachbearbeitung, $lackieren, $beschichten, $strahlen, $auftragAbgeschlossen, $datum) {
        try {
            $daoInsert = new DaoInsert();
            return $daoInsert->insertNewFertigung($rapportId, $nachbearbeitung, $lackieren, $beschichten, $strahlen, $auftragAbgeschlossen, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates Fertigung item
     * @param  $fertigungId int The entity  fertigungId field 
     * @param  $rapportId int The entity  rapportId field 
     * @param  $nachbearbeitung string The entity  nachbearbeitung field 
     * @param  $lackieren string The entity  lackieren field 
     * @param  $beschichten string The entity  beschichten field 
     * @param  $strahlen string The entity  strahlen field 
     * @param  $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     * @param  $datum string The entity  datum field 
     * @return
     *   boolean  TRUE if update successful, otherwise FALSE
     */
    public function updateFertigung($fertigungId, $rapportId, $nachbearbeitung, $lackieren, $beschichten, $strahlen, $auftragAbgeschlossen, $datum) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateFertigung($fertigungId, $rapportId, $nachbearbeitung, $lackieren, $beschichten, $strahlen, $auftragAbgeschlossen, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates Fertigung item  details

     * @param  $fertigungId int The entity  fertigungId field 
     * @param  $rapportId int The entity  rapportId field 
     * @param  $nachbearbeitung string The entity  nachbearbeitung field 
     * @param  $lackieren string The entity  lackieren field 
     * @param  $beschichten string The entity  beschichten field 
     * @param  $strahlen string The entity  strahlen field 
     * @param  $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     * @param  $datum string The entity  datum field 
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateFertigungDetails($fertigungId, $rapportId, $nachbearbeitung, $lackieren, $beschichten, $strahlen, $auftragAbgeschlossen, $datum) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateFertigungDetails($fertigungId, $rapportId, $nachbearbeitung, $lackieren, $beschichten, $strahlen, $auftragAbgeschlossen, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates rapportId of the Fertigung entity
     * @param   $fertigungId int The entity  fertigungId field 
     * @param   $rapportId int The entity  rapportId field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateFertigungRapportId($fertigungId, $rapportId) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateFertigungRapportId($fertigungId, $rapportId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates nachbearbeitung of the Fertigung entity
     * @param   $fertigungId int The entity  fertigungId field 
     * @param   $nachbearbeitung string The entity  nachbearbeitung field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateFertigungNachbearbeitung($fertigungId, $nachbearbeitung) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateFertigungNachbearbeitung($fertigungId, $nachbearbeitung);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates lackieren of the Fertigung entity
     * @param   $fertigungId int The entity  fertigungId field 
     * @param   $lackieren string The entity  lackieren field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateFertigungLackieren($fertigungId, $lackieren) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateFertigungLackieren($fertigungId, $lackieren);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates beschichten of the Fertigung entity
     * @param   $fertigungId int The entity  fertigungId field 
     * @param   $beschichten string The entity  beschichten field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateFertigungBeschichten($fertigungId, $beschichten) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateFertigungBeschichten($fertigungId, $beschichten);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates strahlen of the Fertigung entity
     * @param   $fertigungId int The entity  fertigungId field 
     * @param   $strahlen string The entity  strahlen field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateFertigungStrahlen($fertigungId, $strahlen) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateFertigungStrahlen($fertigungId, $strahlen);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates auftragAbgeschlossen of the Fertigung entity
     * @param   $fertigungId int The entity  fertigungId field 
     * @param   $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateFertigungAuftragAbgeschlossen($fertigungId, $auftragAbgeschlossen) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateFertigungAuftragAbgeschlossen($fertigungId, $auftragAbgeschlossen);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates datum of the Fertigung entity
     * @param   $fertigungId int The entity  fertigungId field 
     * @param   $datum string The entity  datum field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateFertigungDatum($fertigungId, $datum) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateFertigungDatum($fertigungId, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates specific field of the Fertigung item
     * @param    $fieldName string The field name
     * @param    $keyFieldValue int The primary key field value
     * @param    $newFieldValue string The new field value
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateFertigungEntityField($fieldName, $keyFieldValue, $newFieldValue) {
        try {
            switch ($fieldName) {

                case "rapportId":
                    return $this->updateFertigungRapportId($keyFieldValue, $newFieldValue);

                case "nachbearbeitung":
                    return $this->updateFertigungNachbearbeitung($keyFieldValue, $newFieldValue);

                case "lackieren":
                    return $this->updateFertigungLackieren($keyFieldValue, $newFieldValue);

                case "beschichten":
                    return $this->updateFertigungBeschichten($keyFieldValue, $newFieldValue);

                case "strahlen":
                    return $this->updateFertigungStrahlen($keyFieldValue, $newFieldValue);

                case "auftragAbgeschlossen":
                    return $this->updateFertigungAuftragAbgeschlossen($keyFieldValue, $newFieldValue);

                case "datum":
                    return $this->updateFertigungDatum($keyFieldValue, $newFieldValue);
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes Fertigung item
     * @param  $fertigungId int  The table primary key
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteFertigung($fertigungId) {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteFertigung($fertigungId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Deletes selected Fertigung items
     * @param  $selectedItemsId array The List of primary keys item to be deleted
     * @return boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteSelectedFertigungs($selectedItemsId) {

        try {
            $daoDelete = new DaoDelete();
            if (!isset($selectedItemsId) || !is_array($selectedItemsId)) {
                return "Error: Invalid Parameters type for this method.";
            }
            foreach (array_values($selectedItemsId) as $itemId) {
                if ($daoDelete->deleteFertigung($itemId)) {
                    continue;
                } else {
                    return "error: Can not delete Fertigung !";
                }
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes all Fertigung items
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteAllFertigungs() {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteAllFertigungs();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

}
