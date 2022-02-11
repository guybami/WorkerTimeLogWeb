
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Customers';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/customers.fr.res.php", "../../UIResources/customers.en.res.php",
        "../../UIResources/customers.de.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.CustomerUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.CustomerUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.CustomerUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.CustomerUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.CustomerUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.CustomerUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.CustomerUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.CustomerUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.CustomerUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.CustomerUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.CustomerUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.CustomerUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.CustomerUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.CustomerUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.CustomerUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.CustomerUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.CustomerUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.CustomerUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.CustomerUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.CustomerUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.CustomerUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.CustomerUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.CustomerUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.CustomerUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.CustomerUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.CustomerUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.CustomerUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.CustomerUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.CustomerUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.CustomerUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.CustomerUIResource::updateItemDetailsTitleLabelText().'",

          nameColLabel : "'.CustomerUIResource::nameColLabelText().'",
          lastNameColLabel : "'.CustomerUIResource::lastNameColLabelText().'",
          emailColLabel : "'.CustomerUIResource::emailColLabelText().'",
          phoneNumberColLabel : "'.CustomerUIResource::phoneNumberColLabelText().'",
          zipCodeColLabel : "'.CustomerUIResource::zipCodeColLabelText().'",
          cityColLabel : "'.CustomerUIResource::cityColLabelText().'",
          streetColLabel : "'.CustomerUIResource::streetColLabelText().'",

          noItemSelectedLabel : "'.html_entity_decode(CustomerUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.CustomerUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.CustomerUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.CustomerUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/customersScript.js"  type="text/javascript"> </script> 
        ';
    /// page content
    $content = ' 
        <div id="sitePathDiv"></div>
         
          <!-- page content -->
          <div class="row ">
            <div class="container">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>'.CustomerUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.CustomerUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.CustomerUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.CustomerUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.CustomerUIResource::deleteItemsBtnLabelText().'
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
                                                            <div id="customersGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

				<!-- Add item modal dialog form -->
                                <div id="customerDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.CustomerUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.CustomerUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.CustomerUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.CustomerUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.CustomerUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.CustomerUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.CustomerUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.CustomerUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.CustomerUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.CustomerUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.CustomerUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.CustomerUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.CustomerUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.CustomerUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.CustomerUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.CustomerUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="nameLabel" class="control-label col-md-4">'.CustomerUIResource::nameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="nameLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="lastNameLabel" class="control-label col-md-4">'.CustomerUIResource::lastNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="lastNameLabel"></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label for="emailLabel" class="control-label col-md-4">'.CustomerUIResource::emailColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="emailLabel"></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label for="phoneNumberLabel" class="control-label col-md-4">'.CustomerUIResource::phoneNumberColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="phoneNumberLabel"></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label for="zipCodeLabel" class="control-label col-md-4">'.CustomerUIResource::zipCodeColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="zipCodeLabel"></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label for="cityLabel" class="control-label col-md-4">'.CustomerUIResource::cityColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="cityLabel"></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label for="streetLabel" class="control-label col-md-4">'.CustomerUIResource::streetColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="streetLabel"></label>
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
                                        <form id="customerDetailsForm" class="form-horizontal" data-dojo-id="customerDetailsForm" encType="multipart/form-data">
                    
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="name">'.CustomerUIResource::nameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="name" name="name" class="form-control" />  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="lastName">'.CustomerUIResource::lastNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="lastName" name="lastName" class="form-control" />  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="email">'.CustomerUIResource::emailColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="email" name="email" class="form-control" />  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="phoneNumber">'.CustomerUIResource::phoneNumberColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="phoneNumber" name="phoneNumber" class="form-control" />  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="zipCode">'.CustomerUIResource::zipCodeColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="zipCode" name="zipCode" class="form-control" />  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="city">'.CustomerUIResource::cityColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="city" name="city" class="form-control" />  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="street">'.CustomerUIResource::streetColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="street" name="street" class="form-control" />  
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
 
