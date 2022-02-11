
<?php

/**
 * This module was auto generated by the G-Watcho module generator
 * The AufMasse model entity class.
 * @author
 *    Guy Bami
 */
include_once '../Utils/ExceptionLogger.php';

class AufMasse {

    private $aufmasseId;
    private $rapportId;
    private $masse;
    private $aufsprache;
    private $freierText;
    private $bemerkung;
    private $datum;

    /** Constructor of an AufMasse object
     *  @param $aufmasseId int The entity  primary key field 
     * @param  $rapportId int The entity  rapportId field 
     * @param  $masse string The entity  masse field 
     * @param  $aufsprache string The entity  aufsprache field 
     * @param  $freierText string The entity  freierText field 
     * @param  $bemerkung string The entity  bemerkung field 
     * @param  $datum string The entity  datum field 
     */
    function __construct($aufmasseId = "", $rapportId = "", $masse = "", $aufsprache = "", $freierText = "", $bemerkung = "", $datum = "") {
        $this->aufmasseId = $aufmasseId;
        $this->rapportId = $rapportId;
        $this->masse = $masse;
        $this->aufsprache = $aufsprache;
        $this->freierText = $freierText;
        $this->bemerkung = $bemerkung;
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
     * Gets  $masse value
     * @param $masse
     * @return mixed
     */
    public function getMasse() {
        return $this->masse;
    }

    /**
     * Gets  $aufsprache value
     * @param $aufsprache
     * @return mixed
     */
    public function getAufsprache() {
        return $this->aufsprache;
    }

    /**
     * Gets  $freierText value
     * @param $freierText
     * @return mixed
     */
    public function getFreierText() {
        return $this->freierText;
    }

    /**
     * Gets  $bemerkung value
     * @param $bemerkung
     * @return mixed
     */
    public function getBemerkung() {
        return $this->bemerkung;
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
     * Sets  $masse value
     * @param $masse
     * @return void
     */
    public function setMasse($masse) {
        $this->masse = $masse;
    }

    /**
     * Sets  $aufsprache value
     * @param $aufsprache
     * @return void
     */
    public function setAufsprache($aufsprache) {
        $this->aufsprache = $aufsprache;
    }

    /**
     * Sets  $freierText value
     * @param $freierText
     * @return void
     */
    public function setFreierText($freierText) {
        $this->freierText = $freierText;
    }

    /**
     * Sets  $bemerkung value
     * @param $bemerkung
     * @return void
     */
    public function setBemerkung($bemerkung) {
        $this->bemerkung = $bemerkung;
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
     * Selects all AufMasse items
     * @return
     *   array The object having all AufMasse items
     *    or string with the Exception details if error occured
     */
    public function selectAllAufMasses() {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAllAufMasses();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Gets AufMasse item
     * @param $aufmasseId int  The table primary key
     * @return
     *   array The object with the given $aufmasseId value
     */
    public function getAufMasseDetails($aufmasseId) {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAufMasseDetails($aufmasseId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Inserts new AufMasse entity
     * @param  $rapportId int The entity  rapportId field 
     * @param   $masse string The entity  masse field
     * @param   $aufsprache string The entity  aufsprache field
     * @param   $freierText string The entity  freierText field
     * @param   $bemerkung string The entity  bemerkung field
     * @param   $datum string The entity  datum field
     * @return
     *   boolean TRUE if insert successful, otherwise FALSE
     */
    public function insertNewAufMasse($rapportId, $masse, $aufsprache, $freierText, $bemerkung, $datum) {
        try {
            $daoInsert = new DaoInsert();
            return $daoInsert->insertNewAufMasse($rapportId, $masse, $aufsprache, $freierText, $bemerkung, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates AufMasse item
     * @param  $aufmasseId int The entity  aufmasseId field 
     * @param  $rapportId int The entity  rapportId field 
     * @param  $masse string The entity  masse field 
     * @param  $aufsprache string The entity  aufsprache field 
     * @param  $freierText string The entity  freierText field 
     * @param  $bemerkung string The entity  bemerkung field 
     * @param  $datum string The entity  datum field 
     * @return
     *   boolean  TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasse($aufmasseId, $rapportId, $masse, $aufsprache, $freierText, $bemerkung, $datum) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasse($aufmasseId, $rapportId, $masse, $aufsprache, $freierText, $bemerkung, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates AufMasse item  details

     * @param  $aufmasseId int The entity  aufmasseId field 
     * @param  $rapportId int The entity  rapportId field 
     * @param  $masse string The entity  masse field 
     * @param  $aufsprache string The entity  aufsprache field 
     * @param  $freierText string The entity  freierText field 
     * @param  $bemerkung string The entity  bemerkung field 
     * @param  $datum string The entity  datum field 
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseDetails($aufmasseId, $rapportId, $masse, $aufsprache, $freierText, $bemerkung, $datum) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseDetails($aufmasseId, $rapportId, $masse, $aufsprache, $freierText, $bemerkung, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates rapportId of the AufMasse entity
     * @param   $aufmasseId int The entity  aufmasseId field 
     * @param   $rapportId int The entity  rapportId field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseRapportId($aufmasseId, $rapportId) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseRapportId($aufmasseId, $rapportId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates masse of the AufMasse entity
     * @param   $aufmasseId int The entity  aufmasseId field 
     * @param   $masse string The entity  masse field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseMasse($aufmasseId, $masse) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseMasse($aufmasseId, $masse);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates aufsprache of the AufMasse entity
     * @param   $aufmasseId int The entity  aufmasseId field 
     * @param   $aufsprache string The entity  aufsprache field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseAufsprache($aufmasseId, $aufsprache) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseAufsprache($aufmasseId, $aufsprache);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates freierText of the AufMasse entity
     * @param   $aufmasseId int The entity  aufmasseId field 
     * @param   $freierText string The entity  freierText field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseFreierText($aufmasseId, $freierText) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseFreierText($aufmasseId, $freierText);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates bemerkung of the AufMasse entity
     * @param   $aufmasseId int The entity  aufmasseId field 
     * @param   $bemerkung string The entity  bemerkung field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseBemerkung($aufmasseId, $bemerkung) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseBemerkung($aufmasseId, $bemerkung);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates datum of the AufMasse entity
     * @param   $aufmasseId int The entity  aufmasseId field 
     * @param   $datum string The entity  datum field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseDatum($aufmasseId, $datum) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAufMasseDatum($aufmasseId, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates specific field of the AufMasse item
     * @param    $fieldName string The field name
     * @param    $keyFieldValue int The primary key field value
     * @param    $newFieldValue string The new field value
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAufMasseEntityField($fieldName, $keyFieldValue, $newFieldValue) {
        try {
            switch ($fieldName) {

                case "rapportId":
                    return $this->updateAufMasseRapportId($keyFieldValue, $newFieldValue);

                case "masse":
                    return $this->updateAufMasseMasse($keyFieldValue, $newFieldValue);

                case "aufsprache":
                    return $this->updateAufMasseAufsprache($keyFieldValue, $newFieldValue);

                case "freierText":
                    return $this->updateAufMasseFreierText($keyFieldValue, $newFieldValue);

                case "bemerkung":
                    return $this->updateAufMasseBemerkung($keyFieldValue, $newFieldValue);

                case "datum":
                    return $this->updateAufMasseDatum($keyFieldValue, $newFieldValue);
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes AufMasse item
     * @param  $aufmasseId int  The table primary key
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteAufMasse($aufmasseId) {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteAufMasse($aufmasseId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Deletes selected AufMasse items
     * @param  $selectedItemsId array The List of primary keys item to be deleted
     * @return boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteSelectedAufMasses($selectedItemsId) {

        try {
            $daoDelete = new DaoDelete();
            if (!isset($selectedItemsId) || !is_array($selectedItemsId)) {
                return "Error: Invalid Parameters type for this method.";
            }
            foreach (array_values($selectedItemsId) as $itemId) {
                if ($daoDelete->deleteAufMasse($itemId)) {
                    continue;
                } else {
                    return "error: Can not delete AufMasse !";
                }
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes all AufMasse items
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteAllAufMasses() {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteAllAufMasses();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

}