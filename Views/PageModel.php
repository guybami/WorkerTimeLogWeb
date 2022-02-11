 <?php

/**
 * Base page model for views content
 * Class used to generate dynamic html pages
 *
 * @author     Guy Bami
 * Last update: 23.09.16
*/
class PageModel {

    // class members with default values
    private $pageContent = "No content";
    private $pageTitle = "My Africa e.V";
    private $userLanguage = "fr-FR";  //default language culture
    // default language
    private $pageJscript;
    private $displayLanguageSelection = false;
    private $useDojoScripts = true;
    // by default the selection is done only on the index.php page
    private $directoryLevel = "..";
    private $menuLevel = ".";
    private $homeLevel = "../..";
    private $activeMenuCssArray = array();
    private $dojoLibPath = "/Lib/dojo-release-1.11.2"; //"/Lib/dojo-release-1.10.4";
    private $theme = "claro";
    //Variable contenant la strucure du template
    public $dataForTemplate = "";
    // admin menu
    private $adminMenuCss = "display:none;";

    /**
     * Constructor of the
     */
    function __construct() {
        $this->setUserCurrentLanguage();
        // default language
        $this->directoryLevel = "..";
        $this->menuLevel = ".";
        $this->homeLevel = "../..";
        $this->dojoLibPath = "/Lib/dojo-release-1.11.2";
        $this->theme = "claro";
    }

    // class setters and getters functions
    function  setUserCurrentLanguage(){
        Utils::checkAndStartSession();
        if (isset($_GET) && count($_GET) > 0 && $_GET['userLang']) {
            // no data sent
            $_SESSION['userLang'] = $_GET['userLang'];
        }
        else if (!isset($_SESSION['userLang'])){
            // set default language culture
            //$_SESSION['userLang'] = "fr-FR";
            $_SESSION['userLang'] = "de-DE";
        }
        // Test
        $_SESSION["userID"] = "admin";
        $_SESSION['userName'] = "Administrator";
    }


    function setShouldDisplayLanguageSelection($flag) {
        $this->displayLanguageSelection = $flag;
    }

    function setTitle($newTitle) {
        $this->pageTitle = $newTitle;
    }

    function setPageJscript($script) {
        $this->pageJscript = $script;
    }

    function setContent($content) {
        $this->pageContent = $content;
    }

    function setUserLanguage($userLang) {
        $this->userLanguage = $userLang;
    }

    function setUseDojoScripts($useDojo) {
        $this->useDojoScripts = $useDojo;
    }

    function setDirectoryLevel($level) {
        if ($level == 0) {
            $this->directoryLevel = ".";
            $this->menuLevel = ".";
            $this->homeLevel = ".";
        }
        else if ($level == 1) {
            $this->directoryLevel = "..";
            $this->menuLevel = ".";
            $this->homeLevel = "..";
        } else if ($level == 2) {
            $this->directoryLevel = "../..";
            $this->menuLevel = "../..";
            $this->homeLevel = "../..";
        }
    }

    function getDirectoryLevel() {
        return $this->directoryLevel;
    }

    function setDojoTheme($theme) {
        $this->theme = $theme;
    }


    function displayPage() {
        $this->displayHeader();
        $this->displayMainMenu();
        $this->displayContent();
        $this->displayFooter();
    }

    function displayHeader() {
        echo '
            <!DOCTYPE html>
                <html lang="'.$this->getUserLanguage().'">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <title>'.$this->pageTitle.'</title>  
                        <!--include all CSS files-->  
                        <link rel="stylesheet" type="text/css" href="' . $this->directoryLevel . '/Resources/Styles/masterPage.css" />
                        <link rel="stylesheet" type="text/css" href="' . $this->directoryLevel . '/Resources/Styles/common.css" />
                        <!-- dojo lib files -->
                        <link rel="stylesheet" type="text/css" href="' . $this->directoryLevel . $this->dojoLibPath . '/dijit/themes/'.$this->theme.'/'.$this->theme.'.css" />
                        <link rel="stylesheet" type="text/css" href="' . $this->directoryLevel . $this->dojoLibPath . '/dojox/grid/resources/'.$this->theme.'Grid.css"  />
                        <link rel="stylesheet" type="text/css" href="' . $this->directoryLevel . $this->dojoLibPath . '/dojox/grid/enhanced/resources/'.$this->theme.'/EnhancedGrid.css"  />
                        <link rel="stylesheet" type="text/css" href="' . $this->directoryLevel . $this->dojoLibPath . '/dojox/grid/enhanced/resources/EnhancedGrid_rtl.css" />
                        <!-- Bootstrap -->
                        <link href="' . $this->directoryLevel . '/Resources/Styles/bootstrap.css" rel="stylesheet">
                        <link href="' . $this->directoryLevel . '/Resources/Styles/bootstrap-datepicker.css" rel="stylesheet">
                        <link href="' . $this->directoryLevel . '/Resources/Styles/bootstrap-checkbox.css" rel="stylesheet">
                        <link href="' . $this->directoryLevel . '/Resources/Styles/bootstrap-select.css" rel="stylesheet">


                        <!--  Wow slider -->
                        <link href="' . $this->directoryLevel . '/Resources/Styles/flashAnimations.css" rel="stylesheet">


                        <!-- font awesome for bootstrap -->
                        <link href="' . $this->directoryLevel . '/Resources/Styles/font-awesome.css" rel="stylesheet">
                        <!-- jVectorMap -->
                        <link href="' . $this->directoryLevel . '/Resources/Styles/jquery-jvectormap-2.css" rel="stylesheet">
                        <!-- custom style -->
                        <link href="' . $this->directoryLevel . '/Resources/Styles/customMenu.css" rel="stylesheet">
                        <!-- main mega horizontal menu style -->
                        <link href="' . $this->directoryLevel . '/Resources/Styles/megaMenu.css" rel="stylesheet">

                        <!-- Scripts files -->
                        <script src="' . $this->directoryLevel . '/Scripts/jquery-2.2.4.js" type="text/javascript"></script> 
                        <script src="' . $this->directoryLevel . '/Scripts/jquery.validate-1.14.0.js" type="text/javascript"></script>   
                        <script src="' . $this->directoryLevel . '/Scripts/jquery-validate.bootstrap-tooltip.js" type="text/javascript"></script> 

                        <!-- Bootstrap -->
                        <script src="' . $this->directoryLevel . '/Scripts/bootstrap-3.3.7.js" type="text/javascript"></script> 
                        <script src="' . $this->directoryLevel . '/Scripts/bootstrap-select.js" type="text/javascript"></script> 


                        <script src="' . $this->directoryLevel . '/Scripts/commonScript.js" type="text/javascript"></script>
                        <script src="' . $this->directoryLevel . '/Scripts/extendedJqueryFuncScript.js" type="text/javascript"></script> 
                        ';

        $masterScript = '
                  <script type="text/javascript">
                        <!-- global variables -->
                      var webSiteRootURL = "'.Utils::getWebsiteRootURL().'";
                      var webAccessDeniedPage = webSiteRootURL + "/View/AccessDenied.php";
                      var currentUserName = "'.$this->getCurrentUserName().'";
                      var currentUserRolesData = [];
                 </script>
                 <script src="'.$this->directoryLevel.'/Scripts/customUserRolesManager.js" type="text/javascript" ></script>
                 <script src="' . $this->directoryLevel . '/Scripts/customAnimationsScript.js" type="text/javascript" ></script>

                 <script src="' . $this->directoryLevel . '/Scripts/customDialogDataGridControl.js" type="text/javascript" ></script>
                 <script src="' . $this->directoryLevel . '/Scripts/customMembershipDataGridControl.js" type="text/javascript" ></script>
                 <script src="' . $this->directoryLevel . '/Scripts/masterScript.js" type="text/javascript" ></script>';

       

        if ($this->useDojoScripts) {
            echo '
                  <!--add dojo scripts files-->
                  <script type="text/javascript">
                    var dojoConfig = {parseOnLoad: false, isDebug:true, async: true,  
                      bindEncoding:"UTF-8", locale:"' . $this->getCurrentLocale() . '"};
                    var pageConfig = { useJqueryEffects : true, logToConsole : true, logLevel : 2 };
                  </script>';
            echo '
                  <!-- use local dojo scripts lib -->
                    <script defer src="' .$this->directoryLevel. $this->dojoLibPath . '/dojo/dojo.js.uncompressed.js" type="text/javascript"></script>
                  ';
            echo '
                  <script  type="text/javascript">
                    $(document).ready(function () {
                        setHtmlPageDimensions();
                    });
                  </script>';
        }
        else {
            // need of dojo lib
            echo '
                    <script  type="text/javascript">
                        $(document).ready(function () {
                            setHtmlPageDimensions();
                        });
                    </script>
                  ';
        }
         
        // add master page js script
        echo $masterScript;

        // display page content now
        echo '
           
        </head>
        <body class="nav-md ' . $this->theme . '">';
        //header
        
        echo '
        <!-- header start and left navigation -->
            
             <div class="container body">
                <div class="main_container">
                    <div class="col-md-3 left_col">
                        <div class="left_col scroll-view menu_full">
                            <div class="navbar nav_title" >
                                <a href="'.$this->directoryLevel.'/" class="site_title">
                                     <span>MY AFRICA e.V</span>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <br />

                            <!-- sidebar menu -->
                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                                <div class="menu_section active">
                                    <ul class="nav side-menu">
                                        <li class=""><a><i class="fa fa-home"></i>HOME<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li class="current-page"><a href="'.$this->directoryLevel.'/">Dashboard</a></li>
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-users"></i>ASSOCIATION<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="'.$this->directoryLevel.'/Views/Association/ViewStatus.php">Status</a></li>
                                                <li><a href="'.$this->directoryLevel.'/Views/Association/ViewOfficeMembers.php">Organigramme</a></li>
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-users"></i>MEMBRES<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="'.$this->directoryLevel.'/Views/Members/ViewAllMembers.php">Nos Membres</a></li>
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-sitemap"></i>ACTIVITES<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li>
                                                    <a>Activites Cuturelles<span class="fa fa-chevron-down"></span></a>
                                                    <ul class="nav child_menu">
                                                        <li class="sub_menu"><a href="'.$this->directoryLevel.'/Views/CulturalActivities/ViewCultureWeek.php">Semaine Culturelle</a></li>
                                                        <li><a href="'.$this->directoryLevel.'/Views/CulturalActivities/ViewGalaNight.php">Soir&eacute;e De Gala</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a>Activites Sportives<span class="fa fa-chevron-down"></span></a>
                                                    <ul class="nav child_menu">
                                                        <li><a href="'.$this->directoryLevel.'/Views/SportActivities/FootballStatus.php">R&egrave;gelement Interieur</a></li>
                                                        <li><a href="'.$this->directoryLevel.'/Views/SportActivities/ViewAllGames.php">Nos Tournois</a></li>
                                                        <li><a href="'.$this->directoryLevel.'/Views/SportActivities/ViewAllChallenges.php">Nos Challenges</a></li>
                                                        <li class=""><a href="'.$this->directoryLevel.'/Views/SportActivities/ViewSundayFoot.php">Football (Sant&eacute; 2-0)</a></li>
                                                        <li><a href="'.$this->directoryLevel.'/Views/SportActivities/ViewHandball.php">Handball Filles</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-cubes"></i>ANNONCES<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="'.$this->directoryLevel.'/Views/Anouncements/ViewAllAnoucments.php">Nos Annonces</a></li>
                                            </ul>
                                        </li>
                                         
                                        <li><a><i class="fa fa-cogs"></i>SERVICES<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="'.$this->directoryLevel.'/Views/Services/ViewAllServices.php">Nos Services</a></li>
                                            </ul>
                                        </li>
                                        <li id="adminMenu" style="'.$this->adminMenuCss.'"><a><i class="fa fa-cogs"></i>ADMINISTRATION<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="'.$this->directoryLevel.'/Views/Administration/ManageUserAccounts.php">Utilisateurs</a></li>
                                                <li><a href="'.$this->directoryLevel.'/Views/Administration/ManageMembers.php">Membres</a></li>
                                                <li><a href="'.$this->directoryLevel.'/Views/Administration/ManageOfficeMembers.php">Membres Du Bureau</a></li>
                                                <li><a href="'.$this->directoryLevel.'/Views/Administration/ManageEvents.php">Ev&egrave;nements</a></li>
                                                <li><a href="'.$this->directoryLevel.'/Views/Administration/ManageProjects.php">Projets</a></li>
                                                <li><a href="'.$this->directoryLevel.'/Views/Administration/ManageConferences.php">Conf&eacute;rences</a></li>
                                                <li><a href="'.$this->directoryLevel.'/Views/Administration/ManageEventPhotos.php">Photos</a></li>
                                                <li><a href="'.$this->directoryLevel.'/Views/Administration/ManageEventVideos.php">Videos</a></li>
                                                <li><a href="'.$this->directoryLevel.'/Views/Administration/ManageVideos.php">Videos</a></li>
                                            </ul>
                                        </li>
                                         
                                    </ul>
                                </div>
                            </div>
                            <!-- sidebar menu -->

                            
                        </div>
                    </div>
            <!-- header end -->

        '; 

    }
                
    function setActiveMenu($menuId) {
         //$("#" + $menuId).attr("style", "display:none");
    }

    function getCurrentLocale() {
        $userLang = $_SESSION['userLang'];
        $locale = "de"; // default langauge
        if ($userLang == "fr-FR") {
            $locale = "fr";
        }
        if ($userLang == "en-US") {
            $locale = "en";
        }
        else {
            // german
            $locale = "de";
        }
        return $locale;
    }

    function getUserLanguage() {
        if(isset($_SESSION) && isset($_SESSION['userLang'])){
            $userLang = $_SESSION['userLang'];
        }
        else{
            // default langauge
            //$userLang = "fr-FR";
            $userLang = "de-DE";
        }
        return $userLang;
    }

     

    function loadUIResource() {
        $userLang = $_SESSION['userLang'];
        if(!isset($userLang)){
            include_once "$this->homeLevel/UIResources/master.en.res.php";
            return;
        }
        if ($userLang == "fr-FR")
            include_once "$this->homeLevel/UIResources/master.fr.res.php";
        else if ($userLang == "en-US")
            include_once "$this->homeLevel/UIResources/master.en.res.php";
        else if ($userLang == "de-DE")
            include_once "$this->homeLevel/UIResources/master.de.res.php";
        else  
            include_once "$this->homeLevel/UIResources/master.en.res.php";
    }


    function displayMainMenu() {

        $this->loadUIResource();
        echo '
        <!-- top navigation menu -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav siteTitle">
                        <a id="menu_toggle" class="menuToggler_"> MY AFRICA e.V.  </a>
                    </div>
                    <ul class="nav navbar-nav navbar-right hideContent">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="' . $this->directoryLevel . '/Resources/Images/defaultUser.png" alt="">
                                <span>'.$this->getCurrentUserName().'</span>
                                <span class="fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                    <a href="'.$this->directoryLevel.'/UserProfile.php">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>'.MasterUIResource::getUserProfileText().'</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">'.MasterUIResource::getHelpText().'</a></li>
                                <li><a href="'.$this->directoryLevel.'/UserLogout.php"><i class="fa fa-sign-out pull-right"></i>'.MasterUIResource::getLogoutText().'</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="nav_menu">
                <nav class="" role="navigation">
                <!--
                    <div class="nav toggle">
                        <a id="menu_toggle" class="menuToggler"><i class="fa fa-bars"></i></a>
                    </div>
                    -->
                    <div class="nav navbar-nav navbar-center">
                         <div class="innerMenu">
                            <div class="menuDiv1"> 
                                 <ul>
                                    <li class="">
                                        <a href="#" class="">
                                            <span>HOME</span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropbtn">VEREIN</a>
                                        <div class="dropdown-content">
                                          <a href="'.$this->directoryLevel.'/Views/Association/ViewStatus.php">Satzung</a>
                                          <a href="'.$this->directoryLevel.'/Views/Association/ViewOfficeMembers.php">Mitglieder</a>
                                        </div>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropbtn">AKTIVITÄTEN</a>
                                        <div class="dropdown-content">
                                          <a href="'.$this->directoryLevel.'/Views/Activities/ViewMeetings.php">Veranstaltungen</a>
                                          <a href="'.$this->directoryLevel.'/Views/Activities/ViewPresentations.php">Vorträge</a>
                                          <a href="'.$this->directoryLevel.'/Views/Activities/ViewCoorporations.php">Kooperationen</a>
                                          <a href="'.$this->directoryLevel.'/Views/Activities/ViewTrainings.php">Fortbildung</a>
                                        </div>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropbtn">PROJEKTE</a>
                                        <div class="dropdown-content">
                                          <a href="'.$this->directoryLevel.'/Views/Projects/ViewProjects.php">Entwicklungsprojekte</a>
                                        </div>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropbtn">EVENTS</a>
                                        <div class="dropdown-content">
                                            <a href="'.$this->directoryLevel.'/Views/Events/ViewEvents.php">Letzte Events</a>
                                        </div>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropbtn">EXPERTE</a>
                                        <div class="dropdown-content">
                                            <a href="'.$this->directoryLevel.'/Views/Events/ViewExperts.php">Unsere Experte</a>
                                        </div>
                                    </li>
                                    <li class="hideContent">
                                        <a href="javascript:void(0)" class="">KONTAKT</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropbtn">ADMINISTRATION</a>
                                        <div class="dropdown-content">
                                            <a href="'.$this->directoryLevel.'/Views/Administration/ManageCustomers.php">Kunden Verwaltung</a>
                                            <a href="'.$this->directoryLevel.'/Views/Administration/ManageAuftrags.php">Aufträge Verwaltung</a>
                                            <a href="'.$this->directoryLevel.'/Views/Administration/ManageZeichnungs.php">Zeichnungen Verwaltung</a>
                                        </div>
                                    </li>
                                 </ul>
                            </div>
                                        
                         </div>
                        
                    </div>
                </nav>
            </div>
        </div>  <!-- end top navigation menu -->
         
        
         
        

        <!-- end  navigation menu -->
        ';
    }

    function displayContent() {

        echo '
            <!-- page content start -->
            <div class="right_col" id="pageContent">
                ' . $this->pageContent . '
            </div>
            <!-- page content end -->
        ';
    }

    function displayFooter() {
         
        echo '
                    <!-- page footer start-->
                    <footer class="hideContent">
                        <div class="pull-left fullWidth smallerMsg">
                            <table class="fullWidth cellspacing0 cellpadding3">
                                <tr>
                                    <td class="fullWidth toLeft">
                                        <span class="toBold">MY AFRICA e.V.</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fullWidth toLeft">
                                        <span class="">Amtsgericht Stuttgart | Vereinsregister Nr. </span> <label class="toBold">123456</label> 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fullWidth toLeft">
                                        <span class="">Vorstand: </span><label class="toBold">Velere Hiobbi</label>  
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fullWidth toLeft">
                                        <span class="">Adresse: </span><label class="toBold">c/o Valere Hiobbi., Gartenstrasse 16, 74172 Neckarsulm</label>  
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fullWidth toLeft">
                                        <span class="">Kontakt: </span><label class="toBold">alerehiobbi@yahoo.fr, Tel: 01601234567</label>  
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="pull-right smallerMsg">
                            BWG Group IT designers supervised by <a href="'.Utils::getServerRootURL().'">Guy Watcho B.</a>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- page footer end -->
                </div> <!-- close main_container div   -->
            </div> <!-- close container boby div   -->
            <!--add scripts files-->

            <!-- FastClick -->
            <script src="' . $this->directoryLevel . '/Scripts/fastclick.js" type="text/javascript"></script> 
            <!-- NProgress topbar -->
            <script src="' . $this->directoryLevel . '/Scripts/nprogress.js" type="text/javascript" ></script>
            <!-- Chart scripts -->
             
            <!-- jQuery Sparklines -->
            <script src="' . $this->directoryLevel . '/Scripts/jquerySparkline.js" type="text/javascript" ></script>
            <!-- Flot -->
            <script src="' . $this->directoryLevel . '/Scripts/jqueryPlotting.js" type="text/javascript" ></script>
            <script src="' . $this->directoryLevel . '/Scripts/jqueryRenderingPieCharts.js" type="text/javascript" ></script>
            <script src="' . $this->directoryLevel . '/Scripts/jquery.TimeAxis.js" type="text/javascript" ></script>
            <script src="' . $this->directoryLevel . '/Scripts/jqueryStackData.js" type="text/javascript" ></script>
            <script src="' . $this->directoryLevel . '/Scripts/jqueryResizePlot.js" type="text/javascript" ></script>
            <!-- Flot plugins -->
            <script src="' . $this->directoryLevel . '/Scripts/date.js" type="text/javascript" ></script>
            <script src="' . $this->directoryLevel . '/Scripts/jqueryFlot.js" type="text/javascript" ></script>
            <script src="' . $this->directoryLevel . '/Scripts/curvedLines.js" type="text/javascript" ></script>



            <!-- bootstrap-daterangepicker -->
            <script   src="' . $this->directoryLevel . '/Scripts/moment-with-locales.js" type="text/javascript" ></script>
            <script   src="' . $this->directoryLevel . '/Scripts/bootstrap-datetimepicker.js" type="text/javascript" ></script>

            <!-- Custom Theme Scripts -->
            <script src="' . $this->directoryLevel . '/Scripts/customMenuScript.js"></script>
             ';        

            echo $this->pageJscript;      
             
             
        // close html page tags
        echo '</body>
        </html>';
        ob_flush();
    }

    function getCurrentUserEncryptedData() {
        Utils::checkUserSession();
        if ($_SESSION['encryptedData'] != null && isset($_SESSION['encryptedData'])) {
            return $_SESSION['encryptedData'];
        }
        return null;
    }

    function getCurrentUserName() {
        Utils::checkUserSession();
        if ($_SESSION['userName'] != null && isset($_SESSION['userName'])) {
            $userName = $_SESSION['userName'];
            switch ($userName){
                case "guybami":
                    // show admin
                    $this->adminMenuCss = "";
                    break;
            }
            return $_SESSION['userName'];
        }
        return null;
    }

    function checkAdminRights() {
        Utils::checkUserSession();
        if ($_SESSION['userName'] != null && isset($_SESSION['userName'])) {
            $userName = $_SESSION['userName'];
            switch ($userName){
                case "guybami":
                    // show admin
                    $this->adminMenuCss = "";
                    break;
            }
                
        }
                
    }

}

            