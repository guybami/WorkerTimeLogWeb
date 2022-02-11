 
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = "My Africa eV - Test progressbar";
    // load UI resource 


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script   src="../../Scripts/progressBarTestScript.js"  type="text/javascript"> </script> 
        ';
    // page content
    $content = ' 
        <div id="sitePathDiv"></div>
         
          <!-- page content -->
          <div class="row">
            <div class="container">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Test progressbar</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Print</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div> <!-- close x_title -->
                            <div class="x_content">
                                <!-- test div -->
                                 <div class="container">
                                    <div id="holderContentDiv">     
                                        <h3>display hier</h3>
                                        <hr />
                                        <table class="fullWidth smallBorder">
                                            <tr>
                                                <td>
                                                    <div class="form-group ">
                                                        <label for="inputEmail" class="control-label col-md-4">Progress</label>
                                                            <div class="hideContent" id="progressBarDiv">
                                                                <div class="progress-div ">
                                                                    <div class="progress-bar" id="fileUploadProgress" role="progressbar" aria-valuenow="0" 
                                                                        aria-valuemin="0" aria-valuemax="100" >

                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </td>
                                                <td>    
                                                    <div class="form-group">
                                                        <div class="col-md-offset-2 col-md-10">
                                                            <button  class="btn btn-primary" id="taskBtn"   
                                                                data-loading-text="<i class=\'fa fa-spinner fa-spin\'></i> Processing...">Start Task</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                            
                                </div>
                                 
                                <br />

                          </div> 
                          <!-- end x_content -->       
                    </div>
                    <!-- close x_panel -->
                </div>
                <!-- close div m-12 -->
            </div> 
            <!-- end div container -->
        </div>     
        <!-- end div row -->
    ';

    $mainPage->setUseDojoScripts(true);
    $mainPage->setActiveMenu("administration");
    $mainPage->setDirectoryLevel(2);
    $mainPage->setUserLanguage($userLang);
    $mainPage->setShouldDisplayLanguageSelection(false);
    $mainPage->setPageJscript($script);
    $mainPage->setTitle($title);
    $mainPage->setContent($content);
    $mainPage->displayPage();