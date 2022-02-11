-- This script has been auto generated from B-Watcho CustomModulesGenerator class
    -- Host: 127.0.0.1:3306
    -- Generation Time: 01.06.2019 22:18:33
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
    time_zone = "+00:00";
    /*!40101
SET
    @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
    /*!40101
SET
    @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
    /*!40101
SET
    @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
    /*!40101
SET NAMES
    utf8 */;
DELIMITER
    $$
    --

    -- Procedures
    --

DROP
PROCEDURE IF EXISTS `selectAllUsers` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `selectAllUsers`()
BEGIN
    SELECT
        wt_User.*
    FROM
        wt_User
    ORDER BY
        wt_User.name ASC ;
END $$
DROP
PROCEDURE IF EXISTS `insertNewUser` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `insertNewUser`(
    _loginName VARCHAR(50),
    _hashPassword VARCHAR(20),
    _name VARCHAR(50),
    _lastName VARCHAR(50),
    _phoneNumber VARCHAR(50),
    _email VARCHAR(100),
    _role ENUM('WORKER', 'ADMIN')
)
BEGIN
    INSERT INTO wt_User(
        loginName,
        hashPassword,
        NAME,
        lastName,
        phoneNumber,
        email,
        role
    )
VALUES(
    _loginName,
    _hashPassword,
    _name,
    _lastName,
    _phoneNumber,
    _email,
    _role
) ;
SELECT
    LAST_INSERT_ID() ;
    END $$
DROP
PROCEDURE IF EXISTS `deleteUser` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `deleteUser`(_userId INT(11))
BEGIN
    DELETE
FROM
    wt_User
WHERE
    userId = _userId ;
END $$
DROP
PROCEDURE IF EXISTS `deleteAllUsers` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `deleteAllUsers`()
BEGIN
    DELETE
FROM
    wt_User ;
END $$
DROP
PROCEDURE IF EXISTS `updateUser` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `updateUser`(
    _userId INT(11),
    _loginName VARCHAR(50),
    _hashPassword VARCHAR(20),
    _name VARCHAR(50),
    _lastName VARCHAR(50),
    _phoneNumber VARCHAR(50),
    _email VARCHAR(100),
    _role ENUM('WORKER', 'ADMIN')
)
BEGIN
    UPDATE
        wt_User
    SET
        loginName = _loginName,
        hashPassword = _hashPassword,
        NAME = _name,
        lastName = _lastName,
        phoneNumber = _phoneNumber,
        email = _email,
        role = _role
    WHERE
        userId = _userId ;
END $$
DROP
PROCEDURE IF EXISTS `updateUserLoginName` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `updateUserLoginName`(
    _userId INT(11),
    _loginName VARCHAR(50)
)
BEGIN
    UPDATE
        wt_User
    SET
        loginName = _loginName
    WHERE
        userId = _userId ;
END $$
DROP
PROCEDURE IF EXISTS `updateUserHashPassword` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `updateUserHashPassword`(
    _userId INT(11),
    _hashPassword VARCHAR(20)
)
BEGIN
    UPDATE
        wt_User
    SET
        hashPassword = _hashPassword
    WHERE
        userId = _userId ;
END $$
DROP
PROCEDURE IF EXISTS `updateUserName` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `updateUserName`(
    _userId INT(11),
    _name VARCHAR(50)
)
BEGIN
    UPDATE
        wt_User
    SET NAME
        = _name
    WHERE
        userId = _userId ;
END $$
DROP
PROCEDURE IF EXISTS `updateUserLastName` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `updateUserLastName`(
    _userId INT(11),
    _lastName VARCHAR(50)
)
BEGIN
    UPDATE
        wt_User
    SET
        lastName = _lastName
    WHERE
        userId = _userId ;
END $$
DROP
PROCEDURE IF EXISTS `updateUserPhoneNumber` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `updateUserPhoneNumber`(
    _userId INT(11),
    _phoneNumber VARCHAR(50)
)
BEGIN
    UPDATE
        wt_User
    SET
        phoneNumber = _phoneNumber
    WHERE
        userId = _userId ;
END $$
DROP
PROCEDURE IF EXISTS `updateUserEmail` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `updateUserEmail`(
    _userId INT(11),
    _email VARCHAR(100)
)
BEGIN
    UPDATE
        wt_User
    SET
        email = _email
    WHERE
        userId = _userId ;
END $$
DROP
PROCEDURE IF EXISTS `updateUserRole` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `updateUserRole`(
    _userId INT(11),
    _role ENUM('WORKER', 'ADMIN')
)
BEGIN
    UPDATE
        wt_User
    SET
        role = _role
    WHERE
        userId = _userId ;
END $$
DROP
PROCEDURE IF EXISTS `selectUserDetails` $$
CREATE DEFINER = `my_africa_international_com`@`%` PROCEDURE `selectUserDetails`(_userId INT(11))
BEGIN
    SELECT
        *
    FROM
        wt_User
    WHERE
        userId = _userId ;
END $$