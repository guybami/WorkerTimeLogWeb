 
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = "My Africa eV - Test validation";
    // load UI resource 


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script defer src="../../Scripts/validateFormScript.js"  type="text/javascript"> </script> 

        <script  type="text/javascript">
        </script>
        <style type="text/css">
            .bs-example{
    	        margin: 20px;
                width:600px;
                border: 2px solid red;
            }
	        /* Fix alignment issue of label on extra small devices in Bootstrap 3.2 */
            .form-horizontal .control-label{
                padding-top: 7px;
            }

        </style>
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
                                <h2>Status</h2>
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
                                        <div class="col-md-6" style="height:130px;">
                                            
                                        </div>
                                        <script type="text/javascript">
                                            $(function () {
                                                $("#inputTime").datetimepicker({
                                                    icons: {
                                                        time: "fa fa-clock-o",
                                                        date: "fa fa-calendar",
                                                        up: "fa fa-arrow-up",
                                                        down: "fa fa-arrow-down"
                                                    }
                                                });
                                            });
                                        </script>
                                        <br />

                                    <hr />
                                    <div class="row_">
                                        <div class="bs-example">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="inputTime" class="control-label col-md-2">Date</label>
                                                    <div class="col-md-10">
                                                        <div class="input-group date" id="inputTime">
                                                            <input type="text" class="form-control" />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar">
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="inputEmail" class="control-label col-md-2">Email</label>
                                                    <div class="col-md-10">
                                                        <label class="form-control-static">harrypotter@mail.com</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword" class="control-label col-md-2">Password</label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="summary" class="control-label col-md-2">Summary</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" rows="5" id="summary" name="summary"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox2" class="styled" type="checkbox" checked>
                                                            <label for="checkbox2">Save data</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <button type="submit" class="btn btn-primary">Login</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="checkbox">
                                                <input id="checkbox1" class="styled" type="checkbox">
                                                <label for="checkbox1">
                                                    Default
                                                </label>
                                            </div>
                                            



                                        </div>
                                    <div>

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