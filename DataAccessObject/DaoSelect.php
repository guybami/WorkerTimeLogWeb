
<?php

include_once 'DaoBase.php';

/** Auto generated Module for DAO SELECT methods
 * Author: Guy Bami
 * Created:  21.03.20 00:42:39
 * Last update:  03.21.20 00:42:39
 */
class DaoSelect extends DaoBase {

    //The main constructor

    public function __construct($dbHost = "", $dbUser = "", $dbPassword = "", $dbName = "") {
        parent::__construct($dbHost, $dbUser, $dbPassword, $dbName);
    }

    /**
     * ********************************************************
     * Arbeitszeit Methods
     * *********************************************************
     */

    /**
     * Select all Arbeitszeit items
     * @return  mixed associative array object having all Arbeitszeit items
     *    or NULL if error occured
     */
    public function selectAllArbeitszeits() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllArbeitszeits()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects Arbeitszeit  item  details
     * @param $arbeitszeitId int The table primary key
     * @return  mixed associative array object having the Arbeitszeit item
     *   found or NULL if error occured
     */
    public function selectArbeitszeitDetails($arbeitszeitId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectArbeitszeitDetails(:arbeitszeitId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':arbeitszeitId', $arbeitszeitId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * AufMasse Methods
     * *********************************************************
     */

    /**
     * Select all AufMasse items
     * @return  mixed associative array object having all AufMasse items
     *    or NULL if error occured
     */
    public function selectAllAufMasses() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllAufMasses()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects AufMasse  item  details
     * @param $aufmasseId int The table primary key
     * @return  mixed associative array object having the AufMasse item
     *   found or NULL if error occured
     */
    public function selectAufMasseDetails($aufmasseId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAufMasseDetails(:aufmasseId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * AufMasseBild Methods
     * *********************************************************
     */

    /**
     * Select all AufMasseBild items
     * @return  mixed associative array object having all AufMasseBild items
     *    or NULL if error occured
     */
    public function selectAllAufMasseBilds() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllAufMasseBilds()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects AufMasseBild  item  details
     * @param $bildId int The table primary key
     * @return  mixed associative array object having the AufMasseBild item
     *   found or NULL if error occured
     */
    public function selectAufMasseBildDetails($bildId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAufMasseBildDetails(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * AufMasseSkizze Methods
     * *********************************************************
     */

    /**
     * Select all AufMasseSkizze items
     * @return  mixed associative array object having all AufMasseSkizze items
     *    or NULL if error occured
     */
    public function selectAllAufMasseSkizzes() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllAufMasseSkizzes()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects AufMasseSkizze  item  details
     * @param $skizzeId int The table primary key
     * @return  mixed associative array object having the AufMasseSkizze item
     *   found or NULL if error occured
     */
    public function selectAufMasseSkizzeDetails($skizzeId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAufMasseSkizzeDetails(:skizzeId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * Customer Methods
     * *********************************************************
     */

    /**
     * Select all Customer items
     * @return  mixed associative array object having all Customer items
     *    or NULL if error occured
     */
    public function selectAllCustomers() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllCustomers()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects Customer  item  details
     * @param $customerId int The table primary key
     * @return  mixed associative array object having the Customer item
     *   found or NULL if error occured
     */
    public function selectCustomerDetails($customerId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectCustomerDetails(:customerId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * Erfassung Methods
     * *********************************************************
     */

    /**
     * Select all Erfassung items
     * @return  mixed associative array object having all Erfassung items
     *    or NULL if error occured
     */
    public function selectAllErfassungs() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllErfassungs()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects Erfassung  item  details
     * @param $erfassungId int The table primary key
     * @return  mixed associative array object having the Erfassung item
     *   found or NULL if error occured
     */
    public function selectErfassungDetails($erfassungId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectErfassungDetails(:erfassungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * ErfassungBild Methods
     * *********************************************************
     */

    /**
     * Select all ErfassungBild items
     * @return  mixed associative array object having all ErfassungBild items
     *    or NULL if error occured
     */
    public function selectAllErfassungBilds() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllErfassungBilds()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects ErfassungBild  item  details
     * @param $bildId int The table primary key
     * @return  mixed associative array object having the ErfassungBild item
     *   found or NULL if error occured
     */
    public function selectErfassungBildDetails($bildId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectErfassungBildDetails(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * ErfassungOhneAuftrag Methods
     * *********************************************************
     */

    /**
     * Select all ErfassungOhneAuftrag items
     * @return  mixed associative array object having all ErfassungOhneAuftrag items
     *    or NULL if error occured
     */
    public function selectAllErfassungOhneAuftrags() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllErfassungOhneAuftrags()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects ErfassungOhneAuftrag  item  details
     * @param $erfassungId int The table primary key
     * @return  mixed associative array object having the ErfassungOhneAuftrag item
     *   found or NULL if error occured
     */
    public function selectErfassungOhneAuftragDetails($erfassungId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectErfassungOhneAuftragDetails(:erfassungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * ErfassungOhneAuftragBild Methods
     * *********************************************************
     */

    /**
     * Select all ErfassungOhneAuftragBild items
     * @return  mixed associative array object having all ErfassungOhneAuftragBild items
     *    or NULL if error occured
     */
    public function selectAllErfassungOhneAuftragBilds() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllErfassungOhneAuftragBilds()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects ErfassungOhneAuftragBild  item  details
     * @param $bildId int The table primary key
     * @return  mixed associative array object having the ErfassungOhneAuftragBild item
     *   found or NULL if error occured
     */
    public function selectErfassungOhneAuftragBildDetails($bildId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectErfassungOhneAuftragBildDetails(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * Fertigung Methods
     * *********************************************************
     */

    /**
     * Select all Fertigung items
     * @return  mixed associative array object having all Fertigung items
     *    or NULL if error occured
     */
    public function selectAllFertigungs() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllFertigungs()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects Fertigung  item  details
     * @param $fertigungId int The table primary key
     * @return  mixed associative array object having the Fertigung item
     *   found or NULL if error occured
     */
    public function selectFertigungDetails($fertigungId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectFertigungDetails(:fertigungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * FertigungBild Methods
     * *********************************************************
     */

    /**
     * Select all FertigungBild items
     * @return  mixed associative array object having all FertigungBild items
     *    or NULL if error occured
     */
    public function selectAllFertigungBilds() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllFertigungBilds()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects FertigungBild  item  details
     * @param $bildId int The table primary key
     * @return  mixed associative array object having the FertigungBild item
     *   found or NULL if error occured
     */
    public function selectFertigungBildDetails($bildId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectFertigungBildDetails(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * LogActivity Methods
     * *********************************************************
     */

    /**
     * Select all LogActivity items
     * @return  mixed associative array object having all LogActivity items
     *    or NULL if error occured
     */
    public function selectAllLogActivities() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllLogActivities()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects LogActivity  item  details
     * @param $activityId int The table primary key
     * @return  mixed associative array object having the LogActivity item
     *   found or NULL if error occured
     */
    public function selectLogActivityDetails($activityId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectLogActivityDetails(:activityId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':activityId', $activityId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * Montage Methods
     * *********************************************************
     */

    /**
     * Select all Montage items
     * @return  mixed associative array object having all Montage items
     *    or NULL if error occured
     */
    public function selectAllMontages() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllMontages()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects Montage  item  details
     * @param $montageId int The table primary key
     * @return  mixed associative array object having the Montage item
     *   found or NULL if error occured
     */
    public function selectMontageDetails($montageId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectMontageDetails(:montageId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * MontageBild Methods
     * *********************************************************
     */

    /**
     * Select all MontageBild items
     * @return  mixed associative array object having all MontageBild items
     *    or NULL if error occured
     */
    public function selectAllMontageBilds() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllMontageBilds()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects MontageBild  item  details
     * @param $bildId int The table primary key
     * @return  mixed associative array object having the MontageBild item
     *   found or NULL if error occured
     */
    public function selectMontageBildDetails($bildId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectMontageBildDetails(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * Nachtrag Methods
     * *********************************************************
     */

    /**
     * Select all Nachtrag items
     * @return  mixed associative array object having all Nachtrag items
     *    or NULL if error occured
     */
    public function selectAllNachtrags() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllNachtrags()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects Nachtrag  item  details
     * @param $nachtragId int The table primary key
     * @return  mixed associative array object having the Nachtrag item
     *   found or NULL if error occured
     */
    public function selectNachtragDetails($nachtragId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectNachtragDetails(:nachtragId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * NachtragBild Methods
     * *********************************************************
     */

    /**
     * Select all NachtragBild items
     * @return  mixed associative array object having all NachtragBild items
     *    or NULL if error occured
     */
    public function selectAllNachtragBilds() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllNachtragBilds()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects NachtragBild  item  details
     * @param $bildId int The table primary key
     * @return  mixed associative array object having the NachtragBild item
     *   found or NULL if error occured
     */
    public function selectNachtragBildDetails($bildId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectNachtragBildDetails(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * NachtragSkizze Methods
     * *********************************************************
     */

    /**
     * Select all NachtragSkizze items
     * @return  mixed associative array object having all NachtragSkizze items
     *    or NULL if error occured
     */
    public function selectAllNachtragSkizzes() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllNachtragSkizzes()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects NachtragSkizze  item  details
     * @param $skizzeId int The table primary key
     * @return  mixed associative array object having the NachtragSkizze item
     *   found or NULL if error occured
     */
    public function selectNachtragSkizzeDetails($skizzeId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectNachtragSkizzeDetails(:skizzeId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * Order Methods
     * *********************************************************
     */

    /**
     * Select all Order items
     * @return  mixed associative array object having all Order items
     *    or NULL if error occured
     */
    public function selectAllOrders() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllOrders()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects Order  item  details
     * @param $orderId int The table primary key
     * @return  mixed associative array object having the Order item
     *   found or NULL if error occured
     */
    public function selectOrderDetails($orderId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectOrderDetails(:orderId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':orderId', $orderId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * Project Methods
     * *********************************************************
     */

    /**
     * Select all Project items
     * @return  mixed associative array object having all Project items
     *    or NULL if error occured
     */
    public function selectAllProjects() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllProjects()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects Project  item  details
     * @param $projectId int The table primary key
     * @return  mixed associative array object having the Project item
     *   found or NULL if error occured
     */
    public function selectProjectDetails($projectId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectProjectDetails(:projectId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * Rapport Methods
     * *********************************************************
     */

    /**
     * Select all Rapport items
     * @return  mixed associative array object having all Rapport items
     *    or NULL if error occured
     */
    public function selectAllRapports() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllRapports()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects Rapport  item  details
     * @param $rapportId int The table primary key
     * @return  mixed associative array object having the Rapport item
     *   found or NULL if error occured
     */
    public function selectRapportDetails($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectRapportDetails(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * Task Methods
     * *********************************************************
     */

    /**
     * Select all Task items
     * @return  mixed associative array object having all Task items
     *    or NULL if error occured
     */
    public function selectAllTasks() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllTasks()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects Task  item  details
     * @param $taskId int The table primary key
     * @return  mixed associative array object having the Task item
     *   found or NULL if error occured
     */
    public function selectTaskDetails($taskId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectTaskDetails(:taskId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * TaskLogTime Methods
     * *********************************************************
     */

    /**
     * Select all TaskLogTime items
     * @return  mixed associative array object having all TaskLogTime items
     *    or NULL if error occured
     */
    public function selectAllTaskLogTimes() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllTaskLogTimes()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects TaskLogTime  item  details
     * @param $taskLogTimeId int The table primary key
     * @return  mixed associative array object having the TaskLogTime item
     *   found or NULL if error occured
     */
    public function selectTaskLogTimeDetails($taskLogTimeId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectTaskLogTimeDetails(:taskLogTimeId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * TaskPicture Methods
     * *********************************************************
     */

    /**
     * Select all TaskPicture items
     * @return  mixed associative array object having all TaskPicture items
     *    or NULL if error occured
     */
    public function selectAllTaskPictures() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllTaskPictures()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects TaskPicture  item  details
     * @param $taskPictureId int The table primary key
     * @return  mixed associative array object having the TaskPicture item
     *   found or NULL if error occured
     */
    public function selectTaskPictureDetails($taskPictureId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectTaskPictureDetails(:taskPictureId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskPictureId', $taskPictureId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * User Methods
     * *********************************************************
     */

    /**
     * Select all User items
     * @return  mixed associative array object having all User items
     *    or NULL if error occured
     */
    public function selectAllUsers() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllUsers()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects User  item  details
     * @param $userId int The table primary key
     * @return  mixed associative array object having the User item
     *   found or NULL if error occured
     */
    public function selectUserDetails($userId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectUserDetails(:userId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * UserProfile Methods
     * *********************************************************
     */

    /**
     * Select all UserProfile items
     * @return  mixed associative array object having all UserProfile items
     *    or NULL if error occured
     */
    public function selectAllUserProfiles() {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllUserProfiles()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * Selects UserProfile  item  details
     * @param $profileId int The table primary key
     * @return  mixed associative array object having the UserProfile item
     *   found or NULL if error occured
     */
    public function selectUserProfileDetails($profileId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectUserProfileDetails(:profileId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     *********************************************************
     * Auftrag Methods
     **********************************************************
     */
    /**
     * Select all Auftrag items
     * @return  mixed associative array object having all Auftrag items
     *    or NULL if error occured
     */
    public function selectAllAuftrags(){
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllAuftrags()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            }
            else{
                return $pdo;
            }
        }
        catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }


    /**
     * Selects Auftrag  item  details
     * @param $auftragId int The table primary key
     * @return  mixed associative array object having the Auftrag item
     *   found or NULL if error occured
     */
    public function selectAuftragDetails($auftragId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAuftragDetails(:auftragId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_STR);

                if ($statement->execute()){
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            }
            else{
                return $pdo;
            }
        }
        catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }




    /**
     *********************************************************
     * Zeichnung Methods
     **********************************************************
     */
    /**
     * Select all Zeichnung items
     * @return  mixed associative array object having all Zeichnung items
     *    or NULL if error occured
     */
    public function selectAllZeichnungs(){
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllZeichnungs()";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            }
            else{
                return $pdo;
            }
        }
        catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }


    /**
     * Selects Zeichnung  item  details
     * @param $zeichnungId int The table primary key
     * @return  mixed associative array object having the Zeichnung item
     *   found or NULL if error occured
     */
    public function selectZeichnungDetails($zeichnungId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectZeichnungDetails(:zeichnungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':zeichnungId', $zeichnungId, PDO::PARAM_STR);

                if ($statement->execute()){
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            }
            else{
                return $pdo;
            }
        }
        catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }


    /**
     * Custom added methods
     */

    /**
     * Checkes user login credentials
     * @param string $userLoginName
     * @param string $userPassword
     * @return boolean
     */
    public function checkUserLoginData($userLoginName, $userPassword) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllUsers();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    $allUsers = $statement->fetchAll();
                    $i = 0;
                    for ($i = 0; $i < count($allUsers); $i++) {
                        if ($allUsers[$i]['userLoginName'] == $userLoginName && $allUsers[$i]['hashPassword'] == $userPassword) {
                            return true;
                        }
                    }
                    return false;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return FALSE;
    }

    /**
     * ********************************************************
     * AufMasse custom Methods
     * *********************************************************
     */
    public function selectAllSkizzeByAufMasse($aufmasseId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllSkizzeByAufMasse(:aufmasseId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectAllBilderByAufMasse($aufmasseId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllBilderByAufMasse(:aufmasseId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectAllArbeitszeitByAufMasse($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllArbeitszeitByAufMasse(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectRapportAufmasseDatails($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectRapportAufmasseDatails(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    
    /**
     * ********************************************************
     * Nachtrag custom Methods
     * *********************************************************
     */
    public function selectAllSkizzeByNachtrag($nachtragId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllSkizzeByNachtrag(:nachtragId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectAllBilderByNachtrag($nachtragId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllBilderByNachtrag(:nachtragId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectAllArbeitszeitByNachtrag($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllArbeitszeitByNachtrag(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectRapportNachtragDatails($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectRapportNachtragDatails(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }
    
    
/**
     * ********************************************************
     * Fertigung custom Methods
     * *********************************************************
     */
    public function selectAllBilderByFertigung($fertigungId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllBilderByFertigung(:fertigungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectAllArbeitszeitByFertigung($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllArbeitszeitByFertigung(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectRapportFertigungDatails($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectRapportFertigungDatails(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }


    
    
    /**
     * ********************************************************
     * Montage custom Methods
     * *********************************************************
     */
    public function selectAllBilderVorArbeitByMontage($montageId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllBilderVorArbeitByMontage(:montageId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectAllBilderNachArbeitByMontage($montageId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllBilderNachArbeitByMontage(:montageId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

	
    public function selectAllArbeitszeitByMontage($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllArbeitszeitByMontage(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectRapportMontageDatails($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectRapportMontageDatails(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }
    


            
    
    /**
     * ********************************************************
     * Erfassung custom Methods
     * *********************************************************
     */
    public function selectAllBilderVorArbeitByErfassung($erfassungId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllBilderVorArbeitByErfassung(:erfassungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectAllBilderNachArbeitByErfassung($erfassungId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllBilderNachArbeitByErfassung(:erfassungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

	
    public function selectAllArbeitszeitByErfassung($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllArbeitszeitByErfassung(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function selectRapportErfassungDatails($rapportId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectRapportErfassungDatails(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     * ********************************************************
     * Auftrag custom Methods
     * *********************************************************
     */
    public function selectAllZeichnungByAuftrag($auftragId) {
        $result = NULL;
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL selectAllZeichnungByAuftrag(:auftragId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_STR);

                if ($statement->execute()) {
                    // return the associative array
                    $result = $statement->fetchAll();
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }
}
