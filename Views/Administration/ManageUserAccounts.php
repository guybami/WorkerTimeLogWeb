
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Users';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/users.fr.res.php", "../../UIResources/users.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.UserUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.UserUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.UserUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.UserUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.UserUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.UserUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.UserUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.UserUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.UserUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.UserUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.UserUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.UserUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.UserUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.UserUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.UserUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.UserUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.UserUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.UserUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.UserUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.UserUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.UserUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.UserUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.UserUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.UserUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.UserUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.UserUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.UserUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.UserUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.UserUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.UserUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.UserUIResource::updateItemDetailsTitleLabelText().'",

          loginNameColLabel : "'.html_entity_decode(UserUIResource::loginNameColLabelText()).'",
          hashPasswordColLabel : "'.html_entity_decode(UserUIResource::hashPasswordColLabelText()).'",
          nameColLabel : "'.html_entity_decode(UserUIResource::nameColLabelText()).'",
          lastNameColLabel : "'.html_entity_decode(UserUIResource::lastNameColLabelText()).'",
          phoneNumberColLabel : "'.html_entity_decode(UserUIResource::phoneNumberColLabelText()).'",
          emailColLabel : "'.html_entity_decode(UserUIResource::emailColLabelText()).'",
          
          noItemSelectedLabel : "'.html_entity_decode(UserUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.html_entity_decode(UserUIResource::editItemDetailsTitleLabelText()).'",
          menuItemSectionTitleLabel : "'.html_entity_decode(UserUIResource::menuItemSectionTitleLabelText()).'",
          subMenuItemSectionTitleLabel : "'.html_entity_decode(UserUIResource::subMenuItemSectionTitleLabelText()).'"
		  };

        </script>
        <script defer src="../../Scripts/usersScript.js"  type="text/javascript"> </script> 

         
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
                                <h2>'.UserUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.UserUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.UserUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.UserUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.UserUIResource::deleteItemsBtnLabelText().'
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
                                                            <div id="usersGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

                                <!-- Add item modal dialog form -->
                                <div id="userDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.UserUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.UserUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.UserUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.UserUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.UserUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.UserUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.UserUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.UserUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.UserUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.UserUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.UserUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.UserUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.UserUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.UserUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.UserUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.UserUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="loginNameLabel" class="control-label col-md-4">'.UserUIResource::loginNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="loginNameLabel"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="hashPasswordLabel" class="control-label col-md-4">'.UserUIResource::hashPasswordColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="hashPasswordLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="nameLabel" class="control-label col-md-4">'.UserUIResource::nameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="nameLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="lastNameLabel" class="control-label col-md-4">'.UserUIResource::lastNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="lastNameLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="phoneNumberLabel" class="control-label col-md-4">'.UserUIResource::phoneNumberColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="phoneNumberLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="emailLabel" class="control-label col-md-4">'.UserUIResource::emailColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="emailLabel"></label>
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
                                        <form id="userDetailsForm" class="form-horizontal" data-dojo-id="userDetailsForm" encType="multipart/form-data">

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="loginName">'.UserUIResource::loginNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="loginName" name="loginName" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="hashPassword">'.UserUIResource::hashPasswordColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="password" id="hashPassword" name="hashPassword" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="hashPassword">'.UserUIResource::confirmHashPasswordColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="password" id="confirm_hashPassword" name="confirm_hashPassword" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="name">'.UserUIResource::nameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" name="name" class="form-control" required />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="lastName">'.UserUIResource::lastNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="lastName" name="lastName" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="phoneNumber">'.UserUIResource::phoneNumberColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="email">'.UserUIResource::emailColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="email" name="email" class="form-control" />
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
 
