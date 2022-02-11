
<?php

include_once 'DaoBase.php';

/** Auto generated Module for DAO INSERT methods
 * Author: Guy Bami
 * Created: 21.03.2020 00:42:39
 * Last update:  21.03.2020 00:42:39
 */
class DaoInsert extends DaoBase {

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
     * Inserts new Arbeitszeit  item
     *  @param $rapportId int The entity  rapportId field 
     *  @param $bereich string The entity  bereich field 
     *  @param $mitarbeiterName string The entity  mitarbeiterName field 
     *  @param $gruppe string The entity  gruppe field 
     *  @param $zeit string The entity  zeit field 
     *  @param $datum string The entity  datum field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewArbeitszeit($rapportId, $bereich, $mitarbeiterName, $gruppe, $zeit, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewArbeitszeit(:rapportId, :bereich, :mitarbeiterName, :gruppe, :zeit, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':bereich', $bereich, PDO::PARAM_STR);
                $statement->bindParam(':mitarbeiterName', $mitarbeiterName, PDO::PARAM_STR);
                $statement->bindParam(':gruppe', $gruppe, PDO::PARAM_STR);
                $statement->bindParam(':zeit', $zeit, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * AufMasse Methods
     * *********************************************************
     */

    /**
     * Inserts new AufMasse  item
     *  @param $rapportId int The entity  rapportId field 
     *  @param $masse string The entity  masse field 
     *  @param $aufsprache string The entity  aufsprache field 
     *  @param $freierText string The entity  freierText field 
     *  @param $bemerkung string The entity  bemerkung field 
     *  @param $datum string The entity  datum field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewAufMasse($rapportId, $masse, $aufsprache, $freierText, $bemerkung, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewAufMasse(:rapportId, :masse, :aufsprache, :freierText, :bemerkung, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':masse', $masse, PDO::PARAM_STR);
                $statement->bindParam(':aufsprache', $aufsprache, PDO::PARAM_STR);
                $statement->bindParam(':freierText', $freierText, PDO::PARAM_STR);
                $statement->bindParam(':bemerkung', $bemerkung, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * AufMasseBild Methods
     * *********************************************************
     */

    /**
     * Inserts new AufMasseBild  item
     *  @param $aufmasseId int The entity  aufmasseId field 
     *  @param $dateiName string The entity  dateiName field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewAufMasseBild($aufmasseId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewAufMasseBild(:aufmasseId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * AufMasseSkizze Methods
     * *********************************************************
     */

    /**
     * Inserts new AufMasseSkizze  item
     *  @param $aufmasseId int The entity  aufmasseId field 
     *  @param $dateiName string The entity  dateiName field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewAufMasseSkizze($aufmasseId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewAufMasseSkizze(:aufmasseId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':aufmasseId', $aufmasseId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * Customer Methods
     * *********************************************************
     */

    /**
     * Inserts new Customer  item
     *  @param $name string The entity  name field 
     *  @param $lastName string The entity  lastName field 
     *  @param $email string The entity  email field 
     *  @param $phoneNumber string The entity  phoneNumber field 
     *  @param $zipCode string The entity  zipCode field 
     *  @param $city string The entity  city field 
     *  @param $street string The entity  street field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewCustomer($name, $lastName, $email, $phoneNumber, $zipCode, $city, $street) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewCustomer(:name, :lastName, :email, :phoneNumber, :zipCode, :city, :street);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':name', $name, PDO::PARAM_STR);
                $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
                $statement->bindParam(':zipCode', $zipCode, PDO::PARAM_STR);
                $statement->bindParam(':city', $city, PDO::PARAM_STR);
                $statement->bindParam(':street', $street, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * Erfassung Methods
     * *********************************************************
     */

    /**
     * Inserts new Erfassung  item
     *  @param $rapportId int The entity  rapportId field 
     *  @param $bericht string The entity  bericht field 
     *  @param $material string The entity  material field 
     *  @param $maschineAufwand string The entity  maschineAufwand field 
     *  @param $kilometer string The entity  kilometer field 
     *  @param $unterschriftKundeDatei string The entity  unterschriftKundeDatei field 
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     *  @param $datum string The entity  datum field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewErfassung($rapportId, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewErfassung(:rapportId, :bericht, :material, :maschineAufwand, :kilometer, :unterschriftKundeDatei, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);
                $statement->bindParam(':material', $material, PDO::PARAM_STR);
                $statement->bindParam(':maschineAufwand', $maschineAufwand, PDO::PARAM_STR);
                $statement->bindParam(':kilometer', $kilometer, PDO::PARAM_STR);
                $statement->bindParam(':unterschriftKundeDatei', $unterschriftKundeDatei, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }
    /**
     * ********************************************************
     * ErfassungBild Methods
     * *********************************************************
     */

    /**
     * Inserts new ErfassungBild  item
     *  @param $erfassungId int The entity  erfassungId field 
     *  @param $bildTyp string The entity  bildTyp field 
     *  @param $dateiName string The entity  dateiName field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewErfassungBild($erfassungId, $bildTyp, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewErfassungBild(:erfassungId, :bildTyp, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * ErfassungOhneAuftrag Methods
     * *********************************************************
     */

    /**
     * Inserts new ErfassungOhneAuftrag  item
     *  @param $kundenNummer string The entity  kundenNummer field 
     *  @param $bericht string The entity  bericht field 
     *  @param $material string The entity  material field 
     *  @param $maschineAufwand string The entity  maschineAufwand field 
     *  @param $kilometer string The entity  kilometer field 
     *  @param $unterschriftMitarbeiterDatei string The entity  unterschriftMitarbeiterDatei field 
     *  @param $unterschriftKundeDatei string The entity  unterschriftKundeDatei field 
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     *  @param $datum string The entity  datum field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewErfassungOhneAuftrag($kundenNummer, $bericht, $material, $maschineAufwand, $kilometer, $unterschriftMitarbeiterDatei, $unterschriftKundeDatei, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewErfassungOhneAuftrag(:kundenNummer, :bericht, :material, :maschineAufwand, :kilometer, :unterschriftMitarbeiterDatei, :unterschriftKundeDatei, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
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
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * ErfassungOhneAuftragBild Methods
     * *********************************************************
     */

    /**
     * Inserts new ErfassungOhneAuftragBild  item
     *  @param $erfassungId int The entity  erfassungId field 
     *  @param $bildTyp string The entity  bildTyp field 
     *  @param $dateiName string The entity  dateiName field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewErfassungOhneAuftragBild($erfassungId, $bildTyp, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewErfassungOhneAuftragBild(:erfassungId, :bildTyp, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':erfassungId', $erfassungId, PDO::PARAM_STR);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * Fertigung Methods
     * *********************************************************
     */

    /**
     * Inserts new Fertigung  item
     *  @param $rapportId int The entity  rapportId field 
     *  @param $nachbearbeitung string The entity  nachbearbeitung field 
     *  @param $lackieren string The entity  lackieren field 
     *  @param $beschichten string The entity  beschichten field 
     *  @param $strahlen string The entity  strahlen field 
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     *  @param $datum string The entity  datum field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewFertigung($rapportId, $nachbearbeitung, $lackieren, $beschichten, $strahlen, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewFertigung(:rapportId, :nachbearbeitung, :lackieren, :beschichten, :strahlen, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':nachbearbeitung', $nachbearbeitung, PDO::PARAM_STR);
                $statement->bindParam(':lackieren', $lackieren, PDO::PARAM_STR);
                $statement->bindParam(':beschichten', $beschichten, PDO::PARAM_STR);
                $statement->bindParam(':strahlen', $strahlen, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * FertigungBild Methods
     * *********************************************************
     */

    /**
     * Inserts new FertigungBild  item
     *  @param $fertigungId int The entity  fertigungId field 
     *  @param $dateiName string The entity  dateiName field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewFertigungBild($fertigungId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewFertigungBild(:fertigungId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':fertigungId', $fertigungId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * LogActivity Methods
     * *********************************************************
     */

    /**
     * Inserts new LogActivity  item
     *  @param $userId int The entity  userId field 
     *  @param $summary string The entity  summary field 
     *  @param $date string The entity  date field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewLogActivity($userId, $summary, $date) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewLogActivity(:userId, :summary, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * Montage Methods
     * *********************************************************
     */

    /**
     * Inserts new Montage  item
     *  @param $rapportId int The entity  rapportId field 
     *  @param $bericht string The entity  bericht field 
     *  @param $aufnahmeUnterschriftDatei string The entity  aufnahmeUnterschriftDatei field 
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field 
     *  @param $datum string The entity  datum field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewMontage($rapportId, $bericht, $aufnahmeUnterschriftDatei, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewMontage(:rapportId, :bericht, :aufnahmeUnterschriftDatei, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':bericht', $bericht, PDO::PARAM_STR);
                $statement->bindParam(':aufnahmeUnterschriftDatei', $aufnahmeUnterschriftDatei, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * MontageBild Methods
     * *********************************************************
     */

    /**
     * Inserts new MontageBild  item
     *  @param $montageId int The entity  montageId field 
     *  @param $bildTyp string The entity  bildTyp field 
     *  @param $dateiName string The entity  dateiName field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewMontageBild($montageId, $bildTyp, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewMontageBild(:montageId, :bildTyp, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':montageId', $montageId, PDO::PARAM_STR);
                $statement->bindParam(':bildTyp', $bildTyp, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * Nachtrag Methods
     * *********************************************************
     */

    /**
     * Inserts new Nachtrag  item
     *  @param $rapportId int The entity  rapportId field 
     *  @param $aufsprache string The entity  aufsprache field 
     *  @param $freierText string The entity  freierText field 
     *  @param $datum string The entity  datum field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewNachtrag($rapportId, $aufsprache, $freierText, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewNachtrag(:rapportId, :aufsprache, :freierText, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':rapportId', $rapportId, PDO::PARAM_STR);
                $statement->bindParam(':aufsprache', $aufsprache, PDO::PARAM_STR);
                $statement->bindParam(':freierText', $freierText, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * NachtragBild Methods
     * *********************************************************
     */

    /**
     * Inserts new NachtragBild  item
     *  @param $nachtragId int The entity  nachtragId field 
     *  @param $dateiName string The entity  dateiName field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewNachtragBild($nachtragId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewNachtragBild(:nachtragId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * NachtragSkizze Methods
     * *********************************************************
     */

    /**
     * Inserts new NachtragSkizze  item
     *  @param $nachtragId int The entity  nachtragId field 
     *  @param $dateiName string The entity  dateiName field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewNachtragSkizze($nachtragId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewNachtragSkizze(:nachtragId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':nachtragId', $nachtragId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * Order Methods
     * *********************************************************
     */

    /**
     * Inserts new Order  item
     *  @param $title string The entity  title field 
     *  @param $projectId int The entity  projectId field 
     *  @param $date string The entity  date field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewOrder($title, $projectId, $date) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewOrder(:title, :projectId, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * Project Methods
     * *********************************************************
     */

    /**
     * Inserts new Project  item
     *  @param $customerId int The entity  customerId field 
     *  @param $title string The entity  title field 
     *  @param $creationDate string The entity  creationDate field 
     *  @param $status string The entity  status field 
     *  @param $hasOrder boolean The entity  hasOrder field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewProject($customerId, $title, $creationDate, $status, $hasOrder) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewProject(:customerId, :title, :creationDate, :status, :hasOrder);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':customerId', $customerId, PDO::PARAM_STR);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':creationDate', $creationDate, PDO::PARAM_STR);
                $statement->bindParam(':status', $status, PDO::PARAM_STR);
                $statement->bindParam(':hasOrder', $hasOrder, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * Rapport Methods
     * *********************************************************
     */

    /**
     * Inserts new Rapport  item
     *  @param $userId int The entity  userId field 
     *  @param $auftragNummer string The entity  auftragNummer field 
     *  @param $bezeichnung string The entity  bezeichnung field 
     *  @param $datum string The entity  datum field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewRapport($userId, $auftragNummer, $bezeichnung, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewRapport(:userId, :auftragNummer, :bezeichnung, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':auftragNummer', $auftragNummer, PDO::PARAM_STR);
                $statement->bindParam(':bezeichnung', $bezeichnung, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * Task Methods
     * *********************************************************
     */

    /**
     * Inserts new Task  item
     *  @param $projectId int The entity  projectId field 
     *  @param $title string The entity  title field 
     *  @param $date string The entity  date field 
     *  @param $descriptionFileName string The entity  descriptionFileName field 
     *  @param $summary string The entity  summary field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewTask($projectId, $title, $date, $descriptionFileName, $summary) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewTask(:projectId, :title, :date, :descriptionFileName, :summary);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':projectId', $projectId, PDO::PARAM_STR);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);
                $statement->bindParam(':descriptionFileName', $descriptionFileName, PDO::PARAM_STR);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * TaskLogTime Methods
     * *********************************************************
     */

    /**
     * Inserts new TaskLogTime  item
     *  @param $userId int The entity  userId field 
     *  @param $taskId int The entity  taskId field 
     *  @param $title string The entity  title field 
     *  @param $startTime string The entity  startTime field 
     *  @param $endTime string The entity  endTime field 
     *  @param $summary string The entity  summary field 
     *  @param $date string The entity  date field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewTaskLogTime($userId, $taskId, $title, $startTime, $endTime, $summary, $date) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewTaskLogTime(:userId, :taskId, :title, :startTime, :endTime, :summary, :date);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_STR);
                $statement->bindParam(':title', $title, PDO::PARAM_STR);
                $statement->bindParam(':startTime', $startTime, PDO::PARAM_STR);
                $statement->bindParam(':endTime', $endTime, PDO::PARAM_STR);
                $statement->bindParam(':summary', $summary, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * TaskPicture Methods
     * *********************************************************
     */

    /**
     * Inserts new TaskPicture  item
     *  @param $taskId int The entity  taskId field 
     *  @param $fileName string The entity  fileName field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewTaskPicture($taskId, $fileName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewTaskPicture(:taskId, :fileName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':taskId', $taskId, PDO::PARAM_STR);
                $statement->bindParam(':fileName', $fileName, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * User Methods
     * *********************************************************
     */

    /**
     * Inserts new User  item
     *  @param $loginName string The entity  loginName field 
     *  @param $hashPassword string The entity  hashPassword field 
     *  @param $name string The entity  name field 
     *  @param $lastName string The entity  lastName field 
     *  @param $phoneNumber string The entity  phoneNumber field 
     *  @param $email string The entity  email field 
     *  @param $role string The entity  role field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewUser($loginName, $hashPassword, $name, $lastName, $phoneNumber, $email, $role) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewUser(:loginName, :hashPassword, :name, :lastName, :phoneNumber, :email, :role);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':loginName', $loginName, PDO::PARAM_STR);
                $statement->bindParam(':hashPassword', $hashPassword, PDO::PARAM_STR);
                $statement->bindParam(':name', $name, PDO::PARAM_STR);
                $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
                $statement->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->bindParam(':role', $role, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }

    /**
     * ********************************************************
     * UserProfile Methods
     * *********************************************************
     */

    /**
     * Inserts new UserProfile  item
     *  @param $userId int The entity  userId field 
     *  @param $gender string The entity  gender field 
     *  @param $photoFileName string The entity  photoFileName field 
     *  @param $street string The entity  street field 
     *  @param $zipCode string The entity  zipCode field 
     *  @param $city string The entity  city field 
     *  @param $address string The entity  address field 
     *  @param $defalutLanguage string The entity  defalutLanguage field 
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewUserProfile($userId, $gender, $photoFileName, $street, $zipCode, $city, $address, $defalutLanguage) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewUserProfile(:userId, :gender, :photoFileName, :street, :zipCode, :city, :address, :defalutLanguage);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
                $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
                $statement->bindParam(':photoFileName', $photoFileName, PDO::PARAM_STR);
                $statement->bindParam(':street', $street, PDO::PARAM_STR);
                $statement->bindParam(':zipCode', $zipCode, PDO::PARAM_STR);
                $statement->bindParam(':city', $city, PDO::PARAM_STR);
                $statement->bindParam(':address', $address, PDO::PARAM_STR);
                $statement->bindParam(':defalutLanguage', $defalutLanguage, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $result = $statement->fetchAll();
                    if (is_array($result[0])) {
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            } else {
                return $pdo;
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }


    /**
     *********************************************************
     *Auftrag Methods
     **********************************************************
     */
    /**
     * Inserts new Auftrag  item
     *  @param $auftragsNummer string The entity  auftragsNummer field
     *  @param $kundenNummer string The entity  kundenNummer field
     *  @param $bezeichnung string The entity  bezeichnung field
     *  @param $auftragAbgeschlossen string The entity  auftragAbgeschlossen field
     *  @param $datum string The entity  datum field
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewAuftrag($auftragsNummer, $kundenNummer, $bezeichnung, $auftragAbgeschlossen, $datum) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewAuftrag(:auftragsNummer, :kundenNummer, :bezeichnung, :auftragAbgeschlossen, :datum);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragsNummer', $auftragsNummer, PDO::PARAM_STR);
                $statement->bindParam(':kundenNummer', $kundenNummer, PDO::PARAM_STR);
                $statement->bindParam(':bezeichnung', $bezeichnung, PDO::PARAM_STR);
                $statement->bindParam(':auftragAbgeschlossen', $auftragAbgeschlossen, PDO::PARAM_STR);
                $statement->bindParam(':datum', $datum, PDO::PARAM_STR);

                if ($statement->execute()){
                    $result = $statement->fetchAll();
                    if(is_array($result[0])){
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    }
                    else{
                        return FALSE;
                    }
                }
                else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            }
            else{
                return $pdo;
            }
        }
        catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }




    /**
     *********************************************************
     *Zeichnung Methods
     **********************************************************
     */
    /**
     * Inserts new Zeichnung  item
     *  @param $auftragId int The entity  auftragId field
     *  @param $dateiName string The entity  dateiName field
     * @return int|mixed The last inserted record ID if successfull, otherwise FALSE
     */
    public function insertNewZeichnung($auftragId, $dateiName) {
        try {
            $pdo = $this->getDbConnection();
            $query = "CALL insertNewZeichnung(:auftragId, :dateiName);";
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                $statement->bindParam(':auftragId', $auftragId, PDO::PARAM_STR);
                $statement->bindParam(':dateiName', $dateiName, PDO::PARAM_STR);

                if ($statement->execute()){
                    $result = $statement->fetchAll();
                    if(is_array($result[0])){
                        return intval($result[0]["LAST_INSERT_ID()"]);
                    }
                    else{
                        return FALSE;
                    }
                }
                else {
                    $this->logSqlError($query, $statement);
                    return FALSE;
                }
            }
            else{
                return $pdo;
            }
        }
        catch (PDOException $e) {
            return $this->logSqlException($e);
        }
    }






}
