<?php
        
    require_once "Includes/Common.php";
    require_once "DataAccessObject/DaoCommon.php";
    require_once "Models/EntityCommon.php";
    require "Views/PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Home';
    // load UI resource 
    Utils::loadUIResources("./UIResources/index.fr.res.php", "./UIResources/index.en.res.php");

    // custon page script, if needed
    $script = '
        <!-- inline script for index page -->
        <script src="./Scripts/homeScript.js" type="text/javascript" ></script>

        <script src="./Scripts/jqueryFlash.js" type="text/javascript" ></script>
        <script src="./Scripts/flashSlider.js" type="text/javascript" ></script>
        <script src="./Scripts/flashScript.js" type="text/javascript" ></script>

        <script language="javascript" type="text/javascript">
        </script>';
    /// page content
    $content = ' 
            
        <!-- page content -->
                <div class="row top_tiles">
                 
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">15</div>
                            <h3 class="dashItem">VEREIN</h3>
                            <p><a href="./Views/Association/ViewMembers.php">Unsere Mitglieder</a></p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-sitemap"></i></div>
                            <div class="count">8</div>
                            <h3 class="dashItem">AKTIVITÄTEN</h3>
                            <p><a href="./Views/Activities/ViewAllGames.php">Unsere Aktivitäten</a></p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">12</div>
                            <h3 class="dashItem">PROJEKTE</h3>
                            <p><a href="./Views/Members/ViewAllMembers.php">Unsere Projekte</a></p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-cubes"></i></div>
                            <div class="count">2</div>
                            <h3 class="dashItem">EVENTS</h3>
                            <p><a href="./Views/Veterans/ViewAllVeterans.php">EVENTS</a></p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">2</div>
                            <h3 class="dashItem">EXPERTE</h3>
                            <p><a href="./Views/Association/ViewExperts.php">Unsere Experte</a></p>
                        </div>
                    </div>
                </div>
                <!--
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Der Verein</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Activites</a>
                                            </li>
                                             
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="container">
                                     <h4>
                                        <p>Der Verein "MY AFRICA e.V" wurde von engagierten entwicklungspolitischen Akteure aus Afrika und Deutschland  gegrundet,
                                        die sich zum Ziel gesetzt haben die Beziehungen zwischen der Bevölkerung Afrika und Europa bzw. Deutschland zu fördern.
                                        </p>
                                    </h4>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->

                <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
                <div id="wowslider-container1">
                    <div class="ws_images">
                        <ul>
                            <li><img src="Resources/Images/flashAnimations/images/backnang_1.jpg" alt="Deutscher Bundestag - Berlin" title="Deutscher Bundestag - Berlin" id="wows1_0" /></li>
                            <li><img src="Resources/Images/flashAnimations/images/backnang2.jpg" alt="Deutscher Bundestag - Berlin" title="Deutscher Bundestag - Berlin" id="wows1_1" /></li>
                            <li><img src="Resources/Images/flashAnimations/images/img_2214.jpg" alt="Mit dem Meier - Heilbronn" title="Mit dem Meier - Heilbronn" id="wows1_2" /></li>
                            <li><img src="Resources/Images/flashAnimations/images/img_2220.jpg" alt="Heilbronn" title="Heilbronn" id="wows1_3" /></li>
                            <li><img src="Resources/Images/flashAnimations/images/img_5783.jpg" alt="Meeting - Kooperation Kamerun - Deutschland" title="Meeting - Kooperation Kamerun - Deutschland" id="wows1_4" /></li>
                            <li><img src="Resources/Images/flashAnimations/images/img_5796.jpg" alt="Meeting - Kooperation Kamerun - Deutschland" title="Meeting - Kooperation Kamerun - Deutschland" id="wows1_5" /></li>
                            <li><img src="Resources/Images/flashAnimations/images/img_5814.jpg" alt="GOP - Kooperation Kamerun - Deutschland" title="GOP - Kooperation Kamerun - Deutschland" id="wows1_6" /></li>
                            <li><a href="#"><img src="Resources/Images/flashAnimations/images/img_5833.jpg" alt="slider" title="Meeting - Kooperation Kamerun - Deutschland" id="wows1_7" /></a></li>
                            <li><img src="Resources/Images/flashAnimations/images/img_5853.jpg" alt="Meeting - Kooperation Kamerun - Deutschland" title="Meeting - Kooperation Kamerun - Deutschland" id="wows1_8" /></li>
                        </ul>
                    </div>
                    <div class="ws_bullets">
                        <div>
                            <a href="#" title="Deutscher Bundestag - Berlin"><span><img src="Resources/Images/flashAnimations/tooltips/backnang_1.jpg" alt="Deutscher Bundestag - Berlin" />1</span></a>
                            <a href="#" title="Deutscher Bundestag - Berlin"><span><img src="Resources/Images/flashAnimations/tooltips/backnang2.jpg" alt="Deutscher Bundestag - Berlin" />2</span></a>
                            <a href="#" title="Mit dem Meier - Heilbronn"><span><img src="Resources/Images/flashAnimations/tooltips/img_2214.jpg" alt="Mit dem Meier - Heilbronn" />3</span></a>
                            <a href="#" title="Heilbronn"><span><img src="Resources/Images/flashAnimations/tooltips/img_2220.jpg" alt="Heilbronn" />4</span></a>
                            <a href="#" title="Meeting - Kooperation Kamerun - Deutschland"><span><img src="Resources/Images/flashAnimations/tooltips/img_5783.jpg" alt="Meeting - Kooperation Kamerun - Deutschland" />5</span></a>
                            <a href="#" title="Meeting - Kooperation Kamerun - Deutschland"><span><img src="Resources/Images/flashAnimations/tooltips/img_5796.jpg" alt="Meeting - Kooperation Kamerun - Deutschland" />6</span></a>
                            <a href="#" title="GOP - Kooperation Kamerun - Deutschland"><span><img src="Resources/Images/flashAnimations/tooltips/img_5814.jpg" alt="GOP - Kooperation Kamerun - Deutschland" />7</span></a>
                            <a href="#" title="Meeting - Kooperation Kamerun - Deutschland"><span><img src="Resources/Images/flashAnimations/tooltips/img_5833.jpg" alt="Meeting - Kooperation Kamerun - Deutschland" />8</span></a>
                            <a href="#" title="Meeting - Kooperation Kamerun - Deutschland"><span><img src="Resources/Images/flashAnimations/tooltips/img_5853.jpg" alt="Meeting - Kooperation Kamerun - Deutschland" />9</span></a>
                        </div>
                    </div>
                    <div class="ws_script" style="position:absolute;left:-99%">
                        <a href="#">css slideshow</a>GW Web Solutions
                    </div>
                    <div class="ws_shadow"></div>
                </div>
                <!-- End WOWSlider.com BODY section -->
        <!-- end page content -->
      ';
    $contenta = ' home ';
    $mainPage->setUseDojoScripts(false);
    $mainPage->setActiveMenu("home");
    $mainPage->setDirectoryLevel(0);
    $mainPage->setUserLanguage($userLang);
    $mainPage->setShouldDisplayLanguageSelection(true);
    $mainPage->setPageJscript($script);
    $mainPage->setTitle($title);
    $mainPage->setContent($content);
    $mainPage->displayPage();
        
 
