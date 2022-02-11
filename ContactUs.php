<?php

    require_once "./Includes/Common.php";
    require_once "./DataAccessLayer/DaoCommon.php";
    require_once "./BusinessLogicLayer/EntityCommon.php";
    require "./PresentationLayer/PageModel.php";

    // get user language
    $userLang = $_SESSION['userLang'];
    $mainPage = new PageModel();
    $title = 'Smart Fret Line - Contact Us';
    // custon page script, if needed
    $script = '';
    //set the language
    $userLang = $_SESSION['userLang'];

    $content = ' 
        <br /> 
        <table class="fullWidth" id="contactTable" cellspacing="0" cellpadding="0">
      <tr>
        <td class="fullWidth" align="center">
            <table class="biggerWidth formContent" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="formTitleBar formBtnsBottomBorder panelTitle toLeft">
                    <label>Contactez-nous</label>
                    </td>
                </tr>
                <tr>
                    <td>
                      <div class=" fullWidth">
                          <table class="fullWidth"  cellspacing="5" cellpadding="2">
                            <tr>
                              <td align="center">
                                <div class="fieldDiv">
                                  <fieldset class="fieldSet">
                                    <legend class="fieldSetLegend">Contact</legend>
                                <table class="fullWidth"  cellspacing="5" cellpadding="5">
                                  <tr>
                                    <td class="toLeft" colspan="2">
                                        <label>Smart Fret Line Inc.</label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="toLeft createFormLabelCol">
                                      <label>Email:</label>
                                    </td>
                                    <td class="toLeft createFormLabelCol">
                                       <a href="mailto:testmail@smartfretline.com"
                                            class="siteLink">
                                        administrator@carug.fr</a>
                                    </td>
                                  </tr>
								  <tr>
                                    <td class="toLeft createFormLabelCol">
                                      <label>Mobile:</label>
                                    </td>
                                    <td class="toLeft">
                                      <label>(+49) 017675205386</label>
                                    </td>
                                  </tr>
                                </table>
                              </fieldset>
                            </div>
                          </td>
                        </tr>
                       </table>
                      </div>
                    </td>
                 </tr>
               </table>
             </td>
           </tr>
         </table>';

    $mainPage->setUseDojoScripts(false);
    $mainPage->setActiveMenu("home");
    $mainPage->setDirectoryLevel(0);
    $mainPage->setUserLanguage($userLang);
    $mainPage->setShouldDisplayLanguageSelection(false);
    $mainPage->setPageJscript($script);
    $mainPage->setTitle($title);
    $mainPage->setContent($content);
    $mainPage->displayPage();
?>
