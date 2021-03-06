
<?php

/**
 * This module was auto generated by the G-Watcho module generator
 * The Erfassung model entity class.
 * @author
 *    Guy Bami
 */
include_once '../Utils/ExceptionLogger.php';

class Erfassung {

    private $erfassungId;
    private $rapportId;
    private $bericht;
    private $material;
    private $maschineAufwand;
    private $kilometer;
    private $unterschriftKundeDatei;
    private $auftragAbgeschlossen;
    private $datum;

    /** Constructor of an Erfassung object
     *  @param $erfassungId int The entity  primary key field 
     * @param  $rapportId int The entity  rapportId field 
     * @param  $bericht string The entity  bericht field 
     * @param  $material string The entity  material field 
     * @param  $maschineAufwand string The entity  maschineAufwand field 
     * @param  $kilometer string The entity  kilometer field 
     * @param  $unterschriftKundeDatei string The entity  unterschriftKundeDatei field 
     * @param  $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     * @param  $datum string The entity  datum field 
     */
    function __construct($erfassungId = "", $rapportId = "", $bericht = "", $material = "", $maschineAufwand = "", $kilometer = "", $unterschriftKundeDatei = "", $auftragAbgeschlossen = "", $datum = "") {
        $this->erfassungId = $erfassungId;
        $this->rapportId = $rapportId;
        $this->bericht = $bericht;
        $this->material = $material;
        $this->maschineAufwand = $maschineAufwand;
        $this->kilometer = $kilometer;
        $this->unterschriftKundeDatei = $unterschriftKundeDatei;
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
     * Gets  $bericht value
     * @param $bericht
     * @return mixed
     */
    public function getBericht() {
        return $this->bericht;
    }

    /**
     * Gets  $material value
     * @param $material
     * @return mixed
     */
    public function getMaterial() {
        return $this->material;
    }

    /**
     * Gets  $maschineAufwand value
     * @param $maschineAufwand
     * @return mixed
     */
    public function getMaschineAufwand() {
        return $this->maschineAufwand;
    }

    /**
     * Gets  $kilometer value
     * @param $kilometer
     * @return mixed
     */
    public function getKilometer() {
        return $this->kilometer;
    }

    /**
     * Gets  $unterschriftKundeDatei value
     * @param $unterschriftKundeDatei
     * @return mixed
     */
    public function getUnterschriftKundeDatei() {
        return $this->unterschriftKundeDatei;
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
     * Sets  $bericht value
     * @param $bericht
     * @return void
     */
    public function setBericht($bericht) {
        $this->bericht = $bericht;
    }

    /**
     * Sets  $material value
     * @param $material
     * @return void
     */
    public function setMaterial($material) {
        $this->material = $material;
    }

    /**
     * Sets  $maschineAufwand value
     * @param $maschineAufwand
     * @return void
     */
    public function setMaschineAufwand($maschineAufwand) {
        $this->maschineAufwand = $maschineAufwand;
    }

    /**
     * Sets  $kilometer value
     * @param $kilometer
     * @return void
     */
    public function setKilometer($kilometer) {
        $this->kilometer = $kilometer;
    }

    /**
     * Sets  $unterschriftKundeDatei value
     * @param $unterschriftKundeDatei
     * @return void
     */
    public function setUnterschriftKundeDatei($unterschriftKundeDatei) {
        $this->unterschriftKundeDatei = $unterschriftKundeDatei;
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
     * Selects all Erfassung items
     * @return
     *   array The object having all Erfassung items
     *    or string with the Exception details if error occured
     */
    public function selectAllErfassungs() {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAllErfassungs();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Gets Erfassung item
     * @param $erfassungId int  The table primary key
     * @return
     *   array The object with the given $erfassungId value
     */
    public function getErfassungDetails($erfassungId) {
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectErfassungDetails($erfassungId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Inserts new Erfassung entity
     * @param  $rapportId int The entity  rapportId field 
     * @param   $bericht string The entity  bericht field
     * @param   $material string The entity  material field
     * @param   $maschineAufwand string The entity  maschineAufwand field
     * @param   $kilometer string The entity  kilometer field
     * @param   $unterschriftKundeDatei string The entity  unterschriftKundeDatei field
     * @param   $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     * @param   $datum string The entity  datum field
     * @return
     *   boolean TRUE if insert successful, otherwise FALSE
     */
    public function insertNewErfassung($rapportId, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum) {
        try {
            $daoInsert = new DaoInsert();
            return $daoInsert->insertNewErfassung($rapportId, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates Erfassung item
     * @param  $erfassungId int The entity  erfassungId field 
     * @param  $rapportId int The entity  rapportId field 
     * @param  $bericht string The entity  bericht field 
     * @param  $material string The entity  material field 
     * @param  $maschineAufwand string The entity  maschineAufwand field 
     * @param  $kilometer string The entity  kilometer field 
     * @param  $unterschriftKundeDatei string The entity  unterschriftKundeDatei field 
     * @param  $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     * @param  $datum string The entity  datum field 
     * @return
     *   boolean  TRUE if update successful, otherwise FALSE
     */
    public function updateErfassung($erfassungId, $rapportId, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateErfassung($erfassungId, $rapportId, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates Erfassung item  details

     * @param  $erfassungId int The entity  erfassungId field 
     * @param  $rapportId int The entity  rapportId field 
     * @param  $bericht string The entity  bericht field 
     * @param  $material string The entity  material field 
     * @param  $maschineAufwand string The entity  maschineAufwand field 
     * @param  $kilometer string The entity  kilometer field 
     * @param  $unterschriftKundeDatei string The entity  unterschriftKundeDatei field 
     * @param  $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     * @param  $datum string The entity  datum field 
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateErfassungDetails($erfassungId, $rapportId, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateErfassungDetails($erfassungId, $rapportId, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates rapportId of the Erfassung entity
     * @param   $erfassungId int The entity  erfassungId field 
     * @param   $rapportId int The entity  rapportId field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateErfassungRapportId($erfassungId, $rapportId) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateErfassungRapportId($erfassungId, $rapportId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates bericht of the Erfassung entity
     * @param   $erfassungId int The entity  erfassungId field 
     * @param   $bericht string The entity  bericht field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateErfassungBericht($erfassungId, $bericht) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateErfassungBericht($erfassungId, $bericht);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates material of the Erfassung entity
     * @param   $erfassungId int The entity  erfassungId field 
     * @param   $material string The entity  material field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateErfassungMaterial($erfassungId, $material) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateErfassungMaterial($erfassungId, $material);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates maschineAufwand of the Erfassung entity
     * @param   $erfassungId int The entity  erfassungId field 
     * @param   $maschineAufwand string The entity  maschineAufwand field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateErfassungMaschineAufwand($erfassungId, $maschineAufwand) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateErfassungMaschineAufwand($erfassungId, $maschineAufwand);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates kilometer of the Erfassung entity
     * @param   $erfassungId int The entity  erfassungId field 
     * @param   $kilometer string The entity  kilometer field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateErfassungKilometer($erfassungId, $kilometer) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateErfassungKilometer($erfassungId, $kilometer);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates unterschriftKundeDatei of the Erfassung entity
     * @param   $erfassungId int The entity  erfassungId field 
     * @param   $unterschriftKundeDatei string The entity  unterschriftKundeDatei field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateErfassungUnterschriftKundeDatei($erfassungId, $unterschriftKundeDatei) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateErfassungUnterschriftKundeDatei($erfassungId, $unterschriftKundeDatei);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates auftragAbgeschlossen of the Erfassung entity
     * @param   $erfassungId int The entity  erfassungId field 
     * @param   $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateErfassungAuftragAbgeschlossen($erfassungId, $auftragAbgeschlossen) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateErfassungAuftragAbgeschlossen($erfassungId, $auftragAbgeschlossen);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates datum of the Erfassung entity
     * @param   $erfassungId int The entity  erfassungId field 
     * @param   $datum string The entity  datum field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateErfassungDatum($erfassungId, $datum) {
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateErfassungDatum($erfassungId, $datum);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Updates specific field of the Erfassung item
     * @param    $fieldName string The field name
     * @param    $keyFieldValue int The primary key field value
     * @param    $newFieldValue string The new field value
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateErfassungEntityField($fieldName, $keyFieldValue, $newFieldValue) {
        try {
            switch ($fieldName) {

                case "rapportId":
                    return $this->updateErfassungRapportId($keyFieldValue, $newFieldValue);

                case "bericht":
                    return $this->updateErfassungBericht($keyFieldValue, $newFieldValue);

                case "material":
                    return $this->updateErfassungMaterial($keyFieldValue, $newFieldValue);

                case "maschineAufwand":
                    return $this->updateErfassungMaschineAufwand($keyFieldValue, $newFieldValue);

                case "kilometer":
                    return $this->updateErfassungKilometer($keyFieldValue, $newFieldValue);

                case "unterschriftKundeDatei":
                    return $this->updateErfassungUnterschriftKundeDatei($keyFieldValue, $newFieldValue);

                case "auftragAbgeschlossen":
                    return $this->updateErfassungAuftragAbgeschlossen($keyFieldValue, $newFieldValue);

                case "datum":
                    return $this->updateErfassungDatum($keyFieldValue, $newFieldValue);
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes Erfassung item
     * @param  $erfassungId int  The table primary key
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteErfassung($erfassungId) {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteErfassung($erfassungId);
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

    /**
     * Deletes selected Erfassung items
     * @param  $selectedItemsId array The List of primary keys item to be deleted
     * @return boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteSelectedErfassungs($selectedItemsId) {

        try {
            $daoDelete = new DaoDelete();
            if (!isset($selectedItemsId) || !is_array($selectedItemsId)) {
                return "Error: Invalid Parameters type for this method.";
            }
            foreach (array_values($selectedItemsId) as $itemId) {
                if ($daoDelete->deleteErfassung($itemId)) {
                    continue;
                } else {
                    return "error: Can not delete Erfassung !";
                }
            }
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }

    /**
     * Deletes all Erfassung items
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteAllErfassungs() {
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteAllErfassungs();
        } catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

}
