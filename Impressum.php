<?php

    require_once "Includes/Common.php";
    require_once "DataAccessLayer/DaoCommon.php";
    require_once "BusinessLogicLayer/EntityCommon.php";
    require "PresentationLayer/PageModel.php";

    // get user language
    $mainPage = new PageModel();
    $title = 'Smart Fret Line - Impressum';
    // custon page script, if needed
    $script = '';
    //set the language
    $userLang = $_SESSION['userLang'];

    $content = ' 
    <br /> 
     <table class="fullWidth"   cellspacing="0" cellpadding="0">
      <tr>
        <td class="fullWidth" align="center">
            <table class="biggerWidth formContent" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="formTitleBar formBtnsBottomBorder panelTitle toLeft">
                    <label>Impressum</label>
                    </td>
                </tr>
                <tr>
                    <td>
                         <table class="fullWidth"  cellspacing="5" cellpadding="2">
                            <tr>
                                <td class="toCenter" valign="top">
                                     <table>
                                        <tbody>
                                            <tr>
                                                <td class="toCenter">
                                                    <img src="Resources/Images/siteLogo.jpg" alt="" />
                                                </td>
                                            </tr>
                                        </tbody>
                                     </table>
                                </td>
                                <td align="center">
                                    <div class="fieldDiv">
                                        <table class="fullWidth"  cellspacing="5" cellpadding="5">
                                            <tr>
                                                <td class="toLeft sectionTitleDiv fullWidth">
                                                    <label>Author and owner of the artwork</label>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td class="toLeft" >
                                                <p class="textMargin hideContent">
                                                    Bami Watcho Guy <br />
                                                    Pestalozzistraße 22 <br />
                                                    74076 Heilbronn <br />
                                                    Germany <br />
                                                </p>
                                                    <a class="siteLink" target="_blank" href="http://logis.carug.fr/">
                                                        <label>CARUG SOLUTIONS</label>
                                                    </a>
                                                    <br /> <br /> 
                                                    <span>Mail:&nbsp;</span>
                                                    <a class="siteLink" href="mailto:guybami@yahoo.fr">
                                                    <span>contact@carug.fr</span></a>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="toLeft sectionTitleDiv fullWidth">
                                                <label>Liability for content</label>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="toLeft">
                                               <p class="textMargin">
                                                  The contents of these pages were created with great care. 
                                                  For the accuracy, completeness and Timeliness of the content of the site operators
                                                   can not take any responsibility. As a provider of Information page of
                                                    the operator in accordance with § 7 paragraph 1 of TMG for the content
                                                     on these Web pages the general law. According to § § 8 to 10 TMG, 
                                                     the site operators as provider of information but not the obligation, 
                                                     transmitted or stored information, monitor or to investigate circumstances 
                                                     that indicate illegal activity. Obligations to remove or block the use of 
                                                     information according to general Laws remain unaffected thereby. 
                                                     A liability is only from the date of Knowledge of a specific 
                                                     infringement possible. Upon notification of appropriate Rights 
                                                     violations such content will be removed immediately. 
                                                     The site operator reserves expressly to 
                                                     change pages in whole or in part, modify, delete, or Temporarily or permanently. 
                                               </p>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="toLeft sectionTitleDiv fullWidth">
                                                <label>Liability for content</label>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="toLeft">
                                               <p class="textMargin">
                                                  This site contains links to external websites over which I have no control. 
                                                  Therefore, the site operators can on these Web sites and accept no liability. 
                                                  For Contents of the linked pages is always the provider or operator of such sites. 
                                                  The linked sites were checked at the time of linking for possible violations.
                                                   Illegal contents were not recognizable at the time of linking. 
                                                   A permanent Control of the linked pages is unreasonable without 
                                                   concrete evidence of a violation not reasonable. Upon notification of 
                                                   violations, such links immediately away. 
                                               </p>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="toLeft sectionTitleDiv fullWidth">
                                                <label>Copyright</label>
                                            </td>
                                          </tr>
                                          <tr>
									        <td class="toLeft">
                                               <p class="textMargin">
                                                    The page contents and work on these pages are subject to German copyright law. 
                                                    The reproduction, adaptation, distribution or any kind of exploitation 
                                                    outside the limits of copyright require the written consent of the 
                                                    Author or creator. Downloads and copies of this site are for private 
                                                    use only not commercial use. Insofar as the content on this page are 
                                                    not created by the operator were, the copyrights of third parties are respected. Any duplication as such labeled. You should still be aware of a copyright infringement, would the provider of the website over a mention. Upon notification of violations, such contents are removed immediately. 
                                               </p>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="toLeft sectionTitleDiv fullWidth">
                                                <label>Webmaster</label>
                                            </td>
                                          </tr>
                                          <tr>
                                                <td class="toLeft">
                                               <p class="textMargin">
                                                    Bami Watcho Guy <br />
                                                    Senior Software Developer <br />
                                                    <span>Phone:&nbsp;</span>
                                                        <a class="siteLink" href="javascript:;">
                                                        <span>+49 17675205386</span></a> <br />
                                                        <span>Mail:&nbsp;</span>
                                                        <a class="siteLink" href="mailto:guybami@yahoo.fr">
                                                        <span>guybami@yahoo.fr</span></a> <br />
                                                </p>
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
        </td>
      </tr>
    </table>
   <br /> <br />      
    ';

    $mainPage->setUseDojoScripts(false);
    $mainPage->setActiveMenu("home");
    $mainPage->setDirectoryLevel(0);
    $mainPage->setUserLanguage($userLang);
    $mainPage->setShouldDisplayLanguageSelection(false);
    $mainPage->setPageJscript($script);
    $mainPage->setTitle($title);
    $mainPage->setContent($content);
    $mainPage->displayPage();
 
