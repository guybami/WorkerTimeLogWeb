
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Conferences';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/conferences.fr.res.php", "../../UIResources/conferences.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.ConferenceUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.ConferenceUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.ConferenceUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.ConferenceUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.ConferenceUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.ConferenceUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.ConferenceUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.ConferenceUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.ConferenceUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.ConferenceUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.ConferenceUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.ConferenceUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.ConferenceUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.ConferenceUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.ConferenceUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.ConferenceUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.ConferenceUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.ConferenceUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.ConferenceUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.ConferenceUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.ConferenceUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.ConferenceUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.ConferenceUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.ConferenceUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.ConferenceUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.ConferenceUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.ConferenceUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.ConferenceUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.ConferenceUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.ConferenceUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.ConferenceUIResource::updateItemDetailsTitleLabelText().'",

          dateColLabel : "'.ConferenceUIResource::dateColLabelText().'",
          titleColLabel : "'.ConferenceUIResource::titleColLabelText().'",
          locationColLabel : "'.ConferenceUIResource::locationColLabelText().'",
          summaryColLabel : "'.ConferenceUIResource::summaryColLabelText().'",
          
          noItemSelectedLabel : "'.html_entity_decode(ConferenceUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.ConferenceUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.ConferenceUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.ConferenceUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/conferencesScript.js"  type="text/javascript"> </script> 

         
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
                                <h2>'.ConferenceUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.ConferenceUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.ConferenceUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.ConferenceUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.ConferenceUIResource::deleteItemsBtnLabelText().'
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
                                                            <div id="conferencesGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

								<!-- Add item modal dialog form -->
                                <div id="conferenceDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.ConferenceUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.ConferenceUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.ConferenceUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.ConferenceUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.ConferenceUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.ConferenceUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.ConferenceUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.ConferenceUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.ConferenceUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.ConferenceUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.ConferenceUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.ConferenceUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.ConferenceUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.ConferenceUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.ConferenceUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.ConferenceUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="dateLabel" class="control-label col-md-4 ">'.ConferenceUIResource::dateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="dateLabel"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="titleLabel" class="control-label col-md-4">'.ConferenceUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="titleLabel"></label>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="locationLabel" class="control-label col-md-4">'.ConferenceUIResource::locationColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="locationLabel"></label>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="summaryLabel" class="control-label col-md-4">'.ConferenceUIResource::summaryColLabelText().'</label>
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
                                        <form id="conferenceDetailsForm" class="form-horizontal" data-dojo-id="conferenceDetailsForm" encType="multipart/form-data">
                                            <div class="form-group">
                                                <label for="inputTime" class="control-label col-md-4 noWrap">*'.ConferenceUIResource::dateColLabelText().'</label>
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
                                                <label for="title" class="control-label col-md-4 noWrap">*'.ConferenceUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="title" name="title" aria-required="true"  data-placement="top" aria-invalid="false" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="location" class="control-label col-md-4 noWrap">'.ConferenceUIResource::locationColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="location" name="location" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="summary" class="control-label col-md-4 noWrap">'.ConferenceUIResource::summaryColLabelText().'</label>
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
 
