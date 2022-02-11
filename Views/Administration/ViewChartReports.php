<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = "My Africa eV - Activites Culturelles";
    // load UI resource 
    //Utils::loadUIResources("../../UIResources/conferences.fr.res.php", "../../UIResources/conferences.en.res.php");
    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">
        </script>
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
                                <h2>Diagrammes Statistiques</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Close all</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div> <!-- close x_title -->
                            <div class="x_content">
                                <div class="container">
                                     <h4>D&eacute;sole, Cette page est encore en implementation... </h4>  
                                </div>
                          </div> 
                          <!-- end x_content -->       
                    </div>
                </div>
            </div> 
            <!-- end div container -->
        </div>     
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
 


