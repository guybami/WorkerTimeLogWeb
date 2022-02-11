
-- Script to create database tables
-- Last changed: 02.04.2020 
-- Author: Guy Bami 
-- comment: wt means worker time
 
-- DROP DATABASE IF EXISTS workerTimeLog;

CREATE DATABASE IF NOT EXISTS workerTimeLog;

USE workerTimeLog;


 


--
-- Table structure for table wt_Customer
--

CREATE TABLE IF NOT EXISTS wt_Customer (
	customerId INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NULL DEFAULT '',
	email VARCHAR(100)  NULL,
    phoneNumber VARCHAR(50) NOT NULL,
    zipCode VARCHAR(10) NULL,
    city VARCHAR(50)  NULL,
    street VARCHAR(50)  NULL,
    PRIMARY KEY (customerId)
) ENGINE=InnoDB;


 

--
-- Table structure for table wt_User
--

CREATE TABLE IF NOT EXISTS wt_User (
    userId INT NOT NULL AUTO_INCREMENT,
    loginName VARCHAR(50) NOT NULL,
	hashPassword VARCHAR(20) NULL,
    name VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NULL DEFAULT '',
    phoneNumber VARCHAR(50) NULL,
	email VARCHAR(100)  NOT NULL,
	role ENUM('WORKER', 'ADMIN') NOT NULL DEFAULT 'WORKER', 
    PRIMARY KEY (userId),
    UNIQUE(loginName)
) ENGINE=InnoDB;



--
-- Table structure for table wt_UserProfile
--

CREATE TABLE IF NOT EXISTS wt_UserProfile (
    profileId INT NOT NULL AUTO_INCREMENT,
	userId INT NOT NULL,
	gender ENUM('Male', 'Female') NOT NULL DEFAULT 'Male',
	photoFileName VARCHAR(256) NULL,
	street VARCHAR(50)  NULL,
	zipCode VARCHAR(10) NULL,
    city VARCHAR(50)  NULL,
    address VARCHAR(256)  NULL,
    defalutLanguage ENUM('DE', 'FR', 'EN') NOT NULL DEFAULT 'FR',
    PRIMARY KEY (profileId),
	FOREIGN KEY (userId) REFERENCES wt_User(userId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;


--
-- Table structure for table wt_Project
--

CREATE TABLE IF NOT EXISTS wt_Project (
    projectId INT NOT NULL AUTO_INCREMENT,
	customerId INT NOT NULL,
    title VARCHAR(128) NOT NULL,
	creationDate DATETIME  NULL, 
	status ENUM('STARTED', 'PROGRESS', 'CANCELLED', 'DONE') NOT NULL DEFAULT 'STARTED', 
	hasOrder  BIT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (projectId),
	FOREIGN KEY (customerId) REFERENCES wt_Customer(customerId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;



--
-- Table structure for table wt_Order
--

CREATE TABLE IF NOT EXISTS wt_Order(
  orderId INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(128)  NOT NULL,
  projectId INT NOT NULL,
  date datetime  NOT NULL,
  PRIMARY KEY (orderId),
  FOREIGN KEY (projectId) REFERENCES wt_Project(projectId) ON UPDATE CASCADE ON DELETE NO ACTION
) ENGINE=InnoDB;


--
-- Table structure for table wt_Task  
--

CREATE TABLE IF NOT EXISTS wt_Task (
  taskId INT NOT NULL AUTO_INCREMENT,
  projectId INT NOT NULL,
  title VARCHAR(128)  NOT NULL,
  date datetime  NOT NULL,
  descriptionFileName  VARCHAR(128)  NULL,
  summary TEXT  NULL,
  PRIMARY KEY (taskId),
  FOREIGN KEY (projectId) REFERENCES wt_Project(projectId) ON UPDATE CASCADE ON DELETE NO ACTION
) ENGINE=InnoDB;




--
-- Table structure for table wt_TaskPictures  
--

CREATE TABLE IF NOT EXISTS wt_TaskPicture (
  taskPictureId INT NOT NULL AUTO_INCREMENT,
  taskId INT NOT NULL,
  fileName  VARCHAR(128)  NULL,
  PRIMARY KEY (taskPictureId),
  FOREIGN KEY (taskId) REFERENCES wt_Task(taskId) ON UPDATE CASCADE ON DELETE NO ACTION
) ENGINE=InnoDB;


--
-- Table structure for table wt_TaskLogTime
--

CREATE TABLE IF NOT EXISTS wt_TaskLogTime (
  taskLogTimeId INT NOT NULL AUTO_INCREMENT,
  userId INT NOT NULL,
  taskId INT NOT NULL,
  title VARCHAR(50)  NOT NULL,
  startTime datetime  NOT NULL,
  endTime datetime  NOT NULL,
  summary TEXT  NULL,
  date datetime  NOT NULL,
  PRIMARY KEY (taskLogTimeId),
  FOREIGN KEY (userId) REFERENCES wt_User(userId) ON UPDATE CASCADE ON DELETE NO ACTION,
  FOREIGN KEY (taskId) REFERENCES wt_Task(taskId) ON UPDATE CASCADE ON DELETE NO ACTION
) ENGINE=InnoDB;

  
   

-- add activity Logs
--
-- Table structure for table wt_LogActivity (Logger utiliser avec les triggers)
--

CREATE TABLE IF NOT EXISTS wt_LogActivity (
  activityId INT NOT NULL AUTO_INCREMENT,
  userId INT NOT NULL,
  summary TEXT NULL,
  date  DATETIME NOT NULL,
  PRIMARY KEY (activityId),
  FOREIGN KEY (userId) REFERENCES wt_User(userId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;



--
-- Table structure for table wt_Rapport
--

CREATE TABLE IF NOT EXISTS wt_Rapport (
  rapportId INT NOT NULL AUTO_INCREMENT,
  userId INT NOT NULL,
  auftragNummer VARCHAR(100)  NULL,
  bezeichnung VARCHAR(100)  NULL,
  datum datetime  NOT NULL,
  PRIMARY KEY (rapportId),
  FOREIGN KEY (userId) REFERENCES wt_User(userId) ON UPDATE CASCADE ON DELETE NO ACTION
) ENGINE=InnoDB;


--
-- Table structure for table wt_AufMasse
--

CREATE TABLE IF NOT EXISTS wt_AufMasse (
  aufmasseId INT NOT NULL AUTO_INCREMENT,
  rapportId INT NOT NULL,
  masse VARCHAR(50)  NOT NULL,
  aufsprache VARCHAR(255)  NULL,
  freierText VARCHAR(100)  NULL,
  bemerkung VARCHAR(100)  NULL,
  datum datetime  NOT NULL,
  PRIMARY KEY (aufmasseId),
  FOREIGN KEY (rapportId) REFERENCES wt_Rapport(rapportId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

  
--
-- Table structure for table wt_AufMasseBild 
--

CREATE TABLE IF NOT EXISTS wt_AufMasseBild (
  bildId INT NOT NULL AUTO_INCREMENT,
  aufmasseId INT NOT NULL,
  dateiName VARCHAR(255)  NOT NULL,
  PRIMARY KEY (bildId),
  FOREIGN KEY (aufmasseId) REFERENCES wt_AufMasse(aufmasseId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;


--
-- Table structure for table wt_AufMasseSkizze
--

CREATE TABLE IF NOT EXISTS wt_AufMasseSkizze (
  skizzeId INT NOT NULL AUTO_INCREMENT,
  aufmasseId INT NOT NULL,
  dateiName VARCHAR(255)  NOT NULL,
  PRIMARY KEY (skizzeId),
  FOREIGN KEY (aufmasseId) REFERENCES wt_AufMasse(aufmasseId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;




--
-- Table structure for table wt_Nachtrag
--

CREATE TABLE IF NOT EXISTS wt_Nachtrag (
  nachtragId INT NOT NULL AUTO_INCREMENT,
  rapportId INT NOT NULL,
  aufsprache VARCHAR(255)  NULL,
  freierText VARCHAR(100)  NULL,
  datum datetime  NOT NULL,
  PRIMARY KEY (nachtragId),
  FOREIGN KEY (rapportId) REFERENCES wt_Rapport(rapportId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;




--
-- Table structure for table wt_NachtragBild 
--

CREATE TABLE IF NOT EXISTS wt_NachtragBild (
  bildId INT NOT NULL AUTO_INCREMENT,
  nachtragId INT NOT NULL,
  dateiName VARCHAR(255)  NOT NULL,
  PRIMARY KEY (bildId),
  FOREIGN KEY (nachtragId) REFERENCES wt_Nachtrag(nachtragId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;




--
-- Table structure for table wt_NachtragSkizze
--

CREATE TABLE IF NOT EXISTS wt_NachtragSkizze (
  skizzeId INT NOT NULL AUTO_INCREMENT,
  nachtragId INT NOT NULL,
  dateiName VARCHAR(255)  NOT NULL,
  PRIMARY KEY (skizzeId),
  FOREIGN KEY (nachtragId) REFERENCES wt_Nachtrag(nachtragId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;



--
-- Table structure for table wt_Fertigung
--

CREATE TABLE IF NOT EXISTS wt_Fertigung (
  fertigungId INT NOT NULL AUTO_INCREMENT,
  rapportId INT NOT NULL,
  nachbearbeitung  ENUM('ja', 'nein') default 'nein',
  lackieren  ENUM('ja', 'nein') default 'nein',
  beschichten   ENUM('ja', 'nein') default 'nein',
  strahlen  ENUM('ja', 'nein') default 'nein',
  auftragAbgeschlossen  ENUM('ja', 'nein') default 'nein', 
  datum datetime  NOT NULL,
  PRIMARY KEY (fertigungId),
  FOREIGN KEY (rapportId) REFERENCES wt_Rapport(rapportId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;



--
-- Table structure for table wt_FertigungBild 
--

CREATE TABLE IF NOT EXISTS wt_FertigungBild (
  bildId INT NOT NULL AUTO_INCREMENT,
  fertigungId INT NOT NULL,
  dateiName VARCHAR(255)  NOT NULL,
  PRIMARY KEY (bildId),
  FOREIGN KEY (fertigungId) REFERENCES wt_Fertigung(fertigungId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

 


--
-- Table structure for table wt_Montage
--

CREATE TABLE IF NOT EXISTS wt_Montage (
  montageId INT NOT NULL AUTO_INCREMENT,
  rapportId INT NOT NULL,
  bericht  TEXT NULL,
  aufnahmeUnterschriftDatei varchar(124),
  auftragAbgeschlossen  ENUM('ja', 'nein') default 'nein', 
  datum datetime  NOT NULL,
  PRIMARY KEY (montageId),
  FOREIGN KEY (rapportId) REFERENCES wt_Rapport(rapportId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;


--
-- Table structure for table wt_MontageBild 
--

CREATE TABLE IF NOT EXISTS wt_MontageBild (
  bildId INT NOT NULL AUTO_INCREMENT,
  montageId INT NOT NULL,
  bildTyp  ENUM('vorArbeit', 'nachArbeit') default 'vorArbeit', 
  dateiName VARCHAR(255)  NOT NULL,
  PRIMARY KEY (bildId),
  FOREIGN KEY (montageId) REFERENCES wt_Montage(montageId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;



--
-- Table structure for table wt_Erfassung
--

CREATE TABLE IF NOT EXISTS wt_Erfassung (
  erfassungId INT NOT NULL AUTO_INCREMENT,
  rapportId INT NOT NULL,
  bericht  TEXT NULL,
  material varchar(124),
  maschineAufwand varchar(124),
  kilometer float  NULL,
  auftragAbgeschlossen  ENUM('ja', 'nein') default 'nein', 
  datum datetime  NOT NULL,
  PRIMARY KEY (erfassungId),
  FOREIGN KEY (rapportId) REFERENCES wt_Rapport(rapportId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;


--
-- Table structure for table wt_ErfassungBild 
--

CREATE TABLE IF NOT EXISTS wt_ErfassungBild (
  bildId INT NOT NULL AUTO_INCREMENT,
  erfassungId INT NOT NULL,
  bildTyp  ENUM('vorArbeit', 'nachArbeit') default 'vorArbeit', 
  dateiName VARCHAR(255)  NOT NULL,
  PRIMARY KEY (bildId),
  FOREIGN KEY (erfassungId) REFERENCES wt_Erfassung(erfassungId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;





--
-- Table structure for table wt_Arbeitszeit
--

DROP TABLE IF EXISTS wt_Arbeitszeit;
CREATE TABLE IF NOT EXISTS wt_Arbeitszeit (
  arbeitszeitId int(11) NOT NULL AUTO_INCREMENT,
  rapportId int(11) NOT NULL,
  bereich enum('Aufmasse', 'Nachtrag', 'Fertigung', 'Montage', 'Erfassung') DEFAULT 'Aufmasse',
  mitarbeiterName VARCHAR(50) NOT NULL,
  gruppe VARCHAR(50) DEFAULT NULL,
  zeit float DEFAULT '0',
  datum datetime NOT NULL,
  PRIMARY KEY (arbeitszeitId),
  FOREIGN KEY (rapportId) REFERENCES wt_Rapport(rapportId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;



--
-- Table structure for table wt_ErfassungOhneAuftrag
--

CREATE TABLE IF NOT EXISTS wt_ErfassungOhneAuftrag (
  erfassungId INT NOT NULL AUTO_INCREMENT,
  kundenNummer varchar(50) NOT NULL,
  bericht  TEXT NULL,
  material varchar(124),
  maschineAufwand varchar(124),
  kilometer float  NULL,
  unterschriftMitarbeiterDatei varchar(100),
  unterschriftKundeDatei varchar(100),
  auftragAbgeschlossen  ENUM('ja', 'nein') default 'nein', 
  datum datetime  NOT NULL,
  PRIMARY KEY (erfassungId)
) ENGINE=InnoDB;


--
-- Table structure for table wt_ErfassungOhneAuftragBild 
--

CREATE TABLE IF NOT EXISTS wt_ErfassungOhneAuftragBild (
  bildId INT NOT NULL AUTO_INCREMENT,
  erfassungId INT NOT NULL,
  bildTyp  ENUM('vorArbeit', 'nachArbeit') default 'vorArbeit', 
  dateiName VARCHAR(255)  NOT NULL,
  PRIMARY KEY (bildId),
  FOREIGN KEY (erfassungId) REFERENCES wt_ErfassungOhneAuftrag(erfassungId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;




--
-- Table structure for table wt_Auftrag
--

CREATE TABLE IF NOT EXISTS wt_Auftrag (
  auftragId INT NOT NULL AUTO_INCREMENT,
  auftragsNummer varchar(50) NOT NULL,
  kundenNummer varchar(50) NULL,
  bezeichnung  TEXT NULL,
  auftragAbgeschlossen  ENUM('ja', 'nein') default 'nein', 
  datum datetime  NOT NULL,
  PRIMARY KEY (auftragId)
) ENGINE=InnoDB;


--
-- Table structure for table wt_Zeichnung
--

CREATE TABLE IF NOT EXISTS wt_Zeichnung (
  zeichnungId INT NOT NULL AUTO_INCREMENT,
  auftragId INT NOT NULL,
  dateiName VARCHAR(255)  NOT NULL,
  PRIMARY KEY (zeichnungId),
  FOREIGN KEY (auftragId) REFERENCES wt_Auftrag(auftragId) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;






























