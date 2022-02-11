<?php

/*
 * DML Database Base Class for DAO and CRUD operations
 * Author: Guy Bami
 * Last update: 04.01.15
 */

class DaoBase {

    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbUserPassword = "";
    private $dbName = "";
    private $daoBase = null;
    private $sqlInitialized = false;
    private $pdo = NULL;
    private $sqlProviderType = "";

    //The constructor
    public function __construct($dbHost = "localhost", $dbUser = "root", $dbPassword = "", $dbName = "") {
        $this->dbHost = $dbHost;
        $this->dbUser = $dbUser;
        $this->dbUserPassword = $dbPassword;
        $this->dbName = $dbName;
        $this->pdo = NULL;
        $this->sqlProviderType = "mySQL"; // default provider
    }


    public function initDatabaseSettings() {
        $configFileName = "config.ini";
        $scriptNames = preg_split('[/]', $_SERVER['SCRIPT_NAME']);
        //print_r($scriptNames);
        if (count($scriptNames) == 5) {
            //level = 3, for Presentation layer
            $configFileName = "../../config.ini";
        } else if (count($scriptNames) == 4) {
            // Level = 2 for Controllers classes
            $configFileName = "../config.ini";
        } else if (count($scriptNames) == 3) {
            // livel = 1. eg home page
            $configFileName = "../config.ini";
        } else if (count($scriptNames) == 2) {
            // Live server
            $configFileName = "config.ini";
        }
        $settingsArray = NULL;
        if (file_exists($configFileName)) {
            $settingsArray = parse_ini_file($configFileName, true);
        }

        if (isset($settingsArray) && count($settingsArray) > 0) {
            //print_r($settingsArray);
            $this->dbHost = $settingsArray['database_settings']['dbHost'];
            $this->dbUser = $settingsArray['database_settings']['dbUser'];
            $this->dbUserPassword = $settingsArray['database_settings']['dbUserPassword'];
            $this->dbName = $settingsArray['database_settings']['dbName'];
        }
        else{
            $this->dbHost = "localhost";
            $this->dbUser = "root";
            $this->dbUserPassword = "root4Web!";
            $this->dbName = "khev";
        }
    }


    public function getDbHost() {
        return $this->dbHost;
    }

    public function getDbUserName() {
        return $this->dbUser;
    }

    public function getDbUserHashPassword() {
        // Password must be hashed !!!
        return $this->dbUserPassword;
    }

    public function getDbName() {
        return $this->dbName;
    }

    public function setDbName($dbName) {
        $this->dbName = $dbName;
    }

    public function setSqlProviderType($sqlProviderType) {
        $this->sqlProviderType = $sqlProviderType;
    }


    public function getSqlProviderType() {
        return $this->sqlProviderType;
    }


    public function getDbConnection() {

        try {
            if($this->sqlProviderType == "mySQL"){
                return $this->getMySqlDbConnection();
            }
            else if($this->sqlProviderType == "postgreSQL"){
                return $this->getPostgreDbConnection();
            }
            else if($this->sqlProviderType == "msSQL"){
                return $this->getMsSqlDbConnection();
            }
            else{
                return $this->getMySqlDbConnection();
            }

        } catch (PDOException $e) {
            $this->logSqlException($e);
            return "PDOException occured: " . $e->getMessage();
        } catch (Exception $ex) {
            $this->logSqlException($ex);
            return "Exception occured: " . $e->getMessage();
        }

    }


    public function getMySqlDbConnection() {
        $this->daoBase = new DaoBase();
        $this->daoBase->initDatabaseSettings();
        $dsn = "mysql:dbname=" . $this->daoBase->dbName . ";host=" . $this->daoBase->dbHost;
        try {
            //Important!! we MUST set UTF-8 character to display all characters from the tables
            $pdo = new PDO($dsn, $this->daoBase->dbUser, $this->daoBase->dbUserPassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // or we can do $pdo->db->exec("SET NAMES 'utf8';");
            // very import. Used the handle exceptions
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            //$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
            return $pdo;
        } catch (PDOException $e) {
            $this->logSqlException($e);
            return "PDOException occured: " . $e->getMessage();
        } catch (Exception $ex) {
            $this->logSqlException($ex);
            return "Exception occured: " . $e->getMessage();
        }

    }


    public function getMsSqlDbConnection(){
        $this->daoBase = new DaoBase();
        $this->daoBase->initDatabaseSettings();
        $dsn = "sqlsrv:server=" . $this->daoBase->dbHost . ";Database=" . $this->daoBase->dbName;

        echo " <br />DNS: $dsn";
        // log
        /*

        echo " <br />USER:" . $this->daoBase->dbUser;
        echo " <br />PWD: " . $this->daoBase->dbUserPassword;
        */

        try {
            //Important!! we MUST set UTF-8 character to display all characters from the tables
            $pdo = new PDO($dsn, $this->daoBase->dbUser, $this->daoBase->dbUserPassword);
            return $pdo;
        }
        catch (PDOException $e) {
           $this->logSqlException($e);
           return "PDOException occured: " . $e->getMessage();
        }
        catch (Exception $ex) {
           $this->logSqlException($ex);
           return "Exception occured: " . $e->getMessage();
        }
        die( print_r( $e->getMessage() ) );
        return NULL;
    }

    public function getPostgreDbConnection(){
        $this->daoBase = new DaoBase();
        $this->daoBase->initDatabaseSettings();
        $dsn = "pgsql:dbname=" . $this->daoBase->dbName . ";host=" . $this->daoBase->dbHost . ";port=5432";

        // log
        /*
        echo " <br />DNS: $dsn";
        echo " <br />USER:" . $this->daoBase->dbUser;
        echo " <br />PWD: " . $this->daoBase->dbUserPassword;
        */

        try {
            //Important!! we MUST set UTF-8 character to display all characters from the tables
            $pdo = new PDO($dsn, $this->daoBase->dbUser, $this->daoBase->dbUserPassword);
            return $pdo;
        }
        catch (PDOException $e) {
           $this->logSqlException($e);
           return "PDOException occured: " . $e->getMessage();
        }
        catch (Exception $ex) {
           $this->logSqlException($ex);
           return "Exception occured: " . $e->getMessage();
        }
        return NULL;
    }

    protected function beginTransaction() {

        try {
            $pdo = $this->getDbConnection();
            if ($pdo) {
                $pdo->beginTransaction();
            }
        } catch (Exception $e) {
            echo "Unable to beginTransaction: " . $e->getMessage();
        }
    }

    protected function commitTransaction() {

        try {
            $pdo = $this->getDbConnection();
            if ($pdo) {
                $pdo->commit();
            }
        } catch (Exception $e) {
            echo "Unable to beginTransaction: " . $e->getMessage();
            $this->logSqlException($e);
        }
    }

    protected function roolBackTransaction() {
        try {
            $pdo = $this->getDbConnection();
            if ($pdo) {
                $pdo->rollBack();
            }
        } catch (Exception $e) {
            echo "Unable to beginTransaction: " . $e->getMessage();
            $this->logSqlException($e);
        }
    }

    public function runQuery($queryString) {
        if (!isset($queryString) || strlen($queryString) == 0) {
            echo "<div style='color:#00ff11;size:10px;'>The runQuery() called with invalid "
            . "or empty query...</div>";
            return FALSE;
        }
        try {
            $pdo = $this->getDbConnection();
            $query = $queryString;
            echo "<br />" . " runQuery() called with: " . $queryString . "<br />";
            if ($pdo) {

                if ($pdo->exec($query) == 0) {
                    echo "<div style='color:#00ff11;size:10px;'>The runQuery() executed successfully...</div>";
                    $this->logQueryToFile($query);
                    return true;
                } else {
                    echo "<div style='color:#ff0000;size:10px;'>An error occured in runQuery() ..."
                    . " while running query: $query </div>";
                    $this->logSqlError($query, $pdo);
                }
            }
        } catch (PDOException $e) {
            $this->logSqlException($e);
            return false;
        }
    }

    function formatSqlQuery($scriptSQL, $definer = "`root`@`localhost`") {

        // remove 2 spaces
        $scriptSQL = str_replace('CREATE  PROCEDURE', 'CREATE PROCEDURE', $scriptSQL);

        $pos = strpos($scriptSQL, ';');
        $firstPart = substr($scriptSQL, 0, $pos);
        $secondPart = substr($scriptSQL, 1 + $pos);
        $scriptSQL = $firstPart . '$$' . $secondPart;

        $search = 'CREATE PROCEDURE';
        $replace = 'CREATE DEFINER=' . $definer . ' PROCEDURE';

        $new_scriptSQL = str_replace($search, $replace, $scriptSQL);
        $formattedSql = str_replace("END;", "END$$\n\n", $new_scriptSQL);

        /*
          $search = 'CREATE PROCEDURE';
          $replace = 'DELIMITER ;;
          CREATE DEFINER='.$definer.' PROCEDURE';
          // add DEFINER
          $new_scriptSQL = str_replace($search, $replace, $scriptSQL);
          $formattedSql = str_replace("END;", "END;; \n DELIMITER ;", $new_scriptSQL); */
        //echo '<b>' . $formattedSql . '</b>';
        return $formattedSql;
    }

    public function logQueryToFile($query, $fullFileName = "../DataAccessLayerTest/dbStoredProcedures.sql", $delimiter = "`root`@`localhost`") {
        // live definer = `mariesmanager_c`@`%`
        // Open for writing only; place the file pointer at the end of the file.
        //if the file does not exist, attempt to create it.
        $fileHandler = fopen($fullFileName, "a+");
        if ($this->sqlInitialized == false) {
            $hostName = "127.0.0.1:3306";
            $genTime = date('d.m.Y H:i:s');
            $header = '
                -- This script has been auto generated from CustomModulesGenerator class
                -- Host: ' . $hostName . '
                -- Generation Time: ' . $genTime . '

                SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
                SET time_zone = "+00:00";

                /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                /*!40101 SET NAMES utf8 */;

                DELIMITER $$
                --
                -- Procedures
                --
                    ';
            fwrite($fileHandler, $header);
            $this->sqlInitialized = true;
        }
        // Write the contents back to the file
        $str = $this->formatSqlQuery($query, $delimiter);
        fwrite($fileHandler, $str);
        fclose($fileHandler);
        echo "<b />logQueryToFile::The query was successfuly written to file File and overriden....</b>";
        return TRUE;
    }

    /**
     * Logs SQL error
     * @param string $query
     * @param mixed $statement
     * @return string
     */
    public function logSqlError($query, $pdoObject = NULL) {

        include_once '../Includes/ExceptionLogger.php';

        if (!isset($pdoObject))
            return "";

        $error = $pdoObject->errorInfo();
        $msg = "\nSQL Error Information:\n";
        if (isset($error[0]) && isset($error[1])) {
            $msg .= "<pre>";
            $msg .= print_r($error);
            $msg .= "</pre>";
            $msg .= "Whole SQL Query: " . $query;
        }
        //
        ExceptionLogger::logErrorToFile($msg);
        return $msg;
    }

    /**
     * Logs Exception
     * @param mixed $e
     * @return string
     */
    public function logSqlException($e) {
        include_once '../BusinessLogicLayer/ExceptionLogger.php';

        if ($e == null)
            return "";
        //$stack = $e->getTraceAsString();
        $message = $e->getMessage();
        $htmlmsg = "<div style='color:#ff0000;size:10px;'>SQL Exception error message: "
                . $message . "</div><br />";
        //. $e->getTraceAsString() . "<br />";
        ExceptionLogger::logErrorToFile($message);
        return $htmlmsg;
    }

    /**
     *
     * @param string $tableName
     * @return mixed
     */
    public function getTableFieldsAndTypes($tableName) {
        if($this->sqlProviderType == "mySQL"){
            return $this->getTableFieldsAndTypesForMySQL($tableName);
        }
        else if($this->sqlProviderType == "postgreSQL"){
            return $this->getTableFieldsAndTypesForPosgreSQL($tableName);
        }
        else if($this->sqlProviderType == "msSQL"){
            return $this->getTableFieldsAndTypesForMsSQL($tableName);
        }
        else{
            return $this->getTableFieldsAndTypesForMySQL($tableName);
        }
    }

    public function getTableFieldsAndTypesForMySQL($tableName) {
        $result = Array();
        $query = "";
        try {
            $pdo = $this->getDbConnection();
            $query = "DESCRIBE $tableName";
            if ($pdo) {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $allRows = $statement->fetchAll();
                    for ($i = 0; $i < count($allRows); $i++) {
                        $key = $allRows[$i]['Field'];
                        $value = $allRows[$i]['Type'];
                        $result[$key] = $value;
                    }
                }
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     *
     * @param string $tableName
     * @return mixed
     */
    public function getTableFieldsAndTypesForPosgreSQL($tableName) {
        $result = Array();
        $query = "";
        try {
            $pdo = $this->getDbConnection();
            $query = "  select column_name, data_type, character_maximum_length
                     from INFORMATION_SCHEMA.COLUMNS where table_name = '$tableName'";
            if ($pdo) {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $allRows = $statement->fetchAll();
                    for ($i = 0; $i < count($allRows); $i++) {
                        $key = $allRows[$i]['column_name'];
                        $value = $allRows[$i]['data_type'];
                        $result[$key] = $value;
                    }
                }
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    public function getTableFieldsAndTypesForMsSQL($tableName) {
        $result = Array();
        $query = "";
        try {
            $pdo = $this->getDbConnection();
            $query = "  select column_name, data_type, character_maximum_length
                        from INFORMATION_SCHEMA.COLUMNS where table_name = '$tableName'";
            if ($pdo) {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $allRows = $statement->fetchAll();
                    for ($i = 0; $i < count($allRows); $i++) {
                        $key = $allRows[$i]['column_name'];
                        $value = $allRows[$i]['data_type'];
                        $length = $allRows[$i]['character_maximum_length'];
                        if($value == "varchar")
                            $result[$key] = $value . "($length)";
                        else
                            $result[$key] = $value;
                    }
                }
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return $result;
    }

    /**
     *  Gets all tables in the database
     * @return mixed
     */
    public function getAllTableNames() {
        if($this->sqlProviderType == "mySQL"){
            return $this->getAllTableNamesForMySQL();
        }
        else if($this->sqlProviderType == "postgreSQL"){
            return $this->getAllTableNamesForPosgreSQL();
        }
        else if($this->sqlProviderType == "msSQL"){
            return $this->getAllTableNamesForMsSQL();
        }
        else{
            return $this->getAllTableNamesForMySQL();
        }
    }


    public function getAllTableNamesForMySQL() {
        $result = Array();
        $query = "";
        try {
            $pdo = $this->getDbConnection();
            $query = "SHOW TABLES;";
            if ($pdo !=  NULL) {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $allRows = $statement->fetchAll();
                    for ($i = 0; $i < count($allRows); $i++) {
                        $key = $allRows[$i][0];
                        $result[$i] = $key;
                    }
                }
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }

        return $result;
    }


    public function getAllTableNamesForPosgreSQL() {
        $result = Array();
        $query = "";
        try {
            $pdo = $this->getDbConnection();
            $query = " SELECT table_schema,table_name
                        FROM information_schema.tables
                        where table_schema = 'public'
                        ORDER BY table_schema,table_name;
                    ";
            if ($pdo) {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $allRows = $statement->fetchAll();
                  //  Utils::printArray($allRows);
                    for ($i = 0; $i < count($allRows); $i++) {
                        $key = $allRows[$i][1];
                        $result[$i] = $key;
                    }
                }
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }

        return $result;
    }


    public function getAllTableNamesForMsSQL() {
        $result = Array();
        $query = "";
        try {
            $pdo = $this->getDbConnection();
            echo '<br /> TYPE is: ' . gettype($pdo);
            $query = " SELECT table_name
                       FROM information_schema.tables
                       ORDER BY table_name;
                    ";
            if ($pdo != null && gettype($pdo) == "object") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $allRows = $statement->fetchAll();
                    for ($i = 0; $i < count($allRows); $i++) {
                        $key = $allRows[$i][0];
                        $result[$i] = $key;
                    }
                }
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }

        return $result;
    }

    /**
     * Summary of getAllStoredProcedures
     * @return array|string
     */
    public function getAllStoredProcedures() {
        $result = Array();
        try {
            $pdo = $this->getDbConnection();
            $query = "SHOW PROCEDURE STATUS WHERE Db = DATABASE() AND Type = 'PROCEDURE';";
            if ($pdo) {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $allRows = $statement->fetchAll();
                    for ($i = 0; $i < count($allRows); $i++) {
                        $key = $allRows[$i][1]; // procedure name
                        $result[$i] = $key;
                    }
                }
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }

        return $result;
    }

    /**
     * Deletes all stored procedures
     * @param string $dbName
     * @return boolean|mixed
     */
    public function deleteAllStoredProcedures($dbName = "DATABASE()") {
        try {
            $query = "DELETE FROM mysql.proc WHERE Db = $dbName  AND type = 'PROCEDURE';";
            $this->runQuery($query);
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }
        return TRUE;
    }



    public function getAllEnumValuesField($tableName, $fieldName) {
        if($this->sqlProviderType == "mySQL"){
            return $this->getAllEnumValuesFieldForMySQL($tableName, $fieldName);
        }
        else if($this->sqlProviderType == "postgreSQL"){
            return null;
        }
        else if($this->sqlProviderType == "msSQL"){
            return $this->getAllTableNamesForMsSQL();
        }
        else{
            return $this->getAllEnumValuesFieldForMySQL($tableName, $fieldName);
        }
    }

    public function getAllEnumValuesFieldForMySQL($tableName, $fieldName) {
        $result = Array();
        $query = "SHOW FIELDS FROM `{$tableName}`  LIKE '{$fieldName}' ;";
        try {
            $pdo = $this->getDbConnection();
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $allRows = $statement->fetchAll();
                    for ($i = 0; $i < count($allRows); $i++) {
                        $row = $allRows[$i];
                        $sqlType = $row['Type'];
                        if (strpos($sqlType, "enum") === 0) {
                            preg_match('#^enum\((.*?)\)$#ism', $sqlType, $matches);
                            $result = str_getcsv($matches[1], ",", "'");
                            return $result;
                        }
                    }
                }
            } else {
                echo "<div style='color:#ff0000;size:10px;'>An error occured in runQuery() ..."
                . " while running query: $query </div>";
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }

        return $result;
    }


    public function getAllEnumValuesFieldForMsSQL($tableName, $fieldName) {
        $result = Array();
        $query = " SELECT column_name, data_type
                   FROM INFORMATION_SCHEMA.COLUMNS where table_name = '".$tableName."'
                  ";
        try {
            $pdo = $this->getDbConnection();
            if (is_object($pdo) && get_class($pdo) == "PDO") {
                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    // return the associative array
                    $allRows = $statement->fetchAll();
                    for ($i = 0; $i < count($allRows); $i++) {
                        $row = $allRows[$i];
                        $sqlType = $row['data_type'];
                        if (strpos($sqlType, "enum") === 0) {
                            preg_match('#^enum\((.*?)\)$#ism', $sqlType, $matches);
                            $result = str_getcsv($matches[1], ",", "'");
                            return $result;
                        }
                    }
                }
            } else {
                echo "<div style='color:#ff0000;size:10px;'>An error occured in runQuery() ..."
                . " while running query: $query </div>";
            }
        } catch (PDOException $e) {
            return $this->logSqlException($e);
        }

        return $result;
    }


    public function runQueryForPostgreSQL($queryString) {
        if (!isset($queryString) || strlen($queryString) == 0) {
            echo "<div style='color:#00ff11;size:10px;'>The runQuery() called with invalid "
            . "or empty query...</div>";
            return FALSE;
        }
        try {
            $pdo = $this->getDbConnection();
            $query = $queryString;
            echo "<br />" . " runQuery() called with: " . $queryString . "<br />";
            if ($pdo) {

                if ($pdo->exec($query) == 0) {
                    echo "<div style='color:#00ff11;size:10px;'>The runQuery() executed successfully...</div>";
                    $this->logPostgreSQLQueryToFile($query);
                    return true;
                } else {
                    echo "<div style='color:#ff0000;size:10px;'>An error occured in runQuery() ..."
                    . " while running query: $query </div>";
                    $this->logSqlError($query, $pdo);
                    return false;
                }
            }
        } catch (PDOException $e) {
            $this->logSqlException($e);
            return false;
        }
        return false;
    }


    public function logPostgreSQLQueryToFile($query, $fullFileName = "../DataAccessLayer.Generated/dbPostgresStoredProcedures.sql") {
        // Open for writing only; place the file pointer at the end of the file.
        //if the file does not exist, attempt to create it.
        $fileHandler = fopen($fullFileName, "a+");
        if ($this->sqlInitialized == false) {
            $hostName = "127.0.0.1:5442";
            $genTime = date('d.m.Y H:i:s');
            $header = '
                -- This script has been auto generated from (GWatcho) CustomModulesGenerator class
                -- Host: ' . $hostName . '
                -- Generation Time: ' . $genTime . '
                --
                -- Procedures
                --
                    ';
            fwrite($fileHandler, $header);
            $this->sqlInitialized = true;
        }
        // Write the contents back to the file
        $str = $query . "\n\n";
        fwrite($fileHandler, $str);
        fclose($fileHandler);
        echo "<b />logPostgreSQLQueryToFile::The query was successfuly written to file File and overriden....</b>";
        return TRUE;
    }


    public function runQueryForMsSQL($queryString) {
        if (!isset($queryString) || strlen($queryString) == 0) {
            echo "<div style='color:#00ff11;size:10px;'>The runQuery() called with invalid "
            . "or empty query...</div>";
            return FALSE;
        }
        try {
            $pdo = $this->getDbConnection();
            $query = $queryString;
            echo "<br />" . " runQuery() called with: " . $queryString . "<br />";
            if ($pdo) {

                if ($pdo->exec($query) == 0) {
                    $query = $queryString . " \n";
                    echo "<div style='color:#00ff11;size:10px;'>The runQuery() executed successfully...</div>";
                    $this->logMsSQLQueryToFile($query);
                    return true;
                } else {
                    echo "<div style='color:#ff0000;size:10px;'>An error occured in runQuery() ..."
                    . " while running query: $query </div>";
                    $this->logSqlError($query, $pdo);
                    return false;
                }
            }
        } catch (PDOException $e) {
            $this->logSqlException($e);
            return false;
        }
        return true;
    }


    public function logMsSQLQueryToFile($query, $fullFileName = "../DataAccessLayerTest/dbMsSQLStoredProcedures.sql") {
        // Open for writing only; place the file pointer at the end of the file.
        //if the file does not exist, attempt to create it.
        $fileHandler = fopen($fullFileName, "a+");
        if ($this->sqlInitialized == false) {
            $hostName = "127.0.0.1:5442";
            $genTime = date('d.m.Y H:i:s');
            $header = '
                -- This script has been auto generated from CustomModulesGenerator class
                -- Host: ' . $hostName . '
                -- Generation Time: ' . $genTime . '
                --
                -- Procedures
                --
                    ';
            fwrite($fileHandler, $header);
            $this->sqlInitialized = true;
        }
        // Write the contents back to the file
        $str = $query . "\n\n";
        fwrite($fileHandler, $str);
        fclose($fileHandler);
        echo "<b />logMsSQLQueryToFile::The query was successfuly written to file File and overriden....</b>";
        return TRUE;
    }





}
