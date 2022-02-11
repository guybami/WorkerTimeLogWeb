
<?php
/**
 * ViewMembers page content
 * Display all members items
 * @author Guy Watcho
 */


    require_once "../../Includes/Common.php";
    //require_once "../../Includes/CustomFileUploader.php";
    require "../PageModel.php";

    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa eV - Upload files';
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
    <script  src="../../Scripts/uploadFileScript2.js"  type="text/javascript"> </script>

    <div id="sitePathDiv"></div>
    <br />
	<!-- main section title -->
    <div id="sectionTitleAndToolbarBtnDiv" class="hideContent_">
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
        <h2> Upload images </h2>
        <form enctype="multipart/form-data" id="uploadImageForm" name="uploadImageForm" >
            <input name="filesToUpload[]" id="filesToUpload[]" type="file"  accept=".gif, .jpeg, .jpg, .png" multiple="multiple" />
            <input type="button" value="Upload image" id="uploadImgBtn" />
            <input type="hidden" name="userAction" id="userAction" value="uploadImage" />

        </form>
        <hr />
        <progress></progress>
        <hr />
        <h2> Upload videos </h2>
        <form enctype="multipart/form-data" id="uploadVideoForm" name="uploadVideoForm" >
            <input name="videoToUpload" id="videoToUpload" type="file"  accept=".avi, .mov, .mpeg, .3gp, .mp4"   />
            <input type="button" value="Upload video" id="uploadVideoBtn"  />
            <input type="hidden" name="userAction" id="userAction" value="uploadVideo" />

        </form>
        <hr />
        <h2> View video </>
        <video width="300" height="200" controls>
	        <source src="../../UploadedFiles/Videos/test2.mp4" type="video/mp4">
	    </video> 

         
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




