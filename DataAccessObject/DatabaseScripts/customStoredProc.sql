


-- Custom procedure
                 
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



DELIMITER $$
--
-- Procedures
--
                   
    -- selectAllSkizzeByAufMasse
    DROP PROCEDURE IF EXISTS `selectAllSkizzeByAufMasse`$$
    CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllSkizzeByAufMasse`(_aufmasseId  int(11))
    BEGIN
            SELECT wt_AufMasseSkizze.* 
            FROM wt_AufMasseSkizze    LEFT JOIN wt_AufMasse ON  wt_AufMasse.aufmasseId = wt_AufMasseSkizze.aufmasseId  
            WHERE wt_AufMasse.aufmasseId = _aufmasseId;
    END$$

    -- selectAllBilderByAufMasse
    DROP PROCEDURE IF EXISTS `selectAllBilderByAufMasse`$$
    CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllBilderByAufMasse`(_aufmasseId  int(11))
    BEGIN
            SELECT wt_AufMasseBild.* 
            FROM wt_AufMasseBild    LEFT JOIN wt_AufMasse ON  wt_AufMasse.aufmasseId = wt_AufMasseBild.aufmasseId  
            WHERE wt_AufMasse.aufmasseId = _aufmasseId;
    END$$

    -- selectAllArbeitszeitByAufMasse
    DROP PROCEDURE IF EXISTS `selectAllArbeitszeitByAufMasse`$$
    CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllArbeitszeitByAufMasse`(_rapportId  int(11))
    BEGIN
            SELECT wt_Arbeitszeit.* 
            FROM wt_Arbeitszeit    LEFT JOIN wt_Rapport ON  wt_Rapport.rapportId = wt_Arbeitszeit.rapportId  
            WHERE wt_Arbeitszeit.rapportId = _rapportId AND wt_Arbeitszeit.bereich = 'Aufmasse';
    END$$
	
	-- selectRapportAufmasseDatails
    DROP PROCEDURE IF EXISTS `selectRapportAufmasseDatails`$$
    CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectRapportAufmasseDatails`(_rapportId  int(11))
    BEGIN
            SELECT wt_AufMasse.* 
            FROM wt_AufMasse    LEFT JOIN wt_Rapport ON  wt_Rapport.rapportId = wt_AufMasse.rapportId  
            WHERE wt_AufMasse.rapportId = _rapportId;
    END$$

    -- selectAllSkizzeByNachtrag
    DROP PROCEDURE IF EXISTS `selectAllSkizzeByNachtrag`$$
    CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllSkizzeByNachtrag`(_nachtragId  int(11))
    BEGIN
            SELECT wt_NachtragSkizze.* 
            FROM wt_NachtragSkizze    LEFT JOIN wt_Nachtrag ON  wt_Nachtrag.nachtragId = wt_NachtragSkizze.nachtragId  
            WHERE wt_Nachtrag.nachtragId = _nachtragId;
    END$$

    -- selectAllBilderByNachtrag
    DROP PROCEDURE IF EXISTS `selectAllBilderByNachtrag`$$
    CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllBilderByNachtrag`(_nachtragId  int(11))
    BEGIN
            SELECT wt_NachtragBild.* 
            FROM wt_NachtragBild    LEFT JOIN wt_Nachtrag ON  wt_Nachtrag.nachtragId = wt_NachtragBild.nachtragId  
            WHERE wt_Nachtrag.nachtragId = _nachtragId;
    END$$

    -- selectAllArbeitszeitByNachtrag
    DROP PROCEDURE IF EXISTS `selectAllArbeitszeitByNachtrag`$$
    CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllArbeitszeitByNachtrag`(_rapportId  int(11))
    BEGIN
            SELECT wt_Arbeitszeit.* 
            FROM wt_Arbeitszeit    LEFT JOIN wt_Rapport ON  wt_Rapport.rapportId = wt_Arbeitszeit.rapportId  
            WHERE wt_Arbeitszeit.rapportId = _rapportId AND wt_Arbeitszeit.bereich = 'Nachtrag';
    END$$
	
     -- selectRapportNachtragDatails
    DROP PROCEDURE IF EXISTS `selectRapportNachtragDatails`$$
    CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectRapportNachtragDatails`(_rapportId  int(11))
    BEGIN
            SELECT wt_Nachtrag.* 
            FROM wt_Nachtrag    LEFT JOIN wt_Rapport ON  wt_Rapport.rapportId = wt_Nachtrag.rapportId  
            WHERE wt_Nachtrag.rapportId = _rapportId;
    END$$

    -- selectAllZeichnungByAuftrag
    DROP PROCEDURE IF EXISTS `selectAllZeichnungByAuftrag`$$
    CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllZeichnungByAuftrag`(_auftragId  int(11))
    BEGIN
            SELECT wt_Zeichnung.*
            FROM wt_Zeichnung    LEFT JOIN wt_Auftrag ON  wt_Auftrag.auftragId = wt_Zeichnung.auftragId
            WHERE wt_Zeichnung.auftragId = _auftragId;
    END$$
 

