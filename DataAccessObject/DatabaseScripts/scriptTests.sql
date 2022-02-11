
-- display all foregin key of a table
SELECT TABLE_NAME AS 'TABLE_NAME',  COLUMN_NAME 
AS 'COLUMN_NAME', REFERENCED_TABLE_NAME AS ' REFERENCED_TABLE_NAME ', 
 referenced_column_name   AS 'REFERENCED_COLUMN_NAME'
FROM information_schema.key_column_usage
WHERE CONSTRAINT_SCHEMA = 'carug_fret'
AND TABLE_NAME = 'carug_Package'
AND REFERENCED_TABLE_NAME IS NOT NULL
LIMIT 0 , 30


-- Tests SQL
  

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc1`()
BEGIN

	DECLARE exit handler for sqlexception
	  BEGIN
		-- ERROR
		ROLLBACK;
		SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated' AS errorMsg;
	END;
 
	DECLARE exit handler for sqlwarning
	 BEGIN
		-- WARNING
		ROLLBACK;
		SELECT 'An warning has occurred, operation rollbacked and the stored procedure was terminated';
	END;

	START TRANSACTION;
		INSERT INTO t1 (id, name, address) values ('1','Avinash','xpertdeveloper.com');
		INSERT INTO t1 (id, name, address) values ('2','Avinash2','xpertdeveloper.com2');
		INSERT INTO t2 (id, name, address) values ('1','Avinash1','xpertdeveloper.com1');
		UPDATE t3 set name="xyz" where id=4;
	COMMIT;
END$$

DELIMITER ;
  