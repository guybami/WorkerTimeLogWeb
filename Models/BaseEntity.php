<?php

/**
 * BaseEntity class contains all data model entities
 *
 * @version 2.1
 * @author Guy Bami
 * Last changes: 09.07.17 
 */

include_once '../Utils/ExceptionLogger.php';

class BaseEntity 
{
    public function selectAllEntitiesRecordsCount(){
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectAllEntitiesRecordsCount();
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }
    
    
    public function selectActualFinancesStatus(){
        try {
            $daoSelect = new DaoSelect();
            return $daoSelect->selectActualFinancesStatus();
        }
        catch (ExceptionLogger $e) {
            return $e->getErrorMessage();
        }
    }

}