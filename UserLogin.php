<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Kameruner Heilbronn e.V - Login</title>
        
        <link rel="stylesheet" type="text/css" href="Resources/Styles/masterPage.css" />
        <link rel="stylesheet" type="text/css" href="Resources/Styles/common.css" />

        <link rel="stylesheet" type="text/css" href="Resources/Styles/bootstrap.css" />
        <!-- Jquery -->
        <script type="text/javascript" src="Scripts/jquery-2.2.4.js"></script>
        <script type="text/javascript" src="Scripts/jquery.validate-1.14.0.js" ></script>   
        <script src="Scripts/jquery-validate.bootstrap-tooltip.js" type="text/javascript"></script> 
        <!-- Bootstrap -->
        <script type="text/javascript" src="Scripts/bootstrap-3.3.7.js"></script>
        <script type="text/javascript" src="Scripts/bootstrap-select.js" ></script> 
        
        <script type="text/javascript" src="Scripts/commonScript.js"></script>
        <script type="text/javascript" src="Scripts/extendedJqueryFuncScript.js" ></script> 
        <script type="text/javascript" src="Scripts/loginScript.js"></script>

        <script type="text/javascript">
            var pageConfig = { useJqueryEffects : true, logToConsole : true, logLevel : 2 };
            var webSiteRootURL = "<?php include "Includes/Utils.php"; echo Utils::getWebsiteRootURL(); ?>";
        </script>

    </head>
    <body class="body">
        <div class="loginBody loginDiv">
            <table id="pageTable" class="fullWidth fullHeight  cellspacing0 cellpadding0">
                <tr>
                    <td id="pageHeader" class="headerLoginDiv">
                        <table  class="fullWidth cellspacing0 cellpadding0">
                            <tr>
                                <td class="  toLeft loginTableLargeColorTop bottomBorder">
                                    <table>
                                        <tr>
                                            <td class="toCenter">
                                                <img id="siteLogoImgLogin"  src="Resources/Images/Logos/khevLogo.png" class="logoImg"/>
                                            </td>
                                            <td class="toLeft">
                                                    <span class="titleRow marginTitleLogo">My Africa e.V</span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>   
                            </tr>
                        </table>
                    </td>   
                </tr>   
                <tr>
                    <td id="pageContent" class="toTop" valign="top">
                        <br />
                      
                        <br />
                        <div id="hiddenDiv" class="hideContent"></div>

                        <div id="mainDiv" class="hideContent_">
                            <table  class="fullWidth"  >
                                <tr>
                                    <td  align="center">
                                        <table class="formContent roundedBorder loginContent cellpadding0 cellspacing0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="toLeft sectionTitle paddingTitle cellpadding4">
                                                    <span>Authentification</span>
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td _align="center" class="topBorder toCenter">
                                                    <div id="userLoginForm" name="userLoginForm"  encType="multipart/form-data">
                                                        <table class="fullWidth loginTableSmallColorTop cellspacing5 cellpadding5" >
                                                            <tr>
                                                                <td colspan="2" class="toCenter errorMsg hideContent_">
                                                                    <label id="invalidLoginSpan"> <label id="invalidLoginMsgLabel"></label> </label>
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td class="toLeft" nowrap="nowrap">
                                                                    <label for="userLoginName">Identifiant:</label>
                                                                </td>
                                                                <td class="toLeft">
                                                                     <input type="text"  id="userLoginName" name="userLoginName" class="form-control" />  
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="toLeft" nowrap="nowrap">
                                                                    <label for="userPassword">Mot de passe:</label>
                                                                </td>
                                                                <td class="toLeft">
                                                                     <input type="password"  id="userPassword" name="userPassword" class="form-control" />  
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="toRight" colspan="2">
                                                                    <button  class="btn btn-primary btn-block btn-lg" id="loginBtn" name="loginBtn">Connexion</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="toRight" colspan="2">
                                                                    <a id="userRegistrationLink" class=" whiteText smallerMsg" href="#">S'enregistrer</a>
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
                        </div>
                        
                        <!-- page content -->
                        <div class="row">
                            <div class="container">
                                <!-- Add item modal dialog form -->
                                <div id="userRegistrationDialogContentDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Enregistrement</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="userRegistrationDialogContent"></div>
                                            </div> <!-- end modal body -->
                                            <div class="modal-footer">
                                                <table class="fullWidth">
                                                    <tr>
                                                        <td>
                                                            <table align="right">
                                                                <tr>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-primary" id="registerUserBtnDialog" >
                                                                         Inscription
                                                                        </button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Add modal dialog form --> 
                                <!-- User registration div content-->
                                <div id="userRegistrationFormContentDiv" class="hideContent">
                                       <div class="toCenter">
                                           <form id="userRegistrationForm" class="form-horizontal" data-dojo-id="userRegistrationForm" encType="multipart/form-data">

                                               <div class="form-group">
                                                   <label class="control-label col-md-4" for="loginName">Identifiant</label>
                                                   <div class="col-md-8">
                                                       <input type="text" id="loginName" name="loginName" class="form-control" required/>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-4" for="hashPassword">Mot-de-Passe</label>
                                                   <div class="col-md-8">
                                                       <input type="password" id="hashPassword" name="hashPassword" class="form-control" required/>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-4" for="hashPassword">Confirmez Mot-de-Passe</label>
                                                   <div class="col-md-8">
                                                       <input type="password" id="confirm_hashPassword" name="confirm_hashPassword" class="form-control" required />
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-4" for="name">Nom</label>
                                                   <div class="col-md-8">
                                                       <input type="text" id="name" name="name" class="form-control" required />
                                                   </div>
                                               </div>

                                               <div class="form-group">
                                                   <label class="control-label col-md-4" for="lastName">Pr&eacute;nom</label>
                                                   <div class="col-md-8">
                                                       <input type="text" id="lastName" name="lastName" class="form-control" />
                                                   </div>
                                               </div>

                                               <div class="form-group">
                                                   <label class="control-label col-md-4" for="phoneNumber">T&eacute;l&eacute;phone</label>
                                                   <div class="col-md-8">
                                                       <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" />
                                                   </div>
                                               </div>

                                               <div class="form-group">
                                                   <label class="control-label col-md-4" for="email">Email</label>
                                                   <div class="col-md-8">
                                                       <input type="text" id="email" name="email" class="form-control" />
                                                   </div>
                                               </div>
                                           </form>
                                       </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- success and error overlay content -->
                        <div id="successOverlayDiv"></div>
                        <div id="errorContentDiv"></div>
                    </td>   
                </tr> 
                <tr>
                    <td id="pageFooter" class="loginTableLargeColorTop topBottomBorder"  align="right">
                        <table  class="fullWidth   " >
                            <tr>
                                <td class="toRight">
                                    <table class="fullWidth" cellspacing10>
                                        <tr>
                                            <td class=" toRight fullHeight smallerMsg">
                                                <label>	Copyright &copy; 2016 - <?php echo date("Y"); ?> My Africa e.V </label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>   
                            </tr>
                        </table>
                    </td>   
                </tr>
            </table>   
        </div>
    </body>
</html>
