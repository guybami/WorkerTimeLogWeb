
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllArbeitszeits`()
            BEGIN
                SELECT wt_Arbeitszeit.*
                FROM wt_Arbeitszeit     ORDER BY wt_Arbeitszeit.datum  ASC;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewArbeitszeit`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewArbeitszeit`(_rapportId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteArbeitszeit`(_arbeitszeitId  int(11)  
)
            BEGIN

                DELETE FROM wt_Arbeitszeit
                WHERE  arbeitszeitId = _arbeitszeitId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllArbeitszeits`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllArbeitszeits`()
            BEGIN
                DELETE FROM wt_Arbeitszeit;

            END$$


            DROP PROCEDURE IF EXISTS `updateArbeitszeit`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateArbeitszeit`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateArbeitszeitRapportId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateArbeitszeitBereich`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateArbeitszeitMitarbeiterName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateArbeitszeitGruppe`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateArbeitszeitZeit`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateArbeitszeitDatum`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectArbeitszeitDetails`(_arbeitszeitId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Arbeitszeit
                
                WHERE
                        arbeitszeitId = _arbeitszeitId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllAufMasses`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllAufMasses`()
            BEGIN
                SELECT wt_AufMasse.*
                FROM wt_AufMasse    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewAufMasse`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewAufMasse`(_rapportId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAufMasse`(_aufmasseId  int(11)  
)
            BEGIN

                DELETE FROM wt_AufMasse
                WHERE  aufmasseId = _aufmasseId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllAufMasses`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllAufMasses`()
            BEGIN
                DELETE FROM wt_AufMasse;

            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasse`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasse`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseRapportId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseMasse`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseAufsprache`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseFreierText`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseBemerkung`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseDatum`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAufMasseDetails`(_aufmasseId  int(11)  
)
            BEGIN
                SELECT * FROM wt_AufMasse
                
                WHERE
                        aufmasseId = _aufmasseId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllAufMasseBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllAufMasseBilds`()
            BEGIN
                SELECT wt_AufMasseBild.*
                FROM wt_AufMasseBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewAufMasseBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewAufMasseBild`(_aufmasseId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAufMasseBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_AufMasseBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllAufMasseBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllAufMasseBilds`()
            BEGIN
                DELETE FROM wt_AufMasseBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseBild`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseBildAufmasseId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseBildDateiName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAufMasseBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_AufMasseBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllAufMasseSkizzes`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllAufMasseSkizzes`()
            BEGIN
                SELECT wt_AufMasseSkizze.*
                FROM wt_AufMasseSkizze    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewAufMasseSkizze`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewAufMasseSkizze`(_aufmasseId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAufMasseSkizze`(_skizzeId  int(11)  
)
            BEGIN

                DELETE FROM wt_AufMasseSkizze
                WHERE  skizzeId = _skizzeId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllAufMasseSkizzes`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllAufMasseSkizzes`()
            BEGIN
                DELETE FROM wt_AufMasseSkizze;

            END$$


            DROP PROCEDURE IF EXISTS `updateAufMasseSkizze`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseSkizze`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseSkizzeAufmasseId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateAufMasseSkizzeDateiName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAufMasseSkizzeDetails`(_skizzeId  int(11)  
)
            BEGIN
                SELECT * FROM wt_AufMasseSkizze
                
                WHERE
                        skizzeId = _skizzeId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllCustomers`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllCustomers`()
            BEGIN
                SELECT wt_Customer.*
                FROM wt_Customer    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewCustomer`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewCustomer`(_name  varchar(50)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteCustomer`(_customerId  int(11)  
)
            BEGIN

                DELETE FROM wt_Customer
                WHERE  customerId = _customerId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllCustomers`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllCustomers`()
            BEGIN
                DELETE FROM wt_Customer;

            END$$


            DROP PROCEDURE IF EXISTS `updateCustomer`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateCustomer`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateCustomerName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateCustomerLastName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateCustomerEmail`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateCustomerPhoneNumber`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateCustomerZipCode`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateCustomerCity`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateCustomerStreet`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectCustomerDetails`(_customerId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Customer
                
                WHERE
                        customerId = _customerId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllErfassungs`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllErfassungs`()
            BEGIN
                SELECT wt_Erfassung.*
                FROM wt_Erfassung    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewErfassung`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewErfassung`(_rapportId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteErfassung`(_erfassungId  int(11)  
)
            BEGIN

                DELETE FROM wt_Erfassung
                WHERE  erfassungId = _erfassungId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllErfassungs`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllErfassungs`()
            BEGIN
                DELETE FROM wt_Erfassung;

            END$$


            DROP PROCEDURE IF EXISTS `updateErfassung`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassung`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungRapportId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungBericht`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungMaterial`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungMaschineAufwand`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungKilometer`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungAuftragAbgeschlossen`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungDatum`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectErfassungDetails`(_erfassungId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Erfassung
                
                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllErfassungBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllErfassungBilds`()
            BEGIN
                SELECT wt_ErfassungBild.*
                FROM wt_ErfassungBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewErfassungBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewErfassungBild`(_erfassungId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteErfassungBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_ErfassungBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllErfassungBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllErfassungBilds`()
            BEGIN
                DELETE FROM wt_ErfassungBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungBild`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungBildErfassungId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungBildBildTyp`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungBildDateiName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectErfassungBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_ErfassungBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllErfassungOhneAuftrags`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllErfassungOhneAuftrags`()
            BEGIN
                SELECT wt_ErfassungOhneAuftrag.*
                FROM wt_ErfassungOhneAuftrag    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewErfassungOhneAuftrag`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewErfassungOhneAuftrag`(_kundenNummer  varchar(50)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteErfassungOhneAuftrag`(_erfassungId  int(11)  
)
            BEGIN

                DELETE FROM wt_ErfassungOhneAuftrag
                WHERE  erfassungId = _erfassungId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllErfassungOhneAuftrags`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllErfassungOhneAuftrags`()
            BEGIN
                DELETE FROM wt_ErfassungOhneAuftrag;

            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftrag`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftrag`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragKundenNummer`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragBericht`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragMaterial`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragMaschineAufwand`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragKilometer`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragUnterschriftMitarbeiterDatei`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragUnterschriftKundeDatei`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragAuftragAbgeschlossen`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragDatum`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectErfassungOhneAuftragDetails`(_erfassungId  int(11)  
)
            BEGIN
                SELECT * FROM wt_ErfassungOhneAuftrag
                
                WHERE
                        erfassungId = _erfassungId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllErfassungOhneAuftragBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllErfassungOhneAuftragBilds`()
            BEGIN
                SELECT wt_ErfassungOhneAuftragBild.*
                FROM wt_ErfassungOhneAuftragBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewErfassungOhneAuftragBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewErfassungOhneAuftragBild`(_erfassungId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteErfassungOhneAuftragBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_ErfassungOhneAuftragBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllErfassungOhneAuftragBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllErfassungOhneAuftragBilds`()
            BEGIN
                DELETE FROM wt_ErfassungOhneAuftragBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateErfassungOhneAuftragBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragBild`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragBildErfassungId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragBildBildTyp`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateErfassungOhneAuftragBildDateiName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectErfassungOhneAuftragBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_ErfassungOhneAuftragBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllFertigungs`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllFertigungs`()
            BEGIN
                SELECT wt_Fertigung.*
                FROM wt_Fertigung    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewFertigung`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewFertigung`(_rapportId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteFertigung`(_fertigungId  int(11)  
)
            BEGIN

                DELETE FROM wt_Fertigung
                WHERE  fertigungId = _fertigungId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllFertigungs`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllFertigungs`()
            BEGIN
                DELETE FROM wt_Fertigung;

            END$$


            DROP PROCEDURE IF EXISTS `updateFertigung`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigung`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigungRapportId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigungNachbearbeitung`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigungLackieren`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigungBeschichten`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigungStrahlen`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigungAuftragAbgeschlossen`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigungDatum`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectFertigungDetails`(_fertigungId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Fertigung
                
                WHERE
                        fertigungId = _fertigungId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllFertigungBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllFertigungBilds`()
            BEGIN
                SELECT wt_FertigungBild.*
                FROM wt_FertigungBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewFertigungBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewFertigungBild`(_fertigungId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteFertigungBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_FertigungBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllFertigungBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllFertigungBilds`()
            BEGIN
                DELETE FROM wt_FertigungBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateFertigungBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigungBild`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigungBildFertigungId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateFertigungBildDateiName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectFertigungBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_FertigungBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllLogActivities`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllLogActivities`()
            BEGIN
                SELECT wt_LogActivity.*,wt_User.*
                FROM wt_LogActivity   LEFT JOIN wt_User ON  wt_LogActivity.userId = wt_User.userId  
   ORDER BY wt_LogActivity.date  DESC;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewLogActivity`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewLogActivity`(_userId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteLogActivity`(_activityId  int(11)  
)
            BEGIN

                DELETE FROM wt_LogActivity
                WHERE  activityId = _activityId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllLogActivities`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllLogActivities`()
            BEGIN
                DELETE FROM wt_LogActivity;

            END$$


            DROP PROCEDURE IF EXISTS `updateLogActivity`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateLogActivity`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateLogActivityUserId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateLogActivitySummary`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateLogActivityDate`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectLogActivityDetails`(_activityId  int(11)  
)
            BEGIN
                SELECT * FROM wt_LogActivity
                 LEFT JOIN wt_User ON  wt_LogActivity.userId = wt_User.userId  

                WHERE
                        activityId = _activityId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllMontages`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllMontages`()
            BEGIN
                SELECT wt_Montage.*
                FROM wt_Montage    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewMontage`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewMontage`(_rapportId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteMontage`(_montageId  int(11)  
)
            BEGIN

                DELETE FROM wt_Montage
                WHERE  montageId = _montageId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllMontages`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllMontages`()
            BEGIN
                DELETE FROM wt_Montage;

            END$$


            DROP PROCEDURE IF EXISTS `updateMontage`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateMontage`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateMontageRapportId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateMontageBericht`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateMontageAufnahmeUnterschriftDatei`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateMontageAuftragAbgeschlossen`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateMontageDatum`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectMontageDetails`(_montageId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Montage
                
                WHERE
                        montageId = _montageId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllMontageBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllMontageBilds`()
            BEGIN
                SELECT wt_MontageBild.*
                FROM wt_MontageBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewMontageBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewMontageBild`(_montageId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteMontageBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_MontageBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllMontageBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllMontageBilds`()
            BEGIN
                DELETE FROM wt_MontageBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateMontageBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateMontageBild`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateMontageBildMontageId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateMontageBildBildTyp`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateMontageBildDateiName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectMontageBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_MontageBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllNachtrags`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllNachtrags`()
            BEGIN
                SELECT wt_Nachtrag.*
                FROM wt_Nachtrag    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewNachtrag`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewNachtrag`(_rapportId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteNachtrag`(_nachtragId  int(11)  
)
            BEGIN

                DELETE FROM wt_Nachtrag
                WHERE  nachtragId = _nachtragId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllNachtrags`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllNachtrags`()
            BEGIN
                DELETE FROM wt_Nachtrag;

            END$$


            DROP PROCEDURE IF EXISTS `updateNachtrag`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtrag`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtragRapportId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtragAufsprache`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtragFreierText`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtragDatum`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectNachtragDetails`(_nachtragId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Nachtrag
                
                WHERE
                        nachtragId = _nachtragId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllNachtragBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllNachtragBilds`()
            BEGIN
                SELECT wt_NachtragBild.*
                FROM wt_NachtragBild    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewNachtragBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewNachtragBild`(_nachtragId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteNachtragBild`(_bildId  int(11)  
)
            BEGIN

                DELETE FROM wt_NachtragBild
                WHERE  bildId = _bildId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllNachtragBilds`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllNachtragBilds`()
            BEGIN
                DELETE FROM wt_NachtragBild;

            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragBild`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtragBild`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtragBildNachtragId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtragBildDateiName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectNachtragBildDetails`(_bildId  int(11)  
)
            BEGIN
                SELECT * FROM wt_NachtragBild
                
                WHERE
                        bildId = _bildId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllNachtragSkizzes`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllNachtragSkizzes`()
            BEGIN
                SELECT wt_NachtragSkizze.*
                FROM wt_NachtragSkizze    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewNachtragSkizze`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewNachtragSkizze`(_nachtragId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteNachtragSkizze`(_skizzeId  int(11)  
)
            BEGIN

                DELETE FROM wt_NachtragSkizze
                WHERE  skizzeId = _skizzeId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllNachtragSkizzes`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllNachtragSkizzes`()
            BEGIN
                DELETE FROM wt_NachtragSkizze;

            END$$


            DROP PROCEDURE IF EXISTS `updateNachtragSkizze`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtragSkizze`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtragSkizzeNachtragId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateNachtragSkizzeDateiName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectNachtragSkizzeDetails`(_skizzeId  int(11)  
)
            BEGIN
                SELECT * FROM wt_NachtragSkizze
                
                WHERE
                        skizzeId = _skizzeId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllOrders`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllOrders`()
            BEGIN
                SELECT wt_Order.*
                FROM wt_Order    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewOrder`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewOrder`(_title  varchar(128)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteOrder`(_orderId  int(11)  
)
            BEGIN

                DELETE FROM wt_Order
                WHERE  orderId = _orderId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllOrders`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllOrders`()
            BEGIN
                DELETE FROM wt_Order;

            END$$


            DROP PROCEDURE IF EXISTS `updateOrder`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateOrder`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateOrderTitle`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateOrderProjectId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateOrderDate`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectOrderDetails`(_orderId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Order
                
                WHERE
                        orderId = _orderId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllProjects`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllProjects`()
            BEGIN
                SELECT wt_Project.*,wt_User.*
                FROM wt_Project   LEFT JOIN wt_User ON  wt_Project.userId = wt_User.userId  
   ORDER BY wt_Project.title  ASC;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewProject`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewProject`(_customerId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteProject`(_projectId  int(11)  
)
            BEGIN

                DELETE FROM wt_Project
                WHERE  projectId = _projectId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllProjects`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllProjects`()
            BEGIN
                DELETE FROM wt_Project;

            END$$


            DROP PROCEDURE IF EXISTS `updateProject`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateProject`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateProjectCustomerId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateProjectTitle`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateProjectCreationDate`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateProjectStatus`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateProjectHasOrder`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectProjectDetails`(_projectId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Project
                 LEFT JOIN wt_User ON  wt_Project.userId = wt_User.userId  

                WHERE
                        projectId = _projectId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllRapports`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllRapports`()
            BEGIN
                SELECT wt_Rapport.*
                FROM wt_Rapport    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewRapport`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewRapport`(_userId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteRapport`(_rapportId  int(11)  
)
            BEGIN

                DELETE FROM wt_Rapport
                WHERE  rapportId = _rapportId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllRapports`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllRapports`()
            BEGIN
                DELETE FROM wt_Rapport;

            END$$


            DROP PROCEDURE IF EXISTS `updateRapport`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateRapport`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateRapportUserId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateRapportAuftragNummer`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateRapportBezeichnung`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateRapportDatum`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectRapportDetails`(_rapportId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Rapport
                
                WHERE
                        rapportId = _rapportId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllTasks`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllTasks`()
            BEGIN
                SELECT wt_Task.*
                FROM wt_Task    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewTask`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewTask`(_projectId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteTask`(_taskId  int(11)  
)
            BEGIN

                DELETE FROM wt_Task
                WHERE  taskId = _taskId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllTasks`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllTasks`()
            BEGIN
                DELETE FROM wt_Task;

            END$$


            DROP PROCEDURE IF EXISTS `updateTask`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTask`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskProjectId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskTitle`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskDate`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskDescriptionFileName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskSummary`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectTaskDetails`(_taskId  int(11)  
)
            BEGIN
                SELECT * FROM wt_Task
                
                WHERE
                        taskId = _taskId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllTaskLogTimes`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllTaskLogTimes`()
            BEGIN
                SELECT wt_TaskLogTime.*
                FROM wt_TaskLogTime    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewTaskLogTime`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewTaskLogTime`(_userId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteTaskLogTime`(_taskLogTimeId  int(11)  
)
            BEGIN

                DELETE FROM wt_TaskLogTime
                WHERE  taskLogTimeId = _taskLogTimeId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllTaskLogTimes`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllTaskLogTimes`()
            BEGIN
                DELETE FROM wt_TaskLogTime;

            END$$


            DROP PROCEDURE IF EXISTS `updateTaskLogTime`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskLogTime`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskLogTimeUserId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskLogTimeTaskId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskLogTimeTitle`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskLogTimeStartTime`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskLogTimeEndTime`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskLogTimeSummary`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskLogTimeDate`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectTaskLogTimeDetails`(_taskLogTimeId  int(11)  
)
            BEGIN
                SELECT * FROM wt_TaskLogTime
                
                WHERE
                        taskLogTimeId = _taskLogTimeId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllTaskPictures`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllTaskPictures`()
            BEGIN
                SELECT wt_TaskPicture.*
                FROM wt_TaskPicture    ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewTaskPicture`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewTaskPicture`(_taskId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteTaskPicture`(_taskPictureId  int(11)  
)
            BEGIN

                DELETE FROM wt_TaskPicture
                WHERE  taskPictureId = _taskPictureId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllTaskPictures`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllTaskPictures`()
            BEGIN
                DELETE FROM wt_TaskPicture;

            END$$


            DROP PROCEDURE IF EXISTS `updateTaskPicture`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskPicture`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskPictureTaskId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateTaskPictureFileName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectTaskPictureDetails`(_taskPictureId  int(11)  
)
            BEGIN
                SELECT * FROM wt_TaskPicture
                
                WHERE
                        taskPictureId = _taskPictureId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllUsers`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllUsers`()
            BEGIN
                SELECT wt_User.*
                FROM wt_User     ORDER BY wt_User.name  ASC;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewUser`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewUser`(_loginName  varchar(50)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteUser`(_userId  int(11)  
)
            BEGIN

                DELETE FROM wt_User
                WHERE  userId = _userId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllUsers`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllUsers`()
            BEGIN
                DELETE FROM wt_User;

            END$$


            DROP PROCEDURE IF EXISTS `updateUser`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUser`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserLoginName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserHashPassword`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserLastName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserPhoneNumber`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserEmail`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserRole`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectUserDetails`(_userId  int(11)  
)
            BEGIN
                SELECT * FROM wt_User
                
                WHERE
                        userId = _userId;
            END$$


            DROP PROCEDURE IF EXISTS `selectAllUserProfiles`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectAllUserProfiles`()
            BEGIN
                SELECT wt_UserProfile.*,wt_User.*
                FROM wt_UserProfile   LEFT JOIN wt_User ON  wt_UserProfile.userId = wt_User.userId  
  ;
            END$$


            DROP PROCEDURE IF EXISTS `insertNewUserProfile`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `insertNewUserProfile`(_userId  int(11)  
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteUserProfile`(_profileId  int(11)  
)
            BEGIN

                DELETE FROM wt_UserProfile
                WHERE  profileId = _profileId;

            END$$


            DROP PROCEDURE IF EXISTS `deleteAllUserProfiles`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `deleteAllUserProfiles`()
            BEGIN
                DELETE FROM wt_UserProfile;

            END$$


            DROP PROCEDURE IF EXISTS `updateUserProfile`$$
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserProfile`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserProfileUserId`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserProfileGender`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserProfilePhotoFileName`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserProfileStreet`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserProfileZipCode`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserProfileCity`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserProfileAddress`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `updateUserProfileDefalutLanguage`(
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
            CREATE DEFINER=`root`@`localhost` PROCEDURE  `selectUserProfileDetails`(_profileId  int(11)  
)
            BEGIN
                SELECT * FROM wt_UserProfile
                 LEFT JOIN wt_User ON  wt_UserProfile.userId = wt_User.userId  

                WHERE
                        profileId = _profileId;
            END$$

