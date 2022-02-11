

--
-- Database: `khev`
-- Custom procedures

DELIMITER $$
--
-- Procedures
--
 
-- drop all PROCEDURE
-- DELETE FROM mysql.proc WHERE db = 'khev' AND type = 'PROCEDURE';
 

DROP PROCEDURE IF EXISTS selectAllExpenses  $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAllExpenses`()
BEGIN
    SELECT khev_Expense.*, khev_Event.title AS eventTitle
    FROM khev_Expense 
	LEFT JOIN  khev_Event 
	ON  khev_Event.eventId =  khev_Expense.eventId
	ORDER BY khev_Expense.transactionDate  DESC;         
END$$
			

DROP PROCEDURE IF EXISTS selectAllIncomes  $$
		
CREATE  DEFINER=`root`@`localhost` PROCEDURE `selectAllIncomes`()
BEGIN
    SELECT khev_Income.*, khev_Event.title AS eventTitle
    FROM khev_Income 
	LEFT JOIN  khev_Event 
	ON  khev_Event.eventId =  khev_Income.eventId
	ORDER BY khev_Income.transactionDate  DESC;
	
END$$


DROP PROCEDURE IF EXISTS selectAllEntitiesRecordsCount  $$
		
CREATE  DEFINER=`root`@`localhost` PROCEDURE `selectAllEntitiesRecordsCount`()
BEGIN
    SELECT table_name AS tableName, table_rows tableRows 
	FROM information_schema.tables 
	WHERE  table_schema = 'khev';
	
END$$



DROP PROCEDURE IF EXISTS selectAllEventPhotos  $$
		
CREATE  DEFINER=`root`@`localhost` PROCEDURE `selectAllEventPhotos`()
BEGIN
    SELECT khev_EventPhoto.*, khev_Event.title AS eventTitle
    FROM khev_EventPhoto 
    LEFT JOIN  khev_Event 
    ON  khev_Event.eventId =  khev_EventPhoto.eventId
    ORDER BY khev_Event.date  DESC;
	
END$$

DROP PROCEDURE IF EXISTS selectAllPhotosByEvent  $$
		
CREATE  DEFINER=`root`@`localhost` PROCEDURE `selectAllPhotosByEvent`( IN `_eventId` INT(11))
BEGIN
    SELECT khev_EventPhoto.*, khev_Event.title AS eventTitle
    FROM khev_EventPhoto 
    LEFT JOIN  khev_Event 
    ON  khev_Event.eventId =  khev_EventPhoto.eventId
    WHERE khev_EventPhoto.eventId = _eventId
    ORDER BY khev_Event.date  DESC;
	
END$$

DROP PROCEDURE IF EXISTS selectAllExpensesByYear  $$
		
CREATE  DEFINER=`root`@`localhost` PROCEDURE `selectAllExpensesByYear`()
BEGIN
    SELECT 
        SUM(amount) AS sumExpenses,  
        MONTH(transactionDate) AS currentMonth,
        YEAR(transactionDate) AS currentYear
        FROM khev_Expense   
        GROUP BY  MONTH(transactionDate), YEAR(transactionDate)
        ORDER BY  YEAR(transactionDate), MONTH( transactionDate);  
                
	
END$$


 
DROP PROCEDURE IF EXISTS selectAllIncomesByYear  $$
 
		
CREATE  DEFINER=`root`@`localhost` PROCEDURE `selectAllIncomesByYear`()
BEGIN
    SELECT 
        SUM(amount) AS sumIncomes,  
        MONTH(transactionDate) AS currentMonth,
        YEAR(transactionDate) AS currentYear
        FROM khev_Income   
        GROUP BY  MONTH(transactionDate), YEAR(transactionDate)
        ORDER BY  YEAR(transactionDate), MONTH( transactionDate);   
                
	
END$$


DROP PROCEDURE IF EXISTS selectAllEvents  $$
CREATE  DEFINER=`root`@`localhost` PROCEDURE `selectAllEvents`()
BEGIN
    SELECT khev_Event.*,
    COUNT(khev_EventPhoto.photoId) AS numPhotos
    FROM khev_Event    
    LEFT JOIN khev_EventPhoto
    ON khev_EventPhoto.eventId = khev_Event.eventId
    GROUP BY khev_Event.eventId
    ORDER BY khev_Event.date DESC;
	
END$$


DROP PROCEDURE IF EXISTS selectEventsByCategory  $$
CREATE  DEFINER=`root`@`localhost` PROCEDURE `selectEventsByCategory`(IN `_category` 
     enum('CultureWeek','FirstSemesterParty','GalaNight','Gaduation','GrillParty','Challenge','Mourning','Divers','Football','Tournament')  )
BEGIN
    SELECT khev_Event.*,
    COUNT(khev_EventPhoto.photoId) AS numPhotos
    FROM khev_Event    
    LEFT JOIN khev_EventPhoto
    ON khev_EventPhoto.eventId = khev_Event.eventId
    WHERE khev_Event.category = _category
    GROUP BY khev_Event.eventId
    ORDER BY khev_Event.date DESC;
END$$
 

DROP PROCEDURE IF EXISTS selectActualFinancesStatus  $$
CREATE  DEFINER=`root`@`localhost` PROCEDURE `selectActualFinancesStatus`()
BEGIN
    SELECT (SELECT SUM(amount) FROM khev_Income) As sumIncomes, 
    (SELECT SUM(amount) FROM khev_Expense) As sumExpenses, 
    (SELECT SUM(amount) FROM khev_Income) - (SELECT SUM(amount) FROM khev_Expense)  AS actualAmount
	
END$$


DELIMITER ;
  

DELIMITER ;
  