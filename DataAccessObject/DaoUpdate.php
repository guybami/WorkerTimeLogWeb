
<?php

include_once 'DaoBase.php';

/** Auto generated Module for DAO UPDATE methods
 * Author: Guy Bami
 * Created: 21.03.2020 00:42:39
 * Last update:  21.03.2020 00:42:39
 */
class DaoUpdate extends DaoBase {

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
     * Updates Arbeitszeit item
     *  @param $arbeitszeitId int The entity  arbeitszeitId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $bereich string The entity  bereich field  
     *  @param $mitarbeiterName string The entity  mitarbeiterName field  
     *  @param $gruppe string The entity  gruppe field  
     *  @param $zeit string The entity  zeit field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateArbeitszeit($arbeitszeitId, $rapportId, $bereich, $mitarbeiterName, $gruppe, $zeit, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateArbeitszeit(:arbeitszeitId, :rapportId, :bereich, :mitarbeiterName, :gruppe, :zeit, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':arbeitszeitId', $arbeitszeitId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':bereich', $bereich, PDO::PARAM_STR);
                $statement->bindParam(':mitarbeiterName', $mitarbeiterName, PDO::PARAM_STR);
                $statement->bindParam(':gruppe', $gruppe, PDO::PARAM_STR);
                $statement->bindParam(':zeit', $zeit, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Arbeitszeit item
     *  @param $arbeitszeitId int The entity  arbeitszeitId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $bereich string The entity  bereich field  
     *  @param $mitarbeiterName string The entity  mitarbeiterName field  
     *  @param $gruppe string The entity  gruppe field  
     *  @param $zeit string The entity  zeit field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateArbeitszeitDetails($arbeitszeitId, $rapportId, $bereich, $mitarbeiterName, $gruppe, $zeit, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateArbeitszeit(:arbeitszeitId, :rapportId, :bereich, :mitarbeiterName, :gruppe, :zeit, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':arbeitszeitId', $arbeitszeitId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':bereich', $bereich, PDO::PARAM_STR);
                $statement->bindParam(':mitarbeiterName', $mitarbeiterName, PDO::PARAM_STR);
                $statement->bindParam(':gruppe', $gruppe, PDO::PARAM_STR);
                $statement->bindParam(':zeit', $zeit, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Arbeitszeit item  field
     *  @param $arbeitszeitId int The entity  arbeitszeitId field  
     *  @param $rapportId int The entity  rapportId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateArbeitszeitRapportId($arbeitszeitId, $rapportId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateArbeitszeitRapportId(:arbeitszeitId, :rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':arbeitszeitId', $arbeitszeitId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

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
     * Updates Arbeitszeit item  field
     *  @param $arbeitszeitId int The entity  arbeitszeitId field  
     *  @param $bereich string The entity  bereich field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateArbeitszeitBereich($arbeitszeitId, $bereich) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateArbeitszeitBereich(:arbeitszeitId, :bereich);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':arbeitszeitId', $arbeitszeitId, PDO::PARAM_INT);
                $statement->bindParam(':bereich', $bereich, PDO::PARAM_STR);

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
     * Updates Arbeitszeit item  field
     *  @param $arbeitszeitId int The entity  arbeitszeitId field  
     *  @param $mitarbeiterName string The entity  mitarbeiterName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateArbeitszeitMitarbeiterName($arbeitszeitId, $mitarbeiterName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateArbeitszeitMitarbeiterName(:arbeitszeitId, :mitarbeiterName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':arbeitszeitId', $arbeitszeitId, PDO::PARAM_INT);
                $statement->bindParam(':mitarbeiterName', $mitarbeiterName, PDO::PARAM_STR);

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
     * Updates Arbeitszeit item  field
     *  @param $arbeitszeitId int The entity  arbeitszeitId field  
     *  @param $gruppe string The entity  gruppe field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateArbeitszeitGruppe($arbeitszeitId, $gruppe) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateArbeitszeitGruppe(:arbeitszeitId, :gruppe);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':arbeitszeitId', $arbeitszeitId, PDO::PARAM_INT);
                $statement->bindParam(':gruppe', $gruppe, PDO::PARAM_STR);

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
     * Updates Arbeitszeit item  field
     *  @param $arbeitszeitId int The entity  arbeitszeitId field  
     *  @param $zeit string The entity  zeit field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateArbeitszeitZeit($arbeitszeitId, $zeit) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateArbeitszeitZeit(:arbeitszeitId, :zeit);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':arbeitszeitId', $arbeitszeitId, PDO::PARAM_INT);
                $statement->bindParam(':zeit', $zeit, PDO::PARAM_STR);

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
     * Updates Arbeitszeit item  field
     *  @param $arbeitszeitId int The entity  arbeitszeitId field  
     *  @param $datum string The entity  datum field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateArbeitszeitDatum($arbeitszeitId, $datum) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateArbeitszeitDatum(:arbeitszeitId, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':arbeitszeitId', $arbeitszeitId, PDO::PARAM_INT);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates AufMasse item
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $masse string The entity  masse field  
     *  @param $aufsprache string The entity  aufsprache field  
     *  @param $freierText string The entity  freierText field  
     *  @param $bemerkung string The entity  bemerkung field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasse($aufmasseId, $rapportId, $masse, $aufsprache, $freierText, $bemerkung, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasse(:aufmasseId, :rapportId, :masse, :aufsprache, :freierText, :bemerkung, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':masse', $masse, PDO::PARAM_STR);
                $statement->bindParam(':aufsprache', $aufsprache, PDO::PARAM_STR);
                $statement->bindParam(':freierText', $freierText, PDO::PARAM_STR);
                $statement->bindParam(':bemerkung', $bemerkung, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates AufMasse item
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $masse string The entity  masse field  
     *  @param $aufsprache string The entity  aufsprache field  
     *  @param $freierText string The entity  freierText field  
     *  @param $bemerkung string The entity  bemerkung field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseDetails($aufmasseId, $rapportId, $masse, $aufsprache, $freierText, $bemerkung, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasse(:aufmasseId, :rapportId, :masse, :aufsprache, :freierText, :bemerkung, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':masse', $masse, PDO::PARAM_STR);
                $statement->bindParam(':aufsprache', $aufsprache, PDO::PARAM_STR);
                $statement->bindParam(':freierText', $freierText, PDO::PARAM_STR);
                $statement->bindParam(':bemerkung', $bemerkung, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates AufMasse item  field
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $rapportId int The entity  rapportId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseRapportId($aufmasseId, $rapportId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseRapportId(:aufmasseId, :rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

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
     * Updates AufMasse item  field
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $masse string The entity  masse field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseMasse($aufmasseId, $masse) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseMasse(:aufmasseId, :masse);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_INT);
                $statement->bindParam(':masse', $masse, PDO::PARAM_STR);

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
     * Updates AufMasse item  field
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $aufsprache string The entity  aufsprache field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseAufsprache($aufmasseId, $aufsprache) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseAufsprache(:aufmasseId, :aufsprache);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_INT);
                $statement->bindParam(':aufsprache', $aufsprache, PDO::PARAM_STR);

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
     * Updates AufMasse item  field
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $freierText string The entity  freierText field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseFreierText($aufmasseId, $freierText) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseFreierText(:aufmasseId, :freierText);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_INT);
                $statement->bindParam(':freierText', $freierText, PDO::PARAM_STR);

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
     * Updates AufMasse item  field
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $bemerkung string The entity  bemerkung field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseBemerkung($aufmasseId, $bemerkung) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseBemerkung(:aufmasseId, :bemerkung);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_INT);
                $statement->bindParam(':bemerkung', $bemerkung, PDO::PARAM_STR);

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
     * Updates AufMasse item  field
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $datum string The entity  datum field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseDatum($aufmasseId, $datum) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseDatum(:aufmasseId, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_INT);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates AufMasseBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseBild($bildId, $aufmasseId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseBild(:bildId, :aufmasseId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates AufMasseBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseBildDetails($bildId, $aufmasseId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseBild(:bildId, :aufmasseId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates AufMasseBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $aufmasseId int The entity  aufmasseId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseBildAufmasseId($bildId, $aufmasseId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseBildAufmasseId(:bildId, :aufmasseId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);

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
     * Updates AufMasseBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseBildDateiName($bildId, $dateiName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseBildDateiName(:bildId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates AufMasseSkizze item
     *  @param $skizzeId int The entity  skizzeId field  
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseSkizze($skizzeId, $aufmasseId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseSkizze(:skizzeId, :aufmasseId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_INT);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates AufMasseSkizze item
     *  @param $skizzeId int The entity  skizzeId field  
     *  @param $aufmasseId int The entity  aufmasseId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseSkizzeDetails($skizzeId, $aufmasseId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseSkizze(:skizzeId, :aufmasseId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_INT);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates AufMasseSkizze item  field
     *  @param $skizzeId int The entity  skizzeId field  
     *  @param $aufmasseId int The entity  aufmasseId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseSkizzeAufmasseId($skizzeId, $aufmasseId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseSkizzeAufmasseId(:skizzeId, :aufmasseId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_INT);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);

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
     * Updates AufMasseSkizze item  field
     *  @param $skizzeId int The entity  skizzeId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAufMasseSkizzeDateiName($skizzeId, $dateiName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAufMasseSkizzeDateiName(:skizzeId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_INT);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates Customer item
     *  @param $customerId int The entity  customerId field  
     *  @param $name string The entity  name field  
     *  @param $lastName string The entity  lastName field  
     *  @param $email string The entity  email field  
     *  @param $phoneNumber string The entity  phoneNumber field  
     *  @param $zipCode string The entity  zipCode field  
     *  @param $city string The entity  city field  
     *  @param $street string The entity  street field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateCustomer($customerId, $name, $lastName, $email, $phoneNumber, $zipCode, $city, $street) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateCustomer(:customerId, :name, :lastName, :email, :phoneNumber, :zipCode, :city, :street);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);
                $statement->bindParam(':name', $name, PDO::PARAM_STR);
                $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
                $statement->bindParam(':zipCode', $zipCode, PDO::PARAM_STR);
                $statement->bindParam(':city', $city, PDO::PARAM_STR);
                $statement->bindParam(':street', $street, PDO::PARAM_STR);

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
     * Updates Customer item
     *  @param $customerId int The entity  customerId field  
     *  @param $name string The entity  name field  
     *  @param $lastName string The entity  lastName field  
     *  @param $email string The entity  email field  
     *  @param $phoneNumber string The entity  phoneNumber field  
     *  @param $zipCode string The entity  zipCode field  
     *  @param $city string The entity  city field  
     *  @param $street string The entity  street field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateCustomerDetails($customerId, $name, $lastName, $email, $phoneNumber, $zipCode, $city, $street) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateCustomer(:customerId, :name, :lastName, :email, :phoneNumber, :zipCode, :city, :street);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);
                $statement->bindParam(':name', $name, PDO::PARAM_STR);
                $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
                $statement->bindParam(':zipCode', $zipCode, PDO::PARAM_STR);
                $statement->bindParam(':city', $city, PDO::PARAM_STR);
                $statement->bindParam(':street', $street, PDO::PARAM_STR);

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
     * Updates Customer item  field
     *  @param $customerId int The entity  customerId field  
     *  @param $name string The entity  name field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateCustomerName($customerId, $name) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateCustomerName(:customerId, :name);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);
                $statement->bindParam(':name', $name, PDO::PARAM_STR);

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
     * Updates Customer item  field
     *  @param $customerId int The entity  customerId field  
     *  @param $lastName string The entity  lastName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateCustomerLastName($customerId, $lastName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateCustomerLastName(:customerId, :lastName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);
                $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);

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
     * Updates Customer item  field
     *  @param $customerId int The entity  customerId field  
     *  @param $email string The entity  email field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateCustomerEmail($customerId, $email) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateCustomerEmail(:customerId, :email);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);

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
     * Updates Customer item  field
     *  @param $customerId int The entity  customerId field  
     *  @param $phoneNumber string The entity  phoneNumber field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateCustomerPhoneNumber($customerId, $phoneNumber) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateCustomerPhoneNumber(:customerId, :phoneNumber);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);
                $statement->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);

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
     * Updates Customer item  field
     *  @param $customerId int The entity  customerId field  
     *  @param $zipCode string The entity  zipCode field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateCustomerZipCode($customerId, $zipCode) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateCustomerZipCode(:customerId, :zipCode);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);
                $statement->bindParam(':zipCode', $zipCode, PDO::PARAM_STR);

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
     * Updates Customer item  field
     *  @param $customerId int The entity  customerId field  
     *  @param $city string The entity  city field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateCustomerCity($customerId, $city) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateCustomerCity(:customerId, :city);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);
                $statement->bindParam(':city', $city, PDO::PARAM_STR);

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
     * Updates Customer item  field
     *  @param $customerId int The entity  customerId field  
     *  @param $street string The entity  street field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateCustomerStreet($customerId, $street) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateCustomerStreet(:customerId, :street);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);
                $statement->bindParam(':street', $street, PDO::PARAM_STR);

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
     * Updates Erfassung item
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $bericht string The entity  bericht field  
     *  @param $material string The entity  material field  
     *  @param $maschineAufwand string The entity  maschineAufwand field  
     *  @param $kilometer string The entity  kilometer field  
     *  @param $unterschriftKundeDatei string The entity  unterschriftKundeDatei field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassung($erfassungId, $rapportId, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassung(:erfassungId, :rapportId, :bericht, :material, :maschineAufwand, :kilometer, :unterschriftKundeDatei, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);
                $statement->bindParam(':material', $material, PDO::PARAM_STR);
                $statement->bindParam(':maschineAufwand', $maschineAufwand, PDO::PARAM_STR);
                $statement->bindParam(':kilometer', $kilometer, PDO::PARAM_STR);
                $statement->bindParam(':unterschriftKundeDatei', $unterschriftKundeDatei, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Erfassung item
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $bericht string The entity  bericht field  
     *  @param $material string The entity  material field  
     *  @param $maschineAufwand string The entity  maschineAufwand field  
     *  @param $kilometer string The entity  kilometer field  
     *  @param $unterschriftKundeDatei string The entity  unterschriftKundeDatei field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungDetails($erfassungId, $rapportId, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassung(:erfassungId, :rapportId, :bericht, :material, :maschineAufwand, :kilometer, :unterschriftKundeDatei, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);
                $statement->bindParam(':material', $material, PDO::PARAM_STR);
                $statement->bindParam(':maschineAufwand', $maschineAufwand, PDO::PARAM_STR);
                $statement->bindParam(':kilometer', $kilometer, PDO::PARAM_STR);
                $statement->bindParam(':unterschriftKundeDatei', $unterschriftKundeDatei, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Erfassung item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $rapportId int The entity  rapportId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungRapportId($erfassungId, $rapportId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungRapportId(:erfassungId, :rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

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
     * Updates Erfassung item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $bericht string The entity  bericht field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungBericht($erfassungId, $bericht) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungBericht(:erfassungId, :bericht);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);

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
     * Updates Erfassung item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $material string The entity  material field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungMaterial($erfassungId, $material) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungMaterial(:erfassungId, :material);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':material', $material, PDO::PARAM_STR);

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
     * Updates Erfassung item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $maschineAufwand string The entity  maschineAufwand field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungMaschineAufwand($erfassungId, $maschineAufwand) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungMaschineAufwand(:erfassungId, :maschineAufwand);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':maschineAufwand', $maschineAufwand, PDO::PARAM_STR);

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
     * Updates Erfassung item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $kilometer string The entity  kilometer field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungKilometer($erfassungId, $kilometer) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungKilometer(:erfassungId, :kilometer);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':kilometer', $kilometer, PDO::PARAM_STR);

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
     * Updates Erfassung item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $unterschriftKundeDatei string The entity  unterschriftKundeDatei field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungUnterschriftKundeDatei($erfassungId, $unterschriftKundeDatei) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungUnterschriftKundeDatei(:erfassungId, :unterschriftKundeDatei);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':unterschriftKundeDatei', $unterschriftKundeDatei, PDO::PARAM_STR);

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
     * Updates Erfassung item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungAuftragAbgeschlossen($erfassungId, $auftragAbgeschlossen) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungAuftragAbgeschlossen(:erfassungId, :auftragAbgeschlossen);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);

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
     * Updates Erfassung item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $datum string The entity  datum field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungDatum($erfassungId, $datum) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungDatum(:erfassungId, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates ErfassungBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $bildTyp string The entity  bildTyp field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungBild($bildId, $erfassungId, $bildTyp, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungBild(:bildId, :erfassungId, :bildTyp, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates ErfassungBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $bildTyp string The entity  bildTyp field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungBildDetails($bildId, $erfassungId, $bildTyp, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungBild(:bildId, :erfassungId, :bildTyp, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates ErfassungBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $erfassungId int The entity  erfassungId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungBildErfassungId($bildId, $erfassungId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungBildErfassungId(:bildId, :erfassungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);

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
     * Updates ErfassungBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $bildTyp string The entity  bildTyp field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungBildBildTyp($bildId, $bildTyp) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungBildBildTyp(:bildId, :bildTyp);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);

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
     * Updates ErfassungBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungBildDateiName($bildId, $dateiName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungBildDateiName(:bildId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $kundenNummer string The entity  kundenNummer field  
     *  @param $bericht string The entity  bericht field  
     *  @param $material string The entity  material field  
     *  @param $maschineAufwand string The entity  maschineAufwand field  
     *  @param $kilometer string The entity  kilometer field  
     *  @param $unterschriftMitarbeiterDatei string The entity  unterschriftMitarbeiterDatei field  
     *  @param $unterschriftKundeDatei string The entity  unterschriftKundeDatei field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftrag($erfassungId, $kundenNummer, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftMitarbeiterDatei, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftrag(:erfassungId, :kundenNummer, :bericht, :material, :maschineAufwand, :kilometer, :unterschriftMitarbeiterDatei, :unterschriftKundeDatei, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':kundenNummer', $kundenNummer, PDO::PARAM_STR);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);
                $statement->bindParam(':material', $material, PDO::PARAM_STR);
                $statement->bindParam(':maschineAufwand', $maschineAufwand, PDO::PARAM_STR);
                $statement->bindParam(':kilometer', $kilometer, PDO::PARAM_STR);
                $statement->bindParam(':unterschriftMitarbeiterDatei', $unterschriftMitarbeiterDatei, PDO::PARAM_STR);
                $statement->bindParam(':unterschriftKundeDatei', $unterschriftKundeDatei, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $kundenNummer string The entity  kundenNummer field  
     *  @param $bericht string The entity  bericht field  
     *  @param $material string The entity  material field  
     *  @param $maschineAufwand string The entity  maschineAufwand field  
     *  @param $kilometer string The entity  kilometer field  
     *  @param $unterschriftMitarbeiterDatei string The entity  unterschriftMitarbeiterDatei field  
     *  @param $unterschriftKundeDatei string The entity  unterschriftKundeDatei field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragDetails($erfassungId, $kundenNummer, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftMitarbeiterDatei, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftrag(:erfassungId, :kundenNummer, :bericht, :material, :maschineAufwand, :kilometer, :unterschriftMitarbeiterDatei, :unterschriftKundeDatei, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':kundenNummer', $kundenNummer, PDO::PARAM_STR);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);
                $statement->bindParam(':material', $material, PDO::PARAM_STR);
                $statement->bindParam(':maschineAufwand', $maschineAufwand, PDO::PARAM_STR);
                $statement->bindParam(':kilometer', $kilometer, PDO::PARAM_STR);
                $statement->bindParam(':unterschriftMitarbeiterDatei', $unterschriftMitarbeiterDatei, PDO::PARAM_STR);
                $statement->bindParam(':unterschriftKundeDatei', $unterschriftKundeDatei, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $kundenNummer string The entity  kundenNummer field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragKundenNummer($erfassungId, $kundenNummer) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragKundenNummer(:erfassungId, :kundenNummer);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':kundenNummer', $kundenNummer, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $bericht string The entity  bericht field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragBericht($erfassungId, $bericht) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragBericht(:erfassungId, :bericht);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $material string The entity  material field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragMaterial($erfassungId, $material) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragMaterial(:erfassungId, :material);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':material', $material, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $maschineAufwand string The entity  maschineAufwand field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragMaschineAufwand($erfassungId, $maschineAufwand) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragMaschineAufwand(:erfassungId, :maschineAufwand);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':maschineAufwand', $maschineAufwand, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $kilometer string The entity  kilometer field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragKilometer($erfassungId, $kilometer) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragKilometer(:erfassungId, :kilometer);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':kilometer', $kilometer, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $unterschriftMitarbeiterDatei string The entity  unterschriftMitarbeiterDatei field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragUnterschriftMitarbeiterDatei($erfassungId, $unterschriftMitarbeiterDatei) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragUnterschriftMitarbeiterDatei(:erfassungId, :unterschriftMitarbeiterDatei);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':unterschriftMitarbeiterDatei', $unterschriftMitarbeiterDatei, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $unterschriftKundeDatei string The entity  unterschriftKundeDatei field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragUnterschriftKundeDatei($erfassungId, $unterschriftKundeDatei) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragUnterschriftKundeDatei(:erfassungId, :unterschriftKundeDatei);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':unterschriftKundeDatei', $unterschriftKundeDatei, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragAuftragAbgeschlossen($erfassungId, $auftragAbgeschlossen) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragAuftragAbgeschlossen(:erfassungId, :auftragAbgeschlossen);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftrag item  field
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $datum string The entity  datum field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragDatum($erfassungId, $datum) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragDatum(:erfassungId, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_INT);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftragBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $bildTyp string The entity  bildTyp field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragBild($bildId, $erfassungId, $bildTyp, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragBild(:bildId, :erfassungId, :bildTyp, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftragBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $erfassungId int The entity  erfassungId field  
     *  @param $bildTyp string The entity  bildTyp field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragBildDetails($bildId, $erfassungId, $bildTyp, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragBild(:bildId, :erfassungId, :bildTyp, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftragBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $erfassungId int The entity  erfassungId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragBildErfassungId($bildId, $erfassungId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragBildErfassungId(:bildId, :erfassungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftragBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $bildTyp string The entity  bildTyp field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragBildBildTyp($bildId, $bildTyp) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragBildBildTyp(:bildId, :bildTyp);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);

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
     * Updates ErfassungOhneAuftragBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateErfassungOhneAuftragBildDateiName($bildId, $dateiName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateErfassungOhneAuftragBildDateiName(:bildId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates Fertigung item
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $nachbearbeitung string The entity  nachbearbeitung field  
     *  @param $lackieren string The entity  lackieren field  
     *  @param $beschichten string The entity  beschichten field  
     *  @param $strahlen string The entity  strahlen field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigung($fertigungId, $rapportId, $nachbearbeitung, $lackieren, $beschichten, $strahlen, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigung(:fertigungId, :rapportId, :nachbearbeitung, :lackieren, :beschichten, :strahlen, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':nachbearbeitung', $nachbearbeitung, PDO::PARAM_STR);
                $statement->bindParam(':lackieren', $lackieren, PDO::PARAM_STR);
                $statement->bindParam(':beschichten', $beschichten, PDO::PARAM_STR);
                $statement->bindParam(':strahlen', $strahlen, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Fertigung item
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $nachbearbeitung string The entity  nachbearbeitung field  
     *  @param $lackieren string The entity  lackieren field  
     *  @param $beschichten string The entity  beschichten field  
     *  @param $strahlen string The entity  strahlen field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungDetails($fertigungId, $rapportId, $nachbearbeitung, $lackieren, $beschichten, $strahlen, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigung(:fertigungId, :rapportId, :nachbearbeitung, :lackieren, :beschichten, :strahlen, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':nachbearbeitung', $nachbearbeitung, PDO::PARAM_STR);
                $statement->bindParam(':lackieren', $lackieren, PDO::PARAM_STR);
                $statement->bindParam(':beschichten', $beschichten, PDO::PARAM_STR);
                $statement->bindParam(':strahlen', $strahlen, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Fertigung item  field
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $rapportId int The entity  rapportId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungRapportId($fertigungId, $rapportId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungRapportId(:fertigungId, :rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

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
     * Updates Fertigung item  field
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $nachbearbeitung string The entity  nachbearbeitung field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungNachbearbeitung($fertigungId, $nachbearbeitung) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungNachbearbeitung(:fertigungId, :nachbearbeitung);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_INT);
                $statement->bindParam(':nachbearbeitung', $nachbearbeitung, PDO::PARAM_STR);

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
     * Updates Fertigung item  field
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $lackieren string The entity  lackieren field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungLackieren($fertigungId, $lackieren) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungLackieren(:fertigungId, :lackieren);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_INT);
                $statement->bindParam(':lackieren', $lackieren, PDO::PARAM_STR);

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
     * Updates Fertigung item  field
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $beschichten string The entity  beschichten field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungBeschichten($fertigungId, $beschichten) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungBeschichten(:fertigungId, :beschichten);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_INT);
                $statement->bindParam(':beschichten', $beschichten, PDO::PARAM_STR);

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
     * Updates Fertigung item  field
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $strahlen string The entity  strahlen field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungStrahlen($fertigungId, $strahlen) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungStrahlen(:fertigungId, :strahlen);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_INT);
                $statement->bindParam(':strahlen', $strahlen, PDO::PARAM_STR);

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
     * Updates Fertigung item  field
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungAuftragAbgeschlossen($fertigungId, $auftragAbgeschlossen) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungAuftragAbgeschlossen(:fertigungId, :auftragAbgeschlossen);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_INT);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);

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
     * Updates Fertigung item  field
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $datum string The entity  datum field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungDatum($fertigungId, $datum) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungDatum(:fertigungId, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_INT);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates FertigungBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungBild($bildId, $fertigungId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungBild(:bildId, :fertigungId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates FertigungBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $fertigungId int The entity  fertigungId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungBildDetails($bildId, $fertigungId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungBild(:bildId, :fertigungId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates FertigungBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $fertigungId int The entity  fertigungId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungBildFertigungId($bildId, $fertigungId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungBildFertigungId(:bildId, :fertigungId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_STR);

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
     * Updates FertigungBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateFertigungBildDateiName($bildId, $dateiName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateFertigungBildDateiName(:bildId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates LogActivity item
     *  @param $activityId int The entity  activityId field  
     *  @param $userId int The entity  userId field  
     *  @param $summary string The entity  summary field  
     *  @param $date string The entity  date field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateLogActivity($activityId, $userId, $summary, $date) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateLogActivity(:activityId, :userId, :summary, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':activityId', $activityId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

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
     * Updates LogActivity item
     *  @param $activityId int The entity  activityId field  
     *  @param $userId int The entity  userId field  
     *  @param $summary string The entity  summary field  
     *  @param $date string The entity  date field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateLogActivityDetails($activityId, $userId, $summary, $date) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateLogActivity(:activityId, :userId, :summary, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':activityId', $activityId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

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
     * Updates LogActivity item  field
     *  @param $activityId int The entity  activityId field  
     *  @param $userId int The entity  userId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateLogActivityUserId($activityId, $userId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateLogActivityUserId(:activityId, :userId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':activityId', $activityId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);

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
     * Updates LogActivity item  field
     *  @param $activityId int The entity  activityId field  
     *  @param $summary string The entity  summary field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateLogActivitySummary($activityId, $summary) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateLogActivitySummary(:activityId, :summary);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':activityId', $activityId, PDO::PARAM_INT);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);

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
     * Updates LogActivity item  field
     *  @param $activityId int The entity  activityId field  
     *  @param $date string The entity  date field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateLogActivityDate($activityId, $date) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateLogActivityDate(:activityId, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':activityId', $activityId, PDO::PARAM_INT);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

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
     * Updates Montage item
     *  @param $montageId int The entity  montageId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $bericht string The entity  bericht field  
     *  @param $aufnahmeUnterschriftDatei string The entity  aufnahmeUnterschriftDatei field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontage($montageId, $rapportId, $bericht, $aufnahmeUnterschriftDatei, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontage(:montageId, :rapportId, :bericht, :aufnahmeUnterschriftDatei, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);
                $statement->bindParam(':aufnahmeUnterschriftDatei', $aufnahmeUnterschriftDatei, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Montage item
     *  @param $montageId int The entity  montageId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $bericht string The entity  bericht field  
     *  @param $aufnahmeUnterschriftDatei string The entity  aufnahmeUnterschriftDatei field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageDetails($montageId, $rapportId, $bericht, $aufnahmeUnterschriftDatei, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontage(:montageId, :rapportId, :bericht, :aufnahmeUnterschriftDatei, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);
                $statement->bindParam(':aufnahmeUnterschriftDatei', $aufnahmeUnterschriftDatei, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Montage item  field
     *  @param $montageId int The entity  montageId field  
     *  @param $rapportId int The entity  rapportId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageRapportId($montageId, $rapportId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontageRapportId(:montageId, :rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

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
     * Updates Montage item  field
     *  @param $montageId int The entity  montageId field  
     *  @param $bericht string The entity  bericht field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageBericht($montageId, $bericht) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontageBericht(:montageId, :bericht);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_INT);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);

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
     * Updates Montage item  field
     *  @param $montageId int The entity  montageId field  
     *  @param $aufnahmeUnterschriftDatei string The entity  aufnahmeUnterschriftDatei field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageAufnahmeUnterschriftDatei($montageId, $aufnahmeUnterschriftDatei) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontageAufnahmeUnterschriftDatei(:montageId, :aufnahmeUnterschriftDatei);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_INT);
                $statement->bindParam(':aufnahmeUnterschriftDatei', $aufnahmeUnterschriftDatei, PDO::PARAM_STR);

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
     * Updates Montage item  field
     *  @param $montageId int The entity  montageId field  
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageAuftragAbgeschlossen($montageId, $auftragAbgeschlossen) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontageAuftragAbgeschlossen(:montageId, :auftragAbgeschlossen);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_INT);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);

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
     * Updates Montage item  field
     *  @param $montageId int The entity  montageId field  
     *  @param $datum string The entity  datum field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageDatum($montageId, $datum) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontageDatum(:montageId, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_INT);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates MontageBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $montageId int The entity  montageId field  
     *  @param $bildTyp string The entity  bildTyp field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageBild($bildId, $montageId, $bildTyp, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontageBild(:bildId, :montageId, :bildTyp, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_STR);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates MontageBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $montageId int The entity  montageId field  
     *  @param $bildTyp string The entity  bildTyp field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageBildDetails($bildId, $montageId, $bildTyp, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontageBild(:bildId, :montageId, :bildTyp, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_STR);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates MontageBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $montageId int The entity  montageId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageBildMontageId($bildId, $montageId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontageBildMontageId(:bildId, :montageId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_STR);

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
     * Updates MontageBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $bildTyp string The entity  bildTyp field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageBildBildTyp($bildId, $bildTyp) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontageBildBildTyp(:bildId, :bildTyp);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);

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
     * Updates MontageBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateMontageBildDateiName($bildId, $dateiName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateMontageBildDateiName(:bildId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates Nachtrag item
     *  @param $nachtragId int The entity  nachtragId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $aufsprache string The entity  aufsprache field  
     *  @param $freierText string The entity  freierText field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtrag($nachtragId, $rapportId, $aufsprache, $freierText, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtrag(:nachtragId, :rapportId, :aufsprache, :freierText, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':aufsprache', $aufsprache, PDO::PARAM_STR);
                $statement->bindParam(':freierText', $freierText, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Nachtrag item
     *  @param $nachtragId int The entity  nachtragId field  
     *  @param $rapportId int The entity  rapportId field  
     *  @param $aufsprache string The entity  aufsprache field  
     *  @param $freierText string The entity  freierText field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragDetails($nachtragId, $rapportId, $aufsprache, $freierText, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtrag(:nachtragId, :rapportId, :aufsprache, :freierText, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':aufsprache', $aufsprache, PDO::PARAM_STR);
                $statement->bindParam(':freierText', $freierText, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Nachtrag item  field
     *  @param $nachtragId int The entity  nachtragId field  
     *  @param $rapportId int The entity  rapportId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragRapportId($nachtragId, $rapportId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragRapportId(:nachtragId, :rapportId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_INT);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);

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
     * Updates Nachtrag item  field
     *  @param $nachtragId int The entity  nachtragId field  
     *  @param $aufsprache string The entity  aufsprache field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragAufsprache($nachtragId, $aufsprache) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragAufsprache(:nachtragId, :aufsprache);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_INT);
                $statement->bindParam(':aufsprache', $aufsprache, PDO::PARAM_STR);

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
     * Updates Nachtrag item  field
     *  @param $nachtragId int The entity  nachtragId field  
     *  @param $freierText string The entity  freierText field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragFreierText($nachtragId, $freierText) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragFreierText(:nachtragId, :freierText);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_INT);
                $statement->bindParam(':freierText', $freierText, PDO::PARAM_STR);

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
     * Updates Nachtrag item  field
     *  @param $nachtragId int The entity  nachtragId field  
     *  @param $datum string The entity  datum field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragDatum($nachtragId, $datum) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragDatum(:nachtragId, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_INT);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates NachtragBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $nachtragId int The entity  nachtragId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragBild($bildId, $nachtragId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragBild(:bildId, :nachtragId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates NachtragBild item
     *  @param $bildId int The entity  bildId field  
     *  @param $nachtragId int The entity  nachtragId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragBildDetails($bildId, $nachtragId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragBild(:bildId, :nachtragId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates NachtragBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $nachtragId int The entity  nachtragId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragBildNachtragId($bildId, $nachtragId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragBildNachtragId(:bildId, :nachtragId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);

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
     * Updates NachtragBild item  field
     *  @param $bildId int The entity  bildId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragBildDateiName($bildId, $dateiName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragBildDateiName(:bildId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':bildId', $bildId, PDO::PARAM_INT);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates NachtragSkizze item
     *  @param $skizzeId int The entity  skizzeId field  
     *  @param $nachtragId int The entity  nachtragId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragSkizze($skizzeId, $nachtragId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragSkizze(:skizzeId, :nachtragId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_INT);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates NachtragSkizze item
     *  @param $skizzeId int The entity  skizzeId field  
     *  @param $nachtragId int The entity  nachtragId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragSkizzeDetails($skizzeId, $nachtragId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragSkizze(:skizzeId, :nachtragId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_INT);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates NachtragSkizze item  field
     *  @param $skizzeId int The entity  skizzeId field  
     *  @param $nachtragId int The entity  nachtragId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragSkizzeNachtragId($skizzeId, $nachtragId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragSkizzeNachtragId(:skizzeId, :nachtragId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_INT);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);

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
     * Updates NachtragSkizze item  field
     *  @param $skizzeId int The entity  skizzeId field  
     *  @param $dateiName string The entity  dateiName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateNachtragSkizzeDateiName($skizzeId, $dateiName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateNachtragSkizzeDateiName(:skizzeId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':skizzeId', $skizzeId, PDO::PARAM_INT);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates Order item
     *  @param $orderId int The entity  orderId field  
     *  @param $title string The entity  title field  
     *  @param $projectId int The entity  projectId field  
     *  @param $date string The entity  date field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateOrder($orderId, $title, $projectId, $date) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateOrder(:orderId, :title, :projectId, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':orderId', $orderId, PDO::PARAM_INT);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

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
     * Updates Order item
     *  @param $orderId int The entity  orderId field  
     *  @param $title string The entity  title field  
     *  @param $projectId int The entity  projectId field  
     *  @param $date string The entity  date field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateOrderDetails($orderId, $title, $projectId, $date) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateOrder(:orderId, :title, :projectId, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':orderId', $orderId, PDO::PARAM_INT);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

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
     * Updates Order item  field
     *  @param $orderId int The entity  orderId field  
     *  @param $title string The entity  title field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateOrderTitle($orderId, $title) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateOrderTitle(:orderId, :title);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':orderId', $orderId, PDO::PARAM_INT);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);

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
     * Updates Order item  field
     *  @param $orderId int The entity  orderId field  
     *  @param $projectId int The entity  projectId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateOrderProjectId($orderId, $projectId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateOrderProjectId(:orderId, :projectId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':orderId', $orderId, PDO::PARAM_INT);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_STR);

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
     * Updates Order item  field
     *  @param $orderId int The entity  orderId field  
     *  @param $date string The entity  date field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateOrderDate($orderId, $date) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateOrderDate(:orderId, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':orderId', $orderId, PDO::PARAM_INT);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

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
     * Updates Project item
     *  @param $projectId int The entity  projectId field  
     *  @param $customerId int The entity  customerId field  
     *  @param $title string The entity  title field  
     *  @param $creationDate string The entity  creationDate field  
     *  @param $status string The entity  status field  
     *  @param $hasOrder boolean The entity  hasOrder field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateProject($projectId, $customerId, $title, $creationDate, $status, $hasOrder) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateProject(:projectId, :customerId, :title, :creationDate, :status, :hasOrder);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_INT);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_STR);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':creationDate', $creationDate, PDO::PARAM_STR);
                $statement->bindParam(':status', $status, PDO::PARAM_STR);
                $statement->bindParam(':hasOrder', $hasOrder, PDO::PARAM_STR);

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
     * Updates Project item
     *  @param $projectId int The entity  projectId field  
     *  @param $customerId int The entity  customerId field  
     *  @param $title string The entity  title field  
     *  @param $creationDate string The entity  creationDate field  
     *  @param $status string The entity  status field  
     *  @param $hasOrder boolean The entity  hasOrder field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateProjectDetails($projectId, $customerId, $title, $creationDate, $status, $hasOrder) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateProject(:projectId, :customerId, :title, :creationDate, :status, :hasOrder);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_INT);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_STR);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':creationDate', $creationDate, PDO::PARAM_STR);
                $statement->bindParam(':status', $status, PDO::PARAM_STR);
                $statement->bindParam(':hasOrder', $hasOrder, PDO::PARAM_STR);

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
     * Updates Project item  field
     *  @param $projectId int The entity  projectId field  
     *  @param $customerId int The entity  customerId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateProjectCustomerId($projectId, $customerId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateProjectCustomerId(:projectId, :customerId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_INT);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_STR);

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
     * Updates Project item  field
     *  @param $projectId int The entity  projectId field  
     *  @param $title string The entity  title field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateProjectTitle($projectId, $title) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateProjectTitle(:projectId, :title);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_INT);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);

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
     * Updates Project item  field
     *  @param $projectId int The entity  projectId field  
     *  @param $creationDate string The entity  creationDate field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateProjectCreationDate($projectId, $creationDate) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateProjectCreationDate(:projectId, :creationDate);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_INT);
                $statement->bindParam(':creationDate', $creationDate, PDO::PARAM_STR);

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
     * Updates Project item  field
     *  @param $projectId int The entity  projectId field  
     *  @param $status string The entity  status field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateProjectStatus($projectId, $status) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateProjectStatus(:projectId, :status);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_INT);
                $statement->bindParam(':status', $status, PDO::PARAM_STR);

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
     * Updates Project item  field
     *  @param $projectId int The entity  projectId field  
     *  @param $hasOrder boolean The entity  hasOrder field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateProjectHasOrder($projectId, $hasOrder) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateProjectHasOrder(:projectId, :hasOrder);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_INT);
                $statement->bindParam(':hasOrder', $hasOrder, PDO::PARAM_STR);

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
     * Updates Rapport item
     *  @param $rapportId int The entity  rapportId field  
     *  @param $userId int The entity  userId field  
     *  @param $auftragNummer string The entity  auftragNummer field  
     *  @param $bezeichnung string The entity  bezeichnung field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateRapport($rapportId, $userId, $auftragNummer, $bezeichnung, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateRapport(:rapportId, :userId, :auftragNummer, :bezeichnung, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':auftragNummer', $auftragNummer, PDO::PARAM_STR);
                $statement->bindParam(':bezeichnung', $bezeichnung, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Rapport item
     *  @param $rapportId int The entity  rapportId field  
     *  @param $userId int The entity  userId field  
     *  @param $auftragNummer string The entity  auftragNummer field  
     *  @param $bezeichnung string The entity  bezeichnung field  
     *  @param $datum string The entity  datum field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateRapportDetails($rapportId, $userId, $auftragNummer, $bezeichnung, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateRapport(:rapportId, :userId, :auftragNummer, :bezeichnung, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':auftragNummer', $auftragNummer, PDO::PARAM_STR);
                $statement->bindParam(':bezeichnung', $bezeichnung, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Rapport item  field
     *  @param $rapportId int The entity  rapportId field  
     *  @param $userId int The entity  userId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateRapportUserId($rapportId, $userId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateRapportUserId(:rapportId, :userId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);

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
     * Updates Rapport item  field
     *  @param $rapportId int The entity  rapportId field  
     *  @param $auftragNummer string The entity  auftragNummer field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateRapportAuftragNummer($rapportId, $auftragNummer) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateRapportAuftragNummer(:rapportId, :auftragNummer);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_INT);
                $statement->bindParam(':auftragNummer', $auftragNummer, PDO::PARAM_STR);

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
     * Updates Rapport item  field
     *  @param $rapportId int The entity  rapportId field  
     *  @param $bezeichnung string The entity  bezeichnung field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateRapportBezeichnung($rapportId, $bezeichnung) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateRapportBezeichnung(:rapportId, :bezeichnung);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_INT);
                $statement->bindParam(':bezeichnung', $bezeichnung, PDO::PARAM_STR);

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
     * Updates Rapport item  field
     *  @param $rapportId int The entity  rapportId field  
     *  @param $datum string The entity  datum field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateRapportDatum($rapportId, $datum) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateRapportDatum(:rapportId, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_INT);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Task item
     *  @param $taskId int The entity  taskId field  
     *  @param $projectId int The entity  projectId field  
     *  @param $title string The entity  title field  
     *  @param $date string The entity  date field  
     *  @param $descriptionFileName string The entity  descriptionFileName field  
     *  @param $summary string The entity  summary field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTask($taskId, $projectId, $title, $date, $descriptionFileName, $summary) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTask(:taskId, :projectId, :title, :date, :descriptionFileName, :summary);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_INT);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_STR);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);
                $statement->bindParam(':descriptionFileName', $descriptionFileName, PDO::PARAM_STR);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);

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
     * Updates Task item
     *  @param $taskId int The entity  taskId field  
     *  @param $projectId int The entity  projectId field  
     *  @param $title string The entity  title field  
     *  @param $date string The entity  date field  
     *  @param $descriptionFileName string The entity  descriptionFileName field  
     *  @param $summary string The entity  summary field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskDetails($taskId, $projectId, $title, $date, $descriptionFileName, $summary) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTask(:taskId, :projectId, :title, :date, :descriptionFileName, :summary);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_INT);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_STR);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);
                $statement->bindParam(':descriptionFileName', $descriptionFileName, PDO::PARAM_STR);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);

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
     * Updates Task item  field
     *  @param $taskId int The entity  taskId field  
     *  @param $projectId int The entity  projectId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskProjectId($taskId, $projectId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskProjectId(:taskId, :projectId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_INT);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_STR);

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
     * Updates Task item  field
     *  @param $taskId int The entity  taskId field  
     *  @param $title string The entity  title field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskTitle($taskId, $title) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskTitle(:taskId, :title);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_INT);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);

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
     * Updates Task item  field
     *  @param $taskId int The entity  taskId field  
     *  @param $date string The entity  date field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskDate($taskId, $date) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskDate(:taskId, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_INT);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

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
     * Updates Task item  field
     *  @param $taskId int The entity  taskId field  
     *  @param $descriptionFileName string The entity  descriptionFileName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskDescriptionFileName($taskId, $descriptionFileName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskDescriptionFileName(:taskId, :descriptionFileName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_INT);
                $statement->bindParam(':descriptionFileName', $descriptionFileName, PDO::PARAM_STR);

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
     * Updates Task item  field
     *  @param $taskId int The entity  taskId field  
     *  @param $summary string The entity  summary field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskSummary($taskId, $summary) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskSummary(:taskId, :summary);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_INT);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);

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
     * Updates TaskLogTime item
     *  @param $taskLogTimeId int The entity  taskLogTimeId field  
     *  @param $userId int The entity  userId field  
     *  @param $taskId int The entity  taskId field  
     *  @param $title string The entity  title field  
     *  @param $startTime string The entity  startTime field  
     *  @param $endTime string The entity  endTime field  
     *  @param $summary string The entity  summary field  
     *  @param $date string The entity  date field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskLogTime($taskLogTimeId, $userId, $taskId, $title, $startTime, $endTime, $summary, $date) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskLogTime(:taskLogTimeId, :userId, :taskId, :title, :startTime, :endTime, :summary, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_STR);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':startTime', $startTime, PDO::PARAM_STR);
                $statement->bindParam(':endTime', $endTime, PDO::PARAM_STR);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

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
     * Updates TaskLogTime item
     *  @param $taskLogTimeId int The entity  taskLogTimeId field  
     *  @param $userId int The entity  userId field  
     *  @param $taskId int The entity  taskId field  
     *  @param $title string The entity  title field  
     *  @param $startTime string The entity  startTime field  
     *  @param $endTime string The entity  endTime field  
     *  @param $summary string The entity  summary field  
     *  @param $date string The entity  date field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskLogTimeDetails($taskLogTimeId, $userId, $taskId, $title, $startTime, $endTime, $summary, $date) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskLogTime(:taskLogTimeId, :userId, :taskId, :title, :startTime, :endTime, :summary, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_STR);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':startTime', $startTime, PDO::PARAM_STR);
                $statement->bindParam(':endTime', $endTime, PDO::PARAM_STR);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

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
     * Updates TaskLogTime item  field
     *  @param $taskLogTimeId int The entity  taskLogTimeId field  
     *  @param $userId int The entity  userId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskLogTimeUserId($taskLogTimeId, $userId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskLogTimeUserId(:taskLogTimeId, :userId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);

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
     * Updates TaskLogTime item  field
     *  @param $taskLogTimeId int The entity  taskLogTimeId field  
     *  @param $taskId int The entity  taskId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskLogTimeTaskId($taskLogTimeId, $taskId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskLogTimeTaskId(:taskLogTimeId, :taskId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_INT);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_STR);

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
     * Updates TaskLogTime item  field
     *  @param $taskLogTimeId int The entity  taskLogTimeId field  
     *  @param $title string The entity  title field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskLogTimeTitle($taskLogTimeId, $title) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskLogTimeTitle(:taskLogTimeId, :title);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_INT);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);

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
     * Updates TaskLogTime item  field
     *  @param $taskLogTimeId int The entity  taskLogTimeId field  
     *  @param $startTime string The entity  startTime field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskLogTimeStartTime($taskLogTimeId, $startTime) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskLogTimeStartTime(:taskLogTimeId, :startTime);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_INT);
                $statement->bindParam(':startTime', $startTime, PDO::PARAM_STR);

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
     * Updates TaskLogTime item  field
     *  @param $taskLogTimeId int The entity  taskLogTimeId field  
     *  @param $endTime string The entity  endTime field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskLogTimeEndTime($taskLogTimeId, $endTime) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskLogTimeEndTime(:taskLogTimeId, :endTime);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_INT);
                $statement->bindParam(':endTime', $endTime, PDO::PARAM_STR);

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
     * Updates TaskLogTime item  field
     *  @param $taskLogTimeId int The entity  taskLogTimeId field  
     *  @param $summary string The entity  summary field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskLogTimeSummary($taskLogTimeId, $summary) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskLogTimeSummary(:taskLogTimeId, :summary);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_INT);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);

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
     * Updates TaskLogTime item  field
     *  @param $taskLogTimeId int The entity  taskLogTimeId field  
     *  @param $date string The entity  date field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskLogTimeDate($taskLogTimeId, $date) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskLogTimeDate(:taskLogTimeId, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskLogTimeId', $taskLogTimeId, PDO::PARAM_INT);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

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
     * Updates TaskPicture item
     *  @param $taskPictureId int The entity  taskPictureId field  
     *  @param $taskId int The entity  taskId field  
     *  @param $fileName string The entity  fileName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskPicture($taskPictureId, $taskId, $fileName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskPicture(:taskPictureId, :taskId, :fileName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskPictureId', $taskPictureId, PDO::PARAM_INT);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_STR);
                $statement->bindParam(':fileName', $fileName, PDO::PARAM_STR);

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
     * Updates TaskPicture item
     *  @param $taskPictureId int The entity  taskPictureId field  
     *  @param $taskId int The entity  taskId field  
     *  @param $fileName string The entity  fileName field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskPictureDetails($taskPictureId, $taskId, $fileName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskPicture(:taskPictureId, :taskId, :fileName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskPictureId', $taskPictureId, PDO::PARAM_INT);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_STR);
                $statement->bindParam(':fileName', $fileName, PDO::PARAM_STR);

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
     * Updates TaskPicture item  field
     *  @param $taskPictureId int The entity  taskPictureId field  
     *  @param $taskId int The entity  taskId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskPictureTaskId($taskPictureId, $taskId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskPictureTaskId(:taskPictureId, :taskId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskPictureId', $taskPictureId, PDO::PARAM_INT);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_STR);

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
     * Updates TaskPicture item  field
     *  @param $taskPictureId int The entity  taskPictureId field  
     *  @param $fileName string The entity  fileName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateTaskPictureFileName($taskPictureId, $fileName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateTaskPictureFileName(:taskPictureId, :fileName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskPictureId', $taskPictureId, PDO::PARAM_INT);
                $statement->bindParam(':fileName', $fileName, PDO::PARAM_STR);

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
     * Updates User item
     *  @param $userId int The entity  userId field  
     *  @param $loginName string The entity  loginName field  
     *  @param $hashPassword string The entity  hashPassword field  
     *  @param $name string The entity  name field  
     *  @param $lastName string The entity  lastName field  
     *  @param $phoneNumber string The entity  phoneNumber field  
     *  @param $email string The entity  email field  
     *  @param $role string The entity  role field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUser($userId, $loginName, $hashPassword, $name, $lastName, $phoneNumber, $email, $role) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUser(:userId, :loginName, :hashPassword, :name, :lastName, :phoneNumber, :email, :role);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
                $statement->bindParam(':loginName', $loginName, PDO::PARAM_STR);
                $statement->bindParam(':hashPassword', $hashPassword, PDO::PARAM_STR);
                $statement->bindParam(':name', $name, PDO::PARAM_STR);
                $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
                $statement->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->bindParam(':role', $role, PDO::PARAM_STR);

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
     * Updates User item
     *  @param $userId int The entity  userId field  
     *  @param $loginName string The entity  loginName field  
     *  @param $hashPassword string The entity  hashPassword field  
     *  @param $name string The entity  name field  
     *  @param $lastName string The entity  lastName field  
     *  @param $phoneNumber string The entity  phoneNumber field  
     *  @param $email string The entity  email field  
     *  @param $role string The entity  role field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserDetails($userId, $loginName, $hashPassword, $name, $lastName, $phoneNumber, $email, $role) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUser(:userId, :loginName, :hashPassword, :name, :lastName, :phoneNumber, :email, :role);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
                $statement->bindParam(':loginName', $loginName, PDO::PARAM_STR);
                $statement->bindParam(':hashPassword', $hashPassword, PDO::PARAM_STR);
                $statement->bindParam(':name', $name, PDO::PARAM_STR);
                $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
                $statement->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->bindParam(':role', $role, PDO::PARAM_STR);

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
     * Updates User item  field
     *  @param $userId int The entity  userId field  
     *  @param $loginName string The entity  loginName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserLoginName($userId, $loginName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserLoginName(:userId, :loginName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
                $statement->bindParam(':loginName', $loginName, PDO::PARAM_STR);

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
     * Updates User item  field
     *  @param $userId int The entity  userId field  
     *  @param $hashPassword string The entity  hashPassword field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserHashPassword($userId, $hashPassword) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserHashPassword(:userId, :hashPassword);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
                $statement->bindParam(':hashPassword', $hashPassword, PDO::PARAM_STR);

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
     * Updates User item  field
     *  @param $userId int The entity  userId field  
     *  @param $name string The entity  name field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserName($userId, $name) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserName(:userId, :name);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
                $statement->bindParam(':name', $name, PDO::PARAM_STR);

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
     * Updates User item  field
     *  @param $userId int The entity  userId field  
     *  @param $lastName string The entity  lastName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserLastName($userId, $lastName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserLastName(:userId, :lastName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
                $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);

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
     * Updates User item  field
     *  @param $userId int The entity  userId field  
     *  @param $phoneNumber string The entity  phoneNumber field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserPhoneNumber($userId, $phoneNumber) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserPhoneNumber(:userId, :phoneNumber);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
                $statement->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);

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
     * Updates User item  field
     *  @param $userId int The entity  userId field  
     *  @param $email string The entity  email field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserEmail($userId, $email) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserEmail(:userId, :email);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);

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
     * Updates User item  field
     *  @param $userId int The entity  userId field  
     *  @param $role string The entity  role field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserRole($userId, $role) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserRole(:userId, :role);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
                $statement->bindParam(':role', $role, PDO::PARAM_STR);

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
     * Updates UserProfile item
     *  @param $profileId int The entity  profileId field  
     *  @param $userId int The entity  userId field  
     *  @param $gender string The entity  gender field  
     *  @param $photoFileName string The entity  photoFileName field  
     *  @param $street string The entity  street field  
     *  @param $zipCode string The entity  zipCode field  
     *  @param $city string The entity  city field  
     *  @param $address string The entity  address field  
     *  @param $defalutLanguage string The entity  defalutLanguage field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserProfile($profileId, $userId, $gender, $photoFileName, $street, $zipCode, $city, $address, $defalutLanguage) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserProfile(:profileId, :userId, :gender, :photoFileName, :street, :zipCode, :city, :address, :defalutLanguage);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
                $statement->bindParam(':photoFileName', $photoFileName, PDO::PARAM_STR);
                $statement->bindParam(':street', $street, PDO::PARAM_STR);
                $statement->bindParam(':zipCode', $zipCode, PDO::PARAM_STR);
                $statement->bindParam(':city', $city, PDO::PARAM_STR);
                $statement->bindParam(':address', $address, PDO::PARAM_STR);
                $statement->bindParam(':defalutLanguage', $defalutLanguage, PDO::PARAM_STR);

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
     * Updates UserProfile item
     *  @param $profileId int The entity  profileId field  
     *  @param $userId int The entity  userId field  
     *  @param $gender string The entity  gender field  
     *  @param $photoFileName string The entity  photoFileName field  
     *  @param $street string The entity  street field  
     *  @param $zipCode string The entity  zipCode field  
     *  @param $city string The entity  city field  
     *  @param $address string The entity  address field  
     *  @param $defalutLanguage string The entity  defalutLanguage field 
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserProfileDetails($profileId, $userId, $gender, $photoFileName, $street, $zipCode, $city, $address, $defalutLanguage) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserProfile(:profileId, :userId, :gender, :photoFileName, :street, :zipCode, :city, :address, :defalutLanguage);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
                $statement->bindParam(':photoFileName', $photoFileName, PDO::PARAM_STR);
                $statement->bindParam(':street', $street, PDO::PARAM_STR);
                $statement->bindParam(':zipCode', $zipCode, PDO::PARAM_STR);
                $statement->bindParam(':city', $city, PDO::PARAM_STR);
                $statement->bindParam(':address', $address, PDO::PARAM_STR);
                $statement->bindParam(':defalutLanguage', $defalutLanguage, PDO::PARAM_STR);

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
     * Updates UserProfile item  field
     *  @param $profileId int The entity  profileId field  
     *  @param $userId int The entity  userId field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserProfileUserId($profileId, $userId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserProfileUserId(:profileId, :userId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);

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
     * Updates UserProfile item  field
     *  @param $profileId int The entity  profileId field  
     *  @param $gender string The entity  gender field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserProfileGender($profileId, $gender) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserProfileGender(:profileId, :gender);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $statement->bindParam(':gender', $gender, PDO::PARAM_STR);

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
     * Updates UserProfile item  field
     *  @param $profileId int The entity  profileId field  
     *  @param $photoFileName string The entity  photoFileName field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserProfilePhotoFileName($profileId, $photoFileName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserProfilePhotoFileName(:profileId, :photoFileName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $statement->bindParam(':photoFileName', $photoFileName, PDO::PARAM_STR);

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
     * Updates UserProfile item  field
     *  @param $profileId int The entity  profileId field  
     *  @param $street string The entity  street field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserProfileStreet($profileId, $street) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserProfileStreet(:profileId, :street);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $statement->bindParam(':street', $street, PDO::PARAM_STR);

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
     * Updates UserProfile item  field
     *  @param $profileId int The entity  profileId field  
     *  @param $zipCode string The entity  zipCode field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserProfileZipCode($profileId, $zipCode) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserProfileZipCode(:profileId, :zipCode);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $statement->bindParam(':zipCode', $zipCode, PDO::PARAM_STR);

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
     * Updates UserProfile item  field
     *  @param $profileId int The entity  profileId field  
     *  @param $city string The entity  city field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserProfileCity($profileId, $city) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserProfileCity(:profileId, :city);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $statement->bindParam(':city', $city, PDO::PARAM_STR);

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
     * Updates UserProfile item  field
     *  @param $profileId int The entity  profileId field  
     *  @param $address string The entity  address field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserProfileAddress($profileId, $address) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserProfileAddress(:profileId, :address);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $statement->bindParam(':address', $address, PDO::PARAM_STR);

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
     * Updates UserProfile item  field
     *  @param $profileId int The entity  profileId field  
     *  @param $defalutLanguage string The entity  defalutLanguage field 
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateUserProfileDefalutLanguage($profileId, $defalutLanguage) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateUserProfileDefalutLanguage(:profileId, :defalutLanguage);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $statement->bindParam(':defalutLanguage', $defalutLanguage, PDO::PARAM_STR);

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
     * Updates Auftrag item
     *  @param $auftragId int The entity  auftragId field
     *  @param $auftragsNummer string The entity  auftragsNummer field
     *  @param $kundenNummer string The entity  kundenNummer field
     *  @param $bezeichnung string The entity  bezeichnung field
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     *  @param $datum string The entity  datum field
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAuftrag($auftragId, $auftragsNummer, $kundenNummer, $bezeichnung, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAuftrag(:auftragId, :auftragsNummer, :kundenNummer, :bezeichnung, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_INT);
                $statement->bindParam(':auftragsNummer', $auftragsNummer, PDO::PARAM_STR);
                $statement->bindParam(':kundenNummer', $kundenNummer, PDO::PARAM_STR);
                $statement->bindParam(':bezeichnung', $bezeichnung, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Auftrag item
     *  @param $auftragId int The entity  auftragId field
     *  @param $auftragsNummer string The entity  auftragsNummer field
     *  @param $kundenNummer string The entity  kundenNummer field
     *  @param $bezeichnung string The entity  bezeichnung field
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     *  @param $datum string The entity  datum field
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAuftragDetails($auftragId, $auftragsNummer, $kundenNummer, $bezeichnung, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAuftrag(:auftragId, :auftragsNummer, :kundenNummer, :bezeichnung, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_INT);
                $statement->bindParam(':auftragsNummer', $auftragsNummer, PDO::PARAM_STR);
                $statement->bindParam(':kundenNummer', $kundenNummer, PDO::PARAM_STR);
                $statement->bindParam(':bezeichnung', $bezeichnung, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Auftrag item  field
     *  @param $auftragId int The entity  auftragId field
     *  @param $auftragsNummer string The entity  auftragsNummer field
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAuftragAuftragsNummer($auftragId, $auftragsNummer) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAuftragAuftragsNummer(:auftragId, :auftragsNummer);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_INT);
                $statement->bindParam(':auftragsNummer', $auftragsNummer, PDO::PARAM_STR);

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
     * Updates Auftrag item  field
     *  @param $auftragId int The entity  auftragId field
     *  @param $kundenNummer string The entity  kundenNummer field
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAuftragKundenNummer($auftragId, $kundenNummer) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAuftragKundenNummer(:auftragId, :kundenNummer);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_INT);
                $statement->bindParam(':kundenNummer', $kundenNummer, PDO::PARAM_STR);

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
     * Updates Auftrag item  field
     *  @param $auftragId int The entity  auftragId field
     *  @param $bezeichnung string The entity  bezeichnung field
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAuftragBezeichnung($auftragId, $bezeichnung) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAuftragBezeichnung(:auftragId, :bezeichnung);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_INT);
                $statement->bindParam(':bezeichnung', $bezeichnung, PDO::PARAM_STR);

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
     * Updates Auftrag item  field
     *  @param $auftragId int The entity  auftragId field
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAuftragAuftragAbgeschlossen($auftragId, $auftragAbgeschlossen) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAuftragAuftragAbgeschlossen(:auftragId, :auftragAbgeschlossen);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_INT);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);

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
     * Updates Auftrag item  field
     *  @param $auftragId int The entity  auftragId field
     *  @param $datum string The entity  datum field
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateAuftragDatum($auftragId, $datum) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateAuftragDatum(:auftragId, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_INT);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

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
     * Updates Zeichnung item
     *  @param $zeichnungId int The entity  zeichnungId field
     *  @param $auftragId int The entity  auftragId field
     *  @param $dateiName string The entity  dateiName field
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateZeichnung($zeichnungId, $auftragId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateZeichnung(:zeichnungId, :auftragId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':zeichnungId', $zeichnungId, PDO::PARAM_INT);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates Zeichnung item
     *  @param $zeichnungId int The entity  zeichnungId field
     *  @param $auftragId int The entity  auftragId field
     *  @param $dateiName string The entity  dateiName field
     * @return mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateZeichnungDetails($zeichnungId, $auftragId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateZeichnung(:zeichnungId, :auftragId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':zeichnungId', $zeichnungId, PDO::PARAM_INT);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
     * Updates Zeichnung item  field
     *  @param $zeichnungId int The entity  zeichnungId field
     *  @param $auftragId int The entity  auftragId field
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateZeichnungAuftragId($zeichnungId, $auftragId) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateZeichnungAuftragId(:zeichnungId, :auftragId);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':zeichnungId', $zeichnungId, PDO::PARAM_INT);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_STR);

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
     * Updates Zeichnung item  field
     *  @param $zeichnungId int The entity  zeichnungId field
     *  @param $dateiName string The entity  dateiName field
     * @return  mixed TRUE if update occured successfully, otherwise FALSE
     */
    public function updateZeichnungDateiName($zeichnungId, $dateiName) {

        try {
            $pdo = $this->getDbConnection();
            $query = "CALL updateZeichnungDateiName(:zeichnungId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':zeichnungId', $zeichnungId, PDO::PARAM_INT);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

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
