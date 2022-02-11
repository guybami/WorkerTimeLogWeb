
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Veterans';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/veterans.fr.res.php", "../../UIResources/veterans.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.VeteranUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.VeteranUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.VeteranUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.VeteranUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.VeteranUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.VeteranUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.VeteranUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.VeteranUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.VeteranUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.VeteranUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.VeteranUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.VeteranUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.VeteranUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.VeteranUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.VeteranUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.VeteranUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.VeteranUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.VeteranUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.VeteranUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.VeteranUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.VeteranUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.VeteranUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.VeteranUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.VeteranUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.VeteranUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.VeteranUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.VeteranUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.VeteranUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.VeteranUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.VeteranUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.VeteranUIResource::updateItemDetailsTitleLabelText().'",

          genderColLabel : "'.VeteranUIResource::genderColLabelText().'",
          nameColLabel : "'.VeteranUIResource::nameColLabelText().'",
          lastNameColLabel : "'.VeteranUIResource::lastNameColLabelText().'",
          emailColLabel : "'.VeteranUIResource::emailColLabelText().'",
          phoneNumberColLabel : "'.VeteranUIResource::phoneNumberColLabelText().'",
          zipCodeColLabel : "'.VeteranUIResource::zipCodeColLabelText().'",
          cityColLabel : "'.VeteranUIResource::cityColLabelText().'",
          addressColLabel : "'.VeteranUIResource::addressColLabelText().'",
          positionColLabel : "'.VeteranUIResource::positionColLabelText().'",

          noItemSelectedLabel : "'.html_entity_decode(VeteranUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.VeteranUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.VeteranUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.VeteranUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/veteransScript.js"  type="text/javascript"> </script> 

         
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
                                <h2>'.VeteranUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.VeteranUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.VeteranUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.VeteranUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.VeteranUIResource::deleteItemsBtnLabelText().'
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
                                                            <div id="veteransGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

								<!-- Add item modal dialog form -->
                                <div id="veteranDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.VeteranUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.VeteranUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.VeteranUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.VeteranUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.VeteranUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.VeteranUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.VeteranUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.VeteranUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.VeteranUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.VeteranUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.VeteranUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.VeteranUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.VeteranUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.VeteranUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.VeteranUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.VeteranUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="genderLabel" class="control-label col-md-4">'.VeteranUIResource::genderColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="genderLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="nameLabel" class="control-label col-md-4">'.VeteranUIResource::nameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="nameLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="lastNameLabel" class="control-label col-md-4">'.VeteranUIResource::lastNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="lastNameLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="emailLabel" class="control-label col-md-4">'.VeteranUIResource::emailColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="emailLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="phoneNumberLabel" class="control-label col-md-4">'.VeteranUIResource::phoneNumberColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="phoneNumberLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="zipCodeLabel" class="control-label col-md-4">'.VeteranUIResource::zipCodeColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="zipCodeLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="cityLabel" class="control-label col-md-4">'.VeteranUIResource::cityColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="cityLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="addressLabel" class="control-label col-md-4">'.VeteranUIResource::addressColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="addressLabel"></label>
                                                </div>
                                            </div>
            
                                            <div class="form-group ">
                                                <label for="positionLabel" class="control-label col-md-4">'.VeteranUIResource::positionColLabelText().'</label>
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
                                        <form id="veteranDetailsForm" class="form-horizontal" data-dojo-id="veteranDetailsForm" encType="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="gender">'.VeteranUIResource::genderColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <select   id="gender" name="gender" class="__selectpicker">  
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                    
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="name">'.VeteranUIResource::nameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="name" name="name" class="form-control" aria-required="true"  aria-invalid="true" data-placement="right"/>  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="lastName">'.VeteranUIResource::lastNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="lastName" name="lastName" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="email">'.VeteranUIResource::emailColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="email" name="email" class="form-control" aria-required="true"  aria-invalid="true" data-placement="right"/>  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="phoneNumber">'.VeteranUIResource::phoneNumberColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="phoneNumber" name="phoneNumber" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="zipCode">'.VeteranUIResource::zipCodeColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="zipCode" name="zipCode" class="form-control" />  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="city">'.VeteranUIResource::cityColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="city" name="city" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="address">'.VeteranUIResource::addressColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="address" name="address" class="form-control" />  
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="position">'.VeteranUIResource::positionColLabelText().'</label>
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
 
