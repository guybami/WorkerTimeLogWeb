
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Auftrags';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/auftrags.fr.res.php", "../../UIResources/auftrags.en.res.php",
        "../../UIResources/auftrags.de.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.AuftragUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.AuftragUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.AuftragUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.AuftragUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.AuftragUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.AuftragUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.AuftragUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.AuftragUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.AuftragUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.AuftragUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.AuftragUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.AuftragUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.AuftragUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.AuftragUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.AuftragUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.AuftragUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.AuftragUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.AuftragUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.AuftragUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.AuftragUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.AuftragUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.AuftragUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.AuftragUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.AuftragUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.AuftragUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.AuftragUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.AuftragUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.AuftragUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.AuftragUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.AuftragUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.AuftragUIResource::updateItemDetailsTitleLabelText().'",
             
          noItemSelectedLabel : "'.html_entity_decode(AuftragUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.AuftragUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.AuftragUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.AuftragUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/auftragsScript.js"  type="text/javascript"> </script> 
        <script   src="../../Scripts/progressBarScript.js"  type="text/javascript"> </script> 
        ';
    /// page content
    $content = ' 
        <div id="sitePathDiv"></div>
         
          <!-- page content -->
          <div class="row  " id="mainDivContent">
            <div class="container fullWidth">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>'.AuftragUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.AuftragUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.AuftragUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.AuftragUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.AuftragUIResource::deleteItemsBtnLabelText().'
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
                                                            <div id="auftragsGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

								<!-- Add item modal dialog form -->
                                <div id="auftragDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.AuftragUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.AuftragUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.AuftragUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.AuftragUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.AuftragUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.AuftragUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.AuftragUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.AuftragUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.AuftragUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.AuftragUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.AuftragUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.AuftragUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.AuftragUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.AuftragUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.AuftragUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.AuftragUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="auftragsNummerLabel" class="control-label col-md-4">'.AuftragUIResource::auftragsNummerColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="auftragsNummerLabel"></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label for="kundenNummerLabel" class="control-label col-md-4">'.AuftragUIResource::kundenNummerColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="kundenNummerLabel"></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label for="bezeichnungLabel" class="control-label col-md-4">'.AuftragUIResource::bezeichnungColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="bezeichnungLabel"></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label for="auftragAbgeschlossenLabel" class="control-label col-md-4">'.AuftragUIResource::auftragAbgeschlossenColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="auftragAbgeschlossenLabel"></label>
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
                                        <form id="auftragDetailsForm" class="form-horizontal" data-dojo-id="auftragDetailsForm" encType="multipart/form-data">
                                            <div class="form-group col-md-12 hideContent"  id="progressBarDiv">
                                                    <div class="progress-div ">
                                                        <div class="progress-bar" id="fileUploadProgress" role="progressbar" aria-valuenow="0" 
                                                            aria-valuemin="0" aria-valuemax="100" >
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="auftragsNummer">'.AuftragUIResource::auftragsNummerColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="auftragsNummer" name="auftragsNummer" class="form-control" />  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="kundenNummer">'.AuftragUIResource::kundenNummerColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="kundenNummer" name="kundenNummer" class="form-control" />  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="bezeichnung">'.AuftragUIResource::bezeichnungColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <textarea  rows="5" id="bezeichnung" name="bezeichnung" class="form-control"></textarea>  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="auftragAbgeschlossen">'.AuftragUIResource::auftragAbgeschlossenColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <select style="width:15em;"  id="auftragAbgeschlossen" name="auftragAbgeschlossen" class="selectpicker_">  
                                                        <option value="ja">ja</option>
                                                        <option value="nein">nein</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="fileFullName">Zeichnungen</label>
                                                <div class="col-md-8" nowrap="nowrap">
                                                    <div class="input-group">
                                                        <input type="text" id="fileFullName" name="fileFullName"  class="form-control" />
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-secondary" type="button" onClick="showSelectFileDialog(\'filesToUpload\');">Auswählen...</button>
                                                        </span>
                                                        <div class="hideContent">
                                                             <input name="filesToUpload[]" id="filesToUpload" type="file"  accept=".gif, .jpeg, .jpg, .png, .pdf" multiple="multiple" />
                                                             <input type="hidden" name="userAction" id="userAction" value="uploadSchemas" />
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
 
