
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Tutorials';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/tutorials.fr.res.php", "../../UIResources/tutorials.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.TutorialUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.TutorialUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.TutorialUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.TutorialUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.TutorialUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.TutorialUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.TutorialUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.TutorialUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.TutorialUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.TutorialUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.TutorialUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.TutorialUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.TutorialUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.TutorialUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.TutorialUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.TutorialUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.TutorialUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.TutorialUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.TutorialUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.TutorialUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.TutorialUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.TutorialUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.TutorialUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.TutorialUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.TutorialUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.TutorialUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.TutorialUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.TutorialUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.TutorialUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.TutorialUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.TutorialUIResource::updateItemDetailsTitleLabelText().'",

           
          
          noItemSelectedLabel : "'.html_entity_decode(TutorialUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.TutorialUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.TutorialUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.TutorialUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/tutorialsScript.js"  type="text/javascript"> </script> 

         
        ';
    /// page content
    $content = ' 
        <div id="sitePathDiv"></div>
         
          <!-- page content -->
          <div class="row hideContent">
            <div class="container">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>'.TutorialUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.TutorialUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.TutorialUIResource::exportCsvDropMenuLabelText().'</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div> <!-- close x_title -->
                            <div class="x_content">
                                <div id="sectionTitleAndToolbarBtnDiv" class="hideContent">
                                    <!-- main toolbar -->
                                    <table class="fullWidth hideContent zeroSpacing zeroPadding"   id="toolbarButtonsTable">
                                        <tr>
                                            <td class="toLeft zeroPadding" align="left">
                                                <div>
                                                    <table class="fullWidth cellspacing2 cellpadding2">
                                                        <tr>
                                                            <td class="toLeft">
                                                                <div id="toolbarButtonsDiv" class="hideContent">
                                                                    <span id="spanAddNewItemBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="addNewItemBtn"  > 
                                                                            <span class="glyphicon glyphicon-plus"></span> 
                                                                             '.TutorialUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.TutorialUIResource::deleteItemsBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
								<!-- end main toolbar -->
                                <!-- success and error overlay content -->
                                <div id="successOverlayDiv"></div>
                                <div id="errorContentDiv"></div>
                                <!-- data items view div -->
                                <div id="gridDataViewDiv">
                                    <span id="resultsDiv" class="selectedItemsDiv toLeft"></span>
                                    <table class="hideBorder fullWidth cellspacing0">
                                        <tr>
                                            <td class="cellpadding0">
                                                <table class="fullWidth hideBorder cellspacing0">
                                                    <tr>
                                                        <td class="fullWidth cellpadding0">
                                                            <!-- datagrid items view -->
                                                            <div id="tutorialsGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

								<!-- Add item modal dialog form -->
                                <div id="tutorialDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.TutorialUIResource::addNewItemBtnLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="addNewItemDialogContent"></div>
                                            </div> <!-- end modal body -->
                                            <div class="modal-footer">
                                                <table class="fullWidth">
                                                    <tr>
                                                        <td>
                                                            <table align="right">
                                                                <tr>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-primary" id="addNewItemBtnDialog" >
                                                                         '.TutorialUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.TutorialUIResource::cancelAddItemBtnLabelText().'</button>
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

                                <!-- View/Edit item modal dialog form -->
                                <div id="viewItemDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">'.TutorialUIResource::editItemDetailsTitleLabelText().'</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="viewItemDetailsDialogContent"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <table class="fullWidth">
                                                        <tr>
                                                            <td>
                                                                <table align="right">
                                                                    <tr>
                                                                        <td class="toRight">
                                                                            <span id="spanEditItemBtnDialogDialog" class="hideContent">
                                                                                <button  class="btn btn-primary"
                                                                                     title="'.TutorialUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.TutorialUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.TutorialUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.TutorialUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.TutorialUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.TutorialUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.TutorialUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.TutorialUIResource::cancelUpdateItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
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
								<!-- end View modal dialog form -->   

                                <!-- Confirm deletion dialog form -->
                                <div id="confirmDeletionDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- confirm delete Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.TutorialUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.TutorialUIResource::confirmDeletionLabelText().'</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <table class="fullWidth">
                                                    <tr>
                                                        <td>
                                                            <table align="right">
                                                                <tr> 
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.TutorialUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.TutorialUIResource::cancelDeleteItemBtnLabelText().'</button>
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
								<!-- end Confirm deletion modal dialog form -->    
         
                                <!-- view Item details div content-->
                                <div class="hideContent" id="viewItemDetailsFormContentDiv">
                                    <div class="container">
                                        <div class="form-horizontal" id="viewForm">
                                            <div class="form-group ">
                                                <label for="userIdLabel" class="control-label col-md-4">'.TutorialUIResource::userIdColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="userIdLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="subjectLabel" class="control-label col-md-4">'.TutorialUIResource::subjectColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="subjectLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="titleLabel" class="control-label col-md-4">'.TutorialUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="titleLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="semesterLabel" class="control-label col-md-4">'.TutorialUIResource::semesterColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="semesterLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="dateLabel" class="control-label col-md-4">'.TutorialUIResource::dateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="dateLabel"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <!-- end view Item details div content-->

                                <!-- Add/Edit Item details div content-->
                                <div id="editItemDetailsFormContentDiv" class="hideContent">
                                    <div class="container">
                                        <form id="tutorialDetailsForm" class="form-horizontal" data-dojo-id="tutorialDetailsForm" encType="multipart/form-data">

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="userId">'.TutorialUIResource::userIdColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="number" id="userId" name="userId" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="subject">'.TutorialUIResource::subjectColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="subject" name="subject" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="title">'.TutorialUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="title" name="title" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="semester">'.TutorialUIResource::semesterColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="semester" name="semester" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="date">'.TutorialUIResource::dateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control" id="date" name="date" aria-required="true" data-placement="top" aria-invalid="false" required />
                                                        <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
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
    $mainPage->setDirectoryLevel(2);
    $mainPage->setUserLanguage($userLang);
    $mainPage->setShouldDisplayLanguageSelection(false);
    $mainPage->setPageJscript($script);
    $mainPage->setTitle($title);
    $mainPage->setContent($content);
    $mainPage->displayPage();
 
