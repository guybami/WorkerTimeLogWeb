
                -- This script has been auto generated from B-Watcho CustomModulesGenerator class
                -- Host: 127.0.0.1:3306
                -- Generation Time: 21.03.2020 00:42:23

                SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
                SET time_zone = "+00:00";



                DELIMITER $$
                --
                -- Procedures
                --
                    
            DROP PROCEDURE IF EXISTS `selectAllArbeitszeits`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllArbeitszeits`()
            BEGIN
                SELECT wt_Arbeitszeit.*
                FROM wt_Arbeitszeit     ORDER BY wt_Arbeitszeit.datum  ASC;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewArbeitszeit`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewArbeitszeit`(_rapportId  int(11)  
,_bereich  enum('Aufmasse','Nachtrag','Fertigung','Montage','Erfassung')  
,_mitarbeiterName  varchar(50)  
,_gruppe  varchar(50)  
,_zeit  float  
,_datum  datetime  
)
            BEGIN
                INSERT INTO wt_Arbeitszeit (
                    rapportId  
,bereich  
,mitarbeiterName  
,gruppe  
,zeit  
,datum  

                )
                VALUES (
                    _rapportId  
,_bereich  
,_mitarbeiterName  
,_gruppe  
,_zeit  
,_datum  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteArbeitszeit`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteArbeitszeit`(_arbeitszeitId  int(11)  
)
            BEGIN

                DELETE FROM wt_Arbeitszeit
                WHERE  arbeitszeitId = _arbeitszeitId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllArbeitszeits`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllArbeitszeits`()
            BEGIN
                DELETE FROM wt_Arbeitszeit;

            END$$


            DROP PROCEDURE IF EXISTS `updateArbeitszeit`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateArbeitszeit`(
                            _arbeitszeitId  int(11)  
,_rapportId  int(11)  
,_bereich  enum('Aufmasse','Nachtrag','Fertigung','Montage','Erfassung')  
,_mitarbeiterName  varchar(50)  
,_gruppe  varchar(50)  
,_zeit  float  
,_datum  datetime  

                  )
            BEGIN
                UPDATE  wt_Arbeitszeit
                SET     rapportId =  _rapportId 
,bereich =  _bereich 
,mitarbeiterName =  _mitarbeiterName 
,gruppe =  _gruppe 
,zeit =  _zeit 
,datum =  _datum 

                WHERE
                        arbeitszeitId = _arbeitszeitId;
            END$$


            DROP PROCEDURE IF EXISTS `updateArbeitszeitRapportId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateArbeitszeitRapportId`(
                _arbeitszeitId  int(11)  
,_rapportId  int(11)  

            )
            BEGIN
                UPDATE  wt_Arbeitszeit
                SET     rapportId =  _rapportId 

                WHERE
                        arbeitszeitId = _arbeitszeitId;
            END$$


            DROP PROCEDURE IF EXISTS `updateArbeitszeitBereich`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateArbeitszeitBereich`(
                _arbeitszeitId  int(11)  
,_bereich  enum('Aufmasse','Nachtrag','Fertigung','Montage','Erfassung')  

            )
            BEGIN
                UPDATE  wt_Arbeitszeit
                SET     bereich =  _bereich 

                WHERE
                        arbeitszeitId = _arbeitszeitId;
            END$$


            DROP PROCEDURE IF EXISTS `updateArbeitszeitMitarbeiterName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateArbeitszeitMitarbeiterName`(
                _arbeitszeitId  int(11)  
,_mitarbeiterName  varchar(50)  

            )
            BEGIN
                UPDATE  wt_Arbeitszeit
                SET     mitarbeiterName =  _mitarbeiterName 

                WHERE
                        arbeitszeitId = _arbeitszeitId;
            END$$


            DROP PROCEDURE IF EXISTS `updateArbeitszeitGruppe`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateArbeitszeitGruppe`(
                _arbeitszeitId  int(11)  
,_gruppe  varchar(50)  

            )
            BEGIN
                UPDATE  wt_Arbeitszeit
                SET     gruppe =  _gruppe 

                WHERE
                        arbeitszeitId = _arbeitszeitId;
            END$$


            DROP PROCEDURE IF EXISTS `updateArbeitszeitZeit`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateArbeitszeitZeit`(
                _arbeitszeitId  int(11)  
,_zeit  float  

            )
            BEGIN
                UPDATE  wt_Arbeitszeit
                SET     zeit =  _zeit 

                WHERE
                        arbeitszeitId = _arbeitszeitId;
            END$$


            DROP PROCEDURE IF EXISTS `updateArbeitszeitDatum`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateArbeitszeitDatum`(
                _arbeitszeitId  int(11)  
,_datum  datetime  

            )
            BEGIN
                UPDATE  wt_Arbeitszeit
                SET     datum =  _datum 

                WHERE
                        arbeitszeitId = _arbeitszeitId;
            END$$


            DROP PROCEDURE IF EXISTS `selectArbeitszeitDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectArbeitszeitDetails`(_arbeitszeitId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Arbeitszeit
                
                WHERE
                        arbeitszeitId = _arbeitszeitId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllAufMasses`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllAufMasses`()
            BEGIN
                SELECT wt_AufMasse.*
                FROM wt_AufMasse    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewAufMasse`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewAufMasse`(_rapportId  int(11)  
,_masse  varchar(50)  
,_aufsprache  varchar(255)  
,_freierText  varchar(100)  
,_bemerkung  varchar(100)  
,_datum  datetime  
)
            BEGIN
                INSERT INTO wt_AufMasse (
                    rapportId  
,masse  
,aufsprache  
,freierText  
,bemerkung  
,datum  

                )
                VALUES (
                    _rapportId  
,_masse  
,_aufsprache  
,_freierText  
,_bemerkung  
,_datum  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteAufMasse`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAufMasse`(_aufmasseId  int(11)  
)
            BEGIN

                DELETE FROM wt_AufMasse
                WHERE  aufmasseId = _aufmasseId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllAufMasses`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllAufMasses`()
            BEGIN
                DELETE FROM wt_AufMasse;

            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasse`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasse`(
                            _aufmasseId  int(11)  
,_rapportId  int(11)  
,_masse  varchar(50)  
,_aufsprache  varchar(255)  
,_freierText  varchar(100)  
,_bemerkung  varchar(100)  
,_datum  datetime  

                  )
            BEGIN
                UPDATE  wt_AufMasse
                SET     rapportId =  _rapportId 
,masse =  _masse 
,aufsprache =  _aufsprache 
,freierText =  _freierText 
,bemerkung =  _bemerkung 
,datum =  _datum 

                WHERE
                        aufmasseId = _aufmasseId;
            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseRapportId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseRapportId`(
                _aufmasseId  int(11)  
,_rapportId  int(11)  

            )
            BEGIN
                UPDATE  wt_AufMasse
                SET     rapportId =  _rapportId 

                WHERE
                        aufmasseId = _aufmasseId;
            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseMasse`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseMasse`(
                _aufmasseId  int(11)  
,_masse  varchar(50)  

            )
            BEGIN
                UPDATE  wt_AufMasse
                SET     masse =  _masse 

                WHERE
                        aufmasseId = _aufmasseId;
            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseAufsprache`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseAufsprache`(
                _aufmasseId  int(11)  
,_aufsprache  varchar(255)  

            )
            BEGIN
                UPDATE  wt_AufMasse
                SET     aufsprache =  _aufsprache 

                WHERE
                        aufmasseId = _aufmasseId;
            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseFreierText`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseFreierText`(
                _aufmasseId  int(11)  
,_freierText  varchar(100)  

            )
            BEGIN
                UPDATE  wt_AufMasse
                SET     freierText =  _freierText 

                WHERE
                        aufmasseId = _aufmasseId;
            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseBemerkung`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseBemerkung`(
                _aufmasseId  int(11)  
,_bemerkung  varchar(100)  

            )
            BEGIN
                UPDATE  wt_AufMasse
                SET     bemerkung =  _bemerkung 

                WHERE
                        aufmasseId = _aufmasseId;
            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseDatum`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseDatum`(
                _aufmasseId  int(11)  
,_datum  datetime  

            )
            BEGIN
                UPDATE  wt_AufMasse
                SET     datum =  _datum 

                WHERE
                        aufmasseId = _aufmasseId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAufMasseDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAufMasseDetails`(_aufmasseId  int(11)  
)
            BEGIN
                SELECT * FROM wt_AufMasse
                
                WHERE
                        aufmasseId = _aufmasseId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllAufMasseBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllAufMasseBilds`()
            BEGIN
                SELECT wt_AufMasseBild.*
                FROM wt_AufMasseBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewAufMasseBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewAufMasseBild`(_aufmasseId  int(11)  
,_dateiName  varchar(255)  
)
            BEGIN
                INSERT INTO wt_AufMasseBild (
                    aufmasseId  
,dateiName  

                )
                VALUES (
                    _aufmasseId  
,_dateiName  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteAufMasseBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAufMasseBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_AufMasseBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllAufMasseBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllAufMasseBilds`()
            BEGIN
                DELETE FROM wt_AufMasseBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseBild`(
                            _bildId  int(11)  
,_aufmasseId  int(11)  
,_dateiName  varchar(255)  

                  )
            BEGIN
                UPDATE  wt_AufMasseBild
                SET     aufmasseId =  _aufmasseId 
,dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseBildAufmasseId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseBildAufmasseId`(
                _bildId  int(11)  
,_aufmasseId  int(11)  

            )
            BEGIN
                UPDATE  wt_AufMasseBild
                SET     aufmasseId =  _aufmasseId 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseBildDateiName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseBildDateiName`(
                _bildId  int(11)  
,_dateiName  varchar(255)  

            )
            BEGIN
                UPDATE  wt_AufMasseBild
                SET     dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAufMasseBildDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAufMasseBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_AufMasseBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllAufMasseSkizzes`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllAufMasseSkizzes`()
            BEGIN
                SELECT wt_AufMasseSkizze.*
                FROM wt_AufMasseSkizze    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewAufMasseSkizze`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewAufMasseSkizze`(_aufmasseId  int(11)  
,_dateiName  varchar(255)  
)
            BEGIN
                INSERT INTO wt_AufMasseSkizze (
                    aufmasseId  
,dateiName  

                )
                VALUES (
                    _aufmasseId  
,_dateiName  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteAufMasseSkizze`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAufMasseSkizze`(_skizzeId  int(11)  
)
            BEGIN

                DELETE FROM wt_AufMasseSkizze
                WHERE  skizzeId = _skizzeId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllAufMasseSkizzes`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllAufMasseSkizzes`()
            BEGIN
                DELETE FROM wt_AufMasseSkizze;

            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseSkizze`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseSkizze`(
                            _skizzeId  int(11)  
,_aufmasseId  int(11)  
,_dateiName  varchar(255)  

                  )
            BEGIN
                UPDATE  wt_AufMasseSkizze
                SET     aufmasseId =  _aufmasseId 
,dateiName =  _dateiName 

                WHERE
                        skizzeId = _skizzeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseSkizzeAufmasseId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseSkizzeAufmasseId`(
                _skizzeId  int(11)  
,_aufmasseId  int(11)  

            )
            BEGIN
                UPDATE  wt_AufMasseSkizze
                SET     aufmasseId =  _aufmasseId 

                WHERE
                        skizzeId = _skizzeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseSkizzeDateiName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateAufMasseSkizzeDateiName`(
                _skizzeId  int(11)  
,_dateiName  varchar(255)  

            )
            BEGIN
                UPDATE  wt_AufMasseSkizze
                SET     dateiName =  _dateiName 

                WHERE
                        skizzeId = _skizzeId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAufMasseSkizzeDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAufMasseSkizzeDetails`(_skizzeId  int(11)  
)
            BEGIN
                SELECT * FROM wt_AufMasseSkizze
                
                WHERE
                        skizzeId = _skizzeId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllCustomers`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllCustomers`()
            BEGIN
                SELECT wt_Customer.*
                FROM wt_Customer    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewCustomer`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewCustomer`(_name  varchar(50)  
,_lastName  varchar(50)  
,_email  varchar(100)  
,_phoneNumber  varchar(50)  
,_zipCode  varchar(10)  
,_city  varchar(50)  
,_street  varchar(50)  
)
            BEGIN
                INSERT INTO wt_Customer (
                    name  
,lastName  
,email  
,phoneNumber  
,zipCode  
,city  
,street  

                )
                VALUES (
                    _name  
,_lastName  
,_email  
,_phoneNumber  
,_zipCode  
,_city  
,_street  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteCustomer`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteCustomer`(_customerId  int(11)  
)
            BEGIN

                DELETE FROM wt_Customer
                WHERE  customerId = _customerId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllCustomers`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllCustomers`()
            BEGIN
                DELETE FROM wt_Customer;

            END$$


            DROP PROCEDURE IF EXISTS `updateCustomer`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateCustomer`(
                            _customerId  int(11)  
,_name  varchar(50)  
,_lastName  varchar(50)  
,_email  varchar(100)  
,_phoneNumber  varchar(50)  
,_zipCode  varchar(10)  
,_city  varchar(50)  
,_street  varchar(50)  

                  )
            BEGIN
                UPDATE  wt_Customer
                SET     name =  _name 
,lastName =  _lastName 
,email =  _email 
,phoneNumber =  _phoneNumber 
,zipCode =  _zipCode 
,city =  _city 
,street =  _street 

                WHERE
                        customerId = _customerId;
            END$$


            DROP PROCEDURE IF EXISTS `updateCustomerName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateCustomerName`(
                _customerId  int(11)  
,_name  varchar(50)  

            )
            BEGIN
                UPDATE  wt_Customer
                SET     name =  _name 

                WHERE
                        customerId = _customerId;
            END$$


            DROP PROCEDURE IF EXISTS `updateCustomerLastName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateCustomerLastName`(
                _customerId  int(11)  
,_lastName  varchar(50)  

            )
            BEGIN
                UPDATE  wt_Customer
                SET     lastName =  _lastName 

                WHERE
                        customerId = _customerId;
            END$$


            DROP PROCEDURE IF EXISTS `updateCustomerEmail`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateCustomerEmail`(
                _customerId  int(11)  
,_email  varchar(100)  

            )
            BEGIN
                UPDATE  wt_Customer
                SET     email =  _email 

                WHERE
                        customerId = _customerId;
            END$$


            DROP PROCEDURE IF EXISTS `updateCustomerPhoneNumber`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateCustomerPhoneNumber`(
                _customerId  int(11)  
,_phoneNumber  varchar(50)  

            )
            BEGIN
                UPDATE  wt_Customer
                SET     phoneNumber =  _phoneNumber 

                WHERE
                        customerId = _customerId;
            END$$


            DROP PROCEDURE IF EXISTS `updateCustomerZipCode`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateCustomerZipCode`(
                _customerId  int(11)  
,_zipCode  varchar(10)  

            )
            BEGIN
                UPDATE  wt_Customer
                SET     zipCode =  _zipCode 

                WHERE
                        customerId = _customerId;
            END$$


            DROP PROCEDURE IF EXISTS `updateCustomerCity`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateCustomerCity`(
                _customerId  int(11)  
,_city  varchar(50)  

            )
            BEGIN
                UPDATE  wt_Customer
                SET     city =  _city 

                WHERE
                        customerId = _customerId;
            END$$


            DROP PROCEDURE IF EXISTS `updateCustomerStreet`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateCustomerStreet`(
                _customerId  int(11)  
,_street  varchar(50)  

            )
            BEGIN
                UPDATE  wt_Customer
                SET     street =  _street 

                WHERE
                        customerId = _customerId;
            END$$


            DROP PROCEDURE IF EXISTS `selectCustomerDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectCustomerDetails`(_customerId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Customer
                
                WHERE
                        customerId = _customerId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllErfassungs`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllErfassungs`()
            BEGIN
                SELECT wt_Erfassung.*
                FROM wt_Erfassung    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewErfassung`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewErfassung`(_rapportId  int(11)  
,_bericht  text  
,_material  varchar(124)  
,_maschineAufwand  varchar(124)  
,_kilometer  float  
,_auftragAbgeschlossen  enum('ja','nein')  
,_datum  datetime  
)
            BEGIN
                INSERT INTO wt_Erfassung (
                    rapportId  
,bericht  
,material  
,maschineAufwand  
,kilometer  
,auftragAbgeschlossen  
,datum  

                )
                VALUES (
                    _rapportId  
,_bericht  
,_material  
,_maschineAufwand  
,_kilometer  
,_auftragAbgeschlossen  
,_datum  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteErfassung`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteErfassung`(_erfassungId  int(11)  
)
            BEGIN

                DELETE FROM wt_Erfassung
                WHERE  erfassungId = _erfassungId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllErfassungs`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllErfassungs`()
            BEGIN
                DELETE FROM wt_Erfassung;

            END$$


            DROP PROCEDURE IF EXISTS `updateErfassung`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassung`(
                            _erfassungId  int(11)  
,_rapportId  int(11)  
,_bericht  text  
,_material  varchar(124)  
,_maschineAufwand  varchar(124)  
,_kilometer  float  
,_auftragAbgeschlossen  enum('ja','nein')  
,_datum  datetime  

                  )
            BEGIN
                UPDATE  wt_Erfassung
                SET     rapportId =  _rapportId 
,bericht =  _bericht 
,material =  _material 
,maschineAufwand =  _maschineAufwand 
,kilometer =  _kilometer 
,auftragAbgeschlossen =  _auftragAbgeschlossen 
,datum =  _datum 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungRapportId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungRapportId`(
                _erfassungId  int(11)  
,_rapportId  int(11)  

            )
            BEGIN
                UPDATE  wt_Erfassung
                SET     rapportId =  _rapportId 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungBericht`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungBericht`(
                _erfassungId  int(11)  
,_bericht  text  

            )
            BEGIN
                UPDATE  wt_Erfassung
                SET     bericht =  _bericht 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungMaterial`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungMaterial`(
                _erfassungId  int(11)  
,_material  varchar(124)  

            )
            BEGIN
                UPDATE  wt_Erfassung
                SET     material =  _material 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungMaschineAufwand`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungMaschineAufwand`(
                _erfassungId  int(11)  
,_maschineAufwand  varchar(124)  

            )
            BEGIN
                UPDATE  wt_Erfassung
                SET     maschineAufwand =  _maschineAufwand 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungKilometer`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungKilometer`(
                _erfassungId  int(11)  
,_kilometer  float  

            )
            BEGIN
                UPDATE  wt_Erfassung
                SET     kilometer =  _kilometer 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungAuftragAbgeschlossen`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungAuftragAbgeschlossen`(
                _erfassungId  int(11)  
,_auftragAbgeschlossen  enum('ja','nein')  

            )
            BEGIN
                UPDATE  wt_Erfassung
                SET     auftragAbgeschlossen =  _auftragAbgeschlossen 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungDatum`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungDatum`(
                _erfassungId  int(11)  
,_datum  datetime  

            )
            BEGIN
                UPDATE  wt_Erfassung
                SET     datum =  _datum 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `selectErfassungDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectErfassungDetails`(_erfassungId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Erfassung
                
                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllErfassungBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllErfassungBilds`()
            BEGIN
                SELECT wt_ErfassungBild.*
                FROM wt_ErfassungBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewErfassungBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewErfassungBild`(_erfassungId  int(11)  
,_bildTyp  enum('vorArbeit','nachArbeit')  
,_dateiName  varchar(255)  
)
            BEGIN
                INSERT INTO wt_ErfassungBild (
                    erfassungId  
,bildTyp  
,dateiName  

                )
                VALUES (
                    _erfassungId  
,_bildTyp  
,_dateiName  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteErfassungBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteErfassungBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_ErfassungBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllErfassungBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllErfassungBilds`()
            BEGIN
                DELETE FROM wt_ErfassungBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungBild`(
                            _bildId  int(11)  
,_erfassungId  int(11)  
,_bildTyp  enum('vorArbeit','nachArbeit')  
,_dateiName  varchar(255)  

                  )
            BEGIN
                UPDATE  wt_ErfassungBild
                SET     erfassungId =  _erfassungId 
,bildTyp =  _bildTyp 
,dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungBildErfassungId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungBildErfassungId`(
                _bildId  int(11)  
,_erfassungId  int(11)  

            )
            BEGIN
                UPDATE  wt_ErfassungBild
                SET     erfassungId =  _erfassungId 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungBildBildTyp`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungBildBildTyp`(
                _bildId  int(11)  
,_bildTyp  enum('vorArbeit','nachArbeit')  

            )
            BEGIN
                UPDATE  wt_ErfassungBild
                SET     bildTyp =  _bildTyp 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungBildDateiName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungBildDateiName`(
                _bildId  int(11)  
,_dateiName  varchar(255)  

            )
            BEGIN
                UPDATE  wt_ErfassungBild
                SET     dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectErfassungBildDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectErfassungBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_ErfassungBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllErfassungOhneAuftrags`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllErfassungOhneAuftrags`()
            BEGIN
                SELECT wt_ErfassungOhneAuftrag.*
                FROM wt_ErfassungOhneAuftrag    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewErfassungOhneAuftrag`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewErfassungOhneAuftrag`(_kundenNummer  varchar(50)  
,_bericht  text  
,_material  varchar(124)  
,_maschineAufwand  varchar(124)  
,_kilometer  float  
,_unterschriftMitarbeiterDatei  varchar(100)  
,_unterschriftKundeDatei  varchar(100)  
,_auftragAbgeschlossen  enum('ja','nein')  
,_datum  datetime  
)
            BEGIN
                INSERT INTO wt_ErfassungOhneAuftrag (
                    kundenNummer  
,bericht  
,material  
,maschineAufwand  
,kilometer  
,unterschriftMitarbeiterDatei  
,unterschriftKundeDatei  
,auftragAbgeschlossen  
,datum  

                )
                VALUES (
                    _kundenNummer  
,_bericht  
,_material  
,_maschineAufwand  
,_kilometer  
,_unterschriftMitarbeiterDatei  
,_unterschriftKundeDatei  
,_auftragAbgeschlossen  
,_datum  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteErfassungOhneAuftrag`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteErfassungOhneAuftrag`(_erfassungId  int(11)  
)
            BEGIN

                DELETE FROM wt_ErfassungOhneAuftrag
                WHERE  erfassungId = _erfassungId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllErfassungOhneAuftrags`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllErfassungOhneAuftrags`()
            BEGIN
                DELETE FROM wt_ErfassungOhneAuftrag;

            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftrag`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftrag`(
                            _erfassungId  int(11)  
,_kundenNummer  varchar(50)  
,_bericht  text  
,_material  varchar(124)  
,_maschineAufwand  varchar(124)  
,_kilometer  float  
,_unterschriftMitarbeiterDatei  varchar(100)  
,_unterschriftKundeDatei  varchar(100)  
,_auftragAbgeschlossen  enum('ja','nein')  
,_datum  datetime  

                  )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftrag
                SET     kundenNummer =  _kundenNummer 
,bericht =  _bericht 
,material =  _material 
,maschineAufwand =  _maschineAufwand 
,kilometer =  _kilometer 
,unterschriftMitarbeiterDatei =  _unterschriftMitarbeiterDatei 
,unterschriftKundeDatei =  _unterschriftKundeDatei 
,auftragAbgeschlossen =  _auftragAbgeschlossen 
,datum =  _datum 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragKundenNummer`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragKundenNummer`(
                _erfassungId  int(11)  
,_kundenNummer  varchar(50)  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftrag
                SET     kundenNummer =  _kundenNummer 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragBericht`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragBericht`(
                _erfassungId  int(11)  
,_bericht  text  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftrag
                SET     bericht =  _bericht 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragMaterial`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragMaterial`(
                _erfassungId  int(11)  
,_material  varchar(124)  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftrag
                SET     material =  _material 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragMaschineAufwand`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragMaschineAufwand`(
                _erfassungId  int(11)  
,_maschineAufwand  varchar(124)  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftrag
                SET     maschineAufwand =  _maschineAufwand 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragKilometer`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragKilometer`(
                _erfassungId  int(11)  
,_kilometer  float  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftrag
                SET     kilometer =  _kilometer 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragUnterschriftMitarbeiterDatei`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragUnterschriftMitarbeiterDatei`(
                _erfassungId  int(11)  
,_unterschriftMitarbeiterDatei  varchar(100)  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftrag
                SET     unterschriftMitarbeiterDatei =  _unterschriftMitarbeiterDatei 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragUnterschriftKundeDatei`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragUnterschriftKundeDatei`(
                _erfassungId  int(11)  
,_unterschriftKundeDatei  varchar(100)  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftrag
                SET     unterschriftKundeDatei =  _unterschriftKundeDatei 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragAuftragAbgeschlossen`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragAuftragAbgeschlossen`(
                _erfassungId  int(11)  
,_auftragAbgeschlossen  enum('ja','nein')  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftrag
                SET     auftragAbgeschlossen =  _auftragAbgeschlossen 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragDatum`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragDatum`(
                _erfassungId  int(11)  
,_datum  datetime  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftrag
                SET     datum =  _datum 

                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `selectErfassungOhneAuftragDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectErfassungOhneAuftragDetails`(_erfassungId  int(11)  
)
            BEGIN
                SELECT * FROM wt_ErfassungOhneAuftrag
                
                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllErfassungOhneAuftragBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllErfassungOhneAuftragBilds`()
            BEGIN
                SELECT wt_ErfassungOhneAuftragBild.*
                FROM wt_ErfassungOhneAuftragBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewErfassungOhneAuftragBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewErfassungOhneAuftragBild`(_erfassungId  int(11)  
,_bildTyp  enum('vorArbeit','nachArbeit')  
,_dateiName  varchar(255)  
)
            BEGIN
                INSERT INTO wt_ErfassungOhneAuftragBild (
                    erfassungId  
,bildTyp  
,dateiName  

                )
                VALUES (
                    _erfassungId  
,_bildTyp  
,_dateiName  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteErfassungOhneAuftragBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteErfassungOhneAuftragBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_ErfassungOhneAuftragBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllErfassungOhneAuftragBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllErfassungOhneAuftragBilds`()
            BEGIN
                DELETE FROM wt_ErfassungOhneAuftragBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragBild`(
                            _bildId  int(11)  
,_erfassungId  int(11)  
,_bildTyp  enum('vorArbeit','nachArbeit')  
,_dateiName  varchar(255)  

                  )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftragBild
                SET     erfassungId =  _erfassungId 
,bildTyp =  _bildTyp 
,dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragBildErfassungId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragBildErfassungId`(
                _bildId  int(11)  
,_erfassungId  int(11)  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftragBild
                SET     erfassungId =  _erfassungId 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragBildBildTyp`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragBildBildTyp`(
                _bildId  int(11)  
,_bildTyp  enum('vorArbeit','nachArbeit')  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftragBild
                SET     bildTyp =  _bildTyp 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragBildDateiName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateErfassungOhneAuftragBildDateiName`(
                _bildId  int(11)  
,_dateiName  varchar(255)  

            )
            BEGIN
                UPDATE  wt_ErfassungOhneAuftragBild
                SET     dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectErfassungOhneAuftragBildDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectErfassungOhneAuftragBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_ErfassungOhneAuftragBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllFertigungs`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllFertigungs`()
            BEGIN
                SELECT wt_Fertigung.*
                FROM wt_Fertigung    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewFertigung`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewFertigung`(_rapportId  int(11)  
,_nachbearbeitung  enum('ja','nein')  
,_lackieren  enum('ja','nein')  
,_beschichten  enum('ja','nein')  
,_strahlen  enum('ja','nein')  
,_auftragAbgeschlossen  enum('ja','nein')  
,_datum  datetime  
)
            BEGIN
                INSERT INTO wt_Fertigung (
                    rapportId  
,nachbearbeitung  
,lackieren  
,beschichten  
,strahlen  
,auftragAbgeschlossen  
,datum  

                )
                VALUES (
                    _rapportId  
,_nachbearbeitung  
,_lackieren  
,_beschichten  
,_strahlen  
,_auftragAbgeschlossen  
,_datum  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteFertigung`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteFertigung`(_fertigungId  int(11)  
)
            BEGIN

                DELETE FROM wt_Fertigung
                WHERE  fertigungId = _fertigungId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllFertigungs`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllFertigungs`()
            BEGIN
                DELETE FROM wt_Fertigung;

            END$$


            DROP PROCEDURE IF EXISTS `updateFertigung`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigung`(
                            _fertigungId  int(11)  
,_rapportId  int(11)  
,_nachbearbeitung  enum('ja','nein')  
,_lackieren  enum('ja','nein')  
,_beschichten  enum('ja','nein')  
,_strahlen  enum('ja','nein')  
,_auftragAbgeschlossen  enum('ja','nein')  
,_datum  datetime  

                  )
            BEGIN
                UPDATE  wt_Fertigung
                SET     rapportId =  _rapportId 
,nachbearbeitung =  _nachbearbeitung 
,lackieren =  _lackieren 
,beschichten =  _beschichten 
,strahlen =  _strahlen 
,auftragAbgeschlossen =  _auftragAbgeschlossen 
,datum =  _datum 

                WHERE
                        fertigungId = _fertigungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungRapportId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigungRapportId`(
                _fertigungId  int(11)  
,_rapportId  int(11)  

            )
            BEGIN
                UPDATE  wt_Fertigung
                SET     rapportId =  _rapportId 

                WHERE
                        fertigungId = _fertigungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungNachbearbeitung`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigungNachbearbeitung`(
                _fertigungId  int(11)  
,_nachbearbeitung  enum('ja','nein')  

            )
            BEGIN
                UPDATE  wt_Fertigung
                SET     nachbearbeitung =  _nachbearbeitung 

                WHERE
                        fertigungId = _fertigungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungLackieren`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigungLackieren`(
                _fertigungId  int(11)  
,_lackieren  enum('ja','nein')  

            )
            BEGIN
                UPDATE  wt_Fertigung
                SET     lackieren =  _lackieren 

                WHERE
                        fertigungId = _fertigungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungBeschichten`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigungBeschichten`(
                _fertigungId  int(11)  
,_beschichten  enum('ja','nein')  

            )
            BEGIN
                UPDATE  wt_Fertigung
                SET     beschichten =  _beschichten 

                WHERE
                        fertigungId = _fertigungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungStrahlen`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigungStrahlen`(
                _fertigungId  int(11)  
,_strahlen  enum('ja','nein')  

            )
            BEGIN
                UPDATE  wt_Fertigung
                SET     strahlen =  _strahlen 

                WHERE
                        fertigungId = _fertigungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungAuftragAbgeschlossen`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigungAuftragAbgeschlossen`(
                _fertigungId  int(11)  
,_auftragAbgeschlossen  enum('ja','nein')  

            )
            BEGIN
                UPDATE  wt_Fertigung
                SET     auftragAbgeschlossen =  _auftragAbgeschlossen 

                WHERE
                        fertigungId = _fertigungId;
            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungDatum`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigungDatum`(
                _fertigungId  int(11)  
,_datum  datetime  

            )
            BEGIN
                UPDATE  wt_Fertigung
                SET     datum =  _datum 

                WHERE
                        fertigungId = _fertigungId;
            END$$


            DROP PROCEDURE IF EXISTS `selectFertigungDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectFertigungDetails`(_fertigungId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Fertigung
                
                WHERE
                        fertigungId = _fertigungId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllFertigungBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllFertigungBilds`()
            BEGIN
                SELECT wt_FertigungBild.*
                FROM wt_FertigungBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewFertigungBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewFertigungBild`(_fertigungId  int(11)  
,_dateiName  varchar(255)  
)
            BEGIN
                INSERT INTO wt_FertigungBild (
                    fertigungId  
,dateiName  

                )
                VALUES (
                    _fertigungId  
,_dateiName  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteFertigungBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteFertigungBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_FertigungBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllFertigungBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllFertigungBilds`()
            BEGIN
                DELETE FROM wt_FertigungBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigungBild`(
                            _bildId  int(11)  
,_fertigungId  int(11)  
,_dateiName  varchar(255)  

                  )
            BEGIN
                UPDATE  wt_FertigungBild
                SET     fertigungId =  _fertigungId 
,dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungBildFertigungId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigungBildFertigungId`(
                _bildId  int(11)  
,_fertigungId  int(11)  

            )
            BEGIN
                UPDATE  wt_FertigungBild
                SET     fertigungId =  _fertigungId 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungBildDateiName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateFertigungBildDateiName`(
                _bildId  int(11)  
,_dateiName  varchar(255)  

            )
            BEGIN
                UPDATE  wt_FertigungBild
                SET     dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectFertigungBildDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectFertigungBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_FertigungBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllLogActivities`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllLogActivities`()
            BEGIN
                SELECT wt_LogActivity.*,wt_User.*
                FROM wt_LogActivity   LEFT JOIN wt_User ON  wt_LogActivity.userId = wt_User.userId  
   ORDER BY wt_LogActivity.date  DESC;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewLogActivity`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewLogActivity`(_userId  int(11)  
,_summary  text  
,_date  datetime  
)
            BEGIN
                INSERT INTO wt_LogActivity (
                    userId  
,summary  
,date  

                )
                VALUES (
                    _userId  
,_summary  
,_date  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteLogActivity`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteLogActivity`(_activityId  int(11)  
)
            BEGIN

                DELETE FROM wt_LogActivity
                WHERE  activityId = _activityId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllLogActivities`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllLogActivities`()
            BEGIN
                DELETE FROM wt_LogActivity;

            END$$


            DROP PROCEDURE IF EXISTS `updateLogActivity`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateLogActivity`(
                            _activityId  int(11)  
,_userId  int(11)  
,_summary  text  
,_date  datetime  

                  )
            BEGIN
                UPDATE  wt_LogActivity
                SET     userId =  _userId 
,summary =  _summary 
,date =  _date 

                WHERE
                        activityId = _activityId;
            END$$


            DROP PROCEDURE IF EXISTS `updateLogActivityUserId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateLogActivityUserId`(
                _activityId  int(11)  
,_userId  int(11)  

            )
            BEGIN
                UPDATE  wt_LogActivity
                SET     userId =  _userId 

                WHERE
                        activityId = _activityId;
            END$$


            DROP PROCEDURE IF EXISTS `updateLogActivitySummary`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateLogActivitySummary`(
                _activityId  int(11)  
,_summary  text  

            )
            BEGIN
                UPDATE  wt_LogActivity
                SET     summary =  _summary 

                WHERE
                        activityId = _activityId;
            END$$


            DROP PROCEDURE IF EXISTS `updateLogActivityDate`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateLogActivityDate`(
                _activityId  int(11)  
,_date  datetime  

            )
            BEGIN
                UPDATE  wt_LogActivity
                SET     date =  _date 

                WHERE
                        activityId = _activityId;
            END$$


            DROP PROCEDURE IF EXISTS `selectLogActivityDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectLogActivityDetails`(_activityId  int(11)  
)
            BEGIN
                SELECT * FROM wt_LogActivity
                 LEFT JOIN wt_User ON  wt_LogActivity.userId = wt_User.userId  

                WHERE
                        activityId = _activityId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllMontages`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllMontages`()
            BEGIN
                SELECT wt_Montage.*
                FROM wt_Montage    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewMontage`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewMontage`(_rapportId  int(11)  
,_bericht  text  
,_aufnahmeUnterschriftDatei  varchar(124)  
,_auftragAbgeschlossen  enum('ja','nein')  
,_datum  datetime  
)
            BEGIN
                INSERT INTO wt_Montage (
                    rapportId  
,bericht  
,aufnahmeUnterschriftDatei  
,auftragAbgeschlossen  
,datum  

                )
                VALUES (
                    _rapportId  
,_bericht  
,_aufnahmeUnterschriftDatei  
,_auftragAbgeschlossen  
,_datum  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteMontage`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteMontage`(_montageId  int(11)  
)
            BEGIN

                DELETE FROM wt_Montage
                WHERE  montageId = _montageId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllMontages`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllMontages`()
            BEGIN
                DELETE FROM wt_Montage;

            END$$


            DROP PROCEDURE IF EXISTS `updateMontage`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateMontage`(
                            _montageId  int(11)  
,_rapportId  int(11)  
,_bericht  text  
,_aufnahmeUnterschriftDatei  varchar(124)  
,_auftragAbgeschlossen  enum('ja','nein')  
,_datum  datetime  

                  )
            BEGIN
                UPDATE  wt_Montage
                SET     rapportId =  _rapportId 
,bericht =  _bericht 
,aufnahmeUnterschriftDatei =  _aufnahmeUnterschriftDatei 
,auftragAbgeschlossen =  _auftragAbgeschlossen 
,datum =  _datum 

                WHERE
                        montageId = _montageId;
            END$$


            DROP PROCEDURE IF EXISTS `updateMontageRapportId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateMontageRapportId`(
                _montageId  int(11)  
,_rapportId  int(11)  

            )
            BEGIN
                UPDATE  wt_Montage
                SET     rapportId =  _rapportId 

                WHERE
                        montageId = _montageId;
            END$$


            DROP PROCEDURE IF EXISTS `updateMontageBericht`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateMontageBericht`(
                _montageId  int(11)  
,_bericht  text  

            )
            BEGIN
                UPDATE  wt_Montage
                SET     bericht =  _bericht 

                WHERE
                        montageId = _montageId;
            END$$


            DROP PROCEDURE IF EXISTS `updateMontageAufnahmeUnterschriftDatei`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateMontageAufnahmeUnterschriftDatei`(
                _montageId  int(11)  
,_aufnahmeUnterschriftDatei  varchar(124)  

            )
            BEGIN
                UPDATE  wt_Montage
                SET     aufnahmeUnterschriftDatei =  _aufnahmeUnterschriftDatei 

                WHERE
                        montageId = _montageId;
            END$$


            DROP PROCEDURE IF EXISTS `updateMontageAuftragAbgeschlossen`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateMontageAuftragAbgeschlossen`(
                _montageId  int(11)  
,_auftragAbgeschlossen  enum('ja','nein')  

            )
            BEGIN
                UPDATE  wt_Montage
                SET     auftragAbgeschlossen =  _auftragAbgeschlossen 

                WHERE
                        montageId = _montageId;
            END$$


            DROP PROCEDURE IF EXISTS `updateMontageDatum`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateMontageDatum`(
                _montageId  int(11)  
,_datum  datetime  

            )
            BEGIN
                UPDATE  wt_Montage
                SET     datum =  _datum 

                WHERE
                        montageId = _montageId;
            END$$


            DROP PROCEDURE IF EXISTS `selectMontageDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectMontageDetails`(_montageId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Montage
                
                WHERE
                        montageId = _montageId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllMontageBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllMontageBilds`()
            BEGIN
                SELECT wt_MontageBild.*
                FROM wt_MontageBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewMontageBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewMontageBild`(_montageId  int(11)  
,_bildTyp  enum('vorArbeit','nachArbeit')  
,_dateiName  varchar(255)  
)
            BEGIN
                INSERT INTO wt_MontageBild (
                    montageId  
,bildTyp  
,dateiName  

                )
                VALUES (
                    _montageId  
,_bildTyp  
,_dateiName  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteMontageBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteMontageBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_MontageBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllMontageBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllMontageBilds`()
            BEGIN
                DELETE FROM wt_MontageBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateMontageBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateMontageBild`(
                            _bildId  int(11)  
,_montageId  int(11)  
,_bildTyp  enum('vorArbeit','nachArbeit')  
,_dateiName  varchar(255)  

                  )
            BEGIN
                UPDATE  wt_MontageBild
                SET     montageId =  _montageId 
,bildTyp =  _bildTyp 
,dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateMontageBildMontageId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateMontageBildMontageId`(
                _bildId  int(11)  
,_montageId  int(11)  

            )
            BEGIN
                UPDATE  wt_MontageBild
                SET     montageId =  _montageId 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateMontageBildBildTyp`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateMontageBildBildTyp`(
                _bildId  int(11)  
,_bildTyp  enum('vorArbeit','nachArbeit')  

            )
            BEGIN
                UPDATE  wt_MontageBild
                SET     bildTyp =  _bildTyp 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateMontageBildDateiName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateMontageBildDateiName`(
                _bildId  int(11)  
,_dateiName  varchar(255)  

            )
            BEGIN
                UPDATE  wt_MontageBild
                SET     dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectMontageBildDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectMontageBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_MontageBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllNachtrags`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllNachtrags`()
            BEGIN
                SELECT wt_Nachtrag.*
                FROM wt_Nachtrag    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewNachtrag`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewNachtrag`(_rapportId  int(11)  
,_aufsprache  varchar(255)  
,_freierText  varchar(100)  
,_datum  datetime  
)
            BEGIN
                INSERT INTO wt_Nachtrag (
                    rapportId  
,aufsprache  
,freierText  
,datum  

                )
                VALUES (
                    _rapportId  
,_aufsprache  
,_freierText  
,_datum  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteNachtrag`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteNachtrag`(_nachtragId  int(11)  
)
            BEGIN

                DELETE FROM wt_Nachtrag
                WHERE  nachtragId = _nachtragId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllNachtrags`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllNachtrags`()
            BEGIN
                DELETE FROM wt_Nachtrag;

            END$$


            DROP PROCEDURE IF EXISTS `updateNachtrag`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtrag`(
                            _nachtragId  int(11)  
,_rapportId  int(11)  
,_aufsprache  varchar(255)  
,_freierText  varchar(100)  
,_datum  datetime  

                  )
            BEGIN
                UPDATE  wt_Nachtrag
                SET     rapportId =  _rapportId 
,aufsprache =  _aufsprache 
,freierText =  _freierText 
,datum =  _datum 

                WHERE
                        nachtragId = _nachtragId;
            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragRapportId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtragRapportId`(
                _nachtragId  int(11)  
,_rapportId  int(11)  

            )
            BEGIN
                UPDATE  wt_Nachtrag
                SET     rapportId =  _rapportId 

                WHERE
                        nachtragId = _nachtragId;
            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragAufsprache`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtragAufsprache`(
                _nachtragId  int(11)  
,_aufsprache  varchar(255)  

            )
            BEGIN
                UPDATE  wt_Nachtrag
                SET     aufsprache =  _aufsprache 

                WHERE
                        nachtragId = _nachtragId;
            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragFreierText`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtragFreierText`(
                _nachtragId  int(11)  
,_freierText  varchar(100)  

            )
            BEGIN
                UPDATE  wt_Nachtrag
                SET     freierText =  _freierText 

                WHERE
                        nachtragId = _nachtragId;
            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragDatum`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtragDatum`(
                _nachtragId  int(11)  
,_datum  datetime  

            )
            BEGIN
                UPDATE  wt_Nachtrag
                SET     datum =  _datum 

                WHERE
                        nachtragId = _nachtragId;
            END$$


            DROP PROCEDURE IF EXISTS `selectNachtragDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectNachtragDetails`(_nachtragId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Nachtrag
                
                WHERE
                        nachtragId = _nachtragId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllNachtragBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllNachtragBilds`()
            BEGIN
                SELECT wt_NachtragBild.*
                FROM wt_NachtragBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewNachtragBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewNachtragBild`(_nachtragId  int(11)  
,_dateiName  varchar(255)  
)
            BEGIN
                INSERT INTO wt_NachtragBild (
                    nachtragId  
,dateiName  

                )
                VALUES (
                    _nachtragId  
,_dateiName  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteNachtragBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteNachtragBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_NachtragBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllNachtragBilds`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllNachtragBilds`()
            BEGIN
                DELETE FROM wt_NachtragBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragBild`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtragBild`(
                            _bildId  int(11)  
,_nachtragId  int(11)  
,_dateiName  varchar(255)  

                  )
            BEGIN
                UPDATE  wt_NachtragBild
                SET     nachtragId =  _nachtragId 
,dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragBildNachtragId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtragBildNachtragId`(
                _bildId  int(11)  
,_nachtragId  int(11)  

            )
            BEGIN
                UPDATE  wt_NachtragBild
                SET     nachtragId =  _nachtragId 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragBildDateiName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtragBildDateiName`(
                _bildId  int(11)  
,_dateiName  varchar(255)  

            )
            BEGIN
                UPDATE  wt_NachtragBild
                SET     dateiName =  _dateiName 

                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectNachtragBildDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectNachtragBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_NachtragBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllNachtragSkizzes`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllNachtragSkizzes`()
            BEGIN
                SELECT wt_NachtragSkizze.*
                FROM wt_NachtragSkizze    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewNachtragSkizze`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewNachtragSkizze`(_nachtragId  int(11)  
,_dateiName  varchar(255)  
)
            BEGIN
                INSERT INTO wt_NachtragSkizze (
                    nachtragId  
,dateiName  

                )
                VALUES (
                    _nachtragId  
,_dateiName  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteNachtragSkizze`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteNachtragSkizze`(_skizzeId  int(11)  
)
            BEGIN

                DELETE FROM wt_NachtragSkizze
                WHERE  skizzeId = _skizzeId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllNachtragSkizzes`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllNachtragSkizzes`()
            BEGIN
                DELETE FROM wt_NachtragSkizze;

            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragSkizze`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtragSkizze`(
                            _skizzeId  int(11)  
,_nachtragId  int(11)  
,_dateiName  varchar(255)  

                  )
            BEGIN
                UPDATE  wt_NachtragSkizze
                SET     nachtragId =  _nachtragId 
,dateiName =  _dateiName 

                WHERE
                        skizzeId = _skizzeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragSkizzeNachtragId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtragSkizzeNachtragId`(
                _skizzeId  int(11)  
,_nachtragId  int(11)  

            )
            BEGIN
                UPDATE  wt_NachtragSkizze
                SET     nachtragId =  _nachtragId 

                WHERE
                        skizzeId = _skizzeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragSkizzeDateiName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateNachtragSkizzeDateiName`(
                _skizzeId  int(11)  
,_dateiName  varchar(255)  

            )
            BEGIN
                UPDATE  wt_NachtragSkizze
                SET     dateiName =  _dateiName 

                WHERE
                        skizzeId = _skizzeId;
            END$$


            DROP PROCEDURE IF EXISTS `selectNachtragSkizzeDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectNachtragSkizzeDetails`(_skizzeId  int(11)  
)
            BEGIN
                SELECT * FROM wt_NachtragSkizze
                
                WHERE
                        skizzeId = _skizzeId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllOrders`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllOrders`()
            BEGIN
                SELECT wt_Order.*
                FROM wt_Order    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewOrder`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewOrder`(_title  varchar(128)  
,_projectId  int(11)  
,_date  datetime  
)
            BEGIN
                INSERT INTO wt_Order (
                    title  
,projectId  
,date  

                )
                VALUES (
                    _title  
,_projectId  
,_date  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteOrder`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteOrder`(_orderId  int(11)  
)
            BEGIN

                DELETE FROM wt_Order
                WHERE  orderId = _orderId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllOrders`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllOrders`()
            BEGIN
                DELETE FROM wt_Order;

            END$$


            DROP PROCEDURE IF EXISTS `updateOrder`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateOrder`(
                            _orderId  int(11)  
,_title  varchar(128)  
,_projectId  int(11)  
,_date  datetime  

                  )
            BEGIN
                UPDATE  wt_Order
                SET     title =  _title 
,projectId =  _projectId 
,date =  _date 

                WHERE
                        orderId = _orderId;
            END$$


            DROP PROCEDURE IF EXISTS `updateOrderTitle`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateOrderTitle`(
                _orderId  int(11)  
,_title  varchar(128)  

            )
            BEGIN
                UPDATE  wt_Order
                SET     title =  _title 

                WHERE
                        orderId = _orderId;
            END$$


            DROP PROCEDURE IF EXISTS `updateOrderProjectId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateOrderProjectId`(
                _orderId  int(11)  
,_projectId  int(11)  

            )
            BEGIN
                UPDATE  wt_Order
                SET     projectId =  _projectId 

                WHERE
                        orderId = _orderId;
            END$$


            DROP PROCEDURE IF EXISTS `updateOrderDate`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateOrderDate`(
                _orderId  int(11)  
,_date  datetime  

            )
            BEGIN
                UPDATE  wt_Order
                SET     date =  _date 

                WHERE
                        orderId = _orderId;
            END$$


            DROP PROCEDURE IF EXISTS `selectOrderDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectOrderDetails`(_orderId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Order
                
                WHERE
                        orderId = _orderId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllProjects`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllProjects`()
            BEGIN
                SELECT wt_Project.*,wt_User.*
                FROM wt_Project   LEFT JOIN wt_User ON  wt_Project.userId = wt_User.userId  
   ORDER BY wt_Project.title  ASC;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewProject`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewProject`(_customerId  int(11)  
,_title  varchar(128)  
,_creationDate  datetime  
,_status  enum('STARTED','PROGRESS','CANCELLED','DONE')  
,_hasOrder  bit(1)  
)
            BEGIN
                INSERT INTO wt_Project (
                    customerId  
,title  
,creationDate  
,status  
,hasOrder  

                )
                VALUES (
                    _customerId  
,_title  
,_creationDate  
,_status  
,_hasOrder  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteProject`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteProject`(_projectId  int(11)  
)
            BEGIN

                DELETE FROM wt_Project
                WHERE  projectId = _projectId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllProjects`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllProjects`()
            BEGIN
                DELETE FROM wt_Project;

            END$$


            DROP PROCEDURE IF EXISTS `updateProject`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateProject`(
                            _projectId  int(11)  
,_customerId  int(11)  
,_title  varchar(128)  
,_creationDate  datetime  
,_status  enum('STARTED','PROGRESS','CANCELLED','DONE')  
,_hasOrder  bit(1)  

                  )
            BEGIN
                UPDATE  wt_Project
                SET     customerId =  _customerId 
,title =  _title 
,creationDate =  _creationDate 
,status =  _status 
,hasOrder =  _hasOrder 

                WHERE
                        projectId = _projectId;
            END$$


            DROP PROCEDURE IF EXISTS `updateProjectCustomerId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateProjectCustomerId`(
                _projectId  int(11)  
,_customerId  int(11)  

            )
            BEGIN
                UPDATE  wt_Project
                SET     customerId =  _customerId 

                WHERE
                        projectId = _projectId;
            END$$


            DROP PROCEDURE IF EXISTS `updateProjectTitle`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateProjectTitle`(
                _projectId  int(11)  
,_title  varchar(128)  

            )
            BEGIN
                UPDATE  wt_Project
                SET     title =  _title 

                WHERE
                        projectId = _projectId;
            END$$


            DROP PROCEDURE IF EXISTS `updateProjectCreationDate`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateProjectCreationDate`(
                _projectId  int(11)  
,_creationDate  datetime  

            )
            BEGIN
                UPDATE  wt_Project
                SET     creationDate =  _creationDate 

                WHERE
                        projectId = _projectId;
            END$$


            DROP PROCEDURE IF EXISTS `updateProjectStatus`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateProjectStatus`(
                _projectId  int(11)  
,_status  enum('STARTED','PROGRESS','CANCELLED','DONE')  

            )
            BEGIN
                UPDATE  wt_Project
                SET     status =  _status 

                WHERE
                        projectId = _projectId;
            END$$


            DROP PROCEDURE IF EXISTS `updateProjectHasOrder`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateProjectHasOrder`(
                _projectId  int(11)  
,_hasOrder  bit(1)  

            )
            BEGIN
                UPDATE  wt_Project
                SET     hasOrder =  _hasOrder 

                WHERE
                        projectId = _projectId;
            END$$


            DROP PROCEDURE IF EXISTS `selectProjectDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectProjectDetails`(_projectId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Project
                 LEFT JOIN wt_User ON  wt_Project.userId = wt_User.userId  

                WHERE
                        projectId = _projectId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllRapports`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllRapports`()
            BEGIN
                SELECT wt_Rapport.*
                FROM wt_Rapport    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewRapport`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewRapport`(_userId  int(11)  
,_auftragNummer  varchar(100)  
,_bezeichnung  varchar(100)  
,_datum  datetime  
)
            BEGIN
                INSERT INTO wt_Rapport (
                    userId  
,auftragNummer  
,bezeichnung  
,datum  

                )
                VALUES (
                    _userId  
,_auftragNummer  
,_bezeichnung  
,_datum  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteRapport`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteRapport`(_rapportId  int(11)  
)
            BEGIN

                DELETE FROM wt_Rapport
                WHERE  rapportId = _rapportId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllRapports`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllRapports`()
            BEGIN
                DELETE FROM wt_Rapport;

            END$$


            DROP PROCEDURE IF EXISTS `updateRapport`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateRapport`(
                            _rapportId  int(11)  
,_userId  int(11)  
,_auftragNummer  varchar(100)  
,_bezeichnung  varchar(100)  
,_datum  datetime  

                  )
            BEGIN
                UPDATE  wt_Rapport
                SET     userId =  _userId 
,auftragNummer =  _auftragNummer 
,bezeichnung =  _bezeichnung 
,datum =  _datum 

                WHERE
                        rapportId = _rapportId;
            END$$


            DROP PROCEDURE IF EXISTS `updateRapportUserId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateRapportUserId`(
                _rapportId  int(11)  
,_userId  int(11)  

            )
            BEGIN
                UPDATE  wt_Rapport
                SET     userId =  _userId 

                WHERE
                        rapportId = _rapportId;
            END$$


            DROP PROCEDURE IF EXISTS `updateRapportAuftragNummer`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateRapportAuftragNummer`(
                _rapportId  int(11)  
,_auftragNummer  varchar(100)  

            )
            BEGIN
                UPDATE  wt_Rapport
                SET     auftragNummer =  _auftragNummer 

                WHERE
                        rapportId = _rapportId;
            END$$


            DROP PROCEDURE IF EXISTS `updateRapportBezeichnung`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateRapportBezeichnung`(
                _rapportId  int(11)  
,_bezeichnung  varchar(100)  

            )
            BEGIN
                UPDATE  wt_Rapport
                SET     bezeichnung =  _bezeichnung 

                WHERE
                        rapportId = _rapportId;
            END$$


            DROP PROCEDURE IF EXISTS `updateRapportDatum`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateRapportDatum`(
                _rapportId  int(11)  
,_datum  datetime  

            )
            BEGIN
                UPDATE  wt_Rapport
                SET     datum =  _datum 

                WHERE
                        rapportId = _rapportId;
            END$$


            DROP PROCEDURE IF EXISTS `selectRapportDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectRapportDetails`(_rapportId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Rapport
                
                WHERE
                        rapportId = _rapportId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllTasks`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllTasks`()
            BEGIN
                SELECT wt_Task.*
                FROM wt_Task    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewTask`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewTask`(_projectId  int(11)  
,_title  varchar(128)  
,_date  datetime  
,_descriptionFileName  varchar(128)  
,_summary  text  
)
            BEGIN
                INSERT INTO wt_Task (
                    projectId  
,title  
,date  
,descriptionFileName  
,summary  

                )
                VALUES (
                    _projectId  
,_title  
,_date  
,_descriptionFileName  
,_summary  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteTask`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteTask`(_taskId  int(11)  
)
            BEGIN

                DELETE FROM wt_Task
                WHERE  taskId = _taskId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllTasks`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllTasks`()
            BEGIN
                DELETE FROM wt_Task;

            END$$


            DROP PROCEDURE IF EXISTS `updateTask`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTask`(
                            _taskId  int(11)  
,_projectId  int(11)  
,_title  varchar(128)  
,_date  datetime  
,_descriptionFileName  varchar(128)  
,_summary  text  

                  )
            BEGIN
                UPDATE  wt_Task
                SET     projectId =  _projectId 
,title =  _title 
,date =  _date 
,descriptionFileName =  _descriptionFileName 
,summary =  _summary 

                WHERE
                        taskId = _taskId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskProjectId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskProjectId`(
                _taskId  int(11)  
,_projectId  int(11)  

            )
            BEGIN
                UPDATE  wt_Task
                SET     projectId =  _projectId 

                WHERE
                        taskId = _taskId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskTitle`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskTitle`(
                _taskId  int(11)  
,_title  varchar(128)  

            )
            BEGIN
                UPDATE  wt_Task
                SET     title =  _title 

                WHERE
                        taskId = _taskId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskDate`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskDate`(
                _taskId  int(11)  
,_date  datetime  

            )
            BEGIN
                UPDATE  wt_Task
                SET     date =  _date 

                WHERE
                        taskId = _taskId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskDescriptionFileName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskDescriptionFileName`(
                _taskId  int(11)  
,_descriptionFileName  varchar(128)  

            )
            BEGIN
                UPDATE  wt_Task
                SET     descriptionFileName =  _descriptionFileName 

                WHERE
                        taskId = _taskId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskSummary`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskSummary`(
                _taskId  int(11)  
,_summary  text  

            )
            BEGIN
                UPDATE  wt_Task
                SET     summary =  _summary 

                WHERE
                        taskId = _taskId;
            END$$


            DROP PROCEDURE IF EXISTS `selectTaskDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectTaskDetails`(_taskId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Task
                
                WHERE
                        taskId = _taskId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllTaskLogTimes`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllTaskLogTimes`()
            BEGIN
                SELECT wt_TaskLogTime.*
                FROM wt_TaskLogTime    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewTaskLogTime`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewTaskLogTime`(_userId  int(11)  
,_taskId  int(11)  
,_title  varchar(50)  
,_startTime  datetime  
,_endTime  datetime  
,_summary  text  
,_date  datetime  
)
            BEGIN
                INSERT INTO wt_TaskLogTime (
                    userId  
,taskId  
,title  
,startTime  
,endTime  
,summary  
,date  

                )
                VALUES (
                    _userId  
,_taskId  
,_title  
,_startTime  
,_endTime  
,_summary  
,_date  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteTaskLogTime`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteTaskLogTime`(_taskLogTimeId  int(11)  
)
            BEGIN

                DELETE FROM wt_TaskLogTime
                WHERE  taskLogTimeId = _taskLogTimeId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllTaskLogTimes`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllTaskLogTimes`()
            BEGIN
                DELETE FROM wt_TaskLogTime;

            END$$


            DROP PROCEDURE IF EXISTS `updateTaskLogTime`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskLogTime`(
                            _taskLogTimeId  int(11)  
,_userId  int(11)  
,_taskId  int(11)  
,_title  varchar(50)  
,_startTime  datetime  
,_endTime  datetime  
,_summary  text  
,_date  datetime  

                  )
            BEGIN
                UPDATE  wt_TaskLogTime
                SET     userId =  _userId 
,taskId =  _taskId 
,title =  _title 
,startTime =  _startTime 
,endTime =  _endTime 
,summary =  _summary 
,date =  _date 

                WHERE
                        taskLogTimeId = _taskLogTimeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskLogTimeUserId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskLogTimeUserId`(
                _taskLogTimeId  int(11)  
,_userId  int(11)  

            )
            BEGIN
                UPDATE  wt_TaskLogTime
                SET     userId =  _userId 

                WHERE
                        taskLogTimeId = _taskLogTimeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskLogTimeTaskId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskLogTimeTaskId`(
                _taskLogTimeId  int(11)  
,_taskId  int(11)  

            )
            BEGIN
                UPDATE  wt_TaskLogTime
                SET     taskId =  _taskId 

                WHERE
                        taskLogTimeId = _taskLogTimeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskLogTimeTitle`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskLogTimeTitle`(
                _taskLogTimeId  int(11)  
,_title  varchar(50)  

            )
            BEGIN
                UPDATE  wt_TaskLogTime
                SET     title =  _title 

                WHERE
                        taskLogTimeId = _taskLogTimeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskLogTimeStartTime`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskLogTimeStartTime`(
                _taskLogTimeId  int(11)  
,_startTime  datetime  

            )
            BEGIN
                UPDATE  wt_TaskLogTime
                SET     startTime =  _startTime 

                WHERE
                        taskLogTimeId = _taskLogTimeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskLogTimeEndTime`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskLogTimeEndTime`(
                _taskLogTimeId  int(11)  
,_endTime  datetime  

            )
            BEGIN
                UPDATE  wt_TaskLogTime
                SET     endTime =  _endTime 

                WHERE
                        taskLogTimeId = _taskLogTimeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskLogTimeSummary`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskLogTimeSummary`(
                _taskLogTimeId  int(11)  
,_summary  text  

            )
            BEGIN
                UPDATE  wt_TaskLogTime
                SET     summary =  _summary 

                WHERE
                        taskLogTimeId = _taskLogTimeId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskLogTimeDate`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskLogTimeDate`(
                _taskLogTimeId  int(11)  
,_date  datetime  

            )
            BEGIN
                UPDATE  wt_TaskLogTime
                SET     date =  _date 

                WHERE
                        taskLogTimeId = _taskLogTimeId;
            END$$


            DROP PROCEDURE IF EXISTS `selectTaskLogTimeDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectTaskLogTimeDetails`(_taskLogTimeId  int(11)  
)
            BEGIN
                SELECT * FROM wt_TaskLogTime
                
                WHERE
                        taskLogTimeId = _taskLogTimeId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllTaskPictures`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllTaskPictures`()
            BEGIN
                SELECT wt_TaskPicture.*
                FROM wt_TaskPicture    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewTaskPicture`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewTaskPicture`(_taskId  int(11)  
,_fileName  varchar(128)  
)
            BEGIN
                INSERT INTO wt_TaskPicture (
                    taskId  
,fileName  

                )
                VALUES (
                    _taskId  
,_fileName  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteTaskPicture`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteTaskPicture`(_taskPictureId  int(11)  
)
            BEGIN

                DELETE FROM wt_TaskPicture
                WHERE  taskPictureId = _taskPictureId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllTaskPictures`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllTaskPictures`()
            BEGIN
                DELETE FROM wt_TaskPicture;

            END$$


            DROP PROCEDURE IF EXISTS `updateTaskPicture`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskPicture`(
                            _taskPictureId  int(11)  
,_taskId  int(11)  
,_fileName  varchar(128)  

                  )
            BEGIN
                UPDATE  wt_TaskPicture
                SET     taskId =  _taskId 
,fileName =  _fileName 

                WHERE
                        taskPictureId = _taskPictureId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskPictureTaskId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskPictureTaskId`(
                _taskPictureId  int(11)  
,_taskId  int(11)  

            )
            BEGIN
                UPDATE  wt_TaskPicture
                SET     taskId =  _taskId 

                WHERE
                        taskPictureId = _taskPictureId;
            END$$


            DROP PROCEDURE IF EXISTS `updateTaskPictureFileName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateTaskPictureFileName`(
                _taskPictureId  int(11)  
,_fileName  varchar(128)  

            )
            BEGIN
                UPDATE  wt_TaskPicture
                SET     fileName =  _fileName 

                WHERE
                        taskPictureId = _taskPictureId;
            END$$


            DROP PROCEDURE IF EXISTS `selectTaskPictureDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectTaskPictureDetails`(_taskPictureId  int(11)  
)
            BEGIN
                SELECT * FROM wt_TaskPicture
                
                WHERE
                        taskPictureId = _taskPictureId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllUsers`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllUsers`()
            BEGIN
                SELECT wt_User.*
                FROM wt_User     ORDER BY wt_User.name  ASC;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewUser`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewUser`(_loginName  varchar(50)  
,_hashPassword  varchar(20)  
,_name  varchar(50)  
,_lastName  varchar(50)  
,_phoneNumber  varchar(50)  
,_email  varchar(100)  
,_role  enum('WORKER','ADMIN')  
)
            BEGIN
                INSERT INTO wt_User (
                    loginName  
,hashPassword  
,name  
,lastName  
,phoneNumber  
,email  
,role  

                )
                VALUES (
                    _loginName  
,_hashPassword  
,_name  
,_lastName  
,_phoneNumber  
,_email  
,_role  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteUser`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteUser`(_userId  int(11)  
)
            BEGIN

                DELETE FROM wt_User
                WHERE  userId = _userId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllUsers`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllUsers`()
            BEGIN
                DELETE FROM wt_User;

            END$$


            DROP PROCEDURE IF EXISTS `updateUser`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUser`(
                            _userId  int(11)  
,_loginName  varchar(50)  
,_hashPassword  varchar(20)  
,_name  varchar(50)  
,_lastName  varchar(50)  
,_phoneNumber  varchar(50)  
,_email  varchar(100)  
,_role  enum('WORKER','ADMIN')  

                  )
            BEGIN
                UPDATE  wt_User
                SET     loginName =  _loginName 
,hashPassword =  _hashPassword 
,name =  _name 
,lastName =  _lastName 
,phoneNumber =  _phoneNumber 
,email =  _email 
,role =  _role 

                WHERE
                        userId = _userId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserLoginName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserLoginName`(
                _userId  int(11)  
,_loginName  varchar(50)  

            )
            BEGIN
                UPDATE  wt_User
                SET     loginName =  _loginName 

                WHERE
                        userId = _userId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserHashPassword`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserHashPassword`(
                _userId  int(11)  
,_hashPassword  varchar(20)  

            )
            BEGIN
                UPDATE  wt_User
                SET     hashPassword =  _hashPassword 

                WHERE
                        userId = _userId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserName`(
                _userId  int(11)  
,_name  varchar(50)  

            )
            BEGIN
                UPDATE  wt_User
                SET     name =  _name 

                WHERE
                        userId = _userId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserLastName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserLastName`(
                _userId  int(11)  
,_lastName  varchar(50)  

            )
            BEGIN
                UPDATE  wt_User
                SET     lastName =  _lastName 

                WHERE
                        userId = _userId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserPhoneNumber`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserPhoneNumber`(
                _userId  int(11)  
,_phoneNumber  varchar(50)  

            )
            BEGIN
                UPDATE  wt_User
                SET     phoneNumber =  _phoneNumber 

                WHERE
                        userId = _userId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserEmail`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserEmail`(
                _userId  int(11)  
,_email  varchar(100)  

            )
            BEGIN
                UPDATE  wt_User
                SET     email =  _email 

                WHERE
                        userId = _userId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserRole`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserRole`(
                _userId  int(11)  
,_role  enum('WORKER','ADMIN')  

            )
            BEGIN
                UPDATE  wt_User
                SET     role =  _role 

                WHERE
                        userId = _userId;
            END$$


            DROP PROCEDURE IF EXISTS `selectUserDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectUserDetails`(_userId  int(11)  
)
            BEGIN
                SELECT * FROM wt_User
                
                WHERE
                        userId = _userId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllUserProfiles`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectAllUserProfiles`()
            BEGIN
                SELECT wt_UserProfile.*,wt_User.*
                FROM wt_UserProfile   LEFT JOIN wt_User ON  wt_UserProfile.userId = wt_User.userId  
  ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewUserProfile`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `insertNewUserProfile`(_userId  int(11)  
,_gender  enum('Male','Female')  
,_photoFileName  varchar(256)  
,_street  varchar(50)  
,_zipCode  varchar(10)  
,_city  varchar(50)  
,_address  varchar(256)  
,_defalutLanguage  enum('DE','FR','EN')  
)
            BEGIN
                INSERT INTO wt_UserProfile (
                    userId  
,gender  
,photoFileName  
,street  
,zipCode  
,city  
,address  
,defalutLanguage  

                )
                VALUES (
                    _userId  
,_gender  
,_photoFileName  
,_street  
,_zipCode  
,_city  
,_address  
,_defalutLanguage  

                );
                SELECT LAST_INSERT_ID();
            END$$


            DROP PROCEDURE IF EXISTS `deleteUserProfile`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteUserProfile`(_profileId  int(11)  
)
            BEGIN

                DELETE FROM wt_UserProfile
                WHERE  profileId = _profileId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllUserProfiles`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `deleteAllUserProfiles`()
            BEGIN
                DELETE FROM wt_UserProfile;

            END$$


            DROP PROCEDURE IF EXISTS `updateUserProfile`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserProfile`(
                            _profileId  int(11)  
,_userId  int(11)  
,_gender  enum('Male','Female')  
,_photoFileName  varchar(256)  
,_street  varchar(50)  
,_zipCode  varchar(10)  
,_city  varchar(50)  
,_address  varchar(256)  
,_defalutLanguage  enum('DE','FR','EN')  

                  )
            BEGIN
                UPDATE  wt_UserProfile
                SET     userId =  _userId 
,gender =  _gender 
,photoFileName =  _photoFileName 
,street =  _street 
,zipCode =  _zipCode 
,city =  _city 
,address =  _address 
,defalutLanguage =  _defalutLanguage 

                WHERE
                        profileId = _profileId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserProfileUserId`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserProfileUserId`(
                _profileId  int(11)  
,_userId  int(11)  

            )
            BEGIN
                UPDATE  wt_UserProfile
                SET     userId =  _userId 

                WHERE
                        profileId = _profileId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserProfileGender`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserProfileGender`(
                _profileId  int(11)  
,_gender  enum('Male','Female')  

            )
            BEGIN
                UPDATE  wt_UserProfile
                SET     gender =  _gender 

                WHERE
                        profileId = _profileId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserProfilePhotoFileName`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserProfilePhotoFileName`(
                _profileId  int(11)  
,_photoFileName  varchar(256)  

            )
            BEGIN
                UPDATE  wt_UserProfile
                SET     photoFileName =  _photoFileName 

                WHERE
                        profileId = _profileId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserProfileStreet`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserProfileStreet`(
                _profileId  int(11)  
,_street  varchar(50)  

            )
            BEGIN
                UPDATE  wt_UserProfile
                SET     street =  _street 

                WHERE
                        profileId = _profileId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserProfileZipCode`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserProfileZipCode`(
                _profileId  int(11)  
,_zipCode  varchar(10)  

            )
            BEGIN
                UPDATE  wt_UserProfile
                SET     zipCode =  _zipCode 

                WHERE
                        profileId = _profileId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserProfileCity`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserProfileCity`(
                _profileId  int(11)  
,_city  varchar(50)  

            )
            BEGIN
                UPDATE  wt_UserProfile
                SET     city =  _city 

                WHERE
                        profileId = _profileId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserProfileAddress`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserProfileAddress`(
                _profileId  int(11)  
,_address  varchar(256)  

            )
            BEGIN
                UPDATE  wt_UserProfile
                SET     address =  _address 

                WHERE
                        profileId = _profileId;
            END$$


            DROP PROCEDURE IF EXISTS `updateUserProfileDefalutLanguage`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `updateUserProfileDefalutLanguage`(
                _profileId  int(11)  
,_defalutLanguage  enum('DE','FR','EN')  

            )
            BEGIN
                UPDATE  wt_UserProfile
                SET     defalutLanguage =  _defalutLanguage 

                WHERE
                        profileId = _profileId;
            END$$


            DROP PROCEDURE IF EXISTS `selectUserProfileDetails`$$
            CREATE DEFINER=`my_africa_international_com`@`%` PROCEDURE  `selectUserProfileDetails`(_profileId  int(11)  
)
            BEGIN
                SELECT * FROM wt_UserProfile
                 LEFT JOIN wt_User ON  wt_UserProfile.userId = wt_User.userId  

                WHERE
                        profileId = _profileId;
            END$$

