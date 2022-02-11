
<?php

include_once 'DaoBase.php';

/** Auto generated Module for DAO DELETE methods
 * Author: Guy Bami
 * Created: 21.03.2020 00:42:39
 * Last update:  21.03.2020 00:42:39
 */
class DaoDelete extends DaoBase {

    //The constructor

    public function __construct($dbHost = "", $dbUser = "", $dbPassword = "", $dbName = "") {
        parent::__construct($dbHost, $dbUser, $dbPassword, $dbName);
    }

    /**
     * ********************************************************
     * Arbeitszeit Methods
     * *********************************************************
     */

    /**
     * Deletes Arbeitszeit item
     * @param  $arbeitszeitId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteArbeitszeit($arbeitszeitId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteArbeitszeit(:arbeitszeitId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':arbeitszeitId', $arbeitszeitId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all Arbeitszeit items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllArbeitszeits() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllArbeitszeits();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * AufMasse Methods
     * *********************************************************
     */

    /**
     * Deletes AufMasse item
     * @param  $aufmasseId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteAufMasse($aufmasseId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAufMasse(:aufmasseId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all AufMasse items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllAufMasses() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllAufMasses();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * AufMasseBild Methods
     * *********************************************************
     */

    /**
     * Deletes AufMasseBild item
     * @param  $bildId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteAufMasseBild($bildId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAufMasseBild(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all AufMasseBild items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllAufMasseBilds() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllAufMasseBilds();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * AufMasseSkizze Methods
     * *********************************************************
     */

    /**
     * Deletes AufMasseSkizze item
     * @param  $skizzeId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteAufMasseSkizze($skizzeId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAufMasseSkizze(:skizzeId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all AufMasseSkizze items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllAufMasseSkizzes() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllAufMasseSkizzes();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Customer Methods
     * *********************************************************
     */

    /**
     * Deletes Customer item
     * @param  $customerId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteCustomer($customerId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteCustomer(:customerId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all Customer items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllCustomers() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllCustomers();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Erfassung Methods
     * *********************************************************
     */

    /**
     * Deletes Erfassung item
     * @param  $erfassungId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteErfassung($erfassungId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteErfassung(:erfassungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all Erfassung items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllErfassungs() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllErfassungs();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * ErfassungBild Methods
     * *********************************************************
     */

    /**
     * Deletes ErfassungBild item
     * @param  $bildId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteErfassungBild($bildId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteErfassungBild(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all ErfassungBild items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllErfassungBilds() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllErfassungBilds();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * ErfassungOhneAuftrag Methods
     * *********************************************************
     */

    /**
     * Deletes ErfassungOhneAuftrag item
     * @param  $erfassungId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteErfassungOhneAuftrag($erfassungId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteErfassungOhneAuftrag(:erfassungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all ErfassungOhneAuftrag items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllErfassungOhneAuftrags() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllErfassungOhneAuftrags();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * ErfassungOhneAuftragBild Methods
     * *********************************************************
     */

    /**
     * Deletes ErfassungOhneAuftragBild item
     * @param  $bildId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteErfassungOhneAuftragBild($bildId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteErfassungOhneAuftragBild(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all ErfassungOhneAuftragBild items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllErfassungOhneAuftragBilds() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllErfassungOhneAuftragBilds();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Fertigung Methods
     * *********************************************************
     */

    /**
     * Deletes Fertigung item
     * @param  $fertigungId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteFertigung($fertigungId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteFertigung(:fertigungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all Fertigung items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllFertigungs() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllFertigungs();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * FertigungBild Methods
     * *********************************************************
     */

    /**
     * Deletes FertigungBild item
     * @param  $bildId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteFertigungBild($bildId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteFertigungBild(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all FertigungBild items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllFertigungBilds() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllFertigungBilds();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * LogActivity Methods
     * *********************************************************
     */

    /**
     * Deletes LogActivity item
     * @param  $activityId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteLogActivity($activityId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteLogActivity(:activityId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':activityId', $activityId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all LogActivity items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllLogActivities() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllLogActivities();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Montage Methods
     * *********************************************************
     */

    /**
     * Deletes Montage item
     * @param  $montageId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteMontage($montageId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteMontage(:montageId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all Montage items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllMontages() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllMontages();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * MontageBild Methods
     * *********************************************************
     */

    /**
     * Deletes MontageBild item
     * @param  $bildId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteMontageBild($bildId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteMontageBild(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all MontageBild items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllMontageBilds() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllMontageBilds();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Nachtrag Methods
     * *********************************************************
     */

    /**
     * Deletes Nachtrag item
     * @param  $nachtragId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteNachtrag($nachtragId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteNachtrag(:nachtragId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all Nachtrag items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllNachtrags() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllNachtrags();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * NachtragBild Methods
     * *********************************************************
     */

    /**
     * Deletes NachtragBild item
     * @param  $bildId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteNachtragBild($bildId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteNachtragBild(:bildId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all NachtragBild items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllNachtragBilds() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllNachtragBilds();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * NachtragSkizze Methods
     * *********************************************************
     */

    /**
     * Deletes NachtragSkizze item
     * @param  $skizzeId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteNachtragSkizze($skizzeId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteNachtragSkizze(:skizzeId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all NachtragSkizze items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllNachtragSkizzes() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllNachtragSkizzes();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Order Methods
     * *********************************************************
     */

    /**
     * Deletes Order item
     * @param  $orderId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteOrder($orderId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteOrder(:orderId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':orderId', $orderId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all Order items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllOrders() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllOrders();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Project Methods
     * *********************************************************
     */

    /**
     * Deletes Project item
     * @param  $projectId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteProject($projectId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteProject(:projectId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all Project items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllProjects() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllProjects();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Rapport Methods
     * *********************************************************
     */

    /**
     * Deletes Rapport item
     * @param  $rapportId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteRapport($rapportId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteRapport(:rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all Rapport items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllRapports() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllRapports();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Task Methods
     * *********************************************************
     */

    /**
     * Deletes Task item
     * @param  $taskId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteTask($taskId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteTask(:taskId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all Task items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllTasks() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllTasks();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * TaskLogTime Methods
     * *********************************************************
     */

    /**
     * Deletes TaskLogTime item
     * @param  $taskLogTimeId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteTaskLogTime($taskLogTimeId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteTaskLogTime(:taskLogTimeId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all TaskLogTime items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllTaskLogTimes() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllTaskLogTimes();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * TaskPicture Methods
     * *********************************************************
     */

    /**
     * Deletes TaskPicture item
     * @param  $taskPictureId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteTaskPicture($taskPictureId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteTaskPicture(:taskPictureId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskPictureId', $taskPictureId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all TaskPicture items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllTaskPictures() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllTaskPictures();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * User Methods
     * *********************************************************
     */

    /**
     * Deletes User item
     * @param  $userId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteUser($userId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteUser(:userId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all User items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllUsers() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllUsers();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * UserProfile Methods
     * *********************************************************
     */

    /**
     * Deletes UserProfile item
     * @param  $profileId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteUserProfile($profileId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteUserProfile(:profileId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);

                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     * Deletes all UserProfile items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllUserProfiles() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllUserProfiles();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    return TRUE;
                } else {
                    $this->logSqlError($query, $statement);
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
     *********************************************************
     * Auftrag Methods
     **********************************************************
     */
    /**
     * Deletes Auftrag item
     * @param  $auftragId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteAuftrag($auftragId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAuftrag(:auftragId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_INT);

                if ($statement->execute()){
                    return TRUE;
                }
                else {
                    $this->logSqlError($query, $statement);
                }
            }
            else{
                return $pdo;
            }
        }
        catch (PDOException $e) {
            return $this->logSqlException($e);

        }
        return FALSE;
    }



    /**
     * Deletes all Auftrag items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllAuftrags() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllAuftrags();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()){
                    return TRUE;
                }
                else {
                    $this->logSqlError($query, $statement);
                }
            }
            else{
                return $pdo;
            }
        }
        catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return FALSE;
    }




    /**
     *********************************************************
     * Zeichnung Methods
     **********************************************************
     */
    /**
     * Deletes Zeichnung item
     * @param  $zeichnungId mixed The entity primary key field. See corresponding entity class.
     * @return mixed TRUE if delete occured successfully, otherwise object
     */
    public function deleteZeichnung($zeichnungId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteZeichnung(:zeichnungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':zeichnungId', $zeichnungId, PDO::PARAM_INT);

                if ($statement->execute()){
                    return TRUE;
                }
                else {
                    $this->logSqlError($query, $statement);
                }
            }
            else{
                return $pdo;
            }
        }
        catch (PDOException $e) {
            return $this->logSqlException($e);

        }
        return FALSE;
    }



    /**
     * Deletes all Zeichnung items
     * @return mixed TRUE if delete occured successfully, otherwise FALSE
     */
    public function deleteAllZeichnungs() {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL deleteAllZeichnungs();";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()){
                    return TRUE;
                }
                else {
                    $this->logSqlError($query, $statement);
                }
            }
            else{
                return $pdo;
            }
        }
        catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return FALSE;
    }




}
