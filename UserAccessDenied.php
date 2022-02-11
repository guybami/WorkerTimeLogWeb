<?php
        
    require_once "./Includes/Common.php";
    require_once "./DataAccessLayer/DaoCommon.php";
    require_once "./BusinessLogicLayer/EntityCommon.php";
    require "./PresentationLayer/PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'Smart Fret Line - Access refuse';
    // load UI resource 
    Utils::loadUIResources("./UIResources/index.fr.res.php", "./UIResources/index.en.res.php");
    
    
    $homePageUrl = Utils::getServerRootURL();

    // custon page script, if needed
    $script = '
        <script type="text/javascript">
            var homePageUrl = "'.$homePageUrl.'";
        </script>
        <script language="javascript" src="Scripts/accessDeniedScript.js"  type="text/javascript"> </script>
       ';
    
    /// page content
    $content = ' 
        <br /> 
        
        <table class="fullWidth hideContent" id="mainDiv"  cellspacing="0" cellpadding="0">
            <tr>
                <td align="center">
                    <table class="biggerWidth" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <div class="formContent fullWidth">
                                    <table class="fullWidth" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="formTitleBar formBtnsBottomBorder panelTitle toLeft">
                                                <label>Access refuse</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <table class="fullWidth "  cellspacing="3" cellpadding="3">
                                                    <tr>
                                                        <td class="toLeft marginContent">
                                                            <img src="Resources/Images/accessDenied.png" />
                                                        </td>
                                                        <td class="toLeft toBold fullWidth" nowrap="nowrap">
                                                            <label >Vous n\'avez les privilleges
                                                                requis pour  accéder à cette page.
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="toRight" colspan="2">
                                                            <button id="finishBtn" data-dojo-type="dijit/form/Button"
                                                                    onclick="finishBtnClick();">OK</button>
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
                </td>
            </tr>
        </table>
        

        ';
    $mainPage->setUseDojoScripts(true);
    $mainPage->setActiveMenu("home");
    $mainPage->setDirectoryLevel(0);
    $mainPage->setUserLanguage($userLang);
    $mainPage->setShouldDisplayLanguageSelection(true);
    $mainPage->setPageJscript($script);
    $mainPage->setTitle($title);
    $mainPage->setContent($content);
    $mainPage->displayPage();
        
 


       
