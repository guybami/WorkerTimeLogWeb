 
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
      <script   src="../../Scripts/validateFormScript.js"  type="text/javascript"> </script> 
      

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
                                <div class="container">
                                     <div class="row">
                                         
                                        <div class="col-sm-9 well well-small" style="margin-left:30px">
                                             
                                            <form id="theform" class="form-horizontal" novalidate="novalidate">
                                                <legend>Examples using data attributes</legend>
                                                <fieldset>
                                                     
                                                    <div class="form-group">
                                                        <label class="col-sm-1 text-right control-label">Input</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control valid" name="example1" id="example1"   placeholder="name..."
                                                                aria-required="true"  data-placement="right" aria-invalid="false" required    type="text"/>
                                                        </div>
                                                    </div>

                                                    <h5 class="margin-top30">
							                            <strong>Example 2: Change tooltop placement with an attribute</strong>
						                            </h5>
                                                    <div class="form-group">
                                                        <label class="col-sm-1 text-right control-label">Input</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" data-placement="right" name="example2" id="example2" required
                                                                placeholder="Number required" aria-required="true" 
                                                                data-placement="right" aria-invalid="false" type="number" />
                                                        </div>
                                                    </div>
                                                     

                                                    <!--Example 3: After failing validation, bind an additional tooltip trigger to the focus event-->
                                                    <h5 class="margin-top30">
							                            <strong>Example 3: After failing validation, bind an additional tooltip trigger to the focus event</strong>
						                            </h5>
                                                    <div class="form-group">
                                                        <label class="col-sm-1 text-right control-label">Input</label>
                                                        <div class="col-sm-8">
                                                            <input class="required email form-control error" data-trigger="focus" name="example3"
                                                             placeholder="Email required" 
                                                                   aria-required="true"  aria-invalid="true" data-placement="right" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-1 text-right">Tag</label>
                                                        <div class="col-sm-10">
                                                            <code>&lt;input type="text" class="required email" data-trigger="focus" name="example3""&gt;</code>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <legend class="margin-top30">Examples using JavaScript</legend>
                                                    <fieldset>
                                                    <!--Example 4: Same as Example 3 but using validate() instead-->
                                                    <h5 class="margin-top30">
							                                        <strong>Example 4: Same as Example 3 but using validate() instead</strong>
						                                        </h5>
                                                    <div class="form-group">
                                                        <label class="col-sm-1 text-right control-label">Input</label>
                                                        <div class="col-sm-10">
                                                            <input name="example4" class="form-control " placeholder="Email required" 
                                                                aria-required="true" aria-invalid="true" data-placement="right" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-1 text-right">Tag</label>
                                                        <code>&lt;input type="text" name="example4"&gt;</code>
                                                    </div>

                                                    <!--Example 5: Checkbox  -->
                                                    <h5 class="margin-top30">
							                                        <strong>Example 5: Checkbox</strong>
						                                        </h5>
                                                    <div class="form-group">
                                                        <label class="col-sm-1 text-right control-label">Input</label>
                                                        <div class="col-sm-5 checkbox checkbox-primary">
                                                            <input type="checkbox" class="styled styled-primary" id="example5" name="example5"
                                                                  aria-label="Single Some EULA you did not read">
                                                            <label>Single Some EULA you did not read</label>
                                                        </div>
                                                         
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-1 text-right">Tag</label>
                                                        <code>&lt;input type="checkbox" name="example5"&gt;</code>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-1 text-right control-label">Date input</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class=" form-control " id="example6" name="example6"
                                                                placeholder="Date required" 
                                                                aria-required="true" aria-invalid="true" data-placement="right" type="text" />
                                                        </div>
                                                         
                                                    </div>
                                                </fieldset>
                                                <div class="row margin-top30">
                                                    <div class="col-md-5">
                                                        <input class="btn btn-primary pull-right" value="Check" type="button" id="checkerBtn" />
                                                    </div>
                                                    <div class="col-md-5" id="validity_label">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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