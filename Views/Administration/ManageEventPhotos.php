
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - EventPhotos';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/eventPhotos.fr.res.php", "../../UIResources/eventPhotos.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
	  viewAllItemsBtnLabel : "'.EventPhotoUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.EventPhotoUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.EventPhotoUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.EventPhotoUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.EventPhotoUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.EventPhotoUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.EventPhotoUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.EventPhotoUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.EventPhotoUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.EventPhotoUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.EventPhotoUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.EventPhotoUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.EventPhotoUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.EventPhotoUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.EventPhotoUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.EventPhotoUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.EventPhotoUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.EventPhotoUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.EventPhotoUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.EventPhotoUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.EventPhotoUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.EventPhotoUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.EventPhotoUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.EventPhotoUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.EventPhotoUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.EventPhotoUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.EventPhotoUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.EventPhotoUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.EventPhotoUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.EventPhotoUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.EventPhotoUIResource::updateItemDetailsTitleLabelText().'",
          
          noItemSelectedLabel : "'.html_entity_decode(EventPhotoUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.EventPhotoUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.EventPhotoUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.EventPhotoUIResource::subMenuItemSectionTitleLabelText().'",
          // datagrid columns
          eventIdColLabel : "'.EventPhotoUIResource::eventIdColLabelText().'",
          titleColLabel : "'.EventPhotoUIResource::titleColLabelText().'",
          fileFullNameColLabel : "'.EventPhotoUIResource::fileFullNameColLabelText().'"
	};

        </script>
        <script defer src="../../Scripts/eventPhotosScript.js"  type="text/javascript"> </script> 
        <script   src="../../Scripts/progressBarScript.js"  type="text/javascript"> </script> 
         
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
                                <h2>'.EventPhotoUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.EventPhotoUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.EventPhotoUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.EventPhotoUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.EventPhotoUIResource::deleteItemsBtnLabelText().'
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
                                                            <div id="eventPhotosGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

				<!-- Add item modal dialog form -->
                                <div id="eventPhotoDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.EventPhotoUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.EventPhotoUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.EventPhotoUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.EventPhotoUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.EventPhotoUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.EventPhotoUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.EventPhotoUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.EventPhotoUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.EventPhotoUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.EventPhotoUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.EventPhotoUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.EventPhotoUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.EventPhotoUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.EventPhotoUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.EventPhotoUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.EventPhotoUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="eventIdLabel" class="control-label col-md-4">' . EventPhotoUIResource::eventIdColLabelText() . '</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="eventIdLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="fileFullNameLabel" class="control-label col-md-4">' . EventPhotoUIResource::fileFullNameColLabelText() . '</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="fileFullNameLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="titleLabel" class="control-label col-md-4">' . EventPhotoUIResource::titleColLabelText() . '</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="titleLabel"></label>
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
                                        <form id="eventPhotoDetailsForm" class="form-horizontal" name="eventPhotoDetailsForm" enctype="multipart/form-data">
                                            <div class="form-group col-md-12 hideContent"  id="progressBarDiv">
                                                    <div class="progress-div ">
                                                        <div class="progress-bar" id="fileUploadProgress" role="progressbar" aria-valuenow="0" 
                                                            aria-valuemin="0" aria-valuemax="100" >
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="eventId">' . EventPhotoUIResource::eventIdColLabelText() . '</label>
                                                <div class="col-md-8">
                                                    <select   id="eventId" name="eventId" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="title">' . EventPhotoUIResource::titleColLabelText() . '</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="title" name="title" class="form-control"  />  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="fileFullName">' . EventPhotoUIResource::fileFullNameColLabelText() . '</label>
                                                <div class="col-md-8" nowrap="nowrap">
                                                    <div class="input-group">
                                                        <input type="text" id="fileFullName" name="fileFullName" readonly  class="form-control" />
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-secondary" type="button" onClick="showSelectFileDialog(\'filesToUpload\');">Selectionez...</button>
                                                        </span>
                                                        <div class="hideContent">
                                                             <input name="filesToUpload[]" id="filesToUpload" type="file"  accept=".gif, .jpeg, .jpg, .png" multiple="multiple" />
                                                             <input type="hidden" name="userAction" id="userAction" value="uploadEventPhotos" />
                                                              
                                                        </div>
                                                        
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
 
