
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Events';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/events.fr.res.php", "../../UIResources/events.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.EventUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.EventUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.EventUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.EventUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.EventUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.EventUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.EventUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.EventUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.EventUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.EventUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.EventUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.EventUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.EventUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.EventUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.EventUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.EventUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.EventUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.EventUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.EventUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.EventUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.EventUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.EventUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.EventUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.EventUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.EventUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.EventUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.EventUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.EventUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.EventUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.EventUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.EventUIResource::updateItemDetailsTitleLabelText().'",

          dateColLabel : "'.EventUIResource::dateColLabelText().'",
          titleColLabel : "'.EventUIResource::titleColLabelText().'",
          locationColLabel : "'.EventUIResource::locationColLabelText().'",
          summaryColLabel : "'.EventUIResource::summaryColLabelText().'", 
              categoryColLabel : "'.EventUIResource::categoryColLabelText().'",
              
            cultureWeekLabel : "'.EventUIResource::cultureWeekLabelText().'",
            firstSemesterPartyLabel : "'.EventUIResource::firstSemesterPartyLabelText().'",
            galaNightLabel : "'.EventUIResource::galaNightLabelText().'",
            gaduationLabel : "'.EventUIResource::gaduationLabelText().'",
            grillPartyLabel : "'.EventUIResource::grillPartyLabelText().'",
            challengeLabel : "'.EventUIResource::challengeLabelText().'",
            mourningLabel : "'.EventUIResource::mourningLabelText().'",
            donationLabel : "'.EventUIResource::donationLabelText().'",
            sportLabel : "'.EventUIResource::sportLabelText().'",
            diversLabel : "'.EventUIResource::diversLabelText().'",  
            
            footballLabel : "'.EventUIResource::footballLabelText().'",
            tournamentLabel : "'.EventUIResource::tournamentLabelText().'",
          
          noItemSelectedLabel : "'.html_entity_decode(EventUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.EventUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.EventUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.EventUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/eventsScript.js"  type="text/javascript"> </script> 

         
        ';
    /// page content
    $content = ' 
        <div id="sitePathDiv"></div>
         
          <!-- page content -->
          <div class="row hideContent " id="mainDivContent">
            <div class="container fullWidth">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>'.EventUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.EventUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.EventUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.EventUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.EventUIResource::deleteItemsBtnLabelText().'
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
                                                            <div id="eventsGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

								<!-- Add item modal dialog form -->
                                <div id="eventDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.EventUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.EventUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.EventUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.EventUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.EventUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.EventUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.EventUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.EventUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.EventUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.EventUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.EventUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.EventUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.EventUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.EventUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.EventUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.EventUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                            <div class="form-group">
                                                <label for="dateLabel" class="control-label col-md-4 ">'.EventUIResource::dateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="dateLabel"></label>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="categoryLabel" class="control-label col-md-4">'.EventUIResource::categoryColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="categoryLabel"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="titleLabel" class="control-label col-md-4">'.EventUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="titleLabel"></label>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="locationLabel" class="control-label col-md-4">'.EventUIResource::locationColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="locationLabel"></label>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="summaryLabel" class="control-label col-md-4">'.EventUIResource::summaryColLabelText().'</label>
                                                <div class="col-md-8 dialogViewFieldDiv">
                                                    <label class="form-control-static dataViewLabel" id="summaryLabel"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <!-- end view Item details div content-->

                                <!-- Add/Edit Item details div content-->
                                <div   id="editItemDetailsFormContentDiv" class="hideContent">
                                    <div class="container">
                                        <label id="validity_label"></label>
                                        <form id="eventDetailsForm" class="form-horizontal" data-dojo-id="eventDetailsForm" encType="multipart/form-data">
                                            <div class="form-group">
                                                <label for="inputTime" class="control-label col-md-4 noWrap">*'.EventUIResource::dateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control" id="date" name="date" aria-required="true"  data-placement="top" aria-invalid="false" required  />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="category">'.EventUIResource::categoryColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <select  id="category" name="category" class="form-control">
                                                        <option value="FirstSemesterParty">'.EventUIResource::firstSemesterPartyLabelText().'</option>
                                                        <option value="GalaNight">'.EventUIResource::galaNightLabelText().'</option>
                                                        <option value="Challenge">'.EventUIResource::challengeLabelText().'</option>
                                                        <option value="Mourning">'.EventUIResource::mourningLabelText().'</option>
                                                        <option value="Football">'.EventUIResource::footballLabelText().'</option>
                                                        <option value="Tournament">'.EventUIResource::tournamentLabelText().'</option>
                                                        <option value="Divers">'.EventUIResource::diversLabelText().'</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="title" class="control-label col-md-4 noWrap">*'.EventUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="title" name="title" aria-required="true"  data-placement="top" aria-invalid="false" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="location" class="control-label col-md-4 noWrap">'.EventUIResource::locationColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="location" name="location" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="summary" class="control-label col-md-4 noWrap">'.EventUIResource::summaryColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="5" id="summary" name="summary"></textarea>
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
 
