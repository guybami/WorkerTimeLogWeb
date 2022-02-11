
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
    Utils::loadUIResources("../../UIResources/members.fr.res.php", "../../UIResources/members.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.MemberUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.MemberUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.MemberUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.MemberUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.MemberUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.MemberUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.MemberUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.MemberUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.MemberUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.MemberUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.MemberUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.MemberUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.MemberUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.MemberUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.MemberUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.MemberUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.MemberUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.MemberUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.MemberUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.MemberUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.MemberUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.MemberUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.MemberUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.MemberUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.MemberUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.MemberUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.MemberUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.MemberUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.MemberUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.MemberUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.MemberUIResource::updateItemDetailsTitleLabelText().'",

          genderColLabel : "'.MemberUIResource::genderColLabelText().'",
          nameColLabel : "'.MemberUIResource::nameColLabelText().'",
          lastNameColLabel : "'.MemberUIResource::lastNameColLabelText().'",
          emailColLabel : "'.MemberUIResource::emailColLabelText().'",
          phoneNumberColLabel : "'.MemberUIResource::phoneNumberColLabelText().'",
          zipCodeColLabel : "'.MemberUIResource::zipCodeColLabelText().'",
          cityColLabel : "'.MemberUIResource::cityColLabelText().'",
          addressColLabel : "'.MemberUIResource::addressColLabelText().'",
          positionColLabel : "'.MemberUIResource::positionColLabelText().'",

          noItemSelectedLabel : "'.html_entity_decode(MemberUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.MemberUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.MemberUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.MemberUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/membersScript.js"  type="text/javascript"> </script> 

         
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
                                <h2>'.MemberUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.MemberUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.MemberUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.MemberUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.MemberUIResource::deleteItemsBtnLabelText().'
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
                                                <h4 class="modal-title">'.MemberUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.MemberUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.MemberUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.MemberUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.MemberUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.MemberUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.MemberUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.MemberUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.MemberUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.MemberUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.MemberUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.MemberUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.MemberUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.MemberUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.MemberUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.MemberUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="genderLabel" class="control-label col-md-4">'.MemberUIResource::genderColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="genderLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="nameLabel" class="control-label col-md-4">'.MemberUIResource::nameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="nameLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="lastNameLabel" class="control-label col-md-4">'.MemberUIResource::lastNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="lastNameLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="emailLabel" class="control-label col-md-4">'.MemberUIResource::emailColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="emailLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="phoneNumberLabel" class="control-label col-md-4">'.MemberUIResource::phoneNumberColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="phoneNumberLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="zipCodeLabel" class="control-label col-md-4">'.MemberUIResource::zipCodeColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="zipCodeLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="cityLabel" class="control-label col-md-4">'.MemberUIResource::cityColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="cityLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="addressLabel" class="control-label col-md-4">'.MemberUIResource::addressColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="addressLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="positionLabel" class="control-label col-md-4">'.MemberUIResource::positionColLabelText().'</label>
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
                                                <label class="control-label col-md-4" for="gender">'.MemberUIResource::genderColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <select   id="gender" name="gender" class="__selectpicker">  
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                    
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="name">'.MemberUIResource::nameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="name" name="name" class="form-control" aria-required="true"  aria-invalid="true" data-placement="right"/>  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="lastName">'.MemberUIResource::lastNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="lastName" name="lastName" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="email">'.MemberUIResource::emailColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="email" name="email" class="form-control" aria-required="true"  aria-invalid="true" data-placement="right"/>  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="phoneNumber">'.MemberUIResource::phoneNumberColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="phoneNumber" name="phoneNumber" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="zipCode">'.MemberUIResource::zipCodeColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="zipCode" name="zipCode" class="form-control" />  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="city">'.MemberUIResource::cityColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="city" name="city" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="address">'.MemberUIResource::addressColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="address" name="address" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="position">'.MemberUIResource::positionColLabelText().'</label>
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
 
