
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Members';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/officeMembers.fr.res.php", "../../UIResources/officeMembers.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.OfficeMemberUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.OfficeMemberUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.OfficeMemberUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.OfficeMemberUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.OfficeMemberUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.OfficeMemberUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.OfficeMemberUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.OfficeMemberUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.OfficeMemberUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.OfficeMemberUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.OfficeMemberUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.OfficeMemberUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.OfficeMemberUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.OfficeMemberUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.OfficeMemberUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.OfficeMemberUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.OfficeMemberUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.OfficeMemberUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.OfficeMemberUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.OfficeMemberUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.OfficeMemberUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.OfficeMemberUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.OfficeMemberUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.OfficeMemberUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.OfficeMemberUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.OfficeMemberUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.OfficeMemberUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.OfficeMemberUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.OfficeMemberUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.OfficeMemberUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.OfficeMemberUIResource::updateItemDetailsTitleLabelText().'",

          genderColLabel : "'.OfficeMemberUIResource::genderColLabelText().'",
          nameColLabel : "'.OfficeMemberUIResource::nameColLabelText().'",
          lastNameColLabel : "'.OfficeMemberUIResource::lastNameColLabelText().'",
          emailColLabel : "'.OfficeMemberUIResource::emailColLabelText().'",
          phoneNumberColLabel : "'.OfficeMemberUIResource::phoneNumberColLabelText().'",
          zipCodeColLabel : "'.OfficeMemberUIResource::zipCodeColLabelText().'",
          cityColLabel : "'.OfficeMemberUIResource::cityColLabelText().'",
          addressColLabel : "'.OfficeMemberUIResource::addressColLabelText().'",
          positionColLabel : "'.OfficeMemberUIResource::positionColLabelText().'",

          noItemSelectedLabel : "'.html_entity_decode(OfficeMemberUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.OfficeMemberUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.OfficeMemberUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.OfficeMemberUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/officeMembersScript.js"  type="text/javascript"> </script> 

         
        ';
    /// page content
    $content = ' 
        <div id="sitePathDiv"></div>
         
          <!-- page content -->
          <div class="row">
            <div class="container">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>'.OfficeMemberUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.OfficeMemberUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.OfficeMemberUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.OfficeMemberUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.OfficeMemberUIResource::deleteItemsBtnLabelText().'
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
                                                            <div id="membersGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

								<!-- Add item modal dialog form -->
                                <div id="memberDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.OfficeMemberUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.OfficeMemberUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.OfficeMemberUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.OfficeMemberUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.OfficeMemberUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.OfficeMemberUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.OfficeMemberUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.OfficeMemberUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.OfficeMemberUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.OfficeMemberUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.OfficeMemberUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.OfficeMemberUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.OfficeMemberUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.OfficeMemberUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.OfficeMemberUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.OfficeMemberUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="genderLabel" class="control-label col-md-4">'.OfficeMemberUIResource::genderColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="genderLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="nameLabel" class="control-label col-md-4">'.OfficeMemberUIResource::nameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="nameLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="lastNameLabel" class="control-label col-md-4">'.OfficeMemberUIResource::lastNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="lastNameLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="emailLabel" class="control-label col-md-4">'.OfficeMemberUIResource::emailColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="emailLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="phoneNumberLabel" class="control-label col-md-4">'.OfficeMemberUIResource::phoneNumberColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="phoneNumberLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="zipCodeLabel" class="control-label col-md-4">'.OfficeMemberUIResource::zipCodeColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="zipCodeLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="cityLabel" class="control-label col-md-4">'.OfficeMemberUIResource::cityColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="cityLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="addressLabel" class="control-label col-md-4">'.OfficeMemberUIResource::addressColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="addressLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="positionLabel" class="control-label col-md-4">'.OfficeMemberUIResource::positionColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="positionLabel"></label>
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
                                        <form id="memberDetailsForm" class="form-horizontal" data-dojo-id="memberDetailsForm" encType="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="gender">'.OfficeMemberUIResource::genderColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <select   id="gender" name="gender" class="__selectpicker">  
                                                        <option value="Male">Homme</option>
                                                        <option value="Female">Femme</option>
                                                    </select>
                                                </div>
                                            </div>
                    
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="name">'.OfficeMemberUIResource::nameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="name" name="name" class="form-control" aria-required="true"  aria-invalid="true" data-placement="right"/>  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="lastName">'.OfficeMemberUIResource::lastNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="lastName" name="lastName" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="email">'.OfficeMemberUIResource::emailColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="email" name="email" class="form-control" aria-required="true"  aria-invalid="true" data-placement="right"/>  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="phoneNumber">'.OfficeMemberUIResource::phoneNumberColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="phoneNumber" name="phoneNumber" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="zipCode">'.OfficeMemberUIResource::zipCodeColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="zipCode" name="zipCode" class="form-control" />  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="city">'.OfficeMemberUIResource::cityColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="city" name="city" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="address">'.OfficeMemberUIResource::addressColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="address" name="address" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="position">'.OfficeMemberUIResource::positionColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="position" name="position" class="form-control" />  
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
 
