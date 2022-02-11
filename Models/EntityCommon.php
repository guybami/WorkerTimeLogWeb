<?php

/**
 * EntityCommon class contains all data model entities
 *
 * @version 1.0
 * @author gbami
 */
include_once "BaseEntity.php";
include_once "Customer.php";
include_once "Project.php";
include_once "Task.php";
include_once "TaskPicture.php";
include_once "TaskLogTime.php";
include_once "LogActivity.php";
include_once "User.php";
include_once "UserProfile.php";

include_once "AufMasse.php";
include_once "AufMasseBild.php";
include_once "AufMasseSkizze.php";
include_once "Erfassung.php";
include_once "ErfassungBild.php";
include_once "Fertigung.php";
include_once "FertigungBild.php";
include_once "Montage.php";
include_once "MontageBild.php";
include_once "Nachtrag.php";
include_once "NachtragBild.php";
include_once "NachtragSkizze.php";
include_once "Rapport.php";
include_once "Arbeitszeit.php";
include_once "ErfassungOhneAuftrag.php";
include_once "ErfassungOhneAuftragBild.php";
include_once "Auftrag.php";
include_once "Zeichnung.php";


abstract class EntityCommon
{
}