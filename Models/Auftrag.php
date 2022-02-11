
<?php


/**
 * This module was auto generated by the G-Watcho module generator
 * The Auftrag model entity class.
 * @author
 *    Guy Bami
 */

include_once '../Utils/ExceptionLogger.php';


class Auftrag{
    private $auftragId;
    private $auftragsNummer;
    private $kundenNummer;
    private $bezeichnung;
    private $auftragAbgeschlossen;
    private $datum;

    /** Constructor of an Auftrag object
     *  @param $auftragId int The entity  primary key field
     * @param  $auftragsNummer string The entity  auftragsNummer field
     * @param  $kundenNummer string The entity  kundenNummer field
     * @param  $bezeichnung string The entity  bezeichnung field
     * @param  $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     * @param  $datum string The entity  datum field
     */

    function __construct($auftragId = "", $auftragsNummer = "", $kundenNummer = "", $bezeichnung = "", $auftragAbgeschlossen = "", $datum = ""){
        $this->auftragId = $auftragId;
        $this->auftragsNummer = $auftragsNummer;
        $this->kundenNummer = $kundenNummer;
        $this->bezeichnung = $bezeichnung;
        $this->auftragAbgeschlossen = $auftragAbgeschlossen;
        $this->datum = $datum;
    }



    /**
     * Gets  $auftragsNummer value
     * @param $auftragsNummer
     * @return mixed
     */
    public function getAuftragsNummer() {
        return $this->auftragsNummer;
    }



    /**
     * Gets  $kundenNummer value
     * @param $kundenNummer
     * @return mixed
     */
    public function getKundenNummer() {
        return $this->kundenNummer;
    }



    /**
     * Gets  $bezeichnung value
     * @param $bezeichnung
     * @return mixed
     */
    public function getBezeichnung() {
        return $this->bezeichnung;
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
     * Sets  $auftragsNummer value
     * @param $auftragsNummer
     * @return void
     */
    public function setAuftragsNummer($auftragsNummer) {
        $this->auftragsNummer = $auftragsNummer;
    }



    /**
     * Sets  $kundenNummer value
     * @param $kundenNummer
     * @return void
     */
    public function setKundenNummer($kundenNummer) {
        $this->kundenNummer = $kundenNummer;
    }



    /**
     * Sets  $bezeichnung value
     * @param $bezeichnung
     * @return void
     */
    public function setBezeichnung($bezeichnung) {
        $this->bezeichnung = $bezeichnung;
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
     * Selects all Auftrag items
     * @return
     *   array The object having all Auftrag items
     *    or string with the Exception details if error occured
     */
    public function selectAllAuftrags(){
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAllAuftrags();
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Gets Auftrag item
     * @param $auftragId int  The table primary key
     * @return
     *   array The object with the given $auftragId value
     */
    public function getAuftragDetails($auftragId){
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAuftragDetails($auftragId);
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Inserts new Auftrag entity
     * @param  $auftragsNummer string The entity  auftragsNummer field
     * @param   $kundenNummer string The entity  kundenNummer field
     * @param   $bezeichnung string The entity  bezeichnung field
     * @param   $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     * @param   $datum string The entity  datum field
     * @return
     *   boolean TRUE if insert successful, otherwise FALSE
     */
    public function insertNewAuftrag($auftragsNummer, $kundenNummer, $bezeichnung, $auftragAbgeschlossen, $datum){
        try {
            $daoInsert = new DaoInsert();
            return $daoInsert->insertNewAuftrag($auftragsNummer, $kundenNummer, $bezeichnung, $auftragAbgeschlossen, $datum);
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Updates Auftrag item
     * @param  $auftragId int The entity  auftragId field
     * @param  $auftragsNummer string The entity  auftragsNummer field
     * @param  $kundenNummer string The entity  kundenNummer field
     * @param  $bezeichnung string The entity  bezeichnung field
     * @param  $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     * @param  $datum string The entity  datum field
     * @return
     *   boolean  TRUE if update successful, otherwise FALSE
     */
    public function updateAuftrag($auftragId, $auftragsNummer, $kundenNummer, $bezeichnung, $auftragAbgeschlossen, $datum){
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAuftrag($auftragId, $auftragsNummer, $kundenNummer, $bezeichnung, $auftragAbgeschlossen, $datum);
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Updates Auftrag item  details

     * @param  $auftragId int The entity  auftragId field
     * @param  $auftragsNummer string The entity  auftragsNummer field
     * @param  $kundenNummer string The entity  kundenNummer field
     * @param  $bezeichnung string The entity  bezeichnung field
     * @param  $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     * @param  $datum string The entity  datum field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAuftragDetails($auftragId, $auftragsNummer, $kundenNummer, $bezeichnung, $auftragAbgeschlossen, $datum){
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAuftragDetails($auftragId, $auftragsNummer, $kundenNummer, $bezeichnung, $auftragAbgeschlossen, $datum);
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Updates auftragsNummer of the Auftrag entity
     * @param   $auftragId int The entity  auftragId field
     * @param   $auftragsNummer string The entity  auftragsNummer field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAuftragAuftragsNummer($auftragId, $auftragsNummer){
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAuftragAuftragsNummer($auftragId, $auftragsNummer);
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Updates kundenNummer of the Auftrag entity
     * @param   $auftragId int The entity  auftragId field
     * @param   $kundenNummer string The entity  kundenNummer field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAuftragKundenNummer($auftragId, $kundenNummer){
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAuftragKundenNummer($auftragId, $kundenNummer);
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Updates bezeichnung of the Auftrag entity
     * @param   $auftragId int The entity  auftragId field
     * @param   $bezeichnung string The entity  bezeichnung field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAuftragBezeichnung($auftragId, $bezeichnung){
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAuftragBezeichnung($auftragId, $bezeichnung);
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Updates auftragAbgeschlossen of the Auftrag entity
     * @param   $auftragId int The entity  auftragId field
     * @param   $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAuftragAuftragAbgeschlossen($auftragId, $auftragAbgeschlossen){
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAuftragAuftragAbgeschlossen($auftragId, $auftragAbgeschlossen);
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Updates datum of the Auftrag entity
     * @param   $auftragId int The entity  auftragId field
     * @param   $datum string The entity  datum field
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAuftragDatum($auftragId, $datum){
        try {
            $daoUpdate = new DaoUpdate();
            return $daoUpdate->updateAuftragDatum($auftragId, $datum);
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Updates specific field of the Auftrag item
     * @param    $fieldName string The field name
     * @param    $keyFieldValue int The primary key field value
     * @param    $newFieldValue string The new field value
     * @return
     *   boolean TRUE if update successful, otherwise FALSE
     */
    public function updateAuftragEntityField($fieldName, $keyFieldValue, $newFieldValue){
        try {
            switch($fieldName){

                case "auftragsNummer":
                    return $this->updateAuftragAuftragsNummer($keyFieldValue, $newFieldValue);

                case "kundenNummer":
                    return $this->updateAuftragKundenNummer($keyFieldValue, $newFieldValue);

                case "bezeichnung":
                    return $this->updateAuftragBezeichnung($keyFieldValue, $newFieldValue);

                case "auftragAbgeschlossen":
                    return $this->updateAuftragAuftragAbgeschlossen($keyFieldValue, $newFieldValue);

                case "datum":
                    return $this->updateAuftragDatum($keyFieldValue, $newFieldValue);

            }
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }


    /**
     * Deletes Auftrag item
     * @param  $auftragId int  The table primary key
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteAuftrag($auftragId){
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteAuftrag($auftragId);
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


    /**
     * Deletes selected Auftrag items
     * @param  $selectedItemsId array The List of primary keys item to be deleted
     * @return boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteSelectedAuftrags($selectedItemsId){

        try {
            $daoDelete = new DaoDelete();
            if (!isset($selectedItemsId) || !is_array($selectedItemsId)){
                return "Error: Invalid Parameters type for this method.";
            }
            foreach (array_values($selectedItemsId) as $itemId) {
                if ($daoDelete->deleteAuftrag($itemId)) {
                    continue;
                }
                else {
                    return "error: Can not delete Auftrag !";
                }
            }
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
        return true;
    }


    /**
     * Deletes all Auftrag items
     * @return    boolean|mixed TRUE if delete successful, otherwise string with error message
     */
    public function deleteAllAuftrags(){
        try {
            $daoDelete = new DaoDelete();
            return $daoDelete->deleteAllAuftrags();
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }


}
