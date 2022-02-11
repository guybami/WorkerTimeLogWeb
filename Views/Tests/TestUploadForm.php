
<?php


   

/**
 * ViewMembers page content
 * Display all members items
 * @author Guy Watcho
 */


    require_once "../../Includes/Common.php";
    //require_once "../../Includes/CustomFileUploader.php";
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";

    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'Kamerun Heilbronner eV - Member';
    // load UI resource
    // custon page script, if needed
    $script = '
        <!--language texts for page -->
        <script  type="text/javascript">
         var fileUploadId = "imgFileUpload";

        </script>
        ';

/// page content
    $content = '
    <script  src="../../Scripts/uploadFileScript.js"  type="text/javascript"> </script>

    <div id="sitePathDiv"></div>
    <br />
	<!-- main section title -->
    <div id="sectionTitleAndToolbarBtnDiv" class="hideContent">
        <table class="fullWidth  zeroPadding zeroSpacing cellspacing0">
            <tr>
                <td class="toLeft sectionTitleDiv fullWidth">
                    <label>Upload file test</label>
                </td>
            </tr>
            <tr>
                <td class="toLeft fullWidth">
                    <div> &nbsp;</div>
                </td>
            </tr>
        </table>
        <!-- main toolbar -->
        <table class="fullWidth  cellpadding0 cellspacing0 topBottomBorder">
            <tr>
                 <td>
                    <div data-dojo-type="dijit/form/Form" id="uploadImageForm" data-dojo-id="uploadImageForm" encType="multipart/form-data">
                        <table class="toogleBtnSection  cellpadding0 cellspacing2">
                             <tr nowrap="nowrap">
                                    <td class="toLeft createFormLabelCol" nowrap="nowrap">
                                        <label for="fileName">*Dateiname (Ohne Pfad):</label>
                                    </td>
                                    <td class="toLeft createFormInputCol" nowrap="nowrap">
                                        <input type="text" id="fileName" name="fileName"    required="true"
                                                data-dojo-type="dijit/form/ValidationTextBox" style="width:25em;" />
                                        <label class="linkBtnData ">
                                            <a class="linkItemsViewRow _no-underline"
                                                href="javascript:showSelectFileDialog();">
                                            <span class="changePwdLink">Datei auswählen</span></a>
                                        </label> 
                                        <div class="hideContent1">
                                            <input type="file"  id="imgFileUpload" name="imgFileUpload"   accept=".gif, .jpeg, .jpg"/>
                                        </div> 
                                    </td>
                                </tr>
                        </table>
                        <table class="halfWidth" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td  align="left">
                                        <table class="fullWidth" cellspacing="5" cellpadding="5">
                                            <tr>
                                                <td class="toLeft createFormInputCol">
                                                    <button type="button" id="uploadImageBtn"   onclick="uploadImageBtnClick();"
                                                            data-dojo-type="dijit/form/Button"
                                                        data-dojo-props="busyLabel:\'Bitte warten...\'">Upload file</button>
                                                </td>
                                                <td class="toLeft createFormInputCol hideContent" id="progressCol">
                                                    <div data-dojo-type="dijit/ProgressBar" style="width:300px"
                                                        data-dojo-id="uploadImageProgress" id="uploadImageProgress" data-dojo-props="maximum:100"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                        </table>
                    </div>
                 </td>
            </tr>
        </table>
    </div>

    <br />
    <!-- data view header -->
     
    <div id="errorContentDiv"></div>
    <!-- data items view div -->
     
    <!-- success overlay content -->
    <div id="successOverlayDiv"></div>

     
    ';


    $mainPage->setUseDojoScripts(true);
    $mainPage->setActiveMenu("administration");
    $mainPage->setDirectoryLevel(2);
    $mainPage->setUserLanguage($userLang);
    $mainPage->setShouldDisplayLanguageSelection(true);
    $mainPage->setPageJscript($script);
    $mainPage->setTitle($title);
    $mainPage->setContent($content);
    $mainPage->displayPage();




